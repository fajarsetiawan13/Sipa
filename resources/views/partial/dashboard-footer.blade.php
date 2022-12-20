<input type="checkbox" id="avatar-modal" class="modal-toggle" />
<div class="modal modal-bottom sm:modal-middle">
    <div class="modal-box">
        <label for="avatar-modal" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
        <h2 class="font-bold text-lg">Ubah Foto Penanggung Jawab</h2>
        <p class="py-4">Pastikan foto/gambar terlihat jelas dan tidak melebihi batan ukuran 2 MB.</p>
        <div class="flex flex-col justify-between gap-3">
            <form action="/changeimage" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="flex">
                    <img src="{{ asset('storage/' . $account[0]->image) }}" id="avatar_preview" class="avatar_preview rounded-box mx-auto max-w-[160px] max-h-[160px] object-cover" width="160" height="160" alt="" />
                </div>
                <div class="flex justify-center pt-3">
                    <span class="sr-only">Pilih Foto</span>
                    <input type="hidden" name="oldImage" value="{{ $account[0]->image }}">
                    <input type="file" id="avatar_input" name="avatar_input" onchange="previewAvatar()" class="avatar_input block w-full text-sm text-slate-500 file:rounded-xl file:text-sm file:py-2 file:px-4 file:border-0 file:bg-slate-300 hover:file:bg-slate-400"/>
                    @error('avatar_input')
                    <label class="label label-text-alt text-red-600">{{ $message }}</label>
                    @enderror
                </div>
                <div class="modal-action">
                    <button class="btn btn-primary crop_avatar text-white">Unggah</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function previewAvatar(){
        const image = document.querySelector('#avatar_input');
        const imgPreview = document.querySelector('#avatar_preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent){
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>

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