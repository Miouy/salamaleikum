<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialty extends Model
{
    use HasFactory;

    protected $primaryKey = 'specialty_id';

    public function manager(){
        return $this->belongsTo('App\Models\Manager');
    }

    public function courses(){
        return $this->hasMany('App\Models\Course');
    }
}
