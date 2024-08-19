@extends('frontend.master')

@section('css')
    <style>
        /* Container for form rows */
        .form-row {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }

        /* Style for each form group */
        .form-group {
            flex: 1;
        }

        /* Style for columns */
        .form-group.col {
            flex: 1;
            min-width: calc(50% - 15px);
        }

        /* Adjust layout for smaller screens */
        @media (max-width: 768px) {
            .form-group.col {
                min-width: 100%;
            }
        }
    </style>
@endsection
@section('content')
    <!-- Breadcrumbs Area -->
    <section class="checkout-page-breadcrumbs">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="checkout-breadcrumbs-inner">
                        <h4 class="checkout-breadcrumbs-title">Checkout</h4>
                        <ul class="checkout-breadcrumbs-menu">
                            <li>
                                <a href="index.html">Home</a><i class="fi-rr-angle-small-right"></i>
                            </li>
                            <li class="active"><a href="javascript:void(0)">Checkout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Breadcrumbs Area -->

    <!-- Checkout Page Area -->

    <section class="checkout-area">
        <div class="container">


            <form action="{{ route('saveOrder') }}" method="post">
                @csrf


                <!-- Hidden input fields for selected address IDs -->
                <input type="hidden" name="billing_address_id" value="{{ $billingAddress->id ?? '' }}">
                <input type="hidden" name="shipping_address_id" value="{{ $shippingAddress->id ?? '' }}">

                <div class="row">
                    <!-- Order Review -->
                    <div class="col-lg-6 col-xl-4 col-12">
                        <div class="checkout-order-review">
                            <h5 class="checkout-widget-title">Order review</h5>
                            <div class="checkout-order-review-inner"></div>
                        </div>
                    </div>

                    <!-- Personal Details -->
                    <div class="col-lg-6 col-xl-4 col-12">
                        <div class="checkout-personal-details single-details-box">


                            <!-- Billing Address Section -->
                            <div class="single-details-checkout-widget">
                                <div class="single-details-checkout-widget-head">
                                    <h5 class="checkout-widget-title m-0">Billing address</h5>
                                    <div class="change-address-btn">
                                        <a class="theme-btn" href="#" data-bs-toggle="modal"
                                            data-bs-target="#changeAddress">
                                            <i class="fi-br-refresh"></i>Change address
                                        </a>
                                    </div>
                                </div>
                                <div class="c-personal-details-box single-details-box-inner">
                                    @if (auth()->check() && $userAddress && ($billingAddress = $userAddress->firstWhere('address_type', 'Home')))
                                        <div class="billing-address-div address-fill-widget">
                                            <h6>{{ $billingAddress->name }}</h6>
                                            <ul>
                                                <li>{{ $billingAddress->address }}, {{ $billingAddress->city }},
                                                    {{ $billingAddress->state }}, {{ $billingAddress->country }},
                                                    {{ $billingAddress->post_code }}</li>
                                                <li><span>Phone:</span> {{ $billingAddress->phone }}</li>
                                            </ul>
                                            <!-- Hidden field for authenticated users -->
                                            <input type="hidden" name="billing_address_id"
                                                value="{{ $billingAddress->slug }}">
                                        </div>
                                    @else
                                        <!-- Unauthenticated users or no billing address found -->
                                        <div class="billing-address-div new-user-address-widget">
                                            <p>No billing address found!</p>
                                            <!-- Static input fields for new address -->
                                            <div class="address-input-fields">
                                                <div class="form-group">
                                                    <label for="billing_name">Name</label>
                                                    <input type="text" id="billing_name" name="billing_name"
                                                        placeholder="Enter your name" />
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col">
                                                        <label for="billing_city">City</label>
                                                        <input type="text" id="billing_city" name="billing_city"
                                                            placeholder="Enter your city" />
                                                    </div>
                                                    <div class="form-group col">
                                                        <label for="billing_country">Country</label>
                                                        <input type="text" id="billing_country" name="billing_country"
                                                            placeholder="Enter your country" />
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col">
                                                        <label for="billing_post_code">Post Code</label>
                                                        <input type="text" id="billing_post_code"
                                                            name="billing_post_code" placeholder="Enter your post code" />
                                                    </div>
                                                    <div class="form-group col">
                                                        <label for="billing_phone">Phone</label>
                                                        <input type="text" id="billing_phone" name="billing_phone"
                                                            placeholder="Enter your phone number" />
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="billing_email">Email</label>
                                                    <input type="email" id="billing_email" name="billing_email"
                                                        placeholder="Enter your Email address" />
                                                </div>

                                                <div class="form-group">
                                                    <label for="billing_address">Address</label>
                                                    <input type="text" id="billing_address" name="billing_address"
                                                        placeholder="Enter your address" />
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>


                            <!-- Shipping Address Section -->
                            <div class="single-details-checkout-widget">
                                <div class="single-details-checkout-widget-head">
                                    <h5 class="checkout-widget-title m-0">Shipping address</h5>
                                    <div class="change-address-btn">
                                        <a class="theme-btn" href="#" data-bs-toggle="modal"
                                            data-bs-target="#changeAddress">
                                            <i class="fi-br-refresh"></i>Change address
                                        </a>
                                    </div>
                                </div>
                                <div class="c-personal-details-box single-details-box-inner">
                                    @if (auth()->check() && $userAddress && ($shippingAddress = $userAddress->firstWhere('address_type', 'Office')))
                                        <div class="shipping-address-div address-fill-widget">
                                            <h6>{{ $shippingAddress->name }}</h6>
                                            <ul>
                                                <li>{{ $shippingAddress->address }}, {{ $shippingAddress->city }},
                                                    {{ $shippingAddress->state }}, {{ $shippingAddress->country }},
                                                    {{ $shippingAddress->post_code }}</li>
                                                <li><span>Phone:</span> {{ $shippingAddress->phone }}</li>
                                            </ul>
                                            <!-- Hidden field for authenticated users -->
                                            <input type="hidden" name="shipping_address_id"
                                                value="{{ $shippingAddress->slug}}">
                                        </div>
                                    @else
                                        <!-- Unauthenticated users or no shipping address found -->
                                        <div class="shipping-address-div new-user-address-widget">
                                            <p>No shipping address found!</p>
                                            <!-- Static input fields for new address -->
                                            <div class="address-input-fields">
                                                <div class="form-group">
                                                    <label for="shipping_name">Name</label>
                                                    <input type="text" id="shipping_name" name="shipping_name"
                                                        placeholder="Enter your name" />
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col">
                                                        <label for="shipping_city">City</label>
                                                        <input type="text" id="shipping_city" name="shipping_city"
                                                            placeholder="Enter your city" />
                                                    </div>
                                                    <div class="form-group col">
                                                        <label for="shipping_country">Country</label>
                                                        <input type="text" id="shipping_country"
                                                            name="shipping_country" placeholder="Enter your country" />
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col">
                                                        <label for="shipping_post_code">Post Code</label>
                                                        <input type="text" id="shipping_post_code"
                                                            name="shipping_post_code"
                                                            placeholder="Enter your post code" />
                                                    </div>
                                                    <div class="form-group col">
                                                        <label for="shipping_phone">Phone</label>
                                                        <input type="text" id="shipping_phone" name="shipping_phone"
                                                            placeholder="Enter your phone number" />
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="shipping_email">Email</label>
                                                    <input type="email" id="shipping_email" name="shipping_email"
                                                        placeholder="Enter your Email address" />
                                                </div>

                                                <div class="form-group">
                                                    <label for="shipping_address">Address</label>
                                                    <input type="text" id="shipping_address" name="shipping_address"
                                                        placeholder="Enter your address" />
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>




                        </div>

                        <!-- Special Notes -->
                        <div class="checkout-special-note">
                            <h5 class="checkout-widget-title">Special notes</h5>
                            <div class="checkout-special-note-box">
                                <div class="form-group">
                                    <textarea name="special_note" placeholder="Add any special instructions here"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Payment and Delivery -->
                    <div class="col-lg-6 col-xl-4 col-12">
                        <!-- Payment Method -->
                        <div class="checkout-payment-method single-details-box">
                            <div class="single-details-checkout-widget">
                                <h5 class="checkout-widget-title">Payment method</h5>
                                <div class="checkout-payment-method-inner single-details-box-inner">
                                    <div class="payment-method-input">
                                        <label for="flexRadioDefault1">
                                            <div class="payment-method-input-main">
                                                <input class="form-check-input" type="radio" checked
                                                    name="payment_method" id="flexRadioDefault1" value="cod" />
                                                Cash on delivery (COD service)
                                            </div>
                                        </label>
                                        <label for="flexRadioDefault2">
                                            <div class="payment-method-input-main">
                                                <input class="form-check-input" type="radio" name="payment_method"
                                                    id="flexRadioDefault2" value="ssl_commerz" />
                                                SSLCommerz
                                            </div>
                                            <img alt="SSLCommerz" src="./assets/img/payment-method-img.svg" />
                                        </label>
                                        <label for="flexRadioDefault3">
                                            <div class="payment-method-input-main">
                                                <input class="form-check-input" type="radio" name="payment_method"
                                                    id="flexRadioDefault3" value="bkash" />
                                                bKash Payment
                                            </div>
                                            <img alt="bKash Payment" src="./assets/img/bkash-img.svg" />
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Delivery Method -->
                            <div class="single-details-checkout-widget">
                                <h5 class="checkout-widget-title">Delivery method</h5>
                                <div class="checkout-payment-method-inner single-details-box-inner">
                                    <div class="payment-method-input">
                                        <label for="flexRadioDefault4">
                                            <div class="payment-method-input-main">
                                                <input class="form-check-input" type="radio" name="delivery_method"
                                                    id="flexRadioDefault4" value="home_delivery" />
                                                Home delivery
                                            </div>
                                        </label>
                                        <label for="flexRadioDefault5">
                                            <div class="payment-method-input-main">
                                                <input class="form-check-input" type="radio" name="delivery_method"
                                                    id="flexRadioDefault5" value="store_pickup" />
                                                Store pickup
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Discount Accordion -->
                        <div class="checkout-review-table-bottom">
                            <div class="checkout-disocunt-accordion accordion" id="accordionExample">
                                @if (auth()->check())
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingOne">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapseOne" aria-expanded="true"
                                                aria-controls="collapseOne">
                                                Have any coupon or gift voucher?
                                            </button>
                                        </h2>
                                        <div id="collapseOne" class="accordion-collapse collapse show"
                                            aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <div class="checkout-order-review-coupon-box">
                                                    <div class="cart-single-coupon-form">
                                                        <div class="cart-single-coupon-input">
                                                            <input type="text" placeholder="Enter coupon"
                                                                name="coupon_code" id="coupon_code" />
                                                            <div class="cart-coupon-form-btn">
                                                                <button type="button" id="apply_coupon_code"
                                                                    class="theme-btn hover">
                                                                    Apply coupon
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="coupon-code-validate display-flex">
                                                    <div class="coupon-code-validate-data">
                                                        <h6 class="coupon-code-name">
                                                            NEWYR2K23 <span>(-20%)</span>
                                                        </h6>
                                                        <p class="coupon-code-applied m-0">
                                                            <i class="fi-br-check"></i>Coupon applied
                                                        </p>
                                                    </div>
                                                    <div class="coupon-code-remove-button">
                                                        <button type="button" class="theme-btn hover"
                                                            id="remove_coupon_code">
                                                            Remove
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false"
                                            aria-controls="collapseTwo">
                                            Use Club Points
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse"
                                        aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="club-points-form">
                                                <div class="form-group">
                                                    <label>You have <b>82 Club Points</b> available</label>
                                                    <input type="text" name="points"
                                                        placeholder="Enter amount of points to spend" />
                                                </div>
                                                <div class="checkout-checkbox-details">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="flexCheckChecked3" value="" />
                                                    <label class="form-check-label" for="flexCheckChecked3">
                                                        Use maximum <b>82 Club Points</b>
                                                    </label>
                                                </div>
                                                <div class="club-points-form-btn">
                                                    <button type="submit" class="theme-btn">
                                                        Apply
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Order Review Summary -->
                            <div class="order-review-summary">
                                <div class="cart-order-summary-main">
                                    <ul class="cart-order-summary-main-list">
                                        <li>Sub total <span id="subtotal-display">00.00 BDT</span></li>
                                        <li>Discount<span id="discount-display">00.00 BDT</span></li>
                                        <li>VAT/TAX<span id="tax-display">00.00 BDT</span></li>
                                        <li>Delivery cost <span id="delivery-cost-display">00.00 BDT</span></li>
                                    </ul>
                                    <div class="total-price">
                                        Total<span id="total-display">00.00 BDT</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Hidden fields to pass the calculated values -->
                        <input type="hidden" name="subtotal" id="subtotal" value="00.00" />
                        <input type="hidden" name="discount" id="discount" value="00.00" />
                        <input type="hidden" name="tax" id="tax" value="00.00" />
                        <input type="hidden" name="total" id="total" value="00.00" />
                        <input type="hidden" name="delivery_cost" id="delivery-cost-display" value="00.00" />

                        <!-- Checkout Bottom -->
                        <div class="checkout-order-review-bottom">
                            <div class="row">
                                <div class="col-12">
                                    <div class="checkout-checkbox-details">
                                        <input class="form-check-input" type="checkbox" id="flexCheckChecked2"
                                            name="terms_conditions" value="1" />
                                        <label class="form-check-label" for="flexCheckChecked2">
                                            I have read and agree to the <a href="#">Terms and Conditions</a>,
                                            <a href="#">Privacy Policy</a>, and <a href="#">Refund and Return
                                                Policy</a>.
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="checkout-order-review-button">
                                        <button type="submit" class="theme-btn">
                                            Place order
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </section>


    <!-- End Checkout Page Area -->

    @include('frontend.pages.partials.changeAddress')
    @include('frontend.pages.partials.addNewAddress')
    @include('frontend.pages.partials.deleteAddress')
