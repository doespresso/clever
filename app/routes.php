<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
$menulinks =  Menu::getMenuData();
View::share('menulinks', $menulinks);

Route::get('/', array('uses' => 'ServicesController@index','as' => 'home'));
Route::get('/contacts', function(){
    return View::make('contacts.index')->with('pagetype','contentpage');
});

Route::get('logout', array('as' => 'logout', 'uses' => 'LoginController@logout'));
Route::get('test', array('as' => 'tester', function(){
    if (Auth::check())
    {
        return Route::currentRouteName();
//     $email = Auth::user()->email;
//        return Redirect::route('login.index');
//     return $email;
    }
    else
    {
    }
}));

Route::get('questions/cat/{id?}', array('uses'=>'QuestionsController@category','as' => 'questions.category'));
Route::get('articles/', array('uses'=>'ArticlesController@index','as' => 'articles.index'));
Route::get('articles/{id?}', array('uses'=>'ArticlesController@show','as' => 'articles.show'));
Route::get('articles/cat/{id?}', array('uses'=>'ArticlesController@category','as' => 'articles.category'));


Route::resource('roles', 'RolesController');
Route::resource('users', 'UsersController');
Route::resource('services', 'ServicesController');
Route::resource('pages', 'PagesController');
Route::resource('comments', 'CommentsController');
Route::resource('messages', 'MessagesController');
Route::resource('questions', 'QuestionsController');
Route::resource('categories', 'CategoriesController');
Route::resource('articles', 'ArticlesController');







Route::get('/panel', array('as' => 'adminpanel'));

Route::group(array('before' => 'auth'), function () {
        Route::get('cabinet', array('as' => 'cabinet', 'uses' => 'UsersController@cabinet'));
});


Route::group(array('before' => 'logined'), function () {
    Route::get('login', array('as' => 'login.index', 'uses' => 'LoginController@index'));
    Route::post('login', array('uses' => 'LoginController@login'));
    Route::get('register', array('as' => 'login.register', 'uses' => 'LoginController@register'));
    Route::post('register', array('uses' => 'LoginController@store'));
});


//Route::filter('auth', function()
//{
//    if(Auth::check()){
//        return "ok";
//    } else {
//        return "no";
//    }
//});

Route::filter('auth', function()
{
    if (Auth::guest()) {
        return Redirect::to('login');
    }
});

Route::filter('logined', function()
{
    if (!Auth::guest()) {
        return Redirect::route('cabinet');
    }
});





App::missing(function($exception)
{
    return Response::view('errors.404', array(), 404);
});





