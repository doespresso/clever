<?php

class Order extends Eloquent
{
    protected $guarded = array();

//    public static $rules = array(
//        'order_type' => 'required',
//        'obj_type' => 'required',
//        'obj_address' => 'required',
//        'delivery_type' => 'required',
//        'order_phone' => 'required',
//        'order_fio' => 'required'
//    );

    public function owner(){
        return $this->belongsTo('User','user_id');
    }
}
