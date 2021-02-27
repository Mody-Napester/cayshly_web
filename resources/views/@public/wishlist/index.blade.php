@extends('@public._layouts.master')

@section('page_title') Wishlist @endsection

@section('page_contents')

    <!-- Page Title-->
    <div class="page-title-overlap bg-dark pt-4">
        <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
            <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
                        <li class="breadcrumb-item"><a class="text-nowrap" href="{{ route('public.home') }}"><i class="czi-home"></i>Home</a></li>
                        <li class="breadcrumb-item text-nowrap active" aria-current="page">My wishlist</li>
                    </ol>
                </nav>
            </div>
            <div class="order-lg-1 pr-lg-4 text-center text-lg-left">
                <h1 class="h3 text-light mb-0">My wishlist</h1>
            </div>
        </div>
    </div>
    <!-- Page Content-->
    <div class="container pb-5 mb-2 mb-md-3">
        <div class="row">
            <!-- Sidebar-->
            @include('@public.user._partials.sidebar')

            <!-- Content  -->
            <section class="col-lg-8">
                <!-- Toolbar-->
                <div class="d-none d-lg-flex justify-content-between align-items-center pt-lg-3 pb-4 pb-lg-5 mb-lg-3">
                    <h6 class="font-size-base text-light mb-0">List of items you added to wishlist:</h6><a class="btn btn-primary btn-sm" href="account-signin.html"><i class="czi-sign-out mr-2"></i>Sign out</a>
                </div>
                <!-- Wishlist-->

                <div class="card card-body">
                    @foreach($products as $product)
                        <div class="d-sm-flex justify-content-between mt-lg-4 mb-4 pb-3 pb-sm-2 border-bottom">
                            <div class="media media-ie-fix d-block d-sm-flex text-center text-sm-left">
                                <a class="d-inline-block mx-auto mr-sm-4" href="{{ route('public.product.show', $product->slug) }}" style="width: 10rem;height: 100px;text-align: center;">
                                    <img src="{{ url('assets_public/images/product/picture/'. $product->picture) }}" style="height: 100%;" alt="{{ getFromJson($product->name , lang()) }}">
                                </a>
                                <div class="media-body pt-2">
                                    <h3 class="product-title font-size-base mb-2">
                                        <a href="{{ route('public.product.show', $product->slug) }}">{{ getFromJson($product->name , lang()) }}</a>
                                    </h3>
                                    <div class="font-size-sm"><span class="text-muted mr-2">Store:</span>{{ getFromJson( $product->store->name , lang()) }}</div>
                                    <div class="font-size-lg text-accent pt-2">{{ $product->price }}<small>50</small></div>
                                </div>
                            </div>
                            <div class="pt-2 pl-sm-3 mx-auto mx-sm-0 text-center">
                                <button class="btn btn-outline-danger btn-sm" type="button"><i class="czi-trash mr-2"></i>Remove</button>
                            </div>
                        </div>
                    @endforeach
                </div>


            </section>
        </div>
    </div>

@endsection
