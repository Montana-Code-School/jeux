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
      $numUser = 100;
      $numGames = 50;
      $date = date('Y-m-d, H:i:s');
      $dateReturn = date('Y-m-d', strtotime("+30 days"));
      /*
      Only use this code if you want to populate one user
      This is the User Everyone will need to have in your Database
      */
        DB::table('users')->insert([
          'username' => 'Frankie5',
          'email' => 'jbkFrankie@email.com',
          'password' => bcrypt('password'),
          'name' => 'Jill Ben Kendra-Frank',
          'token' => bcrypt('token')
        ]);

        for($i=0; $i<=$numUser; $i++){
          $randOne = rand(1,$numUser);
          $randTwo = rand(1,$numUser);

          while($randOne == $randTwo){
            $randTwo = rand(1,$numUser);
          }
          DB::table('friends')->insert([
            'user_id'=>$randOne,
            'friend_id'=>$randTwo
          ]);
        }

        for($i=0; $i<=$numGames; $i++){
          $randOne = rand(1,$numUser);
          $randTwo = rand(1,$numUser);

          while($randOne == $randTwo){
            $randTwo = rand(1,$numUser);
          }

          // if no borrower_id no date_borrowed or date_returned
          $borrowerId = rand(0, 1) ? $randTwo : null;

          DB::table('inventories')->insert([
            'game_id' => rand(1, $numGames),
            'borrower_id' => $borrowerId,
            'owner_id' => $randOne,
            'date_borrowed' => $borrowerId === null ? null : $date,
            'date_returned' => $borrowerId === null ? null : $dateReturn
          ]);
        }
        $users = factory(App\User::class, $numUser)->create();
        $games = factory(App\Game::class, $numGames)->create();
    }
}
