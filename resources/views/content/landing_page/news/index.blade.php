@extends('layout.landing_page.layout')
@section('title', 'Berita |')
@push('css')
@endpush
@section('content-landing-page')
    <section class="section hero has-bg-image" aria-label="home"
        style="background-image: url('{{ asset('images') }}/landing-page/hero-bg.jpg')">
    </section>
    <section class="min-h-100" style="height: 100vw">
        <div class="container">
            <p class="section-subtitle" id="project-label">Berita</p>
            <h2 class="h2 section-title">
                Coming Soon
            </h2>
        </div>
    </section>
@endsection
@push('js')
@endpush
