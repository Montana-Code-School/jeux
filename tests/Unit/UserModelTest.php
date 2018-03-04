<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\User;
use App\Inventory;

class UserModelTest extends TestCase
{
    private $user;
    /**
     * A basic test example.
     *
     * @return void
     */
    // protected $user
    //
    public function setup()
    {
        parent::setup();

        $this->user = factory(\App\User::class)->create();
    }

    public function testCreateUser()
    {
        $this->assertDatabaseHas('users', ['id'=>$this->user->id]);
    }

    public function testReadUser()
    {
        $this->assertDatabaseHas('users', ['id'=>$this->user->id])
              ->assertDatabaseHas('users', ['username'=>$this->user->username])
              ->assertDatabaseHas('users', ['email'=>$this->user->email])
              ->assertDatabaseHas('users', ['password'=>$this->user->password])
              ->assertDatabaseHas('users', ['name'=>$this->user->name])
              ->assertDatabaseHas('users', ['token'=>$this->user->token])
              ->assertDatabaseHas('users', ['remember_token'=>$this->user->remember_token])
              ->assertDatabaseHas('users', ['deleted_at'=>$this->user->deleted_at])
              ->assertDatabaseHas('users', ['created_at'=>$this->user->created_at])
              ->assertDatabaseHas('users', ['updated_at'=>$this->user->updated_at]);
    }

    public function testUpdateUser()
    {
        $tempUser = User::find($this->user->id);
        $tempUser->name = "Test Change";
        $tempUser->save();

        $this->assertDatabaseHas('users', ['name'=>$tempUser->name]);
    }

    public function testDeleteUser()
    {
        $tempUser = User::find($this->user->id);
        $tempUser->delete();

        $this->assertDatabaseMissing('users', ['id'=>$this->user->id]);
    }

    public function testUserHasFriend()
    {
        $user = User::with('friends')->where('id', 1)->get();
        $this->assertTrue(sizeof($user[0]->friends) >= 1);
    }

    public function testUserHasGame()
    {
        $user = User::with('inventory')->where('id', 1)->get();
        $this->assertTrue(sizeof($user) >= 1);
    }

    public function testUserHasNotification()
    {
        $user = User::with('notification')->where('id', 1)->get();
        $this->assertTrue(sizeof($user) >= 1);
    }
}
