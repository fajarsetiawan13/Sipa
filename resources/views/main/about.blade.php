@extends('layout.main')

@section('section')

<section id="hero" style="margin-top: 64px;">
    <div class="hero min-h-screen" style="background-image: url({{ asset('/img/te-unnes.jpg') }});">
        <div class="hero-overlay bg-opacity-60"></div>
        <div class="hero-content flex-col lg:flex-row lg:px-6">
            <div class="card w-96 bg-base-100 shadow-xl">
                <div class="card-body items-center">
                    <img src="{{ asset('/img/fajar-profile.jpg') }}" class="max-w-sm rounded-lg shadow-2xl" />
                </div>
            </div>
            <div class="card w-96 bg-base-100 shadow-xl">
                <div class="card-body items-start">
                    <h2 class="card-title text-slate-800 text-start">Fajar Setiawan</h2>
                    <h2 class="card-title text-slate-800 text-start">5302416023</h2>
                    <p class="text-slate-800 text-start">Mahasiswa S-1</p>
                    <p class="text-slate-800 text-start">Prodi Pendidikan Teknik Informatika dan Komputer</p>
                    <p class="text-slate-800 text-start">Universitas Negeri Semarang</p>
                    <div class="divider my-0"></div> 
                    <p class="card-title text-slate-800 text-start">Pembimbing</p>
                    <p class="text-slate-800 text-start">Dr. H. Noor Hudallah, M.T.</p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection