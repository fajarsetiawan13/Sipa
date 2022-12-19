@extends('layout.dashboard')

@section('section')

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

<section id="dashboard" class="py-16 min-h-screen bg-gradient-to-r from-slate-500 to-slate-800">
    <div class="container p-4 mx-auto flex flex-col-reverse w-full lg:flex-row">
        @include('partial.dashboard-sidebar')
        <div class="flex-grow card bg-slate-50 shadow-lg rounded-box m-2 lg:w-3/4">
            <div class="card-body">
                <h2 class="card-title justify-between">{{ $title }}</h2>
                <div class="divider my-0"></div>
                <form action="/password" method="POST">
                    @csrf
                    <div class="flex flex-col gap-2 lg:w-1/2">
                        <div class="form-control">
                            <label class="label label-text">Password Lama</label>
                            <input type="password" id="password" name="password" placeholder="password lama" class="input input-bordered @error('password') input-error @enderror" required/>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="absolute self-end mr-2" id="togglePasswordLock" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M20 12c0-1.103-.897-2-2-2h-1V7c0-2.757-2.243-5-5-5S7 4.243 7 7v3H6c-1.103 0-2 .897-2 2v8c0 1.103.897 2 2 2h12c1.103 0 2-.897 2-2v-8zM9 7c0-1.654 1.346-3 3-3s3 1.346 3 3v3H9V7z"></path></svg>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="absolute self-end mr-2 invisible" id="togglePasswordUnlock" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M17 8V7c0-2.757-2.243-5-5-5S7 4.243 7 7v3H6c-1.103 0-2 .897-2 2v8c0 1.103.897 2 2 2h12c1.103 0 2-.897 2-2v-8c0-1.103-.897-2-2-2H9V7c0-1.654 1.346-3 3-3s3 1.346 3 3v1h2z"></path></svg>
                            @error('password')
                            <label class="label">
                                <span class="label-text-alt text-red-600">{{ $message }}</span>
                            </label>
                            @enderror
                        </div>
                        <div class="form-control">
                            <label class="label label-text">Password Baru</label>
                            <input type="password" id="password_baru" name="password_baru" placeholder="password baru" class="input input-bordered" required/>
                         </div>
                    </div>
                    <div class="flex justify-end w-full pt-2 lg:w-1/2">
                        <button type="submit" class="btn btn-sm btn-primary text-white mt-3">Ubah Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
    const togglePasswordLock = document.querySelector('#togglePasswordLock');
    const togglePasswordUnlock = document.querySelector('#togglePasswordUnlock');
    const password = document.querySelector('#password');
    const passwordBaru = document.querySelector('#password_baru');

    togglePasswordLock.addEventListener('click', function (){
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        passwordBaru.setAttribute('type', type);
        togglePasswordLock.classList.add('invisible');
        togglePasswordUnlock.classList.remove('invisible');
    });

    togglePasswordUnlock.addEventListener('click', function (){
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        passwordBaru.setAttribute('type', type);
        togglePasswordUnlock.classList.add('invisible');
        togglePasswordLock.classList.remove('invisible');
    });

</script>

@endsection