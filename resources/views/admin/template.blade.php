<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>ecol tienda en línea</title>
	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('admin/css/main.css') }}">
</head>
<body>

	@if(\Session::has('message'))
		@include('admin.partials.message')
	@endif
	
	@include('admin.partials.nav')

	@yield('content')

	@include('admin.partials.footer')

	<script src="{{ asset('js/jquery.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('admin/js/main.js') }}"></script>
</body>
</html>