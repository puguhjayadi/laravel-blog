<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory('App\Comment', 10)->create();
    	$faker = \Faker\Factory::create();

    	for ($i = 1; $i <= 5; $i++) {
    		DB::table("comments")->insert([
    			[
    				'post_id' =>  $faker->randomElement(App\Post::pluck('id', 'id')->toArray()),
    				'name' => $faker->name,
    				'email' => $faker->unique()->safeEmail,
    				'website' => Str::random(10).'.com',
    				'comment' => $faker->realText(100),
    			]
    		]);
    	}

    }
}
