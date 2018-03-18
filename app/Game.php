<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class Game extends Model
{
  use Notifiable;

    public function owner() {
      return $this->belongsToMany('App\User', 'inventories', 'owner_id', 'game_id');
    }

    public function borrower() {
      return $this->belongsTo('App\User');
    }

    public function inventory() {
      return $this->hasMany('App\Inventory', 'game_id');
    }

    public function gameInfo($game_ids) {
        $games =[];
        // setup auth user friend and game ids
        $auth_user = Auth::user()->with('friends', 'inventory')->first();
        $auth_game_ids = [];
        $auth_friend_ids = [];

        foreach ($auth_user->friends as $friend) {
            array_push($auth_friend_ids, $friend->id);
        }

        foreach ($auth_user->inventory as $game) {
            array_push($auth_game_ids, $game->game_id);
        }

        // loop through all games provided
        foreach ($game_ids as $game_id) {
            $gameQuery = Game::with('inventory')->where('id', $game_id)->first();

            $own_game = (array_search($game_id, $auth_game_ids) !== false) ? true: false;

            $owners = [];

            foreach($gameQuery->inventory as $owner) {
                if(array_search($owner->owner_id, $auth_friend_ids) !== false) {
                    $user = User::find($owner->owner_id);

                    $user =[
                        'id'=>$user->id,
                        'username'=>$user->username,
                        'image'=>$user->image,
                    ];

                    // Add user to the owner array
                    array_push($owners, $user);
                }
            }

            $game = [
                'game_id'=>$gameQuery->id,
                'own_game'=>$own_game,
                'name'=>$gameQuery->name,
                'image'=>$gameQuery->image,
                'year'=>$gameQuery->year,
                'min_player'=>$gameQuery->min_player,
                'max_player'=>$gameQuery->max_player,
                'min_age'=>$gameQuery->min_age,
                'min_play'=>$gameQuery->min_play,
                'max_play'=>$gameQuery->max_play,
                'description'=>$gameQuery->description,
                'instructions'=>$gameQuery->instructions,
                'owner'=>$owners,
            ];

            array_push($games, $game);
        }

        return $games;
    }
}
