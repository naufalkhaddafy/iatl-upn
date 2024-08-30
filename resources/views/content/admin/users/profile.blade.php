@extends('layout.admin.layout')
@section('title', 'Profile')
@push('css')
@endpush
@section('content')
    <div class="container-xl">
        <h1 class="app-page-title">Account Settings</h1>
        <div class="row gy-4">
            <form class="col-12" action="{{ route('settings.profile.update', $user->id) }}" enctype="multipart/form-data" method="post">
                @method('put')
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
                                            <label for="nim" class="form-label"><strong>NIM</strong><span
                                                    class="text-danger">*</span>
                                            </label>
                                            <input type="text" class="form-control @error('nim') is-invalid @enderror"
                                                id="nim" name="nim" placeholder="Masukan nim.."
                                                value="{{ old('nim', $user->nim) }}">
                                            <x-forms.error type="danger" :messages="$errors->get('nim')" />

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
                                <div class="item py-2">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col">
                                            <label for="goal" class="form-label"><strong>Cita-Cita</strong><span
                                                    class="text-danger">*</span>
                                            </label>
                                            <input type="text" class="form-control @error('goal') is-invalid @enderror"
                                                id="goal" name="goal" placeholder="Masukan Cita-Cita.."
                                                value="{{ old('goal', $user->goal) }}">
                                            <x-forms.error type="danger" :messages="$errors->get('goal')" />

                                        </div><!--//col-->
                                    </div><!--//row-->
                                </div><!--//item-->
                                <div class="item py-2">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col">
                                            <label for="motto" class="form-label"><strong>Motto</strong><span
                                                    class="text-danger">*</span>
                                            </label>
                                            <textarea type="text" class="form-control @error('motto') is-invalid @enderror" id="motto" name="motto"
                                                placeholder="Masukan Motto.." style="height: auto;">{{ old('motto', $user->motto) }}</textarea>
                                            <x-forms.error type="danger" :messages="$errors->get('motto')" />
                                        </div><!--//col-->
                                    </div><!--//row-->
                                </div><!--//item-->
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="item py-2">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col">
                                            <label for="company_name" class="form-label"><strong>Perusahaan</strong><span
                                                    class="ms-2" data-bs-container="body" data-bs-toggle="popover"
                                                    data-bs-trigger="hover focus" data-bs-placement="top"
                                                    data-bs-content="Isi jika bekerja di salah satu perusahaan"><svg
                                                        width="1em" height="1em" viewBox="0 0 16 16"
                                                        class="bi bi-info-circle" fill="currentColor"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                            d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                        <path
                                                            d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z" />
                                                        <circle cx="8" cy="4.5" r="1" />
                                                    </svg></span></span>
                                            </label>
                                            <input type="text"
                                                class="form-control @error('company_name') is-invalid @enderror"
                                                id="company_name" name="company_name" placeholder="Masukan Perusahaan.."
                                                value="{{ old('company_name', $user->company_name) }}">
                                            <x-forms.error type="danger" :messages="$errors->get('company_name')" />

                                        </div><!--//col-->
                                    </div><!--//row-->
                                </div><!--//item-->
                                <div class="item py-2">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col">
                                            <label for="company_address" class="form-label"><strong>Alamat
                                                    Perusahaan</strong>
                                            </label>
                                            <input type="text"
                                                class="form-control @error('company_address') is-invalid @enderror"
                                                id="company_address" name="company_address"
                                                placeholder="Masukan Alamat Perusahaan"
                                                value="{{ old('company_address', $user->company_address) }}">
                                            <x-forms.error type="danger" :messages="$errors->get('company_address')" />
                                        </div><!--//col-->
                                    </div><!--//row-->
                                </div><!--//item-->
                                <div class="item py-2">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col">
                                            <label for="position" class="form-label"><strong>Jabatan</strong>
                                            </label>
                                            <input type="text"
                                                class="form-control @error('position') is-invalid @enderror"
                                                id="position" name="position" placeholder="Masukan Jabatan.."
                                                value="{{ old('position', $user->position) }}">
                                            <x-forms.error type="danger" :messages="$errors->get('position')" />
                                        </div><!--//col-->
                                    </div><!--//row-->
                                </div><!--//item-->
                            </div>
                        </div>

                    </div><!--//app-card-body-->
                    <div class="app-card-footer p-4 mt-auto">
                        <button class="btn app-btn-primary px-4" type="submit">Simpan</button>
                    </div><!--//app-card-footer-->
                </div><!--//app-card-->
            </form>
            <!--// Security -->
            <form class="col-12 col-lg-6" action="{{ route('settings.profile.update.password') }}"
                enctype="multipart/form-data" method="post">
                @method('put')
                @csrf
                <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">

                    <div class="app-card-header p-3 border-bottom-0">
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
                                <h4 class="app-card-title">Ganti Password</h4>
                            </div><!--//col-->
                        </div><!--//row-->
                    </div><!--//app-card-header-->
                    <div class="app-card-body px-4 w-100">
                        <div class="item py-2">
                            <div class="row justify-content-between align-items-center">
                                <div class="col">
                                    <label for="current_password" class="form-label"><strong>Password Lama</strong><span
                                            class="text-danger">*</span>
                                    </label>
                                    <input type="password"
                                        class="form-control @error('current_password') is-invalid @enderror"
                                        id="current_password" name="current_password"
                                        placeholder="Masukan Password Lama">
                                    <x-forms.error type="danger" :messages="$errors->get('current_password')" />
                                </div><!--//col-->
                            </div><!--//row-->
                        </div><!--//item-->
                        <div class="item py-2">
                            <div class="row justify-content-between align-items-center">
                                <div class="col">
                                    <label for="password" class="form-label"><strong>Password Baru</strong><span
                                            class="text-danger">*</span>
                                    </label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        id="password" name="password" placeholder="Masukan Password Baru">
                                </div><!--//col-->
                            </div><!--//row-->
                        </div><!--//item-->
                        <div class="item py-2">
                            <div class="row justify-content-between align-items-center">
                                <div class="col">
                                    <label for="password_confimation" class="form-label"><strong>Konfirmasi Password
                                            Baru</strong><span class="text-danger">*</span>
                                    </label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        id="password_confirmation" name="password_confirmation"
                                        placeholder="Masukan Ulang Password baru">
                                    <x-forms.error type="danger" :messages="$errors->get('password')" />
                                </div><!--//col-->
                            </div><!--//row-->
                        </div><!--//item-->
                    </div><!--//app-card-body-->
                    <div class="app-card-footer p-4 mt-auto">
                        <button type="submit" class="btn app-btn-primary px-4">Simpan</a>
                    </div><!--//app-card-footer-->
                </div><!--//app-card-->
            </form>
            <!--// Security End-->
        </div><!--//row-->

    </div><!--//container-fluid-->
@endsection
@push('js')
    <script>
        $('#image').on('change', function() {
            $('#deleteImage').val(null)
            file = this.files[0];
            if (file) {
                let reader = new FileReader();
                reader.onload = function(event) {
                    $("#imgPreview").removeClass('d-none').attr("src", event.target.result);
                };
                reader.readAsDataURL(file);
            }
        })

        $('#deleteImagePreview').on('click', function() {
            $('#imgPreview').attr("src", '{{ asset('image/blank-user.png') }}')
            $('#deleteImage').val(true)
            $('#image').val('');
        })
    </script>
@endpush
