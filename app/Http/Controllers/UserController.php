<?php
//TODO::put notifications stuff in here!

namespace App\Http\Controllers;

use App\User;
use App\Game;
use App\Inventory;

use Illuminate\Notifications\Notification;
use Illuminate\Http\Request;
use App\Notifications\FriendRequest;
use App\Notifications\BorrowRequest;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::get();
          return view('user', compact('users'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($username)
    {
      // Get Authenticated user information
      $authUser = Auth::User();

      $data['authUser'] = [
        'id'=>$authUser->id,
        'image'=>$authUser->image,
        'username'=>$authUser->username,
        'email'=>$authUser->email,
        'name'=>$authUser->name,
      ];

      // Get user profile information with user inventory
      $userProfile = User::with('inventory')->where('username', $username)->get();

      // TODO need to determine if person is friend

      // Set user profile information
      $data['userProfile'] = [
        'id'=>$userProfile[0]->id,
        'image'=>$userProfile[0]->image,
        'username'=>$userProfile[0]->username,
        'email'=>$userProfile[0]->email,
        'name'=>$userProfile[0]->name,
      ];

      // Get game information
      $inventory = $userProfile[0]->inventory;
      $data['games'] = [];
      dd($inventory);
      for($i = 0; $i < sizeof($inventory); $i++) {
        $gameQuery = Game::find($inventory[$i]->id);
        // dd($gameQuery);


        // set game information
        $game = [
          'game_id'=>$gameQuery->game_id,
          'image'=>$gameQuery->image,
          'year'=>$gameQuery->year,
          'min_player'=>$gameQuery->min_player,
          'max_player'=>$gameQuery->max_player,
          'min_age'=>$gameQuery->min_age,
          'min_play'=>$gameQuery->min_play,
          'max_play'=>$gameQuery->max_play,
          'description'=>$gameQuery->description,
          'instructions'=>$gameQuery->instructions,
          'borrower_id'=>$inventory[$i]->borrower_id,
        ];

        array_push($data['games'], $game);
      }

       return view('user', ['data' => $data]);
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
      $user = User::find($id);
      //TODO:: make sure that when people are filling out the form that
      // that the old information is staying with the information.
      $user->name = $request->name;
      $user->image = $request->image;
      $user->username = $request->username;
      $user->email = $request->email;

      $user->save();
    }

    public function makeFriend($id)
    {
      $friend = User::find($id);
      Auth::user()->friends()->attach($friend);
      $friend->notify(new FriendRequest(Auth::user()));
    }

    public function borrowGame($inventory_id)
    {
      $borrower = Auth::user();
      $owner_id = Inventory::find($inventory_id)->owner_id;
      $owner = User::find($owner_id);
      $game_id = Inventory::find($inventory_id)->game_id;
      $game = Game::find($game_id);
      $owner->notify(new BorrowRequest($borrower, $game));

    }

    public function notificationRead($notification_id)
    {

      $user = Auth::user();
      $notification = $user->unreadNotifications->find($notification_id);
      $notification->markAsRead();

    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $user = User::find($id);

      $user->delete();
    }


    public function showSettings() {
        return view('settings');
    }
}
