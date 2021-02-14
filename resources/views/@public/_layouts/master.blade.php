<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('page_title')</title>
    <!-- SEO Meta Tags-->
    <meta name="description" content="Cayshly - Bootstrap E-commerce Template">
    <meta name="keywords" content="bootstrap, shop, e-commerce, market, modern, responsive,  business, mobile, bootstrap 4, html5, css3, jquery, js, gallery, slider, touch, creative, clean">
    <meta name="author" content="Createx Studio">
    <!-- Viewport-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon and Touch Icons-->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ url('assets_public/img/platform/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ url('assets_public/img/platform/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('assets_public/img/platform/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ url('assets_public/img/platform/site.webmanifest') }}">
    <link rel="mask-icon" color="#fe6a6a" href="{{ url('assets_public/img/platform/safari-pinned-tab.svg') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <!-- Vendor Styles including: Font Icons, Plugins, etc.-->
    <link rel="stylesheet" media="screen" href="{{ url('assets_public/vendor/simplebar/dist/simplebar.min.css') }}"/>
    <link rel="stylesheet" media="screen" href="{{ url('assets_public/vendor/tiny-slider/dist/tiny-slider.css') }}"/>
    <link rel="stylesheet" media="screen" href="{{ url('assets_public/vendor/drift-zoom/dist/drift-basic.min.css') }}"/>
    <link rel="stylesheet" media="screen" href="{{ url('assets_public/vendor/lightgallery.js/dist/css/lightgallery.min.css') }}"/>
    <!-- Main Theme Styles + Bootstrap-->
    <link rel="stylesheet" media="screen" href="{{ url('assets_public/css/theme.min.css') }}">
  </head>
  <!-- Body-->
  <body class="toolbar-enabled">
    <!-- Sign in / sign up modal-->
    <div class="modal fade" id="signin-modal" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <ul class="nav nav-tabs card-header-tabs" role="tablist">
              <li class="nav-item"><a class="nav-link active" href="#signin-tab" data-toggle="tab" role="tab" aria-selected="true"><i class="czi-unlocked mr-2 mt-n1"></i>Sign in</a></li>
              <li class="nav-item"><a class="nav-link" href="#signup-tab" data-toggle="tab" role="tab" aria-selected="false"><i class="czi-user mr-2 mt-n1"></i>Sign up</a></li>
            </ul>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body tab-content py-4">
            <form class="needs-validation tab-pane fade show active" autocomplete="off" novalidate id="signin-tab">
              <div class="form-group">
                <label for="si-email">Email address</label>
                <input class="form-control" type="email" id="si-email" placeholder="johndoe@example.com" required>
                <div class="invalid-feedback">Please provide a valid email address.</div>
              </div>
              <div class="form-group">
                <label for="si-password">Password</label>
                <div class="password-toggle">
                  <input class="form-control" type="password" id="si-password" required>
                  <label class="password-toggle-btn">
                    <input class="custom-control-input" type="checkbox"><i class="czi-eye password-toggle-indicator"></i><span class="sr-only">Show password</span>
                  </label>
                </div>
              </div>
              <div class="form-group d-flex flex-wrap justify-content-between">
                <div class="custom-control custom-checkbox mb-2">
                  <input class="custom-control-input" type="checkbox" id="si-remember">
                  <label class="custom-control-label" for="si-remember">Remember me</label>
                </div><a class="font-size-sm" href="#">Forgot password?</a>
              </div>
              <button class="btn btn-primary btn-block btn-shadow" type="submit">Sign in</button>
            </form>
            <form class="needs-validation tab-pane fade" autocomplete="off" novalidate id="signup-tab">
              <div class="form-group">
                <label for="su-name">Full name</label>
                <input class="form-control" type="text" id="su-name" placeholder="John Doe" required>
                <div class="invalid-feedback">Please fill in your name.</div>
              </div>
              <div class="form-group">
                <label for="su-email">Email address</label>
                <input class="form-control" type="email" id="su-email" placeholder="johndoe@example.com" required>
                <div class="invalid-feedback">Please provide a valid email address.</div>
              </div>
              <div class="form-group">
                <label for="su-password">Password</label>
                <div class="password-toggle">
                  <input class="form-control" type="password" id="su-password" required>
                  <label class="password-toggle-btn">
                    <input class="custom-control-input" type="checkbox"><i class="czi-eye password-toggle-indicator"></i><span class="sr-only">Show password</span>
                  </label>
                </div>
              </div>
              <div class="form-group">
                <label for="su-password-confirm">Confirm password</label>
                <div class="password-toggle">
                  <input class="form-control" type="password" id="su-password-confirm" required>
                  <label class="password-toggle-btn">
                    <input class="custom-control-input" type="checkbox"><i class="czi-eye password-toggle-indicator"></i><span class="sr-only">Show password</span>
                  </label>
                </div>
              </div>
              <button class="btn btn-primary btn-block btn-shadow" type="submit">Sign up</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Quick View Modal-->
    @include('@public._partials.quick_view')

    <!-- Navbar Store-->
    @include('@public._layouts.navbar')

    <!-- Hero (Banners + Slider)-->
    @include('@public._partials.slider')

    <!-- Products grid (Trending products)-->
    <section class="container pt-5">
      <!-- Heading-->
      <div class="d-flex flex-wrap justify-content-between align-items-center pt-1 border-bottom pb-4 mb-4">
        <h2 class="h3 mb-0 pt-3 mr-2">Trending products</h2>
        <div class="pt-3"><a class="btn btn-outline-accent btn-sm" href="shop-grid-ls.html">More products<i class="czi-arrow-right ml-1 mr-n1"></i></a></div>
      </div>
      <!-- Grid-->
      <div class="row pt-2 mx-n2">
        <!-- Product-->
        <div class="col-lg-3 col-md-4 col-sm-6 px-2 mb-4">
          <div class="card product-card">
            <div class="product-card-actions d-flex align-items-center"><a class="btn-action nav-link-style mr-2" href="#"><i class="czi-compare mr-1"></i>Compare</a>
              <button class="btn-wishlist btn-sm" type="button" data-toggle="tooltip" data-placement="left" title="Add to wishlist"><i class="czi-heart"></i></button>
            </div><a class="card-img-top d-block overflow-hidden" href="shop-single-v2.html"><img src="{{ url('assets_public') }}/img/shop/catalog/58.jpg" alt="Product"></a>
            <div class="card-body py-2"><a class="product-meta d-block font-size-xs pb-1" href="#">Headphones</a>
              <h3 class="product-title font-size-sm"><a href="shop-single-v2.html">Wireless Bluetooth Headphones</a></h3>
              <div class="d-flex justify-content-between">
                <div class="product-price"><span class="text-accent">$198.<small>00</small></span></div>
                <div class="star-rating"><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star-filled active"></i>
                </div>
              </div>
            </div>
            <div class="card-body card-body-hidden">
              <button class="btn btn-primary btn-sm btn-block mb-2" type="button" data-toggle="toast" data-target="#cart-toast"><i class="czi-cart font-size-sm mr-1"></i>Add to Cart</button>
              <div class="text-center"><a class="nav-link-style font-size-ms" href="#quick-view-electro" data-toggle="modal"><i class="czi-eye align-middle mr-1"></i>Quick view</a></div>
            </div>
          </div>
          <hr class="d-sm-none">
        </div>
        <!-- Product-->
        <div class="col-lg-3 col-md-4 col-sm-6 px-2 mb-4">
          <div class="card product-card"><span class="badge badge-danger badge-shadow">Sale</span>
            <div class="product-card-actions d-flex align-items-center"><a class="btn-action nav-link-style mr-2" href="#"><i class="czi-compare mr-1"></i>Compare</a>
              <button class="btn-wishlist btn-sm" type="button" data-toggle="tooltip" data-placement="left" title="Add to wishlist"><i class="czi-heart"></i></button>
            </div><a class="card-img-top d-block overflow-hidden" href="shop-single-v2.html"><img src="{{ url('assets_public') }}/img/shop/catalog/59.jpg" alt="Product"></a>
            <div class="card-body py-2"><a class="product-meta d-block font-size-xs pb-1" href="#">Computers</a>
              <h3 class="product-title font-size-sm"><a href="shop-single-v2.html">AirPort Extreme Base Station</a></h3>
              <div class="d-flex justify-content-between">
                <div class="product-price"><span class="text-accent">$98.<small>50</small></span>
                  <del class="font-size-sm text-muted">$149.<small>99</small></del>
                </div>
                <div class="star-rating"><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star"></i>
                </div>
              </div>
            </div>
            <div class="card-body card-body-hidden">
              <button class="btn btn-primary btn-sm btn-block mb-2" type="button" data-toggle="toast" data-target="#cart-toast"><i class="czi-cart font-size-sm mr-1"></i>Add to Cart</button>
              <div class="text-center"><a class="nav-link-style font-size-ms" href="#quick-view-electro" data-toggle="modal"><i class="czi-eye align-middle mr-1"></i>Quick view</a></div>
            </div>
          </div>
          <hr class="d-sm-none">
        </div>
        <!-- Product-->
        <div class="col-lg-3 col-md-4 col-sm-6 px-2 mb-4">
          <div class="card product-card">
            <div class="product-card-actions d-flex align-items-center"><a class="btn-action nav-link-style mr-2" href="#"><i class="czi-compare mr-1"></i>Compare</a>
              <button class="btn-wishlist btn-sm" type="button" data-toggle="tooltip" data-placement="left" title="Add to wishlist"><i class="czi-heart"></i></button>
            </div><a class="card-img-top d-block overflow-hidden" href="shop-single-v2.html"><img src="{{ url('assets_public') }}/img/shop/catalog/60.jpg" alt="Product"></a>
            <div class="card-body py-2"><a class="product-meta d-block font-size-xs pb-1" href="#">TV, Video &amp; Audio</a>
              <h3 class="product-title font-size-sm"><a href="shop-single-v2.html">Smart TV LED 49’’ Ultra HD</a></h3>
              <div class="d-flex justify-content-between">
                <div class="product-price"><span class="text-muted font-size-sm">Out of stock</span></div>
              </div>
            </div>
            <div class="card-body card-body-hidden"><a class="btn btn-secondary btn-sm btn-block mb-2" href="shop-single-v2.html">View details</a>
              <div class="text-center"><a class="nav-link-style font-size-ms" href="#quick-view-electro" data-toggle="modal"><i class="czi-eye align-middle mr-1"></i>Quick view</a></div>
            </div>
          </div>
          <hr class="d-sm-none">
        </div>
        <!-- Product-->
        <div class="col-lg-3 col-md-4 col-sm-6 px-2 mb-4">
          <div class="card product-card">
            <div class="product-card-actions d-flex align-items-center"><a class="btn-action nav-link-style mr-2" href="#"><i class="czi-compare mr-1"></i>Compare</a>
              <button class="btn-wishlist btn-sm" type="button" data-toggle="tooltip" data-placement="left" title="Add to wishlist"><i class="czi-heart"></i></button>
            </div><a class="card-img-top d-block overflow-hidden" href="shop-single-v2.html"><img src="{{ url('assets_public') }}/img/shop/catalog/61.jpg" alt="Product"></a>
            <div class="card-body py-2"><a class="product-meta d-block font-size-xs pb-1" href="#">Smart Home</a>
              <h3 class="product-title font-size-sm"><a href="shop-single-v2.html">Smart Speaker with Voice Control</a></h3>
              <div class="d-flex justify-content-between">
                <div class="product-price"><span class="text-accent">$49.<small>99</small></span></div>
                <div class="star-rating"><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star"></i>
                </div>
              </div>
            </div>
            <div class="card-body card-body-hidden">
              <button class="btn btn-primary btn-sm btn-block mb-2" type="button" data-toggle="toast" data-target="#cart-toast"><i class="czi-cart font-size-sm mr-1"></i>Add to Cart</button>
              <div class="text-center"><a class="nav-link-style font-size-ms" href="#quick-view-electro" data-toggle="modal"><i class="czi-eye align-middle mr-1"></i>Quick view</a></div>
            </div>
          </div>
          <hr class="d-sm-none">
        </div>
        <!-- Product-->
        <div class="col-lg-3 col-md-4 col-sm-6 px-2 mb-4">
          <div class="card product-card">
            <div class="product-card-actions d-flex align-items-center"><a class="btn-action nav-link-style mr-2" href="#"><i class="czi-compare mr-1"></i>Compare</a>
              <button class="btn-wishlist btn-sm" type="button" data-toggle="tooltip" data-placement="left" title="Add to wishlist"><i class="czi-heart"></i></button>
            </div><a class="card-img-top d-block overflow-hidden" href="shop-single-v2.html"><img src="{{ url('assets_public') }}/img/shop/catalog/62.jpg" alt="Product"></a>
            <div class="card-body py-2"><a class="product-meta d-block font-size-xs pb-1" href="#">Wearable Electronics</a>
              <h3 class="product-title font-size-sm"><a href="shop-single-v2.html">Fitness GPS Smart Watch</a></h3>
              <div class="d-flex justify-content-between">
                <div class="product-price"><span class="text-accent">$317.<small>40</small></span></div>
                <div class="star-rating"><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star"></i>
                </div>
              </div>
            </div>
            <div class="card-body card-body-hidden">
              <button class="btn btn-primary btn-sm btn-block mb-2" type="button" data-toggle="toast" data-target="#cart-toast"><i class="czi-cart font-size-sm mr-1"></i>Add to Cart</button>
              <div class="text-center"><a class="nav-link-style font-size-ms" href="#quick-view-electro" data-toggle="modal"><i class="czi-eye align-middle mr-1"></i>Quick view</a></div>
            </div>
          </div>
          <hr class="d-sm-none">
        </div>
        <!-- Product-->
        <div class="col-lg-3 col-md-4 col-sm-6 px-2 mb-4">
          <div class="card product-card">
            <div class="product-card-actions d-flex align-items-center"><a class="btn-action nav-link-style mr-2" href="#"><i class="czi-compare mr-1"></i>Compare</a>
              <button class="btn-wishlist btn-sm" type="button" data-toggle="tooltip" data-placement="left" title="Add to wishlist"><i class="czi-heart"></i></button>
            </div><a class="card-img-top d-block overflow-hidden" href="shop-single-v2.html"><img src="{{ url('assets_public') }}/img/shop/catalog/63.jpg" alt="Product"></a>
            <div class="card-body py-2"><a class="product-meta d-block font-size-xs pb-1" href="#">Smartphones</a>
              <h3 class="product-title font-size-sm"><a href="shop-single-v2.html">Popular Smartphone 128GB</a></h3>
              <div class="d-flex justify-content-between">
                <div class="product-price"><span class="text-accent">$965.<small>00</small></span></div>
                <div class="star-rating"><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star-filled active"></i>
                </div>
              </div>
            </div>
            <div class="card-body card-body-hidden">
              <button class="btn btn-primary btn-sm btn-block mb-2" type="button" data-toggle="toast" data-target="#cart-toast"><i class="czi-cart font-size-sm mr-1"></i>Add to Cart</button>
              <div class="text-center"><a class="nav-link-style font-size-ms" href="#quick-view-electro" data-toggle="modal"><i class="czi-eye align-middle mr-1"></i>Quick view</a></div>
            </div>
          </div>
          <hr class="d-sm-none">
        </div>
        <!-- Product-->
        <div class="col-lg-3 col-md-4 col-sm-6 px-2 mb-4">
          <div class="card product-card"><span class="badge badge-info badge-shadow">New</span>
            <div class="product-card-actions d-flex align-items-center"><a class="btn-action nav-link-style mr-2" href="#"><i class="czi-compare mr-1"></i>Compare</a>
              <button class="btn-wishlist btn-sm" type="button" data-toggle="tooltip" data-placement="left" title="Add to wishlist"><i class="czi-heart"></i></button>
            </div><a class="card-img-top d-block overflow-hidden" href="shop-single-v2.html"><img src="{{ url('assets_public') }}/img/shop/catalog/64.jpg" alt="Product"></a>
            <div class="card-body py-2"><a class="product-meta d-block font-size-xs pb-1" href="#">Wearable Electronics</a>
              <h3 class="product-title font-size-sm"><a href="shop-single-v2.html">Smart Watch Series 5, Aluminium</a></h3>
              <div class="d-flex justify-content-between">
                <div class="product-price"><span class="text-accent">$349.<small>99</small></span></div>
                <div class="star-rating"><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star"></i>
                </div>
              </div>
            </div>
            <div class="card-body card-body-hidden">
              <button class="btn btn-primary btn-sm btn-block mb-2" type="button" data-toggle="toast" data-target="#cart-toast"><i class="czi-cart font-size-sm mr-1"></i>Add to Cart</button>
              <div class="text-center"><a class="nav-link-style font-size-ms" href="#quick-view-electro" data-toggle="modal"><i class="czi-eye align-middle mr-1"></i>Quick view</a></div>
            </div>
          </div>
          <hr class="d-sm-none">
        </div>
        <!-- Product-->
        <div class="col-lg-3 col-md-4 col-sm-6 px-2">
          <div class="card product-card">
            <div class="product-card-actions d-flex align-items-center"><a class="btn-action nav-link-style mr-2" href="#"><i class="czi-compare mr-1"></i>Compare</a>
              <button class="btn-wishlist btn-sm" type="button" data-toggle="tooltip" data-placement="left" title="Add to wishlist"><i class="czi-heart"></i></button>
            </div><a class="card-img-top d-block overflow-hidden" href="shop-single-v2.html"><img src="{{ url('assets_public') }}/img/shop/catalog/65.jpg" alt="Product"></a>
            <div class="card-body py-2"><a class="product-meta d-block font-size-xs pb-1" href="#">Computers</a>
              <h3 class="product-title font-size-sm"><a href="shop-single-v2.html">Convertible 2-in-1 HD Laptop</a></h3>
              <div class="d-flex justify-content-between">
                <div class="product-price"><span class="text-accent">$412.<small>00</small></span></div>
              </div>
            </div>
            <div class="card-body card-body-hidden">
              <button class="btn btn-primary btn-sm btn-block mb-2" type="button" data-toggle="toast" data-target="#cart-toast"><i class="czi-cart font-size-sm mr-1"></i>Add to Cart</button>
              <div class="text-center"><a class="nav-link-style font-size-ms" href="#quick-view-electro" data-toggle="modal"><i class="czi-eye align-middle mr-1"></i>Quick view</a></div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Promo banner-->
    <section class="container mt-4 mb-grid-gutter">
      <div class="bg-faded-info rounded-lg py-4">
        <div class="row align-items-center">
          <div class="col-md-5">
            <div class="px-4 pr-sm-0 pl-sm-5"><span class="badge badge-danger">Limited Offer</span>
              <h3 class="mt-4 mb-1 text-body font-weight-light">All new</h3>
              <h2 class="mb-1">Last Gen iPad Pro</h2>
              <p class="h5 text-body font-weight-light">at discounted price. Hurry up!</p>
              <div class="cz-countdown py-2 h4" data-countdown="07/01/2021 07:00:00 PM">
                <div class="cz-countdown-days"><span class="cz-countdown-value"></span><span class="cz-countdown-label text-muted">d</span></div>
                <div class="cz-countdown-hours"><span class="cz-countdown-value"></span><span class="cz-countdown-label text-muted">h</span></div>
                <div class="cz-countdown-minutes"><span class="cz-countdown-value"></span><span class="cz-countdown-label text-muted">m</span></div>
                <div class="cz-countdown-seconds"><span class="cz-countdown-value"></span><span class="cz-countdown-label text-muted">s</span></div>
              </div><a class="btn btn-accent" href="#">View offers<i class="czi-arrow-right font-size-ms ml-1"></i></a>
            </div>
          </div>
          <div class="col-md-7"><img src="{{ url('assets_public') }}/img/home/banners/offer.jpg" alt="iPad Pro Offer"></div>
        </div>
      </div>
    </section>
    <!-- Brands carousel-->
    <section class="container mb-5">
      <div class="cz-carousel border-right">
        <div class="cz-carousel-inner" data-carousel-options="{ &quot;nav&quot;: false, &quot;controls&quot;: false, &quot;autoplay&quot;: true, &quot;autoplayTimeout&quot;: 4000, &quot;loop&quot;: true, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;360&quot;:{&quot;items&quot;:2},&quot;600&quot;:{&quot;items&quot;:3},&quot;991&quot;:{&quot;items&quot;:4},&quot;1200&quot;:{&quot;items&quot;:4}} }">
          <div><a class="d-block bg-white border py-4 py-sm-5 px-2" href="#" style="margin-right: -.0625rem;"><img class="d-block mx-auto" src="{{ url('assets_public') }}/img/shop/brands/13.png" style="width: 165px;" alt="Brand"></a></div>
          <div><a class="d-block bg-white border py-4 py-sm-5 px-2" href="#" style="margin-right: -.0625rem;"><img class="d-block mx-auto" src="{{ url('assets_public') }}/img/shop/brands/14.png" style="width: 165px;" alt="Brand"></a></div>
          <div><a class="d-block bg-white border py-4 py-sm-5 px-2" href="#" style="margin-right: -.0625rem;"><img class="d-block mx-auto" src="{{ url('assets_public') }}/img/shop/brands/17.png" style="width: 165px;" alt="Brand"></a></div>
          <div><a class="d-block bg-white border py-4 py-sm-5 px-2" href="#" style="margin-right: -.0625rem;"><img class="d-block mx-auto" src="{{ url('assets_public') }}/img/shop/brands/16.png" style="width: 165px;" alt="Brand"></a></div>
          <div><a class="d-block bg-white border py-4 py-sm-5 px-2" href="#" style="margin-right: -.0625rem;"><img class="d-block mx-auto" src="{{ url('assets_public') }}/img/shop/brands/15.png" style="width: 165px;" alt="Brand"></a></div>
          <div><a class="d-block bg-white border py-4 py-sm-5 px-2" href="#" style="margin-right: -.0625rem;"><img class="d-block mx-auto" src="{{ url('assets_public') }}/img/shop/brands/18.png" style="width: 165px;" alt="Brand"></a></div>
          <div><a class="d-block bg-white border py-4 py-sm-5 px-2" href="#" style="margin-right: -.0625rem;"><img class="d-block mx-auto" src="{{ url('assets_public') }}/img/shop/brands/19.png" style="width: 165px;" alt="Brand"></a></div>
          <div><a class="d-block bg-white border py-4 py-sm-5 px-2" href="#" style="margin-right: -.0625rem;"><img class="d-block mx-auto" src="{{ url('assets_public') }}/img/shop/brands/20.png" style="width: 165px;" alt="Brand"></a></div>
        </div>
      </div>
    </section>
    <!-- Product widgets-->
    <section class="container pb-4 pb-md-5">
      <div class="row">
        <!-- Bestsellers-->
        <div class="col-lg-4 col-md-6 mb-2 py-3">
          <div class="widget">
            <h3 class="widget-title">Bestsellers</h3>
            <div class="media align-items-center pb-2 border-bottom"><a class="d-block mr-2" href="shop-single-v2.html"><img width="64" src="{{ url('assets_public') }}/img/shop/cart/widget/05.jpg" alt="Product"/></a>
              <div class="media-body">
                <h6 class="widget-product-title"><a href="shop-single-v2.html">Wireless Bluetooth Headphones</a></h6>
                <div class="widget-product-meta"><span class="text-accent">$259.<small>00</small></span></div>
              </div>
            </div>
            <div class="media align-items-center py-2 border-bottom"><a class="d-block mr-2" href="shop-single-v2.html"><img width="64" src="{{ url('assets_public') }}/img/shop/cart/widget/06.jpg" alt="Product"/></a>
              <div class="media-body">
                <h6 class="widget-product-title"><a href="shop-single-v2.html">Cloud Security Camera</a></h6>
                <div class="widget-product-meta"><span class="text-accent">$122.<small>00</small></span></div>
              </div>
            </div>
            <div class="media align-items-center py-2 border-bottom"><a class="d-block mr-2" href="shop-single-v2.html"><img width="64" src="{{ url('assets_public') }}/img/shop/cart/widget/07.jpg" alt="Product"/></a>
              <div class="media-body">
                <h6 class="widget-product-title"><a href="shop-single-v2.html">Android Smartphone S10</a></h6>
                <div class="widget-product-meta"><span class="text-accent">$799.<small>00</small></span></div>
              </div>
            </div>
            <div class="media align-items-center py-2"><a class="d-block mr-2" href="shop-single-v2.html"><img width="64" src="{{ url('assets_public') }}/img/shop/cart/widget/08.jpg" alt="Product"/></a>
              <div class="media-body">
                <h6 class="widget-product-title"><a href="shop-single-v2.html">Android Smart TV Box</a></h6>
                <div class="widget-product-meta"><span class="text-accent">$67.<small>00</small></span>
                  <del class="text-muted font-size-xs">$90.<small>43</small></del>
                </div>
              </div>
            </div>
            <p class="mb-0">...</p><a class="font-size-sm" href="shop-grid-ls.html">View more<i class="czi-arrow-right font-size-xs ml-1"></i></a>
          </div>
        </div>
        <!-- New arrivals-->
        <div class="col-lg-4 col-md-6 mb-2 py-3">
          <div class="widget">
            <h3 class="widget-title">New arrivals</h3>
            <div class="media align-items-center pb-2 border-bottom"><a class="d-block mr-2" href="shop-single-v2.html"><img width="64" src="{{ url('assets_public') }}/img/shop/widget/06.jpg" alt="Product"/></a>
              <div class="media-body">
                <h6 class="widget-product-title"><a href="shop-single-v2.html">Monoblock Desktop PC</a></h6>
                <div class="widget-product-meta"><span class="text-accent">$1,949.<small>00</small></span></div>
              </div>
            </div>
            <div class="media align-items-center py-2 border-bottom"><a class="d-block mr-2" href="shop-single-v2.html"><img width="64" src="{{ url('assets_public') }}/img/shop/widget/07.jpg" alt="Product"/></a>
              <div class="media-body">
                <h6 class="widget-product-title"><a href="shop-single-v2.html">Laserjet Printer All-in-One</a></h6>
                <div class="widget-product-meta"><span class="text-accent">$428.<small>60</small></span></div>
              </div>
            </div>
            <div class="media align-items-center py-2 border-bottom"><a class="d-block mr-2" href="shop-single-v2.html"><img width="64" src="{{ url('assets_public') }}/img/shop/widget/08.jpg" alt="Product"/></a>
              <div class="media-body">
                <h6 class="widget-product-title"><a href="shop-single-v2.html">Console Controller Charger</a></h6>
                <div class="widget-product-meta"><span class="text-accent">$14.<small>97</small></span>
                  <del class="text-muted font-size-xs">$16.<small>47</small></del>
                </div>
              </div>
            </div>
            <div class="media align-items-center py-2"><a class="d-block mr-2" href="shop-single-v2.html"><img width="64" src="{{ url('assets_public') }}/img/shop/widget/09.jpg" alt="Product"/></a>
              <div class="media-body">
                <h6 class="widget-product-title"><a href="shop-single-v2.html">Smart Watch Series 5, Aluminium</a></h6>
                <div class="widget-product-meta"><span class="text-accent">$349.<small>99</small></span></div>
              </div>
            </div>
            <p class="mb-0">...</p><a class="font-size-sm" href="shop-grid-ls.html">View more<i class="czi-arrow-right font-size-xs ml-1"></i></a>
          </div>
        </div>
        <!-- Top rated-->
        <div class="col-lg-4 col-md-6 mb-2 py-3">
          <div class="widget">
            <h3 class="widget-title">Top rated</h3>
            <div class="media align-items-center pb-2 border-bottom"><a class="d-block mr-2" href="shop-single-v2.html"><img width="64" src="{{ url('assets_public') }}/img/shop/widget/10.jpg" alt="Product"/></a>
              <div class="media-body">
                <h6 class="widget-product-title"><a href="shop-single-v2.html">Android Smartphone S9</a></h6>
                <div class="widget-product-meta"><span class="text-accent">$749.<small>99</small></span>
                  <del class="text-muted font-size-xs">$859.<small>99</small></del>
                </div>
              </div>
            </div>
            <div class="media align-items-center py-2 border-bottom"><a class="d-block mr-2" href="shop-single-v2.html"><img width="64" src="{{ url('assets_public') }}/img/shop/widget/11.jpg" alt="Product"/></a>
              <div class="media-body">
                <h6 class="widget-product-title"><a href="shop-single-v2.html">Wireless Bluetooth Headphones</a></h6>
                <div class="widget-product-meta"><span class="text-accent">$428.<small>60</small></span></div>
              </div>
            </div>
            <div class="media align-items-center py-2 border-bottom"><a class="d-block mr-2" href="shop-single-v2.html"><img width="64" src="{{ url('assets_public') }}/img/shop/widget/12.jpg" alt="Product"/></a>
              <div class="media-body">
                <h6 class="widget-product-title"><a href="shop-single-v2.html">360 Degrees Camera</a></h6>
                <div class="widget-product-meta"><span class="text-accent">$98.<small>75</small></span></div>
              </div>
            </div>
            <div class="media align-items-center py-2"><a class="d-block mr-2" href="shop-single-v2.html"><img width="64" src="{{ url('assets_public') }}/img/shop/widget/13.jpg" alt="Product"/></a>
              <div class="media-body">
                <h6 class="widget-product-title"><a href="shop-single-v2.html">Digital Camera 40MP</a></h6>
                <div class="widget-product-meta"><span class="text-accent">$210.<small>00</small></span>
                  <del class="text-muted font-size-xs">$249.<small>00</small></del>
                </div>
              </div>
            </div>
            <p class="mb-0">...</p><a class="font-size-sm" href="shop-grid-ls.html">View more<i class="czi-arrow-right font-size-xs ml-1"></i></a>
          </div>
        </div>
      </div>
    </section>
    <!-- YouTube feed-->
    <section class="container pb-5 mb-md-3">
      <div class="border rounded-lg p-3">
        <div class="row">
          <div class="col-md-4 mb-3 mb-md-0">
            <div class="bg-secondary p-5 text-center"><img class="d-block mb-4 mx-auto" src="{{ url('assets_public') }}/img/home/yt-logo.png" width="120" alt="YouTube">
              <div class="media justify-content-center align-items-center mb-4"><img class="mr-2" src="{{ url('assets_public') }}/img/home/yt-subscribers.png" width="126" alt="YouTube Subscribers"><span class="font-size-sm">250k+</span></div><a class="btn btn-primary border-0 btn-sm mb-3" href="#" style="background-color: #ff0000;"><i class="czi-add-user mr-2"></i>Subscribe*</a>
              <p class="font-size-sm mb-0">*View latest gadgets reviews available for purchase in our store.</p>
            </div>
          </div>
          <div class="col-md-8">
            <div class="d-flex flex-wrap justify-content-between align-items-center pt-3 pb-2">
              <h2 class="h4 mb-3">Latest videos from Cayshly channel</h2><a class="btn btn-outline-accent btn-sm mb-3" href="#">More videos<i class="czi-arrow-right font-size-xs ml-1 mr-n1"></i></a>
            </div>
            <div class="row no-gutters">
              <div class="col-lg-4 col-6 mb-3"><a class="video-cover video-popup-btn d-block text-decoration-0 px-2" href="https://www.youtube.com/embed/vS93u75NnPo">
                  <div class="video-cover-thumb mb-2"><span class="badge badge-dark">6:16</span><img class="w-100" src="{{ url('assets_public') }}/img/home/video/cover01.jpg" alt="Video cover"></div>
                  <h6 class="font-size-sm pt-1">5 New Cool Gadgets You Must See on Cayshly - Cheap Budget</h6></a></div>
              <div class="col-lg-4 col-6 mb-3"><a class="video-cover video-popup-btn d-block text-decoration-0 px-2" href="https://www.youtube.com/embed/B6LaYgGogf0">
                  <div class="video-cover-thumb mb-2"><span class="badge badge-dark">7:27</span><img class="w-100" src="{{ url('assets_public') }}/img/home/video/cover02.jpg" alt="Video cover"></div>
                  <h6 class="font-size-sm pt-1">5 Super Useful Gadgets on Cayshly You Must Have in 2020</h6></a></div>
              <div class="col-lg-4 col-6 mb-3"><a class="video-cover video-popup-btn d-block text-decoration-0 px-2" href="https://www.youtube.com/embed/kB-ROfRS9V4">
                  <div class="video-cover-thumb mb-2"><span class="badge badge-dark">6:20</span><img class="w-100" src="{{ url('assets_public') }}/img/home/video/cover03.jpg" alt="Video cover"></div>
                  <h6 class="font-size-sm pt-1">Top 5 New Amazing Gadgets on Cayshly You Must See</h6></a></div>
              <div class="col-lg-4 col-6 mb-3 d-lg-none"><a class="video-cover video-popup-btn d-block text-decoration-0 px-2" href="https://www.youtube.com/embed/sJK67XXE_Rg">
                  <div class="video-cover-thumb mb-2"><span class="badge badge-dark">6:11</span><img class="w-100" src="{{ url('assets_public') }}/img/home/video/cover04.jpg" alt="Video cover"></div>
                  <h6 class="font-size-sm font-weight-bold pt-1">5 Amazing Construction Inventions and Working Tools Available...</h6></a></div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Blog + Instagram info cards-->
    <section class="container-fluid px-0">
      <div class="row no-gutters">
        <div class="col-md-6"><a class="card border-0 rounded-0 text-decoration-none py-md-4 bg-faded-primary" href="blog-list-sidebar.html">
            <div class="card-body text-center"><i class="czi-edit h3 mt-2 mb-4 text-primary"></i>
              <h3 class="h5 mb-1">Read the blog</h3>
              <p class="text-muted font-size-sm">Latest store, fashion news and trends</p>
            </div></a></div>
        <div class="col-md-6"><a class="card border-0 rounded-0 text-decoration-none py-md-4 bg-faded-accent" href="#">
            <div class="card-body text-center"><i class="czi-instagram h3 mt-2 mb-4 text-accent"></i>
              <h3 class="h5 mb-1">Follow on Instagram</h3>
              <p class="text-muted font-size-sm">#ShopWithCayshly</p>
            </div></a></div>
      </div>
    </section>
    <!-- Toast: Added to Cart-->
    <div class="toast-container toast-bottom-center">
      <div class="toast mb-3" id="cart-toast" data-delay="5000" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-success text-white"><i class="czi-check-circle mr-2"></i>
          <h6 class="font-size-sm text-white mb-0 mr-auto">Added to cart!</h6>
          <button class="close text-white ml-2 mb-1" type="button" data-dismiss="toast" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="toast-body">This item has been added to your cart.</div>
      </div>
    </div>
    <!-- Footer-->
    <!-- Footer-->
    <footer class="bg-dark pt-5">
      <div class="container">
        <div class="row pb-2">
          <div class="col-md-4 col-sm-6">
            <div class="widget widget-links widget-light pb-2 mb-4">
              <h3 class="widget-title text-light">Shop departments</h3>
              <ul class="widget-list">
                <li class="widget-list-item"><a class="widget-list-link" href="#">Sneakers &amp; Athletic</a></li>
                <li class="widget-list-item"><a class="widget-list-link" href="#">Athletic Apparel</a></li>
                <li class="widget-list-item"><a class="widget-list-link" href="#">Sandals</a></li>
                <li class="widget-list-item"><a class="widget-list-link" href="#">Jeans</a></li>
                <li class="widget-list-item"><a class="widget-list-link" href="#">Shirts &amp; Tops</a></li>
                <li class="widget-list-item"><a class="widget-list-link" href="#">Shorts</a></li>
                <li class="widget-list-item"><a class="widget-list-link" href="#">T-Shirts</a></li>
                <li class="widget-list-item"><a class="widget-list-link" href="#">Swimwear</a></li>
                <li class="widget-list-item"><a class="widget-list-link" href="#">Clogs &amp; Mules</a></li>
                <li class="widget-list-item"><a class="widget-list-link" href="#">Bags &amp; Wallets</a></li>
                <li class="widget-list-item"><a class="widget-list-link" href="#">Accessories</a></li>
                <li class="widget-list-item"><a class="widget-list-link" href="#">Sunglasses &amp; Eyewear</a></li>
                <li class="widget-list-item"><a class="widget-list-link" href="#">Watches</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-4 col-sm-6">
            <div class="widget widget-links widget-light pb-2 mb-4">
              <h3 class="widget-title text-light">Account &amp; shipping info</h3>
              <ul class="widget-list">
                <li class="widget-list-item"><a class="widget-list-link" href="#">Your account</a></li>
                <li class="widget-list-item"><a class="widget-list-link" href="#">Shipping rates &amp; policies</a></li>
                <li class="widget-list-item"><a class="widget-list-link" href="#">Refunds &amp; replacements</a></li>
                <li class="widget-list-item"><a class="widget-list-link" href="#">Order tracking</a></li>
                <li class="widget-list-item"><a class="widget-list-link" href="#">Delivery info</a></li>
                <li class="widget-list-item"><a class="widget-list-link" href="#">Taxes &amp; fees</a></li>
              </ul>
            </div>
            <div class="widget widget-links widget-light pb-2 mb-4">
              <h3 class="widget-title text-light">About us</h3>
              <ul class="widget-list">
                <li class="widget-list-item"><a class="widget-list-link" href="#">About company</a></li>
                <li class="widget-list-item"><a class="widget-list-link" href="#">Our team</a></li>
                <li class="widget-list-item"><a class="widget-list-link" href="#">Careers</a></li>
                <li class="widget-list-item"><a class="widget-list-link" href="#">News</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-4">
            <div class="widget pb-2 mb-4">
              <h3 class="widget-title text-light pb-1">Stay informed</h3>
              <form class="cz-subscribe-form validate" action="https://studio.us12.list-manage.com/subscribe/post?u=c7103e2c981361a6639545bd5&amp;amp;id=29ca296126" method="post" name="mc-embedded-subscribe-form" target="_blank" novalidate>
                <div class="input-group input-group-overlay flex-nowrap">
                  <div class="input-group-prepend-overlay"><span class="input-group-text text-muted font-size-base"><i class="czi-mail"></i></span></div>
                  <input class="form-control prepended-form-control" type="email" name="EMAIL" placeholder="Your email" required>
                  <div class="input-group-append">
                    <button class="btn btn-primary" type="submit" name="subscribe">Subscribe*</button>
                  </div>
                </div>
                <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                <div style="position: absolute; left: -5000px;" aria-hidden="true">
                  <input class="cz-subscribe-form-antispam" type="text" name="b_c7103e2c981361a6639545bd5_29ca296126" tabindex="-1">
                </div><small class="form-text text-light opacity-50">*Subscribe to our newsletter to receive early discount offers, updates and new products info.</small>
                <div class="subscribe-status"></div>
              </form>
            </div>
            <div class="widget pb-2 mb-4">
              <h3 class="widget-title text-light pb-1">Download our app</h3>
              <div class="d-flex flex-wrap">
                <div class="mr-2 mb-2"><a class="btn-market btn-apple" href="#" role="button"><span class="btn-market-subtitle">Download on the</span><span class="btn-market-title">App Store</span></a></div>
                <div class="mb-2"><a class="btn-market btn-google" href="#" role="button"><span class="btn-market-subtitle">Download on the</span><span class="btn-market-title">Google Play</span></a></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="pt-5 bg-darker">
        <div class="container">
          <div class="row pb-3">
            <div class="col-md-3 col-sm-6 mb-4">
              <div class="media"><i class="czi-rocket text-primary" style="font-size: 2.25rem;"></i>
                <div class="media-body pl-3">
                  <h6 class="font-size-base text-light mb-1">Fast and free delivery</h6>
                  <p class="mb-0 font-size-ms text-light opacity-50">Free delivery for all orders over $200</p>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6 mb-4">
              <div class="media"><i class="czi-currency-exchange text-primary" style="font-size: 2.25rem;"></i>
                <div class="media-body pl-3">
                  <h6 class="font-size-base text-light mb-1">Money back guarantee</h6>
                  <p class="mb-0 font-size-ms text-light opacity-50">We return money within 30 days</p>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6 mb-4">
              <div class="media"><i class="czi-support text-primary" style="font-size: 2.25rem;"></i>
                <div class="media-body pl-3">
                  <h6 class="font-size-base text-light mb-1">24/7 customer support</h6>
                  <p class="mb-0 font-size-ms text-light opacity-50">Friendly 24/7 customer support</p>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6 mb-4">
              <div class="media"><i class="czi-card text-primary" style="font-size: 2.25rem;"></i>
                <div class="media-body pl-3">
                  <h6 class="font-size-base text-light mb-1">Secure online payment</h6>
                  <p class="mb-0 font-size-ms text-light opacity-50">We possess SSL / Secure сertificate</p>
                </div>
              </div>
            </div>
          </div>
          <hr class="hr-light pb-4 mb-3">
          <div class="row pb-2">
            <div class="col-md-6 text-center text-md-left mb-4">
              <div class="text-nowrap mb-4"><a class="d-inline-block align-middle mt-n1 mr-3" href="#"><img class="d-block" width="117" src="{{ url('assets_public') }}/img/footer-logo-light.png" alt="Cayshly"/></a>
                <div class="btn-group dropdown disable-autohide">
                  <button class="btn btn-outline-light border-light btn-sm dropdown-toggle px-2" type="button" data-toggle="dropdown"><img class="mr-2" width="20" src="{{ url('assets_public') }}/img/flags/en.png" alt="English"/>Eng / $
                  </button>
                  <ul class="dropdown-menu">
                    <li class="dropdown-item">
                      <select class="custom-select custom-select-sm">
                        <option value="usd">$ USD</option>
                        <option value="eur">€ EUR</option>
                        <option value="ukp">£ UKP</option>
                        <option value="jpy">¥ JPY</option>
                      </select>
                    </li>
                    <li><a class="dropdown-item pb-1" href="#"><img class="mr-2" width="20" src="{{ url('assets_public') }}/img/flags/fr.png" alt="Français"/>Français</a></li>
                    <li><a class="dropdown-item pb-1" href="#"><img class="mr-2" width="20" src="{{ url('assets_public') }}/img/flags/de.png" alt="Deutsch"/>Deutsch</a></li>
                    <li><a class="dropdown-item" href="#"><img class="mr-2" width="20" src="{{ url('assets_public') }}/img/flags/it.png" alt="Italiano"/>Italiano</a></li>
                  </ul>
                </div>
              </div>
              <div class="widget widget-links widget-light">
                <ul class="widget-list d-flex flex-wrap justify-content-center justify-content-md-start">
                  <li class="widget-list-item mr-4"><a class="widget-list-link" href="#">Outlets</a></li>
                  <li class="widget-list-item mr-4"><a class="widget-list-link" href="#">Affiliates</a></li>
                  <li class="widget-list-item mr-4"><a class="widget-list-link" href="#">Support</a></li>
                  <li class="widget-list-item mr-4"><a class="widget-list-link" href="#">Privacy</a></li>
                  <li class="widget-list-item mr-4"><a class="widget-list-link" href="#">Terms of use</a></li>
                </ul>
              </div>
            </div>
            <div class="col-md-6 text-center text-md-right mb-4">
              <div class="mb-3"><a class="social-btn sb-light sb-twitter ml-2 mb-2" href="#"><i class="czi-twitter"></i></a><a class="social-btn sb-light sb-facebook ml-2 mb-2" href="#"><i class="czi-facebook"></i></a><a class="social-btn sb-light sb-instagram ml-2 mb-2" href="#"><i class="czi-instagram"></i></a><a class="social-btn sb-light sb-pinterest ml-2 mb-2" href="#"><i class="czi-pinterest"></i></a><a class="social-btn sb-light sb-youtube ml-2 mb-2" href="#"><i class="czi-youtube"></i></a></div><img class="d-inline-block" width="187" src="{{ url('assets_public') }}/img/cards-alt.png" alt="Payment methods"/>
            </div>
          </div>
          <div class="pb-4 font-size-xs text-light opacity-50 text-center text-md-left">© All rights reserved. Made by <a class="text-light" href="https://createx.studio/" target="_blank" rel="noopener">Createx Studio</a></div>
        </div>
      </div>
    </footer>
    <!-- Toolbar for handheld devices-->
    <div class="cz-handheld-toolbar">
      <div class="d-table table-fixed w-100"><a class="d-table-cell cz-handheld-toolbar-item" href="account-wishlist.html"><span class="cz-handheld-toolbar-icon"><i class="czi-heart"></i></span><span class="cz-handheld-toolbar-label">Wishlist</span></a><a class="d-table-cell cz-handheld-toolbar-item" href="#navbarCollapse" data-toggle="collapse" onclick="window.scrollTo(0, 0)"><span class="cz-handheld-toolbar-icon"><i class="czi-menu"></i></span><span class="cz-handheld-toolbar-label">Menu</span></a><a class="d-table-cell cz-handheld-toolbar-item" href="shop-cart.html"><span class="cz-handheld-toolbar-icon"><i class="czi-cart"></i><span class="badge badge-primary badge-pill ml-1">4</span></span><span class="cz-handheld-toolbar-label">$265.00</span></a>
      </div>
    </div>
    <!-- Back To Top Button-->
    <a class="btn-scroll-top" href="#top" data-scroll>
        <span class="btn-scroll-top-tooltip text-muted font-size-sm mr-2">Top</span>
        <i class="btn-scroll-top-icon czi-arrow-up"></i>
    </a>
    <!-- Vendor scrits: js libraries and plugins-->
    <script src="{{ url('assets_public/vendor/jquery/dist/jquery.slim.min.js') }}"></script>
    <script src="{{ url('assets_public/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('assets_public/vendor/bs-custom-file-input/dist/bs-custom-file-input.min.js') }}"></script>
    <script src="{{ url('assets_public/vendor/simplebar/dist/simplebar.min.js') }}"></script>
    <script src="{{ url('assets_public/vendor/tiny-slider/dist/min/tiny-slider.js') }}"></script>
    <script src="{{ url('assets_public/vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js') }}"></script>
    <script src="{{ url('assets_public/vendor/drift-zoom/dist/Drift.min.js') }}"></script>
    <script src="{{ url('assets_public/vendor/lightgallery.js/dist/js/lightgallery.min.js') }}"></script>
    <script src="{{ url('assets_public/vendor/lg-video.js/dist/lg-video.min.js') }}"></script>
    <!-- Main theme script-->
    <script src="{{ url('assets_public/js/theme.min.js') }}"></script>
  </body>

</html>
