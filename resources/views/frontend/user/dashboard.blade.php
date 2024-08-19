@extends('frontend.user_master')
@section('content')



<div class="col-lg-12 col-xl-9 col-12">
    <div class="dasboard-data-card mgTop24">
        <div class="single-data-card card-1">
            <div class="data-card-info">
                <h3>{{ $totalOrderPlaced ?? "00"}}</h3>
                <p>Total order placed</p>
            </div>
            <div class="data-card-icon">
                <img alt="#" src="{{asset('assets/img/dashboard-data-card-images/icon-1.svg')}}" />
            </div>
        </div>
        <div class="single-data-card card-2">
            <div class="data-card-info">
                <h3>{{ $totalRunningOrder ?? "00" }}</h3>
                <p>Running orders</p>
            </div>
            <div class="data-card-icon">
                <img alt="#" src="{{asset('assets/img/dashboard-data-card-images/icon-2.svg')}}" />
            </div>
        </div>
        <div class="single-data-card card-3">
            <div class="data-card-info">
                <h3>{{ session('cart') ? count(session('cart')) : 0 }}</h3>
                <p>Items in cart</p>
            </div>
            <div class="data-card-icon">
                <img alt="#" src="{{asset('assets/img/dashboard-data-card-images/icon-3.svg')}}" />
            </div>
        </div>
        <div class="single-data-card card-4">
            <div class="data-card-info">
                <h3>{{ $itemsInWishList }}</h3>
                <p>Product in wishlist's</p>
            </div>
            <div class="data-card-icon">
                <img alt="#" src="{{asset('assets/img/dashboard-data-card-images/icon-4.svg')}}" />
            </div>
        </div>
        <div class="single-data-card card-5">
            <div class="data-card-info">
                <h3>{{ number_format($totalAmountSpent) }}</h3>
                <p>Amount spent</p>
            </div>
            <div class="data-card-icon">
                <img alt="#" src="{{asset('assets/img/dashboard-data-card-images/icon-5.svg')}}" />
            </div>
        </div>
        <div class="single-data-card card-6">
            <div class="data-card-info">
                <h3>{{$totalOpenedTickets}}</h3>
                <p>Available balance</p>
            </div>
            <div class="data-card-icon">
                <img alt="#" src="{{asset('assets/img/dashboard-data-card-images/icon-6.svg')}}" />
            </div>
        </div>
    </div>
    <div class="recent-order-table-area">
        <div class="dashboard-head-widget">
            <h5 class="dashboard-head-widget-title">Recent orders</h5>
            <div class="dashboard-head-widget-btn">
                <a class="theme-btn" href="{{route('user.order')}}">All orders</a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="recent-order-table-data table">
                <tbody>

                    @foreach ($orders as $order)

                    <tr>
                        <td>
                            <div class="product-item">
                                @foreach ($order->order_details as $detail)
                                @if ($detail->product)
                                <img alt="Product Image" src="{{ url(env('ADMIN_URL') . '/' . $detail->product->image) }}" />
                                @break
                                @endif
                                @endforeach
                                <span class="product-id">#{{ $order->order_no ?? '00' }}</span>
                                <strong class="product-date">{{ $order->created_at->format('M d, Y h:i:s A') ?? '00' }}</strong>
                            </div>
                        </td>
                        <td>
                            <div class="order-details-info-status">
                                @if ($order->order_status == 0)
                                <span class="status-label">Pending/Processing</span>
                                @elseif ($order->order_status == 1)
                                <span class="status-label">Confirmed</span>
                                @elseif ($order->order_status == 2)
                                <span class="status-label">In Transit</span>
                                @elseif ($order->order_status == 3)
                                <span class="status-label">Delivered</span>
                                @elseif ($order->order_status == 4)
                                <span class="status-label">Cancelled</span>
                                @else
                                <span class="status-label">Unknown Status</span>
                                @endif
                            </div>
                        </td>
                        <td>
                            @php
                            $totalQty = 0;
                            @endphp

                            @foreach ($order->order_details as $detail)
                            @php
                            $totalQty += $detail->qty;
                            @endphp
                            @endforeach
                            Items:<span class="product-quantity">{{$totalQty}} piece</span>
                        </td>
                        <td>
                            Amount:<span class="product-price">{{$order->total}} BDT</span>
                        </td>
                        <td>
                            <a class="view-order-btn" href="{{route('order.details', $order->slug)}}">Order details</a>
                        </td>
                    </tr>
                    @endforeach



                    <!-- <tr>
                        <td>
                            <img alt="#" style="color: transparent" src="{{asset('assets/img/my-order-product/product-2.png')}}" /><span class="product-id">#5265652464461</span>
                            <strong class="product-date">Jun 10, 2024 10:29:30 AM</strong>
                        </td>
                        <td>
                            <span class="product-status-btn complete">Complete</span>
                        </td>
                        <td>
                            Items:<span class="product-quantity">200 piece</span>
                        </td>
                        <td>
                            Amount:<span class="product-price">40,000 BDT</span>
                        </td>
                        <td>
                            <a class="view-order-btn" href="order-details.html">Order details</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img alt="#" src="{{asset('assets/img/my-order-product/product-3.png')}}" /><span class="product-id">#5265652464461</span>
                            <strong class="product-date">Jun 10, 2024 10:29:30 AM</strong>
                        </td>
                        <td>
                            <span class="product-status-btn cancelled">Cancelled
                            </span>
                        </td>
                        <td>
                            Items:<span class="product-quantity">50 piece</span>
                        </td>
                        <td>
                            Amount:<span class="product-price">10,000 BDT</span>
                        </td>
                        <td>
                            <a class="view-order-btn" href="order-details.html">Order details</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img alt="#" src="{{asset('assets/img/my-order-product/product-4.png')}}" /><span class="product-id">#5265652464461</span>
                            <strong class="product-date">Jun 10, 2024 10:29:30 AM</strong>
                        </td>
                        <td>
                            <span class="product-status-btn in-progress">In progress</span>
                        </td>
                        <td>
                            Items:<span class="product-quantity">20 piece</span>
                        </td>
                        <td>
                            Amount:<span class="product-price">4,000 BDT</span>
                        </td>
                        <td>
                            <a class="view-order-btn" href="order-details.html">Order details</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img alt="#" src="{{asset('assets/img/my-order-product/product-5.png')}}" /><span class="product-id">#5265652464461</span>
                            <strong class="product-date">Jun 10, 2024 10:29:30 AM</strong>
                        </td>
                        <td>
                            <span class="product-status-btn on-hold">On hold</span>
                        </td>
                        <td>
                            Items:<span class="product-quantity">50 piece</span>
                        </td>
                        <td>
                            Amount:<span class="product-price">10,000 BDT</span>
                        </td>
                        <td>
                            <a class="view-order-btn" href="order-details.html">Order details</a>
                        </td>
                    </tr> -->
                </tbody>
            </table>
        </div>
    </div>
    <div class="wishlist-items-area">
        <div class="dashboard-head-widget">
            <h5 class="dashboard-head-widget-title">Wishlist items</h5>
            <div class="dashboard-head-widget-btn">
                <a class="theme-btn" href="{{route('wishlist')}}">View more</a>
            </div>
        </div>
        <div class="dashboard-wishlist-inner">

        @foreach ($wishLists as $wishList )
        <div class="wishlist-card">
                <div class="wishlist-card-data">
                    <div class="wishlist-card-img">
                        <img alt="#" src="{{ url(env('ADMIN_URL') . '/' . $wishList->product->image) }}"/>
                        <div class="wishlist-card-remove">
                            <span><i class="fi-br-cross-small" onclick="removeFromWishlist({{ $wishList->id }})"></i></span>
                        </div>
                    </div>
                    <div class="wishlist-card-info">
                        <h6>{{$wishList->product->name}}</h6>
                        <p>{{$wishList->product->price}} BDT<span>/piece</span></p>
                    </div>
                </div>
                <div class="wishlist-card-btn">
                    <a href="#"><i class="fi-rr-shopping-bag-add" onclick="addToCart({{ $wishList->product->id }})" ></i></a>
                </div>
            </div>
        @endforeach


        </div>
    </div>
</div>

<!-- End Dashboard Area -->
@endsection

@section('js')
<script>
    function removeFromWishlist(id) {
        if (confirm('Are you sure you want to remove this item from your wishlist?')) {
            $.ajax({
                url: '{{ url('wishlist') }}/' + id,
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.success) {
                        $('#wishlist-card-' + id).remove();
                    } else {
                        alert('Failed to remove item from wishlist.');
                    }
                }
            });
        }
    }
</script>

@endsection
