@section('title', $page_meta['title'])
@extends('layout.admin.layout')
@push('css')
@endpush
@section('content')

    <div class="container-xl">

        <div class="row g-3 mb-4 align-items-center justify-content-between">
            <div class="col-auto">
                <h1 class="app-page-title mb-0">{{ $page_meta['title'] }}</h1>
            </div>
            <div class="col-auto">
                <div class="page-utilities">
                    <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                        <div class="col-auto">

                            <div class="col-auto">
                                <input type="text" id="search-alumni" name="search" class="form-control search-orders"
                                    placeholder="Search">
                            </div>
                        </div>
                        <!--//col-->
                        <div class="col-auto">
                            <select id="select-length" class="form-select w-auto">
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                        </div>
                    </div>
                    <!--//row-->
                </div>
                <!--//table-utilities-->
            </div>
            <!--//col-auto-->
        </div>
        <!--//row-->

        <nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
            <a class="flex-sm-fill text-sm-center nav-link {{ request()->status == null ? 'active' : '' }}" id="statusAll"
                data-bs-toggle="tab" href="#" role="tab" aria-controls="orders-all" aria-selected="true">All</a>
            <a class="flex-sm-fill text-sm-center nav-link {{ request()->status == 'pending' ? 'active' : '' }}"
                id="statusPublish" data-bs-toggle="tab" href="#" role="tab" aria-controls="orders-all"
                aria-selected="true">Pending</a>
            <a class="flex-sm-fill text-sm-center nav-link {{ request()->status == 'unverified' ? 'active' : '' }}"
                id="statusArchived" data-bs-toggle="tab" href="#" role="tab" aria-controls="orders-all"
                aria-selected="true">Unverified</a>


        </nav>

        <div class="app-card app-card-orders-table shadow-sm mb-4">
            <div class="app-card-body">
                <div class="table-responsive">
                    <table id="tbl_list" class="table app-table-hover mb-0 w-100">
                        <thead>
                            <tr>
                                <th class="cell">No.</th>
                                <th class="cell">Profile</th>
                                <th class="cell">Nim</th>
                                <th class="cell">Nama</th>
                                <th class="cell">Email</th>
                                <th class="cell">Status</th>
                                <th class="cell">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($users) > 0)
                                @foreach ($users as $user)
                                    <tr>
                                        <td class="cell">{{ $loop->iteration }}</td>
                                        <td class="cell">
                                            <div data-bs-toggle="modal"
                                                data-bs-target="#previewThumbnail{{ $user->id }}"
                                                style="cursor: pointer;">
                                                @if ($user->image == null)
                                                    <img src="{{ asset('image/blank-user.png') }}" alt="{{ $user->name }}"
                                                        class="img-thumbnail" style="width:40px; height:40px">
                                                @else
                                                    <img src="{{ asset('storage/' . $user->image) }}"
                                                        alt="{{ $user->name }}" class="img-thumbnail"
                                                        style="width:70px; height:40px">
                                                @endif
                                            </div>
                                        </td>
                                        <td class="cell">{{ $user->nim }}</td>
                                        <td class="cell">{{ $user->name }}</td>
                                        <td class="cell">{{ $user->email }}</td>
                                        <td class="cell"><span
                                                class="badge bg-{{ $user->status == 'unverified' ? 'danger' : 'warning' }}">{{ $user->status == 'unverified' ? 'Unverifed' : 'Pending' }}</span>
                                        </td>
                                        <td class="cell">
                                            <div class="d-flex justify-content-start" style="gap:5px;">
                                                <a class="btn-sm app-btn-secondary"
                                                    href="{{ route('user.edit', $user->id) }}">View
                                                </a>
                                                @if ($user->status == 'pending')
                                                    <form action="{{ route('admin.verifikasi.alumni.update', $user->id) }}"
                                                        method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('put')
                                                        <button type="submit"
                                                            class="btn-sm  app-btn-secondary">Approved</button>
                                                    </form>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td class="text-center " colspan="6">... Tidak ditemukan ...</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <!--//table-responsive-->

            </div>
            <!--//app-card-body-->
        </div>
        <!--//app-card-->
        <nav class="app-pagination text-center">

        </nav>
        <!--//app-pagination-->

    </div>
    <!--//container-fluid-->
@endsection
@push('js')
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {

            let table = $('#tbl_list').DataTable({
                responsive: true,
            });

            $('#search-alumni').on('keyup', function() {
                table.search(this.value).draw();
            });

            $('#select-length').change(function() {
                var selectedLength = $(this).val();
                table.page.len(selectedLength).draw(); // Update the DataTable length
            });

            $('.dataTables_info').appendTo('.app-pagination');
            $('.dataTables_paginate').appendTo('.app-pagination');
        });
    </script>
@endpush
