<?php

/**
 * Actors model config
 */

return array(

	'title' => 'Сообщения',

	'single' => 'сообщение',

	'model' => 'Message',



    'columns' => array(
        'id',
//        'email' => array(
//            'title' => 'E-mail',
//        ),
        'message' => array(
            'title' => 'Текст сообщения',
        ),
//        'contact' => array(
//            'title' => 'Контакты',
//        ),
//        'messages' => array(
//            'title' => 'Cообщений',
//            'relationship' => 'messages',
//            'select' => 'COUNT((:table).id)',
//        ),
        'user' => array(
            'title' => 'Адресат',
            'relationship' => 'user',
            'select' => '(:table).company',
        ),
        'created_at' => array(
            'title' => 'Создано',
        ),
        'isnew' => array(
            'title' => 'Прочитано',
            'type' => 'enum',
//            'output' => function(){return 'ok'},
            'options'=> array('1'=>'Прочитано','0'=>'Новое')
        ),
    ),


	'filters' => array(
		'id',
	),

	/**
	 * The editable fields
	 */
	'edit_fields' => array(
        'message' => array(
            'title' => 'Текст сообщения',
            'type' => 'textarea'
        ),
        'isnew' => array(
            'type' => 'enum',
            'title' => 'Прочитано',
            'options'=> array('Прочитано'=>'1','Новое'=>'0')
        ),
//		'email' => array(
//			'title' => 'First Name',
//			'type' => 'text',
//		),
        'user' => array(
                'title' => 'Адресат',
                'type' => 'relationship',
                'name_field' => 'company',
                'constraints' => array('user' => 'company') //theaters matches the relationship method name on the Film model
            ),
//        'contact' => array(
//      	    'title' => 'Контакты',
//            'type' => 'text',
//      		),
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

    'actions' => array(
//        //Ordering an item up
//        'show_user' => array(
//            'title'=>'asdad',
////            => function ($model) {
////                // return ($model->id);
////                return "asdas";
////            },
//            'messages' => array(
//                'active' => '1ыфвф...',
//                'success' => 'ОК',
//                'error' => 'ПИЗЕЦ',
//            ),
//            //the settings data is passed to the closure and saved if a truthy response is returned
//            'action' => function ($model) {
//
//
//                return true;
//            }
//        ),
    ),

);