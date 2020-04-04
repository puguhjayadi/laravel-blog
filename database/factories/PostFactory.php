<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Post::class, function (Faker $faker) {
    return [
		'title'         =>      $faker->sentence(6),
		'slug'         	=>      Str::slug($faker->sentence(6), "-"),
		'content'       =>      $faker->realText(500),
		'user_id'       =>      function () {
			return App\User::inRandomOrder()->first()->id;
		}
	];
});
