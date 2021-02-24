@extends('@public._layouts.master')

@section('page_title') {{ getFromJson($store->name , lang()) }} @endsection

@section('page_contents')

    <div class="page-title-overlap bg-primary pt-4">
        <div class="container d-flex flex-wrap flex-sm-nowrap justify-content-center justify-content-sm-between align-items-center pt-2">
            <div class="media media-ie-fix align-items-center pb-3">
                <div class="img-thumbnail rounded-circle position-relative" style="width: 80px;height: 80px;overflow: hidden;padding: 0;">
                    <img class="" src="{{ url('assets_public/images/store/picture/'. $store->picture) }}" alt="{{ getFromJson($store->name , lang()) }}">
                </div>
                <div class="media-body pl-3">
                    <h3 class="text-light font-size-lg mb-0">{{ getFromJson($store->name , lang()) }}</h3>
                    <span class="d-block text-light font-size-ms opacity-60 py-1">Member since {{ date('d F Y', $store->created_at->timestamp) }}</span>
                    @if($store->is_authorized == 1)
                        <span class="badge badge-success"><i class="czi-check mr-1"></i>Authorized Store</span>
                    @endif
                </div>
            </div>
            <div class="d-flex">
                <div class="text-sm-right mr-5">
                    <div class="text-light font-size-base">Available Products</div>
                    <h3 class="text-light">{{ $store->products()->count() }}</h3>
                </div>
                <div class="text-sm-right">
                    <div class="text-light font-size-base">Seller rating</div>
                    <div class="star-rating"><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star"></i>
                    </div>
                    <div class="text-light opacity-60 font-size-xs">Based on 98 reviews</div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mb-5 pb-3">
        <div class="bg-light box-shadow-lg rounded-lg overflow-hidden">
            <div class="row">
                <!-- Sidebar-->
                <aside class="col-lg-4">
                    <div class="cz-sidebar-static h-100 border-right">
                        <h6>About</h6>
                        <p class="font-size-ms text-muted">{!! getFromJson($store->details , lang()) !!}</p>
                        <hr class="my-4">
                        <h6>Contacts</h6>
                        <ul class="list-unstyled font-size-sm">
                            @if(!empty($store->phone))
                            <li><i class="czi-phone opacity-60 mr-2"></i>{{ $store->phone }}</li>
                            @endif
                            @if(!empty($store->email))
                            <li><i class="czi-mail opacity-60 mr-2"></i>{{ $store->email }}</li>
                            @endif
                            @if(!empty($store->website))
                            <li><i class="czi-globe opacity-60 mr-2"></i>{{ $store->website }}</li>
                            @endif
                        </ul><a class="social-btn sb-facebook sb-outline sb-sm mr-2 mb-2" href="#"><i class="czi-facebook"></i></a><a class="social-btn sb-twitter sb-outline sb-sm mr-2 mb-2" href="#"><i class="czi-twitter"></i></a><a class="social-btn sb-dribbble sb-outline sb-sm mr-2 mb-2" href="#"><i class="czi-dribbble"></i></a><a class="social-btn sb-behance sb-outline sb-sm mr-2 mb-2" href="#"><i class="czi-behance"></i></a>
                        <hr class="my-4">
                    </div>
                </aside>
                <!-- Content-->
                <section class="col-lg-8 pt-lg-4 pb-md-4 mb-5">
                    <div class="pt-2 px-4 pl-lg-0 pr-xl-5">
                        <h2 class="h3 pt-2 pb-4 mb-4 text-center text-sm-left border-bottom">Products
{{--                            <span class="badge badge-secondary font-size-sm text-body align-middle ml-2">6</span>--}}
                        </h2>
                        <div class="row pt-2">
                            @foreach($store->products as $product)
                                <div class="col-md-4 col-sm-3 mb-4">
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
                </section>
            </div>
        </div>
    </div>

@endsection
