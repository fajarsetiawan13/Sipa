@extends('layout.dashboard')

@section('section')

<section id="dashboard" class="py-16 min-h-screen bg-gradient-to-r from-slate-500 to-slate-800">
    <div class="container p-4 mx-auto">
        <div class="flex flex-col-reverse w-full lg:flex-row">
            
            @include('partial.dashboard-sidebar')
            
            <div class="flex-grow card rounded-box m-2 lg:w-3/4">
                <div class="card w-full bg-slate-50 shadow-lg">
                    <div class="card-body">
                        <h2 class="card-title justify-between"><span>{{ $title; }}</span></h2>
                        <div class="divider my-0"></div>
                        <form action="/manage/posts/save" method="POST" enctype="multipart/form-data">
                            @csrf
                            <button class="btn btn-sm w-1/6 btn-primary border-0 text-white text-xs">Simpan</button>
                                
                            <div class="flex flex-col-reverse lg:flex-row gap-2">
                                <div class="flex flex-col w-full gap-2 lg:w-3/4 lg:mb-0">
                                    <div class="block w-full">
                                        <div class="form-control">
                                            <label class="label">
                                                <span class="label-text">Judul Artikel</span>
                                            </label>
                                            <input type="text" id="title" name="title" value="{{ old('title') }}" placeholder="Judul Artikel" class="input input-bordered hover:input-primary @error('title') input-error @enderror" required/>
                                            <input type="text" id="slug" name="slug" placeholder="Slug Artikel" class="input input-bordered hover:input-primary" hidden readonly/>
                                            @error('title')
                                            <label class="label">
                                                <span class="label-text-alt text-red-600">{{ $message }}</span>
                                            </label>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="block w-full">
                                        <div class="form-control">
                                            <label class="label">
                                                <span class="label-text">Isi Artikel</span>
                                            </label>
                                            <input id="body" type="hidden" name="body">
                                            <trix-editor input="body"></trix-editor>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex flex-col w-full gap-2 lg:w-1/4 lg:px-3">
                                    <div class="flex justify-center">
                                        <figure class="p-3">
                                            <img src="/img/article.webp" id="img-preview" class="img-preview rounded-box" alt="Current profile photo">
                                        </figure>
                                    </div>
                                    <div class="flex flex-wrap justify-center items-center">
                                        <span class="sr-only">Choose profile photo</span>
                                        <input type="file" id="image" name="image" class="image block w-full text-sm text-slate-500 file:rounded-xl file:text-sm file:py-2 file:px-4 file:border-0 file:bg-slate-300 hover:file:bg-slate-400" onchange="previewImage()"/>
                                        @error('image')
                                        <label class="label">
                                            <span class="label-text-alt text-red-600">{{ $message }}</span>
                                        </label>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </form>
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