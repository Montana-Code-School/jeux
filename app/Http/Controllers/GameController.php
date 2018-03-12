<?php

namespace App\Http\Controllers;

use App\Game;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class GameController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games = Game::get();



        //return view('browse', compact('games'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    //TODO:: add after MVP

      $game = new Game();
      $game->name = $request->name;
      $game->image = $request->image;
      $game->year = $request->yearpublished;
      $game->player_count = $request->player_count;
      $game->min_age = $request->min_age;
      $game->min_play = $rerquest->min_play;
      $game->max_play = $request->max_play;
      $game->description = $request->description;
      $game->instructions = $request->instructions;

      $game->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
      $games = Game::paginate(8);

        return view('browse', ['games' => $games]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $game = App\Game::find($id);
      //TODO:: make sure that when people are filling out the form that
      // that the old information is staying with the information.
      $game->name = $request->name;
      $game->image = $request->image;
      $game->year = $request->year;
      $game->player_count = $request->player_count;
      $game->min_age = $request->min_age;
      $game->min_play = $request->min_play;
      $game->max_play = $request->max_play;
      $game->description = $request->description;
      $game->instructions = $request->instructions;

      $game->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $game = App\Game::find($id);

        $game->delete();
    }
}
