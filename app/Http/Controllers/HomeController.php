<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
}
