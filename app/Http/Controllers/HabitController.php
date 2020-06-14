<?php

namespace App\Http\Controllers;

use Validator;
use Auth;
use App\Habit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

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
            $user_id = auth()->user()->id;
            $hobbies = Habit::where(['user_id'=>$user_id])->get(); 
            return view('habit.index',['hobbies'=>$hobbies]);
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

    public function store()
    {
<<<<<<< Updated upstream
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
=======
        
        $hobby = new Habit();
        $hobby->habit = request('habit');
        $hobby->description = request('description');
        $hobby->reason = request('reason');        
        $hobby->user_id = auth()->user()->id;
        $hobby->save();
        error_log($hobby);
        return redirect('/habits')->with('mssg','New unit added successfully');
>>>>>>> Stashed changes
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Habit  $habit
     * @return \Illuminate\Http\Response
     */
<<<<<<< Updated upstream
    public function show(Habit $habit)
    {
        $retval = Habit::with('ratings')->where('id', $habit->id)->first();
        $response = Gate::inspect('auth-user', $retval);
        if($response->allowed()){
            return view('habits.show', ['habit' => $retval]);
        }
        else{
            abort(404);
        }
        
=======
    public function show($id)
    {    
        
        $user_id = auth()->user()->id;
        $hobbies = Habit::where(['user_id'=>$user_id])->get(); 
        $hobby = Habit::findOrFail($id);
        return view('habit.show',['hobby'=>$hobby,'hobbies'=>$hobbies ]);
    
>>>>>>> Stashed changes
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
    public function update(Request $request, Habit $habit)
    {
        //
    }

    public function destroy($id){
        $hobby = Habit::findOrFail($id);
        $hobby->delete();
        return redirect('/habits');
    }
}
