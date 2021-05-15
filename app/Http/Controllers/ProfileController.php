<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Profile;
use App\Admin;
use Auth;

class ProfileController extends Controller
{


	public function __construct()
    {
        $this->middleware('auth');
    }

    // var a = "x";
    // var b = getB(100);
    // getB(a)

    public function insertUser(Request $req){
    	$user_id = Auth::user()->id;
		$profileObj = Profile::where('user_id', $user_id)->first();
		$checkrProfile = count($profileObj);


		Auth::user()->name = $req->input('inptFullName');
		Auth::user()->save();

		if ($checkrProfile > 0) {

			$data = [
			    		'user_id' => $user_id,
			    		'full_name' => $req->input('inptFullName'),
			    		'gender' => $req->input('gender'),
			    		'dob' => $req->input('inptDateOfBirth'),
			    		'country' => $req->input('inptCountry'),
				    	'nationality' => $req->input('inptNationality'),
				    	'residence_address' => $req->input('inptResidenceAddress'),
				    	
				    	'phone_no' => $req->input('inptPhone'),
				    	'contact_person_name' => $req->input('inptEmergencyContactPerson'),
				    	'contact_person_phone_no' => $req->input('inptEmergencyPersonContactNo'),
				    	'relationship' => $req->input('inptRelationWithTheAforementioned'),
				    	'passport_no' => $req->input('inptPassportNumber'),
				    	'facebook_profile' => $req->input('inptFacebookProfileLink'),
				    	'academic_qualification' => $req->input('inptAcademicQualification'),
				    	'university_name' => $req->input('inptUniversity'),
				    	'university_address' => $req->input('inptUniversityAddress'),
				    	'study_field' => $req->input('inptFieldOfStudy'),
				    	'current_semester' => $req->input('inptCurrentYearSemester'),
				    	'medical_condition' => $req->input('inptMedicalCondition'),
				    	'allergies_preference' => $req->input('inptAllergiesOrPreference'),
			    		];

			$file = $req->file('user_photo');
			if ($file) {
				$uploadDest = 'uploads/app/'.Date('Y/m/d').'/';
				$fieExt = '.'.$file->getClientOriginalExtension();
				$fileBaseName = basename($file->getClientOriginalName(), $fieExt);
				$fileName = $fileBaseName.time().$user_id.$fieExt;

				$imagePath = $uploadDest.$fileName;
				$data['img_name']= $file->getClientOriginalName();
				$data['img_path'] = $imagePath;

				$file->move($uploadDest,$fileName);
				unlink($profileObj->img_path);
			}

    	     $user = Profile::where('id', $profileObj->id)
				    	   ->update($data);

    

			 $req->session()->flash('status', 'Profile updated successfully!');

		}
		else
		{
			$file = $req->file('user_photo');
			$uploadDest = 'uploads/app/'.Date('Y/m/d').'/';
			$fieExt = '.'.$file->getClientOriginalExtension();
			$fileBaseName = basename($file->getClientOriginalName(), $fieExt);
			$fileName = $fileBaseName.time().$user_id.$fieExt;

			$imagePath = $uploadDest.$fileName;
			$user = Profile::create([
			'user_id' => $user_id,
			'img_name'=> $file->getClientOriginalName(),
			'img_path' => $imagePath,
			'full_name' => $req->input('inptFullName'),
			'gender' => $req->input('gender'),
			'dob' => $req->input('inptDateOfBirth'),
			'country' => $req->input('inptCountry'),
			'nationality' => $req->input('inptNationality'),
			'residence_address' => $req->input('inptResidenceAddress'),
			
			'phone_no' => $req->input('inptPhone'),
			'contact_person_name' => $req->input('inptEmergencyContactPerson'),
			'contact_person_phone_no' => $req->input('inptEmergencyPersonContactNo'),
			'relationship' => $req->input('inptRelationWithTheAforementioned'),
			'passport_no' => $req->input('inptPassportNumber'),
			'facebook_profile' => $req->input('inptFacebookProfileLink'),
			'academic_qualification' => $req->input('inptAcademicQualification'),
			'university_name' => $req->input('inptUniversity'),
			'university_address' => $req->input('inptUniversityAddress'),
			'study_field' => $req->input('inptFieldOfStudy'),
			'current_semester' => $req->input('inptCurrentYearSemester'),
			'medical_condition' => $req->input('inptMedicalCondition'),
			'allergies_preference' => $req->input('inptAllergiesOrPreference'),
			]);

			$file->move($uploadDest,$fileName);

    	   $req->session()->flash('status', 'Profile saved successfully!');
    	   
		}

    	// echo "<pre>";
    	// var_dump($user);

    	// $user_id = User::find(2)->profile()->get();
    	
    	// $user_id = User::find(Auth::user()->id)->profile()->get();

    	// var_dump($user_id);

		return redirect()->route('home');

                // echo '<img src"uploads/"'.$file->getClientOriginalName().'">';
	
    }



