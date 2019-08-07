<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Account extends Authenticatable
{
	use Notifiable;

    protected $table = 'aAccount';

    protected $guard = 'admin';

    public $timestamps = false;
    
    protected $fillable = [
        'cMobile','password',
    ];
}
