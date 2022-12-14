@extends('layout.dashboard')

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
        <label for="success-modal" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
        <figure class="flex justify-center">
            <img src="{{ asset('/img/icon-check.webp') }}" alt="icon-check-webp">
        </figure>
        <p class="mx-auto text-center">{{ session('success') }}</p>
        <div class="modal-action justify-center">
            <label for="success-modal" class="btn btn-primary btn-md text-md text-white">Oke!</label>
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
        <label for="error-modal" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
        <figure class="flex justify-center">
            <img src="{{ asset('/img/icon-error.webp') }}" alt="icon-error-webp">
        </figure>
        <p class="mx-auto text-center">{{ session('error') }}</p>
        <div class="modal-action justify-center">
            <label for="error-modal" class="btn btn-primary btn-md text-md text-white">Oke!</label>
        </div>
    </div>
</div>
@endif

<section id="dashboard" class="py-16 min-h-screen bg-gradient-to-r from-slate-500 to-slate-800">
    <div class="container p-4 mx-auto flex flex-col-reverse w-full lg:flex-row">
        @include('partial.dashboard-sidebar')
        <div class="flex-grow card bg-slate-50 shadow-lg rounded-box m-2 lg:w-3/4">
            <div class="card-body">
                <h2 class="card-title justify-between">{{ $title }}</h2>
                <div class="divider my-0"></div>
                <form action="/manage/cover" method="POST" enctype="multipart/form-data">
                    <div class="flex flex-col-reverse lg:flex-row w-full">
                        @csrf
                        @method('PUT')
                        <div class="flex flex-col w-full lg:w-1/2">
                            <div class="form-control">
                                <label class="label label-text">Judul</label>
                                <input type="text" value="{{ $cover[0]->title }}" id="title" name="title" placeholder="Judul Cover Halaman Awal" class="input input-bordered hover:input-primary @error('title') input-error @enderror" required/>
                                @error('title')
                                <label class="label label-text-alt text-red-600">{{ $message }}</label>
                                @enderror
                            </div>
                            <div class="form-control">
                                <label class="label label-text">Deskripsi</label>
                                <input type="text" value="{{ $cover[0]->description }}" id="description" name="description" placeholder="Deskripsi" class="input input-bordered hover:input-primary @error('description') input-error @enderror" required/>
                                @error('description')
                                <label class="label label-text-alt text-red-600">{{ $message }}</label>
                                @enderror
                            </div>
                        </div>
                        <div class="flex flex-col w-full lg:w-1/2 lg:ml-3">
                            <label class="label label-text">Gambar Sampul</label>
                            <div class="flex justify-center w-full">
                                <figure>
                                    <img src="{{ asset('storage/cover.jpg') }}" id="cover_preview" class="cover_preview rounded-box" alt="Current profile photo">
                                </figure>
                            </div>
                            <div class="flex flex-wrap justify-center items-center pt-3">
                                <span class="sr-only">Choose profile photo</span>
                                <input type="file" id="cover_input" name="cover_input" onchange="previewCover()" class="cover_input block w-full text-sm text-slate-500 file:rounded-xl file:text-sm file:py-2 file:px-4 file:border-0 file:bg-slate-300 hover:file:bg-slate-400"/>
                                @error('cover_input')
                                <label class="label label-text-text-alt text-red-600">{{ $message }}</label>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-xs text-xs lg:btn-sm lg:text-sm mx-auto btn-primary text-white mt-3">Simpan</button>
                </form>
            </div>
        </div>
    </div>

</section>
<script>
    function previewCover(){
        const image = document.querySelector('#cover_input');
        const imgPreview = document.querySelector('#cover_preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent){
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>
@endsection