    public function editUser(Request $request)
	{


        // $user_id = Profile::where('user_id', request('user_id')->first();
		// return (count($user_id) > 0 ? 'Email Exist' : 'Email Not Exist');



		// $checkUser = \Auth::user()->id;

		$profileObj = Profile::where('user_id', Auth::user()->id)->first();
		$checkrProfile = count($profileObj);
		// Auth::user()->name = "Ridoy";
		// Auth::user()->save();
		// $request->session()->flash('status', 'Task was successful!');
		// echo "<pre>";
		// var_dump($checkrProfile);
		// return redirect()->route('home');
		// die();

		return view('pages.user-edit', ['hasProfile'=>$checkrProfile, 'data'=>$profileObj]);

	}





    function updateUser(Request $request){

    	// $profileObj = Profile::where('user_id', Auth::user()->id)->first();
    	// 'data'=>$profileObj;


    	// $newUser = Profile::updateOrCreate([
    //Add unique field combo to match here
    //For example, perhaps you only want one entry per user:
	//     'user_id'   => Auth::user()->id,
	// ],[
	//     'full_name'     => $request->input('full_name'),
	//     'gender' => $request->input('gender'),
	//     'dob'    => $request->input("dob"),
	//     'country'   => $request->input('country'),
	//     'nationality'   => $request->input('nationality'),
	//     'residence_address'   => $request->input('residence_address'),
	//     'user_email'    => $request->input('user_email'),
	//     'phone_no'    => $request->input('phone_no'),
	//     'contact_person_name'    => $request->input('contact_person_name'),
	//     'contact_person_phone_no'    => $request->input('contact_person_phone_no'),
	//     'relationship'    => $request->input('relationship'),
	//     'passport_no'    => $request->input('passport_no'),
	//     'facebook_profile'    => $request->input('facebook_profile')
	// ]);
	    	
	}

	    function removeUser(){
	    	
	    }


	  public function admin(Request $req){
	    	$user_id = Auth::user()->id;

	 //    	$file = $req->file('document');
		// 	if ($file) {
		// 		$uploadDest = 'uploads/app/'.Date('Y/m/d').'/';
		// 		$fieExt = '.'.$file->getClientOriginalExtension();
		// 		$fileBaseName = basename($file->getClientOriginalName(), $fieExt);
		// 		$fileName = $fileBaseName.time().$user_id.$fieExt;

		// 		$imagePath = $uploadDest.$fileName;
		// 		$data['document_name']= $file->getClientOriginalName();
		// 		$data['document_path'] = $imagePath;

		// 		$file->move($uploadDest,$fileName);
		// 	}

  //   // 	     $user = Profile::where('id', $profileObj->id)
		// 		//     	   ->update($data);

		// 	 // $req->session()->flash('status', 'Profile updated successfully!');

		// }
		// else
		// {
		// 	$file = $req->file('document');
		// 	$uploadDest = 'uploads/app/'.Date('Y/m/d').'/';
		// 	$fieExt = '.'.$file->getClientOriginalExtension();
		// 	$fileBaseName = basename($file->getClientOriginalName(), $fieExt);
		// 	$fileName = $fileBaseName.time().$user_id.$fieExt;

		// 	$imagePath = $uploadDest.$fileName;


	    	$user = Admin::create([
			'award' => $req->input('award'),
			// 'document_name'=> $file->getClientOriginalName(),
			// 'document_path' => $imagePath,
			
			]);
	    }

    

}
