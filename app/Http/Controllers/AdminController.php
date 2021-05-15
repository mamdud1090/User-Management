<?php

namespace App\Http\Controllers;

use DB;
use App\User;
use App\Events;
use App\EventRegistration;
use App\Club;
use App\Committee;
use App\Committeeclub;
use App\NoticeUpload;
use Illuminate\Support\Facades\Validator;

use Auth;
use Input;

use Illuminate\Http\Request;

class AdminController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function adminCommitteeInput(Request $req){


    	$committee = Committee::create([
        'committee_name' =>$req->input('inptCommittee'),
        ]);

       

        $committeeNames = Committee::all();
        $data = [];

        $data['committeeNames'] = $committeeNames;

        return view('pages.admin-committee-input');

        // echo'<pre>';
        // var_dump($committeeNames);

    }





    public function insertClub(Request $req){

        $club = Club::create([

        'club_name' =>$req->input('inptCountry'),
        ]);

        return view('pages.admin-committee-select');


        // return view('pages.admin-committee-select');


        // $clubName = Club::all();

        // echo'<pre>';

        // var_dump($clubName);

    }

    public function getClubByCommNEvent($eventId = 0, $committeeId = 0)
    {
        $result = DB::table('comm_n_club')
                    ->select('club_id')
                    ->where('event_id', $eventId)
                    ->where('committee_id', $committeeId)
                    ->get();
        

        $existClubsArray = array();
        foreach ($result as $key => $value) {
            $existClubsArray[$key] = $value->club_id;
        }


        $result2 = DB::table('clubs')
                    ->select('id', 'club_name')
                    ->whereNotIn('id', $existClubsArray)
                    ->get();
        return json_encode($result2->toArray());
    }

    public function getClubByCommUserEvent($eventId = 0, $committeeId = 0)
    {
        $result = DB::table('event_registration')
                    ->select('club_id')
                    ->where('event_id', $eventId)
                    ->where('committee_id', $committeeId)
                    ->get();
        

        $existClubsArray = array();
        foreach ($result as $key => $value) {
            $existClubsArray[$key] = $value->club_id;
        }


        $result2 = DB::table('comm_n_club')
                    ->join('clubs', 'comm_n_club.club_id', '=', 'clubs.id')
                    ->select('comm_n_club.club_id as id', 'clubs.club_name')
                    ->where('comm_n_club.event_id', $eventId)
                    ->where('comm_n_club.committee_id', $committeeId)
                    ->whereNotIn('comm_n_club.club_id', $existClubsArray)
                    ->get();
                    
    				
		// // echo count($result);
    	// echo "<pre>";
  //   	// echo $eventId;
  //   	// echo "<br>";
  //   	// echo $committeeId;
  //   	print_r($existClubsArray);
    	// print_r($result2->toArray());
     //                die();
        return json_encode($result2->toArray());
    }




