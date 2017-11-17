<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pornstar extends Model
{
	public function videos()
	{
		return $this->belongsToMany('App\Video', 'video_pornstars');
	}

	public function getCountAttribute()
	{
		$hello = DB::select('SELECT count(pornstar_id) AS tag_count FROM video_pornstars WHERE pornstar_id = :id', ['id' => $this->id]);
		return $hello[0]->tag_count;
	}

}
