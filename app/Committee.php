<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Committee extends Model
{
    protected $table = 'committee';	

    protected $fillable = ['committee_name','created_at','updated_at',];


    public function noticeUploads()
    {
        return $this->hasMany('App\NoticeUpload');

    }
}
