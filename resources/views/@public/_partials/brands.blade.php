<section class="container mb-5">
    <!-- Heading-->
    <div class="pt-1 border-bottom pb-4 mb-4 text-center ">
        <h2 class="h3 mb-0 pt-3 mr-2 text-center">{{ trans('partials.Top_Brands') }}</h2>
    </div>

    <div class="cz-carousel border-right">
        <div class="cz-carousel-inner" data-carousel-options="{ &quot;nav&quot;: false, &quot;controls&quot;: false, &quot;autoplay&quot;: true, &quot;autoplayTimeout&quot;: 4000, &quot;loop&quot;: true, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;360&quot;:{&quot;items&quot;:2},&quot;600&quot;:{&quot;items&quot;:3},&quot;991&quot;:{&quot;items&quot;:4},&quot;1200&quot;:{&quot;items&quot;:4}} }">
            @foreach($brands as $brand)
            <div>
                <a class="d-block bg-white border py-4 py-sm-5 px-2 fire-loader-anchor" href="{{ route('public.brand.product.index', $brand->slug) }}" style="padding:8;height: 150px;text-align: center">
                    <img class="d-block mx-auto" src="{{ url('assets_public/images/brand/picture/'. $brand->picture) }}" style="height: 100%;" alt="{{ getFromJson($brand->name , lang()) }}">
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>
