@extends('@dashboard._layouts.master')

@section('page_title') Product @endsection

@section('head_styles')
    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="{{ url('assets_dashboard/vendor/image_uploader/image-uploader.min.css') }}" rel="stylesheet" />
@endsection

@section('head_scripts')
    <script src="{{ url('assets_dashboard/vendor/ckeditor/ckeditor.js') }}"></script>
    <!-- provide the csrf token -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

@section('page_contents')

    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="book"></i></div>
                            Edit Product "{{ getFromJson($resource->name , lang()) }}"
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main page content-->
    <div class="container mt-n10">
        <form action="{{ route('product.update', $resource->uuid) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Update Product</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-col-form-label" for="brand_id">Brand</label>
                                        <select class="select2 form-control @error('brand_id') is-invalid @enderror" id="brand_id" name="brand_id">
                                            @foreach($brands as $brand)
                                                <option @if($resource->brand_id == $brand->id) selected @endif value="{{ $brand->uuid }}">{{ getFromJson($brand->name , lang()) }}</option>
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
                                        <select class="select2 form-control @error('store_id') is-invalid @enderror" id="store_id" name="store_id">
                                            @foreach($stores as $store)
                                                <option @if($resource->store_id == $store->id) selected @endif value="{{ $store->uuid }}">{{ $store->name }}</option>
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
                                        <select class="select2 form-control @error('lookup_condition_id') is-invalid @enderror" id="lookup_condition_id" name="lookup_condition_id">
                                            @foreach($conditions as $condition)
                                                <option @if($resource->lookup_condition_id == $condition->id) selected @endif value="{{ $condition->uuid }}">{{ getFromJson($condition->name , lang()) }}</option>
                                            @endforeach
                                        </select>

                                        @error('lookup_condition_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-col-form-label" for="is_active">Is Active</label>
                                        <select class="select2 form-control @error('is_active') is-invalid @enderror" id="is_active" name="is_active">
                                            <option @if($resource->is_active == 1) selected @endif value="1">Yes</option>
                                            <option @if($resource->is_active == 0) selected @endif value="0">No</option>
                                        </select>

                                        @error('is_active')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-col-form-label" for="price">Price</label>
                                        <input class="form-control @error('price') is-invalid @enderror "
                                               id="price"
                                               type="text" name="price"
                                               placeholder="Enter price .." value="{{ $resource->price }}">

                                        @error('price')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-col-form-label" for="code">Code</label>
                                        <input class="form-control @error('code') is-invalid @enderror "
                                               id="code"
                                               type="text" name="code"
                                               placeholder="Enter code .." value="{{ $resource->code }}">

                                        @error('code')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-col-form-label" for="discount_type">Discount Type</label>
                                        <select class="select2 form-control @error('discount_type') is-invalid @enderror" id="discount_type" name="discount_type">
                                            <option @if($resource->discount_type == 1) selected @endif value="1">No Discount</option>
                                            <option @if($resource->discount_type == 2) selected @endif value="2">Percentage (%)</option>
                                            <option @if($resource->discount_type == 3) selected @endif value="3">Amount (EGP)</option>
                                        </select>

                                        @error('discount_type')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-col-form-label" for="discount_unit">Discount Units</label>
                                        <input class="form-control @error('discount_unit') is-invalid @enderror "
                                               id="discount_unit"
                                               type="text" name="discount_unit"
                                               placeholder="Enter discount units .." value="{{ $resource->discount_unit }}">

                                        @error('discount_unit')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-col-form-label" for="warranty">Warranty</label>
                                        <input class="form-control @error('warranty') is-invalid @enderror "
                                               id="warranty"
                                               type="text" name="warranty"
                                               placeholder="Enter warranty .." value="{{ $resource->warranty }}">

                                        @error('warranty')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-col-form-label" for="video">Video</label>
                                        <input class="form-control @error('video') is-invalid @enderror "
                                               id="video"
                                               type="text" name="video"
                                               placeholder="Enter video .." value="{{ $resource->video }}">

                                        @error('video')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-col-form-label" for="picture_name">Picture Name</label>
                                        <input class="form-control @error('picture_name') is-invalid @enderror "
                                               id="picture_name"
                                               type="text" name="picture_name"
                                               placeholder="Enter picture name .." value="{{ $resource->picture }}">

                                        @error('picture_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-col-form-label" for="picture">Picture</label>
                                        <input class="form-control @error('picture') is-invalid @enderror" id="picture" type="file" name="picture">

                                        @error('picture')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-col-form-label" for="">Other Pictures</label>
                                        <div class="input-images"></div>

                                        @error('pictures')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                @foreach(langs("short_name") as $lang)
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-col-form-label" for="name_{{ $lang }}">Name ({{ $lang }})</label>
                                            <input class="form-control @error('name_'.$lang) is-invalid @enderror "
                                                   id="name_{{ $lang }}"
                                                   type="text" name="name_{{ $lang }}"
                                                   placeholder="Enter name_{{ $lang }} .." value="{{ getFromJson($resource->name , $lang) }}">

                                            @error('name_'.$lang)
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                @endforeach

                                @foreach(langs("short_name") as $lang)
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-col-form-label" for="details_{{ $lang }}">Details ({{ $lang }})</label>
                                            <textarea class="form-control @error('details_'.$lang) is-invalid @enderror "
                                                      id="details_{{ $lang }}" name="details_{{ $lang }}"
                                                      placeholder="Enter details_{{ $lang }} ..">{{ getFromJson($resource->details , $lang) }}</textarea>

                                            @error('details_'.$lang)
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror

                                            <script>
                                                CKEDITOR.replace( 'details_{{ $lang }}' );
                                            </script>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-col-form-label" for="category">Category</label>
                                        <select class="select2 form-control @error('category') is-invalid @enderror" multiple id="category" name="category[]">
                                            @foreach($categories as $category)
                                                <option @if(in_array($category->id, $resource->categories()->pluck('category_id')->toArray())) selected @endif value="{{ $category->uuid }}">{{ getFromJson($category->name , lang()) }}</option>
                                            @endforeach
                                        </select>

                                        @error('category')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-col-form-label" for="specifications">Specifications</label>
                                    <div id="specifications_container">
                                        @include('@dashboard.category._partials.specifications')
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-col-form-label" for="option">Options</label>
                                        <select class="select2 form-control @error('option') is-invalid @enderror" multiple id="option" name="option[]">
                                            @foreach($options as $option)
                                                <option @if(in_array($option->id, $product_options)) selected @endif value="{{ $option->uuid }}">{{ getFromJson($option->name , lang()) }}</option>
                                            @endforeach
                                        </select>

                                        @error('option')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-col-form-label" for="product_options">Product options</label>
                                    <div id="product_options">
                                        @include('@dashboard.option._partials.child')
                                    </div>
                                </div>
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


@endsection

@section('footer_scripts')
    <script src="{{ url('assets_dashboard/vendor/image_uploader/image-uploader.min.js') }}"></script>

    <script !src="">
        $(document).ready(function () {
            $('.input-images').imageUploader({
                label: 'Drag & Drop files here or click to browse',
                preloaded: [
                    @if($resource->images()->count() > 0)
                        @foreach($resource->images as $image)
                            {id: '{{ $image->uuid }}', src: '{{ url('assets_public/images/product/picture/'. $image->image) }}'},
                        @endforeach
                    @endif
                ],
                imagesInputName: 'pictures',
                preloadedInputName: 'prepictures',
            });

            $(document).on('change', '#category', function(){
                var categories = $(this).val();
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                console.log(categories);
                $.ajax({
                    url: "{{ route('category.specifications.index') }}",
                    type: 'post',
                    dataType: 'json',
                    data: {
                        _token: CSRF_TOKEN,
                        product : '{{ $resource->uuid }}',
                        categories : categories
                    },
                    beforeSend : function(){

                    },
                    success: function(data){
                        $('#specifications_container').html(data.view);
                    },
                    error: function(data){
                        console.log('Error');
                    }
                });
            });

            $('#category').trigger('change');

            $(document).on('change', '#option', function(){
                var options = $(this).val();
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                console.log(options);
                $.ajax({
                    url: "{{ route('option.child.index') }}",
                    type: 'post',
                    dataType: 'json',
                    data: {
                        _token: CSRF_TOKEN,
                        product : '{{ $resource->uuid }}',
                        options : options
                    },
                    beforeSend : function(){

                    },
                    success: function(data){
                        $('#product_options').html(data.view);
                    },
                    error: function(data){
                        console.log('Error');
                    }
                });
            });

            $('#option').trigger('change');
        });

        $(document).on('change', '#discount_type', function(){
            var discount_type = $(this).val();

            if(discount_type == 2 || discount_type == 3){
                $('#discount_unit').attr('disabled', false);
            }else{
                $('#discount_unit').attr('disabled', true);
            }

        });
    </script>
@endsection

