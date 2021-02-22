@extends('@public._layouts.master')

@section('page_title') {{ trans('home.products') }} @endsection

@section('page_contents')

    <!-- Page title-->
    <div class="page-title-overlap bg-primary pt-4 pb-4">
        <div class="container pt-lg-3 pb-lg-4">
            <div class="d-lg-flex pb-5 mb-3 justify-content-between">
                <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
                            <li class="breadcrumb-item"><a class="text-nowrap" href="{{ route('public.home') }}"><i class="czi-home"></i>Home</a></li>
                            <li class="breadcrumb-item text-nowrap active" aria-current="page">{{ trans('product.by_free_products') }}</li>
                        </ol>
                    </nav>
                </div>
                <div class="order-lg-1 pr-lg-4 text-center text-lg-left">
                    <h1 class="h3 text-light mb-0"><i style="margin-right: 5px;" class="czi-gift"></i> {{ trans('product.by_free_products') }}</h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Page Content-->
    <div class="container pb-5 mb-2 mb-md-4">
        <div class="bg-light box-shadow-lg rounded-lg pr-2 pl-2">
            <div class="row pt-3 mx-n2">
                @foreach($products as $product)
                    <div class="col-md-3 col-sm-3 mb-4">
                        <div class="card product-card">
                            <button class="btn-wishlist btn-sm" type="button" data-toggle="tooltip" data-placement="left" title="Add to wishlist">
                                <i class="czi-heart"></i>
                            </button>
                            <a class="card-img-top d-block overflow-hidden" href="">
                                <img src="{{ url('assets_public/images/product/picture/'. $product->picture) }}" alt="{{ getFromJson($product->name , lang()) }}">
                            </a>
                            <div class="card-body py-2">
                                <a class="product-meta d-block font-size-xs pb-1" href="">{{ getFromJson( $product->store->name , lang()) }}</a>
                                <h3 class="product-title font-size-sm">
                                    <a href="">{{ getFromJson($product->name , lang()) }}</a>
                                </h3>
                                <div class="d-flex justify-content-between">
                                    <div class="product-price">
                                        <span class="text-accent">{{ $product->price }}<small>00</small></span>
                                        <del class="font-size-sm text-muted">38.<small>50</small></del>
                                    </div>
                                    <div class="star-rating">
                                        <i class="sr-star czi-star-filled active"></i>
                                        <i class="sr-star czi-star-filled active"></i>
                                        <i class="sr-star czi-star-filled active"></i>
                                        <i class="sr-star czi-star-filled active"></i>
                                        <i class="sr-star czi-star"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body card-body-hidden">
                                <button class="btn btn-primary btn-sm btn-block mb-2" type="button" data-toggle="toast" data-target="#cart-toast">
                                    <i class="czi-cart font-size-sm mr-1"></i>Add to Cart
                                </button>
                            </div>
                        </div>
                        <hr class="d-sm-none">
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
