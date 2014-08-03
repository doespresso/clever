<?php

class Question extends Eloquent {
	protected $guarded = array();
    protected $table = "questions";

	public static $rules = array(
		'question' => 'required',
//		'answer' => 'required',
//		'user_id' => 'required',
		'service_id' => 'required',
//		'published' => 'required'
	);
    public static function where_null($column)
    {
    $class = get_called_class();
    return $class::where($column, 'IS', DB::raw('null'));
    }


    public function user(){
        return $this->belongsTo('User');
    }

    public function service(){
        return $this->belongsTo('Service');
    }
}
