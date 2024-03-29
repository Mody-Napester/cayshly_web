@extends('@public._layouts.master')

@section('page_title') {{ trans('master.Home') }} @endsection

@section('page_contents')

    <!-- Hero (Banners + Slider)-->
    @include('@public._partials.slider')

    <!-- Products grid (Trending products)-->
    @include('@public._partials.trending_products')

    <br>

    <!-- Offers-->
    @include('@public._partials.offers')

    <br>

    <!-- Brands -->
    @include('@public._partials.brands')

@endsection
