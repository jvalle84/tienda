<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>@yield('title', 'ecol tienda en línea')</title>
	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>
<body>

	@if(\Session::has('message'))
		@include('store.partials.message')
	@endif
	
	@include('store.partials.nav')

	@yield('content')

	@include('store.partials.footer')

	<script src="{{ asset('js/jquery.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/pinterest_grid.js') }}"></script>
	<script src="{{ asset('js/main.js') }}"></script>
</body>
</html>