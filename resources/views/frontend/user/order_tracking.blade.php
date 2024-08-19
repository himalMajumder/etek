@extends('frontend.user_master')
@section('content')
<div class="col-lg-12 col-xl-9 col-12">
    <div class="order-tracking-area mgTop24">
        <div class="dashboard-head-widget style-2">
            <h5 class="dashboard-head-widget-title">Order tracking</h5>
            <div class="dashboard-head-widget-btn">
                <a class="theme-btn secondary-btn icon-right" href="{{route('order.details')}}"><i class="fi-rr-arrow-left"></i>Back to details</a>
            </div>
        </div>
        <div class="order-tracking-card-group">
            <div class="single-order-tracking-card card-1">
                <div class="order-tracking-card-icon">
                    <img alt="#" src="{{asset('user/assets/img/order-tracking/card-icon-1.svg')}}" />
                </div>
                <div class="order-tracking-card-info">
                    <h6>FEJ-0002523352</h6>
                    <p>Tracking Number</p>
                </div>
            </div>
            <div class="single-order-tracking-card card-2">
                <div class="order-tracking-card-icon">
                    <img alt="#" src="{{asset('user/assets/img/order-tracking/card-icon-2.svg')}}" />
                </div>
                <div class="order-tracking-card-info">
                    <h6>August 9, 2023</h6>
                    <p>Estimated delivery date</p>
                </div>
            </div>
            <div class="single-order-tracking-card card-3">
                <div class="order-tracking-card-icon">
                    <img alt="#" src="{{asset('user/assets/img/order-tracking/card-icon-3.svg')}}" />
                </div>
                <div class="order-tracking-card-info">
                    <h6>4 items</h6>
                    <p>Total products</p>
                </div>
            </div>
        </div>

        <div class="order-summary">
            <div class="order-summary-head">
                <h4 class="order-summary-head-title">
                    <img alt="#" src="{{asset('user/assets/img/icons/humberger.svg')}}" />Order ID: 1234567890
                </h4>
            </div>
            <div class="table-responsive">
                <table class="recent-order-table-data table">
                    <tbody>
                        <tr>
                            <td>
                                <img alt="#" src="{{asset('user/assets/img/my-order-product/product-1.png')}}" /><span class="product-name">Ready made cape</span>
                            </td>

                            <td>
                                Amount:<span class="product-price">12,000 BDT</span>
                            </td>
                            <td>
                                Qty:<span class="product-quantity">100 piece</span>
                            </td>
                            <td>
                                <span class="product-status-btn pending">Pending</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="order-status-area">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-12">
                    <div class="order-status-section-head">
                        <h4 class="order-status-s-head-title">
                            Order status
                        </h4>
                        <div class="seperator-group">
                            <span class="seperator-sm"></span><span class="seperator-big"></span><span class="seperator-sm"></span>
                        </div>
                    </div>
                    <div class="order-status-card-group">
                        <div class="single-order-status-card card-1">
                            <div class="order-status-card-icon">
                                <i class="fi-br-check"></i>
                            </div>
                            <div class="order-status-card-info">
                                <h6>Order placed</h6>
                                <p>We have received your order</p>
                                <ul>
                                    <li>05 Feb, 23</li>
                                    <li>05:30 PM</li>
                                </ul>
                            </div>
                        </div>
                        <div class="single-order-status-card card-2">
                            <div class="order-status-card-icon">
                                <i class="fi-br-check"></i>
                            </div>
                            <div class="order-status-card-info">
                                <h6>Order confirmed</h6>
                                <p>Your order has been confirmed</p>
                                <ul>
                                    <li>05 Feb, 23</li>
                                    <li>05:30 PM</li>
                                </ul>
                            </div>
                        </div>
                        <div class="single-order-status-card card-3">
                            <div class="order-status-card-icon">
                                <i class="fi-br-check"></i>
                            </div>
                            <div class="order-status-card-info">
                                <h6>Order processed</h6>
                                <p>We are preparing your order</p>
                                <ul>
                                    <li>05 Feb, 23</li>
                                    <li>05:30 PM</li>
                                </ul>
                            </div>
                        </div>
                        <div class="single-order-status-card card-4">
                            <div class="order-status-card-icon">
                                <i class="fi-br-check"></i>
                            </div>
                            <div class="order-status-card-info">
                                <h6>On the way</h6>
                                <p>We are on the way to your destination</p>
                                <ul>
                                    <li>05 Feb, 23</li>
                                    <li>05:30 PM</li>
                                </ul>
                            </div>
                        </div>
                        <div class="single-order-status-card card-5">
                            <div class="order-status-card-icon-cross">
                                <i class="fi-br-cross"></i>
                            </div>
                            <div class="order-status-card-info">
                                <h6>Ready to pickup</h6>
                                <p>Your order is ready to pickup</p>
                                <ul>
                                    <li>05 Feb, 23</li>
                                    <li>05:30 PM</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection