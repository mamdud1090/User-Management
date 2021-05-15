<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\EventRegistration;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


     public function profile()
    {
        return $this->hasOne('App\Profile');

        
        $user_profile = User::profile();

        var_dump($user_profile);

        die();



    }

     public function event()
    {
        return $this->hasOne('App\EventRegistration');
    }

}
