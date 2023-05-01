<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title inertia>{{ config('app.name', 'Esteve') }}</title>

		<link rel="apple-touch-icon" sizes="180x180" href="{{ URL::asset('favicon/apple-touch-icon.png') }}">
		<link rel="icon" type="image/png" sizes="32x32" href="{{ URL::asset('favicon/favicon-32x32.png') }}">
		<link rel="icon" type="image/png" sizes="16x16" href="{{ URL::asset('favicon/favicon-16x16.png') }}">
		<link rel="manifest" href="{{ URL::asset('favicon/site.webmanifest') }}">

		<!-- Fonts -->
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

		<!-- Scripts -->
		@routes
		@vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
		@inertiaHead
	</head>
	<body class="font-sans antialiased">
		@inertia
		<script src="{{ asset('tarteaucitron/tarteaucitron.js') }}"></script>
		<script src="{{ asset('tarteaucitron/cookie.js') }}" defer></script>
	</body>
</html>
