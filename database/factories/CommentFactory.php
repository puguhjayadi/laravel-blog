<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Comment::class, function (Faker $faker) {
	return [
		'post_id'       =>      function () {
			return App\Post::inRandomOrder()->first()->id;
		},
		'name' => $faker->name,
		'email' => $faker->unique()->safeEmail,
		'website' => Str::random(10).'.com',
		'comment' => $faker->realText(100),
	];
});
