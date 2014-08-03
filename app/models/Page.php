<?php

class Page extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'name' => 'required',
		'alias' => 'required',
		'menu' => 'required',
		'meta-keyword' => 'required',
		'meta-description' => 'required',
		'text' => 'required',
		'icon' => 'required',
		'published' => 'required'
	);
}
