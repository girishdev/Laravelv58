<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function usersList()
    {
        $users = \App\User::get();
        // $users = DB::table('users')->paginate(15);
        // $users = DB::table('users')->simplePaginate(15);

        return view('userlist', compact('users'));
    }

    public function samplecodetesting()
    {
        Collection::macro('toLocale', function ($locale) {
            return $this->map(function ($value) use ($locale) {
                return Lang::get($value, ['test1'], $locale);
            });
        });

        $collection = collect(['first', 'second']);

        $translated = $collection->toLocale('en');
        echo '<pre>toLocale:: ';print_r($translated);

        // Extending Collections
        Collection::macro('toUpper', function () {
            return $this->map(function ($value) {
                return Str::upper($value);
            });
        });

        $collection = collect(['first', 'second']);

        $upper = $collection->toUpper(); // ['FIRST', 'SECOND']
        echo '<pre>toUpper:: ';print_r($upper);

        // Creating Sample Collections
        $collection = collect([1, 2, 3]);
        echo '<pre>';print_r($collection);

        // Introduction
        $collection2 = collect(['taylor', 'abigail', null])->map(function ($name) {
            return strtoupper($name);
        })->reject(function ($name) {
            return empty($name);
        });

        echo '<pre>';print_r($collection2);exit;
    }

}
