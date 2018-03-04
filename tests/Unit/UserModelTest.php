<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\User;

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
        // $this->assertTrue(true);
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
        $user = User::find($this->user->id);
        $user->name = "Test Change";
        $user->save();

        echo $user;

        $this->assertDatabaseHas('users', ['name'=>$user->name]);
    }

    public function testDeleteUser()
    {
        $user = User::find($this->user->id);
        $user->delete();

        $this->assertDatabaseMissing('users', ['id'=>$user->id]);
    }

    public function testUserFriend()
    {
        $this->assertTrue(true);
    }

    public function testCreateGames()
    {
        $this->assertTrue(true);
    }
}
