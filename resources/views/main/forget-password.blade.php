@extends('layout.main')

@section('section')

<section id="login-page" class="py-8 bg-slate-800">
    <div class="container py-16 px-4 mx-auto">
        <div class="max-w-xl mx-auto text-center">                
            <h4 class="font-semibold uppercase text-primary text-sm lg:text-lg">Password</h4>
            <h2 class="font-bold text-slate-50 text-2xl mb-3 lg:text-3xl">Lupa Password!</h2>
            <p class="font-medium text-md text-slate-50  md:text-lg mb-4">Masukkan nama, email dan nomor hp/telepon/whatsapp yang terdaftar!</p>
        </div>
        <div class="card p-6 shadow-lg bg-slate-100 lg:w-1/3 mx-auto">
            @if(session()->has('success'))
            <h2 class="font-medium text-lg text-dark text-center mb-3">{{ session('success') }}</h2>
            <p class="font-normal text-center text-md text-dark mb-4">Silahkan tunggu 1x24 jam, Anda akan menerima notifikasi melalui email atau nomor yang terdaftar.</p>
            @else
            <form action="/forget-password" method="POST">
                @csrf
                <div class="form-control w-full mb-2">
                    <label class="label label-text">Nama Penanggung Jawab</label>
                    <input type="text" placeholder="Nama Lengkap" id="name" name="name" class="input input-bordered" required/>
                    @error('name')
                    <label class="label label-text-alt text-red-600">{{ $message }}</label>
                    @enderror
                </div>
                <div class="form-control w-full mb-2">
                    <label class="label label-text">Email atau Nomor Terdaftar</label>
                    <input type="text" placeholder="Emailkamu@mail.com atau 082123456789" id="email" name="email" class="input input-bordered"/>
                    @error('email')
                    <label class="label label-text-alt text-red-600">{{ $message }}</label>
                    @enderror
                </div>
                <div class="form-control items-center mt-5">
                    <button class="btn btn-md text-md btn-primary w-1/3 text-white">Kirim</button>
                </div>
            </form>
            @endif
        </div>
    </div>
</section>

<script>
    const togglePassword2 = document.querySelector('#togglePassword2');
    const password2 = document.querySelector('#password2');

    togglePassword2.addEventListener('click', function (){
        const type = password2.getAttribute('type') === 'password' ? 'text' : 'password';
        password2.setAttribute('type', type);
        this.classList.toggle('bx-lock-open-alt');
    });
</script>
@endsection