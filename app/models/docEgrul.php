<?php

class docEgrul extends Eloquent {
	protected $guarded = array();
    protected $table = "doc_ergul";

	public static $rules = array(
		'name' => 'required',
		'ogrn' => 'required',
		'inn' => 'required',
		'order_type' => 'required',
	);

}