@endsection


@section('plugin_css')
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/select2.css') }}" />
@endsection
@section('plugin_js')
    <script src="{{ asset('assets/js/plugins/select2.js') }}"></script>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $(".select2").select2();
            loadCartItems();


            $('#changeAddress').on('click', function() {
                const manageAddressModal = document.getElementById("changeAddress");
                if (manageAddressModal) {
                    manageAddressModal.classList.remove("show");
                    manageAddressModal.setAttribute("aria-hidden", "true");
                    manageAddressModal.style.display = "none";
                    const backdrop = document.querySelector(".modal-backdrop");
                    if (backdrop) {
                        backdrop.parentNode.removeChild(backdrop);
                    }
                }
            });


            $(document).on('click', '.addNewAddress-btn', function() {
                let districtOptions = '<option value=""></option>';

                $.ajax({
                    url: "{{ route('districts') }}",
                    type: 'GET',
                    dataType: 'JSON',
                    success: function(response) {
                        if (response.data) {
                            response.data.map(function(district, index) {
                                districtOptions +=
                                    `<option value="${district.id}">${district.name}</option>`;
                            });
                        }
                        $('#district_id').html(districtOptions);
                    },
                    error: function(xhr) {
                        console.error(xhr.responseText);
                    }
                });
            });

            $(document).on('change', '#district_id', function() {
                let district_id = $(this).find(':selected').val();


                let upazilasOptions = '<option value=""></option>';

                if (!district_id) {
                    $('#upazila_id').html(upazilasOptions);
                    return false;
                }

                $.ajax({
                    url: "{{ route('upazilas') }}",
                    data: {
                        district_id
                    },
                    type: 'GET',
                    dataType: 'JSON',
                    success: function(response) {
                        if (response.data) {
                            response.data.map(function(upazila, index) {
                                upazilasOptions +=
                                    `<option value="${upazila.id}">${upazila.name}</option>`;
                            });
                        }
                        $('#upazila_id').html(upazilasOptions);
                    },
                    error: function(xhr) {
                        console.error(xhr.responseText);
                    }
                });
            });

            $(document).on('submit', '#add-address-form', function(e) {
                e.preventDefault();

                let form = $(this);

                $.ajax({
                    url: $(this).attr('action'),
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(response) {
                        $("#add-address-form").trigger("reset");

                        let destroyRoute =
                            '{{ route('newAddress.destroy', ['slug' => 'slug']) }}';

                        if (response.data) {
                            let data = response.data;

                            if (data.shipping_address) {
                                let shipping_address = data.shipping_address;
                                let shippingDestroyRoute = destroyRoute.replace("slug",
                                    shipping_address.slug);
                                $(`.shipping-address-list`).append(`
                                    <div class="manage-address-single">
                                        <label for="flexRadioDefault6">
                                            <div class="manage-address-input-main">
                                                <div class="manage-address-input-info">
                                                    <input class="form-check-input" type="radio"
                                                        name="flexRadioDefault" id="flexRadioDefault6" />
                                                    <h4>${shipping_address.name}</h4>
                                                </div>
                                                <p>${shipping_address.phone}</p>
                                                <span>
                                                    ${shipping_address.address}, ${shipping_address.city},
                                                    ${shipping_address.state}, ${shipping_address.country},
                                                    ${shipping_address.post_code}
                                                </span>
                                                <div class="manage-address-input-info-action">
                                                    <button type="button" class="input-info-action-btn edit-btn"
                                                        data-bs-toggle="modal" data-bs-target="#editManageAddress">
                                                        <i class="fi-rr-edit"></i>
                                                    </button>
                                                    <button type="button" data-bs-toggle="modal"
                                                        data-bs-target="#deleteAddressModal"
                                                        class="input-info-action-btn delete-btn delete-address"
                                                        data-route="${shippingDestroyRoute}">
                                                        <i class="fi-rr-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                `);

                                $(`.shipping-address-div`).html(`
                                    <div class="billing-address-div address-fill-widget">
                                        <h6>${ shipping_address.name }</h6>
                                        <ul>
                                            <li>${ shipping_address.address }, ${ shipping_address.city },
                                                ${ shipping_address.state }, ${ shipping_address.country },
                                               ${ shipping_address.post_code }</li>
                                            <li><span>Phone:</span>${ shipping_address.phone }</li>
                                        </ul>
                                    </div>
                                `);
                            }
                            if (data.billing_address) {
                                let billing_address = data.billing_address;

                                let billingDestroyRoute = destroyRoute.replace("slug", data
                                    .billing_address.slug);
                                $(`.billing-address-list`).append(`
                                    <div class="manage-address-single">
                                        <label for="flexRadioDefault6">
                                            <div class="manage-address-input-main">
                                                <div class="manage-address-input-info">
                                                    <input class="form-check-input" type="radio"
                                                        name="flexRadioDefault" id="flexRadioDefault6" />
                                                    <h4>${billing_address.name}</h4>
                                                </div>
                                                <p>${billing_address.phone}</p>
                                                <span>
                                                    ${billing_address.address}, ${billing_address.city},
                                                    ${billing_address.state}, ${billing_address.country},
                                                    ${billing_address.post_code}
                                                </span>
                                                <div class="manage-address-input-info-action">
                                                    <button type="button" class="input-info-action-btn edit-btn"
                                                        data-bs-toggle="modal" data-bs-target="#editManageAddress">
                                                        <i class="fi-rr-edit"></i>
                                                    </button>
                                                    <button type="button" data-bs-toggle="modal"
                                                        data-bs-target="#deleteAddressModal"
                                                        class="input-info-action-btn delete-btn delete-address"
                                                        data-route="${billingDestroyRoute}">
                                                        <i class="fi-rr-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                `);

                                $(`.billing-address-div`).html(`
                                    <div class="billing-address-div address-fill-widget">
                                        <h6>${ billing_address.name }</h6>
                                        <ul>
                                            <li>${ billing_address.address }, ${ billing_address.city },
                                                ${ billing_address.state }, ${ billing_address.country },
                                               ${ billing_address.post_code }</li>
                                            <li><span>Phone:</span>${ billing_address.phone }</li>
                                        </ul>
                                    </div>
                                `);
                            }
                        }

                        $("#addNewAddress").mode('hide');
                    },
                    error: function(response) {
                        let data = response.responseJSON;

                        removeFormValidation(form);

                        if (typeof data.errors != "undefined") {
                            // Iterate over the properties of data.errors
                            for (let fieldName in data.errors) {
                                if (data.errors.hasOwnProperty(fieldName)) {
                                    // Get the array of error messages for the current field
                                    const errorMessages = data.errors[fieldName];

                                    if (form.find(`input[name='${fieldName}']`).length) {
                                        form.find(`input[name='${fieldName}']`).addClass(
                                            "is-invalid"
                                        );
                                        let currentErrorMessage = "";
                                        errorMessages.forEach((errorMessage) => {
                                            currentErrorMessage = errorMessage;
                                        });
                                        form.find(`input[name='${fieldName}']`)
                                            .parent()
                                            .find(".invalid-feedback")
                                            .html(currentErrorMessage);
                                    } else if (form.find(`#${fieldName}`).length) {
                                        form.find(`#${fieldName}`).addClass("is-invalid");
                                        let currentErrorMessage = "";
                                        errorMessages.forEach((errorMessage) => {
                                            currentErrorMessage = errorMessage;
                                        });
                                        form.find(`#${fieldName}`)
                                            .parent()
                                            .find(".invalid-feedback")
                                            .html(currentErrorMessage);
                                    }
                                }
                            }

                        }

                    }
                });
            });

            $(document).on('click', '.delete-address', function(e) {
                $('#destroy-address-form').attr('action', $(this).attr('data-route'));
            })

            $(document).on('submit', '#destroy-address-form', function(e) {
                e.preventDefault();

                let form = $(this);
                let route = $(this).attr('action');

                $.ajax({
                    url: $(this).attr('action'),
                    type: "delete",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(response) {
                        $('#deleteAddressModal').modal('hide');
                        $(`.delete-address[data-route='${route}']`).closest(
                            '.manage-address-single').remove();
                    },
                    error: function(response) {
                        let data = response.responseJSON;
                    }
                });
            });

            $(document).on('click', `.billing-address`, function(e) {
                let addressSlug = $(this).val();
                let route = "{{ route('newAddress.get', ['slug' => 'slug']) }}"
                route = route.replace('slug', addressSlug);
                $.ajax({
                    url: route,
                    type: 'GET',
                    success: function(response) {
                        if (response.data) {

                            $(`.billing-address-div`).html(`
                                        <div class="billing-address-div address-fill-widget">
                                            <h6>${ response.data.name }</h6>
                                            <ul>
                                                <li>${ response.data.address }, ${ response.data.city },
                                                    ${ response.data.state }, ${ response.data.country },
                                                   ${ response.data.post_code }</li>
                                                <li><span>Phone:</span>${ response.data.phone }</li>
                                            </ul>
                                        </div>
                                    `);
                        }
                    },
                    error: function(xhr) {
                        console.error(xhr.responseText);
                    }
                });
            });
            $(document).on('click', `.shipping-address`, function(e) {
                let addressSlug = $(this).val();
                let route = "{{ route('newAddress.get', ['slug' => 'slug']) }}"
                route = route.replace('slug', addressSlug);
                $.ajax({
                    url: route,
                    type: 'GET',
                    success: function(response) {
                        if (response.data) {

                            $(`.shipping-address-div`).html(`
                                <div class="shipping-address-div address-fill-widget">
                                    <h6>${ response.data.name }</h6>
                                    <ul>
                                        <li>${ response.data.address }, ${ response.data.city },
                                            ${ response.data.state }, ${ response.data.country },
                                        ${ response.data.post_code }</li>
                                        <li><span>Phone:</span>${ response.data.phone }</li>
                                    </ul>
                                </div>
                            `);
                        }
                    },
                    error: function(xhr) {
                        console.error(xhr.responseText);
                    }
                });
            });

            $('#apply_coupon_code').on('click', function() {
                var couponCode = $("#coupon_code").val();
                // toastr.options.positionClass = 'toast-bottom-right';
                // toastr.options.timeOut = 1000;

                if (couponCode == '') {
                    // toastr.error("Please Enter a Coupon Code");
                    alert("Please Enter a Coupon Code");
                    return false;
                }

                $.ajax({
                    data: {
                        coupon_code: couponCode
                    },
                    url: "{{ url('apply/coupon') }}",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "POST",
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        if (data.status == 0) {
                            // toastr.error(data.message);
                            alert(data.message);
                            // $(".order-review-summary").html(data.checkoutTotalAmount);
                        } else {
                            // toastr.success(data.message);
                            alert(data.message);
                            // $(".order-review-summary").html(data.checkoutTotalAmount);
                        }
                    },
                    error: function(data) {
                        console.log('Error:', data);
                    }
                });

            });
            $('#remove_coupon_code').on('click', function() {
                $("#coupon_code").val('');
            });
        });

        function loadCartItems() {
            $.ajax({
                url: "{{ route('cart.items') }}",
                type: 'GET',
                success: function(response) {
                    // Append the received HTML to the existing content
                    $('.checkout-order-review-inner').append(response);
                },
                error: function(xhr) {
                    console.error(xhr.responseText);
                }
            });
        }


        /**
         *
         * @param {*} form
         * @param {*} resetValue
         * @param void
         */
        function removeFormValidation(
            form,
            resetValue = false,
            resetSelectValue = false
        ) {
            form.removeClass("was-validated");

            if (resetSelectValue) {
                form.find(":checkbox")
                    .filter(":checked")
                    .each(function() {
                        $(this).prop("checked", false);
                    });

                form.find("select").each(function() {
                    $(this).find("option:selected").prop("selected", false);
                    $(this).trigger("change");
                });
                form.find(`textarea`).val("");
            }

            form.find(":input, select").each(function() {
                var elementType = this.tagName.toLowerCase();
                if (elementType === "input") {
                    var inputObject = $(this);
                    var inputName = inputObject.attr("name");
                    var inputType = inputObject.attr("type");

                    if (!["radio", "checkbox"].includes(inputType)) {
                        form.find(`input[name='${inputName}']`).removeClass(
                            "is-invalid"
                        );
                        form.find(`input[name='${inputName}']`)
                            .parent()
                            .find(".invalid-feedback")
                            .html("");
                        if (resetValue == true && !exceptName.includes(inputName)) {
                            form.find(`input[name='${inputName}']`).val("");
                        }
                    } else if (["radio"].includes(inputType)) {
                        if (resetSelectValue) {
                            inputObject.prop("checked", false);
                        }
                    }
                } else if (elementType === "select") {
                    var inputObject = $(this);
                    var inputId = inputObject.attr("id");

                    form.find(`#${inputId}`).removeClass("is-invalid");

                    form.find(`#${inputId}`)
                        .parent()
                        .find(".invalid-feedback")
                        .html("");
                }
            });
        }
    </script>

    <script>
        $(document).ready(function() {
            // Function to update the hidden input field for the selected address
            function updateAddressId(type, addressId) {
                if (type === 'billing') {
                    $('input[name="billing_address_id"]').val(addressId);
                } else if (type === 'shipping') {
                    $('input[name="shipping_address_id"]').val(addressId);
                }
            }

            // Listen for changes in the shipping address radio buttons
            $('.shipping-address').on('change', function() {
                let addressId = $(this).val();
                // Update the hidden input for shipping address
                updateAddressId('shipping', addressId);

                // Optionally close the modal if desired
                $('#changeAddress').modal('hide');
            });

            // Listen for changes in the billing address radio buttons
            $('.billing-address').on('change', function() {
                let addressId = $(this).val();
                // Update the hidden input for billing address
                updateAddressId('billing', addressId);

                // Optionally close the modal if desired
                $('#changeAddress').modal('hide');
            });
        });
    </script>
@endsection
