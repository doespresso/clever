<?php

class Menu extends Eloquent {

    protected $table = 'services';

    protected $guarded = array();

    public static function getMenuData()
    {
//        return $menu  = DB::table('services')->where('published','>',0)->get();
            return Service::Publishedsorted()->get();
    }



}
