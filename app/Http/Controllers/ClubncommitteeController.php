<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Committeeclub;

class ClubncommitteeController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
    }


	public function committeeClub(Request $req){

		
		$eventId = $req->input('inptEventId');
		$committee = $req->input('inptCommittee');
		$clubList = $req->input('inptClub');
		
		foreach ($clubList as $key => $club) {
			$elqObj = array('event_id' => $eventId, 'committee_id' => $committee, 'club_id' => $club );
			Committeeclub::create($elqObj);
		}

		$req->session()->flash('club-committee-status', 'Committee and club are inserted successfully..!!!');
		 return redirect()->back();
	}
   


}
