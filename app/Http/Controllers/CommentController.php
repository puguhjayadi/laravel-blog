<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
	public function index()
	{
		$comments = Comment::whereNotIn('email', function ($query) {
			$query->select('email')->from('users');
		})->paginate(10);

		return view('comment/index', ['comments' => $comments]);
	}
}
