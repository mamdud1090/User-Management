@extends('layouts.user-details')
	@section('content')

		<div class="container">
	      <div class="contentLogin">
	        <div class="col-sm-1"></div>
	        <div class="col-sm-10 loginDiv">
	          <form name="myForm" action="{{ route('club-update') }}" method="post" enctype="multipart/	form-data">
     			{{ csrf_field() }}
	            <div>
	              <h5><b>Committee:</b></h5>
	              <input class="form-control " type="text" id="inptClub" name="inptClub" value="{{$clubById->club_name}}" required>

	              <input type="hidden" name="club_id" value="{{$clubById->id}}">

	            </div>
	            <div class="adminSubmitBtn">
	              <button class="btn btn-primary" type="submit" name="submit">Submit</button>
	            </div>
	          </form>
	        </div>
	        <div class="col-sm-1"></div>
	      </div>
	    </div>
@endsection