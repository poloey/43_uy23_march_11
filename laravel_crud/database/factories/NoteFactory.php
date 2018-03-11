<?php

use Faker\Generator as Faker;
use App\User;

$factory->define(App\Note::class, function (Faker $faker) {
    return [
      'title' => $faker->sentence,
      'description' => $faker->paragraph(4),
      'user_id' => function () {
        return User::all()->random();
      }
    ];
});
