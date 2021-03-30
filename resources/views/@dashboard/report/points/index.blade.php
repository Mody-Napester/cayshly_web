@extends('@dashboard._layouts.master')

@section('page_title') Points @endsection

@section('page_contents')
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="book"></i></div>
                            Points ({{ $resources->sum('amount') }})
                        </h1>
                        <div class="page-header-subtitle">All Points Data</div>
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
                            <th>User</th>
                            <th>Amount</th>
                            <th>Reason</th>
                            <th>Product</th>
                            <th>Created at</th>
                            <th>Created at</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($resources as $resource)
                            <tr>
                                <td>{{ $resource->id }}</td>
                                <td>{{ $resource->user->name }}</td>
                                <td>{{ $resource->amount }}</td>
                                <td>{{ getFromJson(lookup('id', $resource->lookup_point_reason_id)->name, lang()) }}</td>
                                <td>
                                    @if(isset($resource->product))
                                        <a target="_blank" href="{{ route('public.product.show', $resource->product->slug) }}">
                                            {{ getFromJson($resource->product->name, lang()) }}
                                        </a>
                                    @endif
                                </td>
                                <td>{{ human_date($resource->created_at) }}</td>
                                <td>{{ custom_date($resource->created_at) }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
