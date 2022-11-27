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
    <div class="container p-4 mx-auto">
        <div class="flex flex-col-reverse w-full lg:flex-row">
            
            @include('partial.dashboard-sidebar')

            <div class="flex-grow card rounded-box m-2 lg:w-3/4">
                <div class="card w-full bg-slate-50 shadow-lg">
                    <div class="card-body">
                        <h2 class="card-title justify-between"><span>{{ $title }}</span></h2>
                        <div class="divider my-0"></div>
                        <div class="flex flex-row w-full">
                            <div class="flex flex-col w-full lg:w-1/2">
                                <form action="/manage/cover" method="POST">
                                    @csrf
                                    @method('PUT')
                                    
                                    <div class="form-control">
                                        <label class="label">
                                            <span class="label-text">Judul</span>
                                        </label>
                                        <input type="text" value="{{ $cover[0]->title }}" id="title" name="title" placeholder="Judul Cover Halaman Awal" class="input input-bordered hover:input-primary @error('title') input-error @enderror" required/>
                                        @error('title')
                                        <label class="label">
                                            <span class="label-text-alt text-red-600">{{ $message }}</span>
                                        </label>
                                        @enderror
                                    </div>
                                    <div class="form-control">
                                        <label class="label">
                                            <span class="label-text">Deskripsi</span>
                                        </label>
                                        <input type="text" value="{{ $cover[0]->description }}" id="description" name="description" placeholder="Deskripsi" class="input input-bordered hover:input-primary @error('description') input-error @enderror" required/>
                                        @error('description')
                                        <label class="label">
                                            <span class="label-text-alt text-red-600">{{ $message }}</span>
                                        </label>
                                        @enderror
                                    </div>
                                    <div class="flex w-full">
                                        <button type="submit" class="btn btn-sm btn-primary text-white mt-3">Simpan</button>
                                    </div>
                                </form>
                            </div>
                            <div class="flex flex-col w-full lg:w-1/2 lg:ml-3">
                                <label class="label">
                                    <span class="label-text">Gambar Sampul</span>
                                </label>
                                <div class="flex justify-center w-full">
                                    <figure>
                                        <img src="{{ asset('storage/cover.jpg') }}" id="img-preview" class="img-preview rounded-box" alt="Current profile photo">
                                    </figure>
                                </div>
                                <div class="flex flex-wrap justify-center items-center pt-3">
                                    <span class="sr-only">Choose profile photo</span>
                                    <input type="file" id="cover_input" name="cover_input" class="cover_input block w-full text-sm text-slate-500 file:rounded-xl file:text-sm file:py-2 file:px-4 file:border-0 file:bg-slate-300 hover:file:bg-slate-400"/>
                                    @error('cover_input')
                                    <label class="label">
                                        <span class="label-text-alt text-red-600">{{ $message }}</span>
                                    </label>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<input type="checkbox" id="cover-modal" class="modal-toggle" />
<div class="modal modal-bottom sm:modal-middle">
    <div class="modal-box w-5/6 max-w-3xl">
        <label for="cover-modal" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
        <h2 class="font-bold text-lg">Sesuaikan Gambar Sebelum Upload</h2>
        <p class="py-4">Pastikan foto/gambar terlihat jelas dan tidak melebihi batas ukuran 2 MB.</p>
        <div class="flex flex-col justify-between gap-2">
            <div class="flex">
                <div id="cover_upload" class="cover_upload rounded-box"></div>
            </div>
        </div>
        <div class="modal-action">
            <button class="btn btn-primary crop_cover text-white">Crop</button>
        </div>
    </div>
</div>

@endsection