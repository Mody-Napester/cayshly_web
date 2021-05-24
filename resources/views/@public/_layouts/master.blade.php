<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('page_title')</title>
    <!-- SEO Meta Tags-->
    <meta name="description" content="Cayshly">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <!-- Viewport-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Favicon and Touch Icons-->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ url('assets_public/img/platform/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ url('assets_public/img/platform/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('assets_public/img/platform/favicon-16x16.png') }}">
{{--    <link rel="manifest" href="{{ url('assets_public/img/platform/site.webmanifest') }}">--}}
    <link rel="mask-icon" color="#fe6a6a" href="{{ url('assets_public/img/platform/safari-pinned-tab.svg') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    @yield('page_meta')
    <!-- Vendor Styles including: Font Icons, Plugins, etc.-->
    <link rel="stylesheet" media="screen" href="{{ url('assets_public/vendor/simplebar/dist/simplebar.min.css') }}"/>
    <link rel="stylesheet" media="screen" href="{{ url('assets_public/vendor/tiny-slider/dist/tiny-slider.css') }}"/>
    <link rel="stylesheet" media="screen" href="{{ url('assets_public/vendor/drift-zoom/dist/drift-basic.min.css') }}"/>
    <link rel="stylesheet" media="all" href="{{ url('assets_public/css/alerts.css') }}"/>
    <link rel="stylesheet" media="all" href="{{ url('assets_public/css/loader.css') }}"/>
    <link rel="stylesheet" media="screen" href="{{ url('assets_public/vendor/lightgallery.js/dist/css/lightgallery.min.css') }}"/>
    <link rel="stylesheet" media="all" href="{{ url('assets_public/css/ltr.css') }}"/>

    <style>
        .my-addresses{
            display: none;
        }
        .cart-addresses{

        }
        .input-group-overlay .prepended-form-control:not(.rounded-left-0){
            padding-right: 40px;
        }
    </style>

    @if(lang() == 'ar')
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700;800&display=swap" rel="stylesheet">
        <link rel="stylesheet" media="all" href="{{ url('assets_public/css/rtl.css') }}"/>
    @endif

    <!-- Main Theme Styles + Bootstrap-->
    <link rel="stylesheet" media="screen" href="{{ url('assets_public/css/theme.min.css') }}">

    @foreach(\App\Models\Script::where('is_active', 1)->get() as $script)
        {!! $script->code !!}
    @endforeach

    <style>
        .my-points-flow{
            background-color: #eeeeee;
            padding: 5px;
            position: fixed;
            right: 0;
            top: 35%;
            z-index: 10000;
        }
    </style>
</head>
<!-- Body-->
<body class="toolbar-enabled bg-gray">

    @if(auth()->check())
        <div class="my-points-flow">
            {{ trans('master.my-points') }}
            <b>{{ user_points(auth()->user()->id)['points'] }}</b>
        </div>
    @endif

@include('@public._layouts.navbar')

@include('@public._partials.alerts')

@yield('page_contents')

