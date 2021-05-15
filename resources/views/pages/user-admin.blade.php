@extends('layouts.admin-panel')
@section('content')

<h1 class="adminHeader">Admin Panel</h1>

    
    	
      <div class="container">
          <div class="row">
            <h2 style="padding-bottom: 5px;">All Registered Applicant:</h2>

            	<table class="table table-bordered" id="admin-home-table">
                <thead>
                  <tr>
                    <th>Image</th>
                    <th>Event Name</th>
                    <th>Applicant Name</th>
                    <th>Committee</th>
                    <th>Country/Club</th>
                    <th>Payment</th>
                    <th>Award</th>
                    <th>Notice</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($allUsers as $allUser)
                    <tr>
                      <td  style="max-width: 200px;"><img class="img-responsive" src="{{$allUser->img_path}}"></td>
                      <td>{{$allUser->name}}</td>
                      <td>{{$allUser->user_name}}</td>
                      <td>{{$allUser->committee_name}}</td>
                      <td>{{$allUser->club_name}}</td>
                      <td>{{$allUser->ssl_status}}</td>
                      <td></td>
                      <td></td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
      </div>
     <!--  <div class="container">
        <div class="row">
          <div class="col-md-12">
            <a href='{!! url('/admin/committee/list') !!}'>
              <button class="btn btn-success actionButton">Committee List</button>
            </a>

            <a href='{!! url('/admin/club/list') !!}'>
              <button class="btn btn-success actionButton">Club List</button>
            </a>

            <a href='{!! url('/admin/select-event') !!}'>
              <button class="btn btn-success actionButton">Select Event</button>
            </a>
          </div>
        </div>
      </div> -->

@endsection

@section('footer_script')
  <link href="{{ asset('css/jquery.dataTables.min.css') }}" rel="stylesheet">
  <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
  <script type="text/javascript">
    $( document ).ready(function () {
      $("#admin-home-table").DataTable();
    });
  </script>
@endsection