<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Advisor extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $primaryKey = 'advisor_id';

    protected $hidden = [
        'advisor_password', 'remember_token',
    ];

    public function groups(){
        return $this->hasMany('App\Models\Group');
    }
}
