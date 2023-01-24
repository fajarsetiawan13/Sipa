{{-- HEADER START --}}
<header>
    <div class="container">
        <div class="navbar fixed top-0 bg-slate-50 z-30 shadow-sm">
            <div class="navbar-start">
                <div class="dropdown">
                    <label tabindex="0" class="btn btn-ghost lg:hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h8m-8 6h16" />
                        </svg>
                    </label>
                    <ul tabindex="0"
                        class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-slate-50 rounded-box w-52">
                        <li><a href="{{ Request::is('/*') ? '#' : '/'}}">Beranda</a></li>
                        <li><a href="{{ Request::is('article') ? '#' : '/article'}}">Artikel</a></li>
                        <li><a href="{{ Request::is('/') ? '#contact' : '/#contact'}}">Kontak</a></li>
                        <li><a href="{{ Request::is('about*') ? '#' : '/about'}}">Tentang</a></li>
                    </ul>
                </div>
                <a class="btn btn-ghost normal-case text-xl">SIPA</a>
            </div>
            <div class="navbar-center hidden lg:flex">
                <ul class="menu menu-horizontal p-0">
                    <li><a href="{{ Request::is('/*') ? '#' : '/'}}">Beranda</a></li>
                    <li><a href="{{ Request::is('article') ? '#' : '/article'}}">Artikel</a></li>
                    <li><a href="{{ Request::is('/*') ? '#contact' : '/#contact'}}">Kontak</a></li>
                    <li><a href="{{ Request::is('about*') ? '#' : '/about'}}">Tentang</a></li>
                </ul>
            </div>
            <div class="navbar-end">
                <label
                    class="btn btn-sm text-sm lg:btn-md lg:text-md text-white bg-primary border-0 modal-button mr-3 px-5"
                    for="login-modal">Masuk</label>
            </div>
        </div>
    </div>
</header>
{{-- HEADER END --}}