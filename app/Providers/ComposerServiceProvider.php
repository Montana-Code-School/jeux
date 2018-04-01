<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Log;
use App\User;
use App\Game;

class ComposerServiceProvider extends ServiceProvider
{
  /**
  * Bootstrap the application services.
  *
  * @return void
  */
  public function boot()
  {
    view()->composer("partials.navbar",function($view){
      $friends = [];
      $friend_items = [];
      $notifications = [];
      $notification_items = [];
      $items = [];

      if(Auth::check()){
        $user = Auth::user();
        $friends = $user->friends()->take(5)->get();

        foreach($friends as $friend) {
          $friend_items[] = [
            'image_url' => asset( "images/uploads/profile/" . $friend->image),
            'title' => $friend->username,
            'description' => 'Hello!  My name is '. $friend->name
          ];
        }

        $notifications = $user->unreadNotifications;
        Log::debug('Here are the notifications');
        foreach($notifications as $notification) {
          Log::debug(print_r($notification, true));
          if ($notification->type == 'App\Notifications\FriendRequest') {
            $notification_items[] = [
              'image_url' => asset( "images/uploads/profile/" . $notification->data['friend_avatar']),
              'title' => 'You have a friend request.',
              'description' => 'Your friend request is from '. $notification->data['friend_name']
            ];
          } else if ($notification->type == 'App\Notifications\BorrowRequest') {
            $game_id = $notification->data['game_id'];
            $game = Game::find($game_id);
            $borrower_id = $notification->data['borrower_id'];
            $borrower = User::find($borrower_id);
            $notification_items[] = [
              'image_url' => asset( "images/uploads/profile/" . $borrower->image),
              'title' => "You've received a borrow request.",
              'description' => $borrower->name . ' wants to borrow your copy of '.$game->name . '.',
              'actions' => [
                [
                  'glyphicon' => 'glyphicon-ok-circle',
                  'name' => 'accept-borrow-request',
                  'url' => action('UserController@respondToBorrowGame',
                    [
                      'can_borrow'=>true,
                      'owner_id'=>$user->id,
                      'game_id'=>$game->id,
                      'borrower_id'=>$borrower->id,
                      'notification_id'=>$notification->id
                    ])
                ],
                [
                  'glyphicon' => 'glyphicon-remove-circle',
                  'name' => 'ignore-borrow-request',
                  'url' => action('UserController@respondToBorrowGame',
                    [
                      'can_borrow'=>false,
                      'owner_id'=>$user->id,
                      'game_id'=>$game->id,
                      'borrower_id'=>$borrower->id,
                      'notification_id'=>$notification->id
                    ])
                ]
              ]
            ];
          } else if ($notification->type == 'App\Notifications\BorrowRequestAccepted') {
            $game_id = $notification->data['game_id'];
            $game = Game::find($game_id);
            $owner_id = $notification->data['owner_id'];
            $owner = User::find($owner_id);
            $notification_items[] = [
              'image_url' => $game->image,
              'title' => "Your borrow request has been accepted.",
              'description' => $owner->name . ' has accepted your borrow request for '. $game->name . '.'
            ];
          } else if ($notification->type == 'App\Notifications\BorrowRequestDenied') {
            $game_id = $notification->data['game_id'];
            $game = Game::find($game_id);
            $owner_id = $notification->data['owner_id'];
            $owner = User::find($owner_id);
            $notification_items[] = [
              'image_url' => $game->image,
              'title' => "Your borrow request has been denied.",
              'description' => $owner->name . ' has denied your borrow request for ' . $game->name . '.'
            ];
          }
        }
      }
      $view->with([
        "friends"=>$friends,
        "friend_items"=>$friend_items,
        "notifications"=>$notifications,
        "notification_items"=>$notification_items
      ]);
    });
  }

    /**
    * Register the application services.
    *
    * @return void
    */
    public function register()
    {
      //
    }
  }
