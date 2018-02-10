<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class User extends Model implements Authenticatable
{
    //
    protected $fillable = ['name', 'email', 'password', 'username', 'token'];

    use AuthenticableTrait;
}
