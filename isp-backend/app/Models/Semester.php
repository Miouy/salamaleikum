<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    use HasFactory;

    protected $primaryKey = 'semester_id';

    public function course(){
        return $this->belongsTo('App\Models\Course');
    }

    public function disciplines()
    {
        return $this->hasMany('App\Models\Discipline');
    }
}
