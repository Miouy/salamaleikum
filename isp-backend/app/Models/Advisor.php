<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advisor extends Model
{
    use HasFactory;

    protected $primaryKey = 'advisor_id';

    protected $hidden = [
        'advisor_password', 'remember_token',
    ];

    public function getHiddenAttributes()
    {
        return $this->getHidden();
    }

    public function groups(){
        return $this->hasMany('App\Models\Group');
    }
}
