<?php

namespace App\Http\Controllers;

use Validator;
use Auth;
use App\Habit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class HabitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'description' => 'required|string|max:128',
            'reason' => 'required|string|max:86',
        ]);
        
        if($validation->fails()) {
            return redirect('/home')
                ->withErrors($validation)
                ->withInput();
        }

        $habit = new Habit;
        $habit->description = trim($request->description);
        $habit->reason = trim($request->reason);
        $habit->user_id = Auth::user()->id;

        if($habit->save()) {
            return redirect()->route('home');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Habit  $habit
     * @return \Illuminate\Http\Response
     */
    public function show(Habit $habit)
    {
        $retval = Habit::with('ratings')->where('id', $habit->id)->first();
        $response = Gate::inspect('auth-user', $retval);
        if($response->allowed()){
            return view('habits.show', ['habit' => $retval, compact('calendar')]);
        }
        else{
            abort(404);
        }
        
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
