<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Habit;

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
        $user_id = auth()->user()->id;
        $hobbies = Habit::where(['user_id'=>$user_id])->get(); 
        return view('habit.index',['hobbies'=>$hobbies]);
    }
}
