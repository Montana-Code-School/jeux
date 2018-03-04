<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Game;
use App\Inventory;
use App\User;

class DatabaseTest extends TestCase
{
    // @TODO test relationships, test unique id, username, email
    // @TODO check reversed friend relationships (user_id 1 -> friend_id 25) ((user_id 25 -> friend_id 1))
    // @TODO Date returned is after the date borrowed
    // @TODO test nullable items

    /**
     * A basic test example.
     *
     * @return void
     */

    public function testGameDatatype()
    {
        /*
            Tests the game datatypes to verify they are of the right type
        */

        $game = Game::find(1);

        $this->assertTrue(gettype($game->id) === 'integer');
        $this->assertTrue(gettype($game->name) === 'string');
        $this->assertTrue(gettype($game->image) === 'string');
        $this->assertTrue(gettype($game->year) === 'integer');
        $this->assertTrue(gettype($game->min_player) === 'integer');
        $this->assertTrue(gettype($game->max_player) === 'integer');
        $this->assertTrue(gettype($game->min_age) === 'integer');
        $this->assertTrue(gettype($game->min_play) === 'integer');
        $this->assertTrue(gettype($game->max_play) === 'integer');
        $this->assertTrue(gettype($game->description) === 'string');
        $this->assertTrue(gettype($game->instructions) === 'integer');
    }

    public function testInventoryDatatype()
    {
        /*
            Tests the Inventory datatypes to verify they are of the right type
        */

        $inventory = Inventory::find(1);

        $this->assertTrue(gettype($inventory->id) === 'integer');
        $this->assertTrue(gettype($inventory->game_id) === 'integer');
        $this->assertTrue(gettype($inventory->borrower_id) === 'integer');
        $this->assertTrue(gettype($inventory->owner_id) === 'integer');
        $this->assertTrue(gettype($inventory->date_borrowed) === 'string');
        $this->assertTrue(gettype($inventory->date_returned) === 'string');
    }

    public function testDefaultUser()
    {
        /*
            Tests the default seeded user
        */

        $this->assertDatabaseHas('users', ['username' => 'Frankie1'])
              ->assertDatabaseHas('users', ['email' => 'jbkFrankie1@email.com'])
              ->assertDatabaseHas('users', ['name' => 'Jill Ben Kendra-Frank'])
              ->assertDatabaseHas('users', ['id' => 1])
              ->assertDatabaseHas('users', ['image' => 'avatar.png']);
    }

    public function testUserDatatype()
    {
        /*
            Tests the user datatypes to verify they are of the right type
        */

        $user = User::find(1);

        $this->assertTrue(gettype($user->id) === 'integer');
        $this->assertTrue(gettype($user->username) === 'string');
        $this->assertTrue(gettype($user->email) === 'string');
        $this->assertTrue(gettype($user->password) === 'string');
        $this->assertTrue(gettype($user->name) === 'string');
        $this->assertTrue(gettype($user->token) === 'string');
    }
}
