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
        <div id="map" style="height: 400px;"></div>
    </div>
@endsection
@push('js')
    <script>
        let province = @json($sebaran);

        let provinceUser = @json($provinceUser)

        let listProvinceUser = province.filter(item => provinceUser.includes(parseInt(item.code, 10)));

        // console.log(tesLocation)
        let map = L.map('map').setView([-1.1742548, 116.6769313], 4.5);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

        listProvinceUser.map(function(value) {
            let marker = L.marker([value.coordinates.lat, value.coordinates.lng]).addTo(
                map);

            marker.bindPopup(`Provinsi : ${value.name}`).openPopup();
        });
    </script>
@endpush
