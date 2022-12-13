{{-- FOOTER START --}}
<footer class="footer p-10 bg-slate-100 text-base-content border-t-2 border-slate-300">
    <div>
        <span class="footer-title">Layanan</span> 
        <a href="/" class="link link-hover">Beranda</a> 
        <a href="/article" class="link link-hover">Artikel</a> 
        <a href="/register" class="link link-hover">Pendaftaran Akun Baru</a> 
    </div> 
    <div>
        <span class="footer-title">Tentang</span> 
        <a href="/about" class="link link-hover">Sistem Informasi Alzheimer</a> 
    </div>      
</footer>
<footer class="footer footer-center p-4 bg-slate-800 text-base-content">
    <p class="text-white">Hak Cipta © 2022 - Sipa App</p>
</footer>
{{-- FOOTER END --}}

<input type="checkbox" id="login-modal" class="modal-toggle" />
<div class="modal modal-bottom sm:modal-middle">
    <div class="modal-box">
        <label for="login-modal" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
        <h2 class="font-bold text-lg">Login Akun Anda!</h2>
        <p class="py-4">Belum punya akun? <a href="/register" class="text-blue-500 link link-hover">daftar disini!</a></p>
        <form action="/login" method="POST">
            @csrf
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Email</span>
                </label>
                <input type="text" placeholder="email" id="email" name="email" class="input input-bordered @error('email') input-error @enderror" autofocus required/>
                @error('email')
                <label class="label">
                    <span class="label-text-alt text-red-600">{{ $message }}</span>
                </label>
                @enderror
            </div>
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Password</span>
                </label>
                <input type="password" placeholder="password" id="password" name="password" class="input input-bordered" required/>
                <label class="label">
                    <a href="/forget-password" class="label-text-alt link link-hover">Lupa password? klik disini</a>
                </label>
            </div>
            <div class="modal-action">
                <button for="login-modal" class="btn btn-sm text-sm lg:btn-md lg:text-md text-white btn-primary">Masuk</button>
            </div>
        </form>
    </div>
</div>