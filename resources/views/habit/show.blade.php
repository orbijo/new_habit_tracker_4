@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-3">
            <div class="row">
                <div class="col">
                    <h4>Profile</h4>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <h4>Habbit List</h4>
                    
                    @foreach($hobbies as $hob)
                    <div>
                        <ul>
                            <li> <h6><a href="/habits/{{$hob->id}}">{{$hob->habit}}</a></h6>
                            </li>
                        </ul>  </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-9">
            
            <div class="wrapper phone-details row">
                <div class="col">
                    <h3>{{$hobby->habit}}</h3>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <h6>Description:</h6>
                    <p> {{$hobby->description}}</p>              
                </div>
                <div class="col">
                    <h6>Reason:</h6>
                    <p> {{$hobby->reason}}</hp>
                </div>
            </div>
            <form action="/habits/{{$hobby->id}}" method="POST">
            @csrf
            @method('DELETE')
            <button>Surrender</button><br>
            </form>
        </div>
    </div>
</div>
<div class="row">
    <div class="col">Day</div>
    <div class="col">Rate</div>
</div>

<form action="/habits/{{$hobby->id}}" method="POST">
    @csrf
    <label for="rating">Rate</label>
    <input type="radio" value="0" class="rate" name="rating">Happy</option>
    <input type="radio" value="1" class="rate" name="rating">Neutral</option>
    <input type="radio" value="2" class="rate" name="rating">Disappointed</option>
    <input type="submit" value="Rate">

</form>
<a href="/habits/{{$hobby->id}}/rate">See rated calendar</a>

@endsection