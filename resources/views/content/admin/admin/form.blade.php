@extends('layout.admin.layout')
@section('title', $page_meta['title'])
@push('css')
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
@endpush
@section('content')
    <div class="container-xl">
        {{-- <h1 class="app-page-title">{{ $page_meta['title'] }}</h1> --}}
        <div class="col-auto py-2">
            <h1 class="app-page-title mb-0">{{ $page_meta['title'] }}</h1>
            <h6 class="text-sm text-secondary my-2">{{ $page_meta['description'] }}</h6>
        </div>
        <div class="row gy-4">
            <form class="col-12" action="{{ $page_meta['url'] }}" enctype="multipart/form-data" method="post">
                @method($page_meta['method'])
                @csrf
                <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
                    <div class="app-card-header p-3 border-bottom-0">
                        <div class="row align-items-center gx-3">
                            <div class="col-auto">
                                <div class="app-icon-holder">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person"
                                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M10 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6 5c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                                    </svg>
                                </div><!--//icon-holder-->

                            </div><!--//col-->
                            <div class="col-auto">
                                <h4 class="app-card-title">Profile</h4>
                            </div><!--//col-->
                        </div><!--//row-->
                    </div><!--//app-card-header-->
                    <div class="app-card-body px-4 w-100">
                        <div class="row">
                            <div class="item border-bottom py-3 mb-2">
                                <div class="item-label mb-2"><strong>Photo</strong></div>
                                <div class="text-center">
                                    <div class="">
                                        @if ($user->image == null)
                                            <img id='imgPreview' class="rounded-circle"
                                                src="{{ asset('image/blank-user.png') }}" alt="{{ $user->name }}"
                                                width="150" height="150">
                                        @else
                                            <img id='imgPreview' class="rounded-circle"
                                                src="{{ asset('storage/' . $user->image) }}" alt="{{ $user->name }}"
                                                width="150" height="150">
                                        @endif
                                    </div>
                                    <div>
                                        <x-forms.error type="danger" :messages="$errors->get('image')" />
                                    </div>
                                    <div class="py-3">
                                        <label for="image" class="btn-sm app-btn-secondary cursor-pointer"><input
                                                type="file" id="image" name="image" hidden>Change</label>
                                        <label class="btn-sm app-btn-secondary-danger cursor-pointer"
                                            id="deleteImagePreview">Delete</label>
                                        <input type="hidden" name="deleteImage" id="deleteImage">
                                    </div>
                                </div>
                            </div><!--//item-->
                            <div class="col-lg-6 col-12">
                                <div class="item py-2">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col">
                                            <label for="name" class="form-label"><strong>Nama</strong><span
                                                    class="text-danger">*</span>
                                            </label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                id="name" name="name" placeholder="Masukan Nama.."
                                                value="{{ old('name', $user->name) }}">
                                            <x-forms.error type="danger" :messages="$errors->get('name')" />
                                        </div><!--//col-->

                                    </div><!--//row-->
                                </div><!--//item-->
                                <div class="item py-2">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col">
                                            <label for="email" class="form-label"><strong>Email</strong><span
                                                    class="text-danger">*</span>
                                            </label>
                                            <input type="text" class="form-control @error('email') is-invalid @enderror"
                                                id="email" name="email" placeholder="Masukan email.."
                                                value="{{ old('email', $user->email) }}">
                                            <x-forms.error type="danger" :messages="$errors->get('email')" />

                                        </div><!--//col-->
                                    </div><!--//row-->
                                </div><!--//item-->

                                <div class="item py-2">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col">
                                            <label for="phone_number" class="form-label"><strong>No.Hp</strong><span
                                                    class="text-danger">*</span>
                                            </label>
                                            <input type="number"
                                                class="form-control @error('phone_number') is-invalid @enderror"
                                                id="phone_number" name="phone_number" placeholder="Masukan No.Hp.."
                                                value="{{ old('phone_number', $user->phone_number) }}">
                                            <x-forms.error type="danger" :messages="$errors->get('phone_number')" />
                                        </div><!--//col-->
                                    </div><!--//row-->
                                </div><!--//item-->

                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="item py-2">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col">
                                            <label for="password" class="form-label"><strong>Password</strong><span
                                                    class="text-danger">*</span>
                                            </label>
                                            <input type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                id="password" name="password" placeholder="Masukan Password">
                                        </div><!--//col-->
                                    </div><!--//row-->
                                </div><!--//item-->
                                <div class="item py-2">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col">
                                            <label for="password_confimation" class="form-label"><strong>Konfirmasi
                                                    Password
                                                </strong><span class="text-danger">*</span>
                                            </label>
                                            <input type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                id="password_confirmation" name="password_confirmation" type="password"
                                                placeholder="Masukan Ulang Password">
                                            <x-forms.error type="danger" :messages="$errors->get('password')" />
                                        </div><!--//col-->
                                    </div><!--//row-->
                                </div><!--//item-->
                                @if ($page_meta['method'] == 'put')
                                    <div class="item py-2">
                                        <label class="text-danger font-bold"><strong>Silahkan masukan Password jika ingin
                                                mengganti
                                                Password !!!</strong></label>
                                    </div><!--//item-->
                                @endif
                            </div>
                        </div>

                    </div><!--//app-card-body-->
                    <div class="app-card-footer p-4 mt-auto d-flex justify-content-between align-content-center"
                        style="gap:10px;">
                        <a class="btn app-btn-secondary px-4" href="{{ route('admin.index.admin') }}">Kembali</a>
                        <button class="btn app-btn-primary px-4" type="submit">Simpan</button>
                    </div><!--//app-card-footer-->
                </div><!--//app-card-->
            </form>

        </div><!--//row-->

    </div><!--//container-fluid-->

@endsection
@push('js')
@endpush
