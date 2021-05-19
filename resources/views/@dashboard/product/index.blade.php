@extends('@dashboard._layouts.master')

@section('page_title') Product @endsection

@section('page_contents')
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="book"></i></div>
                            Products ({{ \App\Models\Product::count() }})
                        </h1>
                        <div class="page-header-subtitle">All Application Required Data</div>
                    </div>
                    <div class="col-12 col-xl-auto mt-4">
                        <a href="{{ route('product.create') }}" class="btn btn-sm btn-white">
                            <i class="mr-2 text-primary" data-feather="plus"></i> Add New
                        </a>
                        <span class="btn btn-sm btn-success" data-toggle="modal" data-target="#import-file">
                            <i class="mr-2 text-white" data-feather="upload"></i> Import Excel
                        </span>
                        <a href="{{ route('product.export') }}" class="btn btn-sm btn-warning">
                            <i class="mr-2 text-white" data-feather="download"></i> Export Excel
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main page content-->
    <div class="container mt-n10">
        <div class="card mb-4">
            <form action="" method="get" enctype="multipart/form-data">
                @csrf

                <div class="card-header">Search and filter</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Brand</label>
                                <select class="select2 form-control" name="brand" id="brand">
                                    <option value="Choose">Choose</option>
                                    @foreach($brands as $brand)
                                    <option @if(isset($_GET['brand']) && $_GET['brand'] == $brand->id) selected @endif value="{{ $brand->id }}">{{ getFromJson($brand->name, lang()) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Store</label>
                                <select class="select2 form-control" name="store" id="store">
                                    <option value="Choose">Choose</option>
                                    @foreach($stores as $store)
                                    <option @if(isset($_GET['store']) && $_GET['store'] == $store->id) selected @endif value="{{ $store->id }}">{{ $store->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
{{--                        <div class="col-md-3">--}}
{{--                            <div class="form-group">--}}
{{--                                <label>Category</label>--}}
{{--                                <select class="select2 form-control" name="category" id="">--}}
{{--                                    <option value="Choose">Choose</option>--}}
{{--                                    @foreach($categories as $category)--}}
{{--                                        <option @if(isset($_GET['category']) && $_GET['category'] == $category->id) selected @endif value="{{ $category->id }}">{{ getFromJson($category->name, lang()) }}</option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Condition</label>
                                <select class="select2 form-control" name="condition" id="condition">
                                    <option value="Choose">Choose</option>
                                    @foreach($conditions as $condition)
                                    <option @if(isset($_GET['condition']) && $_GET['condition'] == $condition->id) selected @endif value="{{ $condition->id }}">{{ getFromJson($condition->name, lang()) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-col-form-label" for="is_active">Is Active</label>
                                <select class="select2 form-control @if(isset($_GET['is_active'])) is-invalid @enderror" id="is_active" name="is_active">
                                    <option value="Choose">Choose</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" value="{{ (isset($_GET['name']))? $_GET['name'] : '' }}" placeholder="Name"/>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Code</label>
                                <input type="text" name="code" class="form-control" value="{{ (isset($_GET['code']))? $_GET['code'] : '' }}" placeholder="Code"/>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Price</label>
                                <input type="text" name="price" class="form-control" value="{{ (isset($_GET['price']))? $_GET['price'] : '' }}" placeholder="Price"/>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="card-footer">
                    <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-search"></i> Search</button>
                    <a href="{{ route('product.index') }}" class="btn btn-warning">Reset</a>
                </div>
            </form>
        </div>

        <div class="card mb-4">
            <div class="card-header">All</div>
            <div class="card-body">
                <div class="datatable">
                    <table class="table table-sm table-responsive table-bordered table-hover" id="datatable-custom" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Actions</th>
                            <th>Brand</th>
                            <th>Category</th>
                            <th>Store</th>
                            <th>Slug</th>
                            <th>Name EN</th>
                            <th>Name AR</th>
                            <th>Code</th>
                            <th>Price</th>
                            <th>Points</th>
                            <th>Discount</th>
                            <th>Dis. Price</th>
                            <th>Condition</th>
                            <th>Warranty</th>
                            <th>Video</th>
                            <th>Views</th>
                            <th>Picture</th>
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
                                    <a href="{{ route('public.product.show' , [$resource->slug]) }}" target="_blank" class="btn btn-datatable text-warning btn-icon btn-transparent-dark mr-2"><i data-feather="eye"></i></a>
                                    <a href="{{ route('product.edit' , [$resource->uuid]) }}" class="btn btn-datatable text-warning btn-icon btn-transparent-dark mr-2"><i data-feather="edit"></i></a>
                                    <a href="{{ route('product.destroy' , [$resource->uuid]) }}" class="btn btn-datatable text-danger btn-icon btn-transparent-dark confirm-delete"><i data-feather="trash-2"></i></a>
                                </td>
                                <td>{{ (isset($resource->brand))? getFromJson( $resource->brand->name , lang()) : '-' }}</td>
                                <td>
                                    @if($resource->categories)
                                        @foreach($resource->categories as $category)
                                            <span class="badge badge-primary">{{ getFromJson( $category->name , lang()) }}</span>
                                        @endforeach
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>{{ (isset($resource->store))? $resource->store->name : '-' }}</td>
                                <td>{{ $resource->slug }}</td>
                                <td>{{ getFromJson($resource->name , 'en') }}</td>
                                <td>{{ getFromJson($resource->name , 'ar') }}</td>
                                <td>{{ $resource->code }}</td>
                                <td>{{ $resource->price }}</td>
                                <td>{{ $resource->points }}</td>
                                <td>
                                    <span class="text-danger font-weight-bold">{{ getProductAfterDiscount($resource)['discount'] }}</span>
                                </td>
                                <td>
                                    <span class="text-danger font-weight-bold">{{ getProductAfterDiscount($resource)['price'] }}</span>
                                </td>
                                <td>{{ getFromJson( $resource->condition->name , lang()) }}</td>
                                <td>{{ $resource->warranty }}</td>
                                <td>{{ $resource->video }}</td>
                                <td>{{ $resource->views }}</td>
                                <td>
                                    <div style="width:50px;height: 50px;overflow: hidden">
                                        <img style="width:100%;" src="{{ url('assets_public/images/product/picture/'. $resource->picture) }}" alt="">
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
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                {{ $resources->appends($_GET)->links() }}
            </div>
        </div>
    </div>

@endsection

@section('modals')
    <div class="modal fade" id="import-file" tabindex="-1" role="dialog" aria-labelledby="import-file" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Import File</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <a href="{{ url('assets_dashboard/files/templates/products-template.xlsx') }}" download type="button" class="btn btn-sm btn-success"><i class="mr-2" data-feather="download"></i> Download template</a>
                    <hr>
                    <form action="{{ route('product.import') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-col-form-label" for="brand_id">Brand</label>
                                    <select style="width: 100%;" class="select2 form-control @error('brand_id') is-invalid @enderror" id="brand_id" name="brand_id">
                                        @foreach($brands as $brand)
                                            <option value="{{ $brand->uuid }}">{{ getFromJson($brand->name , lang()) }}</option>
                                        @endforeach
                                    </select>

                                    @error('brand_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-col-form-label" for="store_id">Store</label>
                                    <select style="width: 100%;" class="select2 form-control @error('store_id') is-invalid @enderror" id="store_id" name="store_id">
                                        @foreach($stores as $store)
                                            <option value="{{ $store->uuid }}">{{ $store->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('store_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-col-form-label" for="lookup_condition_id">Condition</label>
                                    <select style="width: 100%;" class="select2 form-control @error('lookup_condition_id') is-invalid @enderror" id="lookup_condition_id" name="lookup_condition_id">
                                        @foreach($conditions as $condition)
                                            <option value="{{ $condition->uuid }}">{{ getFromJson($condition->name , lang()) }}</option>
                                        @endforeach
                                    </select>

                                    @error('lookup_condition_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-col-form-label" for="category">Category</label>
                                    <select style="width: 100%;" class="select2 form-control @error('category') is-invalid @enderror" multiple id="category" name="category[]">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->uuid }}">{{ getFromJson($category->name , lang()) }}</option>
                                        @endforeach
                                    </select>

                                    @error('category')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Please choose excel file:</label>
                                    <input type="file" name="file" required accept=".xls,.xlsx" class="form-control @error('file') is-invalid @enderror">

                                    @error('file')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="text-right">
                            <button type="button" class="btn btn-sm btn-warning" data-dismiss="modal">Close</button>

                            <button type="submit" class="btn btn-sm btn-primary">Import</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer_scripts')
    <script !src="">
        $(document).ready(function() {
            $('#datatable-custom').DataTable( {
                "paging":   false,
                "ordering": false,
                "info":     false
            } );
        } );
    </script>
@endsection
