<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model implements \Illuminate\Contracts\Auth\Authenticatable
{
    use HasFactory;

    protected $primaryKey = 'student_id';

    protected $hidden = [
        'student_password', 'remember_token',
    ];

    public function group()
    {
        return $this->belongsTo('App\Models\Group');
    }

    public function student_marks()
    {
        return $this->hasMany('App\Models\StudentMark');
    }

    public function getHiddenAttributes()
    {
        return $this->getHidden();
    }

    public function getAuthIdentifierName()
    {
        // TODO: Implement getAuthIdentifierName() method.

        return 'student_id';
    }

    public function getAuthIdentifier()
    {
        // TODO: Implement getAuthIdentifier() method.

        return $this->getAttributeValue('student_id');
    }

    public function getAuthPassword()
    {
        // TODO: Implement getAuthPassword() method.

        return $this->getAttributeValue('student_password');
    }

    public function getRememberToken()
    {
        // TODO: Implement getRememberToken() method.

        return $this->getAttributeValue('remember_token');
    }

    public function setRememberToken($value)
    {
        // TODO: Implement setRememberToken() method.

        $this->setAttribute('remember_token', $value);
        $this->save();
    }

    public function getRememberTokenName()
    {
        // TODO: Implement getRememberTokenName() method.

        return 'remember_token';
    }
}
