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
                    <img src="{{ asset('storage/' . $post->image) }}" width="300" height="300" class="py-5 mx-auto max-w-[300px]" alt="Current article's image">
                    {!! $post->body !!}
                    <div class="divider mb-3"></div>
                    <div class="flex gap-2 w-full">
                        <a href="/manage/posts/{{ $post->slug }}/edit" class="btn btn-xs text-xs lg:btn-sm lg:text-sm btn-secondary rounded-full tooltip inline-flex text-white" data-tip="edit">edit <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" style="fill: rgb(255, 255, 255);transform: ;msFilter:;"><path d="m7 17.013 4.413-.015 9.632-9.54c.378-.378.586-.88.586-1.414s-.208-1.036-.586-1.414l-1.586-1.586c-.756-.756-2.075-.752-2.825-.003L7 12.583v4.43zM18.045 4.458l1.589 1.583-1.597 1.582-1.586-1.585 1.594-1.58zM9 13.417l6.03-5.973 1.586 1.586-6.029 5.971L9 15.006v-1.589z"></path><path d="M5 21h14c1.103 0 2-.897 2-2v-8.668l-2 2V19H8.158c-.026 0-.053.01-.079.01-.033 0-.066-.009-.1-.01H5V5h6.847l2-2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2z"></path></svg></a>
                        <a href="/manage/posts/{{ $post->slug }}/delete" class="btn btn-xs text-xs lg:btn-sm lg:text-sm btn-error rounded-full tooltip inline-flex text-white" data-tip="delete" onclick="return confirm('Are you sure?')">hapus <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" style="fill: rgb(255, 255, 255);transform: ;msFilter:;"><path d="M5 20a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8h2V6h-4V4a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2v2H3v2h2zM9 4h6v2H9zM8 8h9v12H7V8z"></path><path d="M9 10h2v8H9zm4 0h2v8h-2z"></path></svg></a>
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