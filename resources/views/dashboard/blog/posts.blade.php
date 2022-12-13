@extends('layout.dashboard')

@section('section')

<section id="dashboard" class="py-16 min-h-screen bg-gradient-to-r from-slate-500 to-slate-800">
    <div class="container p-4 mx-auto flex flex-col-reverse w-full lg:flex-row">
        @include('partial.dashboard-sidebar')
        <div class="flex-grow card bg-slate-50 shadow-lg rounded-box m-2 lg:w-3/4">
            <div class="card-body">
                <h2 class="card-title justify-between">{{ $title; }}</h2>
                <div class="divider my-0"></div>
                <a href="/manage/posts/new" class="btn btn-xs text-xs lg:text-sm lg:btn-sm w-2/3 lg:w-1/4 btn-primary border-0 text-white">Buat Artikel Baru</a>
                <div class="flex flex-col-reverse lg:flex-col">
                    <table class="table flex-none invisible lg:visible">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Judul</th>
                                <th>Penulis</th>
                                <th>Ringkasan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($posts->count())
                            @foreach($posts as $p)
                            <tr class="hover">
                                <td>{{ $loop->iteration }}</td>
                                <td class="whitespace-pre-line">{{ $p->title }}</td>
                                <td class="whitespace-pre-line">{{ $p->user->name }}</td>
                                <td class="whitespace-pre-line">{{ $p->excerpt }}</td>
                                <td>
                                    <a href="/manage/posts/{{ $p->slug }}" class="btn btn-sm btn-primary rounded-full tooltip inline-flex" data-tip="lihat selengkapnya"><i class='bx bx-detail text-lg text-white'></i></a>
                                    <a href="/manage/posts/{{ $p->slug }}/edit" class="btn btn-sm btn-secondary rounded-full tooltip inline-flex" data-tip="edit"><i class='bx bx-edit text-lg text-white'></i></a>
                                    <a href="/manage/posts/{{ $p->slug }}/delete" class="btn btn-sm btn-error rounded-full tooltip inline-flex" data-tip="delete" onclick="return confirm('Are you sure?')"><i class='bx bx-trash text-lg text-white'></i></a>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr class="hover"><td colspan="5">-</td></tr>
                            @endif
                        </tbody>
                    </table>
                    <table class="table flex-none visible lg:invisible">
                        @if($posts->count())
                        @foreach($posts as $p)
                        <thead>
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <th class="whitespace-pre-line">{{ $p->title }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="whitespace-pre-line">Penulis</td>
                                <td class="whitespace-pre-line">{{ $p->user->name }}</td>
                            </tr>
                            <tr>
                                <td class="whitespace-pre-line">Ringkasan</td>
                                <td class="whitespace-pre-line">{{ $p->excerpt }}</td>
                            </tr>
                            <tr>
                                <td class="whitespace-pre-line">Aksi</td>
                                <td>
                                    <a href="/manage/posts/{{ $p->slug }}" class="btn btn-sm btn-primary rounded-full tooltip inline-flex" data-tip="lihat selengkapnya"><i class='bx bx-detail text-lg text-white'></i></a>
                                    <a href="/manage/posts/{{ $p->slug }}/edit" class="btn btn-sm btn-secondary rounded-full tooltip inline-flex" data-tip="edit"><i class='bx bx-edit text-lg text-white'></i></a>
                                    <a href="/manage/posts/{{ $p->slug }}/delete" class="btn btn-sm btn-error rounded-full tooltip inline-flex" data-tip="delete" onclick="return confirm('Are you sure?')"><i class='bx bx-trash text-lg text-white'></i></a>
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                        @else
                        <tr class="hover"><td>-- Data Tidak Dapat Ditemukan --</td></tr>
                        @endif
                    </table>
                </div>
                <div class="btn-group justify-end">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
</section>

@endsection