@extends('frontend.master')

@section('content')
    <!-- Hero Area -->
    @include('frontend.include.slider')

    <!-- End Hero Area -->
    <!-- Brand Area -->
    <!-- <section class="brand-area section--padding pb-0">
                                                        <div class="container">
                                                          <div class="row">
                                                            <div class="col-12">
                                                              <div class="brand-slider">
                                                                <a href="#" class="single-brand">
                                                                  <img src="./assets/img/brand/Gree.webp" alt="#" />
                                                                </a>
                                                                <a href="#" class="single-brand">
                                                                  <img src="./assets/img/brand/Konka.webp" alt="#" />
                                                                </a>
                                                                <a href="#" class="single-brand">
                                                                  <img src="./assets/img/brand/Haiko.webp" alt="#" />
                                                                </a>
                                                                <a href="#" class="single-brand">
                                                                  <img src="./assets/img/brand/Gree.webp" alt="#" />
                                                                </a>
                                                                <a href="#" class="single-brand">
                                                                  <img src="./assets/img/brand/Konka.webp" alt="#" />
                                                                </a>
                                                                <a href="#" class="single-brand">
                                                                  <img src="./assets/img/brand/Haiko.webp" alt="#" />
                                                                </a>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </div>
                                                      </section> -->
    <!-- End Brand Area -->

    <!-- Shop Category section -->
    <!-- Shop Category section -->




    <section class="shop-category-area section--padding">
        <div class="container">
            <div class="section__heading text-center mb-35">
                <h2 class="section__heading--maintitle">Shop By Category</h2>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="shop-category-inner">
                        @foreach ($featuredCategories as $category)
                            <a href="{{ route('shop.category', $category->slug) }}" class="shop-category-card">
                                <div class="shop-category-icon">
                                    <img src="{{ url(env('ADMIN_URL') . '/' . $category->icon) }}"
                                        alt="{{ $category->name }}" />
                                </div>
                                <div class="shop-category-title">
                                    <h4>

                                        @if (!$lan)
                                            <!-- If $lan is not set or is falsy -->
                                            {{ $category->name }}
                                        @elseif ($lan['language_id'] == 1)
                                            <!-- If $lan['language_id'] is 1 -->
                                            {{ $category->name }}
                                        @elseif ($lan['language_id'] == 2)
                                            <!-- If $lan['language_id'] is 2 -->
                                            {{ $category->name_bn }}
                                        @endif

                                    </h4>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- End Shop Category section -->

    <!-- End Shop Category section -->

    <!-- Start product section -->



    <!-- Start product section -->
    <section class="product__section section--padding">
        <div class="container">
            <div class="section__heading text-center mb-35">
                <h2 class="section__heading--maintitle">{{ lan_key('all_product') }}</h2>
            </div>
            <div class="product__section--inner">
                @foreach ($products as $product)
                    <div class="product__items">
                        <div class="product__items--thumbnail">
                            <a class="product__items--link" href="{{ route('product.detail', $product->slug) }}">
                                <img class="product__items--img product__primary--img"
                                    src="{{ url(env('ADMIN_URL') . '/' . $product->image) }}" alt="{{ $product->name }}" />
                                <img class="product__items--img product__secondary--img"
                                    src="{{ url(env('ADMIN_URL') . '/' . $product->image) }}"
                                    alt="{{ $product->name }}" />
                            </a>
                            @if (isset($product->flag_name))
                                <div class="product__badge">
                                    <span class="product__badge--items sale">{{ $product->flag_name }}</span>
                                </div>
                            @endif
                        </div>
                        <div class="product__items--content">
                            <span class="product__items--content__subtitle">{{ $product->category_name }}</span>
                            <h3 class="product__items--content__title h4">
                                <a href="{{ route('product.detail', $product->slug) }}">{{ $product->name }}</a>
                            </h3>
                            <div class="product__items--price">

                                @if ($product->discount_price > 0)
                                    <span class="current__price">৳{{ number_format($product->discount_price, 2) }}</span>
                                    <span class="price__divided"></span>
                                    <span class="old__price">৳{{ number_format($product->price, 2) }}</span>
                                @else
                                    <span class="current__price">৳{{ number_format($product->price, 2) }}</span>
                                @endif

                            </div>
                            <ul class="product__items--action d-flex">
                                <li class="product__items--action__list">
                                    <a class="product__items--action__btn add__to--cart" href="javascript:void(0)"
                                        id="add_to_cart_{{ $product->id }}" data-product-id="{{ $product->id }}"
                                        onclick="addToCart({{ $product->id }})">
                                        <i class="fi-rr-shopping-cart"></i>
                                        <span class="add__to--cart__text"> {{ lan_key('add_to_cart') }}</span>
                                    </a>

                                    {{-- <a href="javascript:void(0)" class="quick-view-btn" data-open="modal1">
                                <i class="fi-rr-eye"></i>
                            </a> --}}

                                    <a href="javascript:void(0)" class="quick-view-btn" data-open="modal1">
                                        <i class="fi-rr-eye"></i>
                                    </a>
                                    {{-- <a href="javascript:void(0)" class="quick-view-btn" data-open="modal1"
                                        data-product-id="{{ $product->id }}">
                                        <i class="fi-rr-eye"></i>
                                    </a> --}}
                                </li>
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="section__bottom-btn">
                <a href="#" class="primary__btn">{{ lan_key('show_more') }}</a>
            </div>
        </div>
    </section>
    <!-- End product section -->









    <!-- CTA section --><!-- CTA section -->
    <section class="category-cta-section"
        style="background-image: url('{{ url(env('ADMIN_URL') . '/' . $bannermiddle->image) }}');">
        <div class="container">
            <div class="category-cta-inner">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="category-cta-content">
                            <h3>{{ $bannermiddle->title }}</h3>
                            <a href="{{ $bannermiddle->btn_link }}" class="primary__btn">{{ $bannermiddle->btn_text }}<svg
                                    class="primary__btn--arrow__icon" xmlns="http://www.w3.org/2000/svg" width="20.2"
                                    height="12.2" viewBox="0 0 6.2 6.2">
                                    <path
                                        d="M7.1,4l-.546.546L8.716,6.713H4v.775H8.716L6.554,9.654,7.1,10.2,9.233,8.067,10.2,7.1Z"
                                        transform="translate(-4 -4)" fill="currentColor"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End CTA section -->






    <!-- Category Wise Product Area -->
    <section class="category-wise-product section--padding pb-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="category-wise-product-slider swiper">
                        <div class="swiper-wrapper">

                            @foreach ($products as $product)
                                <!-- Single Card -->
                                <div class="swiper-slide product__items">
                                    <div class="product__items--thumbnail">
                                        <a class="product__items--link"
                                            href="{{ route('product.detail', $product->slug) }}">
                                            <img class="product__items--img product__primary--img"
                                                src="{{ url(env('ADMIN_URL') . '/' . $product->image) }}"
                                                alt="product-img" />
                                            <img class="product__items--img product__secondary--img"
                                                src="{{ url(env('ADMIN_URL') . '/' . $product->image) }}"
                                                alt="product-img" />
                                        </a>
                                        @if ($product->discount_price < $product->price)
                                            <div class="product__badge">
                                                <span class="product__badge--items sale">Sale</span>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="product__items--content">
                                        <span
                                            class="product__items--content__subtitle">{{ $product->category_name }}</span>
                                        <h3 class="product__items--content__title h4">
                                            <a
                                                href="{{ route('product.detail', $product->slug) }}">{{ $product->name }}</a>
                                        </h3>
                                        <div class="product__items--price">
                                            <span class="current__price">BDT {{ $product->discount_price }}</span>
                                            @if ($product->discount_price < $product->price)
                                                <span class="price__divided"></span>
                                                <span class="old__price">BDT {{ $product->price }}</span>
                                            @endif
                                        </div>
                                        <ul class="product__items--action d-flex">
                                            <li class="product__items--action__list">
                                                <a class="product__items--action__btn add__to--cart" href="#"
                                                    onclick="addToCart({{ $product->id }})">
                                                    <i class="fi-rr-shopping-cart"></i>
                                                    <span class="add__to--cart__text"> {{ lan_key('add_to_cart') }}</span>
                                                </a>

                                                <a href="javascript:void(0)" class="quick-view-btn" data-open="modal1">
                                                    <i class="fi-rr-eye"></i>
                                                </a>


                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- End Single Card -->
                            @endforeach

                        </div>
                        <div class="swiper__nav--btn swiper-button-next"></div>
                        <div class="swiper__nav--btn swiper-button-prev"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Category Wise Product Area -->

    <!-- End Category Wise Product Area -->



    <!-- Digital Product Area -->
    <section class="digital-product-area section--padding pb-0">
        <div class="container">
            <div class="section__heading text-center mb-35">
                <h2 class="section__heading--maintitle"> {{ lan_key('digital_products') }}</h2>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="dp-inner">
                        @foreach ($products as $product)
                            <!-- Single Card -->
                            <div class="dp-card">
                                <a href="{{ route('product.detail', $product->slug) }}" class="dp-img">
                                    @if ($product->discount_price < $product->price)
                                        <span class="product-save">- SAVE {{ $product->price - $product->discount_price }}
                                            TK</span>
                                    @endif
                                    <img src="{{ url(env('ADMIN_URL') . '/' . $product->image) }}"
                                        alt="{{ $product->name }}" />
                                </a>
                                <div class="dp-info">
                                    <span>Digital Delivery</span>
                                    <h4>
                                        <a href="{{ route('product.detail', $product->slug) }}">{{ $product->name }}</a>
                                    </h4>
                                    <!-- Example of rating stars -->
                                    <ul class="dp-info-ratting">
                                        @for ($i = 0; $i < 5; $i++)
                                            <li><i class="fi-ss-star"></i></li>
                                        @endfor
                                    </ul>
                                    <div class="dp-price">
                                        <div class="dp-price-main">
                                            ৳ {{ $product->discount_price }}
                                            @if ($product->discount_price < $product->price)
                                                <del>৳ {{ $product->price }}</del>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="dp-btn">
                                        <a href="#" onclick="addToCart({{ $product->id }})" class="primary__btn">
                                            <i class="fi-rr-plus"></i> {{ lan_key('add_to_cart') }}</a>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Card -->
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="section__bottom-btn">
                        <a href="#" class="primary__btn"> {{ lan_key('more_items') }} </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Digital Product Area -->

    <!-- End Digital Product Area -->



    <!-- Download App section -->
    <section class="download-app">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="download-app-inner">
                        <div class="download-app-img">
                            <img src="{{ asset('assets/img/downlad-app.jpg') }}" alt="#" />
                        </div>
                        <div class="download-app-content">
                            <h2>Download the Etek mobile app</h2>
                            <p>
                                Order medicine from the mobile app. Click Google play link Or App store
                                to receive the app download link.
                            </p>
                            <!-- <form class="download-app-form" action="#" method="post">
                                                                            <div class="form-group">
                                                                                <div class="form-icon">
                                                                                    <i class="fi fi-rr-phone-call"></i>
                                                                                </div>
                                                                                <input type="tel" name="phone" placeholder="+8801234567890" required />
                                                                            </div>
                                                                            <div class="download-app-form-btn">
                                                                                <button type="submit">Send link</button>
                                                                            </div>
                                                                        </form> -->
                            <div class="download-app-links">
                                <a href="{{ $generalInfo->app_store_link }}" target="_blank">
                                    <img src="{{ asset('assets/img/icon/google-play.svg') }}" alt="#" /></a>
                                <a href="{{ $generalInfo->play_store_link }}" target="_blank">
                                    <img src="{{ asset('assets/img/icon/app-store.svg') }}" alt="#" /></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- End Download App section -->
