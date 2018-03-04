<?php

use Faker\Generator as Faker;

$factory->define(App\Game::class, function (Faker $faker) {
    return [
        'min_age' => rand(5,99),
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
