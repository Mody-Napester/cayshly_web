@extends('@public._layouts.master')

@section('page_title') {{ trans('home.stores') }} @endsection

@section('page_contents')

    <!-- Page title-->
    <div class="page-title-overlap bg-primary pt-4 pb-4">
        <div class="container pt-lg-3 pb-lg-4">
            <div class="d-lg-flex pb-5 mb-3 justify-content-between">
                <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
                            <li class="breadcrumb-item"><a class="text-nowrap fire-loader-anchor" href="{{ route('public.home') }}"><i class="czi-home"></i>{{ trans('master.Home') }}</a></li>
                            <li class="breadcrumb-item text-nowrap active" aria-current="page">{{ trans('stores.Stores') }}</li>
                        </ol>
                    </nav>
                </div>
                <div class="order-lg-1 pr-lg-4 text-center text-lg-left">
                    <h1 class="h3 text-light mb-0"><i style="margin-right: 5px;" class="czi-bag"></i> {{ trans('stores.Stores') }}</h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Page Content-->
    <div class="container pb-5 mb-2 mb-md-4">
        <div class="bg-light box-shadow-lg rounded-lg pr-2 pl-2">
            <div class="row pt-3 mx-n2">
            @foreach($stores as $store)
                <div class="col-lg-3 col-md-4 col-sm-6 mb-grid-gutter">
                    <div class="card product-card-alt">
                        <div class="product-thumb" style="height: 180px;overflow: hidden;">
                            <div class="product-card-actions">
                                <a class="btn btn-light btn-icon btn-shadow font-size-base mx-2 fire-loader-anchor" href="{{ route('public.store.show', $store->slug) }}">
                                    <i class="czi-eye"></i>
                                </a>
                            </div>
                            <a class="product-thumb-overlay fire-loader-anchor" href="{{ route('public.store.show', $store->slug) }}"></a>
                            <img style="height: 100%;" src="{{ url('assets_public/images/store/picture/'. $store->picture) }}" alt="{{ $store->name }}">
                        </div>
                        <div class="card-body">
                            <div class="d-flex flex-wrap justify-content-between align-items-start pb-2">
                                <div class="text-muted font-size-xs mr-1">by <a class="product-meta font-weight-medium" href="#">{{ ($cb = $store->created_by_user)? $cb->name : '-' }} </a></div>
    {{--                            <div class="star-rating">--}}
    {{--                                <i class="sr-star czi-star-filled active"></i>--}}
    {{--                                <i class="sr-star czi-star-filled active"></i>--}}
    {{--                                <i class="sr-star czi-star-filled active"></i>--}}
    {{--                                <i class="sr-star czi-star-filled active"></i>--}}
    {{--                                <i class="sr-star czi-star-filled active"></i>--}}
    {{--                            </div>--}}
                            </div>
                            <h3 class="product-title font-size-sm mb-2">
                                <a class=" fire-loader-anchor" href="{{ route('public.store.show', $store->slug) }}">{{ $store->name }}</a>
{{--                                <a href="{{ route('public.store.show', $store->slug) }}">{{ $store->name }}</a>--}}
                            </h3>
                            <div class="d-flex flex-wrap justify-content-between align-items-center">
                                <div class="font-size-sm mr-2">
                                    <i class="czi-bag text-muted mr-1"></i>{{ $store->products()->count() }}<span class="font-size-xs ml-1">{{ trans('stores.Products') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>

@endsection
