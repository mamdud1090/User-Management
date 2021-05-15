<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EventRegistration;
use App\User;
use App\Events;
use App\Profile;
use App\Payments;
use DB;
use Auth;
use Session;

class PaymentController extends Controller
{

	public function __construct()
	{
	    $this->middleware('auth');
	}


	public function userPayment(Request $request)
	{
		$user_id = Auth::user()->id;
		
		$profileObj = Profile::where('user_id', $user_id)->first();

		$checkrProfile = count($profileObj);

		if ($checkrProfile < 1) {
			$request->session()->flash('warning', 'You need to update your profile first!');
			return redirect()->route('home');
		}
		
		$event = DB::table('events')
                    ->join('event_registration', 'events.id', '=', 'event_registration.event_id')
                    ->select('events.id', 'events.name', 'events.registration_fee', 'events.currency')
                    ->where('event_registration.id', $request->input('inptRegistrationId'))
                    ->first();


		$sessionData = [];
		$sessionData['event_id'] = $event->id;
		$sessionData['event_name'] = $event->name;
		$sessionData['event_registration_id'] = $request->input('inptRegistrationId');
		$sessionData['total_amount'] = $event->registration_fee;
		$sessionData['currency'] = $event->currency;
		$sessionData['tran_id'] = "TRN".$user_id.uniqid();
		$sessionData['cus_name'] = Auth::user()->name;
		$sessionData['cus_email'] = Auth::user()->email;
		$sessionData['cus_phone'] = $profileObj->phone_no;

		$sslcz = $this->sendRequest($sessionData);

		$sessionData['sessionkey'] = $sslcz['sessionkey'];

		if(isset($sslcz['GatewayPageURL']) && $sslcz['GatewayPageURL']!="" ) {
			Session::put('payment', $sessionData);
			echo "<meta http-equiv='refresh' content='0;url=".$sslcz['GatewayPageURL']."'>";
			// header("Location: ". $sslcz['GatewayPageURL']);
			return;
		} else {
			echo "FAILED TO CONNECT WITH SSLCOMMERZ API!";
			return;
		}

		// echo "<pre>";
		// var_dump(Session::get('payment'));
		// echo "</pre>";
		// return;
	}

   public function ipnListener()
   {

   		if($request->input('status') == "VALID")
   		{
   			
   				$paymentData = [
   					'currency' => $sessionData['currency'],
					'cus_email' => $sessionData['cus_email'],
					'cus_name' => $sessionData['cus_name'],
					'cus_phone' => $sessionData['cus_phone'],
					'event_id' => $sessionData['event_id'],
					'event_name' => $sessionData['event_name'],
					'event_registration_id' => $sessionData['event_registration_id'],
					'ssl_sessionkey' => $sessionData['sessionkey'],
					'total_amount' => $sessionData['total_amount'],
					'tran_id' => $sessionData['tran_id'],
					'ssl_amount' => $request->input('amount'),
					'ssl_bank_tran_id' => $request->input('bank_tran_id'),
					'ssl_card_brand' => $request->input('card_brand'),
					'ssl_card_issuer' => $request->input('card_issuer'),
					'ssl_card_issuer_country' => $request->input('card_issuer_country'),
					'ssl_card_issuer_country_code' => $request->input('card_issuer_country_code'),
					'ssl_card_no' => $request->input('card_no'),
					'ssl_card_type' => $request->input('card_type'),
					'ssl_currency' => $request->input('currency'),
					'ssl_currency_amount' => $request->input('currency_amount'),
					'ssl_currency_type' => $request->input('currency_type'),
					'ssl_risk_level' => $request->input('risk_level'),
					'ssl_risk_title' => $request->input('risk_title'),
					'ssl_status' => $request->input('status'),
					'ssl_store_amount' => $request->input('store_amount'),
					'ssl_tran_date' => $request->input('tran_date'),
					'ssl_val_id' => $request->input('val_id'),
					'ssl_verify_sign' => $request->input('verify_sign')
   				];
   				Payments::create($paymentData);
   				return;
   				
   		}
   }

