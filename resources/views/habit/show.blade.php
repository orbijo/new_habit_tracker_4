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
            
            <div class="wrapper phone-details">
                <h3>{{$hobby->habit}}</h3><br>
                <h6>Description:</h6>
                <p> {{$hobby->description}}</p><br>
                <h6>Reason:</h6>
                <p> {{$hobby->reason}}</hp>
            </div>
            <form action="/hobbies/{{$hobby->id}}" method="POST">
            @csrf
            @method('DELETE')
            <button>Surrender</button><br>
            </form>
        </div>
    </div>
</div>
@endsection