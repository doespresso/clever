<?php

/**
 * Actors model config
 */

return array(

	'title' => 'Отзывы',

	'single' => 'отзыв',

	'model' => 'Comment',



    'columns' => array(
        'id',
//        'email' => array(
//            'title' => 'E-mail',
//        ),
        'comment' => array(
            'title' => 'Текст отзыва',
        ),
//        'contact' => array(
//            'title' => 'Контакты',
//        ),
        'service' => array(
            'title' => 'Услуга',
            'relationship' => 'service',
            'select' => '(:table).name',
        ),
        'user' => array(
            'title' => 'Оставлен',
            'relationship' => 'user',
            'select' => '(:table).company',
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
        'service' => array(
            'title' => 'State',
            'type' => 'relationship',
            'name_field' => 'name',
        ),
        'comment' => array(
            'title' => 'Текст отзыва',
            'type' => 'textarea',
        ),
        'published' => array(
            'type' => 'bool',
            'title' => 'Опубликовано',
        ),
	),


);