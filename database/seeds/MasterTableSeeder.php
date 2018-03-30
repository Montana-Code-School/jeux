<?php

use Illuminate\Database\Seeder;

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
          'game_id' => 111,
          'borrower_id' => 5,
          'owner_id' => 6,
          'date_borrowed' => $date,
          'date_returned' => $dateReturn
        ],
        [
          'game_id' => 24,
          'borrower_id' => 6,
          'owner_id' => 5,
          'date_borrowed' => $date,
          'date_returned' => $dateReturn
        ],
        [
          'game_id' => 1,
          'borrower_id' => null,
          'owner_id' => 6,
          'date_borrowed' => $date,
          'date_returned' => null
        ],
        [
          'game_id' => 2,
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
}
