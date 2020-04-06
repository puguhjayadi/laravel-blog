<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Comment;

class UserController extends Controller
{
	public function index()
	{
		$users = Comment::whereIn('email', function ($query) {
			$query->select('email')->from('users');
		})->paginate(10);

		return view('user/index', ['users' => $users]);
	}
}
