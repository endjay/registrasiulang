<?php

#use Illuminate\Auth\UserTrait;
#use Illuminate\Auth\UserInterface;
#use Illuminate\Auth\Reminders\RemindableTrait;
#use Illuminate\Auth\Reminders\RemindableInterface;

class Pendaftaran extends Eloquent  {



	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'peserta'	;

	public static function getAll($offset,$limit,$s = false){
		

		$data =  Pendaftaran::orderby('id','desc')->skip($offset)->limit($limit);
		
		if($s){
			$data->where('nama','like','%'.$s.'%');
		}

		return $data->get();
	}

	public static function checkEmail($email){
		$t = Pendaftaran::where(array('email'=>$email))->count();

		if($t > 0 ){
			return true;
		}

		return false;
	}


}
