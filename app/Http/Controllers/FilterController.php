<?php

use App\Game;
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FilterController extends Controller
{
    public function filter(Request $request, Game $game)
    {
      $game = $game->newQuery();

      //Search by Age
      if($request->had('age')){
        $game->where('age', $request->input('age'));
      }
    }
    return $game->get();
}
