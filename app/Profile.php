<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
	 protected $table = 'userprofile';

     protected $fillable = [
        'user_id', 'img_name','img_path','full_name','gender','dob','country','nationality','residence_address','user_email','phone_no','contact_person_name','contact_person_phone_no','relationship','passport_no','facebook_profile','academic_qualification','university_name','university_address','study_field','current_semester','medical_condition','allergies_preference','created_at','updated_at',
    ];

   
     public function user()
    {
        return $this->belongsTo('App\User');
    }

}
