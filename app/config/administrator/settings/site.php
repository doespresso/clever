<?php

/**
 * The main site settings page
 */

return array(

	/**
	 * Settings page title
	 *
	 * @type string
	 */
	'title' => 'Настройки сайта',

	/**
	 * The edit fields array
	 *
	 * @type array
	 */
	'edit_fields' => array(
		'site_name' => array(
			'title' => 'Название (title)',
			'type' => 'text',
			'limit' => 50,
		),
        'ooo' => array(
      			'title' => 'Юридическое название',
      			'type' => 'text',
      			'limit' => 50,
      		),
        'adress' => array(
      			'title' => 'Адрес',
      			'type' => 'text',
      			'limit' => 70,
      		),
        'tel1' => array(
      			'title' => 'Телефон 1',
      			'type' => 'text',
      			'limit' => 20,
      		),
        'tel2' => array(
      			'title' => 'Телефон 2',
      			'type' => 'text',
      			'limit' => 20,
      		),
        'time' => array(
      			'title' => 'Режим работы',
      			'type' => 'text',
      			'limit' => 200,
      		),
        'time_office' => array(
      			'title' => 'Режим работы Офиса',
      			'type' => 'text',
      			'limit' => 200,
      		),
        'map' => array(
      			'title' => 'Карта',
                'type' => 'textarea',
      		),
        'copyright' => array(
      			'title' => 'Copyright',
      			'type' => 'text',
      			'limit' => 40,
      		),
        'adminmail' => array(
      			'title' => 'E-mail администратора',
      			'type' => 'text',
      			'limit' => 30,
      		),
        'home_title' => array(
      			'title' => 'TITLE HOME',
      			'type' => 'text',
      			'limit' => 255,
      		),
        'home_description' => array(
      			'title' => 'DESCRIPTION HOME',
      			'type' => 'text',
      			'limit' => 600,
      		),
        'home_keywords' => array(
      			'title' => 'KEYWORDS HOME',
      			'type' => 'text',
      			'limit' => 600,
      		),
		'page_cache_lifetime' => array(
			'title' => 'Cache Lifetime (минуты)',
			'type' => 'number',
		),
		'logo' => array(
			'title' => 'Логотип',
			'type' => 'file',
			'naming' => 'random',
            'location' => public_path() . '/assets/picto/test/',
			'size_limit' => 20,
            'mimes' => 'svg',
		),
	),

	/**
	 * The validation rules for the form, based on the Laravel validation class
	 *
	 * @type array
	 */
	'rules' => array(
		'site_name' => 'required|max:50',
		'page_cache_lifetime' => 'required|integer',
//		'logo' => 'required',
	),

	/**
	 * This is run prior to saving the JSON form data
	 *
	 * @type function
	 * @param array		$data
	 *
	 * @return string (on error) / void (otherwise)
	 */
	'before_save' => function(&$data)
	{
//		$data['site_name'] = $data['site_name'] . ' - The Blurst Site Ever';
	},

	/**
	 * The permission option is an authentication check that lets you define a closure that should return true if the current user
	 * is allowed to view this settings page. Any "falsey" response will result in a 404.
	 *
	 * @type closure
	 */
	'permission'=> function()
	{
		return true;
		//return Auth::user()->hasRole('developer');
	},

	/**
	 * This is where you can define the settings page's custom actions
	 */
	'actions' => array(
		//Ordering an item up
		'clear_page_cache' => array(
			'title' => 'Очистка кэша',
			'messages' => array(
				'active' => 'Очистка кэша...',
				'success' => 'Кэш очищен',
				'error' => 'Ошибка очистки кэша',
			),
			//the settings data is passed to the closure and saved if a truthy response is returned
			'action' => function(&$data)
			{
				Cache::forget('pages');

				return true;
			}
		),
	),
);