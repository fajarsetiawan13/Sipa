{{-- FOOTER START --}}
<footer class="footer footer-center inset-x-0 bottom-0 p-4 bg-slate-800 text-base-content">
    <p class="text-white">Hak Cipta © 2022 - Sipa App</p>
</footer>
{{-- FOOTER END --}}

{{-- Library Javascript --}}
<script type="text/javascript" src="{{ asset('/js/jquery-3.6.0.min.js') }}"></script>

@if(Request::is('manage/posts*'))
    <script async type="text/javascript" src="{{ asset('/js/trix.min.js') }}"></script>
    <script>
        // Trix-Editor
        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        });
    </script>
@endif