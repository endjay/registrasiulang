<?php 

class RegisterController extends Controller {


	//protected $layout = 'pendaftaran/master';

	
	public function getIndex(){
		
		$total = Pendaftaran::count();
		return View::make('pendaftaran/pendaftaran',array('total'=>$total));
		
	}

	public function postBaru(){
		$input = Input::all();

		

		if($input['nama'] == ''){
			Session::flash('data',$input);
			return Redirect::to('')->with('alert_message','Nama tidak boleh kosong');
		}


		if($input['email'] == ''){
			Session::flash('data',$input);
			return Redirect::to('')->with('alert_message','email tidak boleh kosong');
		}

		if(Pendaftaran::checkEmail($input['email'])){

			Session::flash('data',$input);
			return Redirect::to('')->with('alert_message','email sudah terdaftar');

		}


		if($input['phone'] == ''){
			Session::flash('data',$input);
			return Redirect::to('')->with('alert_message','Phone tidak boleh kosong');
		}

		$insert = DB::table('peserta')->insert(
   				 $input
		);
		

		if($insert){
			return Redirect::to('')->with('success_message','Insert Success ');
		}else{
			Session::flash('data',$input);
		}

		

		return Redirect::to('')->with('alert_message','Insert fail , please try again');

	}

	public function getPeserta(){


		$page = 1;
		$limit  = 10;
		$s = Input::has('s');
		
		if(Input::has('page')){
			$page = Input::get('page');
		}


		$offset = $limit * ($page - 1);
		$peserta  =  Pendaftaran::getAll($offset,$limit,Input::get('s'));


		$total = Pendaftaran::count();
		
		if($s){
			$total = Pendaftaran::where('nama','like','%'.Input::get('s').'%')->count();
		}

		
		$paging = Pendaftaran::paginate($limit);

		
		return View::make('pendaftaran/listpeserta',array('list'=>$peserta,'total'=>$total,'paging'=>$paging));
	}

	public function getPendaftar(){


		$page = 1;
		$limit  = 10;
		$s = Input::has('s');
		$e = Input::has('e');
		$n = Input::has('n');
		
		if(Input::has('page')){
			$page = Input::get('page');
		}


		$offset = $limit * ($page - 1);
		

		$peserta  =  Peserta::getAll($offset,$limit);


		$total = Peserta::count();
		
		$paging = Peserta::paginate($limit);

		if($s){
			$peserta  =  Peserta::getAll($offset,$limit,Input::get('s'),'sold_id');
			$total = Peserta::where('sold_id','like','%'.Input::get('s').'%')->count();
			$paging = Peserta::where('sold_id','like','%'.Input::get('s').'%')->paginate($limit);
			$paging->appends(array('s' => Input::get('s')))->links();
		}

		if($e){
			$peserta  =  Peserta::getAll($offset,$limit,Input::get('e'),'sso_email');
			$total = Peserta::where('sso_email','like','%'.Input::get('e').'%')->count();
			$paging = Peserta::where('sso_email','like','%'.Input::get('e').'%')->paginate($limit);
			$paging->appends(array('e' => Input::get('e')))->links();
		}

		if($n){
			$peserta  =  Peserta::getAll($offset,$limit,Input::get('n'),'sso_name');
			$total = Peserta::where('sso_name','like','%'.Input::get('n').'%')->count();
			$paging = Peserta::where('sso_name','like','%'.Input::get('n').'%')->paginate($limit);
			$paging->appends(array('n' => Input::get('n')))->links();
		}
		
		

		return View::make('pendaftaran/daftar_ulang',array('list'=>$peserta,'total'=>$total,'paging'=>$paging,'offset'=>$offset));	
	}

	public function checkSoldid(){
		$id = Input::get('no_order');


		$ok = Peserta::where('sold_id', '=', $id)->update(array('is_coming' => 1));

		if($ok){
			return Redirect::to('daftar_ulang')->with('success_message','No order '.$id.'di update ');
		}

		return Redirect::to('daftar_ulang')->with('alert_message','No order '.$id.' gagal di update ');
	}


}