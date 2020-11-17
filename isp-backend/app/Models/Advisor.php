<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advisor extends Model
{
    use HasFactory;

    protected $primaryKey = 'advisor_id';

    public function groups(){
        return $this->hasMany('App\Models\Group');
    }
}
