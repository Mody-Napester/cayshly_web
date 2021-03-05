@extends('@public._layouts.master')

@section('page_title') {{ $store->name }} @endsection

@section('page_contents')

    <div class="page-title-overlap bg-primary pt-4">
        <div class="container d-flex flex-wrap flex-sm-nowrap justify-content-center justify-content-sm-between align-items-center pt-2">
            <div class="media media-ie-fix align-items-center pb-3">
                <div class="img-thumbnail rounded-circle position-relative" style="width: 80px;height: 80px;overflow: hidden;padding: 0;">
                    <img class="" src="{{ url('assets_public/images/store/picture/'. $store->picture) }}" alt="{{ $store->name }}">
                </div>
                <div class="media-body pl-3">
                    <h3 class="text-light font-size-lg mb-0">{{ $store->name }}</h3>
                    <span class="d-block text-light font-size-ms opacity-60 py-1">{{ trans('stores.Member_since') }} {{ date('d F Y', $store->created_at->timestamp) }}</span>
                    @if($store->is_authorized == 1)
                        <span class="badge badge-success"><i class="czi-check mr-1"></i>{{ trans('stores.Authorized_Store') }}</span>
                    @endif
                </div>
            </div>
            <div class="d-flex">
                <div class="text-sm-right mr-5">
                    <div class="text-light font-size-base">{{ trans('stores.Available_Products') }}</div>
                    <h3 class="text-light">{{ $store->products()->count() }}</h3>
                </div>
                <div class="text-sm-right">
                    <div class="text-light font-size-base">{{ trans('stores.Seller_rating') }}</div>
                    <div class="star-rating">
                        <i class="sr-star czi-star-filled active"></i>
                        <i class="sr-star czi-star-filled active"></i>
                        <i class="sr-star czi-star-filled active"></i>
                        <i class="sr-star czi-star-filled active"></i>
                        <i class="sr-star czi-star"></i>
                    </div>
                    <div class="text-light opacity-60 font-size-xs">{{ trans('stores.Based_on') }} 98 {{ trans('stores.reviews') }}</div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mb-5 pb-3">
        <div class="bg-light box-shadow-lg rounded-lg overflow-hidden">
            <div class="row">
                <!-- Sidebar-->
                <aside class="col-lg-4">
                    <div class="cz-sidebar-static h-100 border-right">
                        <h6>{{ trans('stores.About') }}</h6>
                        <p class="font-size-ms text-muted">{!! getFromJson($store->details , lang()) !!}</p>
                        <hr class="my-4">
                        <h6>{{ trans('stores.Contacts') }}</h6>
                        <ul class="list-unstyled font-size-sm">
                            @if(!empty($store->phone))
                            <li><i class="czi-phone opacity-60 mr-2"></i>{{ $store->phone }}</li>
                            @endif
                            @if(!empty($store->email))
                            <li><i class="czi-mail opacity-60 mr-2"></i>{{ $store->email }}</li>
                            @endif
                            @if(!empty($store->website))
                            <li><i class="czi-globe opacity-60 mr-2"></i>{{ $store->website }}</li>
                            @endif
                        </ul>

{{--                        <a class="social-btn sb-facebook sb-outline sb-sm mr-2 mb-2" href="#"><i class="czi-facebook"></i></a>--}}
{{--                        <a class="social-btn sb-twitter sb-outline sb-sm mr-2 mb-2" href="#"><i class="czi-twitter"></i></a>--}}
{{--                        <a class="social-btn sb-dribbble sb-outline sb-sm mr-2 mb-2" href="#"><i class="czi-dribbble"></i></a>--}}
{{--                        <a class="social-btn sb-behance sb-outline sb-sm mr-2 mb-2" href="#"><i class="czi-behance"></i></a>--}}

{{--                        <hr class="my-4">--}}
                    </div>
                </aside>
                <!-- Content-->
                <section class="col-lg-8 pt-lg-4 pb-md-4 mb-5">
                    <div class="pt-2 px-4 pl-lg-0 pr-xl-5">
                        <h2 class="h3 pt-2 pb-4 mb-4 text-center text-sm-left border-bottom">{{ trans('stores.Products') }}
{{--                            <span class="badge badge-secondary font-size-sm text-body align-middle ml-2">6</span>--}}
                        </h2>
                        <div class="row pt-2">
                            @foreach($store->products as $product)
                                <div class="col-md-4 col-sm-6 col-xs-1 mb-4">
                                    @include('@public._partials.product')
                                </div>
                            @endforeach
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

@endsection
