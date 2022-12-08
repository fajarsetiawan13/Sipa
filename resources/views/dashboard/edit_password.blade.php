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
    <div class="container p-4 mx-auto">
        <div class="flex flex-col-reverse w-full lg:flex-row">
            
            @include('partial.dashboard-sidebar')

            <div class="flex-grow card bg-slate-50 shadow-lg rounded-box m-2 lg:w-3/4">
                <div class="card-body">
                    <h2 class="card-title justify-between"><span>{{ $title }}</span></h2>
                    <div class="divider my-0"></div>
                    <form action="/password" method="POST">
                        @csrf
                        <div class="flex flex-col gap-2 lg:w-1/2">
                            <div class="block w-full">
                                <div class="form-control">
                                    <label class="label">
                                        <span class="label-text">Password Lama</span>
                                    </label>
                                    <input type="password" id="password" name="password" placeholder="password lama" class="input input-bordered @error('password') input-error @enderror" required/>
                                    <i class="bx bx-lock-alt text-2xl self-end -mt-8 mr-2"  id="togglePassword" style="cursor: pointer;"></i>
                                    @error('password')
                                    <label class="label">
                                        <span class="label-text-alt text-red-600">{{ $message }}</span>
                                    </label>
                                    @enderror
                                </div>
                            </div>
                            <div class="block w-full">
                                <div class="form-control">
                                    <label class="label">
                                        <span class="label-text">Password Baru</span>
                                    </label>
                                    <input type="password" id="password_baru" name="password_baru" placeholder="password baru" class="input input-bordered" required/>
                                    <i class='bx bx-lock-alt text-2xl self-end -mt-8 mr-2'  id="togglePasswordBaru" style="cursor: pointer;"></i>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-end w-full pt-2 lg:w-1/2">
                            <button type="submit" class="btn btn-sm btn-primary text-white mt-3">Ubah Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');

    togglePassword.addEventListener('click', function (){
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        this.classList.toggle('bx-lock-open-alt');
    });

    const togglePasswordBaru = document.querySelector('#togglePasswordBaru');
    const passwordBaru = document.querySelector('#password_baru');

    togglePasswordBaru.addEventListener('click', function (){
        const type = passwordBaru.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordBaru.setAttribute('type', type);
        this.classList.toggle('bx-lock-open-alt');
    });
</script>

@endsection