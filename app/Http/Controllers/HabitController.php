<?php

namespace App\Http\Controllers;

use App\Habit;
use Illuminate\Http\Request;

class HabitController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        {
            $user_id = auth()->user()->id;
            $hobbies = Habit::where(['user_id'=>$user_id])->get(); 
            return view('habit.index',['hobbies'=>$hobbies]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('habit.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        
        $hobby = new Habit();
        $hobby->habit = request('habit');
        $hobby->description = request('description');
        $hobby->reason = request('reason');        
        $hobby->user_id = auth()->user()->id;
        $hobby->save();
        error_log($hobby);
        return redirect('/habits')->with('mssg','New unit added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Habit  $habit
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {    
        
        $user_id = auth()->user()->id;
        $hobbies = Habit::where(['user_id'=>$user_id])->get(); 
        $hobby = Habit::findOrFail($id);
        return view('habit.show',['hobby'=>$hobby,'hobbies'=>$hobbies ]);
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Habit  $habit
     * @return \Illuminate\Http\Response
     */
    public function edit(Habit $habit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Habit  $habit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Habit $habit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Habit  $habit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Habit $habit)
    {
        //
    }
}
