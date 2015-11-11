<?php

use Carbon\Carbon;

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
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Edition::class, function (Faker\Generator $faker) {
    return [
        'release_date' => Carbon::now(),
    	'name' => $faker->sentence,
    	'description' => $faker->paragraph,
    	'cover_img' => 'http://bandareview.app/images/editions/2014/november.jpg',
    	'featured_img' => 'http://bandareview.app/images/newcover.png',
    	'online' => 'http://bandareview.app/images/editions/2014/november.jpg',
    	'pdf' => 'http://bandareview.app/images/editions/2014/november.jpg',
    	'featured' => false
    ];
});