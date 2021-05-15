<?php

namespace App\Http\Controllers;
// namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

// use App\User;
// use App\Profile;

// use Auth;


class SessionController extends Controller
{


	

    public function accessSessionData(Request $request){
      if($request->session()->has('my_name'))
         echo $request->session()->get('my_name');
      else
         echo 'No data in the session';
   }
   public function storeSessionData(Request $request){
      $request->session()->put('my_name',' dolon');
      echo "Data has been added to session";
   }
   public function deleteSessionData(Request $request){
      $request->session()->forget('my_name');
      echo "Data has been removed from session.";
   }
}
