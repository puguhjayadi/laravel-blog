<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Comment::class, function (Faker $faker) {

	$user = $faker->randomElement(App\User::select('id', 'name', 'email')->get());
	$user_name 	= $user->name;
	$user_email = $user->email;

	return [
		'post_id' => function () {
			return App\Post::inRandomOrder()->first()->id;
		},
		'name' => $user_name,
		'email' => $user_email,
		'website' => Str::random(10).'.com',
		'comment' => $faker->realText(100),
	];	
});
