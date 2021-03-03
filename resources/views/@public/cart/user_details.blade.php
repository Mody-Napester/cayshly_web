@extends('@public._layouts.master')

@section('page_title') {{ trans('cart.user_details') }} @endsection

@section('page_contents')

    <!-- Page Title-->
    <div class="page-title-overlap bg-dark pt-4">
        <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
            <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
                        <li class="breadcrumb-item"><a class="text-nowrap" href="{{ route('public.home') }}"><i class="czi-home"></i>{{ trans('master.Home') }}</a></li>
                        <li class="breadcrumb-item text-nowrap active" aria-current="page">{{ trans('cart.user_details') }}</li>
                    </ol>
                </nav>
            </div>
            <div class="order-lg-1 pr-lg-4 text-center text-lg-left">
                <h1 class="h3 text-light mb-0">{{ trans('cart.user_details') }}</h1>
            </div>
        </div>
    </div>
    <!-- Page Content-->
    <div class="container pb-5 mb-2 mb-md-4">

            <div class="row">
                <section class="col-lg-8">
                    <!-- Steps-->
                    <div class="steps steps-light pt-2 pb-3 mb-5">
                        <a class="step-item active" href="{{ route('public.cart.details') }}">
                            <div class="step-progress"><span class="step-count">1</span></div>
                            <div class="step-label"><i class="czi-cart"></i>{{ trans('cart.Cart') }}</div>
                        </a>
                        <a class="step-item active current">
                            <div class="step-progress"><span class="step-count">2</span></div>
                            <div class="step-label"><i class="czi-user-circle"></i>{{ trans('cart.Your_details') }}</div>
                        </a>
                        <a class="step-item">
                            <div class="step-progress"><span class="step-count">3</span></div>
                            <div class="step-label"><i class="czi-card"></i>{{ trans('cart.Payment') }}</div>
                        </a>
                        <a class="step-item">
                            <div class="step-progress"><span class="step-count">4</span></div>
                            <div class="step-label"><i class="czi-check-circle"></i>{{ trans('cart.Review') }}</div>
                        </a>
                    </div>

                    <div class="card card-body my-addresses" style="display: none;">
                        <!-- Shipping address-->
                        <h2 class="h6 pt-1 pb-3 mb-3 border-bottom">{{ trans('cart.My_addresses') }}</h2>

                        @if(auth()->check())
                            @if(count(auth()->user()->addresses) > 0)
                                @foreach(auth()->user()->addresses as $key => $address)
                                    <p>{{ ++$key }} : {{ $address->address }}</p>
                            @endforeach
                        @endif
                    @endif

                    <!-- Shipping address-->
                        <h2 class="h6 pt-1 pb-3 mb-3 border-bottom">{{ trans('cart.New_address') }}</h2>
                        <form action="{{ route('public.address.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="user_address">{{ trans('cart.Address_details') }}</label>
                                <textarea name="user_address" id="user_address" rows="5" class="form-control" placeholder="{{ trans('cart.New_address') }}"></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">{{ trans('cart.Save') }}</button>
                        </form>

                    </div>

                    <form action="{{ route('public.cart.payment') }}" method="get">
                        @csrf
                        <div class="card card-body cart-addresses">
                            <!-- Shipping address-->
                            <h2 class="h6 pt-1 pb-3 mb-3 border-bottom">{{ trans('cart.Shipping_address') }}</h2>

                            @if(auth()->check())
                                <div class="mb-3 text-right">
                                    <a class="btn btn-success add-address-view"><i class="czi-map"></i> {{ trans('cart.Add_Address') }}</a>
                                </div>

                                @if(count(auth()->user()->addresses) > 0)
                                    @foreach(auth()->user()->addresses as $key => $address)
                                        <div class="form-group" style="background-color: #eeeeee;padding: 10px;">
                                            <label for="address{{ $key }}">
                                                <input type="radio" @if($cart_address == $address->uuid) checked @endif class="form-control" style="width: auto;display: inline-block;height: auto;margin-right: 10px;" name="cart_request_address" value="{{ $address->uuid }}" id="address{{ $key }}">
                                                <span>{{ $address->address }}</span>
                                            </label>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="p-4 text-center">
                                        {{ trans('cart.You_have_no_address') }}
                                    </div>
                                @endif
                            @else
                                <div class="p-5 text-center">
                                    <p>{{ trans('cart.You_are_not_login_please_login_first') }}</p>
                                    <a href="{{ route('login') }}" class="btn btn-primary">{{ trans('cart.Login_now') }}</a>
                                    <a href="{{ route('register') }}" class="btn btn-secondary">{{ trans('cart.Or_Register') }}</a>
                                </div>
                        @endif

                        <!-- Navigation (desktop)-->
                            <div class="row mt-3">
                                @if(auth()->check())
                                    <div class="col-md-6 col-sm-6 col-xs-6 mb-3">
                                        <a class="btn btn-secondary btn-block" href="{{ route('public.cart.details') }}">
                                            <i class="czi-arrow-left mt-sm-0 mr-1"></i>
                                            <span class="d-sm-inline">{{ trans('cart.Back_to_Cart') }}</span>
                                        </a>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-6 mb-3">
                                        <button type="submit" class="btn btn-primary btn-block">
                                            <span class="d-sm-inline">{{ trans('cart.Proceed_to_Payment') }}</span>
                                            <i class="czi-arrow-right mt-sm-0 ml-1"></i>
                                        </button>
                                    </div>
                                @else
                                    <div class="w-100 pr-3">
                                        <a class="btn btn-secondary btn-block" href="{{ route('public.cart.details') }}">
                                            <i class="czi-arrow-left mt-sm-0 mr-1"></i>
                                            <span class="d-none d-sm-inline">{{ trans('cart.Back_to_Cart') }}</span>
                                            <span class="d-inline d-sm-none">{{ trans('cart.Back') }}</span>
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </form>
                </section>

                <!-- Sidebar-->
                <aside class="col-lg-4 pt-4 pt-lg-0">
                    <div class="cz-sidebar-static rounded-lg box-shadow-lg ml-lg-auto">
                        <div class="widget mb-3">
                            <h2 class="widget-title text-center">{{ trans('cart.Order_summary') }}</h2>
                            @if(count($cart_products) > 0)
                                @foreach($cart_products as $product)
                                    <div class="media align-items-center pb-2 border-bottom">
                                        <a class="d-block mr-2" style="width:50px;height: 50px;text-align: center;" href="{{ route('public.product.show', $product->slug) }}">
                                            <img style="height: 100%;" src="{{ url('assets_public/images/product/picture/'. $product->picture) }}" alt="{{ getFromJson($product->name , lang()) }}"/>
                                        </a>
                                        <div class="media-body">
                                            <h6 class="widget-product-title">
                                                <a href="{{ route('public.product.show', $product->slug) }}">{{ getFromJson($product->name , lang()) }}</a>
                                            </h6>
                                            <div class="widget-product-meta">
                                                <span class="text-accent mr-2">{{ $product->price }} EGP</span>
                                                <span class="text-muted">x {{ $product->quantity }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <ul class="list-unstyled font-size-sm pb-2 border-bottom">
                            <li class="d-flex justify-content-between align-items-center"><span class="mr-2">{{ trans('cart.Subtotal') }}:</span><span class="text-right">{{ $cart_price_sum }} EGP</span></li>
                            <li class="d-flex justify-content-between align-items-center"><span class="mr-2">{{ trans('cart.Shipping') }}:</span><span class="text-right">—</span></li>
                            {{--                        <li class="d-flex justify-content-between align-items-center"><span class="mr-2">Taxes:</span><span class="text-right">$9.<small>50</small></span></li>--}}
                            {{--                        <li class="d-flex justify-content-between align-items-center"><span class="mr-2">Discount:</span><span class="text-right">—</span></li>--}}
                        </ul>
                        <h3 class="font-weight-normal text-center my-4">{{ $cart_price_sum }} EGP</h3>
{{--                        @if(auth()->check())--}}
{{--                            <a class="btn btn-primary btn-shadow btn-block mt-4" href="{{ route('public.cart.payment') }}"><i class="czi-card font-size-lg mr-2"></i>Proceed to Payment</a>--}}
{{--                        @endif--}}

                        {{--                    <form class="needs-validation" method="post" novalidate>--}}
                        {{--                        <div class="form-group">--}}
                        {{--                            <input class="form-control" type="text" placeholder="Promo code" required>--}}
                        {{--                            <div class="invalid-feedback">Please provide promo code.</div>--}}
                        {{--                        </div>--}}
                        {{--                        <button class="btn btn-outline-primary btn-block" type="submit">Apply promo code</button>--}}
                        {{--                    </form>--}}
                    </div>
                </aside>
            </div>
{{--            <!-- Navigation (mobile)-->--}}
{{--            <div class="row d-lg-none">--}}
{{--                <div class="col-lg-8">--}}
{{--                    <div class="d-flex pt-4 mt-3">--}}
{{--                        @if(auth()->check())--}}
{{--                            <div class="w-50 pr-3"><a class="btn btn-secondary btn-block" href="{{ route('public.cart.details') }}"><i class="czi-arrow-left mt-sm-0 mr-1"></i><span class="d-none d-sm-inline">Back to Cart</span><span class="d-inline d-sm-none">Back</span></a></div>--}}
{{--                            <div class="w-50 pl-2"><a class="btn btn-primary btn-block" href="{{ route('public.cart.payment') }}"><span class="d-none d-sm-inline">Proceed to Payment</span><span class="d-inline d-sm-none">Next</span><i class="czi-arrow-right mt-sm-0 ml-1"></i></a></div>--}}
{{--                        @else--}}
{{--                            <div class="w-100 pr-3"><a class="btn btn-secondary btn-block" href="{{ route('public.cart.details') }}"><i class="czi-arrow-left mt-sm-0 mr-1"></i><span class="d-none d-sm-inline">Back to Cart</span><span class="d-inline d-sm-none">Back</span></a></div>--}}
{{--                        @endif--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
    </div>

@endsection

@section('page_scripts')
    <script !src="">
        $(document).on('click', '.add-address-view', function(){
            $('.my-addresses').show();
            $('.cart-addresses').hide();
        });
    </script>
@endsection
