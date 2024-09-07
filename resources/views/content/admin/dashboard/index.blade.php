@section('title', 'Dashboard')
@extends('layout.admin.layout')
@push('css')
@endpush
@section('content')
    <div class="container-xl">
        <h1 class="app-page-title">Dashboard</h1>
        <div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">
            <div class="inner">
                <div class="app-card-body p-3 p-lg-4">
                    <h3 class="mb-3">Welcome, {{ auth()->user()->name }}!</h3>
                    <div class="row gx-5 gy-3">
                        <div class="col-12 col-lg-9">

                            <div>Portal Web Ikatan Alumni Teknik Lingkungan UPNVYK</div>
                        </div><!--//col-->
                        {{-- <div class="item p-3 col-7">
                            <div class="d-flex align-items-center">
                                <div class="col">
                                    <div class="title mb-1 ">Lengkapi Data Anda</div>
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 25%;"
                                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div><!--//col-->
                                <div class="col-auto">
                                    <a class="item-link-mask" href="{{ route('settings.profile') }}">
                                        <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-chevron-right"
                                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
                                        </svg>
                                    </a>
                                </div><!--//col-->
                            </div><!--//row-->
                        </div><!--//item--> --}}

                    </div><!--//row-->
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div><!--//app-card-body-->

            </div><!--//inner-->
        </div><!--//app-card-->

        <div class="row g-4 mb-4">
            <div class="col-6 col-lg-3">
                <div class="app-card app-card-stat shadow-sm h-100">
                    <div class="app-card-body p-3 p-lg-4">
                        <h4 class="stats-type mb-1">Alumni</h4>
                        <div class="stats-figure">{{ count(App\Models\User::role('user')->get()) }}</div>
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
                        <div class="stats-figure">6</div>
                        <div class="stats-meta">New</div>
                    </div><!--//app-card-body-->
                    <a class="app-card-link-mask" href="#"></a>
                </div><!--//app-card-->
            </div><!--//col-->
        </div><!--//row-->
    </div>

@endsection
@push('js')
@endpush
