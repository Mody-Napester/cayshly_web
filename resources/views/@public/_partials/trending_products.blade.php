<section class="container pt-5">
    <!-- Heading-->
    <div class="d-flex flex-wrap justify-content-between align-items-center pt-1 border-bottom pb-4 mb-4">
        <h2 class="h3 mb-0 pt-3 mr-2">Trending products</h2>
        <div class="pt-3">
            <a class="btn btn-outline-accent btn-sm" href="">More products<i class="czi-arrow-right ml-1 mr-n1"></i></a>
        </div>
    </div>
    <!-- Grid-->
    <div class="row pt-2 mx-n2">
        @foreach($trending_products as $product)
            <div class="col-lg-3 col-md-4 col-sm-6 px-2">
                @include('@public._partials.product')
            </div>
        @endforeach
    </div>
</section>
