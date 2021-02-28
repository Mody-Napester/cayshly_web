@extends('@public._layouts.master')

@section('page_title') {{ trans('home.brands') }} @endsection

@section('page_contents')

    <!-- Page title-->
    <div class="page-title-overlap bg-dark pt-4 pb-4">
        <div class="container pt-lg-3 pb-lg-4">
            <div class="d-lg-flex pb-5 mb-3 justify-content-between">
                <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
                            <li class="breadcrumb-item"><a class="text-nowrap" href="{{ route('public.home') }}"><i class="czi-home"></i>{{ trans('master.Home') }}</a></li>
                            <li class="breadcrumb-item text-nowrap active" aria-current="page">{{ trans('master.Brands') }}</li>
                        </ol>
                    </nav>
                </div>
                <div class="order-lg-1 pr-lg-4 text-center text-lg-left">
                    <h1 class="h3 text-light mb-0"><i style="margin-right: 5px;" class="czi-bookmark"></i> {{ trans('master.Brands') }}</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="container pb-5 mb-2 mb-md-4">
        <div class="row pt-sm-0">
            @foreach($brands as $brand)
                <div class="col-md-3 col-sm-6 mb-grid-gutter">
                    <a class="card product-card h-100 border-0 box-shadow pb-2" href="{{ route('public.brand.product.index', $brand->slug) }}">
                        <span class="badge badge-right badge-shadow badge-success font-size-md font-weight-medium badge-shadow" data-toggle="tooltip" title="" data-original-title="Average meal cost">{{ $brand->products()->count() }} Products</span>
                        <div style="height: 150px;overflow: hidden">
                            <img class="card-img-top" src="{{ url('assets_public/images/brand/cover/'. $brand->cover) }}" alt="{{ getFromJson($brand->name , lang()) }}">
                        </div>
                        <div class="bg-white rounded-lg pt-1 px-2 mx-auto mt-n5" style="width: 175px;height: 100px;overflow: hidden">
                            <img class="d-block rounded-lg mx-auto" width="150" style="height: 100%;" src="{{ url('assets_public/images/brand/picture/'. $brand->picture) }}" alt="Brand">
                        </div>
                        <div class="card-body text-center pt-3 pb-4">
                            <h3 class="h5 mb-2">{{ getFromJson($brand->name , lang()) }}</h3>
                            {{--                        <div class="font-size-ms text-muted">Burgers, Salads, French fries, Drinks</div>--}}
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Page Content-->
{{--    <div class="container pb-5 mb-2 mb-md-4">--}}
{{--        <div class="bg-light box-shadow-lg rounded-lg pr-2 pl-2">--}}
{{--            <div class="row pt-3 mx-n2">--}}
{{--                @foreach($brands as $brand)--}}
{{--                    <div class="col-lg-3 col-md-4 col-sm-6 mb-grid-gutter">--}}
{{--                        <div class="card product-card-alt">--}}
{{--                            <div class="product-thumb" style="height: 180px;overflow: hidden;">--}}
{{--                                <div class="product-card-actions">--}}
{{--                                    <a class="btn btn-light btn-icon btn-shadow font-size-base mx-2" href=""><i class="czi-eye"></i></a>--}}
{{--                                </div>--}}
{{--                                <a class="product-thumb-overlay" href=""></a>--}}
{{--                                <img style="height: 100%;" src="{{ url('assets_public/images/brand/picture/'. $brand->picture) }}" alt="Product">--}}
{{--                            </div>--}}
{{--                            <div class="card-body text-center">--}}
{{--                                <h3 class="product-title font-size-sm mb-2">--}}
{{--                                    <a href="">{{ getFromJson($brand->name , lang()) }}</a>--}}
{{--                                </h3>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @endforeach--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

@endsection
