<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
	protected $table = 'posts';

	protected $fillable = ['user_id','title', 'slug', 'content'];

	protected static function boot()
	{
		parent::boot();
		static::saving(function ($model) {
			$model->slug = Str::slug($model->title, "-");
		});
	}

	public function user()
	{
		return $this->belongsTo('App\User');
	}

	public function comments()
	{
		return $this->hasMany('App\Comment');
	}
}
