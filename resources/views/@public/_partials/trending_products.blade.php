<section class="container pt-5">
    <!-- Heading-->
    <div class="pt-1 border-bottom pb-4 mb-4 text-center ">
        <h2 class="h3 mb-0 pt-3 mr-2 text-center">{{ trans('partials.Trending_products') }}</h2>
    </div>

    <!-- Grid-->
    <div class="row rtl-ar pt-2 mx-n2">
        @foreach($trending_products as $product)
            <div class="col-lg-3 col-md-4 col-sm-6 mb-3 px-2">
                @include('@public._partials.product')
            </div>
        @endforeach
    </div>
</section>
