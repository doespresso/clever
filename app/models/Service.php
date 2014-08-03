<?php

class Service extends Eloquent {
    protected $guarded = array();
    protected $table = "services";

	public static $rules = array(
		'name' => 'required',
//		'alias' => 'required',
		'announce' => 'required',
		'products' => 'required',
		'solutions' => 'required',
		'specials' => 'required',
//		'sort' => 'required',
//		'icon' => 'required',
//		'published' => 'required'
	);

    public function scopePublished($query)
    {
      return $query->where('published','1');
    }

    public function scopePublishedsorted($query)
    {
      return $query->where('published','1')->orderBy('sort');
    }


//
//    public function isPublished()
//    {
//      //      return $this->whereNotNull('published');
//    }



}
