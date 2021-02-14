@extends('@dashboard._layouts.master')

@section('page_title') Update Permissions @endsection

@section('page_contents')

    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="key"></i></div>
                            Update Permissions
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main page content-->
    <div class="container mt-n10">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('permissions.update', $resource->uuid) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Update Permissions</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name" class="form-control" required placeholder="Name" value="{{ $resource->name }}"/>
                                    </div>

                                    <div class="form-group">
                                        <label>Permission Groups
                                            <span data-select2-target="permission_groups_update" class="select-all text-success btn-link">(Select All)</span>
                                            <span data-select2-target="permission_groups_update" class="de-select-all text-success btn-link">(Deselect All)</span>
                                        </label>
                                        <select name="permission_groups[]" style="width: 100%;height: 30px;" id="permission_groups_update" class="select2 select2-multiple" multiple="" data-placeholder="Choose ..." tabindex="-1" aria-hidden="true" required>
                                            @foreach($groups as $group)
                                                <option @if(in_array($group->id, $resource->permission_groups->pluck('id')->toArray() )) selected @endif value="{{ $group->uuid }}">{{ $group->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-warning" type="submit"><i class="fa fa-fw fa-save"></i> Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
