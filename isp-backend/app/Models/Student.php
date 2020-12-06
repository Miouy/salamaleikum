<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Student extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $primaryKey = 'student_id';

    protected $hidden = [
        'student_password', 'remember_token',
    ];

    public function group()
    {
        return $this->belongsTo('App\Models\Group');
    }

    public function studentMarks()
    {
        return $this->hasMany('App\Models\StudentMark');
    }

    public function studentRequests()
    {
        return $this->hasMany('App\Models\StudentRequest');
    }
}
