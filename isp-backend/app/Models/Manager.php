<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    use HasFactory;

    protected $primaryKey = 'manager_id';

    protected $hidden = [
        'manager_password', 'remember_token',
    ];

    public function getHiddenAttributes()
    {
        return $this->getHidden();
    }

    public function specialties(){
        return $this->hasMany('App\Models\Specialty');
    }
}
