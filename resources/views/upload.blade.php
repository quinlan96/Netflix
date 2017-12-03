@extends('layouts.app')

@section('content')
<script type="text/template" id="qq-template">
	<div class="qq-uploader-selector qq-uploader qq-gallery" qq-drop-area-text="">
		<div class="qq-upload-drop-area-selector qq-upload-drop-area" qq-hide-dropzone>
			<span class="qq-upload-drop-area-text-selector"></span>
		</div>
		<div class="qq-upload-icon">
			<i class="fa fa-5x fa-cloud-upload" aria-hidden="true"></i>
		</div>
		<div class="qq-upload-button-selector qq-upload-button">
			<div>Upload a file</div>
		</div>
		<span class="qq-drop-processing-selector qq-drop-processing">
			<span>Processing dropped files...</span>
			<span class="qq-drop-processing-spinner-selector qq-drop-processing-spinner"></span>
		</span>
		<ul class="qq-upload-list-selector qq-upload-list" role="region" aria-live="polite" aria-relevant="additions removals">
			<li>
				<div class="qq-thumbnail-wrapper">
					<img class="qq-thumbnail-selector" qq-max-size="120" qq-server-scale>
				</div>

				<div class="qq-file-info">
					<div class="qq-file-name">
						<span class="qq-upload-file-selector qq-upload-file"></span>
						<span class="qq-edit-filename-icon-selector qq-btn qq-edit-filename-icon" aria-label="Edit filename"></span>
					</div>
					<input class="qq-edit-filename-selector qq-edit-filename" tabindex="0" type="text">
					<button type="button" class="qq-btn qq-upload-delete-selector qq-upload-delete">
						<span class="qq-btn qq-delete-icon" aria-label="Delete"></span>
					</button>
					<div class="qq-buttons">
						<button type="button" class="qq-upload-retry-selector qq-upload-retry">
							<i class="fa fa-2x fa-undo" aria-hidden="true"></i>
						</button>
						<button type="button" class="qq-btn qq-upload-pause-selector qq-upload-pause">
							<i class="fa fa-2x fa-pause" aria-hidden="true"></i>
						</button>
						<button type="button" class="qq-btn qq-upload-continue-selector qq-upload-continue">
							<i class="fa fa-2x fa-play" aria-hidden="true"></i>
						</button>
						<button type="button" class="qq-upload-cancel-selector qq-upload-cancel">
							<i class="fa fa-2x fa-times" aria-hidden="true"></i>
						</button>
					</div>
				</div>
			</li>
		</ul>
		<div class="qq-total-progress-bar-container-selector qq-total-progress-bar-container">
			<div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" class="qq-total-progress-bar-selector qq-progress-bar qq-total-progress-bar"></div>
			<span class="qq-progress-percentage"></span>
		</div>

		<dialog class="qq-alert-dialog-selector">
			<div class="qq-dialog-message-selector"></div>
			<div class="qq-dialog-buttons">
				<button type="button" class="qq-cancel-button-selector">Close</button>
			</div>
		</dialog>

		<dialog class="qq-confirm-dialog-selector">
			<div class="qq-dialog-message-selector"></div>
			<div class="qq-dialog-buttons">
				<button type="button" class="qq-cancel-button-selector">No</button>
				<button type="button" class="qq-ok-button-selector">Yes</button>
			</div>
		</dialog>

		<dialog class="qq-prompt-dialog-selector">
			<div class="qq-dialog-message-selector"></div>
			<input type="text">
			<div class="qq-dialog-buttons">
				<button type="button" class="qq-cancel-button-selector">Cancel</button>
				<button type="button" class="qq-ok-button-selector">Ok</button>
			</div>
		</dialog>
	</div>
</script>
<div class="container mt-3">
	<div class="row">
		<form id="upload" method="post" class="col-md-12" action="/upload">
			{{ csrf_field() }}
			<input type="hidden" name="uuid">
			<input type="hidden" name="filename">
			<h1>Upload</h1>
			<div id="uploader"></div>
			<div class="form-group">
				<label for="title">Title</label>
				<input type="text" class="form-control" id="title" name="title">
			</div>
			<div class="form-group">
				<label for="description">Description</label>
				<textarea class="form-control" id="description" name="description" rows="3"></textarea>
			</div>
			<div class="form-group">
				<button id="upload-btn" class="btn btn-primary" disabled>Submit</button>
			</div>
		</form>
    </div>
</div>
@endsection

@section('scripts')
@endsection
