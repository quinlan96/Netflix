<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illumiante\Support\Facades\Storage;

use App\Classes\UploadHandler;
use App\Video;

class UploadController extends Controller
{
	public function index() {
		return view('upload');
	}

	public function process() {
		$video = new Video();

		$video->name = $_POST['title'];

		$video->description = $_POST['description'];

		$video->views = 0; 

		$video->release_date = date('Y-m-d');

		$video->save();

		if(Storage::disk('public')->exists('videos/'.$video->id)) {
			
		} else {

		}

		return redirect('/');
	}

	public function upload() {
		$uploader = new UploadHandler();

		$uploader->allowedExtensions = [];

		$uploader->sizeLimit = null;

		$uploader->inputName = "qqfile";

		$uploader->chunksFolder = "storage/chunks";

		if(isset($_GET['done'])) {
			$result = $uploader->combineChunks("storage/upload");
		} else {
			$result = $uploader->handleUpload("storage/upload");

			$result["uploadName"] = $uploader->getUploadName();
		}

		return $result;
	}
}
