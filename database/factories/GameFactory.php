<?php

use Faker\Generator as Faker;

$factory->define(App\Game::class, function (Faker $faker) {
    return [
      //find word faker
      //  'name' => $faker->realText(50),
      //  'year' => $faker->year,
      //  'player_count' => rand(1,10),
        'min_age' => rand(5,99),
      //  'min_play' => rand(30, 60),
      //  'max_play' => rand(60,120),
        'description' => $faker->realText(200),
        'instructions' => $faker->boolean
    ];
});
