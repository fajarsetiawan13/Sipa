@extends('layout.dashboard')

@section('section')

<section id="edit_page" class="py-16 min-h-screen bg-gradient-to-r from-slate-500 to-slate-800">
    <div class="container p-4 mx-auto">
        <div class="flex flex-col-reverse w-full lg:flex-row">
            
            @include('partial.dashboard-sidebar')
            
            <div class="flex-grow card bg-slate-50 shadow-lg rounded-box m-2 lg:w-3/4">
                <div class="card-body">
                    <h2 class="card-title justify-between"><span>{{ $title }}</span></h2>
                    <div class="divider my-0"></div>
                    @if(auth()->user()->is_active == 0)
                    <div class="alert alert-info shadow-lg">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-current flex-shrink-0 w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <span>
                                Akun belum diaktifkan oleh administrator! <br>
                                Silahkan tunggu 1x24 jam atau hubungi administrator sistem untuk mengaktifkan akun Anda.
                            </span>
                        </div>
                    </div>
                    @else
                    <form action="/information/{{ auth()->user()->id }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="flex flex-col-reverse lg:flex-row gap-2">
                            <div class="flex flex-col w-full gap-2 lg:w-3/4 lg:mb-0">
                                <div class="block w-full">
                                    <div class="form-control">
                                        <label class="label">
                                            <span class="label-text">Email</span>
                                        </label>
                                        <input type="text" value="{{ auth()->user()->email }}" id="email" name="email" placeholder="email" class="input input-bordered" disabled/>
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-col w-full gap-2 lg:w-1/4 lg:px-3">
                                <div class="flex justify-center">
                                    <figure class="p-3">
                                        @if(!empty($account[0]->image) && !($account[0]->image == 'default.png'))
                                        <img src="{{ asset('storage/' . $account[0]->image) }}" id="img-preview" class="img-preview rounded-box" alt="{{ auth()->user()->name }}" />
                                        @else
                                        <img src="/img/default.png" id="img-preview" class="img-preview rounded-box" alt="Current profile photo">
                                        @endif
                                    </figure>
                                </div>
                                <div class="flex flex-wrap justify-center items-center">
                                    <span class="sr-only">Choose profile photo</span>
                                    {{-- <label class="btn btn-sm bg-primary border-0 modal-button" for="upload-modal">Upload</label> --}}
                                    <input type="hidden" name="oldImage" value="{{ $account[0]->image }}">
                                    <input type="file" id="image" name="image" class="image block w-full text-sm text-slate-500 file:rounded-xl file:text-sm file:py-2 file:px-4 file:border-0 file:bg-slate-300 hover:file:bg-slate-400" onchange="previewImage()"/>
                                    @error('image')
                                    <label class="label">
                                        <span class="label-text-alt text-red-600">{{ $message }}</span>
                                    </label>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-end w-full lg:w-3/4 lg:pr-2">
                            <button type="submit" class="btn btn-sm btn-primary text-white mt-3">Simpan</button>
                        </div>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

@endsection