<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Log;

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
            'image' => $friend->image,
            'title' => $friend->username,
            'description' => 'Hello!  My name is '. $friend->name
          ];
        }

        $notifications = $user->notifications;
        foreach($notifications as $notification) {
          if ($notification->type == 'App\Notifications\FriendRequest') {
            $notification_items[] = [
              'image' => $notification->data['friend_avatar'],
              'title' => 'You have a friend request.',
              'description' => 'Your friend request is from '. $notification->data['friend_name']
            ];
          } else if ($notification->type == 'App\Notifications\BorrowRequest') {
            $notification_items[] = [
              'image' => $notification->data['friend_avatar'],
              'title' => 'You have a friend request.',
              'description' => 'Your friend request is from '. $notification->data['friend_name'],
              'actions' => [
                [
                  'glyphicon' => 'glyphicon-ok-circle',
                  'name' => 'accept-friend-request',
                  // 'controllerRoute' => put controller route here once we have one
                ],
                [
                  'glyphicon' => 'glyphicon-remove-circle',
                  'name' => 'ignore-friend-request'
                  // 'controllerRoute' => put controller route here once we have one
                ]
              ]
            ];
          }
        }

      };
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
