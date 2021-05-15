@extends('layouts.admin-panel')
@section('content')

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
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
		
@endsection