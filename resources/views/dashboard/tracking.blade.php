@extends('layout.dashboard')

@section('section')

<section id="dashboard" class="py-16 min-h-screen bg-gradient-to-r from-slate-500 to-slate-800">
    <div class="container p-4 mx-auto flex flex-col-reverse lg:flex-row">
        @include('partial.dashboard-sidebar')
        <div class="card bg-slate-50 shadow-lg rounded-box m-2 lg:w-3/4">
            <div class="card-body">
                <h2 class="card-title justify-between">{{ $title }}</h2>
                <div class="divider my-0"></div>
                <table class="table table-fixed w-full">
                    <thead>
                        <tr>
                            <th class="w-1/12 text-left">#</th>
                            <th class="w-3/12 text-left">Waktu</th>
                            <th class="w-5/12 text-left">Lokasi Terakhir</th>
                            <th class="w-3/12 text-left">Maps</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($tracks))
                        @foreach($tracks as $tr)
                        <tr class="hover">
                            <td>{{ $loop->iteration }}</td>
                            <td class="whitespace-pre-line">{{ $tr->created_at->format('Y-m-d H:i') }}</td>
                            <td class="whitespace-pre-line truncate">{{ 'lat:' . $tr->latitude . ', long:' . $tr->longitude }}</td>
                            <td>
                                <label class="btn btn-xs lg:btn-sm btn-info rounded-full tooltip inline-flex modal-button" for="maps-modal-{{ $tr->id }}" data-tip="maps">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" style="fill: rgb(255, 255, 255);transform: ;msFilter:;"><circle cx="12" cy="12" r="4"></circle><path d="M13 4.069V2h-2v2.069A8.01 8.01 0 0 0 4.069 11H2v2h2.069A8.008 8.008 0 0 0 11 19.931V22h2v-2.069A8.007 8.007 0 0 0 19.931 13H22v-2h-2.069A8.008 8.008 0 0 0 13 4.069zM12 18c-3.309 0-6-2.691-6-6s2.691-6 6-6 6 2.691 6 6-2.691 6-6 6z"></path></svg>
                                </label>
                            </td>
                            <input type="checkbox" id="maps-modal-{{ $tr->id }}" class="modal-toggle" />
                            <div class="modal modal-bottom sm:modal-middle">
                                <div class="modal-box">
                                    <label for="maps-modal-{{ $tr->id }}" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
                                    <h2 class="font-bold text-lg">Lokasi Pemindaian</h2>
                                    <p class="py-4">Segera temui keluarga Anda!</p>
                                    <iframe width="100%" height="300" src="https://maps.google.com/maps?q={{ $tr->latitude }},{{ $tr->longitude }}&output=embed"></iframe>
                                </div>
                            </div> 
                        </tr>
                        @endforeach
                        @else
                        <tr colspan="4">-</tr>
                        @endif
                    </tbody>
                </table>
                <div class="btn-group justify-end">
                    {{ $tracks->links() }}
                </div>
            </div>
        </div>
    </div>
</section>

@endsection