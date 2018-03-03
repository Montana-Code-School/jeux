<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Notifications\Notifiable;

class User extends Model implements Authenticatable
{


    protected $fillable = ['name', 'email', 'password', 'username', 'token'];

    use AuthenticableTrait;
    use Notifiable;

    protected $hidden = ['password', 'token', 'remember_token'];

    public function friends() {
      return $this->belongsToMany('App\User', 'friends', 'user_id', 'friend_id');
    }

    public function inventory() {
      return $this->hasMany('App\Inventory', 'owner_id');
    }

    //@TODO needs notification

}
