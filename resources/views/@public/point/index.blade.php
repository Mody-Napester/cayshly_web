@extends('@public._layouts.master')

@section('page_title') {{ trans('point.my_points') }} @endsection

@section('page_contents')

    <!-- Page Title-->
    <div class="page-title-overlap bg-dark pt-4">
        <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
            <div class="point-lg-2 mb-3 mb-lg-0 pt-lg-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
                        <li class="breadcrumb-item"><a class="text-nowrap fire-loader-anchor" href="{{ route('public.home') }}"><i class="czi-home"></i>{{ trans('master.Home') }}</a></li>
                        <li class="breadcrumb-item text-nowrap active" aria-current="page"><i style="margin-right: 5px;" class="czi-heart"></i> {{ trans('point.my_points') }}</li>
                    </ol>
                </nav>
            </div>
            <div class="point-lg-1 pr-lg-4 text-center text-lg-left">
                <h1 class="h3 text-light mb-0"><i style="margin-right: 5px;" class="czi-heart"></i> {{ trans('point.my_points') }}</h1>
            </div>
        </div>
    </div>
    <!-- Page Content-->
    <div class="container pb-5 mb-2 mb-md-3">
        <div class="row rtl-ar">
            <!-- Sidebar-->
            @include('@public.user._partials.sidebar', ['page' => 'point'])

            <!-- Content  -->
            <section class="col-lg-8">
                <!-- Toolbar-->
                <div class="d-none d-lg-flex justify-content-between align-items-center pt-lg-3 pb-4 pb-lg-5 mb-lg-3">
                    <h6 class="font-size-base text-light mb-0">{{ trans('point.List_of_your_points') }}: <b>( {{ user_points($user->id)['points'] }} ) {{ trans('point.point') }}</b></h6>
                    @include('@public._partials.logout_btn')
                </div>

                <!-- point-->
                <div class="card card-body">
                    <div class="table-responsive font-size-md">
                        <table class="table table-hover mb-0">
                            <thead>
                            <tr>
                                <th>{{ trans('point.date') }}</th>
                                <th>{{ trans('point.amount') }}</th>
                                <th>{{ trans('point.reason') }}</th>
                                <th>{{ trans('point.product') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($user->points as $point)
                                    <tr>
                                        <td>{{ custom_date($point->created_at) }}</td>
                                        <td>{{ $point->amount }} {{ ($point->action == 1)? '+' : '-'}}</td>
                                        <td>{{ getFromJson(lookup('id', $point->lookup_point_reason_id)->name, lang()) }}</td>
                                        <td>
                                            @if(isset($point->product))
                                                <a target="_blank" href="{{ route('public.product.show', $point->product->slug) }}">
                                                    {{ getFromJson($point->product->name, lang()) }}
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </section>
        </div>
    </div>

@endsection
