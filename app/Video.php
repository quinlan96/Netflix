<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
	public function tags() {
		return $this->belongsToMany('App\Tag', 'video_tags');
	}

	public function channels() {
		return $this->belongsToMany('App\Channel', 'video_channels');
	}

	public function pornstars() {
		return $this->belongsToMany('App\Pornstar', 'video_pornstars');
	}

	public function videoSource() {
		$path = 'storage/videos/'.$this->id.'/video.mp4';

		return asset($path);
	}

	public function previewSource() {
		$path = 'storage/videos/'.$this->id.'/preview.jpg';

		return asset($path);
	}
}
