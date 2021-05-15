@extends('layouts.user-details')
	@section('content')

	<div class="container">
      <div class="content">
        <div class="row">
             
          <div class="userDetailsHead">
              <h4 class="userDetailsHeadText">USER DETAILS</h4>
          </div>

          <a href="{{ route('pdfview',['download'=>'pdf']) }}">Download PDF</a>

          
          <div class="col-sm-5">

          
            <p id="profileImgTag">Name:&nbsp; {{ Auth::user()->name }} <br>Email: {{ Auth::user()->email }} <br>Phone:</p>
           
          </div>

          <div class="col-md-2"></div>

         
        </div>

        <div class="row">
          <div class="col-sm-12">
          <div class="UserTable">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Conferrence</th>
                  <th>Committee</th>
                  <th>Country/Club</th>
                  <th>Payment</th>
                  <th>Award</th>
                  <th>Documents</th>
                  <th>Notice</th>
                </tr>
              </thead>
              <tbody>

               

                @foreach($items as $item)

                
                  <tr>
                    
                    <td>{{$item->previous_experience}}</td>
                    <td>{{$item->committee_id}}</td>
                    <td>{{$item->club_id}}</td>
                    <td>{{$item->payment_status}}
                    </td>
                    <td></td>
                    <td>Download</td>
                    <td>Download pdf</td>
                  </tr>

               
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
  </div>
  </div>

@endsection