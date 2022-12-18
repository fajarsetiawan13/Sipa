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
            <img src="{{ asset('/img/icon-check.png') }}" alt="icon-check-png">
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
            <img src="{{ asset('/img/icon-error.png') }}" alt="icon-error-png">
        </figure>
        <p class="mx-auto text-center">{{ session('error') }}</p>
        <div class="modal-action justify-center">
            <label for="error-modal" class="btn btn-primary btn-md text-md text-white">Oke!</label>
        </div>
    </div>
</div>
@endif

<section id="dashboard" class="py-16 min-h-screen bg-gradient-to-r from-slate-500 to-slate-800 z-0">
    <div class="container p-4 mx-auto flex flex-col-reverse w-full lg:flex-row">
        @include('partial.dashboard-sidebar')
        <div class="flex-grow card bg-slate-50 shadow-lg rounded-box m-2 lg:w-3/4">
            <div class="card-body overflow-x-scroll">
                <h2 class="card-title justify-between">{{ $title }}</h2>
                <div class="divider my-0"></div>
                <table class="table w-full display p-2" id="usersTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>QR-Code</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $u)
                        <tr class="hover">
                            <td>{{ $loop->iteration }}</td>
                            <td class="whitespace-pre-line">{{ $u->name }}</td>
                            <td class="whitespace-pre-line">{{ $u->email }}</td>
                            <td>
                                @if(!empty($u->information->qr_image))
                                <img src="{{ asset($u->information->qr_image) }}" alt="qrcode" height="32" width="32" class="max-w-[32px] max-h-[32px] object-cover">
                                @else
                                -
                                @endif
                            </td>
                            <td>
                                @if($u->is_active == 0) {{ 'tidak aktif' }} @else {{ 'aktif' }} @endif
                            </td>
                            <td>
                                <div class="dropdown dropdown-left">
                                    <label tabindex="0" class="btn btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgb(255, 255, 255);transform: ;msFilter:;"><path d="M4 6h16v2H4zm0 5h16v2H4zm0 5h16v2H4z"></path></svg></label>
                                    <ul tabindex="1" class="dropdown-content menu p-2 shadow bg-slate-50 rounded-box w-52">
                                        <li>
                                            @if($u->is_active == 0)
                                            <a href="/activate/{{ $u->id }}" onclick="return confirm('Apa Anda Yakin?')">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" width="24" height="24" style="fill: rgba(75, 75, 75, 1);transform: ;msFilter:;"><path d="m10 15.586-3.293-3.293-1.414 1.414L10 18.414l9.707-9.707-1.414-1.414z"></path></svg>
                                                Aktivasi
                                            </a>
                                            @else
                                            <a href="/deactivate/{{ $u->id }}" onclick="return confirm('Apa Anda Yakin?')">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" width="24" height="24" style="fill: rgba(75, 75, 75, 1);transform: ;msFilter:;"><path d="m16.192 6.344-4.243 4.242-4.242-4.242-1.414 1.414L10.535 12l-4.242 4.242 1.414 1.414 4.242-4.242 4.243 4.242 1.414-1.414L13.364 12l4.242-4.242z"></path></svg>
                                                Penonaktifan
                                            </a>
                                            @endif
                                        </li>
                                        <li>
                                            <a href="/information/{{ $u->id }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" width="24" height="24" style="fill: rgba(75, 75, 75, 1);transform: ;msFilter:;"><path d="M15 11h7v2h-7zm1 4h6v2h-6zm-2-8h8v2h-8zM4 19h10v-1c0-2.757-2.243-5-5-5H7c-2.757 0-5 2.243-5 5v1h2zm4-7c1.995 0 3.5-1.505 3.5-3.5S9.995 5 8 5 4.5 6.505 4.5 8.5 6.005 12 8 12z"></path></svg>
                                                Detail Pengguna
                                            </a>
                                        </li>
                                        @if($u->is_active == 1)
                                        <li>
                                            <a href="/generate/{{ $u->id }}" onclick="return confirm('Apa Anda Yakin?')">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" width="24" height="24" style="fill: rgba(75, 75, 75, 1);transform: ;msFilter:;"><path d="M3 11h8V3H3zm2-6h4v4H5zM3 21h8v-8H3zm2-6h4v4H5zm8-12v8h8V3zm6 6h-4V5h4zm-5.99 4h2v2h-2zm2 2h2v2h-2zm-2 2h2v2h-2zm4 0h2v2h-2zm2 2h2v2h-2zm-4 0h2v2h-2zm2-6h2v2h-2zm2 2h2v2h-2z"></path></svg>
                                                Buat QR-Code
                                            </a>
                                        </li>
                                        @endif
                                        <li>
                                            <label class="modal-button" for="role-{{ $u->id }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" width="24" height="24" style="fill: rgba(75, 75, 75, 1);transform: ;msFilter:;"><path d="M17.988 22a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h11.988zM9 5h6v2H9V5zm5.25 6.25A2.26 2.26 0 0 1 12 13.501c-1.235 0-2.25-1.015-2.25-2.251S10.765 9 12 9a2.259 2.259 0 0 1 2.25 2.25zM7.5 18.188c0-1.664 2.028-3.375 4.5-3.375s4.5 1.711 4.5 3.375v.563h-9v-.563z"></path></svg>
                                                Ubah Role
                                            </label>
                                        </li>
                                        <li>
                                            <form action="/information/{{ $u->id }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" onclick="return confirm('Apa Anda Yakin?')">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-flex mr-2" width="24" height="24" style="fill: rgba(75, 75, 75, 1);transform: ;msFilter:;"><path d="M5 20a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8h2V6h-4V4a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2v2H3v2h2zM9 4h6v2H9zM8 8h9v12H7V8z"></path><path d="M9 10h2v8H9zm4 0h2v8h-2z"></path></svg>
                                                    Hapus
                                                </button>
                                            </form>
                                        </li>
                                        <li>
                                            <a href="/password/{{ $u->id }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M7 17a5.007 5.007 0 0 0 4.898-4H14v2h2v-2h2v3h2v-3h1v-2h-9.102A5.007 5.007 0 0 0 7 7c-2.757 0-5 2.243-5 5s2.243 5 5 5zm0-8c1.654 0 3 1.346 3 3s-1.346 3-3 3-3-1.346-3-3 1.346-3 3-3z"></path></svg>
                                                Reset Kata Sandi
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        {{-- Modal for Edit Role --}}
                        <input type="checkbox" id="role-{{ $u->id }}" class="modal-toggle" />
                        <div class="modal modal-bottom sm:modal-middle">
                            <div class="modal-box">
                                <label for="role-{{ $u->id }}" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
                                <h2 class="font-bold text-lg">Ubah Role : {{ $u->name }}</h2>
                                <p class="py-4">Role Sekarang : {{ ($u->role == 1) ? 'Admin' : 'Pengguna' }}</p>
                                <form action="/user/role/{{ $u->id }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <select class="select select-bordered w-full max-w-xs" name="role" id="role">
                                        <option disabled selected>Pilih Role</option>
                                        <option value="1">Admin</option>
                                        <option value="2">Pengguna</option>
                                      </select>
                                    <div class="modal-action">
                                        <button for="role-{{ $u->id }}" class="btn btn-primary text-white">Ubah</button>
                                    </div>
                                </form>
                            </div>
                        </div> 
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

@endsection