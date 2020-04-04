<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Str;


class PostController extends Controller
{

	public function index()
	{
		$posts = Post::paginate(5);

		return $posts;		
	}
}
