    @section('title', $page_meta['title'])
    @extends('layout.admin.layout')
    @push('css')
        <link rel="stylesheet" href="{{ asset('vendor') }}/summernote-0.8.18/summernote.min.css" />
    @endpush
    @section('content')

        <div class="container-xl">
            <div class="row g-3 mb-4 align-items-center justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title mb-0">{{ $page_meta['title'] }}</h1>
                    <h6 class="text-sm text-secondary my-2">{{ $page_meta['description'] }}</h6>
                </div>
                <div class="app-card app-card-settings shadow-sm p-4">
                    <div class="app-card-body">
                        <form class="settings-form" method="POST" action="{{ $page_meta['url'] }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method($page_meta['method'])
                            <div class="row">
                                <div class="col-md-12 col-lg-5">
                                    <div class="mb-3">
                                        <label for="status" class="form-label">Thumbnails</label>
                                        @if ($news->image)
                                            <div class=" position-relative">
                                                <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}"
                                                    class="img-thumbnail img-size">
                                                <div id="set-button"
                                                    class="position-absolute bg-white w-100 h-100  top-50 start-50 translate-middle">
                                                    TEss
                                                </div>
                                            </div>
                                        @else
                                            <div id="file-group" class="file-group border-primary row justify-center">
                                                <i class="far fa-folder-open fs-1 text-primary mb-2"></i>
                                                <span class="filename">Drop Your File Here or <span
                                                        class="text-primary">Browse</span>
                                                </span>
                                                <input type="file" class="file-input form-control" id="image"
                                                    name="image">
                                            </div>
                                            <img id="imgPreview" src="#" alt="pic"
                                                class="img-thumbnail img-size d-none" />
                                        @endif
                                        <x-forms.error type="danger" :messages="$errors->get('image')" />
                                    </div>
                                </div>
                                <div class='col-md-12 col-lg-7'>
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Judul<span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" id="title" name="title"
                                            placeholder="Masukan Judul News/Artikel"
                                            value="{{ $page_meta['method'] == 'put' ? $news->title : '' }}">
                                        <x-forms.error type="danger" :messages="$errors->get('title')" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="status" class="form-label">Status<span
                                                class="text-danger">*</span></label>
                                        <select name="status" class="form-select" id="status">
                                            <option value="">--- Pilih Status ---</option>
                                            @foreach (\App\Enums\NewsStatusEnum::cases() as $value)
                                                <option value="{{ $value->value }}"
                                                    {{ $news->status?->value == $value->value ? 'selected' : '' }}>
                                                    {{ $value->name }}</option>
                                            @endforeach
                                            {{-- <option value="archived">Archived</option> --}}
                                        </select>
                                        <x-forms.error type="danger" :messages="$errors->get('status')" />

                                    </div>
                                </div>

                            </div>
                            <div class="mb-3">
                                <label for="summernote" class="form-label">Deskripsi<span
                                        class="text-danger">*</span></label>
                                <textarea id="summernote" name="description" class="form-control">
                                {!! $page_meta['method'] == 'put' ? $news->title : '' !!}</textarea>
                                <x-forms.error type="danger" :messages="$errors->get('description')" />
                            </div>
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('news.index') }}" class="btn app-btn-secondary">Kembali</a>
                                <button type="submit" class="btn app-btn-primary px-3">Simpan </button>
                            </div>
                        </form>
                    </div><!--//app-card-body-->

                </div><!--//app-card-->
            </div><!--//row-->

        </div><!--//container-fluid-->
    @endsection

    @push('js')
        <script src="{{ asset('vendor') }}/summernote-0.8.18/summernote-bs5.js"></script>

        <script>
            $(document).ready(function() {
                $('#summernote').summernote({
                    placeholder: 'Tulis isi News/Artikel disini...',
                    height: 200
                });
                $('#summernote').summernote('code', {!! json_encode($news->description) !!});
            });



            $('#image').on('change', function() {
                file = this.files[0];
                if (file) {
                    let reader = new FileReader();
                    reader.onload = function(event) {
                        $("#imgPreview").removeClass('d-none').attr("src", event.target.result);
                        $("#file-group").addClass("d-none");
                    };
                    reader.readAsDataURL(file);
                }
            })
        </script>
    @endpush
