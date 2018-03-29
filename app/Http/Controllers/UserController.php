<?php
//TODO::put notifications stuff in here!

namespace App\Http\Controllers;

use App\User;
use App\Game;
use App\Inventory;
use Image;
use File;

use Illuminate\Notifications\Notification;
use Illuminate\Http\Request;
use App\Notifications\FriendRequest;
use App\Notifications\BorrowRequest;
use App\Notifications\BorrowRequestAccepted;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
     {
        $this->middleware('auth');
     }

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

      foreach ($user_profile->inventory as $inventory) {
        array_push($user_game_ids, $inventory->game_id);
      }

      // Setup for Auth User
      $auth_user = Auth::User(); // Get Authenticated user information
      $auth_friends = $auth_user->friends; // Get Auth user friends
      $auth_friends_ids = array(); // create easily searchable array of friend IDs

      // Add friend user IDs to auth_friends_ids
      foreach ($auth_friends as $friend) {
        array_push($auth_friends_ids, $friend->id);
      }

      // Set Authenticated user information
      $data['authUser'] = [
        'id'=>$auth_user->id,
        'image'=>$auth_user->image,
        'username'=>$auth_user->username,
        'email'=>$auth_user->email,
        'name'=>$auth_user->name
      ];

      $user_profile = User::with('inventory')->where('username', $username)->first();

      if (array_search($user_profile->id, $auth_friends_ids) !== false || $auth_user->id === $user_profile->id) {
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

      if ($request->hasFile('image')) {
        if($user->image != 'avatar.png') {
          File::delete('images/uploads/profile/' . $user->image);
        }
        $image = $request->file('image');
        $filename = time() . '-' . $image->getClientOriginalName();
        $user->image = $filename;
        Image::make($image)->fit(160)->save( public_path('images/uploads/profile/' . $filename ) );
      }

      $user->name = $request->input('name');
      $user->username = $request->input('username');
      $user->email = $request->input('email');
      $user->save();

        return redirect('users/' . $user->username);
    }

    public function makeFriend(Request $request)
    {
      $url = $request->server('HTTP_REFERER');

      $params = $request->query();
      $friend = User::find($params['user_id']);
      Auth::user()->friends()->attach($friend);
      $friend->notify(new FriendRequest(Auth::user()));

      return redirect($url);
    }

    public function removeFriend(Request $request)
    {
      $url = $request->server('HTTP_REFERER');

      $params = $request->query();
      $friend = Auth::user()->friends()->detach($params['user_id']);

      return redirect($url);
    }

    public function borrowGame(Request $request)
    {
      $url = $request->server('HTTP_REFERER');
      $params = $request->query();

      $borrower = Auth::user();
      $owner = User::find($params['owner_id']);
      $game = Game::find($params['game_id']);
      Log::debug(print_r($game, true));
      $owner->notify(new BorrowRequest($borrower, $game));

      return redirect($url);
    }

    public function respondToBorrowGame(Request $request)
    {
      $url = $request->server('HTTP_REFERER');
      $params = $request->query();
      $owner = User::find($params['owner_id']);
      $game = Game::find($params['game_id']);

      if ($params['can_borrow'] == true) {
        $inventory = $owner->inventory()
          ->where('owner_id', $params['owner_id'])
          ->where('game_id', $params['game_id'])->first();

        $inventory['borrower_id'] = $params['borrower_id'];
        $inventory['date_borrowed'] = new \DateTime();
        $borrower = User::find($params['borrower_id']);
        $borrower->notify(new BorrowRequestAccepted($owner, $game));

        $inventory->update();
      } else {
        Log::info('No game for you.');
      }
      // TODO delete $notification
      Auth::user()->unreadNotifications->where('id', $params['notification_id'])->markAsRead();
      return redirect($url);
    }

    public function returnGame(Request $request) {
      $url = $request->server('HTTP_REFERER');
      $params = $request->query();

      $inventory = User::find($params['owner_id'])->inventory()
        ->where('owner_id', $params['owner_id'])
        ->where('game_id', $params['game_id'])->first();

      $inventory['borrower_id'] = null;
      $inventory['date_borrowed'] = null;
      $inventory['date_returned'] = null;

      $inventory->update();

      return redirect($url);
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
