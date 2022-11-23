@extends('layout.dashboard')

@section('section')

<section id="dashboard" class="py-16 min-h-screen bg-gradient-to-r from-slate-500 to-slate-800">
    <div class="container p-4 mx-auto">
        <div class="flex flex-col-reverse w-full lg:flex-row">
            
            @include('partial.dashboard-sidebar')

            <div class="flex-grow card rounded-box m-2 lg:w-3/4">
                <div class="card w-full bg-slate-50 shadow-lg">
                    <div class="card-body">
                        <h2 class="card-title justify-between"><span>{{ $title }}</span></h2>
                        <div class="divider my-0"></div>
                        <form action="/manage/cover" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            
                            <div class="block w-full">
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
                            </div>
                            <div class="block w-full">
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
                            </div>
                            <div class="flex flex-col w-full">
                                <label class="label">
                                    <span class="label-text">Gambar Sampul</span>
                                </label>
                                <div class="flex justify-center">
                                    <figure>
                                        <img src="{{ asset('storage/cover.jpg') }}" id="img-preview" class="img-preview rounded-box" alt="Current profile photo">
                                    </figure>
                                </div>
                                <div class="flex flex-wrap justify-center items-center pt-3">
                                    <span class="sr-only">Choose profile photo</span>
                                    <input type="file" id="image" name="image" class="image block w-full text-sm text-slate-500 file:rounded-xl file:text-sm file:py-2 file:px-4 file:border-0 file:bg-slate-300 hover:file:bg-slate-400" onchange="previewImage()"/>
                                    @error('image')
                                    <label class="label">
                                        <span class="label-text-alt text-red-600">{{ $message }}</span>
                                    </label>
                                    @enderror
                                </div>
                            </div>
                            <div class="flex w-full">
                                <button type="submit" class="btn btn-sm btn-primary text-white mt-3">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection