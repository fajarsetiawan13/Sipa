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
            <label for="error-modal" class="btn btn-primary btn-xs text-xs lg:btn-sm lg:text-sm text-white">Oke!</label>
        </div>
    </div>
</div>
@endif

<section id="dashboard" class="py-16 min-h-screen bg-gradient-to-r from-slate-500 to-slate-800">
    <div class="container p-4 mx-auto flex flex-col-reverse lg:flex-row">
        @include('partial.dashboard-sidebar')
        <div class="card bg-slate-50 shadow-lg rounded-box m-2 lg:w-3/4">
            <div class="card-body">
                <h2 class="card-title justify-between">{{ $title }}</h2>
                <div class="divider my-0"></div>
                @can('admin')
                @include('partial.dashboard-admin')
                @endcan
                @can('user')
                @include('partial.dashboard-user')
                @endcan
            </div>
        </div>
    </div>
</section>

<input type="checkbox" id="contact-modal" class="modal-toggle" />
<div class="modal modal-bottom sm:modal-middle">
    <div class="modal-box">
        <label for="contact-modal" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
        <h2 class="font-bold text-lg">Tambah Kontak Keluarga</h2>
        <p class="py-4">Pastikan kontak dapat dihubungi setiap saat!</p>
        <form action="/dashboard/contact" method="POST">
            @csrf
            <div class="form-control">
                <label class="label label-text">Nama</label>
                <input type="text" placeholder="Nama Kontak" id="family_name" name="family_name" class="input input-bordered" autofocus required/>
            </div>
            <div class="form-control">
                <label class="label label-text">Nomor Telepon/HP/Whatsapp yang aktif</label>
                <input type="text" placeholder="Nomor Kontak" id="phone_number" name="phone_number" class="input input-bordered" required/>
            </div>
            <div class="modal-action">
                <button for="contact-modal" class="btn btn-primary text-white">Tambah</button>
            </div>
        </form>
    </div>
</div>

<input type="checkbox" id="odd-modal" class="modal-toggle" />
<div class="modal modal-bottom sm:modal-middle">
    <div class="modal-box">
        <label for="odd-modal" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
        <h2 class="font-bold text-lg">Ubah Foto Orang Dengan Demensia</h2>
        <p class="py-4">Pastikan foto/gambar terlihat jelas dan tidak melebihi batas ukuran 2 MB.</p>
        <div class="flex flex-col justify-between gap-2">
            <form action="/addphotos" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="flex">
                    <img src="/img/default.webp" id="odd_preview" class="odd_preview rounded-box mx-auto max-w-[160px] max-h-[160px] object-cover" width="160" height="160" alt="" />
                </div>
                <div class="flex justify-center pt-3">
                    <span class="sr-only">Pilih Foto</span>
                    <input type="file" id="odd_input" name="odd_input" onchange="previewOdd()" class="odd_input block w-full text-sm text-slate-500 file:rounded-xl file:text-sm file:py-2 file:px-4 file:border-0 file:bg-slate-300 hover:file:bg-slate-400"/>
                    @error('odd_input')
                    <label class="label">
                        <span class="label-text-alt text-red-600">{{ $message }}</span>
                    </label>
                    @enderror
                </div>
                <div class="modal-action">
                    <button class="btn btn-primary crop_odd text-white">Unggah</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function previewOdd(){
        const image = document.querySelector('#odd_input');
        const imgPreview = document.querySelector('#odd_preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent){
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>

@endsection