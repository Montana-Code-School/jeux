<?php
//TODO::put notifications stuff in here!

namespace App\Http\Controllers;

use App\User;
use App\Game;
use App\Inventory;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Notifiable;
use Illuminate\Http\Request;
use App\Notifications\FriendRequest;
use App\Notifications\BorrowRequest;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;



class UserController extends Controller
{
  use Notifiable;


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        return view('settings', compact('user'));
        // $users = User::get();
        //   return view('user', compact('users'));
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

      // Setup for Profile User
      $user_profile = User::with('inventory')->where('username', $username)->get();  // Get user profile information with user inventory

      // determine if user is a friends profile or auth user profile
      $is_friend = (array_search($user_profile[0]->id, $auth_friends_ids) || $auth_user->id == $user_profile[0]->id ? true : false);

      // Set user profile information
      $data['userProfile'] = [
        'id'=>$user_profile[0]->id,
        'image'=>$user_profile[0]->image,
        'username'=>$user_profile[0]->username,
        'email'=>$user_profile[0]->email,
        'name'=>$user_profile[0]->name,
        'is_friend'=>$is_friend,
      ];

      // Setup for user inventory
      $userInventory = $user_profile[0]->inventory;
      $data['games'] = [];

      // Get game information before adding to response
      foreach($userInventory as $inventory_item) {
          // Get game information with inventory
          // Used inventory as a work around because I was unable to quickly get users working. Would like to rework this.
          $gameQuery = Game::with('inventory')->where('id',$inventory_item->game_id)->get();
          $gameInventory = $gameQuery[0]->inventory;

          // setup game owner information
          $owner = [];
          $own_game = false;

          foreach($gameInventory as $game_owner) {
            // determine is user owns game
            $is_friend = array_search($game_owner->owner_id, $auth_friends_ids);

            // get game owner information
            $user = User::find($game_owner->owner_id);

            // if you own the game set to true
            if($auth_user->id == $user->id) {
              $own_game = true;
            }
            // if game owner is friend add them to the game owner list
            if($is_friend) {
              // set user information
              $user =[
                'id'=>$user->id,
                'username'=>$user->username,
                'image'=>$user->image,
              ];

              // Add user to the owner array
              array_push($owner, $user);
            }
          }

          // Set game information
          $game = [
            'game_id'=>$gameQuery[0]->id,
            'own_game'=>$own_game,
            'name'=>$gameQuery[0]->name,
            'image'=>$gameQuery[0]->image,
            'year'=>$gameQuery[0]->year,
            'min_player'=>$gameQuery[0]->min_player,
            'max_player'=>$gameQuery[0]->max_player,
            'min_age'=>$gameQuery[0]->min_age,
            'min_play'=>$gameQuery[0]->min_play,
            'max_play'=>$gameQuery[0]->max_play,
            'description'=>$gameQuery[0]->description,
            'instructions'=>$gameQuery[0]->instructions,
            'borrower_id'=>$inventory_item->borrower_id,
            'owner'=>$owner,
          ];

          // Add game to response data
          array_push($data['games'], $game);
      }

        // $user = User::with('inventory', 'friends')->where('username', $username)->get();	+
        /*
        $data['user'] = $user;	+        The show method gets a users profile and return a list of games owned
        and borrowed by that user.
-        $user->notify(new FriendRequest($user));	+
-	+        TODO determine what happens if user does not exist
-         return view('user')->with($data);

      // return $data for the view
      */
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

      //TODO:: make sure that when people are filling out the form that
      // that the old information is staying with the information.

      //------------------------------------------------------------------------
      if ($request->hasFile('image')) {
        if ($user->image[0] != 'n') {
          File::delete('images/' . $user->image);
        }
        $image = $request->file('image');
        $filename = time() . '-' . $image->getClientOriginalName();
        $user->image = $filename;
        Image::make($photo)->fit(160)->save( public_path('images/uploads/profile/' . $filename ));
      }
      //------------------------------------------------------------------------
      $user->name = $request->input('name');
      //$user->image = $request->image;
      $user->username = $request->input('username');
      $user->email = $request->input('email');
      $user->save();

      return response()->json([
        'status' => 'your information has been updated successfully',
        'image' => url('images/uploads/profile/' . $user->image),
        'name' => $user->name,
        'username' => $user->username,
        'email' => $user->email
      ]);
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
