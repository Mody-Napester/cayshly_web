@foreach($offers as $offer)
    <section class="container mt-4 mb-grid-gutter">
        <div class="bg-faded-info rounded-lg py-4">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="px-4 pr-sm-0 pl-sm-5">
                        <span class="badge badge-danger">Limited Offer</span>
                        <h3 class="mt-4 mb-1 text-body font-weight-light">All new</h3>
                        <h2 class="mb-1">{{ getFromJson($offer->name , lang()) }}</h2>
                        <p class="h5 text-body font-weight-light">at discounted price. Hurry up!</p>
                        <a class="btn btn-accent" href="{{ $offer->link }}">View offers<i class="czi-arrow-right font-size-ms ml-1"></i></a>
                    </div>
                </div>
                <div class="col-md-6">
                    <img src="{{ url('assets_public/images/offer/picture/'. $offer->picture) }}" alt="{{ getFromJson($offer->name , lang()) }}">
                </div>
            </div>
        </div>
    </section>
@endforeach
