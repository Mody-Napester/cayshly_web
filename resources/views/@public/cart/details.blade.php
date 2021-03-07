@extends('@public._layouts.master')

@section('page_title') {{ trans('cart.cart') }} @endsection

@section('page_contents')

    <!-- Page Title-->
    <div class="page-title-overlap bg-dark pt-4">
        <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
            <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
                        <li class="breadcrumb-item"><a class="text-nowrap fire-loader-anchor" href="{{ route('public.home') }}"><i class="czi-home"></i>{{ trans('master.Home') }}</a></li>
                        <li class="breadcrumb-item text-nowrap active" aria-current="page"><i style="margin-right: 5px;" class="czi-cart"></i> {{ trans('cart.cart') }}</li>
                    </ol>
                </nav>
            </div>
            <div class="order-lg-1 pr-lg-4 text-center text-lg-left">
                <h1 class="h3 text-light mb-0"><i style="margin-right: 5px;" class="czi-cart"></i> {{ trans('cart.Your_cart') }}</h1>
            </div>
        </div>
    </div>

    <!-- Page Content-->
    <div class="container pb-5 mb-2 mb-md-4">
        <div class="row rtl-ar">
            <!-- List of items-->
            <section class="col-lg-8">

                <div class="card card-body">
                    <form method="post" action="{{ route('public.cart.update') }}">
                        @csrf

                        <div class="d-flex justify-content-between align-items-center pt-3 pb-2 pb-sm-5 mt-1">
                            <h2 class="h6 text-danger mb-0">({{ $cart_product_count }}) {{ trans('cart.in_the_art') }}</h2>
                            @if(count($cart_products) > 0)
                                <a class="btn btn-outline-primary btn-sm pl-2 fire-loader-anchor" href="{{ route('public.cart.empty_cart') }}"><i class="czi-trash rtl-mrl-3"></i>{{ trans('cart.Empty_cart') }}</a>
                            @endif
                        </div>

                        <hr>

                        @if(count($cart_products) > 0)
                            @foreach($cart_products as $product)
                                <!-- Item-->
                                <div class="d-sm-flex justify-content-between align-items-center my-4 pb-3 border-bottom">
                                    <div class="media media-ie-fix d-block d-sm-flex align-items-center text-center text-sm-left">
                                        <a class="d-inline-block mx-auto mr-sm-4 fire-loader-anchor" href="{{ route('public.product.show', $product->slug) }}" style="width: 10rem;height: 100px;text-align: center;">
                                            <img style="height: 100%;" src="{{ url('assets_public/images/product/picture/'. $product->picture) }}" alt="Product">
                                        </a>
                                        <div class="media-body pt-2">
                                            <h3 class="product-title font-size-base mb-2 rtl-ar">
                                                <a class="fire-loader-anchor" href="{{ route('public.product.show', $product->slug) }}">{{ getFromJson($product->name , lang()) }}</a>
                                            </h3>
                                            <div class="font-size-sm rtl-ar"><span class="text-muted mr-2">{{ trans('cart.Store') }}:</span>{{ ($store = \App\Models\Store::getOneBy('id', $product->store_id))? $store->name : '-' }}</div>
    {{--                                    <div class="font-size-sm"><span class="text-muted mr-2">Size:</span>8.5</div>--}}
    {{--                                    <div class="font-size-sm"><span class="text-muted mr-2">Color:</span>White &amp; Blue</div>--}}
                                            <div class="font-size-lg text-accent pt-2 rtl-ar">{{ $product->price }} EGP</div>
                                        </div>
                                    </div>
                                    <div class="pt-2 pt-sm-0 pl-sm-3 mx-auto mx-sm-0 text-center text-sm-left" style="max-width: 9rem;">
                                        <div class="form-group mb-0 rtl-ar">
                                            <label class="font-weight-medium" for="quantity-{{ $product->uuid }}">{{ trans('cart.Quantity') }}</label>
                                            <input class="form-control" type="number" name="quantity[{{ $product->uuid }}]" value="{{ $product->quantity }}" id="quantity-{{ $product->uuid }}">
                                        </div>
                                        <span style="display: block" data-item="{{ $product->uuid }}" data-refresh="true" class="remove_from_cart rtl-ar btn btn-link px-0 text-danger" type="button">
                                            <i class="czi-close-circle rtl-mrl-3"></i><span class="font-size-sm">{{ trans('cart.Remove') }}</span>
                                        </span>
    {{--                                    <a href="{{ route('public.cart.remove', $product->uuid) }}" class="btn btn-link px-0 text-danger fire-loader-anchor">--}}
    {{--                                        <i class="czi-close-circle mr-2"></i><span class="font-size-sm">{{ trans('cart.Remove') }}</span>--}}
    {{--                                    </a>--}}
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="p-5 text-center">
                                {{ trans('cart.No_Products_Added_yet') }}
                            </div>
                        @endif

                        @if(count($cart_products) > 0)
                            <div class="text-right">
                                <button class="btn btn-accent" type="submit"><i class="czi-loading font-size-base rtl-mrl-3"></i>{{ trans('cart.Update_cart') }}</button>
                            </div>
                        @endif

                    </form>
                </div>

            </section>
            <!-- Sidebar-->
            <aside class="col-lg-4 pt-4 pt-lg-0">
                <div class="cz-sidebar-static rounded-lg box-shadow-lg ml-lg-auto">
                    <div class="text-center mb-4 pb-3 border-bottom">
                        <h2 class="h6 mb-3 pb-1">{{ trans('cart.Subtotal') }}</h2>
                        <h3 class="font-weight-normal">{{ $cart_price_sum }} EGP</h3>
                    </div>

{{--                    <div class="accordion" id="order-options">--}}
{{--                        <div class="card">--}}
{{--                            <div class="card-header">--}}
{{--                                <h3 class="accordion-heading"><a href="#promo-code" role="button" data-toggle="collapse" aria-expanded="true" aria-controls="promo-code">Apply promo code<span class="accordion-indicator"></span></a></h3>--}}
{{--                            </div>--}}
{{--                            <div class="collapse show" id="promo-code" data-parent="#order-options">--}}
{{--                                <form class="card-body needs-validation" method="post" novalidate>--}}
{{--                                    <div class="form-group">--}}
{{--                                        <input class="form-control" type="text" placeholder="Promo code" required>--}}
{{--                                        <div class="invalid-feedback">Please provide promo code.</div>--}}
{{--                                    </div>--}}
{{--                                    <button class="btn btn-outline-primary btn-block" type="submit">Apply promo code</button>--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

                    @if($cart_product_count > 0)
                    <a class="btn btn-primary btn-shadow btn-block mt-4 fire-loader-anchor" href="{{ route('public.cart.user.details') }}">
                        <i class="czi-card font-size-lg rtl-mrl-3"></i>{{ trans('cart.Proceed_to_Checkout') }}</a>
                    @endif
                </div>
            </aside>
        </div>
    </div>

@endsection
