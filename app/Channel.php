<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Channel extends Model
{
	public function videos()
	{
		return $this->belongsToMany('App\Video', 'video_channels');
	}

	public function getCountAttribute()
	{
		$hello = DB::select('SELECT count(channel_id) AS tag_count FROM video_channels WHERE channel_id = :id', ['id' => $this->id]);
		return $hello[0]->tag_count;
	}
}
