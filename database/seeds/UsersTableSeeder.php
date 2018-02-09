<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      /* Only use this code if you want to populate one user*/
        // DB::table('users')->insert([
        //   'username' => str_random(10),
        //   'email' => str_random(10).'@gmail.com',
        //   'password' => bcrypt('password'),
        //   'name' => str_random(10),
        //   'token' => bcrypt('token')
        // ]);
        $users = factory(App\User::class, 100)->create();
    }
}
