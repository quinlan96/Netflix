<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Video;

class HomeController extends Controller
{
	public function __construct() {

    }

	public function index() {
		if(Auth::check()) {
			return $this->home();
		} else {
			return $this->welcome();
		}
	}

	public function home() {
		$videos = Video::where('posted', '=', 1)->get();

		return view('home', compact('videos'));
	}

	public function welcome() {
		return view('welcome');
	}
}
