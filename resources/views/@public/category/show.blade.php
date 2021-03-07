@extends('@public._layouts.master')

@section('page_title') {{ getFromJson($category->name, lang()) }} @endsection

@section('page_contents')

    <!-- Page title-->
    <div class="page-title-overlap bg-dark pt-4 pb-4">
        <div class="container pt-lg-3 pb-lg-4">
            <div class="d-lg-flex pb-5 mb-3 justify-content-between">
                <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
                            <li class="breadcrumb-item"><a class="text-nowrap fire-loader-anchor" href="{{ route('public.home') }}"><i class="czi-home"></i>{{ trans('master.Home') }}</a></li>
                            <li class="breadcrumb-item"><a class="text-nowrap fire-loader-anchor" href="{{ route('public.category.index') }}"><i class="czi-view-grid"></i>{{ trans('master.Categories') }}</a></li>
                            <li class="breadcrumb-item text-nowrap active" aria-current="page">{{ getFromJson($category->name, lang()) }}</li>
                        </ol>
                    </nav>
                </div>
                <div class="order-lg-1 pr-lg-4 text-center text-lg-left">
                    <h1 class="h3 text-light mb-0"><i style="margin-right: 5px;" class="{{ $category->icon }}"></i> {{ getFromJson($category->name, lang()) }}</h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Page Content-->
    <div class="container pb-5 mb-2 mb-md-4">
        <div class="row rtl-ar">
            @foreach($categories as $category)
                <div class="col-lg-3 col-md-4 col-sm-6 mb-grid-gutter">
                    <div class="card card-body">
                        <div class="card product-card-alt">
                            <div class="product-thumb" style="height: 180px;overflow: hidden;">
                                <div class="product-card-actions">
                                    <a class="btn btn-light btn-icon btn-shadow font-size-base mx-2 fire-loader-anchor" href="{{ route('public.category.product.index', $category->slug) }}"><i class="czi-eye"></i></a>
                                </div>
                                <a class="product-thumb-overlay fire-loader-anchor" href="{{ route('public.category.product.index', $category->slug) }}"></a>
                                <img style="height: 100%;" src="{{ url('assets_public/images/category/picture/'. $category->picture) }}" alt="Product">
                            </div>
                            <div class="card-body text-center">
                                <h3 class="product-title font-size-sm mb-2">
                                    <a class=" fire-loader-anchor" href="{{ route('public.category.product.index', $category->slug) }}">{{ getFromJson($category->name , lang()) }}</a>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