   public function sendRequest($sessionData)
   {

   		/* PHP */
		$post_data = array();
		$post_data['store_id'] = "testbox";
		$post_data['store_passwd'] = "qwerty";
		$post_data['total_amount'] = $sessionData['total_amount'];
		$post_data['currency'] = $sessionData['currency'];
		$post_data['tran_id'] = $sessionData['tran_id'];
		$post_data['success_url'] = "http://localhost:8000/payment/success";
		$post_data['fail_url'] = "http://localhost:8000/payment/fail";
		$post_data['cancel_url'] = "http://localhost:8000/payment/cancel";
		# $post_data['multi_card_name'] = "mastercard,visacard,amexcard";  # DISABLE TO DISPLAY ALL AVAILABLE

		# EMI INFO
		$post_data['emi_option'] = "0";

		# CUSTOMER INFORMATION
		$post_data['cus_name'] = $sessionData['cus_name'];
		$post_data['cus_email'] = $sessionData['cus_email'];
		$post_data['cus_phone'] = $sessionData['cus_phone'];

		# SHIPMENT INFORMATION

		# OPTIONAL PARAMETERS

		# CART PARAMETERS

		

	   # REQUEST SEND TO SSLCOMMERZ
		$direct_api_url = "https://sandbox.sslcommerz.com/gwprocess/v3/api.php";

		$handle = curl_init();
		curl_setopt($handle, CURLOPT_URL, $direct_api_url );
		curl_setopt($handle, CURLOPT_TIMEOUT, 30);
		curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 30);
		curl_setopt($handle, CURLOPT_POST, 1 );
		curl_setopt($handle, CURLOPT_POSTFIELDS, $post_data);
		curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, FALSE); # KEEP IT FALSE IF YOU RUN FROM LOCAL PC


		$content = curl_exec($handle );

		$code = curl_getinfo($handle, CURLINFO_HTTP_CODE);

		if($code == 200 && !( curl_errno($handle))) {
			curl_close( $handle);
			$sslcommerzResponse = $content;
			$sslcz = json_decode($sslcommerzResponse, true );
			return $sslcz;
		} else {
			curl_close( $handle);
			return [];
		}

   }

   public function paymentSuccess(Request $request)
   {
   		if($request->input('status') == "VALID")
   		{
   			$sessionData = Session::get('payment');
   			$payment = Payments::find($sessionData['event_registration_id']);
   			if ($payment > 0 && $payment[0]->ssl_status == "VALID" ) {
   				Session::forget('payment');
				$request->session()->flash('info', "Payment successfull!");
				return redirect()->route('home');
   			}
   			else
   			{
   				$paymentData = [
   					'currency' => $sessionData['currency'],
					'cus_email' => $sessionData['cus_email'],
					'cus_name' => $sessionData['cus_name'],
					'cus_phone' => $sessionData['cus_phone'],
					'event_id' => $sessionData['event_id'],
					'event_name' => $sessionData['event_name'],
					'event_registration_id' => $sessionData['event_registration_id'],
					'ssl_sessionkey' => $sessionData['sessionkey'],
					'total_amount' => $sessionData['total_amount'],
					'tran_id' => $sessionData['tran_id'],
					'ssl_amount' => $request->input('amount'),
					'ssl_bank_tran_id' => $request->input('bank_tran_id'),
					'ssl_card_brand' => $request->input('card_brand'),
					'ssl_card_issuer' => $request->input('card_issuer'),
					'ssl_card_issuer_country' => $request->input('card_issuer_country'),
					'ssl_card_issuer_country_code' => $request->input('card_issuer_country_code'),
					'ssl_card_no' => $request->input('card_no'),
					'ssl_card_type' => $request->input('card_type'),
					'ssl_currency' => $request->input('currency'),
					'ssl_currency_amount' => $request->input('currency_amount'),
					'ssl_currency_type' => $request->input('currency_type'),
					'ssl_risk_level' => $request->input('risk_level'),
					'ssl_risk_title' => $request->input('risk_title'),
					'ssl_status' => $request->input('status'),
					'ssl_store_amount' => $request->input('store_amount'),
					'ssl_tran_date' => $request->input('tran_date'),
					'ssl_val_id' => $request->input('val_id'),
					'ssl_verify_sign' => $request->input('verify_sign')
   				];
   				Payments::create($paymentData);
   				Session::forget('payment');
				$request->session()->flash('info', "Payment successfull!");
				return redirect()->route('home');
   			}
   				
   		}
   		else
   		{
   			Session::forget('payment');
			$request->session()->flash('warning', 'Something Wrong! Please contact with your service provider.');
			return redirect()->route('home');
   		}

	   	echo "<pre>";
	   	var_dump($request);
	   	echo "<hr>";
	   	var_dump(Session::get('payment'));
	   	echo "</pre>";
	   	return;
   }
   public function paymentFail(Request $request)
   {
   		Session::forget('payment');
		$request->session()->flash('warning', $request->input('error'));
		return redirect()->route('home');
   }
   public function paymentCancel(Request $request)
   {
	   	
   		Session::forget('payment');
		$request->session()->flash('warning', $request->input('error'));
		return redirect()->route('home');
   }

   public function eventFee($event_id, $id){
   	$getEvent = Events::find($event_id);
   	return view('pages.registration-fees', ['registrationId' => $id, 'event' => $getEvent ]);

   }


}
