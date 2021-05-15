@extends('layouts.admin-panel')
	@section('content')

		<div class="container">
	      <div class="contentLogin">
	        <div class="col-sm-1"></div>
	        <div class="col-sm-10 loginDiv">
	          <form name="myForm" action="{{ route('insert-committee') }}" method="post" enctype="multipart/	form-data">
     			{{ csrf_field() }}
	            <div>
	              <h5><b>Committee:</b></h5>
	              <input class="form-control " type="text" name="inptCommittee" placeholder="Committee" required>
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