<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Virtual extends Model
{
    protected $table = 'meetings';
  

    protected $fillable = [
        'v_event',
        'e_start',
        't_start',
        'e_end',
        't_end',
        'p_num',
        'focal_p',
        'center',
        'link'
    ];
    
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'uname_verified_at' => 'datetime',
    ];

}