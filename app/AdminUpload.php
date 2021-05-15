<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminUpload extends Model
{
    protected $table = 'admin_upload';

     protected $fillable = [
        'user_id', 'file_name','file_path','created_at','updated_at',
    ];

}
