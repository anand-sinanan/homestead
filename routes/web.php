<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



//$stripe = App::make('App\Billing\Stripe'); // can also use resolve() or app() helper functions
//dd($stripe);

// Tasks from prior example
Route::get('/tasks', 'TasksController@index');
Route::get('/tasks/{task}', 'TasksController@show');


Route::get('/', function () {

    return view('welcome');
});

//Posts for Layouts and Structure+
Route::get('/posts/index', 'PostsController@index')->name('home');

Route::get('/posts/create','PostsController@create');

Route::get('/posts/{post}','PostsController@show');

Route::post('/posts', 'PostsController@store');

//comments
Route::post('/posts/{post}/comments', 'CommentsController@store');

Route::get('/register', 'RegistrationController@create');   //technically both could be handled in one 'AuthController' depends on preference and eventually size of controller.
Route::post('/register', 'RegistrationController@store');

Route::get('/login', 'SessionsController@create')->name('login');  //apparently middleware does redirect->login() automatically so need to specify.
Route::post('/login','SessionsController@store');
Route::get('/logout', 'SessionsController@destroy');     //may not necessarily want to use get
