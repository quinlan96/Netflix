<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Classes\UploadHandler;
use App\Video;
use App\Jobs\EncodeVideo;

class UploadController extends Controller
{
	public function index() {
		return view('upload');
	}

	public function process(Request $request) {

		$video = new Video();

		$video->name = $request->input('title');

		$video->description = $request->input('description');

		$video->views = 0; 

		$video->release_date = date('Y-m-d');

		$video->save();

		$extension = pathinfo(storage_path('app/public/upload/'.$request->input('uuid').'/'.$request->input('filename')), PATHINFO_EXTENSION);

		if(Storage::exists('videos/'.$video->id)) {
			Storage::move('upload/'.$request->input('uuid').'/'.$request->input('filename'), 'videos/'.$video->id.'/raw.'.$extension);
		} else {
			Storage::makeDirectory('videos/'.$video->id);
			Storage::move('upload/'.$request->input('uuid').'/'.$request->input('filename'), 'videos/'.$video->id.'/raw.'.$extension);
		}

		Storage::deleteDirectory('upload/'.$request->input('uuid'));

		EncodeVideo::dispatch($video, $extension);

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
