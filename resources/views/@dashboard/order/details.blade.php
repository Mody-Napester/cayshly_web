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
                            Order Details ({{ $details->count() }})
                        </h1>
                        <div class="page-header-subtitle">For order number ({{ $order->order_number }})</div>
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
            <div class="card-header">All</div>
            <div class="card-body">
                <div class="datatable">
                    <table class="table table-responsive table-sm table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Product</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Points</th>
                            <th>Quantity</th>
                            <th>Deliver status</th>
                            <th>Deliver date</th>
                            <th>Quantity delivered</th>
                            <th>Agent Comments</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th>Save</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($details as $detail)
                            <tr>
                                <td>{{ $detail->id }}</td>
                                <td>
                                    <?php $product = \App\Models\Product::getOneBy('id', $detail->product_id); ?>
                                    @if($product)
                                        <a target="_blank" href="{{ route('public.product.show', $product->slug) }}">{{ getFromJson($product->name , lang()) }}</a>
                                    @else
                                        <span class="badge badge-secondary">Not Available</span>
                                    @endif
                                </td>
                                <td>{{ getFromJson($detail->product_name , lang()) }}</td>
                                <td>{{ $detail->product_price }}</td>
                                <td>{{ $detail->product_points }}</td>
                                <td>{{ $detail->product_quantity }}</td>
                                <td>{{ $detail->lookup_deliver_status_id }}</td>
                                <td>
                                    <input type="date" name="" value="{{ $detail->deliver_date }}">
                                </td>
                                <td>
                                    <select name="" id="" style="width: 100%;padding: 4px;">
                                        @for($i = 0; $i <= $detail->product_quantity ;$i++)
                                        <option @if($i == $detail->quantity_delivered) selected @endif value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </td>
                                <td>
                                    <input type="text" name="" value="{{ $detail->comments }}">
                                </td>
                                <td>{{ $detail->created_at }}</td>
                                <td>{{ $detail->updated_at }}</td>
                                <td>
                                    <button type="submit" class="btn btn-sm btn-success">Save</button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
