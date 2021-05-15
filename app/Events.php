<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\EventRegistration;

class Events extends Model
{
     protected $table = 'events';

     protected $fillable = [
        'id', 'name','created_at','updated_at',
    ];

    //  public function event()
    // {
    //     return $this->hasOne('App\EventRegistration');
    // }


}
