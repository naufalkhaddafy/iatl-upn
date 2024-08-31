@section('title', 'News')
@extends('layout.admin.layout')
@push('css')
@endpush
@section('content')

    <div class="container-xl">

        <div class="row g-3 mb-4 align-items-center justify-content-between">
            <div class="col-auto">
                <h1 class="app-page-title mb-0">News/Artikel</h1>
            </div>
            <div class="col-auto">
                <div class="page-utilities">
                    <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                        <div class="col-auto">
                            <form class="table-search-form row gx-1 align-items-center" action="{{ route('news.index') }}"
                                method="get">
                                <div class="col-auto">
                                    <input type="text" id="search-news" name="search" class="form-control search-orders"
                                        placeholder="Search" value="{{ isset($search) ? $search : '' }}">
                                </div>
                                <div class="col-auto">
                                    <button type="submit" class="btn app-btn-secondary">Search</button>
                                </div>
                            </form>

                        </div><!--//col-->
                        <div class="col-auto">

                            <select id="paginate" class="form-select w-auto">
                                <option value="5" {{ Request()->paginate == 5 ? 'selected' : '' }}>5
                                </option>
                                <option value="10" {{ Request()->paginate == 10 ? 'selected' : '' }}>10</option>
                                <option value="20" {{ Request()->paginate == 20 ? 'selected' : '' }}>20</option>
                                <option value="50" {{ Request()->paginate == 50 ? 'selected' : '' }}>50</option>
                                <option value="100" {{ Request()->paginate == 50 ? 'selected' : '' }}>100</option>

                            </select>
                        </div>
                        <div class="col-auto">
                            <a class="btn app-btn-primary" href="{{ route('news.create') }}">
                                <i class="fa fa-plus"></i>
                                Tambah News
                            </a>
                        </div>
                    </div><!--//row-->
                </div><!--//table-utilities-->
            </div><!--//col-auto-->
        </div><!--//row-->


        <nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
            <a class="flex-sm-fill text-sm-center nav-link {{ request()->status == null ? 'active' : '' }}" id="statusAll"
                data-bs-toggle="tab" href="#" role="tab" aria-controls="orders-all" aria-selected="true">All</a>
            <a class="flex-sm-fill text-sm-center nav-link {{ request()->status == 'publish' ? 'active' : '' }}"
                id="statusPublish" data-bs-toggle="tab" href="#" role="tab" aria-controls="orders-all"
                aria-selected="true">Publish</a>
            <a class="flex-sm-fill text-sm-center nav-link {{ request()->status == 'archived' ? 'active' : '' }}"
                id="statusArchived" data-bs-toggle="tab" href="#" role="tab" aria-controls="orders-all"
                aria-selected="true">Archived</a>


        </nav>

        <div class="app-card app-card-orders-table shadow-sm mb-4">
            <div class="app-card-body">
                <div class="table-responsive">
                    <table class="table app-table-hover mb-0 text-left">
                        <thead>
                            <tr>
                                <th class="cell">No.</th>
                                <th class="cell">Thumbnail</th>
                                <th class="cell">Title</th>
                                <th class="cell">Dibuat Oleh</th>
                                <th class="cell">Date</th>
                                <th class="cell">Status</th>
                                <th class="cell"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($newss) > 0)
                                @foreach ($newss as $news)
                                    <tr>
                                        <td class="cell"> {{ $loop->iteration + $newss->firstItem() - 1 }}.</td>
                                        <td class="cell">
                                            <!-- Button trigger modal -->
                                            <div data-bs-toggle="modal"
                                                data-bs-target="#previewThumbnail{{ $news->id }}"
                                                style="cursor: pointer;">
                                                @if ($news->image == null)
                                                    <img src="{{ asset('image/blank-image.png') }}"
                                                        alt="{{ $news->title }}" class="img-thumbnail"
                                                        style="width:70px; height:40px">
                                                @else
                                                    <img src="{{ asset('storage/' . $news->image) }}"
                                                        alt="{{ $news->title }}" class="img-thumbnail"
                                                        style="width:70px; height:40px">
                                                @endif
                                            </div>
                                            <x-modal>
                                                <x-slot name="target">previewThumbnail{{ $news->id }}</x-slot>
                                                <x-slot name="type">modal-dialog modal-dialog-centered</x-slot>
                                                <x-slot name="title">Thumbnail Preview
                                                    {{ $news->title }}</x-slot>
                                                <x-slot name="body">
                                                    <div class="text-center">
                                                        @if ($news->image == null)
                                                            <img src="{{ asset('image/blank-image.png') }}"
                                                                alt="{{ $news->title }}" class="img-thumbnail img-fluid"
                                                                style="width: 300px">
                                                        @else
                                                            <img src="{{ asset('storage/' . $news->image) }}"
                                                                alt="{{ $news->title }}" class="img-thumbnail img-fluid "
                                                                style="width: 300px">
                                                        @endif
                                                    </div>
                                                    {{-- <p class="summernote">
                                                                {!! $news->description !!}
                                                            </p> --}}
                                                </x-slot>
                                                <x-slot name="footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                </x-slot>
                                            </x-modal>
                                        </td>
                                        <td class="cell"><span class="truncate">{{ $news->title }}</span></td>
                                        <td class="cell">{{ $news->user->name }}</td>
                                        <td class="cell">
                                            <span>{{ $news->created_at->format('d-M-Y') }}</span><span
                                                class="note">{{ $news->created_at->format('H:i') }}</span>
                                        </td>
                                        <td class="cell"><span
                                                class="badge bg-{{ $news->status->value == 'publish' ? 'primary' : 'warning' }}">{{ $news->status->name }}</span>
                                        </td>
                                        <td class="cell">
                                            <a class="btn-sm app-btn-secondary"
                                                href="{{ route('news.edit', $news->id) }}">View</a>
                                            <form action="{{ route('news.destroy', $news->id) }}" method="post"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn-sm  app-btn-secondary"
                                                    href="{{ route('user.destroy', $news->id) }}">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td class="text-center " colspan="7">... Tidak ditemukan ...</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div><!--//table-responsive-->

            </div><!--//app-card-body-->
        </div><!--//app-card-->
        <nav class="app-pagination">
            {{ $newss->links() }}
        </nav><!--//app-pagination-->

    </div><!--//container-fluid-->
