<?php

class Category extends Eloquent {
    protected $guarded = array();
    protected $table = "categories";

	public static $rules = array(
		'name' => 'required',
		'alias' => 'required',
	);

    public function articles(){
        return $this->hasMany('Article');
    }
}
