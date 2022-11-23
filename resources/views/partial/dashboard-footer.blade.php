{{-- FOOTER START --}}
<footer class="footer footer-center inset-x-0 bottom-0 p-4 bg-slate-800 text-base-content">
    <div>
        <p class="text-white">Hak Cipta © 2022 - Sipa App</p>
    </div>
</footer>
{{-- FOOTER END --}}

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