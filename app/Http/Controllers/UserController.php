<?php
//TODO::put notifications stuff in here!

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;

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
      $user = App\User::find($id);
      //TODO:: make sure that when people are filling out the form that
      // that the old information is staying with the information.
      $user->name = $request->name;
      $user->image = $request->image;
      $user->username = $request->username;
      $user->email = $request->email;

      $user->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $user = App\User::find($id);

      $user->delete();
    }
}
