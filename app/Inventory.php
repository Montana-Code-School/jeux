<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    public function game() {
      return $this->hasOne('App\Game');
    }
}
