<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use DB;


class PostController extends Controller
{

	public function index()
	{
		$posts = Post::paginate(5);
		return view('post/index', ['posts' => $posts]);
	}

	public function create()
	{
		$users = User::all();
		return view('post/create', ['users' => $users]);
	}

	public function store(Request $request)
	{

		$validator = \Validator::make($request->all(), [
			'title' => 'required',
			'content' => 'required',
			'user_id' => 'required',
		]);

		if($validator->fails()){
			return redirect()->route('post.create')->withErrors($validator)->withInput();
		}

		DB::beginTransaction();

		try {

			Post::create($request->all());
			DB::commit();

			return redirect()->route('post.index')->with('success', 'Post created successfully!');

		} catch(\Exception $e){
			DB::rollback();
			return response()->json(['message' => $e->getMessage() ]);
		}
	}

	public function destroy($id)
	{
		DB::beginTransaction();

		try {

			$post = Post::findOrFail($id);
			$post->delete();
			
			DB::commit();
			
			return redirect()->route('post.index')->with('success', 'Post deleted successfully!');

		} catch(\Exception $e){
			DB::rollback();
			return response()->json(['message' => $e->getMessage() ]);
		}

	}
	

}
