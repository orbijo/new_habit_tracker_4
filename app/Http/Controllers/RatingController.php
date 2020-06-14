<?php

namespace App\Http\Controllers;

<<<<<<< Updated upstream
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
=======
use Illuminate\Http\Request;
use App\Rating;

class RatingController extends Controller
{
    public function store($id)
    {
        $rate = new Rating();
        $rate->rating = request('rating');
        $rate->habit_id = $id;
        $rate->user_id = auth()->user()->id;
        $rate->save();
        error_log($rate);
        return redirect()->back();

    } public function show($id)
    {        
        if(request()->ajax()) 
        {
 
         $start = (!empty($_GET["start"])) ? ($_GET["start"]) : ('');
         $end = (!empty($_GET["end"])) ? ($_GET["end"]) : ('');
 
         $data = Event::whereDate('start', '>=', $start)->whereDate('end',   '<=', $end)->get(['id','title','start', 'end']);
         return Response::json($data);
        }
        $user_id = auth()->user()->id;
        $rates = Rating::where(['user_id'=>$user_id,'habit_id'=>$id])->get();


        return view('habit.rate',['rates'=>$rates]);
>>>>>>> Stashed changes
    }
}
