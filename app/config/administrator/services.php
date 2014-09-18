<?php

/**
 * Films model config
 */

return array(

    'title' => 'Услуги',

    'single' => 'услуга',

    'model' => 'Service',

    'form_width' => 800,

    /**
     * The display columns
     */
    'columns' => array(
        'id',
        'name' => array(
            'title' => 'Основное название'
        ),
        'announce' => array(
            'title' => 'Короткое описание'
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
//		'director' => array(
//			'title' => 'Director',
//			'type' => 'relationship',
//			'name_field' => 'name',
//			'options_sort_field' => "CONCAT(first_name, ' ' , last_name)",
//		),
//		'actors' => array(
//			'title' => 'Actors',
//			'type' => 'relationship',
//			'name_field' => 'name',
//			'options_sort_field' => "CONCAT(first_name, ' ' , last_name)",
//		),
    ),


    'edit_fields' => array(
        'name' => array(
            'title' => 'Основное название'
        ),
        'announce' => array(
            'title' => 'Короткое описание'
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
        'products' => array(
            'title' => 'Продукты',
            'type' => 'wysiwyg',
        ),
        'solutions' => array(
            'title' => 'Решения',
            'type' => 'wysiwyg',
        ),
        'show_order' => array(
            'title' => 'Интегрировать формы заказа Документов',
            'type' => 'bool'
        ),
        'color' => array(
            'type' => 'color',
            'title' => 'Фоновый цвет',
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
//		'release_date' => array(
//			'title' => 'Release Date',
//			'type' => 'date',
//			'date_format' => 'yy-mm-dd',
//		),
//		'director' => array(
//			'title' => 'Director',
//			'type' => 'relationship',
//			'name_field' => 'name',
//			'options_sort_field' => "CONCAT(first_name, ' ' , last_name)",
//		),
//		'actors' => array(
//			'title' => 'Actors',
//			'type' => 'relationship',
//			'name_field' => 'name',
//			'options_sort_field' => "CONCAT(first_name, ' ' , last_name)",
//		),
//		'theaters' => array(
//			'title' => 'Theater',
//			'type' => 'relationship',
//			'name_field' => 'name',
//		),
    ),

);