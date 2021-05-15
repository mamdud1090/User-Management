<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    protected $table = 'clubs';	

    protected $fillable = [
    'committee_id','club_name','created_at','updated_at',
    ];
}
