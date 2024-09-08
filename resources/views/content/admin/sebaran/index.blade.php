@extends('layout.admin.layout')
@section('title', 'Sebaran Alumni')
@push('css')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
@endpush
@section('content')
    <div class="container-xl">
        <h1 class="app-page-title">Sebaran Alumni</h1>
        <div class="app-card app-card-account shadow-sm p-4">
            <div id="map" style="height: 400px; border-radius:15px" class=""></div>
            <div id="loading-spinner" class="d-none d-flex justify-content-center align-center p-5" style="gap: 5px;">
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
        </div><!--//app-card-->
    </div>
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            let province = @json($sebaran);

            let provinceUser = @json($provinceUser)

            let listProvinceUser = province.filter(item => Object.values(provinceUser).includes(parseInt(item.code,
                10)));
            let map = L.map('map').setView([-1.1742548, 116.6769313], 4.5);

            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

            listProvinceUser.map(function(value) {
                let marker = L.marker([value.coordinates.lat, value.coordinates.lng]).addTo(
                    map);
                $.get(`{{ url('/sebaran/alumni/${value.code}') }}`, function(data) {
                    marker.bindPopup(
                            `<div class="text-center rounded">
                                <div class="card-header rounded">
                                    <div class="bg-info text-white bold p-2">
                                        <b>Provinsi ${value.name}</b>
                                    </div>
                                <div class="card-body p-2">
                                    <div class="">Total Sebaran Alumni:</div>
                                    <div class="fs-6 text-danger"><b>${data.total}</b></div>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-success btn-sm text-white" onclick="userByProvince(${value.code}) "><i class="fa-solid fa-magnifying-glass"></i> Tampilkan</button>
                                </div>
                            </div>
                            `
                        )
                        .openPopup();
                })
            });
        })

        function userByProvince(id) {
            $('#detailAlumni').addClass('d-none')
            $.ajax({
                type: 'GET',
                url: `{{ url('/sebaran/alumni/${id}') }}`,
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
                    $('html, body').scrollTop($('#detailAlumni').offset().top);
                    $('#title-province').text(`Data Sebaran Alumni Provinsi ${data.province}`)
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
                }
            })
        }
    </script>
@endpush
