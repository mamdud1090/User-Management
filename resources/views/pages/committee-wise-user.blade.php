@extends('layouts.user-details')
	@section('content')

  
    	<h2 class="adminHeader">Admin Panel</h2>

     
        <div class="container">
          <div class="row">

            <form>
            	<table class="table table-bordered">
                          <thead>
                            <tr>
                              <!-- <th>Event Name</th> -->
                              <th>Applicant Name</th>
                              <th>Committee</th>
                              <th>Country/Club</th>
                              <th>Payment</th>
                              <th>Award</th>
                              <th>Notice</th>
                              <th>Notice</th>
                              <!-- <th>Action</th> -->
                            </tr>
                          </thead>
                          <tbody>


                           

                            @foreach($committees as $committee)

                              
                              <tr>
                               
                                <td>{{$committee->name}}</td>
                                <td>{{$committee->committee_name}}</td>
                                <td>{{$committee->club_name}}</td>
                                <td class="paymentStatus">{{ Form::checkbox('paymentStatus', 1, $committee->payment_status, array('disabled'))}}</td>
                                <td></td>
                                <td>Download</td>
                                <td>Download pdf</td>
                                <!-- <td><button class="btn btn-primary">Save</button></td> -->
                              </tr>
                            @endforeach
                          </tbody>
                        </table>

                  </form>


                   <!-- <div>
                      <a href='{{!! url('/admin-committee-input') !!}}'><button class="btn btn-danger eventBtn">Insert Committee </button></a>
                   </div>

                  <a href='{!! url('/noticeUpload') !!}'>Want to upload Document & Notice for any conference ??</a>
 -->
                  

            </div>
        </div>

@endsection