@extends('layout.admin.layout')
@section('title', $page_meta['title'])
@push('css')
@endpush
@section('content')
    <div class="container-xl position-relative">
        <div class="row g-3 mb-4 align-items-center justify-content-between">
            <div class="col-auto">
                <h1 class="app-page-title mb-0">{{ $page_meta['title'] }}</h1>
                <h6 class="text-sm text-secondary my-2">{{ $page_meta['description'] }}</h6>
            </div>
            <div class="app-card app-card-settings shadow-sm p-4">
                <div class="app-card-header mb-4 border-bottom-0">
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
                <div class="app-card-body">
                    <form class="settings-form" method="POST" action="{{ $page_meta['url'] }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method($page_meta['method'])
                        <div class="mb-3">
                            <label for="status" class="form-label">Foto Profil</label>
                            @if ($user->image)
                                <div class="position-relative">
                                    <img src="{{ asset('storage/' . $user->image) }}" alt="{{ $user->title }}"
                                        class="img-thumbnail img-size">
                                </div>
                            @else
                                <div id="avatar-profile" class="d-block inline-block text-center">
                                    <figure class="">
                                        <img src="{{ asset('image/blank-user.png') }}" alt="blank-image"
                                            class="img-thumbnail rounded-circle" style="width:200px; height:200px">
                                    </figure>
                                    <div class="">
                                        <button type="button" class="btn btn-warning text-white">Edit</button>
                                        <button type="button" class="btn btn-danger text-white">Hapus</button>
                                    </div>
                                </div>
                            @endif
                            <x-forms.error type="danger" :messages="$errors->get('image')" />
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama<span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" placeholder="Masukan Nama Alumni.."
                                value="{{ $page_meta['method'] == 'put' ? $user->name : '' }}">
                            <x-forms.error type="danger" :messages="$errors->get('name')" />
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Nim<span class="text-danger">*</span>
                            </label>
                            <input type="number" class="form-control @error('nim') is-invalid @enderror" id="nim"
                                name="nim" placeholder="Masukan NIM Alumni.."
                                value="{{ $page_meta['method'] == 'put' ? $user->nim : '' }}">
                            <x-forms.error type="danger" :messages="$errors->get('nim')" />
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email<span class="text-danger">*</span></label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                name="email" placeholder="Masukan Email Alumni.."
                                value="{{ $page_meta['method'] == 'put' ? $user->email : '' }}">
                            <x-forms.error type="danger" :messages="$errors->get('email')" />
                        </div>

                        <div class="app-card-header my-4 border-bottom-0">
                            <div class="row align-items-center gx-3">
                                <div class="col-auto">
                                    <div class="app-icon-holder">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-shield-check"
                                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M5.443 1.991a60.17 60.17 0 0 0-2.725.802.454.454 0 0 0-.315.366C1.87 7.056 3.1 9.9 4.567 11.773c.736.94 1.533 1.636 2.197 2.093.333.228.626.394.857.5.116.053.21.089.282.11A.73.73 0 0 0 8 14.5c.007-.001.038-.005.097-.023.072-.022.166-.058.282-.111.23-.106.525-.272.857-.5a10.197 10.197 0 0 0 2.197-2.093C12.9 9.9 14.13 7.056 13.597 3.159a.454.454 0 0 0-.315-.366c-.626-.2-1.682-.526-2.725-.802C9.491 1.71 8.51 1.5 8 1.5c-.51 0-1.49.21-2.557.491zm-.256-.966C6.23.749 7.337.5 8 .5c.662 0 1.77.249 2.813.525a61.09 61.09 0 0 1 2.772.815c.528.168.926.623 1.003 1.184.573 4.197-.756 7.307-2.367 9.365a11.191 11.191 0 0 1-2.418 2.3 6.942 6.942 0 0 1-1.007.586c-.27.124-.558.225-.796.225s-.526-.101-.796-.225a6.908 6.908 0 0 1-1.007-.586 11.192 11.192 0 0 1-2.417-2.3C2.167 10.331.839 7.221 1.412 3.024A1.454 1.454 0 0 1 2.415 1.84a61.11 61.11 0 0 1 2.772-.815z" />
                                            <path fill-rule="evenodd"
                                                d="M10.854 6.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 8.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                        </svg>
                                    </div><!--//icon-holder-->

                                </div><!--//col-->
                                <div class="col-auto">
                                    <h4 class="app-card-title">Security</h4>
                                </div><!--//col-->
                            </div><!--//row-->
                        </div><!--//app-card-header-->
                        <div class="mb-3">
                            <label for="password" class="form-label">Password<span class="text-danger">*</span></label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                id="password" name="password" placeholder="Masukan Password Alumni..">
                            <x-forms.error type="danger" :messages="$errors->get('password')" />
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Konfirmasi Password<span
                                    class="text-danger">*</span></label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                id="password_confirmation" name="password_confirmation"
                                placeholder="Masukan Konfirmasi Password Alumni..">
                            <x-forms.error type="danger" :messages="$errors->get('password')" />
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('user.index') }}" class="btn app-btn-secondary">Kembali</a>
                            <button type="submit" class="btn app-btn-primary px-3">Simpan</button>
                        </div>
                    </form>
                </div><!--//app-card-body-->

            </div><!--//app-card-->
        </div><!--//row-->

    </div><!--//container-fluid-->
@endsection
@push('js')
@endpush
