@extends('layout.dashboard')

@section('section')

<section id="dashboard" class="py-16 min-h-screen bg-gradient-to-r from-slate-500 to-slate-800">
    <div class="container p-4 mx-auto">
        <div class="flex flex-col-reverse w-full lg:flex-row">
            
            @include('partial.dashboard-sidebar')
            
            <div class="flex-grow card rounded-box m-2 lg:w-3/4">
                <div class="card w-full bg-slate-50 shadow-lg">
                    <div class="card-body">
                        <h2 class="card-title justify-between"><span>{{ $title; }}</span></h2>
                        <div class="divider my-0"></div>
                        <a href="/manage/posts/new" class="btn btn-sm w-1/3 btn-primary border-0 text-white text-xs">Buat Artikel Baru</a>
                        <div class="overflow-x-auto">
                            <table class="table table-compact w-full">
                                <thead>
                                    <tr>
                                        <td>#</td>
                                        <td>Judul</td>
                                        <td>Penulis</td>
                                        <td>Ringkasan</td>
                                        <td>Aksi</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($posts->count())
                                    @foreach($posts as $p)
                                    <tr class="hover">
                                        <td class="bg-slate-50">{{ $loop->iteration }}</td>
                                        <td class="bg-slate-50">{{ $p->title }}</td>
                                        <td class="bg-slate-50">{{ $p->user->name }}</td>
                                        <td class="bg-slate-50">{{ $p->excerpt }}</td>
                                        <td class="bg-slate-50">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection