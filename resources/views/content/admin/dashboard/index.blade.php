@section('title', 'Dashboard')
@extends('layout.admin.layout')
@push('css')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
@endpush
@section('content')
    <div id="dasboard" class="container-xl">
        <h1 class="app-page-title">Dashboard</h1>
        <div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">
            <div class="inner">
                <div class="app-card-body p-3 p-lg-4">
                    <h3 class="mb-3">Welcome, {{ auth()->user()->name }}!</h3>
                    <div class="row gx-5 gy-3">
                        <div class="col-12 col-lg-9">
                            <div>Portal Web Ikatan Alumni Teknik Lingkungan UPNVYK</div>
                        </div><!--//col-->
                    </div><!--//row-->
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div><!--//app-card-body-->

            </div><!--//inner-->
        </div><!--//app-card-->

        @if (auth()->user()->getRoleNames()[0] == 'admin')
            <div class="row g-4 mb-4">
                <div class="col-6 col-lg-3">
                    <div class="app-card app-card-stat shadow-sm h-100">
                        <div class="app-card-body p-3 p-lg-4">
                            <h4 class="stats-type mb-1">Alumni</h4>
                            <div class="stats-figure">
                                {{ count(App\Models\User::role('user')->where('status', 'verified')->get()) }}</div>
                            <div class="stats-meta text-success">
                                Open
                            </div>
                        </div><!--//app-card-body-->
                        <a class="app-card-link-mask" href="{{ route('admin.index.alumni') }}"></a>
                    </div><!--//app-card-->
                </div><!--//col-->

                <div class="col-6 col-lg-3">
                    <div class="app-card app-card-stat shadow-sm h-100">
                        <div class="app-card-body p-3 p-lg-4">
                            <h4 class="stats-type mb-1">News</h4>
                            <div class="stats-figure">{{ count(App\Models\News::all()) }}</div>
                            <div class="stats-meta text-success">
                                New
                            </div>
                        </div><!--//app-card-body-->
                        <a class="app-card-link-mask" href="{{ route('news.index') }}"></a>
                    </div><!--//app-card-->
                </div><!--//col-->
                <div class="col-6 col-lg-3">
                    <div class="app-card app-card-stat shadow-sm h-100">
                        <div class="app-card-body p-3 p-lg-4">
                            <h4 class="stats-type mb-1">Agenda</h4>
                            <div class="stats-figure">23</div>
                            <div class="stats-meta">
                                Open</div>
                        </div><!--//app-card-body-->
                        <a class="app-card-link-mask" href="#"></a>
                    </div><!--//app-card-->
                </div><!--//col-->
                <div class="col-6 col-lg-3">
                    <div class="app-card app-card-stat shadow-sm h-100">
                        <div class="app-card-body p-3 p-lg-4">
                            <h4 class="stats-type mb-1">Pengajuan Alumni</h4>
                            <div class="stats-figure">
                                {{ count(App\Models\User::role('user')->where('status', '!=', 'verified')->get()) }}</div>
                            <div class="stats-meta">New</div>
                        </div><!--//app-card-body-->
                        <a class="app-card-link-mask" href="{{ route('admin.verifikasi.alumni') }}"></a>
                    </div><!--//app-card-->
                </div><!--//col-->
            </div><!--//row-->
        @elseif(auth()->user()->getRoleNames()[0] == 'user')
            <div class="app-card p-4 shadow-sm mb-4">
                @if (auth()->user()->status == 'unverified')
                    <div class="alert alert-danger d-flex justify-content-between align-items-center flex-wrap"
                        role="alert">
                        <span class="fs-6"><x-bi-exclamation-circle-fill /> Lengkapi data pribadi anda untuk verifikasi
                            data
                            alumni</span>
                        <a class="btn app-btn-primary " href="{{ route('settings.profile') }}">Lengkapi</a>
                    </div>
                @elseif(auth()->user()->status == 'pending')
                    <div class="alert alert-warning" role="alert">
                        <span class="fs-6"><x-bi-exclamation-circle-fill /> Mohon ditunggu, proses verifikasi admin untuk
                            mengakses fitur yang tersedia</span>
                    </div>
                @endif
                <div class="row">
                    <div class="col-12 col-lg-6 mb-4">
                        <div class="row align-items-center gx-2 mb-4">
                            <div class="col-auto"><span class="app-icon-holder"><x-bi-person /></span></div>
                            <div class="col-auto">
                                <h1 class="fs-5 app-card-title">
                                    Data Alumni
                                </h1>
                            </div>
                        </div>
                        <div class="p-4 border rounded" style="height: 230px;">
                            <h1 class="fs-6">{{ auth()->user()->name }} <span
                                    class="text-info"><x-bi-patch-check /></span>
                            </h1>
                            <div class="detail-profil ">
                                <div class="pb-1"><x-bi-person-vcard /> {{ auth()->user()->nim }}</div>
                                <div class="py-1"><x-bi-envelope-paper /> {{ auth()->user()->email ?? '-' }} </div>
                                <div class="py-1"><x-bi-telephone-outbound /> {{ auth()->user()->phone_number ?? '-' }}
                                </div>
                                <div class="py-1"><x-bi-pin-map /> {{ auth()->user()->address_now ?? '-' }}
                                </div>
                                <div class="pt-1"><x-bi-pin-map-fill /> {{ auth()->user()->addressNow?->name }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 mb-4">
                        <div class="d-flex justify-content-between mb-4 align-items-center m-0">
                            <div class="row align-items-center gx-2">
                                <div class="col-auto"><span class="app-icon-holder"><x-bi-person-vcard /> </span></div>
                                <div class="col-auto">
                                    <h1 class="fs-5 app-card-title">Kartu
                                        Alumni
                                    </h1>
                                </div>
                            </div>
                            <div>
                                <button class="btn app-btn-secondary">
                                    <x-bi-printer />
                                    Cetak
                                </button>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center align-items-center" style="height: 230px;"
                            id="alumni-card">
                            @if (auth()->user()->status == 'verified')
                                <div class="position-relative d-inline-block">
                                    <img src="{{ asset('images/iatl-card.jpeg') }}" height="200px" width="350px"
                                        class="rounded shadow " alt="Kartu Alumni">
                                    <img src="{{ asset('storage/' . auth()->user()->image) }}"
                                        alt="{{ auth()->user()->name }}" width="65rem" height="76rem" id="foto-card"
                                        class="position-absolute rounded" style="left: 6%; top:33%">
                                    <div class="name-card position-absolute" style="left: 29%; top: 30%;">
                                        <p>{{ auth()->user()->name ?? '-' }}</p>
                                    </div>
                                    <div class="name-card position-absolute"
                                        style="left: 50%; top:40%; font-size:0.65rem">
                                        <p>{{ auth()->user()->nim ?? '-' }}</p>
                                    </div>
                                    <div class="name-card position-absolute"
                                        style="left: 50%; top: 47%; font-size:0.65rem">
                                        <p>{{ auth()->user()->email ?? '-' }}</p>
                                    </div>
                                    <div class="name-card position-absolute"
                                        style="left: 50%; top: 54%; font-size:0.65rem">
                                        <p>{{ auth()->user()->phone_number ?? '-' }}</p>
                                    </div>
                                    <div class="name-card position-absolute"
                                        style="left: 50%; top: 61%; font-size:0.60rem">
                                        <p>{{ auth()->user()?->address_now }}, {{ auth()->user()->addressNow?->name }}
                                            {{ auth()->user()->addressNow?->province->name }}
                                        </p>
                                    </div>

                                </div>
                            @else
                                <div class="text-center">
                                    <div id="loading-spinner" class="d-flex justify-content-center align-center p-2"
                                        style="gap: 5px;">
                                        <div class="spinner-grow text-primary" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                        <div class="spinner-grow text-secondary" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                        <div class="spinner-grow text-success" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                        <div class="spinner-grow text-danger" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                        <div class="spinner-grow text-warning" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                        <div class="spinner-grow text-info" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                    <span
                                        class="p-1 text-secondary">{{ auth()->user()->status == 'unverified' ? 'Lengkapi Data Pribadi Anda' : 'Menunggu Verifikasi Admin..' }}</span>
                                </div>
                            @endif


                        </div>
                    </div>
                </div>
                <div class="py-4">
                    <div class="row align-items-center gx-2 mb-4">
                        <div class="col-auto"><span class="app-icon-holder"><x-bi-pin-map /></span></div>
                        <div class="col-auto">
                            <h1 class="fs-5 app-card-title">
                                Sebaran Alumni Terdekat
                            </h1>
                        </div>
                    </div>
                    <div>
                        @if (auth()->user()->status == 'verified')
                            <div id="map" style="height: 400px;" class="rounded"></div>
                        @else
                            <div class="text-center">
                                <div id="loading-spinner" class="d-flex justify-content-center align-center p-2"
                                    style="gap: 5px;">
                                    <div class="spinner-grow text-primary" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                    <div class="spinner-grow text-secondary" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                    <div class="spinner-grow text-success" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                    <div class="spinner-grow text-danger" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                    <div class="spinner-grow text-warning" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                    <div class="spinner-grow text-info" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </div>
                                <span
                                    class="p-1 text-secondary">{{ auth()->user()->status == 'unverified' ? 'Lengkapi Data Pribadi Anda' : 'Menunggu Verifikasi Admin..' }}</span>
                            </div>
                        @endif
                    </div>
                    <div id="loading-spinner" class="d-none d-flex justify-content-center align-center p-5"
                        style="gap: 5px;">
                        <div class="spinner-grow text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <div class="spinner-grow text-secondary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <div class="spinner-grow text-success" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <div class="spinner-grow text-danger" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <div class="spinner-grow text-warning" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <div class="spinner-grow text-info" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                    <section id="detailAlumni" class="d-none container pt-5">
                        <h1 class="fs-5 text-center p-2" id="title-province"></h1>
                        <div id="list-alumni">
                            <div class="table-responsive">
                                <table class="table app-table-hover mb-0 text-left">
                                    <thead>
                                        <tr>
                                            <th class="cell">No.</th>
                                            <th class="cell">Nama</th>
                                            <th class="cell">Email</th>
                                            <th class="cell">No.HP</th>
                                            <th class="cell">Lokasi</th>

                                        </tr>
                                    </thead>
                                    <tbody id="alumni-data">

                                    </tbody>
                                </table>
                            </div><!--//table-responsive-->
                        </div>
                    </section>
                </div>
            </div>
        @endif
    </div>

@endsection
@push('js')
    <script>
        $(document).ready(function() {
            let regencies = @json($regencies);
            let alumniNearest = @json($alumniNearest);

            // console.log(alumniNearest);

            let alumniNearestArr = Object.values(alumniNearest)

            // console.log(alumniNearestArr);
            // console.log(typeof alumniNearestArr);

            function insertDotInMiddle(number) {
                let str = number.toString();
                let middleIndex = Math.floor(str.length / 2);
                return str.slice(0, middleIndex) + '.' + str.slice(middleIndex);
            }

            let addDotEveryRegencyCode = alumniNearestArr.map(function(data) {
                return insertDotInMiddle(data)
            })


            let sebaranNearest = regencies.filter(item => Object.values(addDotEveryRegencyCode).includes(item
                .code));

            let map = L.map('map').setView([-1.1742548, 116.6769313], 4.5);
            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

            sebaranNearest.map(function(value) {
                let marker = L.marker([value.coordinates.lat, value.coordinates.lng]).addTo(
                    map);
                let codeRegency = value.code.replace('.', '');

                $.get(`{{ url('/sebaran/alumni/regency/${codeRegency}') }}`, function(data) {
                    marker.bindPopup(
                        `<div class="text-center rounded">
                            <div class="card-header rounded">
                                <div class="bg-info text-white bold p-2">
                                    <b>${value.name}</b>
                                </div>
                            <div class="card-body p-2">
                                <div class="">Total Sebaran Alumni:</div>
                                <div class="fs-6 text-danger"><b>${data.total}</b></div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-success btn-sm text-white" onclick="userByRegency(${codeRegency}) "><i class="fa-solid fa-magnifying-glass"></i> Tampilkan</button>
                            </div>
                        </div>
                        `
                    );
                })
            });
        })

        function userByRegency(id) {
            $('#detailAlumni').addClass('d-none')
            $.ajax({
                type: 'GET',
                url: `{{ url('/sebaran/alumni/regency/${id}') }}`,
                beforeSend: function() {
                    $('#loading-spinner').removeClass('d-none');
                },
                success: function(data) {
                    let option = $("#alumni-data > tr");
                    for (let i = 0; i < option.length; i++) {
                        option[i].remove();
                    }
                    let j = 1;
                    $('#loading-spinner').addClass('d-none');
                    $('#title-province').text(`Data Sebaran Alumni ${data.regency}`)
                    $("#detailAlumni").removeClass('d-none');
                    data.users.map(function(user) {
                        $('#alumni-data').append(
                            `<tr>
                                <td class="cell">${j++}</td>
                                <td class="cell">${user.name}</td>
                                <td class="cell">${user.email}</td>
                                <td class="cell">${user.phone_number}</td>
                                <td class="cell">${user.address_now.name}</td>
                            </tr>
                            `
                        )
                    })
                    $('html, body').scrollTop($('#detailAlumni').offset().top);
                }
            })
        }
    </script>
@endpush
