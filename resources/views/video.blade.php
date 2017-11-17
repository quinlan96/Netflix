@extends('layouts.app')

@section('content')
<div class="container mt-3">
    <div class="row">
		<div class="col-md-9">
			<div class="row">
				<div class="video-container">
					<video id="video" class="video-js vjs-16-9 vjs-big-play-centered" controls preload="auto" data-setup='{}'>
						<source src="{{ $video->videoSource() }}" type="video/mp4">
					</video>
				</div>
				<h1 class="video-title">{{ $video->name }}</h1><h1 class="video-views">{{ $video->views }} views</h1>
				<p class="video-desc">{{ $video->description }}</p>
			</div>
			<div class="row">
				<ul class="col-md-12" style="margin: 0; padding: 0; display:inline-block; font-size: 0;">
					@foreach($videos as $video)
						<li class="col-md-3" style="list-style-type: none; display: inline-block; padding: 10px; margin: 0; font-size: 1rem;">
							<a href="/video/{{ $video->id }}/"><img src="{{ $video->previewSource() }}" style="width: 100%;"></a>
							<span style="color: #fff;">{{ $video->name }}</span>
						</li>
					@endforeach
				</ul>
			</div>
		</div>
		<div class="col-md-3 tags">
		@foreach($categories as $category => $tags)
			<span class="tags-category">{{ $category }}</span>
			<ul class="tags-list">
			@foreach($tags as $tag)
				<li class="tag" data-category="{{ $category }}"{!! isset($tag->gender) ? 'data-gender="'.$tag->gender.'"' : '' !!}>
					<a href="">{{ $tag->name }} <span class="tag-count">{{ $tag->count }}</span></a>
				</li>
			@endforeach
			</ul>
		@endforeach
		</div>
	</div>
</div>
@endsection
