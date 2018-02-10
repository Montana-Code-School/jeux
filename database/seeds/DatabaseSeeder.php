<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //Make sure to call the seed you need first
        $this->call(MasterTableSeeder::class);
    }
}
