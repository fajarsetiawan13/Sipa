@extends('layout.main')

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

<section id="login-page" class="py-8 bg-slate-100">
    <div class="container py-16 px-4 mx-auto">
        <div class="w-full">
            <div class="max-w-xl mx-auto text-center">
                <h4 class="font-semibold uppercase text-primary text-lg mb-3">Bertemu</h4>
                <h2 class="font-bold text-dark text-3xl mb-4 lg:text-5xl">Tolong hubungi kontak keluarga yang tersedia dibawah!</h2>
            </div>
        </div>
        <div class="flex justify-center">
            <div class="card flex justify-center w-[600px] shadow-lg bg-base-100">
                <div class="card-body items-center text-center">
                    <h2 class="card-title">{{ $information->user->odd_name }}</h2>
                    <p>{{ $information->user->odd_description }}</p>
                    <p>{{ $information->user->address }}</p>
                    <div class="carousel carousel-center w-full mt-4 px-2 gap-4">
                        @for($x = 0; $x < ($information->user->images->count()); $x++)
                        <div id="item{{ $x }}" class="carousel-item">
                          <img src="{{ asset('storage') . '/' . $information->user->images[$x]['image'] }}" class="rounded-xl w-[250px]" />
                        </div> 
                        @endfor
                    </div>
                    <div class="flex justify-center w-full py-2 gap-2">
                        <?php $y = 1;?>
                        @for($x = 0; $x < ($information->user->images->count()); $x++)
                        <a href="#item{{ $x }}" class="btn btn-sm">{{ $y }}</a>
                        <?php $y++ ;?>
                        @endfor
                    </div>
                    <a href="{{ 'tel:' . $information->user->phone }}" target="_blank" class="btn btn-md btn-accent">Telepon Selular</a>
                    <a href="{{ 'https://wa.me/' . $information->user->phone . '?text=Saya menemukan keluarga Anda!'}}" target="_blank" class="btn btn-md btn-secondary">Whatsapp (chat/telepon) <i class='bx bxl-whatsapp text-lg'></i></a>
                    @if(!empty($information->user->contact))
                    <h2 class="text-primary font-bold mt-3">Kontak Keluarga</h2>
                    @foreach($information->user->contact as $uc)
                    <a href="{{ 'https://wa.me/' . $uc->phone_number . '?text=Saya menemukan keluarga Anda!'}}" target="_blank" class="btn btn-md btn-secondary">Whatsapp (chat/telepon) <i class='bx bxl-whatsapp text-lg'></i></a>
                    @endforeach
                    @endif
                    <div class="card-actions">
                        <form action="/meet/{{ $information->user->id }}" method="POST">
                            @csrf
                            <input type="text" id="latitude" name="latitude" hidden>
                            <input type="text" id="longitude" name="longitude" hidden>
                            <button type="submit" class="btn btn-md btn-primary text-white">Bagikan Lokasi Terkini</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <script>
            function getLocation() {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(showPosition);
                }
            }

            function showPosition(position) {
                document.getElementById("latitude").value = position.coords.latitude;
                document.getElementById("longitude").value = position.coords.longitude;
            }
            getLocation();
        </script>
    </div>
</section>

@endsection