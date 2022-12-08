@extends('layout.main')

@section('section')

<section id="login-page" class="py-8 bg-slate-100">
    <div class="container py-16 px-4 mx-auto">
        <div class="w-full">
            <div class="max-w-xl mx-auto text-center">
                <h4 class="font-semibold uppercase text-primary text-sm lg:text-lg">Pendaftaran</h4>
                <h2 class="font-bold text-dark text-2xl mb-3 lg:text-3xl">Daftar Sekarang!</h2>
                <p class="font-medium text-md text-slate-800 md:text-lg mb-4">Masukkan data sebenar-benarnya, email dan nomor aktif (disarankan nomor whatsapp aktif) agar mudah dan cepat dalam proses verifikasi.</p>
            </div>
        </div>
        <div class="flex justify-center">
            <div class="card flex w-full p-6 shadow-lg bg-slate-50 lg:w-2/3">
                    <form action="/register" method="POST">
                        @csrf
                        <h2 class="font-medium text-lg text-slate-800 text-center mb-3">Penanggung Jawab</h2>
                        <div class="flex flex-col md:flex-row">
                            <div class="form-control w-full mb-2 lg:w-1/2 lg:mr-2">
                                <label class="label">
                                    <span class="label-text">Nama Lengkap</span>
                                </label>
                                <input type="text" placeholder="Nama Lengkap" id="name" name="name" value="{{ old('name') }}" class="input input-bordered @error('name') input-error @enderror" required/>
                                @error('name')
                                <label class="label">
                                    <span class="label-text-alt text-red-600">{{ $message }}</span>
                                </label>
                                @enderror
                            </div>
                            <div class="form-control w-full mb-2 lg:w-1/2">
                                <label class="label">
                                    <span class="label-text">Jenis Kelamin</span>
                                </label>
                                <select id="gender" name="gender" class="select select-bordered @error('gender') select-error @enderror" required>
                                    <option disabled selected>Jenis Kelamin</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                  </select>
                                @error('gender')
                                <label class="label">
                                    <span class="label-text-alt text-red-600">{{ $message }}</span>
                                </label>
                                @enderror
                            </div>
                        </div>
                        <div class="flex flex-col md:flex-row">
                            <div class="form-control mb-2 w-full lg:w-1/2 mr-2">
                                <label class="label">
                                    <span class="label-text">Email</span>
                                </label>
                                <input type="text" placeholder="Email Aktif" id="email" name="email" class="input input-bordered @error('email') input-error @enderror" required/>
                                @error('email')
                                <label class="label">
                                    <span class="label-text-alt text-red-600">{{ $message }}</span>
                                </label>
                                @enderror
                            </div>
                            <div class="form-control w-full mb-2 lg:w-1/2">
                                <label class="label">
                                    <span class="label-text">Nomor HP/Whatsapp</span>
                                </label>
                                <label class="input-group">
                                    <span>+62</span>
                                    <input type="text" placeholder="contoh: 82123456789" id="phone" name="phone" value="{{ old('phone') }}" class="input input-bordered @error('phone') input-error @enderror" required/>
                                </label>
                                @error('phone')
                                <label class="label">
                                    <span class="label-text-alt text-red-600">{{ $message }}</span>
                                </label>
                                @enderror
                            </div>
                        </div>
                        <div class="form-control mb-2">
                            <label class="label">
                                <span class="label-text">Alamat Domisil</span>
                            </label>
                            <textarea type="text" placeholder="Gunakan alamat tempat Orang Dalam Demensia tinggal" id="address" name="address" class="textarea textarea-bordered @error('address') textarea-error @enderror" required>{{ old('address') }}</textarea>
                            @error('address')
                            <label class="label">
                                <span class="label-text-alt text-red-600">{{ $message }}</span>
                            </label>
                            @enderror
                        </div>
                        <div class="flex flex-col md:flex-row">
                            <div class="form-control w-full mb-2 lg:w-1/2">
                                <label class="label">
                                    <span class="label-text">Password</span>
                                </label>
                                <input type="password" placeholder="Password" id="password" name="password" class="input input-bordered mr-0 lg:mr-2 @error('password') input-error @enderror" />
                                @error('password')
                                <label class="label">
                                    <span class="label-text-alt text-red-600">{{ $message }}</span>
                                </label>
                                @enderror
                            </div>
                            <div class="form-control w-full mb-2 lg:w-1/2">
                                <label class="label">
                                    <span class="label-text">Ulangi Password</span>
                                </label>
                                <input type="password" placeholder="Ulangi Password" id="password2" name="password2" class="input input-bordered pl-2" />
                                <i class='bx bx-lock-alt text-2xl self-end -mt-8 mr-2'  id="togglePassword2" style="cursor: pointer;"></i>
                            </div>
                        </div>
                        <h2 class="font-medium text-lg text-slate-800 text-center mt-8 mb-3">Orang Dengan Demensia</h2>
                        <div class="flex flex-col md:flex-row">
                            <div class="form-control w-full mb-2 lg:w-1/2 lg:mr-2">
                                <label class="label">
                                    <span class="label-text">Nama Lengkap</span>
                                </label>
                                <input type="text" placeholder="Nama Lengkap Orang Dengan Demensia" id="odd_name" name="odd_name" value="{{ old('odd_name') }}" class="input input-bordered @error('odd_name') input-error @enderror" required/>
                                @error('odd_name')
                                <label class="label">
                                    <span class="label-text-alt text-red-600">{{ $message }}</span>
                                </label>
                                @enderror
                            </div>
                            <div class="form-control w-full mb-2 lg:w-1/2">
                                <label class="label">
                                    <span class="label-text">Usia</span>
                                </label>
                                <input type="text" placeholder="Usia (dalam angka, contoh:50)" id="odd_age" name="odd_age" value="{{ old('odd_age') }}" class="input input-bordered @error('odd_age') input-error @enderror" required/>
                                @error('odd_age')
                                <label class="label">
                                    <span class="label-text-alt text-red-600">{{ $message }}</span>
                                </label>
                                @enderror
                            </div>
                        </div>
                        <div class="flex flex-col md:flex-row">
                            <div class="form-control w-full mb-2 lg:w-1/2 lg:mr-2">
                                <label class="label">
                                    <span class="label-text">Jenis Kelamin</span>
                                </label>
                                <select id="odd_gender" name="odd_gender" class="select select-bordered @error('odd_gender') select-error @enderror" required>
                                    <option disabled selected>Jenis Kelamin</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                  </select>
                                @error('odd_gender')
                                <label class="label">
                                    <span class="label-text-alt text-red-600">{{ $message }}</span>
                                </label>
                                @enderror
                            </div>
                            <div class="form-control w-full mb-2 lg:w-1/2">
                                <label class="label">
                                    <span class="label-text">Tahap Alzheimer/Demensia</span>
                                </label>
                                <select id="odd_stage" name="odd_stage" class="select select-bordered @error('odd_stage') select-error @enderror" required>
                                    <option disabled selected>Tahap Alzheimer/Demensia</option>
                                    <option value="Tidak Tahu">0 - Tidak Tahu</option>
                                    <option value="Normal">1 - Normal</option>
                                    <option value="Lupa Sewajarnya">2 - Lupa Sewajarnya</option>
                                    <option value="Gangguan Kognitif Ringan">3 - Gangguan Kognitif Ringan</option>
                                    <option value="Ringan">4 - Ringan</option>
                                    <option value="Sedang">5 - Sedang</option>
                                    <option value="Sedang Berat">6 - Sedang Berat</option>
                                    <option value="Berat Sekali">7 - Berat Sekali</option>
                                    <option value="Lainnya">8 - Lainnya</option>
                                </select>
                                @error('odd_stage')
                                <label class="label">
                                    <span class="label-text-alt text-red-600">{{ $message }}</span>
                                </label>
                                @enderror
                            </div>
                        </div>
                        <div class="form-control mb-2">
                            <label class="label">
                                <span class="label-text">Deskripsi Fisik</span>
                            </label>
                            <textarea type="text" placeholder="Deskripsi Fisik (tinggi, warna kulit, tanda lahir, dan lain sebagainya)" id="odd_description" name="odd_description" class="textarea textarea-bordered @error('odd_description') textarea-error @enderror" required>{{ old('odd_description') }}</textarea>
                            @error('odd_description')
                            <label class="label">
                                <span class="label-text-alt text-red-600">{{ $message }}</span>
                            </label>
                            @enderror
                        </div>
                        <div class="form-control items-center mt-5">
                            <button class="btn btn-sm text-sm lg:btn-md lg:text-md btn-primary w-1/3 text-white">Daftar</button>
                        </div>
                    </form>
                </div>
            </div>
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