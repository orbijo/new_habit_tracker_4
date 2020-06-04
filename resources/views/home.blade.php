@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-4">
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
                            <li> <h6><a href="/hobbies/{{$hob->id}}">{{$hob->hobby}}</a></h6>
                            </li>
                        </ul>  </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-8">
            <h4>Actions</h4>
            <a href="/habits/create">create new habit</a>
        </div>
    </div>
</div>
@endsection