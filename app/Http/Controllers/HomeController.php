<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      //$user->notify(new FriendRequest($friend));
       return view('home');
    }

    public function show()
    {
      $user_profile = Auth::user();

      $user_game_ids = [];

      foreach($user_profile->inventory as $inventory) {
        $game = Game::find(1)->where('id', $inventory->game_id);
        array_push($user_game_ids, $inventory->game_id);
      }

      $game_model = new Game();

      $games = $game_model->gameInfo($user_game_ids);


      return view('home', ['data' => $games]);
    }

    public function showSearchResults(Request $request) {
        $search_games = $request->input('search-games');
        $game_ids = [];

        //% is similar a regex for sql statements when used in conjuntion with like to say "anything before and anything after"
        $paginate = Game::where('name', 'like', "%$search_games%")->paginate(12);

        foreach ($paginate as $key => $game) {
          array_push($game_ids, $game->id);
        }

        $gameModel = new Game();
        $games = $game->gameInfo($game_ids);
        // dd($paginate);
        return view('searchresults', ['search_games'=>$search_games, 'games'=>$games, 'paginate'=>$paginate]);
    }
}
