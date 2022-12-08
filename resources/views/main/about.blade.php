@extends('layout.main')

@section('section')

<section id="login-page" class="py-8 bg-slate-800">
    <div class="container py-16 px-4 mx-auto">
        <div class="w-full">
            <div class="max-w-xl mx-auto text-center">    
                <h4 class="font-semibold uppercase text-primary text-sm lg:text-lg">Tentang</h4>
                <h2 class="font-bold text-slate-50 text-2xl mb-3 lg:text-3xl">{{ $title }}</h2>
                {{-- <p class="font-medium text-md text-slate-800 md:text-lg mb-4">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Asperiores nesciunt debitis harum? Delectus possimus a maiores quia accusamus?</p> --}}
            </div>
        </div>
        <div class="flex justify-center">
            <div class="card flex w-[600px] shadow-lg bg-slate-50">
                <div class="card-body">
                </div>
            </div>
        </div>
    </div>
</section>

@endsection