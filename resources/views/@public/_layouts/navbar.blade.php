<header class="box-shadow-sm">
    <!-- Topbar-->
    <div class="topbar topbar-dark bg-dark">
        <div class="container">
            <div>
                <div class="topbar-text dropdown disable-autohide">
                    <a class="topbar-link dropdown-toggle" href="#" data-toggle="dropdown">language</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item pb-1" href="#">English</a></li>
                        <li><a class="dropdown-item pb-1" href="#">Arabic</a></li>
                    </ul>
                </div>
                <div class="topbar-text text-nowrap d-none d-md-inline-block border-left border-light pl-3 ml-3">
                    <span class="text-muted mr-1">Available 24/7 at</span><a class="topbar-link" href="tel:00331697720">(00) 33 169 7720</a>
                </div>
            </div>
            <div class="topbar-text dropdown d-md-none ml-auto">
                <a class="topbar-link dropdown-toggle" href="#" data-toggle="dropdown">Useful pages</a>
                <ul class="dropdown-menu dropdown-menu-right">
                    <li><a class="dropdown-item" href=""><i class="czi-compare text-muted mr-2"></i>Return product</a></li>
                    <li><a class="dropdown-item" href=""><i class="czi-location text-muted mr-2"></i>Contact us</a></li>
                </ul>
            </div>
            <div class="d-none d-md-block ml-3 text-nowrap">
                <a class="topbar-link ml-3 pl-3 border-light d-none d-md-inline-block" href=""><i class="czi-compare mt-n1"></i>Return product</a>
                <a class="topbar-link ml-3 border-left border-light pl-3 d-none d-md-inline-block" href=""><i class="czi-location mt-n1"></i>Contact us</a>
            </div>
        </div>
    </div>
    <!-- Remove "navbar-sticky" class to make navigation bar scrollable with the page.-->
    <div class="navbar-sticky bg-light">
        <div class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand d-none d-sm-block mr-3 flex-shrink-0" href="{{ route('public.home') }}" style="min-width: 7rem;">
                    <img style="width: 130px;" src="{{ url('assets_public/img/logo-dark.png') }}" alt="Cayshly"/>
                </a>
                <a class="navbar-brand d-sm-none mr-2" href="{{ route('public.home') }}" style="min-width: 4.625rem;">
                    <img width="74" src="{{ url('assets_public/img/logo-icon.png') }}" alt="Cayshly"/>
                </a>
                <!-- Search-->
                <div class="input-group-overlay d-none d-lg-block mx-4">
                    <div class="input-group-prepend-overlay"><span class="input-group-text"><i class="czi-search"></i></span></div>
                    <input class="form-control prepended-form-control appended-form-control" type="text" placeholder="Search for products">
                    <div class="input-group-append-overlay">
                        <select class="custom-select">
                            <option>All categories</option>
                            <option>Computers</option>
                            <option>Smartphones</option>
                            <option>TV, Video, Audio</option>
                            <option>Cameras</option>
                            <option>Headphones</option>
                            <option>Wearables</option>
                            <option>Printers</option>
                            <option>Video Games</option>
                            <option>Home Music</option>
                            <option>Data Storage</option>
                        </select>
                    </div>
                </div>
                <!-- Toolbar-->
                <div class="navbar-toolbar d-flex flex-shrink-0 align-items-center">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"><span class="navbar-toggler-icon"></span></button><a class="navbar-tool navbar-stuck-toggler" href="#"><span class="navbar-tool-tooltip">Expand menu</span>
                        <div class="navbar-tool-icon-box"><i class="navbar-tool-icon czi-menu"></i></div></a><a class="navbar-tool ml-1 ml-lg-0 mr-n1 mr-lg-2" href="#signin-modal" data-toggle="modal">
                        <div class="navbar-tool-icon-box"><i class="navbar-tool-icon czi-user"></i></div>
                        <div class="navbar-tool-text ml-n3"><small>Hello, Sign in</small>My Account</div></a>
                    <div class="navbar-tool dropdown ml-3"><a class="navbar-tool-icon-box bg-secondary dropdown-toggle" href="shop-cart.html"><span class="navbar-tool-label">4</span><i class="navbar-tool-icon czi-cart"></i></a><a class="navbar-tool-text" href="shop-cart.html"><small>My Cart</small>$1,247.00</a>
                        <!-- Cart dropdown-->
                        <div class="dropdown-menu dropdown-menu-right" style="width: 20rem;">
                            <div class="widget widget-cart px-3 pt-2 pb-3">
                                <div style="height: 15rem;" data-simplebar data-simplebar-auto-hide="false">
                                    <div class="widget-cart-item pb-2 border-bottom">
                                        <button class="close text-danger" type="button" aria-label="Remove"><span aria-hidden="true">&times;</span></button>
                                        <div class="media align-items-center"><a class="d-block mr-2" href="shop-single-v2.html"><img width="64" src="{{ url('assets_public') }}/img/shop/cart/widget/05.jpg" alt="Product"/></a>
                                            <div class="media-body">
                                                <h6 class="widget-product-title"><a href="shop-single-v2.html">Bluetooth Headphones</a></h6>
                                                <div class="widget-product-meta"><span class="text-accent mr-2">$259.<small>00</small></span><span class="text-muted">x 1</span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-cart-item py-2 border-bottom">
                                        <button class="close text-danger" type="button" aria-label="Remove"><span aria-hidden="true">&times;</span></button>
                                        <div class="media align-items-center"><a class="d-block mr-2" href="shop-single-v2.html"><img width="64" src="{{ url('assets_public') }}/img/shop/cart/widget/06.jpg" alt="Product"/></a>
                                            <div class="media-body">
                                                <h6 class="widget-product-title"><a href="shop-single-v2.html">Cloud Security Camera</a></h6>
                                                <div class="widget-product-meta"><span class="text-accent mr-2">$122.<small>00</small></span><span class="text-muted">x 1</span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-cart-item py-2 border-bottom">
                                        <button class="close text-danger" type="button" aria-label="Remove"><span aria-hidden="true">&times;</span></button>
                                        <div class="media align-items-center"><a class="d-block mr-2" href="shop-single-v2.html"><img width="64" src="{{ url('assets_public') }}/img/shop/cart/widget/07.jpg" alt="Product"/></a>
                                            <div class="media-body">
                                                <h6 class="widget-product-title"><a href="shop-single-v2.html">Android Smartphone S10</a></h6>
                                                <div class="widget-product-meta"><span class="text-accent mr-2">$799.<small>00</small></span><span class="text-muted">x 1</span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-cart-item py-2 border-bottom">
                                        <button class="close text-danger" type="button" aria-label="Remove"><span aria-hidden="true">&times;</span></button>
                                        <div class="media align-items-center"><a class="d-block mr-2" href="shop-single-v2.html"><img width="64" src="{{ url('assets_public') }}/img/shop/cart/widget/08.jpg" alt="Product"/></a>
                                            <div class="media-body">
                                                <h6 class="widget-product-title"><a href="shop-single-v2.html">Android Smart TV Box</a></h6>
                                                <div class="widget-product-meta"><span class="text-accent mr-2">$67.<small>00</small></span><span class="text-muted">x 1</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex flex-wrap justify-content-between align-items-center py-3">
                                    <div class="font-size-sm mr-2 py-2"><span class="text-muted">Subtotal:</span><span class="text-accent font-size-base ml-1">$1,247.<small>00</small></span></div><a class="btn btn-outline-secondary btn-sm" href="shop-cart.html">Expand cart<i class="czi-arrow-right ml-1 mr-n1"></i></a>
                                </div><a class="btn btn-primary btn-sm btn-block" href="checkout-details.html"><i class="czi-card mr-2 font-size-base align-middle"></i>Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar navbar-expand-lg navbar-light navbar-stuck-menu mt-n2 pt-0 pb-2">
            <div class="container">
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <!-- Search-->
                    <div class="input-group-overlay d-lg-none my-3">
                        <div class="input-group-prepend-overlay"><span class="input-group-text"><i class="czi-search"></i></span></div>
                        <input class="form-control prepended-form-control" type="text" placeholder="Search for products">
                    </div>
                    <!-- Departments menu-->
                    <ul class="navbar-nav mega-nav pr-lg-2 mr-lg-2">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle pl-0" href="#" data-toggle="dropdown">
                                <i class="czi-menu align-middle mt-n1 mr-2"></i>Departments</a>

                            <ul class="dropdown-menu">
                                @foreach($categories as $category)
                                <li class="dropdown mega-dropdown">
                                    <a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown">
                                        <i class="{{ $category->icon }} opacity-60 font-size-lg mt-n1 mr-2"></i>{{ getFromJson($category->name , lang()) }}</a>
                                    <div class="dropdown-menu p-0">
                                        <div class="d-flex flex-wrap flex-md-nowrap px-2">
                                            <div class="mega-dropdown-column py-4 px-3">
                                                <div class="widget widget-links">
                                                    <ul class="widget-list">
                                                        @foreach(\App\Models\Category::getAllBy('parent_id', $category->id) as $child)
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">{{ getFromJson($child->name , lang()) }}</a></li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="mega-dropdown-column d-none d-lg-block py-4 text-center">
                                                <img src="{{ url('assets_public/images/category/picture/'. $category->picture) }}" alt="{{ getFromJson($category->name , lang()) }}"/>
{{--                                                <div class="font-size-sm mb-3">Starting from <span class='font-weight-medium'>$149.<small>80</small></span></div>--}}
                                                <a class="btn btn-primary btn-shadow btn-sm" href="#">See offers<i class="czi-arrow-right font-size-xs ml-1"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                    <!-- Primary menu-->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i style="margin-right: 5px;" class="czi-bag"></i> Stores</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#"><i style="margin-right: 5px;" class="czi-view-grid"></i> Categories</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#"><i style="margin-right: 5px;" class="czi-bookmark"></i> Brands</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#"><i style="margin-right: 5px;" class="czi-diamond"></i> Best Sellers</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#"><i style="margin-right: 5px;" class="czi-loudspeaker"></i> Offers</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#"><i style="margin-right: 5px;" class="czi-gift"></i> By Free</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