public function getCommitteeByUserEvent($eventId = 0)
    {        
        $result2 = DB::table('event_registration')
                    ->join('committee', 'event_registration.committee_id', '=', 'committee.id')
                    ->join('events', 'event_registration.event_id', '=', 'events.id')
                    ->select('committee.committee_name', 'committee.id')
                    ->where('event_registration.event_id', $eventId)
                    ->distinct()
                    ->get();

                    
              
        // // echo count($result);
        // echo "<pre>";
  //    // echo $eventId;
  //    // echo "<br>";
  //    // echo $committeeId;
  //    print_r($existClubsArray);
        // print_r($result2->toArray());
     //                die();
        return json_encode($result2->toArray());
    }



    public function clubCommitteeSelection($id){
    	 $committees = Committee::all();
    	 $clubs = Club::all();

    	 
        $data = [];


        $data['event_id'] = $id;
        $data['clubs'] = $clubs;
        $data['committees'] = $committees;

     //    echo '<pre>';
    	// var_dump($data);

    	// die();



        return view('pages.admin-club-n-committee',$data);

    }

    public function eventSelection(){
    	 $events = Events::all();

    	 
        $data = [];


        $data['events'] = $events;

    //    echo '<pre>';
    // var_dump($data);

    // die();



        return view('pages.admin-select-event',$data);

    }


    public function committeeList(){

    	$committeeNames = Committee::all();
    	$data = [];
        $data['committeeNames'] = $committeeNames;


    	return view('pages.admin-committee-list', $data);
    }

    public function clubList(){

    	$clubNames = Club::all();
    	$data = [];
        $data['clubNames'] = $clubNames;


    	return view('pages.admin-club-list', $data);
    }

   


    public function storeCommittee(Request $req){

    	// $data = [];

    	// return Validator::make($data, [

    	// 'committee_name' => 'required|unique:committee',

    	// ]);

    	$committee = Committee::create([

        'committee_name' => $req->input('createCommittee'),
        ]);

         $req->session()->flash('committee-store-status', 'Club Stored Successfully!');

        if($committee){
        	return redirect()->back();
        }


    }


    public function storeClub(Request $req){

    	// $clubNames = Club::all();
    	

    	// $user_club_input = $req->input('createClub');

    	// $data = [];
     //    $data['club_name'] = $clubNames;
    	// // var_dump($user_club_input);
    	// // die();

    	// if (in_array($user_club_input, $clubNames)) {
    	// 	echo "Already Exists";
    	// }

       $inptClubName = $req->input('createClub');


        $clubNames = Club::all();
        $data = [];
        
        // $data1['inptClubName'] = $inptClubName;
        $data['clubNames'] = $clubNames;

       

         $tableClubName = DB::table('clubs')->where('club_name','=',$inptClubName)->first();

         // $clubData = [];
         // $data['tableClubName'] = $tableClubName;

        // echo'<pre>';
        // var_dump($tableClubName);
        // die();


        if($tableClubName == NULL){

            $club = Club::create([
                'club_name' => $inptClubName,

                ]);

            $req->session()->flash('status', 'Club Stored Successfully!');

            return redirect()->back();
    
        }                
        else{
  
            $req->session()->flash('duplicateClubStatus', 'This Club Is Already Exists!');
            return redirect()->back();

        }

        
        

    	

    	// $club = Club::create([
    	// 	'club_name' =>$req->input('createClub'),

    	// 	]);


     //    $req->session()->flash('status', 'Club Stored Successfully!');

    	// return redirect()->back();
    	

    }



    public function editCommittee($id){
    	$committeeById = Committee::where('id',$id)->first();

    	$data = [];
        $data['committeeById'] = $committeeById;

    	// echo'<pre>';
    	//  var_dump($committeeById);

    	return view('pages.committee-edit', $data);
    }

  

    public function editClub($id){
    	$clubById = Club::where('id',$id)->first();

    	$data = [];
    	$data['clubById'] = $clubById;

    	return view('pages.club-edit',$data);
		// echo'<pre>';
  		// var_dump($clubById);

    }


    public function updateCommittee(Request $req){

    	$committee = Committee::find($req->committee_id);
    	

    	// $committee = Committee::create([

    	// $committee->committee_name = $req->input('inptCommittee'),

    	// ]);


    	$committee->committee_name = $req->inptCommittee;

    	$committee->save();

        return redirect('/admin/committee/list')->with('msg','Committee Updated Successfully');

    }


    public function updateClub(Request $req){
    	$club = Club::find($req->club_id);

    	$club->club_name = $req->inptClub;
    	$club->save();

    	return redirect('/admin/club/list')->with('msg','Club Updated Successfully');
    }


    public function deleteCommittee($id){
    	$committee = Committee::find($id);
    	$committee->delete();

    	return redirect('/admin/committee/list')->with('msg','Committee Deleted Successfully');

    }

    public function deleteClub($id){
    	$club = Club::find($id);
    	$club->delete();

    	return redirect('/admin/club/list')->with('msg','Club Deleted Successfully');
    }

    

    // public function committeeEventsearch(Request $req){

    //     $event_name = $req->input('inptSearchEvent');
    //     $committee_name = $req->input('InptSearchCommittee');

    //     if($committee_name == NULL)

    //     // $events = Events::all();
    //     // $committees = Committee::all();
    //     // $eventsData['events'] = $events;

    //     // echo'<pre>';
    //     // var_dump($event_name);
    //     // var_dump($committee_name);
    //     // die();

       
    //     // $committees = EventRegistration::where('committee_id', '=', $committee_name)->first();

    // {   
    //     $events = DB::table('event_registration')
    //         ->join('events', 'event_registration.event_id', '=', 'events.id')
    //         ->join('committee', 'event_registration.committee_id' , '=', 'committee.id')
    //         ->join('users', 'event_registration.user_id' , '=', 'users.id')
    //         ->select('events.name as event_name','committee.committee_name','event_registration.event_id','users.name')
    //         ->where('event_id', $event_name)
    //         ->get();

    //          $dataEvents['events'] = $events;

    //          return view('pages.event-wise-user',$dataEvents);

    // }


    // elseif($event_name == NULL){

    //     $committees = DB::table('event_registration')
    //         ->join('users', 'event_registration.user_id' , '=', 'users.id')
    //         ->join('committee', 'event_registration.committee_id' , '=', 'committee.id')
    //         ->join('clubs', 'event_registration.club_id' , '=', 'clubs.id')
    //         ->select('users.name','committee.committee_name','clubs.club_name')
    //         ->where('committee_id', $committee_name)  
    //         ->get();

    //     $dataCommittees['committees'] = $committees;

        


    //     return view('pages.committee-wise-user',$dataCommittees);

    //     }


    //     elseif($committee_name != NULL && $event_name != NULL){

    //     $eventsNcommittees = DB::table('event_registration')
    //         ->join('events', 'event_registration.event_id', '=', 'events.id')
    //         ->join('users', 'event_registration.user_id' , '=', 'users.id')
    //         ->join('committee', 'event_registration.committee_id' , '=', 'committee.id')
    //         ->join('clubs', 'event_registration.club_id' , '=', 'clubs.id')
    //         ->select('events.name as event_name','users.name','committee.committee_name','clubs.club_name')
    //         ->where('event_id', $event_name)
    //         ->where('committee_id', $committee_name)
    //         ->get();

    //     $dataEventsNcommittee['eventsNcommittees'] = $eventsNcommittees;

        


    //     return view('pages.eventsNcommittee-wise-user',$dataEventsNcommittee);


    //     }

    // }

    public function noticeUpload(){

        $committeeNames = Committee::all();
                    
        $eventNames = Events::all();
        $data['eventNames'] = $eventNames;

        // echo '<pre>';
        // var_dump($committeeNames);

        // die();

        // echo '<pre>';
        // echo Auth::user()->id;
        // print_r(count($userEvents));
        // die();


       return view('pages.admin-notice-upload',$data);
      
    }

    public function commiitteeWiseUpload(Request $req){

        // $file = $req->file('adminNotice');

        $eventId = $req->input('inptEvent');
            
        $file = $req->file('adminNotice');

        $uploadDest = 'uploads/app/'.Date('Y/m/d').'/';
        $fieExt = '.'.$file->getClientOriginalExtension();
        $fileBaseName = basename($file->getClientOriginalName(), $fieExt);
        $fileName = $fileBaseName.time().$fieExt;



        $imagePath = $uploadDest.$fileName;
        // echo'<pre>';
        // var_dump($imagePath);
        // die();
                $user = NoticeUpload::create([
                    'event_id' => $req->input('inptEvent'),
                    'committee_id' => $req->input('inptCommittee'),
                    'file_name'=> $file->getClientOriginalName(),
                    'file_path' => $imagePath,
                    ]);

        // echo'<pre>';
        // var_dump($req->input('inptCommittee'));
        // die();
        $file->move($uploadDest,$fileName);
        return redirect()->route('admin-notice-upload');
    }


}
