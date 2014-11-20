<?php

#use Illuminate\Auth\UserTrait;
#use Illuminate\Auth\UserInterface;
#use Illuminate\Auth\Reminders\RemindableTrait;
#use Illuminate\Auth\Reminders\RemindableInterface;

class Peserta extends Eloquent  {



	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'peserta_kompasianival';

	public static function getAll($offset,$limit,$s = false){
		

		$data =  Peserta::orderby('id','desc')->skip($offset)->limit($limit);
		
		if($s){
			$data->where('nama','like','%'.$s.'%');
		}

		return $data->get();
	}

	public static function checkEmail($email){
		return Peserta::where(array('email'=>$email))->get();
	}


}
