@extends('@public._layouts.master')

@section('page_title') {{ trans('order.order') }} @endsection

@section('page_contents')

    <!-- Page Title-->
    <div class="page-title-overlap bg-dark pt-4">
        <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
            <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
                        <li class="breadcrumb-item"><a class="text-nowrap fire-loader-anchor" href="{{ route('public.home') }}"><i class="czi-home"></i>{{ trans('master.Home') }}</a></li>
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
        <div class="row rtl-ar">
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
                                <th>{{ trans('order.Deliver_to') }}</th>
                                <th>{{ trans('order.Total') }}</th>
                                <th>{{ trans('order.Details') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($user->orders as $order)
                                <tr>
                                    <td class="py-3">
                                        <a class="nav-link-style font-weight-medium font-size-sm">{{ $order->order_number }}</a>
                                    </td>
                                    <td class="py-3">{{ date('d \of M Y', $order->created_at->timestamp) }}</td>
                                    <td class="py-3">{{ $order->address_name }}</td>
                                    <?php

                                    $data['total_pre_deliver_price'] = 0;
                                    $data['total_deliver_price'] = 0;
                                    foreach ($order->details as $detail){
                                        $data['total_pre_deliver_price'] += ($detail->product_quantity * $detail->product_price);
                                        $data['total_deliver_price'] += ($detail->quantity_delivered * $detail->product_price);
                                    }

                                    ?>
                                    <td class="py-3">{{ $data['total_pre_deliver_price'] }} EGP</td>
                                    <td class="py-3"><span style="cursor: pointer;" class="badge badge-primary open-details"><i class="czi-arrow-down"></i></span></td>
                                </tr>
                                <tr style="display: none;background-color: #eeeeee" class="order-opened-details">
                                    <td colspan="5">
                                        <table class="table table-sm">
                                            <tr>
                                                <td>{{ trans('order.Product') }}</td>
                                                <td>{{ trans('order.Price') }}</td>
                                                <td>{{ trans('order.Points') }}</td>
                                                <td>{{ trans('order.Qnt') }}</td>
                                                <td>{{ trans('order.Status') }}</td>
                                            </tr>
                                            @foreach($order->details as $detail)
                                                <tr>
                                                    <td>
                                                        <?php $product = \App\Models\Product::getOneBy('id', $detail->product_id); ?>
                                                        @if($product)
                                                            <a target="_blank" href="{{ route('public.product.show', $product->slug) }}">{{ getFromJson($product->name , lang()) }}</a>
                                                        @else
                                                            <span class="badge badge-secondary">{{ getFromJson($detail->product_name , lang()) }}</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $detail->product_price }}</td>
                                                    <td>{{ $detail->product_points }}</td>
                                                    <td>{{ $detail->product_quantity }}</td>
                                                    <td>
                                                        <?php
                                                        $status = lookup('id', $detail->lookup_deliver_status_id);
                                                        if(isset($status)){
                                                            $status = getFromJson($status->name, lang());
                                                        }else{
                                                            $status = trans('order.processing');
                                                        }
                                                        ?>
                                                        <span class="badge badge-success">{{ $status }}</span></td>
                                                </tr>
                                            @endforeach
                                        </table>
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

@section('page_scripts')
    <script>
        $('.open-details').on('click', function () {
            $(this).parents('tr').next('tr').slideToggle();
        });
    </script>
@endsection
