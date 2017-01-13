<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Page::class, function (Faker\Generator $faker) {

    return [
        'title' => $faker->text([150]),
        'description' => $faker->paragraphs([3]),
        'status' => 1,

    ];
});
$factory->define(App\Post::class, function (Faker\Generator $faker) {

    return [
        'title' => $faker->text([150]),
        'slug' => $faker->slug(10),
        'description' => $faker->paragraphs([3]),
        'published_on' => \Carbon\Carbon::now(),
        'status' => 1,
        'page_id' => random_int(1,6)

    ];
});