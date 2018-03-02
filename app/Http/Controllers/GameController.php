<?php

namespace App\Http\Controllers;

use App\Game;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class GameController extends Controller
{
  public function saveGameApiData()
      {
        $client = new Client();
        $res = $client->request('GET', 'https://www.boardgamegeek.com/xmlapi/collection/mtCodeSchoolPartTime');
        $xml = simplexml_load_string($res->getBody(),'SimpleXMLElement',LIBXML_NOCDATA);

        $json = json_encode($xml);

        $array = json_decode($json, false);

        $data = [];
        $data["json"] = $array;

        return view('test', $data);


      }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games = Game::all();
        return view('browse', compact('games'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //TODO:: Does the store need an id?
      
        $game = new Game();
        $game->name = $request->name;
        $game->image = $request->image;
        $game->year = $request->year;
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
    public function show($id)
    {
        $data = [];
        $game = Game::find($id);
        $data[ ] = $game;
        return view('browse', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
      $game->min_play = $rerquest->min_play;
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
