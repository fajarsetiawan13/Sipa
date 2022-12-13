@extends('layout.main')

@section('section')

<section id="login-page" class="py-8 bg-slate-100">
    <div class="container py-16 px-4 mx-auto">
        <div class="card shadow-lg max-w-3xl bg-slate-50 mx-auto">
            <div class="card-body gap-5">
                <div class="max-w-xl mx-auto text-center">                
                    <h4 class="font-semibold uppercase text-primary text-sm lg:text-lg">Artikel</h4>
                    <h1 class="font-bold text-dark text-xl lg:text-3xl">{{ $post->title }}</h1>
                    <small class="flex justify-center">ditulis oleh {{ $post->user->name }}, pada {{ $post->created_at->format('d-m-Y') }}</small>
                </div>
                <img src="{{ asset('storage') . '/' . $post->image }}" class="rounded-box w-auto mx-auto mb-3" alt="Current article's image">
                {!! $post->body !!}
            </div>
        </div>
    </div>
</section>

@endsection