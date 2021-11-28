<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','birthday', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
     public static $rules = array(
        'name' => 'required',
        'birthday' => 'required',
        'email' => 'required',
    );
    
    public function diaries() {
        return $this->hasMany('App\Diary');
    }
    
    
    // Override
    public function sendEmailVerificationNotification()
    {
    $this->notify(new \App\Notifications\VerifyEmailJapanese);
    }
    
}

