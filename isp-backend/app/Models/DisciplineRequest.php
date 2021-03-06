<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DisciplineRequest extends Model
{
    use HasFactory;

    protected $primaryKey = 'discipline_request_id';

    public function disciplines()
    {
        return $this->hasMany('App\Models\Discipline');
    }

    public function studentRequest(){
        return $this->belongsTo('App\Models\StudentRequest');
    }
}
