@extends('layouts.user-details')
	@section('content')

		<form name="myForm" action="{{ route('userProfile') }}" method="post" enctype="multipart/form-data">
		<div class="container">
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-4">
					<h5><b>Amount</b></h5>
                      <input class="form-control" type="text" name="amount" placeholder="Payable Amount" >
				</div>
				<div class="col-md-4">
					<h5><b>Currency *</b></h5>
                        <select class="form-control" name="gender" required>
                          <option value="BDT"> BDT.</option>
                          <option value="USD"> USD</option>
                          <option value="NRS"> NRS.</option>
                          <option value="RS"> RS.</option>
                        </select>
				</div>

				<br/>
	
				<div class="col-md-2"></div>
			</div>
		</div>

		<div class="payButtonContainer">
			<button class="btn btn-primary payButton" type="submit" name="submit">Pay</button>
		</div>
		</form>

@endsection