{{-- FOOTER START --}}
<footer class="footer footer-center inset-x-0 bottom-0 p-4 bg-slate-800 text-base-content">
    <div>
        <p class="text-white">Hak Cipta © 2022 - Sipa App</p>
    </div>
</footer>
{{-- FOOTER END --}}

{{-- Library Javascript --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript" src="{{ asset('/js/croppie.js') }}"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

@if(Request::is('manage/posts*'))
    <script type="text/javascript" src="{{ asset('/js/trix.js') }}"></script>
    <script>
        // Trix-Editor
        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        });
    </script>
@endif

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function(){
        // Avatar Image
        $avatarImage = $('#avatar_upload').croppie({
            enableExif: true,
            viewport: { width: 200, height: 200, type: 'square', format: 'jpg' },
            boundary: { width: 250, height: 250 }
        });
        $('input#avatar_input').on('change', function(){
            var reader = new FileReader();
            reader.onload = function (e) {
                $avatarImage.croppie('bind', {
                    url: e.target.result
                })
            }
            reader.readAsDataURL(this.files[0]);
        });
        $('button.crop_avatar').on('click', function(event) {
            $avatarImage.croppie('result', {
                type: 'canvas',
                size: {width: 300, height: 300},
            }).then(function (response){
                $.ajax({
                    url: "/dashboard/image-avatar",
                    type: "POST",
                    data: {"image":response},
                });
            }).then(function(){
                setInterval(location.reload(), 3000);
            });
        });

        // ODD Image
        $oddImage = $('#odd_upload').croppie({
            enableExif: true,
            viewport: { width: 200, height: 200, type: 'square', format: 'jpg' },
            boundary: { width: 250, height: 250 }
        });
        $('input#odd_input').on('change', function(){
            var reader = new FileReader();
            reader.onload = function (e) {
                $oddImage.croppie('bind', {
                    url: e.target.result
                })
            }
            reader.readAsDataURL(this.files[0]);
        });
        $('button.crop_odd').on('click', function(event) {
            $oddImage.croppie('result', {
                type: 'canvas',
                size: {width: 300, height: 300},
            }).then(function (response){
                $.ajax({
                    url: "/dashboard/image-odd",
                    type: "POST",
                    data: {"image":response},
                });
            }).then(function(){
                setInterval(location.reload(), 3000);
            });
        });

        // Cover Image
        const modalToggle = document.querySelector('#cover-modal');
        $uploadCrop = $('#cover_upload').croppie({
            enableExif: true,
            viewport: { width: 256, height: 144, type: 'square', format: 'jpg' },
            boundary: { width: 320, height: 240 }
        });
        $('input#cover_input').on('change', function(){
            var reader = new FileReader();
            reader.onload = function (e) {
                $uploadCrop.croppie('bind', {
                    url: e.target.result
                })
            }
            modalToggle.checked = true;
            reader.readAsDataURL(this.files[0]);
        });
        $('button.crop_cover').on('click', function(event) {
            $uploadCrop.croppie('result', {
                type: 'canvas',
                size: {width: 568, height: 360},
            }).then(function (response){
                $.ajax({
                    url: "/manage/image-cover",
                    type: "POST",
                    data: {"image":response},
                    success: function (data){
                        html = '<img src="' + response + '" />';
                        $('img#image-preview.image-preview').html(html);
                    }
                });
            }).then(function(){
                modalToggle.checked = false;
                setInterval(location.reload(), 3000);
            });
        });
    })
</script>
<script>
    function previewImage(){
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent){
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>
<script>
    function previewPhotos(){
        const photos = document.querySelector('#photos');
        const photosPreview = document.querySelector('img#photos-preview');

        photosPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(photos.files[0]);

        oFReader.onload = function(oFREvent){
            photosPreview.src = oFREvent.target.result;
        }
    }
</script>
<script>
    $(document).ready( function () {
        $('#usersTable').DataTable();
    });
</script>