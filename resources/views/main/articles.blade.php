@extends('layout.main')

@section('section')

<section id="login-page" class="py-8 bg-slate-800">
    <div class="container py-16 px-4 mx-auto">
        <div class="w-full">
            <div class="max-w-xl mx-auto text-center">                
                <h4 class="font-semibold uppercase text-primary text-sm lg:text-lg">Artikel</h4>
                <h2 class="font-bold text-slate-50 text-2xl mb-3 lg:text-3xl">{{ $title }}</h2>
            </div>
        </div>
        <div class="flex flex-wrap">
            @if(!empty($posts->count()))
            @foreach($posts as $p)
            <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                <div class="bg-white rounded-xl overflow-hidden shadow-lg mb-10">
                    <img src="{{ asset('storage/' . $p->image) }}" alt="Programming" class="w-full">
                    <div class="py-8 px-6">
                        <a href="/article/{{ $p->slug }}" class="block mb-3 font-semibold text-xl text-dark hover:text-primary truncate"><h3>{{ $p->title }}</h3></a>
                        <p class="font-medium text-base text-slate-800 mb-4">{{ $p->excerpt }}</p>
                        <a href="/article/{{ $p->slug }}" class="font-medium text-sm text-white bg-primary py-2 px-4 rounded-lg hover:opacity-80">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
            @endforeach
            {{ $posts->links() }}
            @else
            <p class="flex w-full text-slate-50 justify-center py-5">- Data Tidak Ditemukan! -</p>
            @endif
        </div>
    </div>
</section>

@endsection