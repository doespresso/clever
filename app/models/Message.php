<?php

class Message extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'message' => 'required',
//		'isnew' => 'required',
		'user_id' => 'required'
	);

    public function user(){
        return $this->belongsTo('User');
    }

    public function scopeIsold($query)
    {
        return $query->whereNull('isnew');
    }

    public function scopeIsunreaded($query)
    {
        return $query->whereNotNull('isnew');
    }
}
