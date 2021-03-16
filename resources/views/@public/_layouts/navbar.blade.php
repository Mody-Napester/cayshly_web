<header class="box-shadow-sm">
    <!-- Topbar-->
    <div class="topbar topbar-dark bg-dark">
        <div class="container">
            <div>
                <div class="topbar-text dropdown disable-autohide">
                    <a class="topbar-link dropdown-toggle" href="#" data-toggle="dropdown">{{ trans('navbar.language') }}</a>
                    <ul class="dropdown-menu">
                        @foreach(langs() as $lang)
                        <li><a class="dropdown-item pb-1 fire-loader-anchor" href="{{ route('language', $lang['short_name']) }}">{{ $lang['name'] }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="topbar-text text-nowrap d-none d-md-inline-block border-left border-light pl-3 ml-3">
                    <span class="text-muted mr-1 topbar-link"><i class="czi-support"></i> {{ trans('navbar.available') }} {{ (isset($contact))? $contact->working_hours : '' }} {{ trans('navbar.at') }}</span><a class="topbar-link" href="tel:{{ (isset($contact))? $contact->phone : '' }}">{{ (isset($contact))? $contact->phone : '' }}</a>
                </div>
            </div>
            <div class="topbar-text dropdown d-md-none ml-auto">
                @if(auth()->check())
                    @if(check_authority('index.dashboard'))
                        <a class="topbar-link ml-3 d-md-inline-block fire-loader-anchor" href="{{ route('dashboard.home') }}"><i class="czi-settings text-muted mr-2"></i>{{ trans('master.Dashboard') }}</a>
                    @endif

                    <a class="topbar-link ml-3 d-md-inline-block" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="czi-sign-out text-muted mr-2"></i>{{ trans('master.Sign_out') }}
                    </a>
                @else
                    <a class="topbar-link ml-3 d-inline-block fire-loader-anchor" href="{{ route('login') }}"><i class="czi-sign-in text-muted mr-2"></i>{{ trans('master.Login') }}</a>
                    <a class="topbar-link ml-3 d-inline-block fire-loader-anchor" href="{{ route('register') }}"><i class="czi-add-user text-muted mr-2"></i>{{ trans('master.Register') }}</a>
                @endif
{{--                <a class="topbar-link dropdown-toggle" href="#" data-toggle="dropdown">{{ trans('master.Useful_pages') }}</a>--}}
{{--                <ul class="dropdown-menu dropdown-menu-right">--}}
{{--                    <li><a class="dropdown-item" href=""><i class="czi-idea text-muted mr-2"></i>About us</a></li>--}}
{{--                    <li><a class="dropdown-item" href=""><i class="czi-location text-muted mr-2"></i>Contact us</a></li>--}}
{{--                    @if(auth()->check())--}}
{{--                        @if(check_authority('index.dashboard'))--}}
{{--                            <li><a class="dropdown-item" href="{{ route('dashboard.home') }}"><i class="czi-settings text-muted mr-2"></i>{{ trans('master.Dashboard') }}</a></li>--}}
{{--                        @endif--}}
{{--                        <li>--}}
{{--                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">--}}
{{--                                <i class="czi-sign-out text-muted mr-2"></i>{{ trans('master.Sign_out') }}--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
{{--                            @csrf--}}
{{--                        </form>--}}
{{--                    @else--}}
{{--                        <li><a class="dropdown-item" href="{{ route('login') }}"><i class="czi-sign-in text-muted mr-2"></i>{{ trans('master.Login') }}</a></li>--}}
{{--                        <li><a class="dropdown-item" href="{{ route('register') }}"><i class="czi-add-user text-muted mr-2"></i>{{ trans('master.Register') }}</a></li>--}}
{{--                    @endif--}}
{{--                </ul>--}}
            </div>
            <div class="d-none d-md-block ml-3 text-nowrap">
{{--                <a class="topbar-link ml-3 pl-3 border-light d-none d-md-inline-block" href=""><i class="czi-idea mt-n1"></i>About us</a>--}}
{{--                <a class="topbar-link ml-3 border-left border-light pl-3 d-none d-md-inline-block" href=""><i class="czi-location mt-n1"></i>Contact us</a>--}}
                @if(auth()->check())
                    @if(check_authority('index.dashboard'))
                        <a class="topbar-link ml-3 pl-3 d-none d-md-inline-block fire-loader-anchor" href="{{ route('dashboard.home') }}"><i class="czi-settings mt-n1"></i>{{ trans('master.Dashboard') }}</a>
                    @endif
                        <a class="topbar-link ml-3 pl-3 d-none d-md-inline-block fire-loader-anchor" href="{{ route('public.user.show', [auth()->user()->name]) }}"><i class="czi-user-circle mt-n1"></i>{{ trans('master.My_Account') }}</a>

                        <a class="topbar-link ml-3 pl-3 d-none d-md-inline-block" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="czi-sign-out mt-n1"></i>{{ trans('master.Sign_out') }}
                    </a>
                @else
                    <a class="topbar-link ml-3 pl-3 d-none d-md-inline-block fire-loader-anchor" href="{{ route('login') }}"><i class="czi-sign-in mt-n1"></i>{{ trans('master.Login') }}</a>
                    <a class="topbar-link ml-3 border-left border-light pl-3 d-none d-md-inline-block fire-loader-anchor" href="{{ route('register') }}"><i class="czi-add-user mt-n1"></i>{{ trans('master.Register') }}</a>
                @endif
            </div>
        </div>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
    <!-- Remove "navbar-sticky" class to make navigation bar scrollable with the page.-->
    <div class="navbar-sticky bg-light">
        <div class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                    <a class="navbar-brand d-none d-sm-block mr-3 flex-shrink-0 fire-loader-anchor" href="{{ route('public.home') }}" style="min-width: 7rem;">
                        <img style="width: 130px;" src="{{ url('assets_public/img/logo-dark.png') }}" alt="{{ trans('master.Cayshly') }}"/>
                    </a>
                    <a class="navbar-brand d-sm-none mr-2 fire-loader-anchor" href="{{ route('public.home') }}" style="min-width: 4.625rem;">
                        <img style="width: 110px;" src="{{ url('assets_public/img/logo-dark.png') }}" alt="{{ trans('master.Cayshly') }}"/>
                    </a>

                    <!-- Search Desktop -->
                    <div class="input-group-overlay d-none d-lg-inline-flex mx-4">
                        <div class="input-group-prepend-overlay">
                            <span class="input-group-text"><i class="czi-search"></i></span>
                        </div>
                        <input class="form-control prepended-form-control appended-form-control search-products-d-input" type="text"placeholder="{{ trans('master.Search_for_products') }}">
                        <button class="input-group-append-overlay btn btn-primary search-products-d-btn" style="border-radius: 0 5px 5px 0;padding-top: 17px;"><i class="czi-play"></i></button>
                    </div>
                    <!-- Toolbar-->
                    <div class="navbar-toolbar d-flex flex-shrink-0 align-items-center">

                    <!-- Search Mobile -->
                    <div class="input-group-overlay d-lg-none my-3">
                        <div class="input-group-prepend-overlay"><span class="input-group-text"><i class="czi-search"></i></span></div>
                        <input class="form-control prepended-form-control search-products-m-input" type="text" placeholder="{{ trans('master.Search') }}">
                        <button class="input-group-append-overlay btn btn-primary search-products-m-btn" style="border-radius: 0 5px 5px 0;padding-top: 17px;"><i class="czi-search"></i></button>
                    </div>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <a class="navbar-tool navbar-stuck-toggler" href="#">
                        <span class="navbar-tool-tooltip">{{ trans('master.Expand_menu') }}</span>
                        <div class="navbar-tool-icon-box"><i class="navbar-tool-icon czi-menu"></i></div>
                    </a>

                    @if(auth()->check())
                        <a class="rtl-ar navbar-tool ml-1 ml-lg-0 mr-n1 mr-lg-2 d-md-inline-flex d-none fire-loader-anchor" href="{{ route('public.user.show', [auth()->user()->name]) }}">
                            <div class="navbar-tool-icon-box bg-secondary "><i class="navbar-tool-icon czi-user"></i></div>
                            <div class="navbar-tool-text ml-n3"><small>{{ auth()->user()->name }}</small>{{ trans('master.My_Account') }}</div>
                        </a>
                    @else
                        <a class="rtl-ar navbar-tool ml-1 ml-lg-0 mr-n1 mr-lg-2 d-md-inline-flex d-none fire-loader-anchor" href="{{ route('login') }}">
                            <div class="navbar-tool-icon-box bg-secondary "><i class="navbar-tool-icon czi-user"></i></div>
                            <div class="navbar-tool-text ml-n3"><small>{{ trans('master.Hello') }}, {{ trans('master.Sign_in') }}</small>{{ trans('master.My_Account') }}</div>
                        </a>
                    @endif

{{--                    <div class="rtl-ar navbar-tool dropdown rtl-mrl-3 d-md-inline-flex d-none">--}}
                    <div class="rtl-ar navbar-tool rtl-mrl-3 d-md-inline-flex d-none">
                        <a class="navbar-tool-icon-box bg-secondary dropdown-toggle fire-loader-anchor" href="{{ route('public.cart.details') }}">
                            <span class="navbar-tool-label cart-count">{{ $header_cart_product_count }}</span>
                            <i class="navbar-tool-icon czi-cart"></i>
                        </a>

                        <a class="navbar-tool-text fire-loader-anchor" href="{{ route('public.cart.details') }}">
                            <small>{{ trans('master.My_Cart') }}</small><span class="cart-price">{{ $header_cart_price_sum }}</span> EGP</a>

                        <!-- Cart dropdown-->
{{--                        <div class="dropdown-menu dropdown-menu-right" style="width: 20rem;">--}}
{{--                            <div class="widget widget-cart px-3 pt-2 pb-3">--}}
{{--                                <div style="height: 15rem;" data-simplebar data-simplebar-auto-hide="false">--}}
{{--                                    <div class="widget-cart-item pb-2 border-bottom">--}}
{{--                                        <button class="close text-danger" type="button" aria-label="Remove"><span aria-hidden="true">&times;</span></button>--}}
{{--                                        <div class="media align-items-center"><a class="d-block mr-2" href="shop-single-v2.html"><img width="64" src="{{ url('assets_public') }}/img/shop/cart/widget/05.jpg" alt="Product"/></a>--}}
{{--                                            <div class="media-body">--}}
{{--                                                <h6 class="widget-product-title"><a href="shop-single-v2.html">Bluetooth Headphones</a></h6>--}}
{{--                                                <div class="widget-product-meta"><span class="text-accent mr-2">$259.<small>00</small></span><span class="text-muted">x 1</span></div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="widget-cart-item py-2 border-bottom">--}}
{{--                                        <button class="close text-danger" type="button" aria-label="Remove"><span aria-hidden="true">&times;</span></button>--}}
{{--                                        <div class="media align-items-center"><a class="d-block mr-2" href="shop-single-v2.html"><img width="64" src="{{ url('assets_public') }}/img/shop/cart/widget/06.jpg" alt="Product"/></a>--}}
{{--                                            <div class="media-body">--}}
{{--                                                <h6 class="widget-product-title"><a href="shop-single-v2.html">Cloud Security Camera</a></h6>--}}
{{--                                                <div class="widget-product-meta"><span class="text-accent mr-2">$122.<small>00</small></span><span class="text-muted">x 1</span></div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="widget-cart-item py-2 border-bottom">--}}
{{--                                        <button class="close text-danger" type="button" aria-label="Remove"><span aria-hidden="true">&times;</span></button>--}}
{{--                                        <div class="media align-items-center"><a class="d-block mr-2" href="shop-single-v2.html"><img width="64" src="{{ url('assets_public') }}/img/shop/cart/widget/07.jpg" alt="Product"/></a>--}}
{{--                                            <div class="media-body">--}}
{{--                                                <h6 class="widget-product-title"><a href="shop-single-v2.html">Android Smartphone S10</a></h6>--}}
{{--                                                <div class="widget-product-meta"><span class="text-accent mr-2">$799.<small>00</small></span><span class="text-muted">x 1</span></div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="widget-cart-item py-2 border-bottom">--}}
{{--                                        <button class="close text-danger" type="button" aria-label="Remove"><span aria-hidden="true">&times;</span></button>--}}
{{--                                        <div class="media align-items-center"><a class="d-block mr-2" href="shop-single-v2.html"><img width="64" src="{{ url('assets_public') }}/img/shop/cart/widget/08.jpg" alt="Product"/></a>--}}
{{--                                            <div class="media-body">--}}
{{--                                                <h6 class="widget-product-title"><a href="shop-single-v2.html">Android Smart TV Box</a></h6>--}}
{{--                                                <div class="widget-product-meta"><span class="text-accent mr-2">$67.<small>00</small></span><span class="text-muted">x 1</span></div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="d-flex flex-wrap justify-content-between align-items-center py-3">--}}
{{--                                    <div class="font-size-sm mr-2 py-2"><span class="text-muted">Subtotal:</span><span class="text-accent font-size-base ml-1">$1,247.<small>00</small></span></div><a class="btn btn-outline-secondary btn-sm" href="shop-cart.html">Expand cart<i class="czi-arrow-right ml-1 mr-n1"></i></a>--}}
{{--                                </div><a class="btn btn-primary btn-sm btn-block" href="checkout-details.html"><i class="czi-card mr-2 font-size-base align-middle"></i>Checkout</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </div>
                </div>


            </div>
        </div>
        <div class="navbar navbar-expand-lg navbar-light navbar-stuck-menu mt-n2 pt-0 pb-2">
            <div class="container">
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <!-- Departments menu-->
                    <ul class="navbar-nav mega-nav pr-lg-2 mr-lg-2">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle pl-0" href="#" data-toggle="dropdown">
                                <i class="czi-menu align-middle mt-n1 mr-2"></i>{{ trans('master.Departments') }}</a>

                            <ul class="dropdown-menu">
                                @foreach($categories as $category)
                                <li class="dropdown mega-dropdown">
                                    <a class="dropdown-item dropdown-toggle" href="{{ route('public.category.show', $category->slug) }}" data-toggle="dropdown">
                                        <i class="{{ $category->icon }} opacity-60 font-size-lg mt-n1 mr-2"></i>{{ getFromJson($category->name , lang()) }}</a>
                                    <div class="dropdown-menu p-0">
                                        <div class="d-flex flex-wrap flex-md-nowrap px-2">
                                            <div class="mega-dropdown-column py-4 px-3">
                                                <div class="widget widget-links">
                                                    <ul class="widget-list">
                                                        @foreach(\App\Models\Category::getAllBy('parent_id', $category->id) as $child)
                                                        <li class="widget-list-item pb-1">
                                                            <a class="widget-list-link fire-loader-anchor" href="{{ route('public.category.product.index', $child->slug) }}"><i class="{{ $child->icon }} opacity-60 font-size-lg mt-n1 mr-2"></i> {{ getFromJson($child->name , lang()) }}</a>
                                                        </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="mega-dropdown-column d-none d-lg-block py-4 text-center">
                                                <img src="{{ url('assets_public/images/category/picture/'. $category->picture) }}" alt="{{ getFromJson($category->name , lang()) }}"/>
{{--                                                <div class="font-size-sm mb-3">Starting from <span class='font-weight-medium'>$149.<small>80</small></span></div>--}}
                                                <a class="btn btn-primary btn-shadow btn-sm fire-loader-anchor" href="{{ route('public.category.show', $category->slug) }}">{{ trans('navbar.see_all') }}<i class="czi-arrow-right font-size-xs ml-1"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                    <!-- Primary menu-->
                    <ul class="rtl-ar navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link fire-loader-anchor" href="{{ route('public.home') }}"><i style="margin-right: 5px;" class="czi-home"></i> {{ trans('master.Home') }}</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link fire-loader-anchor" href="{{ route('public.store.index') }}"><i style="margin-right: 5px;" class="czi-bag"></i> {{ trans('master.Stores') }}</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link fire-loader-anchor" href="{{ route('public.category.index') }}"><i style="margin-right: 5px;" class="czi-view-grid"></i> {{ trans('master.Categories') }}</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link fire-loader-anchor" href="{{ route('public.brand.index') }}"><i style="margin-right: 5px;" class="czi-bookmark"></i> {{ trans('master.Brands') }}</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link fire-loader-anchor" href="{{ route('public.product.best.index') }}"><i style="margin-right: 5px;" class="czi-diamond"></i> {{ trans('master.Best_Sales') }}</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link fire-loader-anchor" href="{{ route('public.offer.index') }}"><i style="margin-right: 5px;" class="czi-loudspeaker"></i> {{ trans('master.Offers') }}</a>
                        </li>

{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link fire-loader-anchor" href="{{ route('public.product.free.index') }}"><i style="margin-right: 5px;" class="czi-gift"></i> {{ trans('master.By_Free') }}</a>--}}
{{--                        </li>--}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
