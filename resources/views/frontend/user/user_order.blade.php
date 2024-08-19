@extends('frontend.user_master')
@section('content')
<div class="col-lg-12 col-xl-9 col-12">
    <div class="dashboard-my-order mgTop24">
        <div class="dashboard-head-widget style-2">
            <h5 class="dashboard-head-widget-title">My orders</h5>
        </div>
        <div class="dashboard-my-order-table">
            <!-- Single Order Group -->
            @foreach ($orders as $order)
            <div class="table-responsive order-group">
                <table class="recent-order-table-data table">
                    <tbody>
                        <div class="order-group-head">
                            <ul class="order-group-info">
                                <li>Order ID: <span>{{$order->order_no}}</span></li>
                                <li>
                                    Placed On: <span>{{ \Carbon\Carbon::parse($order->created_at)->format('d, M, Y, H:i:s') }}</span>
                                </li>
                            </ul>
                            <div class="order-group-btn">
                                <a class="view-order-btn" href="{{route('order.details', $order->slug)}}">View order</a>
                            </div>
                        </div>
                        <div class="order-group-body">


                            @foreach ( $order->order_details as $detail )



                            <tr>
                                <td>
                                    @if ($detail->product)
                                    <img alt="#" src="{{ url(env('ADMIN_URL') . '/' . $detail->product->image) }}" />
                                    <span class="product-name">{{ $detail->product->name }}</span>
                                    @else
                                    <span class="product-name">Product not found</span>
                                    @endif
                                </td>
                                <td>
                                    Amount:<span class="product-price">{{$detail->total_price}}</span>
                                </td>
                                <td>
                                    Qty:<span class="product-quantity">{{$detail->qty}}</span>
                                </td>
                                <td>
                                    @if($order->order_progress->order_status == 0)
                                    <span class="product-status-btn pending">Pending/Processing</span>
                                    @elseif($order->order_progress->order_status == 1)
                                    <span class="product-status-btn confirmed">Confirmed</span>
                                    @elseif($order->order_progress->order_status == 2)
                                    <span class="product-status-btn intransit">In Transit</span>
                                    @elseif($order->order_progress->order_status == 3)
                                    <span class="product-status-btn delivered">Delivered</span>
                                    @elseif($order->order_progress->order_status == 4)
                                    <span class="product-status-btn cancelled">Cancelled</span>
                                    @else
                                    <span class="product-status-btn unknown">Unknown Status</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </div>
                    </tbody>
                </table>
            </div>

            @endforeach
            <div class="pagination-area">
                {{ $orders->links('vendor.pagination.bootstrap-4') }}
            </div>


        </div>
    </div>
</div>

@endsection