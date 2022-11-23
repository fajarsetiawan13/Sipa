@extends('layout.dashboard')

@section('section')

<section id="dashboard" class="py-16 min-h-screen bg-gradient-to-r from-slate-500 to-slate-800">
    <div class="container p-4 mx-auto">
        <div class="flex flex-col-reverse w-full lg:flex-row">
            
            @include('partial.dashboard-sidebar')
            
            <div class="flex-grow card rounded-box m-2 lg:w-3/4">
                <div class="card w-full bg-slate-50 shadow-lg">
                    <div class="card-body overflow-x-scroll">
                        <h2 class="card-title justify-between"><span>{{ $title }}</span></h2>
                        <div class="divider my-0"></div>
                        <table class="table table-compact w-full">
                            <thead>
                                <tr>
                                    <td>#</td>
                                    <td>Waktu</td>
                                    <td>Lokasi Terakhir</td>
                                    <td>Maps</td>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($track))
                                @foreach($track as $tr)
                                <tr class="hover">
                                    <td class="bg-slate-50">{{ $loop->iteration }}</td>
                                    <td class="bg-slate-50">{{ $tr->created_at->format('Y-m-d H:i') }}</td>
                                    <td class="bg-slate-50">{{ 'lat:' . $tr->latitude . ', long:' . $tr->longitude }}</td>
                                    <td class="bg-slate-50"><label class="btn btn-sm btn-info rounded-full tooltip inline-flex modal-button" for="maps-modal-{{ $tr->id }}" data-tip="maps"><i class='bx bx-current-location text-lg text-white'></i></label></td>
                                    {{-- <td><a href="#" class="link link-hover text-blue-500">Buka Maps</a></td> --}}
                                    <input type="checkbox" id="maps-modal-{{ $tr->id }}" class="modal-toggle" />
                                    <div class="modal modal-bottom sm:modal-middle">
                                        <div class="modal-box">
                                            <label for="maps-modal-{{ $tr->id }}" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
                                            <h2 class="font-bold text-lg">Lokasi Terkini</h2>
                                            <p class="py-4">Segera temui keluarga Anda!</p>
                                            <iframe width="100%" height="500" src="https://maps.google.com/maps?q={{ $tr->latitude }},{{ $tr->longitude }}&output=embed"></iframe>
                                        </div>
                                    </div> 
                                </tr>
                                @endforeach
                                @else
                                <tr colspan="4">-</tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection