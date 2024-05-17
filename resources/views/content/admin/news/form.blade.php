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
                    <form class="settings-form" method="{{ $page_meta['method'] }}" action="{{ $page_meta['url'] }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method($page_meta['method'])
                        <div class="mb-3">
                            <label for="title" class="form-label">Judul<span class="ms-2" data-bs-container="body"
                                    data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-placement="top"
                                    data-bs-content="This is a Bootstrap popover example. You can use popover to provide extra info."><svg
                                        width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle"
                                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                        <path
                                            d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z" />
                                        <circle cx="8" cy="4.5" r="1" />
                                    </svg></span></label>
                            <input type="text" class="form-control" id="title" name="title"
                                placeholder="Masukan Judul News/Artikel" required>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Slug</label>
                            <select name="status" class="form-select" id="status">
                                <option value="publish">Publish</option>
                                <option value="archived">Archived</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Thumbnails</label>
                            <input type="file" class="form-control" name="image" id="image">
                        </div>
                        {{-- <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <div class="form-check form-switch mb-3">
                                <input class="form-check-input" type="checkbox" name="status" id="status" checked>
                                <label class="form-check-label" for="status">Publish</label>
                            </div>
                        </div> --}}
                        <div class="mb-3">
                            <label for="summernote" class="form-label">Deskripsi</label>
                            <textarea id="summernote" name="description" class="form-control"></textarea>
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
        });
    </script>
@endpush
