<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentRequest extends Model
{
    use HasFactory;

    protected $primaryKey = 'student_request_id';

    public function student()
    {
        return $this->belongsTo('App\Models\Student');
    }

    public function disciplineRequests(){
        return $this->hasMany('App\Models\DisciplineRequest');
    }
}
