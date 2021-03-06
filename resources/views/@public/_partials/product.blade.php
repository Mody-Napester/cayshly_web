<div class="card product-card">
    <span class="badge badge-success badge-shadow">{{ trans('partials.New') }}</span>
    @if($product->discount_type != 1)
        <span class="badge badge-danger badge-shadow">{{ getProductAfterDiscount($product)['discount'] }}</span>
    @endif

    <div class="product-card-actions d-flex align-items-center">
        @if(auth()->check())
            @if(!in_array($product->id, auth()->user()->wishlists()->pluck('product_id')->toArray()))
                <form action="{{ route('public.wishlist.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="wishlist_product" value="{{ $product->uuid }}">
                    <button class="btn-wishlist btn-sm fire-loader-button" type="submit" data-toggle="tooltip" data-placement="left" title="{{ trans('partials.Add_to_wishlist') }}">
                        <i class="czi-heart"></i>
                    </button>
                </form>
            @endif
        @endif
    </div>

    <a class="card-img-top d-block overflow-hidden text-center fire-loader-anchor" href="{{ route('public.product.show', $product->slug) }}" style="height: 180px;width: 100%;">
        <img style="height: 100%;" src="{{ url('assets_public/images/product/picture/'. $product->picture) }}" alt="{{ getFromJson($product->name , lang()) }}">
    </a>
    <div class="card-body py-2">
        <a class="product-meta d-block font-size-xs pb-1 fire-loader-anchor" href="{{ route('public.store.show', $product->store->slug) }}">{{ $product->store->name }}</a>
        <h3 class="product-title font-size-sm" style="height: 40px;">
            <a class=" fire-loader-anchor" href="{{ route('public.product.show', $product->slug) }}">{{ getFromJson($product->name , lang()) }}</a>
        </h3>
        <div class="d-flex justify-content-between">
            <div class="product-price">
                <span class="text-danger"><b>{{ getProductAfterDiscount($product)['price'] }}</b> <small>EGP</small></span>

                @if($product->discount_type != 1)
                <del class="font-size-sm text-muted">{{ $product->price }}<small>EGP</small></del>
                @endif
            </div>
{{--            <div class="star-rating">--}}
{{--                <i class="sr-star czi-star-filled active"></i>--}}
{{--                <i class="sr-star czi-star-filled active"></i>--}}
{{--                <i class="sr-star czi-star-filled active"></i>--}}
{{--                <i class="sr-star czi-star-filled active"></i>--}}
{{--                <i class="sr-star czi-star"></i>--}}
{{--            </div>--}}
        </div>
    </div>
{{--    <div class="card-body card-body-hidden">--}}
    <div class="card-body pt-2 pb-4">
        <div class="btn-cart-status">
            @if(check_product_in_the_cart($product))
                @include('@public._partials.remove_from_cart_btn')
            @else
                @include('@public._partials.add_to_cart_btn')
            @endif
        </div>

{{--        <div class="text-center">--}}
{{--            <a class="nav-link-style font-size-ms" href="#quick-view-electro" data-toggle="modal"><i class="czi-eye align-middle mr-1"></i>Quick view</a>--}}
{{--        </div>--}}
    </div>
</div>
<hr class="d-sm-none">