<!-- Footer-->
<footer class="bg-dark pt-5">
    <div class="container">
        <div class="row pb-2">
            <div class="col-md-4 col-sm-6">
                <div class="widget widget-links widget-light pb-2 mb-4">
                    <h3 class="widget-title text-light">{{ trans('master.Shop_departments') }}</h3>
                    <ul class="widget-list">
                        @foreach($categories as $category)
                        <li class="widget-list-item"><a class="widget-list-link fire-loader-anchor" href="{{ route('public.category.show', $category->slug) }}">{{ getFromJson($category->name , lang()) }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="widget widget-links widget-light pb-2 mb-4">
                    <h3 class="widget-title text-light">{{ trans('master.Useful_pages') }}</h3>
                    <ul class="widget-list">
                        @foreach($pages as $page)
                            <li class="widget-list-item"><a class="widget-list-link fire-loader-anchor" href="{{ route('public.page.show', $page->slug) }}">{{ getFromJson($page->name , lang()) }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="widget pb-2 mb-4">
                    <h3 class="widget-title text-light pb-1">{{ trans('master.Stay_informed') }}</h3>
                    <form style="direction: ltr;" class="cz-subscribe-form validate" action="" method="post" name="mc-embedded-subscribe-form" target="_blank" novalidate>
                        <div class="input-group input-group-overlay flex-nowrap">
                            <div class="input-group-prepend-overlay">
                                <span class="input-group-text text-muted font-size-base"><i class="czi-mail"></i></span>
                            </div>
                            <input class="form-control prepended-form-control" type="email" name="email" placeholder="{{ trans('master.Your_email') }}" required>
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit" name="subscribe">{{ trans('master.Subscribe') }}*</button>
                            </div>
                        </div>
                        <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                        <div style="position: absolute; left: -5000px;" aria-hidden="true">
                            <input class="cz-subscribe-form-antispam" type="text" name="" tabindex="-1">
                        </div>
                        <small class="form-text text-light opacity-50">
                            *Subscribe to our newsletter to receive early
                            discount offers, updates and new products info.</small>
                        <div class="subscribe-status"></div>
                    </form>
                </div>
{{--                <div class="widget pb-2 mb-4">--}}
{{--                    <h3 class="widget-title text-light pb-1">Download our app</h3>--}}
{{--                    <div class="d-flex flex-wrap">--}}
{{--                        <div class="mr-2 mb-2">--}}
{{--                            <a class="btn-market btn-apple" href="#" role="button">--}}
{{--                                <span class="btn-market-subtitle">Download on the</span>--}}
{{--                                <span class="btn-market-title">App Store</span>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                        <div class="mb-2">--}}
{{--                            <a class="btn-market btn-google" href="#" role="button">--}}
{{--                                <span class="btn-market-subtitle">Download on the</span>--}}
{{--                                <span class="btn-market-title">Google Play</span>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>
    <div class="pt-5 bg-darker">
        <div class="container">
{{--            <div class="row pb-3">--}}
{{--                <div class="col-md-3 col-sm-6 mb-4">--}}
{{--                    <div class="media"><i class="czi-rocket text-primary" style="font-size: 2.25rem;"></i>--}}
{{--                        <div class="media-body pl-3">--}}
{{--                            <h6 class="font-size-base text-light mb-1">Fast and free delivery</h6>--}}
{{--                            <p class="mb-0 font-size-ms text-light opacity-50">Free delivery for all orders over $200</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-md-3 col-sm-6 mb-4">--}}
{{--                    <div class="media"><i class="czi-currency-exchange text-primary" style="font-size: 2.25rem;"></i>--}}
{{--                        <div class="media-body pl-3">--}}
{{--                            <h6 class="font-size-base text-light mb-1">Money back guarantee</h6>--}}
{{--                            <p class="mb-0 font-size-ms text-light opacity-50">We return money within 30 days</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-md-3 col-sm-6 mb-4">--}}
{{--                    <div class="media"><i class="czi-support text-primary" style="font-size: 2.25rem;"></i>--}}
{{--                        <div class="media-body pl-3">--}}
{{--                            <h6 class="font-size-base text-light mb-1">24/7 customer support</h6>--}}
{{--                            <p class="mb-0 font-size-ms text-light opacity-50">Friendly 24/7 customer support</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-md-3 col-sm-6 mb-4">--}}
{{--                    <div class="media"><i class="czi-card text-primary" style="font-size: 2.25rem;"></i>--}}
{{--                        <div class="media-body pl-3">--}}
{{--                            <h6 class="font-size-base text-light mb-1">Secure online payment</h6>--}}
{{--                            <p class="mb-0 font-size-ms text-light opacity-50">We possess SSL / Secure сertificate</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <hr class="hr-light pb-4 mb-3">--}}

            <div class="row pb-2">
                <div class="col-md-6 text-center text-md-left mb-4">
                    <div class="text-nowrap mb-4 rtl-ar">
                        <a class="d-inline-block align-middle mt-n1 rtl-mrl-3" href="#">
                            <img class="d-block" width="117" src="{{ url('assets_public/img/footer-logo-light.png') }}" alt="{{ config('app.name') }}"/>
                        </a>
                    </div>

                    <div class="widget widget-links widget-light">
                        <ul class="widget-list d-flex flex-wrap justify-content-center justify-content-md-start">
                            <li class="widget-list-item mr-4"><a class="widget-list-link fire-loader-anchor" href="{{ route('public.home') }}">{{ trans('master.Home') }}</a></li>
                            <li class="widget-list-item mr-4"><a class="widget-list-link fire-loader-anchor" href="{{ route('public.store.index') }}">{{ trans('master.Stores') }}</a></li>
                            <li class="widget-list-item mr-4"><a class="widget-list-link fire-loader-anchor" href="{{ route('public.category.index') }}">{{ trans('master.Categories') }}</a></li>
                            <li class="widget-list-item mr-4"><a class="widget-list-link fire-loader-anchor" href="{{ route('public.brand.index') }}">{{ trans('master.Brands') }}</a></li>
                            <li class="widget-list-item mr-4"><a class="widget-list-link fire-loader-anchor" href="{{ route('public.product.best.index') }}">{{ trans('master.Best_Sales') }}</a></li>
                            <li class="widget-list-item mr-4"><a class="widget-list-link fire-loader-anchor" href="{{ route('public.offer.index') }}">{{ trans('master.Offers') }}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 text-center text-md-right mb-4">
                    <div class="mb-3">
                        @foreach($socials as $social)
                        <a class="social-btn sb-light sb-{{ strtolower($social->provider->name) }} ml-2 mb-2 fire-loader-anchor" title="{{ $social->name }}" href="{{ $social->link }}"><i class="czi-{{ strtolower($social->provider->name) }}"></i></a>
                        @endforeach
                    </div>
                    <img class="d-inline-block" width="80" src="{{ url('assets_public/img/ssl.png') }}" alt="{{ trans('master.Payment_methods') }}"/>
                </div>
            </div>

            <div class="pb-4 font-size-xs text-light opacity-50 text-center">© {{ trans('master.All_rights_reserved') }}.</div>

        </div>
    </div>
</footer>

<!-- Toolbar for handheld devices-->
<div class="cz-handheld-toolbar">
    <div class="d-table table-fixed w-100">
        <a class="d-table-cell cz-handheld-toolbar-item fire-loader-anchor" href="{{ route('public.category.index') }}">
            <span class="cz-handheld-toolbar-icon"><i class="czi-view-grid"></i></span>
            <span class="cz-handheld-toolbar-label">{{ trans('master.Categories') }}</span>
        </a>
{{--        <a class="d-table-cell cz-handheld-toolbar-item fire-loader-anchor" href="{{ route('public.store.index') }}">--}}
{{--            <span class="cz-handheld-toolbar-icon"><i class="czi-bag"></i></span>--}}
{{--            <span class="cz-handheld-toolbar-label">{{ trans('master.Stores') }}</span>--}}
{{--        </a>--}}
        <a class="d-table-cell cz-handheld-toolbar-item fire-loader-anchor" href="{{ route('public.offer.index') }}">
            <span class="cz-handheld-toolbar-icon"><i class="czi-loudspeaker"></i></span>
            <span class="cz-handheld-toolbar-label">{{ trans('master.Offers') }}</span>
        </a>
        <a class="d-table-cell cz-handheld-toolbar-item fire-loader-anchor" href="{{ route('public.cart.details') }}">
              <span class="cz-handheld-toolbar-icon">
                  <i class="czi-cart"></i>
                  <span class="badge badge-primary badge-pill ml-1 cart-count">{{ $header_cart_product_count }}</span>
              </span>
            <span class="cz-handheld-toolbar-label"><span class="cart-price">{{ $header_cart_price_sum }}</span> EGP</span>
        </a>
        <a class="d-table-cell cz-handheld-toolbar-item fire-loader-anchor" href="{{ route('public.home') }}">
            <span class="cz-handheld-toolbar-icon"><i class="czi-home"></i></span>
            <span class="cz-handheld-toolbar-label">{{ trans('master.Home') }}</span>
        </a>

        @if(auth()->check())
            <a class="d-table-cell cz-handheld-toolbar-item fire-loader-anchor" href="{{ route('public.user.show', [auth()->user()->name]) }}">
                <span class="cz-handheld-toolbar-icon"><i class="czi-user"></i></span>
                <span class="cz-handheld-toolbar-label">{{ trans('master.My_Account') }}</span>
            </a>
        @else
            <a class="d-table-cell cz-handheld-toolbar-item fire-loader-anchor" href="{{ route('login') }}">
                <span class="cz-handheld-toolbar-icon"><i class="czi-user"></i></span>
                <span class="cz-handheld-toolbar-label">{{ trans('master.My_Account') }}</span>
            </a>
        @endif

{{--        <a class="d-table-cell cz-handheld-toolbar-item" href="#navbarCollapse" data-toggle="collapse"--}}
{{--           onclick="window.scrollTo(0, 0)">--}}
{{--            <span class="cz-handheld-toolbar-icon"><i class="czi-menu"></i></span>--}}
{{--            <span class="cz-handheld-toolbar-label">Menu</span>--}}
{{--        </a>--}}
    </div>
</div>

    <!-- Modal -->
    <div style="direction: rtl;text-align: right" class="modal fade" id="ask_us" tabindex="-1" role="dialog" aria-labelledby="askUSModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('public.store') }}" class="ask_us_form" method="post">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="askUSModalLabel">{{ trans('master.Contact_us') }}</h5>
{{--                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                            <span aria-hidden="true">&times;</span>--}}
{{--                        </button>--}}
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" id="email" placeholder="{{ trans('master.email') }}">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="phone" id="phone" placeholder="{{ trans('master.phone') }}">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="message" id="message" placeholder="{{ trans('master.message') }}"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">{{ trans('master.Save') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@include('@public._popups.add_to_cart')

<!-- Back To Top Button-->
<a class="btn-scroll-top" href="#top" data-scroll>
    <span class="btn-scroll-top-tooltip text-muted font-size-sm mr-2">{{ trans('master.Top') }}</span>
    <i class="btn-scroll-top-icon czi-arrow-up"></i>
</a>

<!-- Vendor scrits: js libraries and plugins-->
{{--<script src="{{ url('assets_public/vendor/jquery/dist/jquery.slim.min.js') }}"></script>--}}
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

<script src="{{ url('assets_public/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ url('assets_public/vendor/bs-custom-file-input/dist/bs-custom-file-input.min.js') }}"></script>
<script src="{{ url('assets_public/vendor/simplebar/dist/simplebar.min.js') }}"></script>
<script src="{{ url('assets_public/vendor/tiny-slider/dist/min/tiny-slider.js') }}"></script>
<script src="{{ url('assets_public/vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js') }}"></script>
<script src="{{ url('assets_public/vendor/drift-zoom/dist/Drift.min.js') }}"></script>
<script src="{{ url('assets_public/vendor/lightgallery.js/dist/js/lightgallery.min.js') }}"></script>
<script src="{{ url('assets_public/js/alerts.js') }}"></script>
<script src="{{ url('assets_public/js/loader.js') }}"></script>
<script src="{{ url('assets_public/vendor/lg-video.js/dist/lg-video.min.js') }}"></script>
<!-- Main theme script-->
<script src="{{ url('assets_public/js/theme.min.js') }}"></script>

@include('@public._scripts.search')
@include('@public._scripts.add_to_cart')
@include('@public._scripts.remove_from_cart')
@include('@public._scripts.ask_us')

@yield('page_scripts')

</body>

</html>
