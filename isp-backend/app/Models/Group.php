<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $primaryKey = 'group_id';

    public function students()
    {
        return $this->hasMany('App\Models\Student');
    }

    public function advisor()
    {
        return $this->belongsTo('App\Models\Advisor');
    }

    public function course()
    {
        return $this->belongsTo('App\Models\Course');
    }
}
