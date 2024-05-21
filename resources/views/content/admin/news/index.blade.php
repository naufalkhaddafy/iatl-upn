@section('title', 'News')
@extends('layout.admin.layout')
@push('css')
@endpush
@section('content')

    <div class="container-xl">

        <div class="row g-3 mb-4 align-items-center justify-content-between">
            <div class="col-auto">
                <h1 class="app-page-title mb-0">News/Article</h1>
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
                                <option value="">All</option>

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
            <a class="flex-sm-fill text-sm-center nav-link active {{ request()->status == 'All' ? 'active' : '' }}"
                id="orders-all-tab" data-bs-toggle="tab" href="#orders-all" role="tab" aria-controls="orders-all"
                aria-selected="true">All</a>
            <a class="flex-sm-fill text-sm-center nav-link" id="news-publish-tab" data-bs-toggle="tab" href="#news-publish"
                role="tab" aria-controls="news-publish" aria-selected="false">Publish</a>
            <a class="flex-sm-fill text-sm-center nav-link {{ request()->status == 'archived' ? 'active' : '' }}"
                id="news-archived-tab" data-bs-toggle="tab" href="#news-archived" role="tab"
                aria-controls="news-archived" aria-selected="false">Archived</a>
        </nav>


        <div class="tab-content" id="orders-table-tab-content">
            <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                <div class="app-card app-card-orders-table shadow-sm mb-5">
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
                                                <td class="cell">{{ $loop->iteration + $newss->firstItem() - 1 }}</td>
                                                <td class="cell">
                                                    <img src="{{ asset('image/blank-user.png') }}" alt=""
                                                        style="width:40px; height:40px">
                                                </td>
                                                <td class="cell"><span class="truncate">{{ $news->title }}</span></td>
                                                <td class="cell">{{ $news->user->name }}</td>
                                                <td class="cell">
                                                    <span>{{ $news->created_at->format('d-M-Y') }}</span><span
                                                        class="note">{{ $news->created_at->format('H:i') }}</span>
                                                </td>
                                                <td class="cell"><span
                                                        class="badge bg-success">{{ $news->status }}</span>
                                                </td>
                                                <td class="cell">
                                                    <div class="actions">
                                                        <div class="dropdown">
                                                            <div class="dropdown-toggle no-toggle-arrow"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                                <svg width="1em" height="1em" viewBox="0 0 16 16"
                                                                    class="bi bi-three-dots-vertical" fill="currentColor"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path fill-rule="evenodd"
                                                                        d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                                                                </svg>
                                                            </div><!--//dropdown-toggle-->
                                                            <ul class="dropdown-menu">
                                                                <li><a class="dropdown-item" href="#"><svg
                                                                            width="1em" height="1em"
                                                                            viewBox="0 0 16 16" class="bi bi-eye me-2"
                                                                            fill="currentColor"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path fill-rule="evenodd"
                                                                                d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.134 13.134 0 0 0 1.66 2.043C4.12 11.332 5.88 12.5 8 12.5c2.12 0 3.879-1.168 5.168-2.457A13.134 13.134 0 0 0 14.828 8a13.133 13.133 0 0 0-1.66-2.043C11.879 4.668 10.119 3.5 8 3.5c-2.12 0-3.879 1.168-5.168 2.457A13.133 13.133 0 0 0 1.172 8z" />
                                                                            <path fill-rule="evenodd"
                                                                                d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                                                        </svg>View</a></li>
                                                                <li><a class="dropdown-item" href="#"><svg
                                                                            width="1em" height="1em"
                                                                            viewBox="0 0 16 16" class="bi bi-pencil me-2"
                                                                            fill="currentColor"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path fill-rule="evenodd"
                                                                                d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5L13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175l-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                                                        </svg>Edit</a></li>
                                                                <li><a class="dropdown-item" href="#"><svg
                                                                            width="1em" height="1em"
                                                                            viewBox="0 0 16 16"
                                                                            class="bi bi-download me-2"
                                                                            fill="currentColor"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path fill-rule="evenodd"
                                                                                d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                                                            <path fill-rule="evenodd"
                                                                                d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                                                                        </svg>Download</a></li>
                                                                <li>
                                                                    <hr class="dropdown-divider">
                                                                </li>
                                                                <li><a class="dropdown-item" href="#"><svg
                                                                            width="1em" height="1em"
                                                                            viewBox="0 0 16 16" class="bi bi-trash me-2"
                                                                            fill="currentColor"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path
                                                                                d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                                            <path fill-rule="evenodd"
                                                                                d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                                                        </svg>Delete</a></li>
                                                            </ul>
                                                        </div><!--//dropdown-->
                                                    </div>
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

            </div><!--//tab-pane-->

            <div class="tab-pane fade" id="news-publish" role="tabpanel" aria-labelledby="news-publish-tab">
                <div class="app-card app-card-orders-table mb-5">
                    <div class="app-card-body">
                        <div class="table-responsive">

                            <table class="table mb-0 text-left">
                                <thead>
                                    <tr>
                                        <th class="cell">Order</th>
                                        <th class="cell">Product</th>
                                        <th class="cell">Customer</th>
                                        <th class="cell">Date</th>
                                        <th class="cell">Status</th>
                                        <th class="cell">Total</th>
                                        <th class="cell"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="cell">#15346</td>
                                        <td class="cell"><span class="truncate">Lorem ipsum dolor sit amet eget volutpat
                                                erat</span></td>
                                        <td class="cell">John Sanders</td>
                                        <td class="cell"><span>17 Oct</span><span class="note">2:16 PM</span></td>
                                        <td class="cell"><span class="badge bg-success">Paid</span></td>
                                        <td class="cell">$259.35</td>
                                        <td class="cell"><a class="btn-sm app-btn-secondary" href="#">View</a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="cell">#15344</td>
                                        <td class="cell"><span class="truncate">Pellentesque diam imperdiet</span></td>
                                        <td class="cell">Teresa Holland</td>
                                        <td class="cell"><span class="cell-data">16 Oct</span><span
                                                class="note">01:16 AM</span></td>
                                        <td class="cell"><span class="badge bg-success">Paid</span></td>
                                        <td class="cell">$123.00</td>
                                        <td class="cell"><a class="btn-sm app-btn-secondary" href="#">View</a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="cell">#15343</td>
                                        <td class="cell"><span class="truncate">Vestibulum a accumsan lectus sed mollis
                                                ipsum</span></td>
                                        <td class="cell">Jayden Massey</td>
                                        <td class="cell"><span class="cell-data">15 Oct</span><span class="note">8:07
                                                PM</span></td>
                                        <td class="cell"><span class="badge bg-success">Paid</span></td>
                                        <td class="cell">$199.00</td>
                                        <td class="cell"><a class="btn-sm app-btn-secondary" href="#">View</a>
                                        </td>
                                    </tr>


                                    <tr>
                                        <td class="cell">#15341</td>
                                        <td class="cell"><span class="truncate">Morbi vulputate lacinia neque et
                                                sollicitudin</span></td>
                                        <td class="cell">Raymond Atkins</td>
                                        <td class="cell"><span class="cell-data">11 Oct</span><span
                                                class="note">11:18 AM</span></td>
                                        <td class="cell"><span class="badge bg-success">Paid</span></td>
                                        <td class="cell">$678.26</td>
                                        <td class="cell"><a class="btn-sm app-btn-secondary" href="#">View</a>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div><!--//table-responsive-->
                    </div><!--//app-card-body-->
                </div><!--//app-card-->
            </div><!--//tab-pane-->

            <div class="tab-pane fade" id="news-archived" role="tabpanel" aria-labelledby="news-archived-tab">
                <div class="app-card app-card-orders-table mb-5">
                    <div class="app-card-body">
                        <div class="table-responsive">
                            <table class="table mb-0 text-left">
                                <thead>
                                    <tr>
                                        <th class="cell">Order</th>
                                        <th class="cell">Product</th>
                                        <th class="cell">Customer</th>
                                        <th class="cell">Date</th>
                                        <th class="cell">Status</th>
                                        <th class="cell">Total</th>
                                        <th class="cell"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="cell">#15345</td>
                                        <td class="cell"><span class="truncate">Consectetur adipiscing elit</span></td>
                                        <td class="cell">Dylan Ambrose</td>
                                        <td class="cell"><span class="cell-data">16 Oct</span><span
                                                class="note">03:16 AM</span></td>
                                        <td class="cell"><span class="badge bg-warning">Pending</span></td>
                                        <td class="cell">$96.20</td>
                                        <td class="cell"><a class="btn-sm app-btn-secondary" href="#">View</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div><!--//table-responsive-->
                    </div><!--//app-card-body-->
                </div><!--//app-card-->
            </div><!--//tab-pane-->

        </div><!--//tab-content-->



    </div><!--//container-fluid-->
@endsection
@push('js')
    <script type="text/javascript">
        const params = new URLSearchParams(window.location.search);
        let query = window.location.search
        const baseUrl = `{{ url('news') }}`
        console.log(window.location.href)

        let page = params.get('page');
        let search = params.get('search');
        let paginate = params.get('paginate');

        $(document).ready(function() {
            if (page !== null || search !== null || paginate !== null) {
                console.log(`${page} - ${search} - ${paginate}`);

            } else {
                console.log('null')
            }
        });

        // $("#paginate").on('change', function(e) {
        //     const limit = e.target.value;
        //     if (page == null && search == null) {
        //         endpoint = `${baseUrl}?paginate=${limit}`
        //         window.location.replace(endpoint);
        //     } else {
        //         endpoint = `${baseUrl}?search=${search}&paginate=${limit}&page=${page}`;
        //         window.location.replace(endpoint);
        //     }
        // })
    </script>
@endpush
