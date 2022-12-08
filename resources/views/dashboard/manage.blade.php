@extends('layout.dashboard')

@section('section')

<section id="dashboard" class="py-16 min-h-screen bg-gradient-to-r from-slate-500 to-slate-800">
    <div class="container p-4 mx-auto">
        <div class="flex flex-col-reverse w-full lg:flex-row">
            
            @include('partial.dashboard-sidebar')

            <div class="flex-grow card bg-slate-50 shadow-lg rounded-box m-2 lg:w-3/4">
                <div class="card-body">
                    <h2 class="card-title justify-between"><span>{{ $title; }}</span></h2>
                    <div class="divider my-0"></div>
                    <div class="flex flex-wrap w-full justify-center lg:justify-start">
                        <div class="p-3">
                            <a href="/manage/posts">
                                <img class="mask mask-squircle" width="100" height="100" src="/img/admin-article.webp" alt="Menu"/>
                            </a>
                        </div>
                        <div class="p-3">
                            <a href="/manage/messages">
                                <img class="mask mask-squircle" width="100" height="100" src="/img/admin-messages.webp" alt="Menu"/>
                            </a>
                        </div>
                        <div class="p-3">
                            <a href="/manage/cover">
                                <img class="mask mask-squircle" width="100" height="100" src="/img/admin-cover.webp" alt="Menu"/>
                            </a>
                        </div>
                        {{-- <div class="p-3">
                            <a href="/manage/contact">
                                <img class="mask mask-squircle" width="100" height="100" src="/img/admin-contact.png" alt="Menu"/>
                            </a>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection