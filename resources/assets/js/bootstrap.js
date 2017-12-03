
window._ = require('lodash');

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */
try {
    window.$ = window.jQuery = require('jquery');
	window.Popper = require('popper.js').default;
    require('bootstrap');
} catch (e) { console.log(e); }

var qq = require('fine-uploader');

$(document).ready(function() {
	var uploader = new qq.FineUploader({
		element: document.getElementById('uploader'),
		multiple: false,
		chunking: {
			enabled: true,
			success: {
				endpoint: '/fine-upload?done'
			}
		},
		request: {
			endpoint: '/fine-upload',
			forceMultipart: true
		},
		callbacks: {
			onUpload: function() {
				document.getElementsByClassName('qq-upload-button')[0].style.display = 'none';
				document.getElementsByClassName('qq-total-progress-bar-container')[0].style.display = 'inline-block';
			},
			onAllComplete: function(succeeded, failed) {
				if(succeeded.length > 0 && failed.length == 0) {
					document.getElementsByName('uuid')[0].setAttribute('value', uploader.getUuid(succeeded[0]));
					document.getElementsByName('filename')[0].setAttribute('value', uploader.getName(succeeded[0]));
					document.getElementById('upload-btn').disabled = false;
					document.getElementsByClassName('qq-total-progress-bar-container')[0].style.background = "#4CAF50";
					document.getElementsByClassName('qq-progress-percentage')[0].innerHTML = "Completed";
				} else {
					document.getElementsByClassName('qq-upload-button')[0].style.display = 'inline-block';
					document.getElementsByClassName('qq-total-progress-bar-container')[0].style.background = "#f0f";
					document.getElementsByClassName('qq-progress-percentage')[0].innerHTML = "Upload Error";
				}
			},
			onError: function() {
			},
			onCancel: function() {
				document.getElementsByClassName('qq-upload-button')[0].style.display = 'inline-block';
				document.getElementsByClassName('qq-total-progress-bar-container')[0].style.display = 'none';
			},
			onTotalProgress: function(loaded, total) {
				document.getElementsByClassName('qq-progress-percentage')[0].innerHTML = Math.round(loaded/total*100) + '%';
			}
		}
	});
});

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Next we will register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo'

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: 'your-pusher-key'
// });
