<?php

namespace App\Observers;
use App\Post;
use Illuminate\Support\Str;

class PostObserver
{
	public function saving(Post $post)
	{
		$post->slug = Str::slug($post->title, "-");
	}

    public function deleting(Post $post)
    {
    	$post->comments()->delete();
    }
}
