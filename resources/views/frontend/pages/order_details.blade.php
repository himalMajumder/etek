@php
    $authUser = auth()->user();
@endphp

@extends(empty($authUser) ? 'frontend.master' : 'frontend.user_master')

@section('content')
    @if (empty($authUser))
        <div class="container">
            <div class="row justify-content-center">
    @endif
    <div class="col-lg-12 col-xl-9 col-12">
        <div class="order-details-area mgTop24">
            <div class="order-details-inner">
                <div class="dashboard-head-widget style-2">
                    <h5 class="dashboard-head-widget-title">
                        Order details
                    </h5>
                    <div class="dashboard-head-widget-btn">
                        @if (!empty($authUser))
                            <a class="theme-btn secondary-btn icon-right" href="{{ route('user.order') }}"><i
                                    class="fi-rr-arrow-left"></i>Back to orders</a>
                        @endif

                    </div>
                </div>
                <div class="order-details-inner">
                    <div class="order-details-information">
                        <div class="order-details-info-head">
                            <div class="order-details-info-order-id">
                                <h4 class="order-details-info-order-id-parent">
                                    Order id<span>{{ $order->order_no }}</span>
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
                                </h4>
                                <div class="order-details-info-date-time"> <strong>Placed on:</strong>
                                    <span>{{ \Carbon\Carbon::parse($order->created_at)->format('F j, Y, g:i A') }}</span>
                                </div>
                            </div>
                            <div class="od-info-head-duration">
                                <ul>
                                    <li>
                                        Total amount:<span>{{ $order->total }} TK</span>
                                    </li>
                                    <li>
                                        Delivery:<span>
                                            {{ $order->delivery_date ?? ' Standard Delivery (3-7 days)' }}
                                        </span>
                                    </li>
                                </ul>
                            </div>
                        </div>



                        <div class="order-details-info-card-group">
                            <!-- Single Card -->
                            <div class="order-d-info-single-card">
                                <div class="order-d-info-single-card-head">
                                    <div class="order-d-info-single-card-head-icon">
                                        <img alt="#" src="{{ asset('user/assets/img/icons/shipping-box.svg') }}" />
                                    </div>
                                    <h6 class="order-d-info-single-card-title">
                                        Shipping information
                                    </h6>
                                </div>
                                <ul class="order-d-info-single-card-data-list">

                                    <li>
                                        <strong>{{ $order->shipping_infos->full_name ?? 'N/A' }}</strong>
                                    </li>
                                    <li>
                                        {{ $order->shipping_infos->address ?? 'N/A' }}
                                    </li>
                                    <li>
                                        {{ $order->shipping_infos->phone ?? 'N/A' }}
                                    </li>
                                    <li>
                                        {{ $order->shipping_infos->email ?? 'N/A' }}

                                    </li>
                                </ul>
                            </div>
                            <!-- Single Card -->
                            <div class="order-d-info-single-card">
                                <div class="order-d-info-single-card-head">
                                    <div class="order-d-info-single-card-head-icon">
                                        <img alt="#" src="{{ asset('user/assets/img/icons/shipping-box.svg') }}" />
                                    </div>
                                    <h6 class="order-d-info-single-card-title">
                                        Billing information
                                    </h6>
                                </div>
                                <ul class="order-d-info-single-card-data-list">
                                    <li>
                                        <strong>{{ $order->user->name }}</strong>
                                    </li>
                                    <li>
                                        {{ $order->billingAddress->address ?? null }}
                                    </li>
                                    <li>
                                        {{ $order->user->phone, 'EX:  01710-200000' }}
                                    </li>
                                    <li>
                                        {{ $order->user->email, 'EX: arifulislamdc@gmail.com' }}

                                    </li>
                                </ul>
                            </div>
                            <!-- Order Tracking Card -->
                            <div class="order-d-info-tracking-card">
                                <div class="order-d-info-tracking-card-img">
                                    <img alt="#" src="{{ asset('user/assets/img/track-image.svg') }}" />
                                </div>
                                <div class="order-d-info-tracking-card-content">
                                    <h6>
                                        Track your order instantly!
                                    </h6>
                                    <a class="theme-btn" href="{{ route('order.tracking') }}">Track parcel<i
                                            class="fi-rs-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>


                        <div class="od-package-wrapper">
                            <!-- Single Package -->
                            <div class="single-od-package">
                                <div class="order-summary-head">
                                    <h4 class="order-summary-head-title">
                                        <img alt="#"
                                            src="{{ asset('user/assets/img/icons/humberger.svg') }}" />Order
                                        summary
                                    </h4>
                                </div>

                                @foreach ($order->order_details as $detail)
                                    <div class="od-package-item">
                                        <div class="od-package-info">
                                            @if ($detail->product)
                                                <img src="{{ url(env('ADMIN_URL') . '/' . $detail->product->image) }}"
                                                    alt="#" />
                                                <a href="#">
                                                    {{ $detail->product->name ?? 'N/A' }}
                                                </a>
                                            @else
                                                <span class="product-name">Product not found</span>
                                            @endif
                                        </div>
                                        <div class="od-package-item-list">
                                            <div class="single-od-package-item price">
                                                <p>
                                                    ৳<span>{{ $detail->total_price ?? 'N/A' }} TK</span>
                                                </p>
                                            </div>
                                            <div class="single-od-package-item quantity">
                                                <p>
                                                    Qty:
                                                    <span>{{ $detail->qty ?? 'N/A' }}</span>
                                                </p>
                                            </div>
                                            <div class="single-od-package-item total">
                                                <p>
                                                    Total:<span> {{ $detail->total_price * $detail->qty }}
                                                        TK</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach


                                <div class="od-package-footer">
                                    <div class="od-package-fotter-left">
                                        <!-- <a href="#" class="cancel-order-btn" data-bs-toggle="modal" data-bs-target="#cancelOrderModal">Cancel
                                                                    order</a>

                                                                <a href="#" class="retrun-policy-btn" data-bs-toggle="modal" data-bs-target="#returnProductModal">Return
                                                                    product</a> -->
                                    </div>
                                    <div class="od-package-fotter-right">
                                        <a href="#" class="review-btn" data-bs-toggle="modal"
                                            data-bs-target="#staticBackdrop">Write a
                                            review</a>
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>
            </div>

            <div class="order-summary multivendor-order-summery">
                @if ($order->order_payments)
                    <div class="ors-paid">
                        <img src="{{ asset('user/assets/img/icons/payment.svg') }}" alt="#" />
                        <ul class="ors-paid-list">
                            <li>
                                Paid by:<span>{{ $order->order_payments->payment_through }}</span>
                            </li>
                            <li>
                                TRXN ID:<span>{{ $order->order_payments->tran_id }}</span>
                            </li>
                        </ul>
                    </div>
                @else
                    <div></div>
                @endif

                <div class="order-summary-total">
                    <h4>Total Summary</h4>
                    <ul class="order-summary-total-list">
                        <li>
                            Subtotal<strong>{{ $order->sub_total }} TK</strong>
                        </li>
                        <li>
                            Delivery fee<strong>{{ $order->delivery_fee }} TK</strong>
                        </li>
                        <li>
                            <!-- Discount<span>(-20%)</span><strong>708 TK</strong> -->
                            Discount<span></span><strong>{{ $order->discount }} TK</strong>
                        </li>

                        <li class="total-price">
                            Total<strong>{{ $order->sub_total + $order->delivery_fee - $order->discount }}
                                TK</strong>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Write Review Modal -->
    <div class="write-review-modal modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="write-review-modal-haed modal-header">
                    <div class="btn-close write-review-modal-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fi-rr-cross-small"></i>
                    </div>
                </div>
                <div class="write-review-modal-body modal-body">
                    <!-- <form action="#" method="post" class="write-review-form">
                                                <div class="form-group">
                                                    <label>Product Rattings</label>
                                                    <div class="write-review-ratting star">
                                                        <label>
                                                            ★
                                                            <input type="radio" name="note" value="1" id="aze" />
                                                        </label>

                                                        <label>
                                                            ★
                                                            <input type="radio" name="note" value="2" />
                                                        </label>
                                                        <label>
                                                            ★
                                                            <input type="radio" name="note" value="3" />
                                                        </label>
                                                        <label>
                                                            ★
                                                            <input type="radio" name="note" value="4" />
                                                        </label>
                                                        <label>
                                                            ★
                                                            <input type="radio" name="note" value="5" />
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Add Photos</label>
                                                    <div class="write-review-add-photo">
                                                        <div class="create-ticket-form-upload-image">
                                                            <div class="library-photo-input">
                                                                <input type="file" accept="image/*" id="library-photo-input1" class="hidden" multiple onchange="uploadLibraryPhoto(event, 1)" />
                                                                <label for="library-photo-input1">

                                                                    <i class="fi fi-rr-camera"></i>
                                                                    <span>Upload Photo</span>
                                                                </label>
                                                            </div>
                                                            <div class="upload-image-list upload-img-input" id="upload-image-list1">
                                                                <div style="position: relative">
                                                                    <div class="remove-icon" style="display: none" onclick="removeImage(1)">
                                                                        <i class="fi fi-rr-cross"></i>
                                                                    </div>
                                                                    <img id="uploaded-image1" style="display: none" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group write-review-message">
                                                    <label>Add Written Review</label>
                                                    <textarea name="review" required></textarea>
                                                    <span>Max 250 characters</span>
                                                </div>
                                                <div class="write-review-form-btn">
                                                    <button type="submit" class="theme-btn">
                                                        Submit Review
                                                    </button>
                                                </div>
                                            </form> -->

                    <form action="{{ url('update/product/review') }}" method="post" class="write-review-form">
                        @csrf
                        <input type="hidden" name="product_review_id" id="product_review_id">
                        <div class="form-group">
                            <label>Product Ratings</label>
                            <div class="write-review-rating star">
                                <label>
                                    ★
                                    <input type="radio" name="note" value="1" />
                                </label>
                                <label>
                                    ★
                                    <input type="radio" name="note" value="2" />
                                </label>
                                <label>
                                    ★
                                    <input type="radio" name="note" value="3" />
                                </label>
                                <label>
                                    ★
                                    <input type="radio" name="note" value="4" />
                                </label>
                                <label>
                                    ★
                                    <input type="radio" name="note" value="5" />
                                </label>
                            </div>
                        </div>
                        <!-- <div class="form-group">
                                                    <label>Add Photos</label>
                                                    <div class="write-review-add-photo">
                                                        <div class="create-ticket-form-upload-image">
                                                            <div class="library-photo-input">
                                                                <input type="file" accept="image/*" id="library-photo-input" class="hidden" multiple onchange="uploadLibraryPhoto(event)" />
                                                                <label for="library-photo-input">
                                                                    <i class="fi fi-rr-camera"></i>
                                                                    <span>Upload photo</span>
                                                                </label>
                                                            </div>
                                                            <div class="upload-image-list upload-img-input" id="upload-image-list">
                                                                <div style="position: relative">
                                                                    <div class="remove-icon" id="remove-icon" style="display: none" onclick="removeImage()">
                                                                        <i class="fi fi-rr-cross"></i>
                                                                    </div>
                                                                    <img id="uploaded-image" style="display: none" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> -->
                        <div class="form-group write-review-message">
                            <label>Add Written Review</label>
                            <textarea name="review" id="review_text" required></textarea>
                            <span>Max 250 characters</span>
                        </div>
                        <div class="write-review-form-btn">
                            <button type="submit" class="theme-btn">Submit Review</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Edit Address Modal -->

    <!-- Cancelled Order Modal -->
    <div class="write-review-modal cancelled-order-modal modal fade" id="cancelOrderModal" data-bs-backdrop="static"
        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="can-order-modal-head">
                    <h4>How can we help you?</h4>
                </div>
                <div class="write-review-modal-body modal-body">
                    <form action="#" method="post" class="can-order-modal-form">
                        <div class="can-order-modal-form-inner">
                            <div class="form-group">
                                <div class="can-order-select-option">
                                    <label class="form-check-label" for="flexCheckIndeterminate">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="flexCheckIndeterminate" />
                                        I’d appreciate it if you canceled my
                                        order
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Tell us the reason *</label>
                                <textarea name="message" required></textarea>
                            </div>
                        </div>
                        <div class="can-order-modal-footer">
                            <div class="can-order-modal-close-btn">
                                <button type="button" data-bs-dismiss="modal" aria-label="Close">
                                    Cancel
                                </button>
                            </div>
                            <div class="write-review-form-btn">
                                <button type="submit" class="theme-btn">
                                    Submit Review
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Cancelled Order Modal -->

    <!-- Return Product Modal -->
    <div class="write-review-modal cancelled-order-modal return-product-modal modal fade" id="returnProductModal"
        data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="can-order-modal-head">
                    <h4>How can we help you?</h4>
                </div>
                <div class="write-review-modal-body modal-body">
                    <form action="#" method="post" class="can-order-modal-form write-review-form">
                        <div class="can-order-modal-form-inner">
                            <div class="form-group">
                                <label for="flexRadioDefault1" class="rp-modal-options">
                                    <input type="radio" name="flexRadioDefault" id="flexRadioDefault1" />
                                    <div class="rp-modal-option-input">
                                        <h5>
                                            I want to return the product
                                        </h5>
                                        <p>
                                            Choose this if you have received
                                            the product and are not
                                            satisfied with this product.
                                        </p>
                                    </div>
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="flexRadioDefault2" class="rp-modal-options">
                                    <input type="radio" name="flexRadioDefault" id="flexRadioDefault2" />
                                    <div class="rp-modal-option-input">
                                        <h5>
                                            I didn’t receive the product
                                        </h5>
                                        <p>
                                            Choose this if you haven't
                                            received the product.
                                        </p>
                                    </div>
                                </label>
                            </div>
                            <div class="form-group" id="reason-container">
                                <label>Tell us the reason *</label>
                                <textarea name="message" required></textarea>
                            </div>
                            <div class="form-group" id="upload-container">
                                <div class="create-ticket-form-upload-image">
                                    <div class="library-photo-input">
                                        <input type="file" accept="image/*" id="library-photo-input2" class="hidden"
                                            multiple onchange="uploadLibraryPhoto(event, 2)" />
                                        <label for="library-photo-input2">
                                            <!-- Update for attribute accordingly -->
                                            <i class="fi-rr-plus"></i>
                                            <span>Add attachment (opt.)</span>
                                        </label>
                                    </div>
                                    <div class="upload-image-list upload-img-input" id="upload-image-list2">
                                        <div style="position: relative">
                                            <div class="remove-icon" style="display: none" onclick="removeImage(2)">
                                                <i class="fi fi-rr-cross"></i>
                                            </div>
                                            <img id="uploaded-image2" style="display: none" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="can-order-modal-footer">
                            <div class="can-order-modal-close-btn">
                                <button type="button" data-bs-dismiss="modal" aria-label="Close">
                                    Cancel
                                </button>
                            </div>
                            <div class="write-review-form-btn">
                                <button type="submit" class="theme-btn">
                                    Submit Review
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Return Product Modal -->
    @if (empty($authUser))
        </div>
        </div>
    @endif
@endsection

@if (empty($authUser))
    @section('css')
        <link rel="stylesheet" href="{{ asset('user/assets/css/user-pannel.css') }}" />
    @endsection
@endif
