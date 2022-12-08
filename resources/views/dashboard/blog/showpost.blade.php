@extends('layout.dashboard')

@section('section')

<section id="dashboard" class="py-16 min-h-screen bg-gradient-to-r from-slate-500 to-slate-800">
    <div class="container p-4 mx-auto">
        <div class="flex flex-col-reverse w-full lg:flex-row">
            
            @include('partial.dashboard-sidebar')
            
            <div class="flex-grow card bg-slate-50 shadow-lg rounded-box m-2 lg:w-3/4">
                <div class="card-body">
                    <h2 class="card-title justify-between"><span>{{ $title; }}</span></h2>
                    <div class="divider my-0"></div>
                    <div class="flex flex-col justify-center gap-3">
                        <div class="block w-full text-center">
                            <h1 class="text-3xl font-bold">{{ $post->title }}</h1>
                            <small class="text-muted">dibuat oleh {{ $post->user->name }}, pada {{ $post->created_at->format('d-m-Y') }}</small>
                        </div>
                        <figure class="flex w-full px-6 py-3 justify-center">
                            <img src="{{ asset('storage/' . $post->image) }}" width="300vw" class="rounded-box object-center" alt="Current article's image">
                        </figure>
                        <div class="block w-full px-6 py-3">
                            <p>{!! $post->body !!}</p>
                        </div>
                        <div class="divider m-0"></div>
                        <div class="flex w-full">
                            <a href="/manage/posts/{{ $post->slug }}/edit" class="btn btn-sm btn-secondary rounded-full tooltip inline-flex text-sm text-white" data-tip="edit">edit <i class='bx bx-edit text-lg text-white'></i></a>
                            <a href="/manage/posts/{{ $post->slug }}/delete" class="btn btn-sm btn-error rounded-full tooltip inline-flex text-sm text-white" data-tip="delete" onclick="return confirm('Are you sure?')">hapus <i class='bx bx-trash text-lg text-white'></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', function() {
        fetch('/manage/posts/checkSlug?title=' + title.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
    });
</script>

@endsection