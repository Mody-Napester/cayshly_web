<div class="card product-card">
    <span class="badge badge-success badge-shadow">{{ trans('partials.New') }}</span>
{{--    <span class="badge badge-success badge-shadow">{{ trans('partials.Sale') }}</span>--}}
    <div class="product-card-actions d-flex align-items-center">
{{--        <a class="btn-action nav-link-style mr-2" href="#"><i class="czi-compare mr-1"></i>Compare</a>--}}

        @if(auth()->check())
            <form action="{{ route('public.wishlist.store') }}" method="post">
                @csrf
                <input type="hidden" name="wishlist_product" value="{{ $product->uuid }}">
                <button class="btn-wishlist btn-sm" type="submit" data-toggle="tooltip" data-placement="left" title="{{ trans('partials.Add_to_wishlist') }}">
                    <i class="czi-heart"></i>
                </button>
            </form>
        @endif
    </div>

    <a class="card-img-top d-block overflow-hidden text-center" href="{{ route('public.product.show', $product->slug) }}" style="height: 180px;width: 100%;">
        <img style="height: 100%;" src="{{ url('assets_public/images/product/picture/'. $product->picture) }}" alt="{{ getFromJson($product->name , lang()) }}">
    </a>
    <div class="card-body py-2">
        <a class="product-meta d-block font-size-xs pb-1" href="">{{ getFromJson( $product->store->name , lang()) }}</a>
        <h3 class="product-title font-size-sm" style="height: 40px;">
            <a href="{{ route('public.product.show', $product->slug) }}">{{ getFromJson($product->name , lang()) }}</a>
        </h3>
        <div class="d-flex justify-content-between">
            <div class="product-price">
                <span class="text-danger"><b>{{ $product->price }}</b> <small>00</small></span>
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
        <button class="btn btn-primary btn-sm btn-block mb-2 add_to_cart" type="button" data-item="{{ $product->uuid }}">
            <i class="czi-cart font-size-sm mr-1"></i>{{ trans('partials.Add_to_Cart') }}
        </button>

{{--        <div class="text-center">--}}
{{--            <a class="nav-link-style font-size-ms" href="#quick-view-electro" data-toggle="modal"><i class="czi-eye align-middle mr-1"></i>Quick view</a>--}}
{{--        </div>--}}
    </div>
</div>
<hr class="d-sm-none">
