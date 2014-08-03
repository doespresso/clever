<?php

/**
 * Actors model config
 */

return array(

	'title' => 'Пользователи',

	'single' => 'пользователь',

	'model' => 'User',



    'columns' => array(
        'id',
        'email' => array(
            'title' => 'E-mail',
        ),
        'company' => array(
            'title' => 'Организация',
        ),
        'contact' => array(
            'title' => 'Контакты',
        ),
        'messages' => array(
            'title' => 'Cообщений',
            'relationship' => 'messages',
            'select' => 'COUNT((:table).id)',
        ),
//        'role' => array(
//            'title' => 'Группа',
//            'relationship' => 'role',
//            'select' => '(:table).name',
//        ),
//        'created_at' => array(
//            'title' => 'Зарегистрирован',
//        ),
//        'active' => array(
//            'title' => 'Активен',
//            'type' => 'bool',
//        ),
    ),


	'filters' => array(
		'id',
	),

	/**
	 * The editable fields
	 */
	'edit_fields' => array(
		'email' => array(
			'title' => 'First Name',
			'type' => 'text',
		),
        'company' => array(
      	    'title' => 'Организация',
            'type' => 'text',
      		),
        'contact' => array(
      	    'title' => 'Контакты',
            'type' => 'text',
      		),
//		'birth_date' => array(
//			'title' => 'Birth Date',
//			'type' => 'date',
//		),
//		'films' => array(
//			'title' => 'Films',
//			'type' => 'relationship',
//			'name_field' => 'name',
//		),
	),

);