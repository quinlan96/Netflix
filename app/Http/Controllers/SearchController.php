<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Video;

class SearchController extends Controller
{
	public function index(Request $request) {
		$videos = Video::where('name', 'LIKE', '%'.$request['query'].'%')->get();

		return view('search', compact('videos'));
	}
}
