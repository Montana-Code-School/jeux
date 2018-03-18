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
      $user = Auth::user();

      return view('settings', compact('user'));
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

        TODO determine what happens if user does not exist
        TODO determine if game is borrowed by profile user
        TODO determine profile user borrowed game count
        TODO determine profile user lended game count
        TODO determine profile user total owned games
        */

        $user_profile = User::with('inventory', 'friends')->where('username', $username)->first();
        $user_game_ids = [];

        foreach($user_profile->inventory as $inventory) {
            array_push($user_game_ids, $inventory->game_id);
        }

        // Setup for Auth User
        $auth_user = Auth::User(); // Get Authenticated user information
        $auth_friends = $auth_user->friends; // Get Auth user friends
        $auth_friends_ids = array(); // create easily searchable array of friend IDs

        // Add friend user IDs to auth_friends_ids
        foreach($auth_friends as $friend) {
            array_push($auth_friends_ids, $friend->id);
        }

        // Set Authenticated user information
        $data['authUser'] = [
            'id'=>$auth_user->id,
            'image'=>$auth_user->image,
            'username'=>$auth_user->username,
            'email'=>$auth_user->email,
            'name'=>$auth_user->name,
        ];

        $user_profile = User::with('inventory')->where('username', $username)->first();

        if(array_search($user_profile->id, $auth_friends_ids) !== false || $auth_user->id === $user_profile->id) {
            $is_friend = true;
        } else {
            $is_friend = false;
        }

        $data['userProfile'] = [
            'id'=>$user_profile->id,
            'image'=>$user_profile->image,
            'username'=>$user_profile->username,
            'email'=>$user_profile->email,
            'name'=>$user_profile->name,
            'is_friend'=>$is_friend,
        ];

        $game_model = new Game();
        $data['games'] = $game_model->gameInfo($user_game_ids);

        return view('user', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
      $user = Auth::user();

      $user->name = $request->input('name');
      //$user->image = $request->image;
      $user->username = $request->input('username');
      $user->email = $request->input('email');
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
