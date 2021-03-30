@extends('@dashboard._layouts.master')

@section('page_title') Order Details @endsection

@section('page_contents')
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="book"></i></div>
                            Order Details ({{ $order->order_number }})
                        </h1>
                    </div>
                    <div class="col-12 col-xl-auto mt-4">

                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main page content-->
    <div class="container mt-n10">
        <div class="card mb-4">
            <div class="card-header">Order Details And Actions</div>
            <div class="card-body">
                <div class="datatable">
                    <table class="table table-responsive table-sm table-bordered table-hover" width="100%" cellspacing="0">
                        <tr>
                            <td><b>Order Number</b></td>
                            <td>{{ $order->order_number }}</td>

                            <td><b>Order By</b></td>
                            <td>{{ ($cb = $order->created_by_user)? $cb->name : '-' }}</td>
                        </tr>
                        <tr>
                            <td><b>Pre Deliver Total Price</b></td>
                            <td>{{ $total_pre_deliver_price }} EGP</td>

                            <td><b>Deliver Total Price</b></td>
                            <td>{{ $total_deliver_price }} EGP</td>
                        </tr>
                        <tr>
                            <td><b>Ordered Products</b></td>
                            <td>{{ $details->sum('product_quantity') }} products</td>

                            <td><b>Delivered Products</b></td>
                            <td>{{ $details->sum('quantity_delivered') }} products</td>
                        </tr>
                        <tr>
                            <td><b>User Address</b></td>
                            <td>{{ $order->address_name }}</td>

                            <td><b>User Comments</b></td>
                            <td>{{ $order->comments }}</td>
                        </tr>
                        <tr>
                            <td><b>Order Date</b></td>
                            <td>{{ custom_date($order->created_at) }}</td>
                            <td colspan="2">{{ human_date($order->created_at) }}</td>
                        </tr>
                        <tr>
                            <td><b>Payment Method</b></td>
                            <td colspan="3">COD</td>
                        </tr>
                    </table>

                    <form action="{{ route('dashboard.order.details.update') }}" method="post">
                        @csrf
                        <input type="hidden" name="order" value="{{ $order->uuid }}">
                        <table class="table table-responsive table-sm table-bordered table-hover" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Points</th>
                                <th>Qnt.</th>
                                <th>Deliver status</th>
                                <th>Deliver date</th>
                                <th>Quantity delivered</th>
                                <th>Agent Comments</th>
                                <th>Updated by</th>
                                <th>Updated at</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($details as $key => $detail)
                                <tr>
                                    <td>{{ ++$key }}</td>
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
                                        @if($detail->lookup_deliver_status_id == 23)
                                            {{ getFromJson(lookup('id', $detail->lookup_deliver_status_id)->name, lang()) }}
                                        @else
                                            <select name="deliver_status[{{$detail->uuid}}]" style="width: 120px;padding: 4px;">
                                                @foreach($deliver_status as $status)
                                                    <option @if($detail->lookup_deliver_status_id == $status->id) selected @endif value="{{ $status->uuid }}">{{ getFromJson($status->name, lang()) }}</option>
                                                @endforeach
                                            </select>
                                        @endif
                                    </td>
                                    <td>
                                        @if($detail->lookup_deliver_status_id == 23)
                                            {{ $detail->deliver_date }}
                                        @else
                                            <input type="date" name="deliver_date[{{$detail->uuid}}]" value="{{ $detail->deliver_date }}">
                                        @endif
                                    </td>
                                    <td>
                                        @if($detail->lookup_deliver_status_id == 23)
                                            {{ $detail->quantity_delivered }}
                                        @else
                                            <select name="quantity_delivered[{{$detail->uuid}}]" style="width: 100%;padding: 4px;">
                                                @for($i = 0; $i <= $detail->product_quantity ;$i++)
                                                    <option @if($i == $detail->quantity_delivered) selected @endif value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                            </select>
                                        @endif
                                    </td>
                                    <td>
                                        @if($detail->lookup_deliver_status_id == 23)
                                            {{ $detail->comments }}
                                        @else
                                            <input type="text" name="comments[{{$detail->uuid}}]" value="{{ $detail->comments }}">
                                        @endif
                                    </td>
                                    <td>{{ (isset($detail->updated_by_user))? $detail->updated_by_user->name : '-' }}</td>
                                    <td>{{ $detail->updated_at }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <hr>

                        <div class="text-right">
                            <button type="submit" class="btn btn-sm btn-success">Save This Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
