<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tag extends Model
{
	public function videos()
	{
		return $this->belongsToMany('App\Video', 'video_tags');
	}

	public function getCountAttribute()
	{
		$hello = DB::select('SELECT count(tag_id) AS tag_count FROM video_tags WHERE tag_id = :id', ['id' => $this->id]);
		return $hello[0]->tag_count;
	}

}
