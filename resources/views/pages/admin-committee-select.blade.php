@extends('layouts.admin-panel')
	@section('content')

	<div class="container">
      <div class="contentLogin">
        <div class="col-sm-1"></div>
        <div class="col-sm-10 loginDiv">
          <form name="myForm" action="{{ route('insert-club') }}" method="post" enctype="multipart/	form-data">
            {{ csrf_field() }}
              

              <h5><B>Country/Chracter/Club:</B></h5>
               <input class="form-control " type="text" name="inptCountry" placeholder="Committee" required>

            <div class="adminSubmitBtn">
              <button class="btn btn-primary" type="submit" name="submit">Submit</button>
            </div>
          </form>
        </div>
        <div class="col-sm-1"></div>
      </div>
    </div>

@endsection