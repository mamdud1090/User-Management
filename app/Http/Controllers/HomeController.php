<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use DB;
use App\User;
use App\Club;
use App\Profile;
use App\Events;
use App\Committee;
use App\EventRegistration;
use App\Payments;

use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {



        $data = [];
        $user_id = Auth::user()->id;
        $userType = Auth::user()->user_type;

        if ($userType == "sys_admin") 

        {

                $allUsers = DB::table('event_registration')
                            ->join('events', 'event_registration.event_id', '=', 'events.id')
                            ->join('committee', 'event_registration.committee_id', '=', 'committee.id')
                            ->join('clubs', 'event_registration.club_id' , '=', 'clubs.id')
                            ->join('users', 'event_registration.user_id' , '=', 'users.id')
                            ->leftjoin('userprofile', 'event_registration.user_id' , '=', 'userprofile.user_id')
                            ->leftjoin('payments', 'event_registration.id' , '=', 'payments.event_registration_id')
                            ->select('events.name', 'event_registration.event_id', 'events.id as event_id', 'committee.committee_name', 'clubs.club_name', 'users.name as user_name', 'committee.id as committee_id', 'userprofile.img_path', 'payments.ssl_status')
                            ->get();

               
                // $userProfiles = User::find($user_id)->profile()->first();

                $userProfiles = Profile::all();         
                $data['userProfiles'] = $userProfiles;


                $data['allUsers'] = $allUsers;


                 // $committees = Committee::all();

                // echo'<pre>';
                 $events = Events::all();
                  $committees = Committee::all();
                  

                 // var_dump($events);

                 // die();



                 // $committeeData['committees'] = $committees;
                 $eventsData['events'] = $events;
                 $committeesData['committees'] = $committees;

                 // echo'<pre>'; var_dump($allUsers);


                return view('pages.user-admin', compact('allUsers', 'events','committees'));

                // return view('controller.view', compact('users','projects','foods'));

        }
        else
        {

            $data['conferences'] = DB::table('event_registration')
                            ->join('events', 'event_registration.event_id', '=', 'events.id')
                            ->join('committee', 'event_registration.committee_id' , '=', 'committee.id')
                            ->join('clubs', 'event_registration.club_id' , '=', 'clubs.id')
                            ->leftjoin('notice_upload', 'event_registration.committee_id' , '=', 'notice_upload.committee_id')
                            ->leftjoin('payments', 'event_registration.id' , '=', 'payments.event_registration_id')
                            ->select('event_registration.id', 'events.name','event_registration.event_id','committee.committee_name','clubs.club_name','notice_upload.file_path','notice_upload.file_name', 'payments.ssl_status')
                            ->where('event_registration.user_id' , $user_id)
                            ->get();



            $data['userProfile'] = User::find($user_id)->profile()->first();
            
            $regEventIds = array();
            foreach ($data['conferences'] as $key => $value) {
                $regEventIds[$key] = $value->event_id;
            }


            $data['events'] = DB::table('events')
                            ->whereNotIn('events.id', $regEventIds)
                            ->get();

            return view('pages.user-details-info', $data);
        }
   
    }
 
}
