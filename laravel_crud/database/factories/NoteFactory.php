<?php

use Faker\Generator as Faker;

$factory->define(App\Note::class, function (Faker $faker) {
    return [
      'title' => $faker->sentence,
      'description' => $faker->paragraph(4),
    ];
});
