<div class="card product-card">
    <span class="badge badge-success badge-shadow">New</span>
    <div class="product-card-actions d-flex align-items-center">
        <a class="btn-action nav-link-style mr-2" href="#"><i class="czi-compare mr-1"></i>Compare</a>
        <button class="btn-wishlist btn-sm" type="button" data-toggle="tooltip" data-placement="left" title="Add to wishlist">
            <i class="czi-heart"></i>
        </button>
    </div>

    <a class="card-img-top d-block overflow-hidden text-center" href="" style="height: 180px;width: 100%;">
        <img style="height: 100%;" src="{{ url('assets_public/images/product/picture/'. $product->picture) }}" alt="{{ getFromJson($product->name , lang()) }}">
    </a>
    <div class="card-body py-2">
        <a class="product-meta d-block font-size-xs pb-1" href="">{{ getFromJson( $product->store->name , lang()) }}</a>
        <h3 class="product-title font-size-sm" style="height: 40px;">
            <a href="">{{ getFromJson($product->name , lang()) }}</a>
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
        <button class="btn btn-primary btn-sm btn-block mb-2" type="button" data-toggle="toast" data-target="#cart-toast">
            <i class="czi-cart font-size-sm mr-1"></i>Add to Cart
        </button>

{{--        <div class="text-center">--}}
{{--            <a class="nav-link-style font-size-ms" href="#quick-view-electro" data-toggle="modal"><i class="czi-eye align-middle mr-1"></i>Quick view</a>--}}
{{--        </div>--}}
    </div>
</div>
<hr class="d-sm-none">