@endsection
@push('js')
    <script type="text/javascript">
        const params = new URLSearchParams(window.location.search);
        let query = window.location.search
        const baseUrl = `{{ url('news') }}`
        console.log(window.location.href)

        let page = params.get('page');
        let search = params.get('search') ?? '';
        let paginate = params.get('paginate');

        // $(document).ready(function() {
        //     if (page !== null || search !== null || paginate !== null) {
        //         console.log(`${page} - ${search} - ${paginate}`);

        //     } else {
        //         console.log('null')
        //     }
        // });

        $("#paginate").on('change', function(e) {
            const limit = e.target.value;
            if (page == null && search == null) {
                endpoint = `${baseUrl}?paginate=${limit}`
                window.location.replace(endpoint);
            } else {
                endpoint = `${baseUrl}?search=${search}&paginate=${limit}&page=${page}`;
                window.location.replace(endpoint);
            }
        })

        $("#statusAll").on("click", function() {
            window.location.replace(baseUrl);
        })

        $("#statusPublish").on("click", function() {
            if (page == null || search == null || paginate == null) {
                endpoint = `${baseUrl}?status=publish`
                window.location.replace(endpoint);
            } else {
                endpoint = `${baseUrl}?status=publish&search=${search}&paginate=${limit}&page=${page}`;
                window.location.replace(endpoint);
            }
        })

        $("#statusArchived").on('click', function() {
            if (page == null || search == null || paginate == null) {
                endpoint = `${baseUrl}?status=archived`
                window.location.replace(endpoint);
            } else {
                endpoint = `${baseUrl}?status=archived&search=${search}&paginate=${limit}&page=${page}`;
                window.location.replace(endpoint);
            }
        })
    </script>
@endpush
