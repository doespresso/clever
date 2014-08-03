<?php

class Article extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'name' => 'required',
		'alias' => 'required',
		'category_id' => 'required',
		'published' => 'required'
	);

    public function category(){
        return $this->belongsTo('Category');
    }
}
