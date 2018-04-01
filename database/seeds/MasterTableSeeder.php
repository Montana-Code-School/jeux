<?php

use Illuminate\Database\Seeder;
use App\Game;

class MasterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $date = date('Y-m-d H:i:s');
      $dateReturn = date('Y-m-d', strtotime("+30 days"));

      $this->seedGames();
      $this->updateDescript();

        DB::table('users')->insert([[
          'username' => 'Frankie1',
          'email' => 'jbkFrankie1@email.com',
          'password' => bcrypt('password'),
          'name' => 'Jill Ben Kendra-Frank',
          'token' => bcrypt('token'),
          'remember_token' => bcrypt('remember_token'),
          'created_at' => $date,
          'updated_at' => $date
        ],
        [
          'username' => 'Frankie2',
          'email' => 'jbkFrankie2@email.com',
          'password' => bcrypt('password'),
          'name' => 'Jill Ben Kendra-Frank II',
          'token' => bcrypt('token'),
          'remember_token' => bcrypt('remember_token'),
          'created_at' => $date,
          'updated_at' => $date
        ],
        [
          'username' => 'Frankie3',
          'email' => 'jbkFrankie3@email.com',
          'password' => bcrypt('password'),
          'name' => 'Jill Ben Kendra-Frank III',
          'token' => bcrypt('token'),
          'remember_token' => bcrypt('remember_token'),
          'created_at' => $date,
          'updated_at' => $date
        ],
        [
          'username' => 'Frankie4',
          'email' => 'jbkFrankie4@email.com',
          'password' => bcrypt('password'),
          'name' => 'Jill Ben Kendra-Frank IV',
          'token' => bcrypt('token'),
          'remember_token' => bcrypt('remember_token'),
          'created_at' => $date,
          'updated_at' => $date
        ],
        [
          'username' => 'Winnie',
          'email' => 'winnifred@email.com',
          'password' => bcrypt('password'),
          'name' => 'Winnifred Goggles Tallman',
          'token' => bcrypt('token'),
          'remember_token' => bcrypt('remember_token'),
          'created_at' => $date,
          'updated_at' => $date
        ],
        [
          'username' => 'Pegs',
          'email' => 'peggy@email.com',
          'password' => bcrypt('password'),
          'name' => 'Peggy',
          'token' => bcrypt('token'),
          'remember_token' => bcrypt('remember_token'),
          'created_at' => $date,
          'updated_at' => $date
        ]]);

        $this->updateDummyAvatars();

        DB::table('friends')->insert([[
          'user_id'=>1,
          'friend_id'=>2
        ],
        [
          'user_id'=>1,
          'friend_id'=>3
        ],
        [
          'user_id'=>1,
          'friend_id'=>4
        ],
        [
          'user_id'=>2,
          'friend_id'=>3
        ],
        [
          'user_id'=>2,
          'friend_id'=>4
        ],
        [
          'user_id'=>3,
          'friend_id'=>4
        ],
        [
          'user_id'=>5,
          'friend_id'=>6
        ],
        [
          'user_id'=>6,
          'friend_id'=>5
        ]]);

        DB::table('inventories')->insert([[
          'game_id' => 89,
          'borrower_id' => null,
          'owner_id' => 1,
          'date_borrowed' => null,
          'date_returned' => null
        ],
        [
          'game_id' => 43,
          'borrower_id' => 3,
          'owner_id' => 1,
          'date_borrowed' => $date,
          'date_returned' => null
        ],
        [
          'game_id' => 4,
          'borrower_id' => null,
          'owner_id' => 1,
          'date_borrowed' => null,
          'date_returned' => null
        ],
        [
          'game_id' => 109,
          'borrower_id' => 4,
          'owner_id' => 2,
          'date_borrowed' => $date,
          'date_returned' => $dateReturn
        ],
        [
          'game_id' => 180,
          'borrower_id' => null,
          'owner_id' => 2,
          'date_borrowed' => null,
          'date_returned' => null
        ],
        [
          'game_id' => 55,
          'borrower_id' => null,
          'owner_id' => 2,
          'date_borrowed' => null,
          'date_returned' => null
        ],
        [
          'game_id' => 55,
          'borrower_id' => null,
          'owner_id' => 3,
          'date_borrowed' =>  null,
          'date_returned' => null
        ],
        [
          'game_id' => 82,
          'borrower_id' => null,
          'owner_id' => 3,
          'date_borrowed' => null,
          'date_returned' => null
        ],
        [
          'game_id' => 2,
          'borrower_id' => null,
          'owner_id' => 3,
          'date_borrowed' => null,
          'date_returned' => null
        ],
        [
          'game_id' => 27,
          'borrower_id' => null,
          'owner_id' => 4,
          'date_borrowed' => null,
          'date_returned' => null
        ],
        [
          'game_id' => 68,
          'borrower_id' => 1,
          'owner_id' => 4,
          'date_borrowed' => $date,
          'date_returned' => null
        ],
        [
          'game_id' => 89,
          'borrower_id' => null,
          'owner_id' => 4,
          'date_borrowed' => null,
          'date_returned' => null
        ],
        [
          'game_id' => 1,
          'borrower_id' => 5,
          'owner_id' => 6,
          'date_borrowed' => $date,
          'date_returned' => $dateReturn
        ],
        [
          'game_id' => 2,
          'borrower_id' => 6,
          'owner_id' => 5,
          'date_borrowed' => $date,
          'date_returned' => $dateReturn
        ],
        [
          'game_id' => 3,
          'borrower_id' => null,
          'owner_id' => 6,
          'date_borrowed' => $date,
          'date_returned' => null
        ],
        [
          'game_id' => 4,
          'borrower_id' => null,
          'owner_id' => 5,
          'date_borrowed' => null,
          'date_returned' => null
        ],
        [
          'game_id' => 15,
          'borrower_id' => 5,
          'owner_id' => 6,
          'date_borrowed' => $date,
          'date_returned' => $dateReturn
        ],
        [
          'game_id' => 17,
          'borrower_id' => 6,
          'owner_id' => 5,
          'date_borrowed' => $date,
          'date_returned' => $dateReturn
        ],
        [
          'game_id' => 44,
          'borrower_id' => null,
          'owner_id' => 6,
          'date_borrowed' => $date,
          'date_returned' => null
        ],
        [
          'game_id' => 81,
          'borrower_id' => null,
          'owner_id' => 5,
          'date_borrowed' => null,
          'date_returned' => null
        ],
        [
          'game_id' => 111,
          'borrower_id' => 5,
          'owner_id' => 6,
          'date_borrowed' => $date,
          'date_returned' => $dateReturn
        ],
        [
          'game_id' => 126,
          'borrower_id' => 6,
          'owner_id' => 5,
          'date_borrowed' => $date,
          'date_returned' => $dateReturn
        ],
        [
          'game_id' => 130,
          'borrower_id' => null,
          'owner_id' => 6,
          'date_borrowed' => $date,
          'date_returned' => null
        ],
        [
          'game_id' => 149,
          'borrower_id' => null,
          'owner_id' => 5,
          'date_borrowed' => null,
          'date_returned' => null
        ]]);

    }

    public function seedGames(){

      $path = getcwd() . "/database/seeds/gameData.json";

      $json = file_get_contents($path);

      $array = json_decode($json, true);

      foreach($array['item'] as $item){
        $game = factory(App\Game::class)->create([
          'name' => $item['name'],
          'image' => $item['image'],
          'year' => $item['yearpublished'],
          'min_player' => $item['stats']['@attributes']['minplayers'],
          'max_player' => $item['stats']['@attributes']['maxplayers'],
          'min_play' =>
              isset($item['stats']['@attributes']['minplaytime'])
            ? $item['stats']['@attributes']['minplaytime']
            : rand(30,90),
          'max_play' =>
              isset($item['stats']['@attributes']['maxplaytime'])
            ? $item['stats']['@attributes']['maxplaytime']
            : rand(45, 120)
        ]);
        $game->save();
      }
    }

    public function updateDescript(){
      $invadeCanada = 'The year is 1812. War is raging across Europe and Russia. Napoleon, emperor of France, is seeking to dominate Europe through conquest. France’s enemies, led by England, are engaged in a desperate struggle to defeat Napoleon. England, in dire need of men, is impressing men to serve in its navy. Included are Americans who are pressed into service at gunpoint.';
      $sevenWonders = 'In many ways 7 Wonders Duel resembles its parent game 7 Wonders as over three ages players acquire cards that provide resources or advance their military or scientific development in order to develop a civilization and complete wonders.';
      $acquire = 'In Acquire, each player strategically invests in businesses, trying to retain a majority of stock. As the businesses grow with tile placements, they also start merging, giving the majority stockholders of the acquired business sizable bonuses, which can then be used to reinvest into other chains. All of the investors in the acquired company can then cash in their stocks for current value or trade them 2-for-1 for shares of the newer, larger business.';
      $ageEmpire = 'Age of Empires is the critically acclaimed, award winning Real Time Strategy (RTS) game with a legacy spanning over 15 years and nearly a dozen titles in the franchise. Known for its strategic gameplay founded on historical civilizations, the series spans a period of time from the Stone Age to early modern time, and even includes an episode exploring the legendary creatures and lore from mythology.';
      $bang = 'Age of Empires is the critically acclaimed, award winning Real Time Strategy (RTS) game with a legacy spanning over 15 years and nearly a dozen titles in the franchise. Known for its strategic gameplay founded on historical civilizations, the series spans a period of time from the Stone Age to early modern time, and even includes an episode exploring the legendary creatures and lore from mythology.';
      $battleship = 'Battleship (also Battleships or Sea Battle) is a guessing game for two players. ... Battleship is known worldwide as a pencil and paper game which dates from World War I. It was published by various companies as a pad-and-pencil game in the 1930s, and was released as a plastic board game by Milton Bradley in 1967.';
      $clue = "It was devised by Anthony E. Pratt, a so. you move around the game board (a mansion), as of one of the game's six suspects (or, collecting clues from which to deduce which suspect murdered the game's perpetual victim: Mr. Boddy (Dr. Black, outside of U.S.), and with which weapon and in what room.";
      $life = "The Game of Life, also known simply as Life, is a board game originally created in 1860 by Milton Bradley, as The Checkered Game of Life. The Game of Life was America's first popular parlor game.Two to six players can participate in one game.";
      $monopoly = 'Monopoly is a board game where players roll two six-sided dice to move around the game-board buying and trading properties, and develop them with houses and hotels. ... The game is named after the economic concept of monopoly—the domination of a market by a single entity.';
      $pandemic = 'A pandemic is the worldwide spread of a new disease. An influenza pandemic occurs when a new influenza virus emerges and spreads around the world, and most people do not have immunity. Viruses that have caused past pandemics typically originated from animal influenza viruses.';
      $payday = 'The game simulates money management, with the game board resembling a calendar month. Before the game, the players decide how many months to be played (i.e. how many times to travel across the board). During the game, players accumulate bills and expenses to pay, along with collecting their monthly wage on "pay day" at the end of the month. The winner is the player who has the most money at the end of the last month of play.';
      $catan = 'The Settlers of Catan, sometimes shortened to Catan or to Settlers, is a multiplayer board game designed by Klaus Teuber and first published in 1995 in Germany by Franckh-Kosmos Verlag (Kosmos) as Die Siedler von Catan. ... The game involves large amounts of strategy, while still being fairly simple to learn.';



      $gameIds = [1, 2, 3, 4, 15, 17, 44, 81, 111, 126, 130, 149];
      $gameDescripts = [$invadeCanada, $sevenWonders, $acquire, $ageEmpire, $bang, $battleship, $clue, $life, $monopoly, $pandemic, $payday, $catan];
      $gameAge = [10, 10, 12, 10, 8, 8, 8, 8, 8, 8, 8, 10];

      for ($i=0; $i < count($gameIds); $i++) {
        DB::table('games')->where('id', $gameIds[$i])->update(['description' => $gameDescripts[$i], 'min_age' => $gameAge[$i]]);
      }

    }

    public function updateDummyAvatars() {
      $dummyId = [5, 6];
      $dummyAvs = ['winnie.jpg', 'peggy.jpg'];

      for ($i = 0; $i < count($dummyId); $i++) {
        DB::table('users')->where('id', $dummyId[$i])->update(['image' => $dummyAvs[$i]]);
      }
    }
}
