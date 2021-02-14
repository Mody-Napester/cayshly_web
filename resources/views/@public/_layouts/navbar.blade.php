<header class="box-shadow-sm">
    <!-- Topbar-->
    <div class="topbar topbar-dark bg-dark">
        <div class="container">
            <div>
                <div class="topbar-text dropdown disable-autohide"><a class="topbar-link dropdown-toggle" href="#" data-toggle="dropdown"><img class="mr-2" width="20" src="{{ url('assets_public') }}/img/flags/en.png" alt="English"/>Eng / $</a>
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
                <div class="topbar-text text-nowrap d-none d-md-inline-block border-left border-light pl-3 ml-3"><span class="text-muted mr-1">Available 24/7 at</span><a class="topbar-link" href="tel:00331697720">(00) 33 169 7720</a></div>
            </div>
            <div class="topbar-text dropdown d-md-none ml-auto"><a class="topbar-link dropdown-toggle" href="#" data-toggle="dropdown">Wishlist / Compare / Track</a>
                <ul class="dropdown-menu dropdown-menu-right">
                    <li><a class="dropdown-item" href="account-wishlist.html"><i class="czi-heart text-muted mr-2"></i>Wishlist (3)</a></li>
                    <li><a class="dropdown-item" href="comparison.html"><i class="czi-compare text-muted mr-2"></i>Compare (3)</a></li>
                    <li><a class="dropdown-item" href="order-tracking.html"><i class="czi-location text-muted mr-2"></i>Order tracking</a></li>
                </ul>
            </div>
            <div class="d-none d-md-block ml-3 text-nowrap"><a class="topbar-link d-none d-md-inline-block" href="account-wishlist.html"><i class="czi-heart mt-n1"></i>Wishlist (3)</a><a class="topbar-link ml-3 pl-3 border-left border-light d-none d-md-inline-block" href="comparison.html"><i class="czi-compare mt-n1"></i>Compare (3)</a><a class="topbar-link ml-3 border-left border-light pl-3 d-none d-md-inline-block" href="order-tracking.html"><i class="czi-location mt-n1"></i>Order tracking</a></div>
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
                        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle pl-0" href="#" data-toggle="dropdown"><i class="czi-menu align-middle mt-n1 mr-2"></i>Departments</a>
                            <ul class="dropdown-menu">
                                <li class="dropdown mega-dropdown"><a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown"><i class="czi-laptop opacity-60 font-size-lg mt-n1 mr-2"></i>Computers &amp; Accessories</a>
                                    <div class="dropdown-menu p-0">
                                        <div class="d-flex flex-wrap flex-md-nowrap px-2">
                                            <div class="mega-dropdown-column py-4 px-3">
                                                <div class="widget widget-links">
                                                    <h6 class="font-size-base mb-3">Computers</h6>
                                                    <ul class="widget-list">
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Laptops &amp; Tablets</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Desktop Computers</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Computer External Components</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Computer Internal Components</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Networking Products (NAS)</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Single Board Computers</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Desktop Barebones</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="mega-dropdown-column py-4 px-3">
                                                <div class="widget widget-links">
                                                    <h6 class="font-size-base mb-3">Accessories</h6>
                                                    <ul class="widget-list">
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Monitors</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Bags, Cases &amp; Sleeves</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Batteries</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Charges &amp; Adapters</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Cooling Pads</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Mounts</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Replacement Screens</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Security Locks</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Stands</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="mega-dropdown-column d-none d-lg-block py-4 text-center"><a class="d-block mb-2" href="#"><img src="{{ url('assets_public') }}/img/shop/departments/07.jpg" alt="Computers & Accessories"/></a>
                                                <div class="font-size-sm mb-3">Starting from <span class='font-weight-medium'>$149.<small>80</small></span></div><a class="btn btn-primary btn-shadow btn-sm" href="#">See offers<i class="czi-arrow-right font-size-xs ml-1"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="dropdown mega-dropdown"><a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown"><i class="czi-mobile opacity-60 font-size-lg mt-n1 mr-2"></i>Smartphones &amp; Tablets</a>
                                    <div class="dropdown-menu p-0">
                                        <div class="d-flex flex-wrap flex-md-nowrap px-2">
                                            <div class="mega-dropdown-column py-4 px-3">
                                                <div class="widget widget-links mb-3">
                                                    <h6 class="font-size-base mb-3">Smartphones</h6>
                                                    <ul class="widget-list">
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Apple iPhone</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Android Smartphones</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Phablets</a></li>
                                                    </ul>
                                                </div>
                                                <div class="widget widget-links">
                                                    <h6 class="font-size-base">Tablets</h6>
                                                    <ul class="widget-list">
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Apple iPad</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Android Tablets</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Tablets with Keyboard</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="mega-dropdown-column py-4 px-3">
                                                <div class="widget widget-links">
                                                    <h6 class="font-size-base mb-3">Accessories</h6>
                                                    <ul class="widget-list">
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Accessory Kits</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Batteries &amp; Battery Packs</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Cables</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Car Accessories</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Charges &amp; Power Adapters</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">FM Transmitters</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Lens Attachments</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Mounts &amp; Stands</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Repair Kits</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Replacement Parts</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Styluses</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="mega-dropdown-column d-none d-lg-block py-4 text-center"><a class="d-block mb-2" href="#"><img src="{{ url('assets_public') }}/img/shop/departments/09.jpg" alt="Smartphones & Tablets"/></a>
                                                <div class="font-size-sm mb-3">Starting from <span class='font-weight-medium'>$127.<small>00</small></span></div><a class="btn btn-primary btn-shadow btn-sm" href="#">See offers<i class="czi-arrow-right font-size-xs ml-1"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="dropdown mega-dropdown"><a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown"><i class="czi-monitor opacity-60 font-size-lg mt-n1 mr-2"></i>TV, Video &amp; Audio</a>
                                    <div class="dropdown-menu p-0">
                                        <div class="d-flex flex-wrap flex-md-nowrap px-2">
                                            <div class="mega-dropdown-column py-4 px-3">
                                                <div class="widget widget-links">
                                                    <h6 class="font-size-base mb-3">Television &amp; Video</h6>
                                                    <ul class="widget-list">
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">TV Sets</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Home Theater Systems</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">DVD Players &amp; Recorders</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Blue-ray Players &amp; Recorders</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">HD DVD Players &amp; Recorders</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">DVD-VCR Combos</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">DTV Converters</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">AV Receivers</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">AV Amplifiers</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Projectors</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Projection Screens</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Satelite Television</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="mega-dropdown-column py-4 px-3">
                                                <div class="widget widget-links">
                                                    <ul class="widget-list">
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">TV-DTD Combos</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Sound Systems</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Home Cinema Systems</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Streaming Media Players</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">VCRs</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Video Glasses</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Lens Attachments</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="mega-dropdown-column d-none d-lg-block py-4 text-center"><a class="d-block mb-2" href="#"><img src="{{ url('assets_public') }}/img/shop/departments/08.jpg" alt="TV, Video & Audio"/></a>
                                                <div class="font-size-sm mb-3">Starting from <span class='font-weight-medium'>$78.<small>00</small></span></div><a class="btn btn-primary btn-shadow btn-sm" href="#">See offers<i class="czi-arrow-right font-size-xs ml-1"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="dropdown mega-dropdown"><a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown"><i class="czi-camera opacity-60 font-size-lg mt-n1 mr-2"></i>Cameras, Photo &amp; Video</a>
                                    <div class="dropdown-menu p-0">
                                        <div class="d-flex flex-wrap flex-md-nowrap px-2">
                                            <div class="mega-dropdown-column py-4 px-3">
                                                <div class="widget widget-links">
                                                    <h6 class="font-size-base mb-3">Cameras &amp; Lenses</h6>
                                                    <ul class="widget-list">
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Point &amp; Shoot Digital Cameras</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">DSLR Cameras</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Mirrorless Cameras</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Body Mounted Cameras</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Camcorders</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Camcorder Lenses</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Camera Lenses</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Macro &amp; Ringlight Flashes</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Shoe Mount Flashes</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Tripods &amp; Monopods</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Video Studio</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="mega-dropdown-column py-4 px-3">
                                                <div class="widget widget-links">
                                                    <h6 class="font-size-base mb-3">Accessories</h6>
                                                    <ul class="widget-list">
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Bags &amp; Cases</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Binoculars &amp; Scopes</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Batteries &amp; Chargers</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Cables &amp; Cords</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Camcorder Accessories</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Cleaning Equipment</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Protector Foils</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Filters &amp; Accessories</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Remote Controls</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Rain Covers</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Viewfinders</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="mega-dropdown-column d-none d-lg-block py-4 text-center"><a class="d-block mb-2" href="#"><img src="{{ url('assets_public') }}/img/shop/departments/10.jpg" alt="Cameras, Photo & Video"/></a>
                                                <div class="font-size-sm mb-3">Starting from <span class='font-weight-medium'>$210.<small>00</small></span></div><a class="btn btn-primary btn-shadow btn-sm" href="#">See offers<i class="czi-arrow-right font-size-xs ml-1"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="dropdown mega-dropdown"><a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown"><i class="czi-earphones opacity-60 font-size-lg mt-n1 mr-2"></i>Headphones</a>
                                    <div class="dropdown-menu p-0">
                                        <div class="d-flex flex-wrap flex-md-nowrap px-2">
                                            <div class="mega-dropdown-column py-4 px-3">
                                                <div class="widget widget-links">
                                                    <h6 class="font-size-base mb-3">Headphones</h6>
                                                    <ul class="widget-list">
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Earbud Headphones</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Over-Ear Headphones</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">On-Ear Headphones</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Bluetooth Headphones</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Sports &amp; Fitness Headphones</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Noise-Cancelling Headphones</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="mega-dropdown-column py-4 px-3">
                                                <div class="widget widget-links">
                                                    <h6 class="font-size-base mb-3">Accessories</h6>
                                                    <ul class="widget-list">
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Cases &amp; Sleeves</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Cables &amp; Cords</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Ear Pads</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Repair Kits</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Cleaning Equipment</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="mega-dropdown-column d-none d-lg-block py-4 text-center"><a class="d-block mb-2" href="#"><img src="{{ url('assets_public') }}/img/shop/departments/11.jpg" alt="Headphones"/></a>
                                                <div class="font-size-sm mb-3">Starting from <span class='font-weight-medium'>$35.<small>99</small></span></div><a class="btn btn-primary btn-shadow btn-sm" href="#">See offers<i class="czi-arrow-right font-size-xs ml-1"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="dropdown mega-dropdown"><a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown"><i class="czi-watch opacity-60 font-size-lg mt-n1 mr-2"></i>Wearable Electronics</a>
                                    <div class="dropdown-menu p-0">
                                        <div class="d-flex flex-wrap flex-md-nowrap px-2">
                                            <div class="mega-dropdown-column py-4 px-3">
                                                <div class="widget widget-links">
                                                    <h6 class="font-size-base mb-3">Gadgets</h6>
                                                    <ul class="widget-list">
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Smartwatches</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Fitness Trackers</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Smart Glasses</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Rings</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Virtual Reality</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Clips, Arm &amp; Wristbands</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Accessories</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="mega-dropdown-column d-none d-lg-block py-4 text-center"><a class="d-block mb-2" href="#"><img src="{{ url('assets_public') }}/img/shop/departments/12.jpg" alt="Wearable Electronics"/></a>
                                                <div class="font-size-sm mb-3">Starting from <span class='font-weight-medium'>$79.<small>50</small></span></div><a class="btn btn-primary btn-shadow btn-sm" href="#">See offers<i class="czi-arrow-right font-size-xs ml-1"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="dropdown mega-dropdown"><a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown"><i class="czi-printer opacity-60 font-size-lg mt-n1 mr-2"></i>Printers &amp; Ink</a>
                                    <div class="dropdown-menu p-0">
                                        <div class="d-flex flex-wrap flex-md-nowrap px-2">
                                            <div class="mega-dropdown-column py-4 px-3">
                                                <div class="widget widget-links mb-3">
                                                    <h6 class="font-size-base mb-3">By type</h6>
                                                    <ul class="widget-list">
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">All-in-One</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Copying</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Faxing</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Photo Printing</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Printing Only</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Scanning</a></li>
                                                    </ul>
                                                </div>
                                                <div class="widget widget-links">
                                                    <h6 class="font-size-base mb-3">Scanners</h6>
                                                    <ul class="widget-list">
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Business Card Scanners</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Document Scanners</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Flatbed &amp; Photo Scanners</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Slide &amp; Negative Scanners</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="mega-dropdown-column py-4 px-3">
                                                <div class="widget widget-links">
                                                    <h6 class="font-size-base">Printers</h6>
                                                    <ul class="widget-list">
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Dot Matrix Printers</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Inkjet Printers</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Label Printers</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Laser Printers</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Photo Printers</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Wide Format Printers</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Plotter Printers</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="mega-dropdown-column d-none d-lg-block py-4 text-center"><a class="d-block mb-2" href="#"><img src="{{ url('assets_public') }}/img/shop/departments/13.jpg" alt="Printers & Ink"/></a>
                                                <div class="font-size-sm mb-3">Starting from <span class='font-weight-medium'>$54.<small>00</small></span></div><a class="btn btn-primary btn-shadow btn-sm" href="#">See offers<i class="czi-arrow-right font-size-xs ml-1"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="dropdown mega-dropdown"><a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown"><i class="czi-joystick opacity-60 font-size-lg mt-n1 mr-2"></i>Video Games</a>
                                    <div class="dropdown-menu p-0">
                                        <div class="d-flex flex-wrap flex-md-nowrap px-2">
                                            <div class="mega-dropdown-column py-4 px-3">
                                                <div class="widget widget-links">
                                                    <h6 class="font-size-base mb-3">Games &amp; Hardware</h6>
                                                    <ul class="widget-list">
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Video Games</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">PlayStation 4</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">PlayStation 3</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Xbox One</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Xbox 360</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Nintendo Switch</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Wii U</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Wii</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">PC</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Mac</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Nintendo 3DS &amp; 2DS</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Nintendo DS</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="mega-dropdown-column py-4 px-3">
                                                <div class="widget widget-links">
                                                    <ul class="widget-list">
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">PlayStation Vita</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Sony PSP</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Retro Gaming</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Microconsoles</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Accessories</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Digital Games</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="mega-dropdown-column d-none d-lg-block py-4 text-center"><a class="d-block mb-2" href="#"><img src="{{ url('assets_public') }}/img/shop/departments/14.jpg" alt="Video Games"/></a>
                                                <div class="font-size-sm mb-3">Starting from <span class='font-weight-medium'>$19.<small>00</small></span></div><a class="btn btn-primary btn-shadow btn-sm" href="#">See offers<i class="czi-arrow-right font-size-xs ml-1"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="dropdown mega-dropdown"><a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown"><i class="czi-speaker opacity-60 font-size-lg mt-n1 mr-2"></i>Speakers &amp; Home Music</a>
                                    <div class="dropdown-menu p-0">
                                        <div class="d-flex flex-wrap flex-md-nowrap px-2">
                                            <div class="mega-dropdown-column py-4 px-3">
                                                <div class="widget widget-links">
                                                    <h6 class="font-size-base mb-3">Speakers</h6>
                                                    <ul class="widget-list">
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Bluetooth Speakers</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Bookshelf Speakers</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Ceiling &amp; In-Wall Speakers</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Center-Channel Speakers</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Floorstanding Speakers</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Outdoor Speakers</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Satellite Speakers</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Sound Bars</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Subwoofers</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Surround Sound Systems</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="mega-dropdown-column py-4 px-3">
                                                <div class="widget widget-links">
                                                    <h6 class="font-size-base mb-3">Home Audio</h6>
                                                    <ul class="widget-list">
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Home Theater</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Wireless &amp; Streaming Audio</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Stereo System Components</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Compact Radios &amp; Stereos</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Home Audio Accessories</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="mega-dropdown-column d-none d-lg-block py-4 text-center"><a class="d-block mb-2" href="#"><img src="{{ url('assets_public') }}/img/shop/departments/16.jpg" alt="Speakers & Home Music"/></a>
                                                <div class="font-size-sm mb-3">Starting from <span class='font-weight-medium'>$43.<small>00</small></span></div><a class="btn btn-primary btn-shadow btn-sm" href="#">See offers<i class="czi-arrow-right font-size-xs ml-1"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="dropdown mega-dropdown"><a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown"><i class="czi-server opacity-60 font-size-lg mt-n1 mr-2"></i>HDD/SSD Data Storage</a>
                                    <div class="dropdown-menu p-0">
                                        <div class="d-flex flex-wrap flex-md-nowrap px-2">
                                            <div class="mega-dropdown-column py-4 px-3">
                                                <div class="widget widget-links">
                                                    <h6 class="font-size-base mb-3">Data Storage</h6>
                                                    <ul class="widget-list">
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">External Hard Drives</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">External Solid State Drives</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">External Zip Drives</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Floppy &amp; Tape Drives</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Internal Hard Drives</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Internal Solid State Drives</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Network Attached Storage</a></li>
                                                        <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">USB Flash Drives</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="mega-dropdown-column d-none d-lg-block py-4 text-center"><a class="d-block mb-2" href="#"><img src="{{ url('assets_public') }}/img/shop/departments/15.jpg" alt="HDD/SSD Data Storage"/></a>
                                                <div class="font-size-sm mb-3">Starting from <span class='font-weight-medium'>$21.<small>60</small></span></div><a class="btn btn-primary btn-shadow btn-sm" href="#">See offers<i class="czi-arrow-right font-size-xs ml-1"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <!-- Primary menu-->
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown active"><a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Home</a>
                            <ul class="dropdown-menu">
                                <li class="dropdown position-static mb-0"><a class="dropdown-item py-2 border-bottom" href="home-fashion-store-v1.html"><span class="d-block text-heading">Fashion Store v.1</span><small class="d-block text-muted">Classic shop layout</small></a>
                                    <div class="dropdown-menu h-100 animation-0 mt-0 p-3"><a class="d-block" href="home-fashion-store-v1.html" style="width: 250px;"><img src="{{ url('assets_public') }}/img/home/preview/th01.jpg" alt="Fashion Store v.1"/></a></div>
                                </li>
                                <li class="dropdown position-static mb-0"><a class="dropdown-item py-2 border-bottom" href="home-electronics-store.html"><span class="d-block text-heading">Electronics Store</span><small class="d-block text-muted">Slider + Promo banners</small></a>
                                    <div class="dropdown-menu h-100 animation-0 mt-0 p-3"><a class="d-block" href="home-electronics-store.html" style="width: 250px;"><img src="{{ url('assets_public') }}/img/home/preview/th03.jpg" alt="Electronics Store"/></a></div>
                                </li>
                                <li class="dropdown position-static mb-0"><a class="dropdown-item py-2 border-bottom" href="home-marketplace.html"><span class="d-block text-heading">Marketplace</span><small class="d-block text-muted">Multi-vendor, digital goods</small></a>
                                    <div class="dropdown-menu h-100 animation-0 mt-0 p-3"><a class="d-block" href="home-marketplace.html" style="width: 250px;"><img src="{{ url('assets_public') }}/img/home/preview/th04.jpg" alt="Marketplace"/></a></div>
                                </li>
                                <li class="dropdown position-static mb-0"><a class="dropdown-item py-2 border-bottom" href="home-grocery-store.html"><span class="d-block text-heading">Grocery Store</span><small class="d-block text-muted">Full width + Side menu</small></a>
                                    <div class="dropdown-menu h-100 animation-0 mt-0 p-3"><a class="d-block" href="home-grocery-store.html" style="width: 250px;"><img src="{{ url('assets_public') }}/img/home/preview/th06.jpg" alt="Grocery Store"/></a></div>
                                </li>
                                <li class="dropdown position-static mb-0"><a class="dropdown-item py-2 border-bottom" href="home-food-delivery.html"><span class="d-block text-heading">Food Delivery Service</span><small class="d-block text-muted">Food &amp; Beverages delivery</small></a>
                                    <div class="dropdown-menu h-100 animation-0 mt-0 p-3"><a class="d-block" href="home-food-delivery.html" style="width: 250px;"><img src="{{ url('assets_public') }}/img/home/preview/th07.jpg" alt="Food Delivery Service"/></a></div>
                                </li>
                                <li class="dropdown position-static mb-0"><a class="dropdown-item py-2 border-bottom" href="home-fashion-store-v2.html"><span class="d-block text-heading">Fashion Store v.2</span><small class="d-block text-muted">Slider + Featured categories</small></a>
                                    <div class="dropdown-menu h-100 animation-0 mt-0 p-3"><a class="d-block" href="home-fashion-store-v2.html" style="width: 250px;"><img src="{{ url('assets_public') }}/img/home/preview/th02.jpg" alt="Fashion Store v.2"/></a></div>
                                </li>
                                <li class="dropdown position-static mb-0"><a class="dropdown-item py-2" href="home-single-store.html"><span class="d-block text-heading">Single Product Store</span><small class="d-block text-muted">Single product / mono brand</small></a>
                                    <div class="dropdown-menu h-100 animation-0 mt-0 p-3"><a class="d-block" href="home-single-store.html" style="width: 250px;"><img src="{{ url('assets_public') }}/img/home/preview/th05.jpg" alt="Single Product / Brand Store"/></a></div>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Shop</a>
                            <div class="dropdown-menu p-0">
                                <div class="d-flex flex-wrap flex-md-nowrap px-2">
                                    <div class="mega-dropdown-column py-4 px-3">
                                        <div class="widget widget-links mb-3">
                                            <h6 class="font-size-base mb-3">Shop layouts</h6>
                                            <ul class="widget-list">
                                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="shop-grid-ls.html">Shop Grid - Left Sidebar</a></li>
                                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="shop-grid-rs.html">Shop Grid - Right Sidebar</a></li>
                                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="shop-grid-ft.html">Shop Grid - Filters on Top</a></li>
                                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="shop-list-ls.html">Shop List - Left Sidebar</a></li>
                                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="shop-list-rs.html">Shop List - Right Sidebar</a></li>
                                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="shop-list-ft.html">Shop List - Filters on Top</a></li>
                                            </ul>
                                        </div>
                                        <div class="widget widget-links">
                                            <h6 class="font-size-base mb-3">Marketplace</h6>
                                            <ul class="widget-list">
                                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="marketplace-category.html">Category Page</a></li>
                                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="marketplace-single.html">Single Item Page</a></li>
                                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="marketplace-vendor.html">Vendor Page</a></li>
                                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="marketplace-cart.html">Cart</a></li>
                                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="marketplace-checkout.html">Checkout</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="mega-dropdown-column py-4 px-3">
                                        <div class="widget widget-links">
                                            <h6 class="font-size-base mb-3">Shop pages</h6>
                                            <ul class="widget-list">
                                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="shop-categories.html">Shop Categories</a></li>
                                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="shop-single-v1.html">Product Page v.1</a></li>
                                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="shop-single-v2.html">Product Page v.2</a></li>
                                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="shop-cart.html">Cart</a></li>
                                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="checkout-details.html">Checkout - Details</a></li>
                                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="checkout-shipping.html">Checkout - Shipping</a></li>
                                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="checkout-payment.html">Checkout - Payment</a></li>
                                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="checkout-review.html">Checkout - Review</a></li>
                                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="checkout-complete.html">Checkout - Complete</a></li>
                                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="order-tracking.html">Order Tracking</a></li>
                                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="comparison.html">Product Comparison</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="mega-dropdown-column py-4 pr-3">
                                        <div class="widget widget-links mb-3">
                                            <h6 class="font-size-base mb-3">Grocery store</h6>
                                            <ul class="widget-list">
                                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="grocery-catalog.html">Product Catalog</a></li>
                                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="grocery-single.html">Single Product Page</a></li>
                                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="grocery-checkout.html">Checkout</a></li>
                                            </ul>
                                        </div>
                                        <div class="widget widget-links">
                                            <h6 class="font-size-base mb-3">Food Delivery</h6>
                                            <ul class="widget-list">
                                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="food-delivery-category.html">Category Page</a></li>
                                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="food-delivery-single.html">Single Item (Restaurant)</a></li>
                                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="food-delivery-cart.html">Cart (Your Order)</a></li>
                                                <li class="widget-list-item pb-1"><a class="widget-list-link" href="food-delivery-checkout.html">Checkout (Address &amp; Payment)</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Account</a>
                            <ul class="dropdown-menu">
                                <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown">Shop User Account</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="account-orders.html">Orders History</a></li>
                                        <li><a class="dropdown-item" href="account-profile.html">Profile Settings</a></li>
                                        <li><a class="dropdown-item" href="account-address.html">Account Addresses</a></li>
                                        <li><a class="dropdown-item" href="account-payment.html">Payment Methods</a></li>
                                        <li><a class="dropdown-item" href="account-wishlist.html">Wishlist</a></li>
                                        <li><a class="dropdown-item" href="account-tickets.html">My Tickets</a></li>
                                        <li><a class="dropdown-item" href="account-single-ticket.html">Single Ticket</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown">Vendor Dashboard</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="dashboard-settings.html">Settings</a></li>
                                        <li><a class="dropdown-item" href="dashboard-purchases.html">Purchases</a></li>
                                        <li><a class="dropdown-item" href="dashboard-favorites.html">Favorites</a></li>
                                        <li><a class="dropdown-item" href="dashboard-sales.html">Sales</a></li>
                                        <li><a class="dropdown-item" href="dashboard-products.html">Products</a></li>
                                        <li><a class="dropdown-item" href="dashboard-add-new-product.html">Add New Product</a></li>
                                        <li><a class="dropdown-item" href="dashboard-payouts.html">Payouts</a></li>
                                    </ul>
                                </li>
                                <li><a class="dropdown-item" href="account-signin.html">Sign In / Sign Up</a></li>
                                <li><a class="dropdown-item" href="account-password-recovery.html">Password Recovery</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Pages</a>
                            <ul class="dropdown-menu">
                                <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown">Navbar Variants</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="navbar-1-level-light.html">1 Level Light</a></li>
                                        <li><a class="dropdown-item" href="navbar-1-level-dark.html">1 Level Dark</a></li>
                                        <li><a class="dropdown-item" href="navbar-2-level-light.html">2 Level Light</a></li>
                                        <li><a class="dropdown-item" href="navbar-2-level-dark.html">2 Level Dark</a></li>
                                        <li><a class="dropdown-item" href="navbar-3-level-light.html">3 Level Light</a></li>
                                        <li><a class="dropdown-item" href="navbar-3-level-dark.html">3 Level Dark</a></li>
                                        <li><a class="dropdown-item" href="home-electronics-store.html">Electronics Store</a></li>
                                        <li><a class="dropdown-item" href="home-marketplace.html">Marketplace</a></li>
                                        <li><a class="dropdown-item" href="home-grocery-store.html">Side Menu (Grocery)</a></li>
                                        <li><a class="dropdown-item" href="home-single-store.html">Transparent</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="about.html">About Us</a></li>
                                <li><a class="dropdown-item" href="contacts.html">Contacts</a></li>
                                <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown">Help Center</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="help-topics.html">Help Topics</a></li>
                                        <li><a class="dropdown-item" href="help-single-topic.html">Single Topic</a></li>
                                        <li><a class="dropdown-item" href="help-submit-request.html">Submit a Request</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown">404 Not Found</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="404-simple.html">404 - Simple Text</a></li>
                                        <li><a class="dropdown-item" href="404-illustration.html">404 - Illustration</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Blog</a>
                            <ul class="dropdown-menu">
                                <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown">Blog List Layouts</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="blog-list-sidebar.html">List with Sidebar</a></li>
                                        <li><a class="dropdown-item" href="blog-list.html">List no Sidebar</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown">Blog Grid Layouts</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="blog-grid-sidebar.html">Grid with Sidebar</a></li>
                                        <li><a class="dropdown-item" href="blog-grid.html">Grid no Sidebar</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown">Single Post Layouts</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="blog-single-sidebar.html">Article with Sidebar</a></li>
                                        <li><a class="dropdown-item" href="blog-single.html">Article no Sidebar</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Docs / Components</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="docs/dev-setup.html">
                                        <div class="d-flex">
                                            <div class="lead text-muted pt-1"><i class="czi-book"></i></div>
                                            <div class="ml-2"><span class="d-block text-heading">Documentation</span><small class="d-block text-muted">Kick-start customization</small></div>
                                        </div></a></li>
                                <li class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="components/typography.html">
                                        <div class="d-flex">
                                            <div class="lead text-muted pt-1"><i class="czi-server"></i></div>
                                            <div class="ml-2"><span class="d-block text-heading">Components<span class="badge badge-info ml-2">40+</span></span><small class="d-block text-muted">Faster page building</small></div>
                                        </div></a></li>
                                <li class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="docs/changelog.html">
                                        <div class="d-flex">
                                            <div class="lead text-muted pt-1"><i class="czi-edit"></i></div>
                                            <div class="ml-2"><span class="d-block text-heading">Changelog<span class="badge badge-success ml-2">v1.4</span></span><small class="d-block text-muted">Regular updates</small></div>
                                        </div></a></li>
                                <li class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="mailto:contact@createx.studio">
                                        <div class="d-flex">
                                            <div class="lead text-muted pt-1"><i class="czi-help"></i></div>
                                            <div class="ml-2"><span class="d-block text-heading">Support</span><small class="d-block text-muted">contact@createx.studio</small></div>
                                        </div></a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
