@extends('layout.dashboard')

@section('section')

<section id="dashboard" class="py-16 min-h-screen bg-gradient-to-r from-slate-500 to-slate-800">
    <div class="container p-4 mx-auto flex flex-col-reverse w-full lg:flex-row">
        @include('partial.dashboard-sidebar')
        <div class="flex-grow card bg-slate-50 shadow-lg rounded-box m-2 lg:w-3/4">
            <div class="card-body">
                <h2 class="card-title justify-between">Artikel</h2>
                <div class="divider my-0"></div>
                <div class="flex flex-col justify-center">
                    <h1 class="text-xl lg:text-3xl text-center font-bold">{{ $post->title }}</h1>
                    <small class="text-muted text-center">dibuat oleh {{ $post->user->name }}, pada {{ $post->created_at->format('d-m-Y') }}</small>
                    <img src="{{ asset('storage/' . $post->image) }}" width="300vw" class="py-5 mx-auto" alt="Current article's image">
                    {!! $post->body !!}
                    <div class="divider mb-3"></div>
                    <div class="flex gap-2 w-full">
                        <a href="/manage/posts/{{ $post->slug }}/edit" class="btn btn-xs text-xs lg:btn-sm lg:text-sm btn-secondary rounded-full tooltip inline-flex text-white" data-tip="edit">edit <i class='bx bx-edit text-lg text-white'></i></a>
                        <a href="/manage/posts/{{ $post->slug }}/delete" class="btn btn-xs text-xs lg:btn-sm lg:text-sm btn-error rounded-full tooltip inline-flex text-white" data-tip="delete" onclick="return confirm('Are you sure?')">hapus <i class='bx bx-trash text-lg text-white'></i></a>
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