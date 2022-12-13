@extends('layout.dashboard')

@section('section')

<section id="dashboard" class="py-16 min-h-screen bg-gradient-to-r from-slate-500 to-slate-800">
    <div class="container p-4 mx-auto flex flex-col-reverse w-full lg:flex-row">
        @include('partial.dashboard-sidebar')
        <div class="flex-grow card bg-slate-50 shadow-lg rounded-box m-2 lg:w-3/4">
            <div class="card-body">
                <h2 class="card-title justify-between">{{ $title }}</h2>
                <div class="divider my-0"></div>
                <div class="flex flex-wrap w-full justify-between lg:justify-start">
                    <a href="/manage/posts" class="p-2">
                        <img class="mask mask-squircle " width="100" height="100" src="/img/admin-article.webp" alt="Icon Menu Article"/>
                    </a>
                    <a href="/manage/messages" class="p-2">
                        <img class="mask mask-squircle" width="100" height="100" src="/img/admin-messages.webp" alt="Icon Menu Messages"/>
                    </a>
                    <a href="/manage/cover" class="p-2">
                        <img class="mask mask-squircle" width="100" height="100" src="/img/admin-cover.webp" alt="Icon Menu Cover Image"/>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection