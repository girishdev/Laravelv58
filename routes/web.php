<?php

// 1st Started Working on Laravel projects again....

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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
// Step-1
app()->bind('Games 2', function () {
    return 'Football 2';
});

dd(app()->make('Games 2')); /**/

// Step-2
/*
class Stadium {}
class Football {
    public function __construct(Stadium $stadium)
    {
        $this->stadium = $stadium;
    }
}
class Game {
    public function __construct(Football $football)
    {
        $this->football = $football;
    }
}

app()->bind('Game', function () {
    return new Game(new Football(new Stadium));
});

dd(app()->make('Game'));
// dd(resolve('Game')); // Wen aloe make resolve /**/

// Step-3:
/*
app()->instance('Game', function () {
    return 'Instance Of the Game';
});

dd(app()); /**/

// Step-4:
/*
use Illuminate\Support\Facades\Auth;

// This bind method will call two times here / On each request
app()->bind('random', function () {
    return Str::random();
});

// This Singleton method will call only one times here / One request only
app()->singleton('random2', function () {
    return Str::random();
});

dump(app()->make('random'));
dump(app()->make('random'));

dump(app()->make('random2'));
dd(app()->make('random2')); /**/

// dd(app());

// dd(app()->make('Hello'));

/*
// Cache Explanation:
// Calling as a Non-Static method
cache()->set('name', 'Girish');
dump(cache()->get('name'));

// Calling as a static method
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

Cache::set('name', 'kumar');
dd(Cache::get('name')); /**/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::view('readme', 'readme');

Route::view('about', 'about');

// User List - get all the Users
Route::get('/userlist', 'HomeController@usersList');

Route::get('/cookietesting',function () {
    // Setting the Cookies
    // Cookie::queue(Cookie::make('cookieNameTest', 'Girish kumar', 1));

    // Forget/remove cookie:
    // Cookie::queue(Cookie::forget('cookieNameTest'));

    // Getting the Cookies
    $value = Cookie::get('cookieNameTest');

    // Check if cookie exist:
    Cookie::has('cookiename');
    // or
    $request->hasCookie('cookiename'); // will return true or false

    echo "value:: " . $value;

});

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


Route::get('samplecodetesting', 'HomeController@samplecodetesting');


