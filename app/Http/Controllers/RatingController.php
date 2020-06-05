<?php

namespace App\Http\Controllers;

use Validator;
use Auth;
use Carbon\Carbon;
use App\Rating;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RatingController extends Controller
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
            'rating' => ['required', 'string', Rule::in(['smile', 'meh', 'frown'])],
            'habit_id' => ['required', 'integer'],
        ]);

        if($validation->fails()) {
            return redirect('/home')
                ->withErrors($validation)
                ->withInput();
        }

        if($rating = Rating::whereDay('created_at', '=', Carbon::now()->day)->where('habit_id', $request->habit_id)->first()){
            $rating->rating = $request->rating;
        }
        else{
            $rating = new Rating;
            $rating->rating = $request->rating;
            $rating->habit_id = $request->habit_id;
        }
        if($rating->save()) {
            return redirect('/habits'.'/'.$request->habit_id);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function show(Rating $rating)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function edit(Rating $rating)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rating $rating)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rating $rating)
    {
        //
    }
}
