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
        $user = User::with('inventory', 'friends')->where('username', $username)->get();
        $data['user'] = $user;
        $user->notify(new FriendRequest($user[0]));

         return view('user')->with($data);
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
