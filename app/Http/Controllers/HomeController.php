<?php

namespace App\Http\Controllers;

use App\User;
use App\Habit;
use Auth;
use Illuminate\Http\Request;

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
        $user = User::with('habits.firstRating')->where('id', Auth::user()->id)->first();
        return view('home', ['user' => $user]);
    }
}
