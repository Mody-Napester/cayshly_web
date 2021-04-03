@extends('@dashboard._layouts.master')

@section('page_title') Users @endsection

@section('page_contents')

    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="key"></i></div>
                            Users ({{ \App\Models\User::count() }})
                        </h1>
                        <div class="page-header-subtitle">All Application Required Data</div>
                    </div>
                    <div class="col-12 col-xl-auto mt-4">
                        <a href="{{ route('user.create') }}" class="btn btn-sm btn-white">
                            <i class="mr-2 text-primary" data-feather="plus"></i> Add New
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main page content-->
    <div class="container mt-n10">
        <div class="card mb-4">
            <form action="#" method="get" enctype="multipart/form-data">
                @csrf

                <div class="card-header">Search and filter</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Name"/>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Email"/>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" name="phone" class="form-control" placeholder="Phone"/>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-col-form-label" for="is_active">Is Active</label>
                                <select style="width: 100%;" class="select2" id="is_active" name="is_active">
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card-footer">
                    <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-search"></i> Search</button>
                </div>
            </form>
        </div>

        <div class="card mb-4">
            <div class="card-header">All Users</div>
            <div class="card-body">
                <div class="datatable">
                    <table class="table table-responsive table-sm table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Control</th>
                            <th>Name</th>
                            <th>Parent</th>
                            <th>Points</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Roles</th>
                            <th>Active</th>
                            <th>Created by</th>
                            <th>Updated by</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($resources as $resource)
                            <tr>
                                <td>{{ $resource->id }}</td>
                                <td>
                                    <a href="{{ route('user.login_as' , [$resource->uuid]) }}" class="badge badge-warning badge-sm"><i data-feather="eye"></i></a>

                                    <a href="{{ route('user.edit' , [$resource->uuid]) }}" class="badge badge-primary badge-sm"><i data-feather="edit"></i></a>

                                    <a href="{{ route('user.destroy' , [$resource->uuid]) }}" class="badge badge-danger badge-sm confirm-delete"><i data-feather="trash-2"></i></a>
                                </td>
                                <td>{{ $resource->name }}</td>
                                <td>{{ ($resource->parent)? $resource->parent->name : '-' }}</td>
                                <td>{{ $resource->points()->sum('amount') }}</td>
                                <td>{{ $resource->email }}</td>
                                <td>{{ $resource->phone }}</td>
                                <td>
                                    @foreach ($resource->roles as $role)
                                    <span class="badge {{ $role->class }}">{{ $role->name }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    @if($resource->is_active == 1)
                                        <span class="badge badge-success badge-pill">Yes</span>
                                    @else
                                        <span class="badge badge-danger badge-pill">No</span>
                                    @endif
                                </td>
                                <td>{{ ($resource->createdBy)? $resource->createdBy->name : '-' }}</td>
                                <td>{{ ($resource->updatedBy)? $resource->updatedBy->name : '-' }}</td>
                                <td>{{ $resource->created_at }}</td>
                                <td>{{ $resource->updated_at }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                {{ $resources->appends(request()->input())->links() }}
            </div>
        </div>
    </div>

@endsection
