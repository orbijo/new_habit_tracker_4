@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h4>My Habits</h4>
            <div class="container bg-white py-2">
                <table class="table table-hover">
                    <thead>
                        <tr>
                        <th scope="col">Habit</th>
                        <th scope="col">Time Lapse</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($user->habits as $habit)
                            <tr class="clickable" onclick="window.location.href = '{{ route('habits.show', $habit->id) }}';">
                            <td>{{ $habit->description }}</td>
                            @if(isset($habit->firstRating))
                            <td>{{ $habit->firstRating->created_at->diffForHumans() }}</td>
                            </tr>
                            @else
                            <td>Not rated yet</td>
                            </tr>
                            @endif
                            
                        @empty
                            <tr>
                            <td>No Entries</td>
                            <td></td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<a href="#" class="float bg-primary" data-toggle="modal" data-target="#createModal">
    <i class="fa fa-plus fa-lg my-float" style="color:white"></i>
</a>
{{-- Create New Habit Modal --}}
<div class="modal fade" tabindex="-1" role="dialog" id="createModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">New Habit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('habits.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input id="description" name="description" type="text" class="form-control" placeholder="Enter Description">
                    </div>
                    <div class="form-group">
                        <label for="reason">Reason</label>
                        <textarea name="reason" id="reason" cols="30" rows="5" class="form-control" placeholder="Reason for Habit"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-outline-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- End Create New Habit Modal --}}
@endsection
