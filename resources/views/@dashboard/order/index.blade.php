@extends('@dashboard._layouts.master')

@section('page_title') Orders @endsection

@section('page_contents')
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="book"></i></div>
                            Orders ({{ \App\Models\Order::count() }})
                        </h1>
                        <div class="page-header-subtitle">All Application Required Data</div>
                    </div>
                    <div class="col-12 col-xl-auto mt-4">

                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main page content-->
    <div class="container mt-n10">
        <div class="card mb-4">
            <form action="#" method="get" enctype="multipart/form-data">

                <div class="card-header">Search and filter</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Order Number</label>
                                <input type="number" name="number" class="form-control" value="{{ (isset($_GET['number']))? $_GET['number'] : '' }}" placeholder="Number"/>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Order Date</label>
                                <input type="date" name="date" class="form-control" value="{{ (isset($_GET['date']))? $_GET['date'] : '' }}" placeholder="Date"/>
                            </div>
                        </div>

{{--                        <div class="col-md-3">--}}
{{--                            <div class="form-group">--}}
{{--                                <label>Ordered By</label>--}}
{{--                                <input type="text" name="by" class="form-control" value="{{ (isset($_GET['by']))? $_GET['by'] : '' }}" placeholder="Ordered By"/>--}}
{{--                            </div>--}}
{{--                        </div>--}}

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-col-form-label" for="status">Status</label>
                                <select style="width: 100%;" class="select2" id="status" name="status">
                                    <option value="Choose">Choose</option>
                                    <option {{ (isset($_GET['status']) && $_GET['status'] == 1)? 'selected' : '' }} value="1">Fully Delivered</option>
                                    <option {{ (isset($_GET['status']) && $_GET['status'] == 2)? 'selected' : '' }} value="2">Partially Delivered</option>
                                    <option {{ (isset($_GET['status']) && $_GET['status'] == 3)? 'selected' : '' }} value="3">Not Delivered</option>
                                </select>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card-footer">
                    <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-search"></i> Search</button>
                    <a href="{{ route('dashboard.order.index') }}" class="btn btn-warning">Reset</a>
                </div>
            </form>
        </div>

        <div class="card mb-4">
            <div class="card-header">All</div>
            <div class="card-body">
                <div class="datatable">
                    <table class="table table-sm table-bordered table-hover" id="datatable-custom" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Number</th>
                            <th>Created by</th>
                            <th>Address</th>
                            <th>Comments</th>
                            <th>Payment Method</th>
                            <th>Since</th>
                            <th>Created at</th>
                            <th>View</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($resources as $resource)
                            <tr>
                                <td>{{ $resource->id }}</td>
                                <td>{{ $resource->order_number }}</td>
                                <td>{{ ($cb = $resource->created_by_user)? $cb->name : '-' }}</td>
                                <td>{{ $resource->address_name }}</td>
                                <td>{{ $resource->comments }}</td>
                                <td>
                                    @if($resource->lookup_payment_method_id == 1)
                                        <span>Cash on delivery</span>
                                    @else
                                        <span>Redeem points</span>
                                    @endif
                                </td>
                                <td>{{ human_date($resource->created_at) }}</td>
                                <td>{{ custom_date($resource->created_at) }}</td>
                                <td>
                                    <a href="{{ route('dashboard.order.details', $resource->uuid) }}" class="badge badge-warning">Details</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-3">{{ $resources->appends($_GET)->links() }}</div>
            </div>
        </div>
    </div>

@endsection

@section('footer_scripts')
    <script>
        var tableDTUsers = $('#datatable-custom').DataTable({
            lengthChange: false,
            ordering: false,
            buttons: [
                {
                    extend: 'copyHtml5',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17]
                    }
                },
                {
                    extend: 'excelHtml5',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17]
                    }
                },
                {
                    extend: 'pdfHtml5',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17]
                    }
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17]
                    }
                }
            ],
        });
        tableDTUsers.buttons().container().appendTo('#datatable-users-buttons_wrapper .col-md-6:eq(0)');

    </script>
@endsection
