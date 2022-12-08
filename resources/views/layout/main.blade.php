<!DOCTYPE html>
<html lang="en" class="scroll-smooth" data-theme="emerald">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sipa | {{ $title }}</title>

	<link rel="icon" type="image/x-icon" href="{{ asset('/img/favicon.webp') }}">
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('/css/app.min.css') }}" rel="stylesheet"> --}}
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

    @include('partial.main-header')

    @yield('section')

    @include('partial.main-footer')

</body>
</html>