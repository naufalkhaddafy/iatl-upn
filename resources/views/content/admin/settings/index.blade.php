@extends('layout.admin.layout')
@section('title', 'Web Settings')
@push('css')
@endpush
@section('content')
    <div class="container-xl">
        <h1 class="app-page-title">Web Settings</h1>
        <h6 class="text-xs text-secondary">Halaman untuk mengatur content website</h6>

        <hr class="mb-4">
        <div class="row g-4 settings-section">
            <div class="col-12 col-md-4">
                <h3 class="section-title">General</h3>
                <div class="section-intro">Tentukan nama web page yang anda inginkan </div>
            </div>
            <div class="col-12 col-md-8">
                <div class="app-card app-card-settings shadow-sm p-4">

                    <div class="app-card-body">
                        <form class="settings-form">
                            <div class="mb-3">
                                <label for="setting-input-1" class="form-label">Nama Website<span class="ms-2"
                                        data-bs-container="body" data-bs-toggle="popover" data-bs-trigger="hover focus"
                                        data-bs-placement="top" data-bs-content="Masukan nama website anda"><svg
                                            width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle"
                                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                            <path
                                                d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z" />
                                            <circle cx="8" cy="4.5" r="1" />
                                        </svg></span></label>
                                <input type="text" class="form-control" id="setting-input-1" value="Lorem Ipsum Ltd."
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="setting-input-2" class="form-label">Logo Website</label>
                                <input type="file" class="form-control" id="setting-input-2" required>
                            </div>
                            <button type="submit" class="btn app-btn-primary">Simpan</button>
                        </form>
                    </div><!--//app-card-body-->

                </div><!--//app-card-->
            </div>
        </div><!--//row-->
        <hr class="my-4">
        <div class="row g-4 settings-section">
            <div class="col-12 col-md-4">
                <h3 class="section-title">Banner</h3>
                <div class="section-intro">Berikan Banner pada halaman home anda </div>
            </div>
            <div class="col-12 col-md-8">
                <div class="app-card app-card-settings shadow-sm p-4">

                    <div class="app-card-body">
                        <form class="settings-form">
                            <div class="mb-3">
                                <label for="setting-input-1" class="form-label">Banner</label>
                                <input type="text" class="form-control" id="setting-input-1" value="Lorem Ipsum Ltd."
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="setting-input-2" class="form-label">Logo Website</label>
                                <input type="file" class="form-control" id="setting-input-2" required>
                            </div>
                            <button type="submit" class="btn app-btn-primary">Simpan</button>
                        </form>
                    </div><!--//app-card-body-->

                </div><!--//app-card-->
            </div>
        </div><!--//row-->
        {{-- <hr class="my-4">
        <div class="row g-4 settings-section">
            <div class="col-12 col-md-4">
                <h3 class="section-title">Data &amp; Privacy</h3>
                <div class="section-intro">Settings section intro goes here. Morbi vehicula, est eget fermentum ornare.
                </div>
            </div>
            <div class="col-12 col-md-8">
                <div class="app-card app-card-settings shadow-sm p-4">
                    <div class="app-card-body">
                        <form class="settings-form">
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" value="" id="settings-checkbox-1"
                                    checked>
                                <label class="form-check-label" for="settings-checkbox-1">
                                    Keep user app activity history
                                </label>
                            </div><!--//form-check-->
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" value="" id="settings-checkbox-2"
                                    checked>
                                <label class="form-check-label" for="settings-checkbox-2">
                                    Keep user app preferences
                                </label>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" value="" id="settings-checkbox-3">
                                <label class="form-check-label" for="settings-checkbox-3">
                                    Keep user app search history
                                </label>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" value="" id="settings-checkbox-4">
                                <label class="form-check-label" for="settings-checkbox-4">
                                    Lorem ipsum dolor sit amet
                                </label>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" value="" id="settings-checkbox-5">
                                <label class="form-check-label" for="settings-checkbox-5">
                                    Aenean quis pharetra metus
                                </label>
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn app-btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div><!--//app-card-body-->
                </div><!--//app-card-->
            </div>
        </div><!--//row-->
        <hr class="my-4">
        <div class="row g-4 settings-section">
            <div class="col-12 col-md-4">
                <h3 class="section-title">Notifications</h3>
                <div class="section-intro">Settings section intro goes here. Duis velit massa, faucibus non hendrerit eget.
                </div>
            </div>
            <div class="col-12 col-md-8">
                <div class="app-card app-card-settings shadow-sm p-4">
                    <div class="app-card-body">
                        <form class="settings-form">
                            <div class="form-check form-switch mb-3">
                                <input class="form-check-input" type="checkbox" id="settings-switch-1" checked>
                                <label class="form-check-label" for="settings-switch-1">Project notifications</label>
                            </div>
                            <div class="form-check form-switch mb-3">
                                <input class="form-check-input" type="checkbox" id="settings-switch-2">
                                <label class="form-check-label" for="settings-switch-2">Web browser push
                                    notifications</label>
                            </div>
                            <div class="form-check form-switch mb-3">
                                <input class="form-check-input" type="checkbox" id="settings-switch-3" checked>
                                <label class="form-check-label" for="settings-switch-3">Mobile push notifications</label>
                            </div>
                            <div class="form-check form-switch mb-3">
                                <input class="form-check-input" type="checkbox" id="settings-switch-4">
                                <label class="form-check-label" for="settings-switch-4">Lorem ipsum notifications</label>
                            </div>
                            <div class="form-check form-switch mb-3">
                                <input class="form-check-input" type="checkbox" id="settings-switch-5">
                                <label class="form-check-label" for="settings-switch-5">Lorem ipsum notifications</label>
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn app-btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div><!--//app-card-body-->
                </div><!--//app-card-->
            </div>
        </div><!--//row-->
        <hr class="my-4"> --}}
    </div>
@endsection
@push('js')
@endpush
