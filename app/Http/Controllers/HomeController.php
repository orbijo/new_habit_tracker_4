<?php

namespace App\Http\Controllers;

use App\User;
use App\Habit;
use Auth;
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
<<<<<<< Updated upstream
        $user = User::with('habits.firstRating')->where('id', Auth::user()->id)->first();
        return view('home', ['user' => $user]);
=======
        $user_id = auth()->user()->id;
        $hobbies = Habit::where(['user_id'=>$user_id])->get(); 
        return view('habit.index',['hobbies'=>$hobbies]);
>>>>>>> Stashed changes
    }
}
