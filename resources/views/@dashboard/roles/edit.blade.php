@extends('@dashboard._layouts.master')

@section('page_title') Roles @endsection

@section('page_contents')

    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="key"></i></div>
                            Update Role
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
                <form action="{{ route('roles.update', $resource->uuid) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Update Permissions</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Role name</label>
                                        <input type="text" name="name" class="form-control" required placeholder="Role name" value="{{ $resource->name }}"/>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Class</label>
                                        <select name="class" id="class" class="form-control" data-placeholder="Choose ..." tabindex="-1" aria-hidden="true" required>
                                            @foreach(App\Enums\LabelClasses::$classes as $key => $class)
                                                <option @if($resource->class == $class) selected @endif value="{{ $class }}">{{ str_well($class) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Color</label>
                                        <input type="text" name="color" class="form-control" required placeholder="Color" value="{{ $resource->color }}"/>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Icon</label>
                                        <input type="text" name="icon" class="form-control" required placeholder="Icon" value="{{ $resource->icon }}"/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Permission Groups
                                    <span data-select2-target="permissions-groups_update" class="select-all text-success btn-link">(Select All)</span>
                                    <span data-select2-target="permissions-groups_update" class="de-select-all text-success btn-link">(Deselect All)</span>
                                </label>

                                <div style="border:1px solid #dddddd;padding: 10px;border-radius: 5px;">
                                    @foreach($permissions as $permission)
                                        <div class="text-primary mb-2">{{ str_well($permission->name) }}</div>
                                        <div class="row mb-2">
                                            @foreach($permission->permission_groups as $permission_group)
                                                <div class="col-md-3 all-checkbox">
                                                    <label for="{{ $permission_group->uuid }}.{{ $permission->uuid }}">
                                                        <input @if(in_array($permission->id, $resource->permissions->pluck('id')->toArray()) &&
                                                                    in_array($permission_group->id, $resource->permissionGroups->pluck('id')->toArray())) checked @endif

                                                        type="checkbox" name="permissions-groups[]"
                                                               id="{{ $permission_group->uuid }}.{{ $permission->uuid }}"
                                                               value="{{ $permission_group->uuid }}.{{ $permission->uuid }}">
                                                        {{ str_well($permission_group->name) }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endforeach
                                </div>

                                {{--<select name="permissions-groups[]" id="permissions-groups_update" class="select2 select2-multiple" multiple="" data-placeholder="Choose ..." tabindex="-1" aria-hidden="true" required>--}}
                                {{--@foreach($permissions as $permission)--}}
                                {{--@foreach($permission->permission_groups as $permission_group)--}}
                                {{--<option @if(in_array($permission->id, $resource->permissions->pluck('id')->toArray()) &&--}}
                                {{--in_array($permission_group->id, $resource->permissionGroups->pluck('id')->toArray())) selected @endif--}}
                                {{--value="{{ $permission_group->uuid }}.{{ $permission->uuid }}">{{ $permission_group->name }}.{{ $permission->name }}</option>--}}
                                {{--@endforeach--}}
                                {{--@endforeach--}}
                                {{--</select>--}}
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
