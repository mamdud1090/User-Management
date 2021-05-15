<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use PDF;

class ItemController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
    }

   public function pdfview(Request $req){

   		$items = DB::table("event_registration")->get();
   		// echo'<pre>';

   		// var_dump($items);

   		// die();

   		$data['items'] = $items;



   		view()->share('items',$items);

   		if ($req->has('download')) {

   			$pdf = PDF::loadView('pages.user-pdfview');
   			return $pdf->download('user-pdfview.pdf');
   		  
   		}

   		return view('pages.user-pdfview',$data);
   }
}
