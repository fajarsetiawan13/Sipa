@extends('layout.dashboard')

@section('section')

<section id="dashboard" class="py-16 min-h-screen bg-gradient-to-r from-slate-500 to-slate-800">
    <div class="container p-4 mx-auto flex flex-col-reverse w-full lg:flex-row">
        @include('partial.dashboard-sidebar')
        <div class="flex-grow card bg-slate-50 shadow-lg rounded-box m-2 lg:w-3/4">
            <div class="card-body">
                <h2 class="card-title justify-between">{{ $title }}</h2>
                <div class="divider my-0"></div>
                <div class="flex flex-col-reverse lg:flex-row gap-2">
                    <div class="flex flex-col gap-3 lg:w-3/4">
                        @if(!empty($userData->information))
                        <table class="table">
                            <thead>
                                <tr>
                                    <th colspan="3">QR-Code</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="hover">
                                    <td colspan="3">
                                        <img src="{{ asset($userData->information->qr_image) }}" alt="qrcode" height="50" width="50" class="max-w-[200px] hover:w-[200px]">
                                    </td>
                                </tr>
                                <tr class="hover">
                                    <td>Url</td>
                                    <td>:</td>
                                    <td class="whitespace-pre-line">{{ $userData->information->qr_url }}</td>
                                </tr>
                                <tr class="hover">
                                    <td>Page</td>
                                    <td>:</td>
                                    <td class="whitespace-pre-line">{{ $userData->information->qr_page }}</td>
                                </tr>
                            </tbody>
                        </table>
                        @endif
                        <table class="table">
                            <thead>
                                <tr>
                                    <th colspan="3">Penanggung Jawab</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="hover">
                                    <td>Nama</td>
                                    <td>:</td>
                                    <td>{{ $userData->name }}</td>
                                </tr>
                                <tr class="hover">
                                    <td>Jenis Kelamin</td>
                                    <td>:</td>
                                    <td class="whitespace-pre-line">{{ $userData->gender }}</td>
                                </tr>
                                <tr class="hover">
                                    <td>Alamat</td>
                                    <td>:</td>
                                    <td class="whitespace-pre-line">{{ $userData->address }}</td>
                                </tr>
                                <tr class="hover">
                                    <td>Nomor HP/Telepon</td>
                                    <td>:</td>
                                    <td class="whitespace-pre-line">{{ $userData->phone }}</td>
                                </tr>
                                <tr class="hover">
                                    <td>Email</td>
                                    <td>:</td>
                                    <td class="whitespace-pre-line">{{ $userData->email }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="table">
                            <thead class="">
                                <tr>
                                    <th colspan="3">Orang Dengan Demensia (ODD)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="hover">
                                    <td>Nama</td>
                                    <td>:</td>
                                    <td>{{ $userData->odd_name }}</td>
                                </tr>
                                <tr class="hover">
                                    <td>Jenis Kelamin</td>
                                    <td>:</td>
                                    <td class="whitespace-pre-line">{{ $userData->odd_gender }}</td>
                                </tr>
                                <tr class="hover">
                                    <td>Umur</td>
                                    <td>:</td>
                                    <td class="whitespace-pre-line">{{ $userData->odd_age }}</td>
                                </tr>
                                <tr class="hover">
                                    <td>Tahap Alzheimer</td>
                                    <td>:</td>
                                    <td class="whitespace-pre-line">{{ $userData->odd_stage }}</td>
                                </tr>
                                <tr class="hover">
                                    <td>Deskripsi Fisik</td>
                                    <td>:</td>
                                    <td class="whitespace-pre-line">{{ $userData->odd_description }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th colspan="3">Kontak Keluarga</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($userData->contact->count())
                                @foreach($userData->contact as $c)
                                <tr class="hover">
                                    <td>{{ $loop->iteration }}</td>
                                    <td class="whitespace-pre-line">{{ $c->family_name }}</td>
                                    <td class="whitespace-pre-line">{{ $c->phone_number }}</td>
                                </tr>
                                @endforeach
                                @else
                                <tr class="hover">
                                    <td colspan="4">- Data Tidak Ditemukan -</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th colspan="3">Foto ODD</th>
                                </tr>
                            </thead>
                        </table>
                        <div class="flex flex-wrap justify-start">
                            @if($userData->images->count())
                            @foreach($userData->images as $p)
                            <div class="p-3 overflow-hidden">
                                <img class="mask mask-squircle w-24 h-24" src="{{ asset('storage/'. $p->image) }}" alt="Foto ODD"/>
                            </div>
                            @endforeach
                            @else
                                <p class="pl-2 text-xs lg:text-sm">- Data Tidak Ditemukan -</p>
                            @endif
                        </div>
                    </div>
                    <div class="w-full lg:w-1/4">
                        <figure class="p-3">
                            @if(!empty($userData->image) && !($userData->image == 'default.webp'))
                            <img src="{{ asset('storage/' . $userData->image) }}" width="160" height="160" class="rounded-box max-w-[160px] max-h-[160px] object-cover" alt="{{ auth()->user()->name }}" />
                            @else
                            <img src="/img/default.webp" width="160" height="160" class="rounded-box max-w-[160px] max-h-[160px] object-cover" alt="Current profile photo">
                            @endif
                        </figure>
                    </div>
                </div>
                <div class="card-actions justify-start mt-3">
                    <a href="/information/{{ $userData->id }}/edit" class="btn btn-xs text-xs lg:btn-sm lg:text-sm btn-primary text-white">Ubah Informasi Pengguna</a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection