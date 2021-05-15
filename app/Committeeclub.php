<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Committeeclub extends Model
{
    protected $table = 'comm_n_club';

    protected $fillable = [

    	'committee_id', 'club_id', 'event_id', 'created_at', 'updated_at',
    ];
}
