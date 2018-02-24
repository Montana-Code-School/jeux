<?php
//TODO May delete
namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\User;
use Illuminate\Support\Facades\Auth;

class AuthenticatedUserComposer {
  protected $friends;
  protected $user;

  public function _construct(){
    $this->user=Auth::user();


    //$this->friends=User::with("friends")->where("id", $user->id)->get();
  }

  public function compose(View $view) {
    $view->with("user", $this->user);
    // $view->with(['friends'=>$this->friends, "user"=>$this->user]);
  }

}
