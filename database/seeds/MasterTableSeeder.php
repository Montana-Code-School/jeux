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
      $numUser = 10;
      $numGames = 100;
      $date = date('Y-m-d, H:i:s');
      $dateReturn = date('Y-m-d', strtotime("+30 days"));
      /*
      Only use this code if you want to populate one user
      This is the User Everyone will need to have in your Database
      */
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
        ]]);

        // for($i=0; $i<=$numUser; $i++){
        //   $randOne = rand(1,$numUser);
        //   $randTwo = rand(1,$numUser);
        //
        //   while($randOne == $randTwo){
        //     $randTwo = rand(1,$numUser);
        //   }
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
          ]]);
        //}

        for($i=0; $i<=$numGames; $i++){
          $randOne = rand(1,$numUser);
          $randTwo = rand(1,$numUser);

          while($randOne == $randTwo){
            $randTwo = rand(1,$numUser);
          }

          // if no borrower_id no date_borrowed or date_returned
          $borrowerId = rand(0, 1) ? $randTwo : null;

          DB::table('inventories')->insert([[
            'game_id' => 89,
            'borrower_id' => null,
            'owner_id' => 1,
            'date_borrowed' => $borrowerId === null ? null : $date,
            'date_returned' => $borrowerId === null ? null : $dateReturn
          ],
          [
            'game_id' => 43,
            'borrower_id' => 3,
            'owner_id' => 1,
            'date_borrowed' => $borrowerId === null ? null : $date,
            'date_returned' => $borrowerId === null ? null : $dateReturn
          ],
          [
            'game_id' => 4,
            'borrower_id' => null,
            'owner_id' => 1,
            'date_borrowed' => $borrowerId === null ? null : $date,
            'date_returned' => $borrowerId === null ? null : $dateReturn
          ],
          [
            'game_id' => 109,
            'borrower_id' => 4,
            'owner_id' => 2,
            'date_borrowed' => $borrowerId === null ? null : $date,
            'date_returned' => $borrowerId === null ? null : $dateReturn
          ],
          [
            'game_id' => 180,
            'borrower_id' => null,
            'owner_id' => 2,
            'date_borrowed' => $borrowerId === null ? null : $date,
            'date_returned' => $borrowerId === null ? null : $dateReturn
          ],
          [
            'game_id' => 55,
            'borrower_id' => null,
            'owner_id' => 2,
            'date_borrowed' => $borrowerId === null ? null : $date,
            'date_returned' => $borrowerId === null ? null : $dateReturn
          ],
          [
            'game_id' => 55,
            'borrower_id' => null,
            'owner_id' => 3,
            'date_borrowed' => $borrowerId === null ? null : $date,
            'date_returned' => $borrowerId === null ? null : $dateReturn
          ],
          [
            'game_id' => 82,
            'borrower_id' => null,
            'owner_id' => 3,
            'date_borrowed' => $borrowerId === null ? null : $date,
            'date_returned' => $borrowerId === null ? null : $dateReturn
          ],
          [
            'game_id' => 2,
            'borrower_id' => null,
            'owner_id' => 3,
            'date_borrowed' => $borrowerId === null ? null : $date,
            'date_returned' => $borrowerId === null ? null : $dateReturn
          ],
          [
            'game_id' => 27,
            'borrower_id' => null,
            'owner_id' => 4,
            'date_borrowed' => $borrowerId === null ? null : $date,
            'date_returned' => $borrowerId === null ? null : $dateReturn
          ],
          [
            'game_id' => 68,
            'borrower_id' => 1,
            'owner_id' => 4,
            'date_borrowed' => $borrowerId === null ? null : $date,
            'date_returned' => $borrowerId === null ? null : $dateReturn
          ],
          [
            'game_id' => 89,
            'borrower_id' => null,
            'owner_id' => 4,
            'date_borrowed' => $borrowerId === null ? null : $date,
            'date_returned' => $borrowerId === null ? null : $dateReturn
          ]]);
        }
        $users = factory(App\User::class, $numUser)->create();
        //$games = factory(App\Game::class, $numGames)->create();
        $this->seedGames();
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
