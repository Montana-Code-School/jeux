<?php

namespace App\Http\Controllers;

use App\Game;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class GameController extends Controller
{
    public function saveGameApiData()
    {
      // $client = new Client();
      // $res = $client->request('GET', 'https://www.boardgamegeek.com/xmlapi2/boardgame',[
      //
      // ]

      // $array = json_decode(json_encode($res->getBody()), true);
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
        $game = new Game();
        $game->column1 = $request->column1;
        $game->column2 = $request->column2;
        $game->column3 = $request->column3;
        $game->column4 = $request->column4;

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

      $game->column1 = $request->column1;
      $game->column2 = $request->column2;
      $game->column3 = $request->column3;
      $game->column4 = $request->column4;

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
