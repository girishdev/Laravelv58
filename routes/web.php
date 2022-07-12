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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::view('readme', 'readme');

Route::view('about', 'about');

// Contact Form Page
Route::get('contact', 'ContactFormController@create')->name('contact.create');
Route::post('contact', 'ContactFormController@store')->name('contact.store');

// Laravel Features
Route::view('laravelfeatures', 'laravelfeatures');

// Question and Answers Pages
Route::get('qanda/laravelbasic', 'QandAController@laravelbasic');
Route::get('qanda/laravelintermediate', 'QandAController@laravelintermediate');
Route::get('qanda/laraveladvanced', 'QandAController@laraveladvanced');

Route::get('qanda/phpbasic', 'QandAController@phpbasic');
Route::get('qanda/phpintermediate', 'QandAController@phpintermediate');
Route::get('qanda/phpadvanced', 'QandAController@phpadvanced');

Route::get('qanda/mysqlbasic', 'QandAController@mysqlbasic');
Route::get('qanda/mysqlintermediate', 'QandAController@mysqlintermediate');
Route::get('qanda/mysqladvanced', 'QandAController@mysqladvanced');

Route::get('qanda/javascriptbasic', 'QandAController@javascriptbasic');
Route::get('qanda/javascriptintermediate', 'QandAController@javascriptintermediate');
Route::get('qanda/javascriptadvanced', 'QandAController@javascriptadvanced');

Route::get('qanda/awsbasic', 'QandAController@awsbasic');
Route::get('qanda/awsintermediate', 'QandAController@awsintermediate');
Route::get('qanda/awsadvanced', 'QandAController@awsadvanced');

Route::get('qanda/gitbasic', 'QandAController@gitbasic');
Route::get('qanda/gitintermediate', 'QandAController@gitintermediate');
Route::get('qanda/gitadvanced', 'QandAController@gitadvanced');

Route::get('qanda/jquerybasic', 'QandAController@jquerybasic');
Route::get('qanda/jqueryintermediate', 'QandAController@jqueryintermediate');
Route::get('qanda/jqueryadvanced', 'QandAController@jqueryadvanced');

Route::get('qanda/ajaxbasic', 'QandAController@ajaxbasic');
Route::get('qanda/ajaxintermediate', 'QandAController@ajaxintermediate');
Route::get('qanda/ajaxadvanced', 'QandAController@ajaxadvanced');

// ToDo::Route Model Binding Demo
Route::delete('qanda/{id}', 'QandAController@destroy');
Route::get('qanda/{id}/edit', 'QandAController@edit');
Route::patch('qanda/{id}/edit', 'QandAController@update');
Route::get('qanda/searchQuestion', 'QandAController@searchQuestion');

// Question and Answers CRUD Optation Url's
Route::resource('qanda', 'QandAController');

Route::resource('customers', 'CustomersController');
// Adding Route Level MiddleWare
// Route::resource('customers', 'CustomersController')->middleware('auth');



