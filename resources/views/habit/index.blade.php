@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col text-right">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
            Add new Habit
            </button>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-4">        
            <h4>Habit List</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-3">Habit</div>
        <div class="col-4">Description</div>
        <div class="col-5">Reason</div>
    </div>
    <div class="row">
        <div class="col">                    
            @foreach($hobbies as $hob)
            @php
                $date = \Carbon\Carbon::parse($hob->created_at);
                $now = \Carbon\Carbon::now();
                $diff = $date->diffInDays($now) + 1;
            @endphp
            <a href="/habits/{{$hob->id}}">
            <div class="row">
                <div class="col-3">
                    <p>{{$hob->habit}}</p>
                </div>
                <div class="col-4">
                    <p>{{$hob->description}}</p>
                </div>
                <div class="col-4">
                    <p>{{$hob->reason}}</p>
                </div>    
                <div class="col-1"><p>Day {{$diff}}</p></div>
            </div></a> 
            @endforeach
        </div>
    </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle" >Add New Habit</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="/habits" method="POST">
        @csrf
        <div class="modal-body">
            <div class="form-group">
                <label for="type">Habit </label>
                <input type="text" id="habit" name="habit" class="form-control">
            </div>
            <div class="form-group">
                <label for="model">Description </label>
                <input type="text" id="description" name="description" class="form-control">
            
            </div>
            <div class="form-group">              
                <label for="reason">Reason </label>
                <textarea name="reason" id="" cols="30" rows="5" class="form-control"></textarea>
            </div>         
    
        </div>
        <div class="modal-footer"><input type="submit" value="Add new hobby">
            </form>
        </div>
    </div>
  </div>
</div>
@endsection