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
      /*
        The show method gets a users profile and return a list of games owned
        and borrowed by that user.

        TODO need to determine if person is friend
        TODO determine what happens if use does not exist?
        TODO determine if game is in Auth User Inventory
        TODO determine if game is borrowed by profile user
        TODO determine profile user borrowed game count
        TODO determine profile user lended game count
        TODO determine profile user total owned games
      */

      // Get Authenticated user information
      $authUser = Auth::User();

      // Set Authenticated user information
      $data['authUser'] = [
        'id'=>$authUser->id,
        'image'=>$authUser->image,
        'username'=>$authUser->username,
        'email'=>$authUser->email,
        'name'=>$authUser->name,
      ];


      // Get user profile information with user inventory
      $userProfile = User::with('inventory')->where('username', $username)->get();
      // Set user profile information
      $data['userProfile'] = [
        'id'=>$userProfile[0]->id,
        'image'=>$userProfile[0]->image,
        'username'=>$userProfile[0]->username,
        'email'=>$userProfile[0]->email,
        'name'=>$userProfile[0]->name,
      ];

      // Profile Users Games
      $inventory = $userProfile[0]->inventory;
      $data['games'] = [];

      for($i = 0; $i < sizeof($inventory); $i++) {

        // Get game information
        $gameQuery = Game::find($inventory[$i]->id);

        // Set game information
        $game = [
          'game_id'=>$gameQuery->game_id,
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
          'borrower_id'=>$inventory[$i]->borrower_id,
        ];

        array_push($data['games'], $game);
      }

      // return $data for the view
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
