<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $primaryKey = 'student_id';

    protected $hidden = [
        'student_password', 'remember_token',
    ];

    public function group()
    {
        return $this->belongsTo('App\Models\Group');
    }

    public function student_marks()
    {
        return $this->hasMany('App\Models\StudentMark');
    }
}
