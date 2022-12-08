@extends('layout.dashboard')

@section('section')

<section id="dashboard" class="py-16 min-h-screen bg-gradient-to-r from-slate-500 to-slate-800">
    <div class="container p-4 mx-auto">
        <div class="flex flex-col-reverse w-full lg:flex-row">
            
            @include('partial.dashboard-sidebar')

            <div class="flex-grow card bg-slate-50 shadow-lg rounded-box m-2 lg:w-3/4">
                <div class="card-body">
                    <h2 class="card-title justify-between"><span>{{ $title }}</span></h2>
                    <div class="divider my-0"></div>
                    <div class="flex flex-col-reverse lg:flex-row gap-2">
                        <div class="flex flex-col w-full gap-3 lg:w-3/4 lg:mb-0">
                            @if(!empty($userData->information))
                            <table class="table table-compact w-full">
                                <thead>
                                    <tr>
                                        <th colspan="3">Informasi QR-Code</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="hover">
                                        <td colspan="3" class="bg-slate-50">
                                            <img src="{{ asset($userData->information->qr_image) }}" alt="qrcode" height="72" width="72">
                                        </td>
                                    </tr>
                                    <tr class="hover">
                                        <td class="bg-slate-50">Url</td>
                                        <td class="bg-slate-50">:</td>
                                        <td class="bg-slate-50">{{ $userData->information->qr_url }}</td>
                                    </tr>
                                    <tr class="hover">
                                        <td class="bg-slate-50">Page</td>
                                        <td class="bg-slate-50">:</td>
                                        <td class="bg-slate-50">{{ $userData->information->qr_page }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            @endif
                            <table class="table table-compact w-full">
                                <thead>
                                    <tr>
                                        <th colspan="3">Informasi Penanggung Jawab</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="hover">
                                        <td class="w-2/12 bg-slate-50">Nama</td>
                                        <td class="w-1/12 bg-slate-50">:</td>
                                        <td class="w-9/12 bg-slate-50">{{ $userData->name }}</td>
                                    </tr>
                                    <tr class="hover">
                                        <td class="w-2/12 bg-slate-50">Jenis Kelamin</td>
                                        <td class="w-1/12 bg-slate-50">:</td>
                                        <td class="w-9/12 bg-slate-50 whitespace-pre-line">{{ $userData->gender }}</td>
                                    </tr>
                                    <tr class="hover">
                                        <td class="w-2/12 bg-slate-50">Alamat</td>
                                        <td class="w-1/12 bg-slate-50">:</td>
                                        <td class="w-9/12 bg-slate-50 whitespace-pre-line">{{ $userData->address }}</td>
                                    </tr>
                                    <tr class="hover">
                                        <td class="w-2/12 bg-slate-50">Nomor HP/Telepon</td>
                                        <td class="w-1/12 bg-slate-50">:</td>
                                        <td class="w-9/12 bg-slate-50 whitespace-pre-line">{{ $userData->phone }}</td>
                                    </tr>
                                    <tr class="hover">
                                        <td class="w-2/12 bg-slate-50">Email</td>
                                        <td class="w-1/12 bg-slate-50">:</td>
                                        <td class="w-9/12 bg-slate-50 whitespace-pre-line">{{ $userData->email }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-compact w-full">
                                <thead>
                                    <tr>
                                        <th colspan="3">Informasi Orang Dengan Demensia (ODD)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="hover">
                                        <td class="w-2/12 bg-slate-50">Nama</td>
                                        <td class="w-1/12 bg-slate-50">:</td>
                                        <td class="w-9/12 bg-slate-50">{{ $userData->odd_name }}</td>
                                    </tr>
                                    <tr class="hover">
                                        <td class="w-2/12 bg-slate-50">Jenis Kelamin</td>
                                        <td class="w-1/12 bg-slate-50">:</td>
                                        <td class="w-9/12 bg-slate-50 whitespace-pre-line">{{ $userData->odd_gender }}</td>
                                    </tr>
                                    <tr class="hover">
                                        <td class="w-2/12 bg-slate-50">Umur</td>
                                        <td class="w-1/12 bg-slate-50">:</td>
                                        <td class="w-9/12 bg-slate-50 whitespace-pre-line">{{ $userData->odd_age }}</td>
                                    </tr>
                                    <tr class="hover">
                                        <td class="w-2/12 bg-slate-50">Tahap Alzheimer</td>
                                        <td class="w-1/12 bg-slate-50">:</td>
                                        <td class="w-9/12 bg-slate-50 whitespace-pre-line">{{ $userData->odd_stage }}</td>
                                    </tr>
                                    <tr class="hover">
                                        <td class="w-2/12 bg-slate-50">Deskripsi Fisik</td>
                                        <td class="w-1/12 bg-slate-50">:</td>
                                        <td class="w-9/12 bg-slate-50 whitespace-pre-line">{{ $userData->odd_description }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-compact w-full">
                                <thead>
                                    <tr>
                                        <th colspan="3">Kontak Keluarga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($userData->contact->count())
                                    @foreach($userData->contact as $c)
                                    <tr class="hover">
                                        <td class="w-1/12 bg-slate-50">{{ $loop->iteration }}</td>
                                        <td class="w-3/12 bg-slate-50 whitespace-pre-line">{{ $c->family_name }}</td>
                                        <td class="w-3/12 bg-slate-50 whitespace-pre-line">{{ $c->phone_number }}</td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr class="hover">
                                        <td colspan="4" class="bg-slate-50">- Data Tidak Ditemukan -</td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                            <table class="table table-compact w-full">
                                <thead>
                                    <tr>
                                        <th colspan="3">Foto ODD</th>
                                    </tr>
                                </thead>
                            </table>
                            <div class="flex flex-wrap w-full justify-start">
                                @if($userData->images->count())
                                @foreach($userData->images as $p)
                                <div class="p-3 overflow-hidden">
                                    <img class="mask mask-squircle w-24 h-24" src="{{ asset('storage/'. $p->image) }}" alt="Foto ODD"/>
                                </div>
                                @endforeach
                                @else
                                    <p class="text-sm pl-2">- Data Tidak Ditemukan -</p>
                                @endif
                            </div>
                        </div>
                        <div class="flex flex-col w-full gap-2 lg:w-1/4 lg:px-3">
                            <div class="flex justify-center">
                                <figure class="p-3">
                                    @if(!empty($userData->image) && !($userData->image == 'default.webp'))
                                    <img src="{{ asset('storage/' . $userData->image) }}" class="rounded-box" alt="{{ auth()->user()->name }}" />
                                    @else
                                    <img src="/img/default.webp" class="rounded-box" alt="Current profile photo">
                                    @endif
                                </figure>
                            </div>
                        </div>
                    </div>
                    <div class="card-actions justify-start mt-3">
                        <a href="/information/{{ $userData->id }}/edit" class="btn btn-sm btn-primary text-white">Ubah Informasi Pengguna</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection