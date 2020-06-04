@extends('layouts.layout')

@section('content')
<div class="content">

    <div class="wrapper buy-phone">
    
        <h4>Interested to Something New?</h4>
        <form action="/habits" method="POST">
        @csrf
            <label for="type">Habit </label>
            <input type="text" id="habit" name="habit">
            <label for="model">Description </label>
            <input type="text" id="description" name="description">
            <label for="reason">Reason </label>
            <input type="text" id="reason" name="reason">.


            <input type="submit" value="Add new hobby">
        </form>
    </div>
                    
            
                
            

    </div>
</div>
@endsection