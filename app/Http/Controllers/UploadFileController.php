<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\AdminUpload;

class UploadFileController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
      return view('pages.user-admin');
   }
	   public function showUploadFile(Request $request){
	      $file = $request->file('file');
	   
	      //Display File Name
	      echo 'File Name: '.$file->getClientOriginalName();
	      echo '<br>';
	   
	      //Display File Extension
	      echo 'File Extension: '.$file->getClientOriginalExtension();
	      echo '<br>';
	   
	      //Display File Real Path
	      echo 'File Real Path: '.$file->getRealPath();
	      echo '<br>';
	   
	      //Display File Size
	      echo 'File Size: '.$file->getSize();
	      echo '<br>';
	   
	      //Display File Mime Type
	      echo 'File Mime Type: '.$file->getMimeType();
	   
	      //Move Uploaded File
	      $destinationPath = 'uploads';
	      $file->move($destinationPath,$file->getClientOriginalName());
	   }

	   public function adminUpload(Request $req){


	   		$user_id = $req->input('inptUserId');
	   		$event_id = $req->input('inptEventId');



	  //  		echo'<pre>';
			// var_dump($event_id);
			// die();


	   		$file = $req->file('upload_notice');
			$uploadDest = 'uploads/app/'.Date('Y/m/d').'/';
			$fieExt = '.'.$file->getClientOriginalExtension();
			$fileBaseName = basename($file->getClientOriginalName(), $fieExt);
			$fileName = $fileBaseName.time().$user_id.$fieExt;

			$imagePath = $uploadDest.$fileName;


			$user = AdminUpload::create([

			'event_id' => $event_id,
			'file_name'=> $file->getClientOriginalName(),
			'file_path' => $imagePath,

			]);

			// echo'<pre>';
			// var_dump($user);
			// die();

			$file->move($uploadDest,$fileName);
	   }


	    public function downloadFile($path){

	       		if (file_exists($path)) {
        		return Response::download($path);
    			}
	       		


	       }

}
