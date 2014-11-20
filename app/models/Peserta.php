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
	protected $table = 'event_kompasianival2014_order';

	public $timestamps = false;

	public static function getAll($offset,$limit,$s = false,$k = false){
		

		$data =  Peserta::orderby('sso_name','ASC')->skip($offset)->limit($limit);
		
		if($s){
			$data->where($k,'like','%'.$s.'%');
		}

		return $data->get();
	}

	


}
