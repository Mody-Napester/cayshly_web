<div class="col-md-4 col-sm-6">
    <a href="{{ $offer->link }}" title="{{ getFromJson($offer->name , lang()) }}">
        <img class="d-block ml-auto" src="{{ url('assets_public/images/offer/picture/'. $offer->picture) }}" alt="{{ getFromJson($offer->name , lang()) }}">
    </a>
</div>
