@extends('@public._layouts.master')

@section('page_title') {{ trans('cart.payment') }} @endsection

@section('page_contents')

    <!-- Page Title-->
    <div class="page-title-overlap bg-dark pt-4">
        <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
            <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
                        <li class="breadcrumb-item"><a class="text-nowrap" href="{{ route('public.home') }}"><i class="czi-home"></i>{{ trans('master.Home') }}</a></li>
                        <li class="breadcrumb-item text-nowrap active" aria-current="page">Checkout</li>
                    </ol>
                </nav>
            </div>
            <div class="order-lg-1 pr-lg-4 text-center text-lg-left">
                <h1 class="h3 text-light mb-0">Checkout</h1>
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
                        <div class="step-label"><i class="czi-cart"></i>Cart</div>
                    </a>
                    <a class="step-item active" href="{{ route('public.cart.user.details') }}">
                        <div class="step-progress"><span class="step-count">2</span></div>
                        <div class="step-label"><i class="czi-user-circle"></i>Your details</div>
                    </a>
                    <a class="step-item active current" href="{{ route('public.cart.payment') }}">
                        <div class="step-progress"><span class="step-count">3</span></div>
                        <div class="step-label"><i class="czi-card"></i>Payment</div>
                    </a>
                    <a class="step-item">
                        <div class="step-progress"><span class="step-count">4</span></div>
                        <div class="step-label"><i class="czi-check-circle"></i>Review</div>
                    </a>
                </div>

                <div class="card card-body">
                    <!-- Payment methods accordion-->
                    <h2 class="h6 pb-3 mb-2">Choose payment method</h2>
                    <div class="accordion mb-2" id="payment-method" role="tablist">
                        <div class="card">
                            <div class="card-header" role="tab">
                                <h3 class="accordion-heading">
                                    <a class="collapsed" href="#cod" data-toggle="collapse">
                                        <i class="czi-money-bag mr-2"></i>Cash on delivery<span class="accordion-indicator"></span>
                                    </a>
                                </h3>
                            </div>
                            <div class="collapse show" id="cod" data-parent="#payment-method" role="tabpanel">
                                <div class="card-body">
                                    <p>You will pay on your stop.</p>
                                    <div class="custom-control custom-checkbox d-block">
                                        <input class="custom-control-input" type="radio" checked name="payment_method" id="use_cod">
                                        <label class="custom-control-label" for="use_cod">Use cash on delivery to pay for this order.</label>
                                    </div>
                                </div>
                            </div>
                        </div>
{{--                        <div class="card">--}}
{{--                            <div class="card-header" role="tab">--}}
{{--                                <h3 class="accordion-heading"><a class="collapsed" href="#points" data-toggle="collapse"><i class="czi-gift mr-2"></i>Redeem Reward Points<span class="accordion-indicator"></span></a></h3>--}}
{{--                            </div>--}}
{{--                            <div class="collapse show" id="points" data-parent="#payment-method" role="tabpanel">--}}
{{--                                <div class="card-body">--}}
{{--                                    <p>You currently have<span class="font-weight-medium">&nbsp;384</span>&nbsp;Reward Points to spend.</p>--}}
{{--                                    <div class="custom-control custom-checkbox d-block">--}}
{{--                                        <input class="custom-control-input" type="radio" name="payment_method" id="use_points">--}}
{{--                                        <label class="custom-control-label" for="use_points">Use my Reward Points to pay for this order.</label>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </div>

                    <!-- Navigation (desktop)-->
                    <div class="d-none d-lg-flex pt-4">
                        <div class="w-50 pr-3"><a class="btn btn-secondary btn-block" href="{{ route('public.cart.user.details') }}"><i class="czi-arrow-left mt-sm-0 mr-1"></i><span class="d-none d-sm-inline">Back to User Details</span><span class="d-inline d-sm-none">Back</span></a></div>
                        <div class="w-50 pl-2"><a class="btn btn-primary btn-block" href="{{ route('public.cart.review') }}"><span class="d-none d-sm-inline">Review your order</span><span class="d-inline d-sm-none">Review order</span><i class="czi-arrow-right mt-sm-0 ml-1"></i></a></div>
                    </div>
                </div>
            </section>


            <!-- Sidebar-->
            <aside class="col-lg-4 pt-4 pt-lg-0">
                <div class="cz-sidebar-static rounded-lg box-shadow-lg ml-lg-auto">
                    <div class="widget mb-3">
                        <h2 class="widget-title text-center">Order summary</h2>
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
                        <li class="d-flex justify-content-between align-items-center"><span class="mr-2">Subtotal:</span><span class="text-right">{{ $cart_price_sum }} EGP</span></li>
                        <li class="d-flex justify-content-between align-items-center"><span class="mr-2">Shipping:</span><span class="text-right">—</span></li>
                        {{--                        <li class="d-flex justify-content-between align-items-center"><span class="mr-2">Taxes:</span><span class="text-right">$9.<small>50</small></span></li>--}}
                        {{--                        <li class="d-flex justify-content-between align-items-center"><span class="mr-2">Discount:</span><span class="text-right">—</span></li>--}}
                    </ul>
                    <h3 class="font-weight-normal text-center my-4">{{ $cart_price_sum }} EGP</h3>
                    @if(auth()->check())
                        <a class="btn btn-primary btn-shadow btn-block mt-4" href="{{ route('public.cart.review') }}"><i class="czi-card font-size-lg mr-2"></i>Proceed to Review</a>
                    @endif

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
        <!-- Navigation (mobile)-->
        <div class="row d-lg-none">
            <div class="col-lg-8">
                <div class="d-flex pt-4 mt-3">
                    @if(auth()->check())
                        <div class="w-50 pr-3"><a class="btn btn-secondary btn-block" href="{{ route('public.cart.user.details') }}"><i class="czi-arrow-left mt-sm-0 mr-1"></i><span class="d-none d-sm-inline">Back to User Details</span><span class="d-inline d-sm-none">Back</span></a></div>
                        <div class="w-50 pl-2"><a class="btn btn-primary btn-block" href="{{ route('public.cart.review') }}"><span class="d-none d-sm-inline">Proceed to Review</span><span class="d-inline d-sm-none">Next</span><i class="czi-arrow-right mt-sm-0 ml-1"></i></a></div>
                    @else
                        <div class="w-100 pr-3"><a class="btn btn-secondary btn-block" href="{{ route('public.cart.user.details') }}"><i class="czi-arrow-left mt-sm-0 mr-1"></i><span class="d-none d-sm-inline">Back to User Details</span><span class="d-inline d-sm-none">Back</span></a></div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection

@section('page_scripts')
    <script !src="">

    </script>
@endsection
