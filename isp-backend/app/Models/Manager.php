<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Manager extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $primaryKey = 'manager_id';

    protected $hidden = [
        'manager_password', 'remember_token',
    ];

    public function specialties(){
        return $this->hasMany('App\Models\Specialty');
    }
}
