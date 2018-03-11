<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Game extends Model
{
  use Notifiable;

    public function owner() {
      return $this->belongsTo('App\User');
    }

    public function borrower() {
      return $this->belongsTo('App\User');
    }

    public function inventory() {
      return $this->hasMany('App\Inventory', 'game_id');
    }
}
