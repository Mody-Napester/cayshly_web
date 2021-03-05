@extends('@public._layouts.master')

@section('page_title') {{ trans('master.offers') }} @endsection

@section('page_contents')

    <!-- Page title-->
    <div class="page-title-overlap bg-success pt-4 pb-4">
        <div class="container pt-lg-3 pb-lg-4">
            <div class="d-lg-flex pb-5 mb-3 justify-content-between">
                <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
                            <li class="breadcrumb-item"><a class="text-nowrap fire-loader-anchor" href="{{ route('public.home') }}"><i class="czi-home"></i>{{ trans('master.Home') }}</a></li>
                            <li class="breadcrumb-item text-nowrap active" aria-current="page">{{ trans('master.Offers') }}</li>
                        </ol>
                    </nav>
                </div>
                <div class="order-lg-1 pr-lg-4 text-center text-lg-left">
                    <h1 class="h3 text-light mb-0"><i style="margin-right: 5px;" class="czi-loudspeaker"></i> {{ trans('master.Offers') }}</h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Page Content-->
    <div class="container pb-5 mb-2 mb-md-4">
        <div class="row">
            @foreach($offers as $offer)
            <div class="col-md-6">
                <div class="py-sm-2">
                    <div class="d-sm-flex justify-content-between align-items-center bg-secondary overflow-hidden mb-4 rounded-lg">
                        <div class="py-4 my-2 my-md-0 py-md-5 px-4 ml-md-3 text-center text-sm-left">
                            <h4 class="font-size-lg font-weight-light mb-2">{{ trans('offer.Hot_Offer') }}</h4>
                            <h3 class="mb-4">{{ getFromJson($offer->name , lang()) }}</h3>
                            <a class="btn btn-primary btn-shadow btn-sm fire-loader-anchor" href="{{ $offer->link }}">{{ trans('offer.Shop_Now') }}</a>
                        </div>
                        <img class="d-block ml-auto" style="width: 75%;height: 100%;" src="{{ url('assets_public/images/offer/picture/'. $offer->picture) }}" alt="{{ getFromJson($offer->name , lang()) }}">
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

@endsection
