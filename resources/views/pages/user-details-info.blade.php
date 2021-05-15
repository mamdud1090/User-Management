@extends('layouts.user-details')
@section('content')

	<div class="container">  
      <div class="content">
        <div class="row">
              @if(Session::has('warning'))
                <p class="alert alert-warning">{{ Session::get('warning') }}</p>
              @endif

              @if(Session::has('status'))
                <p class="alert alert-success">{{ Session::get('status') }}</p>
              @endif

               @if(Session::has('info'))
                <p class="alert alert-success">{{ Session::get('info') }}</p>
              @endif
          <div class="userDetailsHead">
              <h4 class="userDetailsHeadText">USER DETAILS</h4>
          </div>

           @if($userProfile)
            
              <div id="profileImg"><img src="{{URL::asset($userProfile->img_path)}}" height="130" width="120">
              </div>

              <p id="profileImgTag">Name:&nbsp; {{ Auth::user()->name }} <br>Email: {{ Auth::user()->email }} <br>Phone: {{ (Auth::user()->profile)?Auth::user()->profile->phone_no:'' }}</p>

            

            @else
            
              <div id="profileImg"><img src="{{ URL::asset('images/profile-icon.png') }}" height="130" width="120"></div>

              <p id="profileImgTag">Name:&nbsp; {{ Auth::user()->name }} <br>Email: {{ Auth::user()->email }} <br>Phone: {{ (Auth::user()->profile)?Auth::user()->profile->phone_no:'' }}</p>
            
            @endif


          @if($userProfile)
            <div class="col-md-5 infoMeter">
            <div class="progressBar">
              <p class="progressBarText">100%</p>
            </div>

            <a href='{!! url('/update') !!}'><button class="btn btn-primary updateBtn">Update Profile</button></a>
          </div>
         
          @else

           <div class="col-md-5 infoMeter">
            <div class="progressBar">
              <p class="progressBarText">50%</p>
            </div>

            <a href='{!! url('/update') !!}'><button class="btn btn-primary updateBtn">Update Profile</button></a>
          </div>

          @endif

          <div class="col-md-2">
            <!-- <div class="progressBar">
              <p class="progressBarText">90%</p>
            </div> -->

           
              
            
          
            <!-- <div class="dropdown notificationBtn">
              <a href="#" class="btn-lg dropdown-toggle" data-toggle="dropdown">
                <span class="glyphicon glyphicon-bell"></span>
              </a>
              <span class="badge notification">7</span>
            </div> -->
          </div>

            </div>
        </div>

      <div class="container">  
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
                  <th>Notice</th>
                </tr>
              </thead>
              <tbody>

               <!-- @foreach($events as $event)
                  <tr>
                    <td>{{$event->name}}</td>
                  </tr>
                 @endforeach -->



                @foreach($conferences as $conference)

                  




                @endforeach


             
                @foreach($conferences as $conference)

                
                  <tr>
                    
                    <td>{{$conference->name}}</td>
                    <td>{{$conference->committee_name}}</td>
                    <td>{{$conference->club_name}}</td>
                    <td>
                      @if($conference->ssl_status == 'VALID')
                          <i class="fa fa-check"></i>
                      @else                          
                          <a class="btn btn-primary btn-md" href="{{ route('eventFee', ['event_id' => $conference->event_id,'registration_id' => $conference->id]) }}">Pay Now</a>
                      @endif
                    </td>
                    <td></td>
                    <td>
                     
                    </td>
                    
                  </tr>

               
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
      

@foreach($events as $event)

    <div>
      <a href="{{ route('eventName', $event->id) }}"><button class="btn btn-danger eventBtn">Delegate Registration for {{$event->name}}</button></a>
    </div>

@endforeach
   
  </div>
  </div>
  </div>

@endsection