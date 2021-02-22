<section class="container mb-5">
    <div class="cz-carousel border-right">
        <div class="cz-carousel-inner" data-carousel-options="{ &quot;nav&quot;: false, &quot;controls&quot;: false, &quot;autoplay&quot;: true, &quot;autoplayTimeout&quot;: 4000, &quot;loop&quot;: true, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;360&quot;:{&quot;items&quot;:2},&quot;600&quot;:{&quot;items&quot;:3},&quot;991&quot;:{&quot;items&quot;:4},&quot;1200&quot;:{&quot;items&quot;:4}} }">
            @foreach($brands as $brand)
            <div>
                <a class="d-block bg-white border py-4 py-sm-5 px-2" href="#" style="margin-right: -.0625rem;">
                    <img class="d-block mx-auto" src="{{ url('assets_public/images/brand/picture/'. $brand->picture) }}" style="width: 165px;" alt="{{ getFromJson($brand->name , lang()) }}">
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>
