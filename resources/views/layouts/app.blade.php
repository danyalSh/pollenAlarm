<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
		
		<title>Pollen Alarm</title>

		<!-- Loading third party fonts -->
		<link href="http://fonts.googleapis.com/css?family=Roboto:300,400,700|" rel="stylesheet" type="text/css">
		<link href="{{ asset('fonts/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

		<!-- Loading main css file -->
		<link rel="stylesheet" href="{{ asset('css/style.css') }}">
		<link rel="stylesheet" href="{{ asset('css/jquery-ui.css') }}">

		<!--[if lt IE 9]>
		<script src="{{ asset('js/ie-support/html5.js') }}"></script>
		<script src="{{ asset('js/ie-support/respond.js') }}"></script>
		<![endif]-->

	</head>


	<body>

        <div class="site-content">
            
            @include('partials.header')
            
            @yield('content')
            
            @include('partials.footer')

        </div>

        <script src="{{ asset('js/jquery-1.11.1.min.js') }}"></script>
		<script src="{{ asset('js/jquery-ui.min.js') }}"></script>
        <script src="{{ asset('js/pollenData.js') }}"></script>
	    <script src="{{ asset('js/plugins.js') }}"></script>
	    <script src="{{ asset('js/app.js') }}"></script>


	@yield('pageScripts')
	@show   

    </body>
</html>
