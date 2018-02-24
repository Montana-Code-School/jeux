<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class User extends Model implements Authenticatable
{


    // Here we will need to Query the database in the Users Table that if
    // user_id has a friend_id, then they are equal on each side
    // user_id 51 has friend_id 2 then user_id 2 has friend_id 51
    protected $fillable = ['name', 'email', 'password', 'username', 'token'];

    use AuthenticableTrait;


    protected $hidden = ['password', 'token', 'remember_token'];

    public function friends() {
      return $this->belongsToMany('App\User', 'friends', 'user_id', 'friend_id');
    }

    public function inventory() {
      return $this->hasMany('App\Inventory', 'owner_id');
    }

    //@TODO needs notification

}
