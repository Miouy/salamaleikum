<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentMark extends Model
{
    use HasFactory;

    protected $primaryKey = 'student_mark_id';

    public function student()
    {
        return $this->belongsTo('App\Models\Student');
    }

    public function discipline()
    {
        return $this->belongsTo('App\Models\Discipline');
    }
}
