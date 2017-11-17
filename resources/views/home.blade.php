@extends('layouts.app')

@section('content')
<div class="container mt-3">
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
@endsection
