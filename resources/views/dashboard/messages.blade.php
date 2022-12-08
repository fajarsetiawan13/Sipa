@extends('layout.dashboard')

@section('section')

<section id="dashboard" class="py-16 min-h-screen bg-gradient-to-r from-slate-500 to-slate-800">
    <div class="container p-4 mx-auto">
        <div class="flex flex-col-reverse w-full lg:flex-row">
            
            @include('partial.dashboard-sidebar')

            <div class="flex-grow card bg-slate-50 shadow-lg rounded-box m-2 lg:w-3/4">
                <div class="card-body">
                    <h2 class="card-title justify-between"><span>{{ $title }}</span></h2>
                    <div class="divider my-0"></div>
                    <div class="overflow-x-auto">
                        <table class="table table-compact w-full">
                            <thead>
                                <tr>
                                    <td>#</td>
                                    <td>Tanggal</td>
                                    <td>Nama</td>
                                    <td>Email</td>
                                    <td>Pesan</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($messages as $m)
                                <tr class="hover">
                                    <td class="bg-slate-50">{{ $loop->iteration }}</td>
                                    <td class="bg-slate-50">{{ $m->created_at->format('d/m/Y G:i') }}</td>
                                    <td class="bg-slate-50">{{ $m->name }}</td>
                                    <td class="bg-slate-50">{{ $m->email }}</td>
                                    <td class="bg-slate-50">{{ $m->message }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection