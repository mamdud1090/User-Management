@extends('layouts.user-details')
	@section('content')


	<div class="container">

		<div class="row">

		<form name="myForm" action="{{ route('adminProfile') }}" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}


              <div class="col-md-4">
               	Event ID: <input type="text" name="event_id">
              </div>


              <div class="col-md-4">
                <h5><b>Award</b></h5>
                <input class="form-control" type="text" name="award">
              </div>


              <div class="col-md-4">

                <p>Select Notice to upload</p>
                <div class="uploadBtn">
                  <input type="file" name="notice">
                </div>
              </div>

              <button class="btn btn-primary" type="submit" name="submit">Save</button>

            </form>

          </div>

    </div>

@endsection