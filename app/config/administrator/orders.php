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
        'order_fio' => array(
            'title' => 'ФИО Заказчика',
        ),
        'order_phone' => array(
            'title' => 'Телефон',
        ),
        'order_email' => array(
            'title' => 'E-mail',
        ),
        'obj_type' => array(
            'title' => 'Тип',
        ),
        'obj_address' => array(
            'title' => 'Адрес объекта',
        ),
        'obj_number' => array(
            'title' => '№',
        ),
        'order_comment' => array(
            'title' => 'Комментарий к заказу',
        ),
        'created_at' => array(
            'title' => 'Создано',
        ),
        'updated_at' => array(
            'title' => 'Обновлено',
        ),
    ),


	'filters' => array(
		'id',
        'order_fio' => array(
            'title' => 'ФИО Заказчика',
        ),
	),

	/**
	 * The editable fields
	 */
	'edit_fields' => array(
        'obj_type' => array(
            'title' => 'Тип',
        ),
        'obj_address' => array(
            'title' => 'Адрес объекта',
        ),
        'obj_number' => array(
            'title' => '№',
        ),
        'order_fio' => array(
            'title' => 'ФИО Заказчика',
        ),
        'order_phone' => array(
            'title' => 'Телефон',
        ),
        'order_email' => array(
            'title' => 'E-mail',
        ),
        'order_comment' => array(
            'title' => 'Комментарий к заказу',
        ),
	),


);