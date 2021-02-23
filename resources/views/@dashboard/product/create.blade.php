@extends('@dashboard._layouts.master')

@section('page_title') Product @endsection

@section('head_scripts')
    <script src="{{ url('assets_dashboard/vendor/ckeditor/ckeditor.js') }}"></script>
@endsection

@section('page_contents')

    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="book"></i></div>
                            Add New Product
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
                <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Create new product</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-col-form-label" for="brand_id">Brand</label>
                                        <select class="form-control @error('brand_id') is-invalid @enderror" id="brand_id" name="brand_id">
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
                                        <label class="form-col-form-label" for="category_id">Category</label>
                                        <select class="form-control @error('category_id') is-invalid @enderror" id="category_id" name="category_id">
                                            @foreach($categories as $category)
                                                <option value="{{ $category->uuid }}">{{ getFromJson($category->name , lang()) }}</option>
                                            @endforeach
                                        </select>

                                        @error('category_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-col-form-label" for="store_id">Store</label>
                                        <select class="form-control @error('store_id') is-invalid @enderror" id="store_id" name="store_id">
                                            @foreach($stores as $store)
                                                <option value="{{ $store->uuid }}">{{ getFromJson($store->name , lang()) }}</option>
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
                                        <select class="form-control @error('lookup_condition_id') is-invalid @enderror" id="lookup_condition_id" name="lookup_condition_id">
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
                                        <label class="form-col-form-label" for="is_active">Is Active</label>
                                        <select class="form-control @error('is_active') is-invalid @enderror" id="is_active" name="is_active">
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
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
                                               placeholder="Enter price .." value="{{ old('price') }}">

                                        @error('price')
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
                                                   placeholder="Enter name_{{ $lang }} .." value="{{ old('name_' . $lang) }}">

                                            @error('name_'.$lang)
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                @endforeach

                                @foreach(langs("short_name") as $lang)
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-col-form-label" for="details_{{ $lang }}">Details ({{ $lang }})</label>
                                            <textarea class="form-control @error('details_'.$lang) is-invalid @enderror "
                                                      id="details_{{ $lang }}" name="details_{{ $lang }}"
                                                      placeholder="Enter details_{{ $lang }} .."></textarea>

                                            @error('details_'.$lang)
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror

                                            <script>
                                                CKEDITOR.replace( 'details_{{ $lang }}' );
                                            </script>
                                        </div>
                                    </div>
                                @endforeach

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-col-form-label" for="warranty">Warranty</label>
                                        <input class="form-control @error('warranty') is-invalid @enderror "
                                               id="warranty"
                                               type="text" name="warranty"
                                               placeholder="Enter warranty .." value="{{ old('warranty') }}">

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
                                               placeholder="Enter video .." value="{{ old('video') }}">

                                        @error('video')
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
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-save"></i> Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('footer_scripts')
    <script !src="">
        $(document).ready(function () {

        });
    </script>
@endsection
