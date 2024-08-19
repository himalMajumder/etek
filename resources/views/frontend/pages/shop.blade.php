@extends('frontend.master')
@section('content')
    <!-- Start breadcrumb section -->
    <section class="breadcrumb__section breadcrumb__bg"
        style="background-image: url('{{ asset('assets/img/category-page-banner.png') }}')">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb__content text-center">
                        <ul class="breadcrumb__content--menu d-flex">
                            <li class="breadcrumb__content--menu__items">
                                <a href="index.html">Home</a>
                            </li>
                            <li class="breadcrumb__content--menu__items">
                                <span>Shop</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End breadcrumb section -->

    <!-- Start shop section -->
    <section class="shop__section section--padding">
        <div class="container">
            <div class="shop__header bg__gray--color d-flex align-items-center justify-content-between mb-30">
                <button class="widget__filter--btn d-flex d-lg-none align-items-center" data-offcanvas>
                    <svg class="widget__filter--btn__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="28" d="M368 128h80M64 128h240M368 384h80M64 384h240M208 256h240M64 256h80" />
                        <circle cx="336" cy="128" r="28" fill="none" stroke="currentColor"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="28" />
                        <circle cx="176" cy="256" r="28" fill="none" stroke="currentColor"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="28" />
                        <circle cx="336" cy="384" r="28" fill="none" stroke="currentColor"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="28" />
                    </svg>
                    <span class="widget__filter--btn__text">Filter</span>
                </button>
                <div class="product__view--mode d-flex align-items-center">
                    {{-- <div class="product__view--mode__list product__short--by align-items-center d-none d-lg-flex">
                    <label class="product__view--label">Prev Page :</label>
                    <div class="select shop__header--select">
                        <select class="product__view--select">
                            <option selected value="1">65</option>
                            <option value="2">40</option>
                            <option value="3">42</option>
                            <option value="4">57</option>
                            <option value="5">60</option>
                        </select>
                    </div>
                </div> --}}

                    {{-- <div class="product__view--mode__list product__short--by align-items-center d-none d-lg-flex">
                    <label class="product__view--label">Sort By :</label>
                    <div class="select shop__header--select">
                        <select class="product__view--select">
                            <option selected value="1">Sort by latest</option>
                            <option value="2">Sort by popularity</option>
                            <option value="3">Sort by newness</option>
                            <option value="4">Sort by rating</option>
                        </select>
                    </div>
                </div> --}}
                <form id="sortForm" action="{{ route('short.product') }}" method="POST">
                    @csrf
                    <div class="product__view--mode__list product__short--by align-items-center d-none d-lg-flex">
                        <label class="product__view--label">Sort By :</label>
                        <div class="select shop__header--select">
                            <select class="product__view--select" name="product_short" id="sortSelect">
                                <option selected value="latest">Sort by latest</option>
                                <option value="popularity">Sort by popularity</option>
                                <option value="newness">Sort by newness</option>
                                <option value="rating">Sort by rating</option>
                            </select>
                        </div>
                    </div>
                </form>


                </div>

                {{-- <p class="product__showing--count">Showing 1–9 of 21 results</p> --}}
                {{-- <div class="category-sidebar-top-filter-btn">
                    <button class="theme-btn secondary filter-open-btn">
                        <i class="fi fi-rr-settings"></i>Filter
                    </button>
                </div> --}}
            </div>
            <div class="row">


                <div class="col-lg-3 col-md-5 col-12">
                    <!-- Category Filter -->
                    @include('frontend.include.filter')
                    <!-- Category Filter -->
                </div>


                <div class="col-lg-9 col-md-7 col-12">
                    <div class="product__section--inner style-2">



                        @foreach ($products as $product)
                            <div class="product__items">

                                <div class="product__items--thumbnail">
                                    <a class="product__items--link" href="{{ route('product.detail', $product->slug) }}">
                                        <img class="product__items--img product__primary--img"
                                            src="{{ url(env('ADMIN_URL') . '/' . $product->image) }}"
                                            alt="{{ $product->name }}" />
                                        <img class="product__items--img product__secondary--img"
                                            src="{{ url(env('ADMIN_URL') . '/' . $product->image) }}"
                                            alt="{{ $product->name }}" />
                                    </a>
                                    @if ($product->flag_name)
                                        <div class="product__badge">
                                            <span class="product__badge--items sale">{{ $product->flag_name }}</span>
                                        </div>
                                    @endif
                                </div>
                                <div class="product__items--content">
                                    <span class="product__items--content__subtitle">{{ $product->category_name }}</span>
                                    <h3 class="product__items--content__title h4">
                                        <a href="{{ route('product.detail', $product->slug) }}"
                                            class="product__items--content__subtitle">{{ $product->name }}</a>
                                    </h3>
                                    <div class="product__items--price">
                                        @if ($product->discount_price > 0)
                                            <span
                                                class="current__price">৳{{ number_format($product->discount_price, 2) }}</span>
                                            <span class="price__divided"></span>
                                            <span class="old__price">৳{{ number_format($product->price, 2) }}</span>
                                        @else
                                            <span class="current__price">৳{{ number_format($product->price, 2) }}</span>
                                        @endif
                                    </div>
                                    <ul class="product__items--action d-flex">
                                        <li class="product__items--action__list">
                                            <a class="product__items--action__btn add__to--cart" href="#" onclick="addToCart({{ $product->id }})">
                                                <i class="fi-rr-shopping-cart"></i>
                                                <span class="add__to--cart__text">{{lan_key('add_to_cart')}}</span>
                                            </a>
                                            <a href="javascript:void(0)" class="quick-view-btn" data-open="modal1">
                                                <i class="fi-rr-eye"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        @endforeach


                    </div>



                </div>


            </div>
        </div>
    </section>
    <!-- End shop section -->

    {{--
<script>
    document.getElementById('sortSelect').addEventListener('change', function() {
        const sortValue = this.value;
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        fetch('/products/sort', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify({ sort_by: sortValue })
        })
        .then(response => response.json())
        .then(data => {
            if (data.redirectUrl) {
                window.location.href = data.redirectUrl;
            } else {
                console.error('Error: No redirect URL provided.');
            }
        })
        .catch(error => console.error('Error:', error));
    });
    </script> --}}


    <!-- Price Range js -->
    <script type="text/javascript">
        const rangeInput = document.querySelectorAll(".range-input input"),
            priceInput = document.querySelectorAll(".price-input-field input"),
            range = document.querySelector(".slider .progress");
        let priceGap = 1000;

        priceInput.forEach((input) => {
            input.addEventListener("input", (e) => {
                let minPrice = parseInt(priceInput[0].value),
                    maxPrice = parseInt(priceInput[1].value);

                if (
                    maxPrice - minPrice >= priceGap &&
                    maxPrice <= rangeInput[1].max
                ) {
                    if (e.target.className === "input-min") {
                        rangeInput[0].value = minPrice;
                        range.style.left = (minPrice / rangeInput[0].max) * 100 + "%";
                    } else {
                        rangeInput[1].value = maxPrice;
                        range.style.right =
                            100 - (maxPrice / rangeInput[1].max) * 100 + "%";
                    }
                }
            });
        });

        rangeInput.forEach((input) => {
            input.addEventListener("input", (e) => {
                let minVal = parseInt(rangeInput[0].value),
                    maxVal = parseInt(rangeInput[1].value);

                if (maxVal - minVal < priceGap) {
                    if (e.target.className === "range-min") {
                        rangeInput[0].value = maxVal - priceGap;
                    } else {
                        rangeInput[1].value = minVal + priceGap;
                    }
                } else {
                    priceInput[0].value = minVal;
                    priceInput[1].value = maxVal;
                    range.style.left = (minVal / rangeInput[0].max) * 100 + "%";
                    range.style.right = 100 - (maxVal / rangeInput[1].max) * 100 + "%";
                }
            });
        });
    </script>

    <!-- Category Filter Open JS -->
    <script type="text/javascript">
        function toggleFilterBar() {
            if ($(".sidebar-section").hasClass("filter-open")) {
                // Filter is open, so close it
                $(".sidebar-section").removeClass("filter-open");
                // Re-enable body scrolling
                $("body").css("overflow", "auto");
                // Remove overlay if it exists
                $(".filter-overlay").remove();
            } else {
                // Filter is closed, so open it
                $(".sidebar-section").addClass("filter-open");
                // Disable body scrolling and add overlay
                $("body").css("overflow", "hidden");
                $("body").append('<div class="filter-overlay"></div>');
            }
        }

        // Click event for the filter open button
        $(".filter-open-btn").click(toggleFilterBar);

        // Click event for the close button
        $(".close-btn").click(toggleFilterBar);
    </script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#sortSelect').on('change', function() {
            var sortOption = $(this).val();
            var formData = $('#sortForm').serialize();

            $.ajax({
                url: $('#sortForm').attr('action'),
                type: 'POST',
                data: formData,
                success: function(response) {
                    $('.product__section--inner').html(response);
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        });
    });
</script>

@endsection
