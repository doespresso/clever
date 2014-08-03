<?php

/**
 * Actors model config
 */

return array(

	'title' => 'Вопросы',

	'single' => 'вопрос',

	'model' => 'Question',



    'columns' => array(
        'id',
//        'email' => array(
//            'title' => 'E-mail',
//        ),
        'question' => array(
            'title' => 'Вопрос',
        ),
        'answer' => array(
            'title' => 'Ответ',
        ),
//        'contact' => array(
//            'title' => 'Контакты',
//        ),
        'service' => array(
            'title' => 'Услуга',
            'relationship' => 'service',
            'select' => '(:table).name',
        ),
//        'user' => array(
//            'title' => 'Адресат',
//            'relationship' => 'user',
//            'select' => '(:table).company',
//        ),
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
        'question' => array(
            'title' => 'Вопрос',
            'type' => 'textarea',
        ),
        'answer' => array(
            'title' => 'Ответ',
            'type' => 'textarea',
        ),
        'published' => array(
            'type' => 'bool',
            'title' => 'Опубликовано',
        ),
	),


);