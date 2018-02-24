<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    public function owner() {
      return $this->belongsTo('App\User');
    }

    public function borrower() {
      return $this->belongsTo('App\User');
    }
}
