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
        'description' =>
          'To begin the game you have selected, hit the BOP IT button '
          . 'on either side of the game unit. Select a game by pulling '
          . 'the PULL IT knob repeatedly until you hear the name of the '
          . 'game you want to play: SOLO, PASS IT, or PARTY. BOP IT will '
          . 'command you to do these 4 actions in random order! Respond '
          . 'as quickly as you can.',
        'instructions' => $faker->boolean
    ];
});
