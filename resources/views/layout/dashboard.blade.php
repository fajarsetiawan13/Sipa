<!DOCTYPE html>
<html lang="en" class="scroll-smooth" data-theme="emerald">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Sipa | {{ $title }}</title>
     
	<link rel="icon" type="image/x-icon" href="{{ asset('/img/favicon.webp') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/croppie.css') }}">
    <link rel="stylesheet" type="text/css" href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css'>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
	@if(Request::is('manage/posts*')) 
		<link rel="stylesheet" type="text/css" href="{{ asset('/css/trix.min.css') }}">
	@endif
	
	<style type="text/css">
        img {
			display: block;
			max-width: 100%;
		}
		.preview {
			overflow: hidden;
			width: 160px;
			height: 160px;
			margin: 10px;
			border: 1px solid red;
		}
		trix-toolbar [data-trix-button-group="file-tools"] {
			display: none;
		}
	</style>
</head>
<body>

    @include('partial.dashboard-header')

    @yield('section')

    @include('partial.dashboard-footer')
        
    {{-- <script>
		const modalToggle = document.querySelector('#upload-modal');
		const image = document.querySelector('#image');
		let reader,file;
		
		$('input#image').on('change', function(e) {
			const files = e.target.files;
			const done = function(url) {
				image.src = url;
				modalToggle.checked = true;
			};

			if ((files && files.length) > 0) {
				file = files[0];

				if (URL) {
					done(URL.createObjectURL(file));
				} else if (FileReader){
					reader = new FileReader();
					reader.onload = function(e) {
						done(reader.result);
					};
					reader.readAsDataURL(file);
				}
			}
		});
	</script> --}}
</body>
</html>