@endsection



@section('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        const baseUrl = '{{ url(env('ADMIN_URL')) }}';

        $(document).ready(function() {
            fetchCart();
        });



        function fetchCart() {
            $.ajax({
                url: '{{ route('show.cart') }}',
                method: 'GET',
                success: function(response) {
                    // Update cart count
                    $('.items__count').text(Object.keys(response.cart).length);

                    // Render cart items
                    renderCartItems(response.cart);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    alert('Something went wrong while fetching the cart data!');
                }
            });
        }

        function addToCart(productId) {
            $.ajax({
                url: '{{ route('cart.add') }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    product_id: productId
                },
                success: function(response) {
                    // Update cart count
                    $('.items__count').text(Object.keys(response.cart).length);

                    // Render cart items
                    renderCartItems(response.cart);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    alert('Something went wrong!');
                }
            });
        }

        function renderCartItems(cart) {
            let cartItemsHtml = '';
            let totalPrice = 0;

            $.each(cart, function(key, item) {
                totalPrice += item.price * item.quantity;

                cartItemsHtml += `
            <div class="minicart__product--items d-flex">
                <div class="minicart__thumb">
                    <a href="product-details.html">
                        <img src="${baseUrl}/${item.image}" alt="${item.name}" />
                    </a>
                </div>
                <div class="minicart__text">
                    <h3 class="minicart__subtitle h4">
                        <span class="product__items--content__subtitle">${item.name}</span>
                    </h3>
                    <div class="minicart__price">
                        <span class="current__price">${item.price} BDT</span>
                    </div>
                    <div class="minicart__text--footer d-flex align-items-center">
                        <div class="quantity__box minicart__quantity">
                            <button type="button" class="quantity__value decrease" data-product-id="${key}">-</button>
                            <label>
                                <input type="number" class="quantity__number" value="${item.quantity}" data-counter />
                            </label>
                            <button type="button" class="quantity__value increase" data-product-id="${key}">+</button>
                        </div>
                        <button class="minicart__product--remove" data-product-id="${key}">Remove</button>
                    </div>
                </div>
            </div>
        `;
            });

            // Update minicart product area
            $('.minicart__product').html(cartItemsHtml);

            // Update totals
            $('.minicart__amount_list:contains("Sub Total:") span:last').html(`<b>${totalPrice} BDT</b>`);
            $('.minicart__amount_list:contains("Total:") span:last').html(`<b>${totalPrice} BDT</b>`);
        }

        $(document).on('click', '.quantity__value.increase', function() {
            let productId = $(this).data('product-id');
            updateCart(productId, 'increase');
        });

        $(document).on('click', '.quantity__value.decrease', function() {
            let productId = $(this).data('product-id');
            updateCart(productId, 'decrease');
        });

        $(document).on('click', '.minicart__product--remove', function() {
            let productId = $(this).data('product-id');
            updateCart(productId, 'remove');
        });

        function updateCart(productId, action) {
            $.ajax({
                url: '{{ route('cart.update') }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    product_id: productId,
                    action: action
                },
                success: function(response) {
                    // Re-render the cart items
                    renderCartItems(response.cart);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }
    </script>
@endsection
