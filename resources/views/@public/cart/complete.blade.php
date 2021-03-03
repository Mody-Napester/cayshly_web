@extends('@public._layouts.master')

@section('page_title') {{ trans('cart.complete') }} @endsection

@section('page_contents')

    <div class="container pb-5 mb-sm-4">
        <div class="pt-5">
            <div class=" py-3 mt-sm-3">
                <div class="card-body text-center">
                    <h2 class="h4 pb-3">Thank you for your order!</h2>
                    <p class="font-size-sm mb-2">Your order has been placed and will be processed as soon as possible.</p>
                    <p class="font-size-sm mb-2">Order number <span class='font-weight-medium'>{{ $order_number }}.</span></p>
                    <p class="font-size-sm">You will be receiving an email shortly with confirmation of your order</p>

{{--                    <a class="btn btn-secondary mt-3 mr-3" href="shop-grid-ls.html">Go back shopping</a>--}}
{{--                    <a class="btn btn-primary mt-3" href="order-tracking.html"><i class="czi-location"></i>&nbsp;Track order</a>--}}
                </div>
            </div>
        </div>
    </div>

@endsection

@section('page_scripts')
    <script !src="">

    </script>
@endsection
