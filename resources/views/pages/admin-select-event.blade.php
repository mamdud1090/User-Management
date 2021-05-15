@extends('layouts.admin-panel')
	@section('content')

	<div class="container">
      <div class="contentLogin">

      <h2>Select Event to assign Club & Committee</h2>
        <div class="col-sm-1"></div>
        <div class="col-sm-10 loginDiv">
          @foreach($events as $event)
                <a href="{{ route('club-n-committee-list' , $event->id) }}">
                   <button class="btn btn-danger eventBtn">{{$event->name}}</button>
                </a><br>
          @endforeach
        </div>
        <div class="col-sm-1"></div>
      </div>
    </div>

@endsection