<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Profile;
use Auth;
class UserEditController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
    }

   public function editUser()
	{


        // $user_id = Profile::where('user_id', request('user_id')->first();
		// return (count($user_id) > 0 ? 'Email Exist' : 'Email Not Exist');



		// $checkUser = \Auth::user()->id;

		$profileObj = Profile::where('user_id', Auth::user()->id)->first();
		$checkrProfile = count($profileObj);
		// Auth::user()->name = "Ridoy";
		// Auth::user()->save();
		// echo "<pre>";
		// var_dump($profileObj);
		// die();

		return view('pages.user-edit', ['hasProfile'=>$checkrProfile, 'data'=>$profileObj]);



  
	}


		


}
