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
                                    <a href="/manage/posts/{{ $p->slug }}" class="btn btn-sm btn-primary rounded-full tooltip inline-flex" data-tip="lihat selengkapnya"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" style="fill: rgb(255, 255, 255);transform: ;msFilter:;"><path d="M20 3H4c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V5c0-1.103-.897-2-2-2zM4 19V5h16l.002 14H4z"></path><path d="M6 7h12v2H6zm0 4h12v2H6zm0 4h6v2H6z"></path></svg></a>
                                    <a href="/manage/posts/{{ $p->slug }}/edit" class="btn btn-sm btn-secondary rounded-full tooltip inline-flex" data-tip="edit"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" style="fill: rgb(255, 255, 255);transform: ;msFilter:;"><path d="m7 17.013 4.413-.015 9.632-9.54c.378-.378.586-.88.586-1.414s-.208-1.036-.586-1.414l-1.586-1.586c-.756-.756-2.075-.752-2.825-.003L7 12.583v4.43zM18.045 4.458l1.589 1.583-1.597 1.582-1.586-1.585 1.594-1.58zM9 13.417l6.03-5.973 1.586 1.586-6.029 5.971L9 15.006v-1.589z"></path><path d="M5 21h14c1.103 0 2-.897 2-2v-8.668l-2 2V19H8.158c-.026 0-.053.01-.079.01-.033 0-.066-.009-.1-.01H5V5h6.847l2-2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2z"></path></svg></a>
                                    <a href="/manage/posts/{{ $p->slug }}/delete" class="btn btn-sm btn-error rounded-full tooltip inline-flex" data-tip="delete" onclick="return confirm('Are you sure?')"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" style="fill: rgb(255, 255, 255);transform: ;msFilter:;"><path d="M5 20a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8h2V6h-4V4a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2v2H3v2h2zM9 4h6v2H9zM8 8h9v12H7V8z"></path><path d="M9 10h2v8H9zm4 0h2v8h-2z"></path></svg></a>
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