<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Video;
use App\Tag;
use App\Pornstar;

class VideoController extends Controller
{
	public function index(Video $video) {
		$video->views += 1;
		$video->save();

		

		$categories = [
			'Channels' => $video->channels,
			'Actors' => $video->pornstars,
			'Tags' => $video->tags
		];

		$videos = Video::all();

		return view('video', compact('video', 'categories', 'videos'));
	}
}
