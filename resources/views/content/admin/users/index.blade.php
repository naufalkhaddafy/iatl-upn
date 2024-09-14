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
                            <form class="table-search-form row gx-1 align-items-center" action="{{ route('news.index') }}"
                                method="get">
                                <div class="col-auto">
                                    <input type="text" id="search-news" name="search" class="form-control search-orders"
                                        placeholder="Search" value="">
                                </div>
                                <div class="col-auto">
                                    <button type="submit" class="btn app-btn-secondary">Search</button>
                                </div>
                            </form>

                        </div><!--//col-->
                        <div class="col-auto">

                            <select id="paginate" class="form-select w-auto">
                                <option value="5">5
                                </option>
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="50">50</option>
                                <option value="100">100</option>

                            </select>
                        </div>
                        <div class="col-auto">
                            <a class="btn app-btn-primary" href="{{ route('user.create') }}">
                                <i class="fa fa-plus"></i>
                                Tambah {{ $page_meta['role'] }}
                            </a>
                            <a class="btn app-btn-secondary" href="{{ route('admin.export.alumni', 'xlsx') }}">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-download"
                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                    <path fill-rule="evenodd"
                                        d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                                </svg>
                                Download
                            </a>
                        </div>
                    </div><!--//row-->
                </div><!--//table-utilities-->
            </div><!--//col-auto-->
        </div><!--//row-->

        @if ($page_meta['role'] !== 'Admin')
            <nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
                <a class="flex-sm-fill text-sm-center nav-link active   " id="statusAll" data-bs-toggle="tab" href="#"
                    role="tab" aria-controls="orders-all" aria-selected="true">All</a>
                <a class="flex-sm-fill text-sm-center nav-link " id="statusPublish" data-bs-toggle="tab" href="#"
                    role="tab" aria-controls="orders-all" aria-selected="true">Premium</a>
                <a class="flex-sm-fill text-sm-center nav-link " id="statusArchived" data-bs-toggle="tab" href="#"
                    role="tab" aria-controls="orders-all" aria-selected="true">Non Premium</a>
            </nav>
        @endif

        <div class="app-card app-card-orders-table shadow-sm mb-4">
            <div class="app-card-body">
                <div class="table-responsive">
                    <table class="table app-table-hover mb-0 text-left">
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
                                        <td class="cell">{{ $loop->iteration + $users->firstItem() - 1 }}</td>
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
                                                class="badge bg-{{ $user->isPremium ? 'warning' : 'secondary' }}">{{ $user->isPremium ? 'Premium' : 'Non Premium' }}</span>
                                        </td>
                                        <td class="cell">
                                            <div class="d-flex" style="gap: 5px">
                                                <a class="btn-sm app-btn-secondary"
                                                    href="{{ route('user.edit', $user->id) }}">View</a>
                                                <a type="submit" class="btn-sm  app-btn-secondary-danger"
                                                    href="{{ route('user.destroy', $user->id) }}"
                                                    data-confirm-delete="true">Delete</a>
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
                </div><!--//table-responsive-->

            </div><!--//app-card-body-->
        </div><!--//app-card-->
        <nav class="app-pagination">
            {{ $users->links() }}
        </nav><!--//app-pagination-->

    </div><!--//container-fluid-->
@endsection
@push('js')
@endpush
