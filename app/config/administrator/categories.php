<?php

/**
 * Films model config
 */

return array(

    'title' => 'Категории',

    'single' => 'категория',

    'model' => 'Category',

    'form_width' => 800,

    /**
     * The display columns
     */
    'columns' => array(
        'id',
        'name' => array(
            'title' => 'Основное название'
        ),
        'sort' => array(
            'title' => 'Индекс сортировки'
        ),
        'meta_title'=>array(
            'title'=>'SEO title'
        ),
        'published' => array(
            'title' => 'Опубликовано',
            'type' => 'bool'
        ),

    ),


    'filters' => array(
        'id',
        'name' => array(
            'title' => 'Основное название'
        ),
        'published' => array(
            'title' => 'Опубликовано',
            'type' => 'bool'
        ),
    ),


    'edit_fields' => array(
        'name' => array(
            'title' => 'Основное название'
        ),
        'sort' => array(
            'title' => 'Индекс сортировки',
            'type' => 'number',
            'decimals' => 0,
        ),
        'published' => array(
            'title' => 'Опубликовано',
            'type' => 'bool'
        ),
        'alias' => array(
            'title' => 'SEO URL NAME'
        ),
        'meta_title' => array(
            'title' => 'META TITLE'
        ),
        'meta_description' => array(
            'title' => 'META DESCRIPTION'
        ),
        'meta_keywords' => array(
            'title' => 'META KEYWORDS'
        ),
    ),
);