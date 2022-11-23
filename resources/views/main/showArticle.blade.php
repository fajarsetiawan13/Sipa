@extends('layout.main')

@section('section')

<section id="login-page" class="py-8 bg-slate-100">
    <div class="container py-16 px-4 mx-auto">
        <div class="flex justify-center">
            <div class="card flex shadow-lg max-w-3xl bg-slate-50">
                <div class="card-body">
                    <div class="w-full">
                        <div class="max-w-xl mx-auto text-center mb-1">                
                            <h4 class="font-semibold uppercase text-primary text-lg mb-3">Artikel</h4>
                            <h1 class="font-bold text-dark text-xl mb-1 lg:text-3xl">{{ $post->title }}</h1>
                            <small class="flex justify-center">ditulis oleh {{ $post->user->name }}, pada {{ $post->created_at->format('d-m-Y') }}</small>
                        </div>
                        <figure class="flex w-full px-3 py-2 justify-center">
                            <img src="{{ asset('storage') . '/' . $post->image }}" class="rounded-box object-center max-w-sm" alt="Current article's image">
                        </figure>
                    </div>
                    <div class="block w-full px-6 py-3">
                        <p>{!! $post->body !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection