@extends('@dashboard._layouts.master')

@section('page_title') Lookup @endsection

@section('page_contents')

    <!-- Page Heading -->
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="book"></i></div>
                            Lookups ({{ $resources->count() }})
                        </h1>
                        <div class="page-header-subtitle">Parents ({{ $resources->where('parent_id', 0)->count() }}), Childes ({{ $resources->where('parent_id', '<>', 0)->count() }})</div>
                    </div>
                    <div class="col-12 col-xl-auto mt-4">
                        <a href="{{ route('lookup.create') }}" class="btn btn-sm btn-white">
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
            <div class="card-header">All Lookups</div>
            <div class="card-body">
                <div class="datatable">
                    <table class="table table-sm table-bordered table-hover" id="dataTable-lookup" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Parent id</th>
                            <th>Constraint</th>
                            <th>Key</th>
                            <th>Parent</th>
                            <th>Name</th>
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
                            <tr style="@if($resource->parent_id == 0) background-color:#eeeeee; @endif">
                                <td>{{ $resource->id }}</td>
                                <td>{{ $resource->parent_id }}</td>
                                <td>
                                    @if($resource->constraint_id != 0)
                                        {{ \App\Enums\LookupConstraints::$constraints[$resource->constraint_id][lang()] }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>{{ $resource->key }}</td>
                                <td>
                                    @if($resource->parent_id != 0)
                                        {{ getFromJson(\App\Models\Lookup::getOneBy('id', $resource->parent_id)->name , lang()) }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>{{ getFromJson($resource->name , lang()) }}</td>
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
                                    <a href="{{ route('lookup.edit' , [$resource->uuid]) }}" class="btn btn-datatable text-warning btn-icon btn-transparent-dark mr-2"><i data-feather="edit"></i></a>
                                    <a href="{{ route('lookup.destroy' , [$resource->uuid]) }}" class="btn btn-datatable text-danger btn-icon btn-transparent-dark confirm-delete"><i data-feather="trash-2"></i></a>
                                </td>
                            </tr>
                            @foreach($resource->child as $child)
                                <tr>
                                    <td>{{ $child->id }}</td>
                                    <td>{{ $child->parent_id }}</td>
                                    <td>
                                        @if($child->constraint_id != 0)
                                            {{ \App\Enums\LookupConstraints::$constraints[$child->constraint_id][lang()] }}
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>{{ $child->key }}</td>
                                    <td>
                                        @if($child->parent_id != 0)
                                            {{ getFromJson(\App\Models\Lookup::getOneBy('id', $child->parent_id)->name , lang()) }}
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>{{ getFromJson($child->name , lang()) }}</td>
                                    <td>
                                        @if($child->is_active == 1)
                                            <span class="badge badge-success badge-pill">Yes</span>
                                        @else
                                            <span class="badge badge-danger badge-pill">No</span>
                                        @endif
                                    </td>
                                    <td>{{ ($cb = $child->created_by_user)? $cb->name : '-' }}</td>
                                    <td>{{ ($ub = $child->updated_by_user)? $ub->name : '-' }}</td>
                                    <td>{{ $child->created_at }}</td>
                                    <td>{{ $child->updated_at }}</td>
                                    <td>
                                        <a href="{{ route('lookup.edit' , [$child->uuid]) }}" class="btn btn-datatable text-warning btn-icon btn-transparent-dark mr-2"><i data-feather="edit"></i></a>
                                        <a href="{{ route('lookup.destroy' , [$child->uuid]) }}" class="btn btn-datatable text-danger btn-icon btn-transparent-dark confirm-delete"><i data-feather="trash-2"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach
                        </tbody>
                    </table>
                </div>

{{--                <div class="mt-3">{{ $resources->links() }}</div>--}}
            </div>
        </div>
    </div>

@endsection

@section('footer_scripts')
    <script>
        $('#dataTable-lookup').dataTable({
            // "paging": false,
            // "info": false,
            "ordering": false,
            "pageLength": 50,
        });
    </script>
@endsection
