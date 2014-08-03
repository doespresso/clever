<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| Поле following language lines contain Поле default error messages used by
	| Поле validator class. Some of Полеse rules have multiple versions such
	| such as Поле size rules. Feel free to tweak each of Полеse messages.
	|
	*/

	"accepted"         => "Поле :attribute must be accepted.",
	"active_url"       => "Поле :attribute is not a valid URL.",
	"after"            => "Поле :attribute must be a date after :date.",
	"alpha"            => "Поле :attribute may only contain letters.",
	"alpha_dash"       => "Поле :attribute may only contain letters, numbers, and dashes.",
	"alpha_num"        => "Поле :attribute may only contain letters and numbers.",
	"array"            => "Поле :attribute must be an array.",
	"before"           => "Поле :attribute must be a date before :date.",
	"between"          => array(
		"numeric" => "Поле :attribute должно быть от :min до :max.",
		"file"    => "Поле :attribute должно быть от :min до :max килобайт.",
		"string"  => "Поле :attribute должно быть от :min до :max символов.",
		"array"   => "Поле :attribute must have between :min - :max items.",
	),
	"confirmed"        => "ПАРОЛЬ и ПОДТВЕРЖДЕНИЕ не соападают.",
	"date"             => "Поле :attribute is not a valid date.",
	"date_format"      => "Поле :attribute does not match Поле format :format.",
	"different"        => "Поле :attribute and :oПолеr must be different.",
	"digits"           => "Поле :attribute must be :digits digits.",
	"digits_between"   => ":attribute должно быть не короче :min и не длинней :max символов",
	"email"            => "Поле :attribute заполнено некорректно.",
	"exists"           => "Поле selected :attribute is invalid.",
	"image"            => "Поле :attribute must be an image.",
	"in"               => "Поле selected :attribute is invalid.",
	"integer"          => "Поле :attribute must be an integer.",
	"ip"               => "Поле :attribute must be a valid IP address.",
	"max"              => array(
		"numeric" => "Поле :attribute должно быть не больше :max.",
		"file"    => "Поле :attribute должен быть не больше :max килобайт.",
		"string"  => "Содержание поля :attribute долно быть не длиннее :max символов",
		"array"   => "Поле :attribute должно содержать не больше :max объекто.",
	),
	"mimes"            => "Поле :attribute must be a file of type: :values.",
	"min"              => array(
		"numeric" => "Поле :attribute должно быть не меньше :min.",
		"file"    => "Поле :attribute должен быть не меньше :min килобайт.",
		"string"  => "Содержание поля :attribute должно быть не короче :min символов.",
		"array"   => "Поле :attribute должно содержать не меньше least :min объектов.",
	),
	"not_in"           => "Поле selected :attribute is invalid.",
	"numeric"          => "Поле :attribute must be a number.",
	"regex"            => "Поле :attribute format is invalid.",
	"required"         => "Необходимо заполнить <i>:attribute</i>.",
	"required_if"      => "Поле :attribute field is required when :oПолеr is :value.",
	"required_with"    => "Поле :attribute field is required when :values is present.",
	"required_without" => "Поле :attribute field is required when :values is not present.",
	"same"             => "Поле :attribute and :oПолеr must match.",
	"size"             => array(
		"numeric" => "Поле :attribute must be :size.",
		"file"    => "Поле :attribute must be :size kilobytes.",
		"string"  => "Поле :attribute must be :size characters.",
		"array"   => "Поле :attribute must contain :size items.",
	),
	"unique"           => "Поле :attribute has already been taken.",
	"url"              => "Поле :attribute format is invalid.",

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| Here you may specify custom validation messages for attributes using Поле
	| convention "attribute.rule" to name Поле lines. This makes it quick to
	| specify a specific custom language line for a given attribute rule.
	|
	*/

	'custom' => array(),

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Attributes
	|--------------------------------------------------------------------------
	|
	| Поле following language lines are used to swap attribute place-holders
	| with something more reader friendly such as E-Mail Address instead
	| of "email". This simply helps us make messages a little cleaner.
	|
	*/

	'attributes' => array(
        "name"              => "ИМЯ",
        "question"              => "ПОЛЕ С ТЕКСТОМ ВОПРОСА",
        "email"              => "E-MAIL",
        "password"              => "ПАРОЛЬ",
        "password_confirmation"              => "ПОДТВЕРЖДЕНИЕ ПАРОЛЯ",
        "company"              => "ОРГАНИЗАЦИЯ",
        "contact"              => "КОНТАКТЫ",
        "comment"              => "ТЕКСТ ВАШЕГО ОТЗЫВА",
        "q_company"              => "Ф.И.О.",
        "q_email"              => "E-MAIL",
        "q_tel"              => "ТЕЛЕФОН",
    ),

);
