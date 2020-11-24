<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manager extends Model implements \Illuminate\Contracts\Auth\Authenticatable
{
    use HasFactory;
    use Authenticatable;

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

    public function getAuthIdentifierName()
    {
        // TODO: Implement getAuthIdentifierName() method.

        return 'manager_email';
    }

    public function getAuthIdentifier()
    {
        // TODO: Implement getAuthIdentifier() method.

        return $this->getAttributeValue('manager_email');
    }

    public function getAuthPassword()
    {
        // TODO: Implement getAuthPassword() method.

        return $this->getAttributeValue('manager_password');
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
