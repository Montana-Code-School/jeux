<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    // Here we will need to Query the database in the Users Table that if
    // user_id has a friend_id, then they are equal on each side
    // user_id 51 has friend_id 2 then user_id 2 has friend_id 51
}
