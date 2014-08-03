<?php

class Comment extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
//		'name' => 'required',
//		'alias' => 'required',
		'comment' => 'required',
		'user_id' => 'required',
//		'service_id' => 'required',
//		'published' => 'required'
	);


    public function user(){
        return $this->belongsTo('User');
    }

    public function service(){
        return $this->belongsTo('Service');
    }


}
