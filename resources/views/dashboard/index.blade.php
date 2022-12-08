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
    <div class="container p-4 mx-auto">
        <div class="flex flex-col-reverse lg:flex-row">
            
            @include('partial.dashboard-sidebar')

            <div class="card bg-slate-50 shadow-lg rounded-box m-2 lg:w-3/4">
                <div class="card-body overflow-x-auto">
                    <h2 class="card-title justify-between"><span>{{ $title }}</span></h2>
                    <div class="divider my-0"></div>
                    <div class="flex flex-col-reverse lg:flex-row gap-2">
                        <div class="flex flex-col w-full gap-2 lg:w-3/4 lg:mb-0">
                            <table class="table table-compact w-full">
                                <thead>
                                    <tr>
                                        <th colspan="3" class="text-xs lg:text-sm">Penanggung Jawab</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="hover">
                                        <td class="w-2/12 bg-slate-50 text-xs lg:text-sm">Nama</td>
                                        <td class="w-1/12 bg-slate-50 text-xs lg:text-sm">:</td>
                                        <td class="w-9/12 bg-slate-50 text-xs lg:text-sm">{{ auth()->user()->name }}</td>
                                    </tr>
                                    <tr class="hover">
                                        <td class="w-2/12 bg-slate-50 text-xs lg:text-sm">Jenis Kelamin</td>
                                        <td class="w-1/12 bg-slate-50 text-xs lg:text-sm">:</td>
                                        <td class="w-9/12 bg-slate-50 text-xs lg:text-sm whitespace-pre-line">{{ $account[0]->gender }}</td>
                                    </tr>
                                    <tr class="hover">
                                        <td class="w-2/12 bg-slate-50 text-xs lg:text-sm">Alamat</td>
                                        <td class="w-1/12 bg-slate-50 text-xs lg:text-sm">:</td>
                                        <td class="w-9/12 bg-slate-50 text-xs lg:text-sm whitespace-pre-line">{{ $account[0]->address }}</td>
                                    </tr>
                                    <tr class="hover">
                                        <td class="w-2/12 bg-slate-50 text-xs lg:text-sm">Nomor HP/Telepon</td>
                                        <td class="w-1/12 bg-slate-50 text-xs lg:text-sm">:</td>
                                        <td class="w-9/12 bg-slate-50 text-xs lg:text-sm whitespace-pre-line">{{ $account[0]->phone }}</td>
                                    </tr>
                                    <tr class="hover">
                                        <td class="w-2/12 bg-slate-50 text-xs lg:text-sm">Email</td>
                                        <td class="w-1/12 bg-slate-50 text-xs lg:text-sm">:</td>
                                        <td class="w-9/12 bg-slate-50 text-xs lg:text-sm whitespace-pre-line">{{ $account[0]->email }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-compact w-full">
                                <thead>
                                    <tr>
                                        <th colspan="3" class="text-xs lg:text-sm">Orang Dengan Demensia (ODD)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="hover">
                                        <td class="w-2/12 bg-slate-50 text-xs lg:text-sm">Nama</td>
                                        <td class="w-1/12 bg-slate-50 text-xs lg:text-sm">:</td>
                                        <td class="w-9/12 bg-slate-50 text-xs lg:text-sm">{{ $account[0]->odd_name }}</td>
                                    </tr>
                                    <tr class="hover">
                                        <td class="w-2/12 bg-slate-50 text-xs lg:text-sm">Jenis Kelamin</td>
                                        <td class="w-1/12 bg-slate-50 text-xs lg:text-sm">:</td>
                                        <td class="w-9/12 bg-slate-50 text-xs lg:text-sm whitespace-pre-line">{{ $account[0]->odd_gender }}</td>
                                    </tr>
                                    <tr class="hover">
                                        <td class="w-2/12 bg-slate-50 text-xs lg:text-sm">Umur</td>
                                        <td class="w-1/12 bg-slate-50 text-xs lg:text-sm">:</td>
                                        <td class="w-9/12 bg-slate-50 text-xs lg:text-sm whitespace-pre-line">{{ $account[0]->odd_age }}</td>
                                    </tr>
                                    <tr class="hover">
                                        <td class="w-2/12 bg-slate-50 text-xs lg:text-sm">Tahap Alzheimer</td>
                                        <td class="w-1/12 bg-slate-50 text-xs lg:text-sm">:</td>
                                        <td class="w-9/12 bg-slate-50 text-xs lg:text-sm whitespace-pre-line">{{ $account[0]->odd_stage }}</td>
                                    </tr>
                                    <tr class="hover">
                                        <td class="w-2/12 bg-slate-50 text-xs lg:text-sm">Deskripsi Fisik</td>
                                        <td class="w-1/12 bg-slate-50 text-xs lg:text-sm">:</td>
                                        <td class="w-9/12 bg-slate-50 text-xs lg:text-sm whitespace-pre-line">{{ $account[0]->odd_description }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-compact w-full">
                                <thead>
                                    <tr>
                                        <th colspan="3" class="text-xs lg:text-sm">Kontak Keluarga</th>
                                        <th colspan="1" class="flex justify-end"><label class="btn btn-xs text-xs lg:btn-sm lg:text-sm bg-primary border-0 modal-button" for="contact-modal">Tambah</label></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($contact->count())
                                    @foreach($contact as $c)
                                    <tr class="hover">
                                        <td class="w-1/12 bg-slate-50 text-xs lg:text-sm">{{ $loop->iteration }}</td>
                                        <td class="w-3/12 bg-slate-50 text-xs lg:text-sm whitespace-pre-line">{{ $c->family_name }}</td>
                                        <td class="w-3/12 bg-slate-50 text-xs lg:text-sm whitespace-pre-line">{{ $c->phone_number }}</td>
                                        <td class="w-5/12 bg-slate-50 text-xs lg:text-sm">
                                            <label class="btn btn-xs text-xs lg:btn-sm lg:text-sm btn-info rounded-full tooltip inline-flex modal-button" for="edit-contact-{{ $c->id }}" data-tip="edit"><i class='bx bxs-edit text-sm text-white'></i></label>
                                            <form action="/dashboard/contact/{{ $c->id }}" method="POST" class="inline-flex">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-xs text-xs lg:btn-sm lg:text-sm btn-error rounded-full tooltip inline-flex" type="submit" data-tip="delete" onclick="return confirm('Are you sure?')"><i class='bx bx-trash text-sm text-white'></i></button>
                                            </form>
                                            {{-- Modal for Edit Contact --}}
                                            <input type="checkbox" id="edit-contact-{{ $c->id }}" class="modal-toggle" />
                                            <div class="modal modal-bottom sm:modal-middle">
                                                <div class="modal-box">
                                                    <label for="edit-contact-{{ $c->id }}" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
                                                    <h2 class="font-bold text-lg">Ubah Kontak : {{ $c->family_name }}</h2>
                                                    <p class="py-4">Pastikan kontak dapat dihubungi setiap saat!</p>
                                                    <form action="/dashboard/contact/{{ $c->id }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="form-control">
                                                            <label class="label">
                                                                <span class="label-text">Nama</span>
                                                            </label>
                                                            <input type="text" placeholder="Nama Kontak" id="family_name" name="family_name" value="{{ $c->family_name }}" class="input input-bordered" autofocus required/>
                                                        </div>
                                                        <div class="form-control">
                                                            <label class="label">
                                                                <span class="label-text">Nomor Telepon/HP/Whatsapp yang aktif</span>
                                                            </label>
                                                            <input type="text" placeholder="Nomor Kontak" id="phone_number" name="phone_number" value="{{ $c->phone_number }}" class="input input-bordered" required/>
                                                        </div>
                                                        <div class="modal-action">
                                                            <button for="edit-contact-{{ $c->id }}" class="btn btn-primary text-white">Ubah</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>                                
                                        </td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr class="hover">
                                        <td colspan="4" class="bg-slate-50 text-xs lg:text-sm">- Data Tidak Ditemukan -</td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                            <table class="table table-compact w-full">
                                <thead>
                                    <tr>
                                        <th colspan="3" class="text-xs lg:text-sm">Foto ODD <span class="normal-case text-xs lg:text-sm text-slate-500">(Maks. 5 Foto)</span></th>
                                        @if($photos->count() < 5)
                                        <th colspan="1" class="flex justify-end"><label class="btn btn-xs lg:btn-sm text-xs lg:text-sm bg-primary border-0 modal-button" for="odd-modal">Tambah</label></th>
                                        @else
                                        <th colspan="1" class="flex justify-end"><label class="btn btn-xs lg:btn-sm text-xs lg:text-sm bg-primary border-0" disabled>Tambah</label></th>
                                        @endif
                                    </tr>
                                </thead>
                            </table>
                            <div class="flex flex-wrap w-full justify-start">
                                @if($photos->count())
                                @foreach($photos as $p)
                                <div class="avatar indicator m-2">
                                    <form action="/photos/{{ $p->id }}/delete" method="POST" class="mt-2 mr-2">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="indicator-item badge badge-error" onclick="return confirm('Apa Anda Yakin?')">hapus</button>
                                    </form>
                                    <div class="w-24 mask mask-squircle">
                                        <img src="{{ asset('storage/'. $p->image) }}" alt="Foto ODD"/>
                                    </div>
                                </div>
                                @endforeach
                                @else
                                    <p class="pl-2 bg-slate-50 text-xs lg:text-sm">- Data Tidak Ditemukan -</p>
                                @endif
                            </div>
                        </div>
                        <div class="flex flex-col w-full gap-2 lg:w-1/4 lg:px-3">
                            <div class="flex justify-center">
                                <figure class="p-3">
                                    @if(!empty($account[0]->image) && !($account[0]->image == 'default.webp'))
                                    <img src="{{ asset('storage/' . $account[0]->image) }}" class="rounded-box" alt="{{ auth()->user()->name }}" />
                                    @else
                                    <img src="/img/default.webp" class="rounded-box" alt="Current profile photo">
                                    @endif
                                </figure>
                            </div>
                            <div class="flex justify-center items-center">
                                <label class="btn btn-xs text-xs lg:btn-sm lg:text-sm bg-primary text-white border-0 modal-button mb-5" for="avatar-modal">Ubah Foto</label>
                            </div>
                        </div>
                    </div>
                </div>
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
                <label class="label">
                    <span class="label-text">Nama</span>
                </label>
                <input type="text" placeholder="Nama Kontak" id="family_name" name="family_name" class="input input-bordered" autofocus required/>
            </div>
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Nomor Telepon/HP/Whatsapp yang aktif</span>
                </label>
                <input type="text" placeholder="Nomor Kontak" id="phone_number" name="phone_number" class="input input-bordered" required/>
            </div>
            <div class="modal-action">
                <button for="contact-modal" class="btn btn-primary text-white">Tambah</button>
            </div>
        </form>
    </div>
</div>

<input type="checkbox" id="avatar-modal" class="modal-toggle" />
<div class="modal modal-bottom sm:modal-middle">
    <div class="modal-box">
        <label for="avatar-modal" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
        <h2 class="font-bold text-lg">Ubah Foto Penanggung Jawab</h2>
        <p class="py-4">Pastikan foto/gambar terlihat jelas dan tidak melebihi batan ukuran 2 MB.</p>
        <div class="flex flex-col justify-between gap-3">
            {{-- <div class="flex w-1/2">
                <figure class="p-3">
                    @if(!empty($account[0]->image) && !($account[0]->image == 'default.webp'))
                    <img src="{{ asset('storage/' . $account[0]->image) }}" id="img-preview" class="img-preview rounded-box" alt="{{ auth()->user()->name }}" />
                    @else
                    <img src="/img/default.webp" id="img-preview" class="img-preview rounded-box" alt="Current profile photo">
                    @endif
                </figure>
            </div> --}}
            <div class="flex">
                <div id="avatar_upload" class="avatar_upload rounded-box"></div>
            </div>
            <div class="flex justify-center pt-3">
                <span class="sr-only">Pilih Foto</span>
                <input type="hidden" name="oldImage" value="{{ $account[0]->image }}">
                <input type="file" id="avatar_input" name="avatar_input" class="avatar_input block w-full text-sm text-slate-500 file:rounded-xl file:text-sm file:py-2 file:px-4 file:border-0 file:bg-slate-300 hover:file:bg-slate-400"/>
                @error('avatar_input')
                <label class="label">
                    <span class="label-text-alt text-red-600">{{ $message }}</span>
                </label>
                @enderror
            </div>
            <div class="modal-action">
                <button class="btn btn-primary crop_avatar text-white">Crop dan Unggah</button>
            </div>
        </div>
    </div>
</div>

<input type="checkbox" id="odd-modal" class="modal-toggle" />
<div class="modal modal-bottom sm:modal-middle">
    <div class="modal-box">
        <label for="odd-modal" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
        <h2 class="font-bold text-lg">Ubah Foto Orang Dengan Demensia</h2>
        <p class="py-4">Pastikan foto/gambar terlihat jelas dan tidak melebihi batas ukuran 2 MB.</p>
        <div class="flex flex-col justify-between gap-2">
            <div class="flex">
                <div id="odd_upload" class="odd_upload rounded-box"></div>
            </div>
            <div class="flex justify-center pt-3">
                <span class="sr-only">Pilih Foto</span>
                <input type="file" id="odd_input" name="odd_input" class="odd_input block w-full text-sm text-slate-500 file:rounded-xl file:text-sm file:py-2 file:px-4 file:border-0 file:bg-slate-300 hover:file:bg-slate-400"/>
                @error('odd_input')
                <label class="label">
                    <span class="label-text-alt text-red-600">{{ $message }}</span>
                </label>
                @enderror
            </div>
        </div>
        <div class="modal-action">
            <button class="btn btn-primary crop_odd text-white">Unggah</button>
        </div>
    </div>
</div>

{{-- <input type="checkbox" id="photos-modal" class="modal-toggle" />
<div class="modal modal-bottom sm:modal-middle">
    <div class="modal-box">
        <label for="photos-modal" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
        <h2 class="font-bold text-lg">Ubah Foto Orang Dengan Demensia</h2>
        <p class="py-4">Pastikan foto/gambar terlihat jelas dan tidak melebihi batas ukuran 2 MB.</p>
        <form action="/addphotos" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-row justify-between gap-2">
                <div class="flex w-1/2">
                    <figure class="p-3">
                        <img src="/img/default.png" id="photos-preview" class="photos-preview rounded-box" alt="Current photo">
                    </figure>
                </div>
                <div class="flex justify-center pt-3">
                    <span class="sr-only">Choose photo</span>
                    <input type="file" id="photos" name="photos" class="photos block w-full text-sm text-slate-500 file:rounded-xl file:text-sm file:py-2 file:px-4 file:border-0 file:bg-slate-300 hover:file:bg-slate-400" onchange="previewPhotos()"/>
                    @error('photos')
                    <label class="label">
                        <span class="label-text-alt text-red-600">{{ $message }}</span>
                    </label>
                    @enderror
                </div>
            </div>
            <div class="modal-action">
                <button for="photos-modal" class="btn btn-primary text-white">Unggah</button>
            </div>
        </form>
    </div>
</div> --}}

@endsection