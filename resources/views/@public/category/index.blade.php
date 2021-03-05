@extends('@public._layouts.master')

@section('page_title') {{ trans('home.categories') }} @endsection

@section('page_contents')

    <!-- Page title-->
    <div class="page-title-overlap bg-primary pt-4 pb-4">
        <div class="container pt-lg-3 pb-lg-4">
            <div class="d-lg-flex pb-5 mb-3 justify-content-between">
                <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
                            <li class="breadcrumb-item"><a class="text-nowrap fire-loader-anchor" href="{{ route('public.home') }}"><i class="czi-home"></i>{{ trans('master.Home') }}</a></li>
                            <li class="breadcrumb-item text-nowrap active" aria-current="page">{{ trans('master.Categories') }}</li>
                        </ol>
                    </nav>
                </div>
                <div class="order-lg-1 pr-lg-4 text-center text-lg-left">
                    <h1 class="h3 text-light mb-0"><i style="margin-right: 5px;" class="czi-view-grid"></i> {{ trans('master.Categories') }}</h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Page Content-->
    <div class="container pb-5 mb-2 mb-md-4">
        <div class="">
            <div class="row pt-3 mx-n2">
                @foreach($categories as $category)
                <div class="col-md-4 col-sm-6 mb-3">
                    <div class="card border-0">
                        <a class="d-block overflow-hidden rounded-lg fire-loader-anchor" style="height: 180px;overflow: hidden;" href="{{ route('public.category.show', $category->slug) }}">
                            <img class="d-block w-100" src="{{ url('assets_public/images/category/picture/'. $category->picture) }}" alt="{{ getFromJson($category->name , lang()) }}">
                        </a>
                        <div class="card-body">
                            <h2 class="h5">{{ getFromJson($category->name , lang()) }}</h2>
                            <ul class="list-unstyled font-size-sm mb-0">
                                @foreach(\App\Models\Category::getAllBy('parent_id', $category->id) as $child)
                                <li class="d-flex align-items-center justify-content-between">
                                    <a class="nav-link-style fire-loader-anchor" href="{{ route('public.category.product.index', $child->slug) }}"><i class="czi-arrow-right-circle mr-2"></i>{{ getFromJson($child->name , lang()) }}</a>
                                    <span class="font-size-ms text-muted">
                                        {{ $child->products()->count() }} {{ trans('category.Products') }}
                                    </span>
                                </li>
                                @endforeach
{{--                                <li>--}}
{{--                                    <hr>--}}
{{--                                </li>--}}
    {{--                            <li class="d-flex align-items-center justify-content-between">--}}
    {{--                                <a class="nav-link-style" href="#"><i class="czi-arrow-right-circle mr-2"></i>View all</a>--}}
    {{--                                <span class="font-size-ms text-muted">2,548</span>--}}
    {{--                            </li>--}}
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
