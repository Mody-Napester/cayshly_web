@extends('@dashboard._layouts.master')

@section('page_title') Category @endsection

@section('head_styles')
    <link rel="stylesheet" media="screen" href="{{ url('assets_dashboard/css/cartzilla.icons.css') }}">
@endsection

@section('page_contents')
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="book"></i></div>
                            Categories ({{ $resources->count() }})
                        </h1>
                        <div class="page-header-subtitle">All Application Required Data</div>
                    </div>
                    <div class="col-12 col-xl-auto mt-4">
                        <a href="{{ route('category.create') }}" class="btn btn-sm btn-white">
                            <i class="mr-2 text-primary" data-feather="plus"></i> Add New
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main page content-->
    <div class="container mt-n10">
        <!-- Example DataTable for Dashboard Demo-->
        <div class="card mb-4">
            <div class="card-header">Personnel Management</div>
            <div class="card-body">
                <div class="datatable">
                    <table class="table table-sm table-responsive table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Parent id</th>
                            <th>Slug</th>
                            <th>Parent</th>
                            <th>Name</th>
                            <th>Icon</th>
                            <th>Picture</th>
                            <th>Cover</th>
                            <th>Active</th>
                            <th>Created by</th>
                            <th>Updated by</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($resources as $resource)
                            <tr @if(!\App\Models\Category::getOneBy('id', $resource->parent_id)) class="" @endif>
                                <td>{{ $resource->id }}</td>
                                <td>{{ $resource->parent_id }}</td>
                                <td>{{ $resource->slug }}</td>
                                <td>
                                    @if($resource->parent_id != 0)
                                        {{ ($parent = \App\Models\Category::getOneBy('id', $resource->parent_id))? getFromJson($parent->name , lang()) : '-' }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>{{ getFromJson($resource->name , lang()) }}</td>
                                <td style="text-align: center"><i class="{{ $resource->icon }}"></i></td>
                                <td>
                                    <div style="width:50px;height: 50px;overflow: hidden">
                                        <img style="width:100%;" src="{{ url('assets_public/images/category/picture/'. $resource->picture) }}" alt="">
                                    </div>
                                </td>
                                <td>
                                    <div style="width:50px;height: 50px;overflow: hidden">
                                        <img style="width:100%;" src="{{ url('assets_public/images/category/cover/'. $resource->cover) }}" alt="">
                                    </div>
                                </td>
                                <td>
                                    @if($resource->is_active == 1)
                                        <span class="badge badge-success badge-pill">Yes</span>
                                    @else
                                        <span class="badge badge-danger badge-pill">No</span>
                                    @endif
                                </td>
                                <td>{{ ($cb = $resource->created_by_user)? $cb->name : '-' }}</td>
                                <td>{{ ($ub = $resource->updated_by_user)? $ub->name : '-' }}</td>
                                <td>{{ $resource->created_at }}</td>
                                <td>{{ $resource->updated_at }}</td>
                                <td>
                                    <a href="{{ route('category.edit' , [$resource->uuid]) }}" class="btn btn-datatable text-warning btn-icon btn-transparent-dark mr-2"><i data-feather="edit"></i></a>
                                    <a href="{{ route('category.destroy' , [$resource->uuid]) }}" class="btn btn-datatable text-danger btn-icon btn-transparent-dark confirm-delete"><i data-feather="trash-2"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                {{ $resources->links() }}
            </div>
        </div>
    </div>

@endsection
