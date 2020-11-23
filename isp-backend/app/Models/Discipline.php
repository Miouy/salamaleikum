<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discipline extends Model
{
    use HasFactory;

    protected $primaryKey = 'discipline_id';

    public function student_marks()
    {
        return $this->hasMany('App\Models\StudentMark');
    }

    public function course()
    {
        return $this->belongsTo('App\Models\Course');
    }

}
