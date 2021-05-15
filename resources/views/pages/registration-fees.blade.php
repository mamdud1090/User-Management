@extends('layouts.user-details')
  @section('content')


<div class="container">


      @if(Session::has('status'))
        <p class="alert alert-success">{{ Session::get('status') }}</p>
      @endif
      <div class="contentPayment">
        <div>
          <h3>WHAT'S INCLUDED IN THE REGISTRATION FEES</h3><br>
          <p>1. Airport pickup on Arrival.</p>
          <p>2. Conference Meterials.</p>
          <p>3. Global village, Social event and Reception & Networking dinner.</p>
          <p>4. Breakfast, Lunch, Snacks and Dinner throughout the conference.</p>
          <p>5. Accommodation for 4 nights.</p>
          <p>6. Certificate of Participation.</p>
        </div>

        <div class="row">
          <div class="col-sm-12">
          <table class="table table-bordered paymentTable">
          <thead>
            <tr class="paymentTableHead">
              
              <th style="background-color: #5f605e; text-align: center"><h3>Registration Fee for {{$event->name}}</h3></th>
             
            </tr>
          </thead>
          <tbody>
            <tr class="paymentTableBody">
             
              <td><span style="font-size: 23px">{{$event->currency}} {{$event->registration_fee}}</span></td>
            
            </tr>
            <tr>
             
              <td><span class="glyphicon glyphicon-ok-sign"></span> Application Deadline: 20th january</td>
             
            </tr>
            <tr class="paymentTableBody">
             
              <td>
                <form action="{{ route('userPayment') }}" method="post">
                  {{ csrf_field() }}
                  <input type="hidden" name="inptRegistrationId" value="{{$registrationId}}">
                  <button type="submit" class="btn btn-success">Proceed To Pay</button>
                </form>
                <br/>
                <a href="{{ route('home') }}"><button class="btn btn-warning">Pay Later </button></a>
              </td>
              
            </tr>
          </tbody>
        </table>
        </div>
        </div>
      </div>
    </div>

  @endsection