@extends('@public._layouts.master')

@section('page_title') {{ getFromJson($product->name , lang()) }} @endsection

@section('page_meta')
    <meta property="og:url"           content="{{ url()->full() }}" />
    <meta property="og:type"          content="{{ config('app.name') }}" />
    <meta property="og:title"         content="{{ config('app.title') }}" />
    <meta property="og:description"   content="{!! getFromJson($product->details , lang()) !!}" />
    <meta property="og:image"         content="{{ url('assets_public/images/product/picture/'. $product->picture) }}" />
@endsection

@section('page_contents')

    <!-- Page title-->
    <!-- Custom page title-->
    <div class="page-title-overlap bg-primary pt-4">
        <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
            <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
                        <li class="breadcrumb-item"><a class="text-nowrap fire-loader-anchor" href="{{ route('public.home') }}"><i class="czi-home"></i>{{ trans('master.Home') }}</a></li>
                        @if(isset($product->store))
                        <li class="breadcrumb-item text-nowrap">
                            <a href="{{ route('public.store.show', $product->store->slug) }}">{{ $product->store->name }}</a>
                        </li>
                        @endif
                        <li class="breadcrumb-item text-nowrap active" aria-current="page">{{ getFromJson($product->name , lang()) }}</li>
                    </ol>
                </nav>
            </div>
            <div class="order-lg-1 pr-lg-4 text-center text-lg-left">
                <h1 class="h3 text-light mb-2">{{ getFromJson($product->name , lang()) }}</h1>
                <div>
                    <div class="star-rating">
                        <i class="sr-star czi-star-filled active"></i>
                        <i class="sr-star czi-star-filled active"></i>
                        <i class="sr-star czi-star-filled active"></i>
                        <i class="sr-star czi-star-filled active"></i>
                        <i class="sr-star czi-star"></i>
                    </div><span class="d-inline-block font-size-sm text-white opacity-70 align-middle mt-1 ml-1">74 {{ trans('products.Reviews') }}</span>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Content-->
    <div class="container">
        <div class="bg-light box-shadow-lg rounded-lg">
            <!-- Tabs-->
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item"><a class="nav-link p-4 active" href="#general" data-toggle="tab" role="tab">{{ trans('products.General_Info') }}</a></li>
                <li class="nav-item"><a class="nav-link p-4" href="#specs" data-toggle="tab" role="tab">{{ trans('products.Specifications') }}</a></li>
{{--                <li class="nav-item"><a class="nav-link p-4" href="#reviews" data-toggle="tab" role="tab">Reviews <span class="font-size-sm opacity-60">(74)</span></a></li>--}}
            </ul>
            <div class="px-4 pt-lg-3 pb-3 mb-5">
                <div class="tab-content px-lg-3">
                    <!-- General info tab-->
                    <div class="tab-pane fade show active" id="general" role="tabpanel">
                        <div class="row">
                            <!-- Product gallery-->
                            <div class="col-lg-7 pr-lg-0">
                                <div class="cz-product-gallery">
                                    <div class="cz-preview order-sm-2">
                                        <div class="cz-preview-item active" id="first"><img class="cz-image-zoom" src="{{ url('assets_public/images/product/picture/'. $product->picture) }}" data-zoom="{{ url('assets_public/images/product/picture/'. $product->picture) }}" alt="Product image">
                                            <div class="cz-image-zoom-pane"></div>
                                        </div>
                                        <div class="cz-preview-item" id="second"><img class="cz-image-zoom" src="img/shop/single/gallery/06.jpg" data-zoom="img/shop/single/gallery/06.jpg" alt="Product image">
                                            <div class="cz-image-zoom-pane"></div>
                                        </div>
                                        <div class="cz-preview-item" id="third"><img class="cz-image-zoom" src="img/shop/single/gallery/07.jpg" data-zoom="img/shop/single/gallery/07.jpg" alt="Product image">
                                            <div class="cz-image-zoom-pane"></div>
                                        </div>
                                        <div class="cz-preview-item" id="fourth"><img class="cz-image-zoom" src="img/shop/single/gallery/08.jpg" data-zoom="img/shop/single/gallery/08.jpg" alt="Product image">
                                            <div class="cz-image-zoom-pane"></div>
                                        </div>
                                    </div>
                                    <div class="cz-thumblist order-sm-1">
                                        <a class="cz-thumblist-item active" href="#first"><img style="height: 100%;" src="{{ url('assets_public/images/product/picture/'. $product->picture) }}" alt="Product thumb"></a>
{{--                                        <a class="cz-thumblist-item" href="#second"><img src="img/shop/single/gallery/th06.jpg" alt="Product thumb"></a>--}}
{{--                                        <a class="cz-thumblist-item" href="#third"><img src="img/shop/single/gallery/th07.jpg" alt="Product thumb"></a>--}}
{{--                                        <a class="cz-thumblist-item" href="#fourth"><img src="img/shop/single/gallery/th08.jpg" alt="Product thumb"></a>--}}
{{--                                        <a class="cz-thumblist-item video-item" href="https://www.youtube.com/watch?v=nrQevwouWn0">--}}
{{--                                            <div class="cz-thumblist-item-text"><i class="czi-video"></i>Video</div>--}}
{{--                                        </a>--}}
                                    </div>
                                </div>
                            </div>
                            <!-- Product details-->
                            <div class="col-lg-5 pt-4 pt-lg-0">
                                <div class="product-details ml-auto pb-3">
                                    <div class="mb-3">
                                        <span class="h3 font-weight-normal text-accent mr-1">{{ getProductAfterDiscount($product)['price'] }} <small>EGP</small></span>

                                        @if($product->discount_type != 1)
                                            <del class="text-muted font-size-lg mr-3">{{ $product->price }} <small>EGP</small></del>
                                            <span class="badge badge-danger align-middle mt-n2">{{ getProductAfterDiscount($product)['discount'] }}</span>
                                        @endif
                                    </div>

                                    <div class="position-relative mr-n4 mb-3">
                                        <div class="font-size-sm">
                                            <span class="text-heading font-weight-medium mr-1">{{ trans('products.Brand') }} :</span>
                                            <span class="text-muted">{{ (isset($product->brand))? getFromJson( $product->brand->name , lang()) : '-' }}</span>
                                        </div>
                                        <div class="font-size-sm">
                                            <span class="text-heading font-weight-medium mr-1">{{ trans('products.Category') }} :</span>
                                            <span class="text-muted">
                                                    @if($product->categories)
                                                    @foreach($product->categories as $category)
                                                        <span class="badge badge-primary">{{ getFromJson( $category->name , lang()) }}</span>
                                                    @endforeach
                                                @else
                                                    -
                                                @endif
                                         </span>
                                        </div>
                                        <div class="font-size-sm">
                                            <span class="text-heading font-weight-medium mr-1">{{ trans('products.Store') }} :</span>
                                            <span class="text-muted">{{ (isset($product->store))? $product->store->name : '-' }}</span>
                                        </div>
                                        <div class="font-size-sm">
                                            <span class="text-heading font-weight-medium mr-1">{{ trans('products.Points') }} :</span>
                                            <span class="text-muted">{{ $product->points }}</span>
                                        </div>
                                        <div class="font-size-sm">
                                            <span class="text-heading font-weight-medium mr-1">{{ trans('products.Condition') }} :</span>
                                            <span class="text-muted">{{ getFromJson( $product->condition->name , lang()) }}</span>
                                        </div>
                                        <div class="font-size-sm">
                                            <span class="text-heading font-weight-medium mr-1">{{ trans('products.Warranty') }} :</span>
                                            <span class="text-muted">{{ $product->warranty }}</span>
                                        </div>

                                        @foreach($options as $option)
                                        <div class="mt-2 mb-2">
                                            <div class="font-size-sm"><span class="text-heading font-weight-medium mr-1">{{ getFromJson( $option['parent']->name , lang()) }}</span></div>
                                            <div class="d-flex mb-1">
                                                @foreach($option['child'] as $child)
                                                    <div class="custom-control custom-option custom-control-inline mb-2">
                                                        <input class="custom-control-input" type="radio" name="" id="" value="" checked="">
                                                        <label class="custom-option-label" for="">
                                                            {{ getFromJson( $child[0]->name , lang()) }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        @endforeach

                                        <div class="product-badge product-available mt-n1"><i class="czi-security-check"></i>{{ trans('products.Product_available') }}</div>
                                    </div>
                                    <div class="d-flex align-items-center pt-2 pb-4">
                                        <div class="w-50 mr-3">
                                            <form action="{{ route('public.wishlist.store') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="wishlist_product" value="{{ $product->uuid }}">
                                                <button class="btn btn-secondary btn-block" type="submit"><i class="czi-heart font-size-lg mr-2"></i><span class='d-none d-sm-inline'>{{ trans('products.Add_to') }} </span>{{ trans('products.Wishlist') }}</button>
                                            </form>
                                        </div>
                                        <button class="btn btn-primary btn-shadow btn-block add_to_cart" type="button" data-item="{{ $product->uuid }}"><i class="czi-cart font-size-lg mr-2"></i>{{ trans('products.Add_to_Cart') }}</button>
                                    </div>

                                    <!-- Product panels-->
{{--                                    <div class="accordion mb-4" id="productPanels">--}}
{{--                                        <div class="card">--}}
{{--                                            <div class="card-header">--}}
{{--                                                <h3 class="accordion-heading">--}}
{{--                                                    <a href="#shippingOptions" role="button" data-toggle="collapse" aria-expanded="true" aria-controls="shippingOptions">--}}
{{--                                                        <i class="czi-delivery text-muted lead align-middle mt-n1 mr-2"></i>Shipping options<span class="accordion-indicator"></span>--}}
{{--                                                    </a>--}}
{{--                                                </h3>--}}
{{--                                            </div>--}}
{{--                                            <div class="collapse show" id="shippingOptions" data-parent="#productPanels">--}}
{{--                                                <div class="card-body font-size-sm">--}}
{{--                                                    <div class="d-flex justify-content-between border-bottom pb-2">--}}
{{--                                                        <div>--}}
{{--                                                            <div class="font-weight-semibold text-dark">Local courier shipping</div>--}}
{{--                                                            <div class="font-size-sm text-muted">2 - 4 days</div>--}}
{{--                                                        </div>--}}
{{--                                                        <div>$16.50</div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="d-flex justify-content-between border-bottom py-2">--}}
{{--                                                        <div>--}}
{{--                                                            <div class="font-weight-semibold text-dark">UPS ground shipping</div>--}}
{{--                                                            <div class="font-size-sm text-muted">4 - 6 days</div>--}}
{{--                                                        </div>--}}
{{--                                                        <div>$19.00</div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="d-flex justify-content-between pt-2">--}}
{{--                                                        <div>--}}
{{--                                                            <div class="font-weight-semibold text-dark">Local pickup from store</div>--}}
{{--                                                            <div class="font-size-sm text-muted">&mdash;</div>--}}
{{--                                                        </div>--}}
{{--                                                        <div>$0.00</div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="card">--}}
{{--                                            <div class="card-header">--}}
{{--                                                <h3 class="accordion-heading"><a class="collapsed" href="#localStore" role="button" data-toggle="collapse" aria-expanded="true" aria-controls="localStore"><i class="czi-location text-muted font-size-lg align-middle mt-n1 mr-2"></i>Find in local store<span class="accordion-indicator"></span></a></h3>--}}
{{--                                            </div>--}}
{{--                                            <div class="collapse" id="localStore" data-parent="#productPanels">--}}
{{--                                                <div class="card-body">--}}
{{--                                                    <select class="custom-select">--}}
{{--                                                        <option value>Select your country</option>--}}
{{--                                                        <option value="Argentina">Argentina</option>--}}
{{--                                                        <option value="Belgium">Belgium</option>--}}
{{--                                                        <option value="France">France</option>--}}
{{--                                                        <option value="Germany">Germany</option>--}}
{{--                                                        <option value="Spain">Spain</option>--}}
{{--                                                        <option value="UK">United Kingdom</option>--}}
{{--                                                        <option value="USA">USA</option>--}}
{{--                                                    </select>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

                                    <hr class="mb-4">

                                    <!-- Sharing-->
{{--                                    <h6 class="d-inline-block align-middle font-size-base my-2 mr-2">Share:</h6>--}}

                                    <div class="row mb-2">
                                        <div class="col-sm-8">
                                            {{ trans('products.Share_on_facebook') }}
                                        </div>
                                        <div class="col-sm-4">
                                            <div id="fb-root"></div>
                                            <script>(function(d, s, id) {
                                                    var js, fjs = d.getElementsByTagName(s)[0];
                                                    if (d.getElementById(id)) return;
                                                    js = d.createElement(s); js.id = id;
                                                    js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
                                                    fjs.parentNode.insertBefore(js, fjs);
                                                }(document, 'script', 'facebook-jssdk'));</script>

                                            <!-- Your share button code -->
                                            <div class="fb-share-button"
                                                 data-href="{{ url()->full() }}"
                                                 data-layout="button" data-size="large">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-8">
                                            {{ trans('products.Share_on_twitter') }}
                                        </div>
                                        <div class="col-sm-4">
                                            <script>window.twttr = (function(d, s, id) {
                                                    var js, fjs = d.getElementsByTagName(s)[0],
                                                        t = window.twttr || {};
                                                    if (d.getElementById(id)) return t;
                                                    js = d.createElement(s);
                                                    js.id = id;
                                                    js.src = "https://platform.twitter.com/widgets.js";
                                                    fjs.parentNode.insertBefore(js, fjs);

                                                    t._e = [];
                                                    t.ready = function(f) {
                                                        t._e.push(f);
                                                    };

                                                    return t;
                                                }(document, "script", "twitter-wjs"));</script>

                                            <a class="twitter-share-button" data-size="large" href="{{ url()->full() }}"> Tweet</a>

                                        </div>
                                    </div>

{{--                                    <a class="share-btn sb-twitter mr-2 my-2" href="#"><i class="czi-twitter"></i>Twitter</a>--}}
{{--                                    <a class="share-btn sb-instagram mr-2 my-2" href="#"><i class="czi-instagram"></i>Instagram</a>--}}
{{--                                    <a class="share-btn sb-facebook my-2" data-href="{{ url()->full() }}" data-layout="button_count"><i class="czi-facebook"></i>Facebook</a>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Tech specs tab-->
                    @include('@public.product._partials.specifications')
                    <!-- Reviews tab-->
{{--                    @include('@public.product._partials.reviews')--}}
                </div>
            </div>
        </div>
    </div>
    <!-- Product description-->
    <div class="container pt-lg-3 pb-4 pb-sm-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h2 class="h3 pb-2">{{ trans('products.Description') }}</h2>
                <p>{!! getFromJson($product->details , lang()) !!}</p>
            </div>
        </div>
    </div>

    <hr class="pb-5">
    <!-- Product carousel (You may also like)-->
    <div class="container pt-lg-2 pb-5 mb-md-3">
        <h2 class="h3 text-center pb-4">{{ trans('products.You_may_also_like') }}</h2>
        <div class="cz-carousel cz-controls-static cz-controls-outside">
            <div class="cz-carousel-inner" data-carousel-options="{&quot;items&quot;: 2, &quot;controls&quot;: true, &quot;nav&quot;: false, &quot;autoHeight&quot;: true, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;500&quot;:{&quot;items&quot;:2, &quot;gutter&quot;: 18},&quot;768&quot;:{&quot;items&quot;:3, &quot;gutter&quot;: 20}, &quot;1100&quot;:{&quot;items&quot;:4, &quot;gutter&quot;: 30}}}">
                @foreach($similar_products as $product)
                    <div>
                        @include('@public._partials.product')
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
