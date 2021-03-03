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
                            Orders ({{ $resources->count() }})
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
            <div class="card-header">All</div>
            <div class="card-body">
                <div class="datatable">
                    <table class="table table-sm table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
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
                            <th>Updated at</th>
                            <th>Actions</th>
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
                                <td> COD {{-- {{ getFromJson($resource->payment_method->name , lang()) }} --}} </td>
                                <td>{{ human_date($resource->created_at) }}</td>
                                <td>{{ $resource->created_at }}</td>
                                <td>{{ $resource->updated_at }}</td>
                                <td>
                                    <a href="{{ route('dashboard.order.details', $resource->uuid) }}" class="badge badge-warning">Details</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
