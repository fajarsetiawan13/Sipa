<div class="card h-fit bg-slate-50 shadow-lg invisible rounded-box m-2 lg:visible lg:w-1/4">
    <ul class="menu p-2">
        <li>
            <a href="/dashboard" class="{{ Request::is('dashboard') ? 'bg-purple-300' : ''}}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" style="fill: rgba(75, 75, 75, 1);transform: ;msFilter:;"><path d="M4 13h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1zm-1 7a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v4zm10 0a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-7a1 1 0 0 0-1-1h-6a1 1 0 0 0-1 1v7zm1-10h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1h-6a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1z"></path></svg>
                Dasbor
            </a>
        </li>
        
        @can('admin')
        <li>
            <a href="/manage" class="{{ Request::is('manage*') ? 'bg-purple-300' : ''}}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" style="fill: rgba(75, 75, 75, 1);transform: ;msFilter:;"><path d="M20 3H4c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V5c0-1.103-.897-2-2-2zM4 19V7h16l.002 12H4z"></path><path d="M9.293 9.293 5.586 13l3.707 3.707 1.414-1.414L8.414 13l2.293-2.293zm5.414 0-1.414 1.414L15.586 13l-2.293 2.293 1.414 1.414L18.414 13z"></path></svg>
                Manajemen Admin
            </a>
        </li>
        <li>
            <a href="/users" class="{{ Request::is('users*') ? 'bg-purple-300' : ''}}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" style="fill: rgba(75, 75, 75, 1);transform: scaleX(-1);msFilter:progid:DXImageTransform.Microsoft.BasicImage(rotation=0, mirror=1);"><path d="M20 2H8a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2zm-6 2.5a2.5 2.5 0 1 1 0 5 2.5 2.5 0 0 1 0-5zM19 15H9v-.25C9 12.901 11.254 11 14 11s5 1.901 5 3.75V15z"></path><path d="M4 8H2v12c0 1.103.897 2 2 2h12v-2H4V8z"></path></svg>
                Manajemen Pengguna
            </a>
        </li>
        @endcan
        @cannot('admin')
        <li>
            <a href="/tracking" class="{{ Request::is('tracking*') ? 'bg-purple-300' : ''}}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" style="fill: rgb(75, 75, 75);transform: ;msFilter:;"><path d="M12 2C7.589 2 4 5.589 4 9.995 3.971 16.44 11.696 21.784 12 22c0 0 8.029-5.56 8-12 0-4.411-3.589-8-8-8zm0 12c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4z"></path></svg>
                Pelacakan
            </a>
        </li>
        @endcannot
        <li>
            <a href="/password" class="{{ Request::is('password*') ? 'bg-purple-300' : ''}}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" style="fill: rgba(75, 75, 75, 1);transform: ;msFilter:;"><path d="M3.433 17.325 3.079 19.8a1 1 0 0 0 1.131 1.131l2.475-.354C7.06 20.524 8 18 8 18s.472.405.665.466c.412.13.813-.274.948-.684L10 16.01s.577.292.786.335c.266.055.524-.109.707-.293a.988.988 0 0 0 .241-.391L12 14.01s.675.187.906.214c.263.03.519-.104.707-.293l1.138-1.137a5.502 5.502 0 0 0 5.581-1.338 5.507 5.507 0 0 0 0-7.778 5.507 5.507 0 0 0-7.778 0 5.5 5.5 0 0 0-1.338 5.581l-7.501 7.5a.994.994 0 0 0-.282.566zM18.504 5.506a2.919 2.919 0 0 1 0 4.122l-4.122-4.122a2.919 2.919 0 0 1 4.122 0z"></path></svg>
                Ubah Password
            </a>
        </li>
    </ul>
</div> 