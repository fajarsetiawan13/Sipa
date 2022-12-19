@extends('layout.dashboard')

@section('section')

<section id="dashboard" class="py-16 min-h-screen bg-gradient-to-r from-slate-500 to-slate-800">
    <div class="container p-4 mx-auto flex flex-col-reverse w-full lg:flex-row">
        @include('partial.dashboard-sidebar')
        <div class="flex-grow card bg-slate-50 shadow-lg rounded-box m-2 lg:w-3/4">
            <div class="card-body">
                <h2 class="card-title justify-between">{{ $title }}</h2>
                <div class="divider my-0"></div>
                <div class="flex flex-col-reverse lg:flex-col">
                    <table class="table flex-none invisible lg:visible">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tanggal</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Pesan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($messages as $m)
                            <tr class="hover">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $m->created_at->format('d/m/Y G:i') }}</td>
                                <td class="whitespace-pre-line">{{ $m->name }}</td>
                                <td class="whitespace-pre-line">{{ $m->email }}</td>
                                <td class="whitespace-pre-line">{{ $m->message }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <table class="table flex-none visible lg:invisible">
                        @foreach($messages as $m)
                        <thead>
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <th>{{ $m->created_at->format('d/m/Y G:i') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="hover">
                                <td>Nama</td>
                                <td class="whitespace-pre-line">{{ $m->name }}</td>
                            </tr>
                            <tr class="hover">
                                <td>Email/Telepon</td>
                                <td class="whitespace-pre-line">{{ $m->email }}</td>
                            </tr>
                            <tr class="hover">
                                <td>Pesan</td>
                                <td class="whitespace-pre-line">{{ $m->message }}</td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
                <div class="btn-group">
                    {{ $messages->links() }}
                </div>
            </div>
        </div>
    </div>
</section>

@endsection