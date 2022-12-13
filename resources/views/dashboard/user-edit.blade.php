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
                    <div class="flex flex-col w-full gap-3 lg:w-3/4 lg:mb-0">
                        <form action="/information/{{ $userData->id }}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <table class="table table-compact w-full">
                                <thead>
                                    <tr>
                                        <th colspan="3">Penanggung Jawab</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="hover">
                                        <td>Nama</td>
                                        <td>:</td>
                                        <td class="form-control table-cell"><input type="text" name="name" id="name" value="{{ $userData->name }}" class="input input-sm w-full input-bordered @error('name') input-error @enderror" required></td>
                                    </tr>
                                    <tr class="hover">
                                        <td>Jenis Kelamin</td>
                                        <td>:</td>
                                        <td class="form-control table-cell">
                                            <select id="gender" name="gender" class="select select-sm w-full select-bordered @error('gender') select-error @enderror" required>
                                                <option value="{{ $userData->gender }}">{{ $userData->gender }} (Sekarang)</option>
                                                <option value="Laki-laki">Laki-laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr class="hover">
                                        <td>Alamat</td>
                                        <td>:</td>
                                        <td class="form-control table-cell">
                                            <textarea type="text" placeholder="Gunakan alamat tempat Orang Dalam Demensia tinggal" id="address" name="address" class="textarea w-full textarea-bordered @error('address') textarea-error @enderror" required>{{ $userData->address }}</textarea>
                                        </td>
                                    </tr>
                                    <tr class="hover">
                                        <td>Nomor HP/Telepon</td>
                                        <td>:</td>
                                        <td class="form-control table-cell">
                                            <label class="input-group">
                                                <span>+62</span>
                                                <input type="text" name="phone" id="phone" value="{{ $userData->phone }}" class="input input-sm w-full input-bordered @error('phone') input-error @enderror" required>
                                            </label>
                                        </td>
                                    </tr>
                                    <tr class="hover">
                                        <td>Email</td>
                                        <td>:</td>
                                        <td class="form-control table-cell"><input type="text" name="email" id="email" value="{{ $userData->email }}" class="input input-sm w-full input-bordered @error('email') input-error @enderror" disabled></td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-compact w-full">
                                <thead>
                                    <tr>
                                        <th colspan="3">Orang Dengan Demensia (ODD)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="hover">
                                        <td>Nama</td>
                                        <td>:</td>
                                        <td class="form-control table-cell"><input type="text" name="odd_name" id="odd_name" value="{{ $userData->odd_name }}" class="input input-sm w-full input-bordered @error('odd_name') input-error @enderror" required></td>
                                    </tr>
                                    <tr class="hover">
                                        <td>Jenis Kelamin</td>
                                        <td>:</td>
                                        <td class="form-control table-cell">
                                            <select id="odd_gender" name="odd_gender" class="select select-sm w-full select-bordered @error('odd_gender') select-error @enderror" required>
                                                <option value="{{ $userData->odd_gender }}">{{ $userData->gender }} (Sekarang)</option>
                                                <option value="Laki-laki">Laki-laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr class="hover">
                                        <td>Usia</td>
                                        <td>:</td>
                                        <td class="form-control table-cell"><input type="text" name="odd_age" id="odd_age" value="{{ $userData->odd_age }}" class="input input-sm w-full input-bordered @error('odd_age') input-error @enderror" required></td>
                                    </tr>
                                    <tr class="hover">
                                        <td>Tahap Alzheimer</td>
                                        <td>:</td>
                                        <td class="form-control table-cell">
                                            <select id="odd_stage" name="odd_stage" class="select w-full select-bordered @error('odd_stage') select-error @enderror" required>
                                                <option value="{{ $userData->odd_stage }}">Tahap {{ $userData->gender }} (Sekarang)</option>
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
                                        </td>
                                    </tr>
                                    <tr class="hover">
                                        <td>Deskripsi Fisik</td>
                                        <td>:</td>
                                        <td class="form-control table-cell">
                                            <textarea type="text" placeholder="Deskripsi Fisik (tinggi, warna kulit, tanda lahir, dan lain sebagainya)" id="odd_description" name="odd_description" class="textarea w-full textarea-bordered @error('odd_description') textarea-error @enderror" required>{{ $userData->odd_description }}</textarea>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="card-actions justify-end mt-3">
                                <button type="submit" class="btn btn-sm btn-primary text-white">Simpan</button>
                            </div>
                        </form>
                    </div>
                    <div class="flex flex-col w-full gap-2 lg:w-1/4 lg:px-3">
                        <div class="flex justify-center">
                            <figure class="p-3">
                                @if(!empty($userData->image) && !($userData->image == 'default.webp'))
                                <img src="{{ asset('storage/' . $userData->image) }}" class="rounded-box" width="160" height="160" alt="{{ auth()->user()->name }}" />
                                @else
                                <img src="/img/default.webp" class="rounded-box" width="160" height="160" alt="Current profile photo">
                                @endif
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection