<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

use FFMpeg;

class EncodeVideo implements ShouldQueue
{
	use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

	protected $video;

	protected $extension;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($video, $extension) {

		$this->video = $video;
		
		$this->extension = $extension;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle() {

		$path = 'app/public/videos/'.$this->video->id.'/';

		$ffmpeg = FFMpeg\FFMpeg::create([
			'ffmpeg.binaries' 	=> '/usr/bin/ffmpeg',
			'ffprobe.binaries' 	=> '/usr/bin/ffprobe',
			'ffmpeg.threads'	=> 4,
			'timeout' 			=> 0
		]);

		$ffprobe = FFMpeg\FFProbe::create();

		$duration = $ffprobe->format(storage_path($path.'raw.'.$this->extension))
							->get('duration');

		$previewTime = floor($duration/10);

		$ffVideo = $ffmpeg->open(storage_path($path.'raw.'.$this->extension));

		$frame = $ffVideo->frame(FFMpeg\Coordinate\TimeCode::fromSeconds($previewTime));

		$frame->save(storage_path($path.'preview.jpg'));

		$format = new FFMpeg\Format\Video\X264();

		$format->on('progress', function($video, $format, $percentage) {
			echo date('Y-m-d H:i:s: ') . "$percentage% transcoded\n";
		});

		$format->setKiloBitrate(1000)
			   ->setAudioCodec("libmp3lame")
			   ->setAudioChannels(2)
			   ->setAudioKiloBitrate(192);

		$ffVideo->save($format, storage_path($path.'/video.mp4'));
	}

	public function generatePreview() {

	}

	public function encode() {

	}


}
