<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventRegistration extends Model
{
    protected $table = 'event_registration';

    protected $fillable = ['user_id','event_id','committee_id','club_id','previous_experience','accommodation','food','visa_requirement','passport_name','passport_no','expiry_date','dob','willingness_to_perform','performance_name',];


    public function eventRegistration()
    {
        return $this->belongsTo('App\EventRegistration');
    }

}
