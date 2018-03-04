<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Game;

class GameModelTest extends TestCase
{
    protected $game;
    /**
     * A basic test example.
     *
     * @return void
     */

    public function setup() {
        parent::setup();
        $this->game = new Game;

        $this->game->name = 'testGame1';
        $this->game->year = 1996;
        $this->game->min_player = 3;
        $this->game->max_player = 6;
        $this->game->min_age = 6;
        $this->game->min_play = 30;
        $this->game->max_play = 60;
        $this->game->description = 'To begin the game you have selected, hit the BOP IT button on either side of the game unit. Select a game by pulling the PULL IT knob repeatedly until you hear the name of the game you want to play: SOLO, PASS IT, or PARTY. BOP IT will command you to do these 4 actions in random order! Respond as quickly as you can.';
        $this->game->instructions = 0;

        $this->game->save();
    }

    public function testCreateGame()
    {
        $this->assertDatabaseHas('games', ['id'=>1]);
    }

    public function testReadGame()
    {
        $this->assertDatabaseHas('games', ['id'=>$this->game->id]);
        $this->assertDatabaseHas('games', ['name'=>$this->game->name]);
        $this->assertDatabaseHas('games', ['year'=>$this->game->year]);
        $this->assertDatabaseHas('games', ['min_player'=>$this->game->min_player]);
        $this->assertDatabaseHas('games', ['max_player'=>$this->game->max_player]);
        $this->assertDatabaseHas('games', ['min_age'=>$this->game->min_age]);
        $this->assertDatabaseHas('games', ['min_play'=>$this->game->min_play]);
        $this->assertDatabaseHas('games', ['max_play'=>$this->game->max_play]);
        $this->assertDatabaseHas('games', ['description'=>$this->game->description]);
        $this->assertDatabaseHas('games', ['instructions'=>$this->game->instructions]);
    }

    public function testUpdateGame()
    {
        $tempGame = Game::find($this->game->id);

        $tempGame->name = "Changed name";
        $tempGame->save();

        $this->assertDatabaseHas('games', ['name'=>$tempGame->name]);
    }

    public function testDeleteGame()
    {
        $tempGame = Game::find($this->game->id);
        $tempGame->delete();

        $this->assertDatabaseMissing('games', ['id'=>$this->game->id]);
    }
}
