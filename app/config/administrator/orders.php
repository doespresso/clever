<?php

/**
 * Actors model config
 */

return array(

	'title' => 'Заказы',

	'single' => 'заказ',

	'model' => 'Order',



    'columns' => array(
        'id',
        'type' => array(
            'title' => 'Тип документа',
        ),
        'info' => array(
            'title' => 'Информация',
        ),
        'fio' => array(
            'title' => 'Компания/Персона',
        ),
        'user' => array(
            'title' => 'Пользователь-заказчик',
            'relationship' => 'owner',
            'select' => '(:table).email',
        ),
        'phone' => array(
            'title' => 'Телефон',
        ),
        'created_at' => array(
            'title' => 'Создано',
        ),
    ),


	'filters' => array(
		'id',
		'created_at'
	),

	/**
	 * The editable fields
	 */
	'edit_fields' => array(
        'type' => array(
            'title' => 'Тип',
        ),
        'info' => array(
            'type'=>'textarea',
            'title' => 'Информация',
        ),
        'owner' => array(
            'type' => 'relationship',
            'name_field' => 'company',
            'title' => 'Пользователь-заказчик',
        ),
	),


);