<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NoticeUpload extends Model
{
     protected $table = 'notice_upload';

     protected $fillable = [
        'event_id', 'committee_id','file_name','file_path','created_at','updated_at',
    ];
}
