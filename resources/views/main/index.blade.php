@extends('layout.main')

@section('section')

@if(session()->has('success'))
<script type="text/javascript">
    $(window).on('load', function(){
        $('#success-modal').modal('show');
    });
</script>
<input type="checkbox" id="success-modal" class="modal-toggle" checked/>
<div class="modal modal-bottom sm:modal-middle" id="success-modal">
    <div class="modal-box">
        <label for="success-modal" class="btn btn-sm text-sm btn-circle absolute right-2 top-2">✕</label>
        <figure class="flex justify-center">
            <img src="{{ asset('/img/icon-check.webp') }}" alt="icon-check-webp">
        </figure>
        <p class="mx-auto text-center">{{ session('success') }}</p>
        <div class="modal-action justify-center">
            <label for="success-modal" class="btn btn-primary btn-sm text-sm lg:btn-md lg:text-md text-white">Oke!</label>
        </div>
    </div>
</div>
@endif

@if(session()->has('error'))
<script type="text/javascript">
    $(window).on('load', function(){
        $('#error-modal').modal('show');
    });
</script>
<input type="checkbox" id="error-modal" class="modal-toggle" checked/>
<div class="modal modal-bottom sm:modal-middle" id="error-modal">
    <div class="modal-box">
        <label for="error-modal" class="btn btn-sm text-sm btn-circle absolute right-2 top-2">✕</label>
        <figure class="flex justify-center">
            <img src="{{ asset('/img/icon-error.webp') }}" alt="icon-error-webp">
        </figure>
        <p class="mx-auto text-center">{{ session('error') }}</p>
        <div class="modal-action justify-center">
            <label for="error-modal" class="btn btn-primary btn-sm text-sm lg:btn-md lg:text-md text-white">Oke!</label>
        </div>
    </div>
</div>
@endif

{{-- HERO SECTION START --}}
<section id="hero">
    <div class="hero min-h-screen" style="background-image: url({{ asset('storage/cover.jpg') }});">
        <div class="hero-overlay bg-opacity-60"></div>
        <div class="block hero-content text-center text-neutral-content">
            <h1 class="max-w-xl mb-5 text-3xl lg:text-5xl text-slate-50 font-bold">{{ $cover[0]->title }}</h1>
            <p class="max-w-xl mb-5 text-slate-50">{{ $cover[0]->description }}</p>
		</div>
    </div>
</section>
{{-- HERO SECTION END --}}


{{-- BLOG SECTION START --}}
<section id="blog" class="py-8 bg-slate-100">
	<div class="container p-4 mx-auto text-center">
        <div class="max-w-xl mx-auto text-center">
            <h4 class="font-semibold uppercase text-primary text-sm lg:text-lg">Artikel</h4>
            <h2 class="font-bold text-dark text-2xl mb-3 lg:text-3xl">Terkini</h2>
        </div>
        <div class="flex flex-wrap gap-3 justify-center">
            <?php $i = 0; ?>
            @if(!empty($posts->count()))
            @foreach($posts as $p)
            <div class="w-full lg:w-1/4 bg-white rounded-box overflow-hidden shadow-lg">
                <img src="{{ asset('storage/' . $p->image) }}" class="w-full mb-3" alt="cover's image">
                <a href="/article/{{ $p->slug }}" class="block font-semibold text-sm text-dark lg:text-lg hover:text-primary truncate mb-2 px-3">{{ $p->title }}</a>
                <p class="font-normal text-xs text-slate-800 mb-2 px-3">{{ $p->excerpt }}</p>
                <a href="/article/{{ $p->slug }}" class="btn btn-sm text-sm lg:btn-md lg:text-md btn-primary text-slate-50 px-5 hover:opacity-70 mb-3">Baca Selengkapnya</a>
            </div>
            <?php if(++$i == 3) break; ?>
            @endforeach
            @else
            <p class="py-5">- Data Tidak Ditemukan! -</p>
            @endif
        </div>
        <a href="/article" class="btn btn-sm text-sm lg:btn-md lg:text-md btn-primary text-slate-50 px-5 mt-5 hover:opacity-70">Lihat Artikel Lebih Banyak</a>
    </div>
</section>
{{-- BLOG SECTION END --}}

{{-- CONTACT SECTION START --}}
<section id="contact" class="py-8 bg-slate-800">
	<div class="container p-4 mx-auto">
        <div class="max-w-xl mx-auto text-center">
            <h4 class="font-semibold uppercase text-primary text-sm lg:text-lg">Kontak</h4>
            <h2 class="font-bold text-slate-50 text-2xl mb-3 lg:text-3xl">Hubungi Kami</h2>
            <p class="font-medium text-md text-slate-300 lg:text-lg mb-3">Punya pertanyaan atau kritik dan saran? Sampaikan kepada kami!</p>
        </div>
        <form action="/sendmessage" method="POST">
            @csrf
            <div class="w-full lg:w-1/2 mx-auto px-4">
                <label for="name" class="text-base text-primary font-bold mb-3">Nama</label>
                <input type="text" name="name" id="name" class="w-full @error('name') input-error @enderror bg-white text-dark p-3 mb-3 rounded-md focus:outline-none focus:ring-primary focus:ring-1 focus:border-primary" required>
                @error('name')
                <label class="label label-text-alt text-red-600">{{ $message }}</label>
                @enderror
                <label for="email" class="text-base text-primary font-bold mb-3">Email</label>
                <input type="text" name="email" id="email" class="w-full @error('email') input-error @enderror bg-white text-dark p-3 mb-3 rounded-md focus:outline-none focus:ring-primary focus:ring-1 focus:border-primary" required>
                @error('email')
                <label class="label label-text-alt text-red-600">{{ $message }}</label>
                @enderror
                <label for="message" class="text-base text-primary font-bold mb-3">Pesan</label>
                <textarea type="text" name="message" id="message" class="w-full @error('message') input-error @enderror bg-white text-dark p-3 mb-3 rounded-md focus:outline-none focus:ring-primary focus:ring-1 focus:border-primary h-32" required></textarea>
                @error('message')
                <label class="label label-text-alt text-red-600">{{ $message }}</label>
                @enderror
                <button class="btn btn-sm text-sm lg:btn-md lg:text-md px-5 text-slate-50 bg-primary hover:bg-opacity-70">Kirim</button>
            </div>
        </form>
    </div>
</section>
{{-- CONTACT SECTION END --}}

@endsection