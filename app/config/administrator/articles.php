<?php

/**
 * Actors model config
 */

return array(

	'title' => 'Статьи',

	'single' => 'статья',

	'model' => 'Article',

    'form_width' => 800,

    'columns' => array(
        'id',
//        'email' => array(
//            'title' => 'E-mail',
//        ),
        'name' => array(
            'title' => 'Заголовок',
        ),
        'annnounce' => array(
            'title' => 'Анонс',
        ),
//        'contact' => array(
//            'title' => 'Контакты',
//        ),
        'category' => array(
            'title' => 'Категория',
            'relationship' => 'category',
            'select' => '(:table).name',
        ),
        'alias' => array(
            'title' => 'SEO URL name',
        ),
        'created_at' => array(
            'title' => 'Создано',
        ),
        'updated_at' => array(
            'title' => 'Обновлено',
        ),
        'published' => array(
            'title' => 'Опубликовано',
            'type' => 'enum',
//            'output' => function(){return 'ok'},
        ),
    ),


	'filters' => array(
		'id',
        'published' => array(
            'type' => 'enum',
            'title' => 'Опубликовано',
            'options'=> array(true=>'Опубликовано',false=>'Не опубликовано')
        ),
	),

	/**
	 * The editable fields
	 */
	'edit_fields' => array(
        'category' => array(
            'title' => 'Категория',
            'type' => 'relationship',
            'name_field' => 'name',
        ),
        'name' => array(
            'title' => 'Заголовок',
        ),
        'alias' => array(
            'title' => 'SEO URL name',
        ),
        'announce' => array(
            'title' => 'Анонс',
            'type' => 'textarea',
        ),
        'html' => array(
            'title' => 'Текс статьи',
            'type' => 'wysiwyg',
        ),
        'published' => array(
            'type' => 'bool',
            'title' => 'Опубликовано',
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