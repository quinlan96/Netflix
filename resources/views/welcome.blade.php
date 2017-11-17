<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>

        <!-- Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
		<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700">

		<!-- Styles -->
		<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Roboto', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

			.hero-shot {
				background-image: url('https://goinswriter.com/wp-content/uploads/2013/10/breaking-bad.png');
			}

			.shading {
				background: linear-gradient(to right, rgba(0, 0, 0, 0.85), rgba(0, 0, 0, 0) 70%);
				height: 100vh;
				margin: 0;
			}

			.header {
				background: linear-gradient(to bottom, rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0));
				display: flex;
				width: 100%;
			}

			.logo {
				color: #e50914;
				float: left;
				font-size: 3em;
				font-weight: 500;
				margin: 20px;
				text-decoration: none;
			}

			.login {
				margin-left: auto;
			}

			.tagline {
				color: #fff;
				margin: 0 30px;
				position: absolute;
				transform: translateY(-50%);
				top: 50%;
			}

            .title {
				font-size: 6em;
				margin: 0;
			}

			.subtitle {
				font-size: 2em;
				margin: 0 0 15px 0;
			}

        </style>
    </head>
	<body>
		<div class="hero-shot">
			<div class="shading">
				<div class="header">
					<a href="/" class="logo">Netflix</a>
					<a href="login" class="btn btn-primary login">Log In</a>
				</div>
				<div class="tagline">
					<h1 class="title">See what's next.</h1>
					<p class="subtitle">Watch anywhere. Cancel at any time.</p>
					<a href="register" class="btn btn-primary">Sign Up Now</a>
				</div>
			</div>
		</div>
    </body>
</html>
