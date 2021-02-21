@extends('@dashboard._layouts.master')

@section('page_title') Social @endsection

@section('page_contents')

    <!-- Page Heading -->
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="book"></i></div>
                            Socials ({{ $resources->count() }})
                        </h1>
                        <div class="page-header-subtitle">All Application Required Data</div>
                    </div>
                    <div class="col-12 col-xl-auto mt-4">
                        <a href="{{ route('social.create') }}" class="btn btn-sm btn-white">
                            <i class="mr-2 text-primary" data-feather="plus"></i> Add New
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main page content-->
    <div class="container mt-n10">
        <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">All</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Provider</th>
                            <th>Name</th>
                            <th>Link</th>
                            <th>Created at</th>
                            <th>Controls</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($resources as $resource)
                            <tr>
                                <td>{{ $resource->provider->name }}</td>
                                <td>{{ $resource->name }}</td>
                                <td>{{ $resource->link }}</td>
                                <td>{{ $resource->created_at }}</td>
                                <td>
                                    <a href="{{ route('social.edit' , [$resource->id]) }}" class="btn btn-warning btn-sm"><i class="fa fa-fw fa-edit"></i></a>
                                    <a href="{{ route('social.destroy' , [$resource->id]) }}" class="btn btn-danger btn-sm confirm-delete"><i class="fa fa-fw fa-trash"></i></a>
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
