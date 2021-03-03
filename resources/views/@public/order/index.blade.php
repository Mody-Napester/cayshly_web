@extends('@public._layouts.master')

@section('page_title') {{ trans('order.order') }} @endsection

@section('page_contents')

    <!-- Page Title-->
    <div class="page-title-overlap bg-dark pt-4">
        <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
            <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
                        <li class="breadcrumb-item"><a class="text-nowrap" href="{{ route('public.home') }}"><i class="czi-home"></i>{{ trans('master.Home') }}</a></li>
                        <li class="breadcrumb-item text-nowrap active" aria-current="page">{{ trans('order.Orders_history') }}</li>
                    </ol>
                </nav>
            </div>
            <div class="order-lg-1 pr-lg-4 text-center text-lg-left">
                <h1 class="h3 text-light mb-0">{{ trans('order.My_orders') }}</h1>
            </div>
        </div>
    </div>

    <!-- Page Content-->
    <div class="container pb-5 mb-2 mb-md-3">
        <div class="row">
            <!-- Sidebar-->
            @include('@public.user._partials.sidebar', ['page' => 'order'])

            <!-- Content  -->
            <section class="col-lg-8">
                <!-- Toolbar-->
                <div class="d-flex justify-content-between align-items-center pt-lg-2 pb-4 pb-lg-5 mb-lg-3">
                    <h6 class="font-size-base text-light mb-0">{{ trans('wishlist.List_of_your_orders') }}:</h6>
                    @include('@public._partials.logout_btn')
                </div>

                <!-- Orders list-->
                <div class="card card-body">
                    <div class="table-responsive font-size-md">
                        <table class="table table-hover mb-0">
                            <thead>
                            <tr>
                                <th>{{ trans('order.Order') }} #</th>
                                <th>{{ trans('order.Date_Purchased') }}</th>
                                <th>{{ trans('order.Status') }}</th>
                                <th>{{ trans('order.Total') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($user->orders as $order)
                            <tr>
                                <td class="py-3">
                                    <a class="nav-link-style font-weight-medium font-size-sm">{{ $order->order_number }}</a>
                                </td>
                                <td class="py-3">{{ date('d \of M Y', $order->created_at->timestamp) }}</td>
                                <td class="py-3"><span class="badge badge-info m-0">In Progress</span></td>
                                <td class="py-3">{{ $order->details()->sum('product_price') }} EGP</td>
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
