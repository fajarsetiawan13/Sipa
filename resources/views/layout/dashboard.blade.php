<!DOCTYPE html>
<html lang="en" class="scroll-smooth" data-theme="emerald">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Sipa | {{ $title }}</title>
     
	<link rel="icon" type="image/x-icon" href="{{ asset('/img/favicon.webp') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/app.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/jquery.dataTables.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/boxicons.min.css') }}">
    {{-- <link rel="stylesheet" type="text/css" href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css'> --}}
	@if(Request::is('manage/posts*')) 
		<link rel="stylesheet" type="text/css" href="{{ asset('/css/trix.min.css') }}">
		<style type="text/css">
			trix-toolbar [data-trix-button-group="file-tools"] {
				display: none;
			}
		</style>
	@endif
	
</head>
<body>

    @include('partial.dashboard-header')

    @yield('section')

    @include('partial.dashboard-footer')
        
</body>
</html>