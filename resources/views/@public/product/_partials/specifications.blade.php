<div class="tab-pane fade" id="specs" role="tabpanel">
    <div class="d-md-flex justify-content-between align-items-start pb-4 mb-4 border-bottom">
        <div class="media align-items-center mr-md-3"><img src="{{ url('assets_public/images/product/picture/'. $product->picture) }}" width="90" alt="{{ getFromJson($product->name , lang()) }}">
            <div class="mdeia-body pl-3">
                <h6 class="font-size-base mb-2">{{ getFromJson($product->name , lang()) }}</h6>
                <div class="h4 font-weight-normal text-accent">{{ $product->price }} <small>EGP</small></div>
            </div>
        </div>

    </div>
    <!-- Specs table-->
    <div class="row pt-2">
        <div class="col-sm-8 offset-sm-2">
            @if($product->specifications()->count() > 0)
{{--            <h3 class="h6">General specs</h3>--}}
            <ul class="list-unstyled font-size-sm pb-2">
                @foreach($product->specifications as $specification)
                <li class="d-flex justify-content-between pb-2 border-bottom"><span class="text-muted">{{ getFromJson($specification->name , lang()) }}:</span><span>{{ $specification->pivot->value }}</span></li>
                @endforeach
            </ul>
            @else
                <p class="text-center">{{ trans('products.No_Data_Available') }}</p>
            @endif
        </div>
{{--        offset-lg-1--}}
    </div>
</div>
