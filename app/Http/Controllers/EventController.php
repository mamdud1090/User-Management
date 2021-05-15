<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use DB;
use Illuminate\Http\Request;
use App\User;
use App\Events;
use App\EventRegistration;
use App\Club;
use App\Committee;

use Auth;

class EventController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function event($id)
    {

        $userEvents = EventRegistration::where('user_id', Auth::user()->id)
          ->where('event_id', $id)
          ->get();

        $committeeNames = DB::table('comm_n_club')
                    ->join('committee', 'comm_n_club.committee_id', '=', 'committee.id')
                    ->select('committee.id', 'committee.committee_name')
                    ->where('comm_n_club.event_id', $id)
                    ->distinct()
                    ->get();
        $clubNames = Club::all();

        $data['committeeNames'] = $committeeNames;
        $data['clubNames'] = $clubNames;
        $getEvent = Events::find($id);
        return view('pages.individual-group-delegation', ['event' => $getEvent, 'userEvents' => count($userEvents)],$data);
    }

    public function registration(Request $req){


    	$user_id = Auth::user()->id;
        $event_id = $req->input('event_id');

	   $eventRegistration = EventRegistration::create([
		'user_id' => $user_id,
		'event_id' => $event_id,
		'committee_id' => $req->input('inptCommittee'),
		'club_id' => $req->input('inptCountry'),
		'previous_experience' => $req->input('inptPreviousMUNExperience'),
    	'accommodation' => $req->input('inptAccomodation'),
    	'food' => $req->input('inptFood'),
    	'visa_requirement' => $req->input('inptVisa'),
    	'passport_name' => $req->input('inptPasportName'),
    	'passport_no' => $req->input('inptPasportNumber'),
    	'expiry_date' => $req->input('inptExpiryDate'),
    	'dob' => $req->input('inptDateOfBirth'),
    	'willingness_to_perform' => $req->input('inptWillingness'),
    	'performance_name' => $req->input('inptPerformanceName'),
    	
		]);
    
        $req->session()->flash('status', 'Congratulations ...!! You are successfully registered.');
        return redirect()->route('eventFee', ['event_id' => $event_id,'registration_id' => $eventRegistration->id]);

    }


    public function committee(Request $req){

        // $committee = Committee::create([
        // 'committee_name' =>$req->input('committee'),
        // ]);

        // $committeeName = Committee::all();

        // echo'<pre>';
        // var_dump($committeeName);

    }

    
}
