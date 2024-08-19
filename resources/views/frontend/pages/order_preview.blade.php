@extends('frontend.master')
@section('content')

    <!-- Checkout Page Area -->
    <section class="checkout-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="checkout-order-review">
                        <h5 class="checkout-widget-title">Order review</h5>

                        <div class="checkout-order-review-inner">
                            <div class="auth-card-head-icon">
                                {{-- <img src="{{url('frontend_assets')}}/img/order_successfull.svg" alt="Order Successfull"> --}}
                            </div>
                            <h4 class="auth-card-title">Order Successful</h4>
                            <p>
                                Thanks for your order. We receive your order. We will be in touch and contact you soon!
                            </p>
                            <h5 class="mb-5" style="font-weight: 600;font-size: 18px;">Order NO: {{$orderInfo ? $orderInfo->order_no : ''}}</h5>

                            {{-- <a href="{{url('track/my/order')}}/{{$orderInfo->order_no}}" class="auth-card-form-btn primary__btn d-inline-block" style="width: 220px; margin: auto; background: transparent; border-color: var(--primary-color); color: var(--primary-color)">Track My Order</a> --}}

                            <a href="{{url('/')}}" class="auth-card-form-btn primary__btn d-inline-block" style="width: 220px; margin: auto;">Go to My Account</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Checkout Page Area -->
@endsection
