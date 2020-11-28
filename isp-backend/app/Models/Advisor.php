<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advisor extends Model implements \Illuminate\Contracts\Auth\Authenticatable
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

    public function getAuthIdentifierName()
    {
        // TODO: Implement getAuthIdentifierName() method.

        return 'advisor_email';
    }

    public function getAuthIdentifier()
    {
        // TODO: Implement getAuthIdentifier() method.

        return $this->getAttributeValue('advisor_email');
    }

    public function getAuthPassword()
    {
        // TODO: Implement getAuthPassword() method.

        return $this->getAttributeValue('advisor_password');
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
