@extends('@public._layouts.master')

@section('page_title') {{ getFromJson($category->name, lang()) }} @endsection

@section('page_contents')

    <!-- Page title-->
    <div class="page-title-overlap bg-primary pt-4 pb-4">
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
        <div class="">
            <div class="row pt-3 mx-n2 rtl-ar">
                @foreach($products as $product)
                    <div class="col-md-3 col-sm-3 mb-4">
                        @include('@public._partials.product')
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
