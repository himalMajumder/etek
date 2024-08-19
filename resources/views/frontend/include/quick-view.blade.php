<div class="quickview__inner">
    <div class="row row-cols-lg-2 row-cols-md-2">
        <div class="col">
            <div class="quickview__product--media product__details--media">
                <!-- Swiper Container for Main Image Preview -->
                <div class="product__media--preview swiper">
                    <div class="swiper-wrapper">
                        @foreach($images as $image)
                        @php
                            // Ensure the image path includes 'productImages/' directory
                            $imagePath = Str::startsWith($image, 'productImages/') ? $image : 'productImages/' . $image;
                        @endphp
                        <div class="swiper-slide">
                            <div class="product__media--preview__items">
                                <a class="product__media--preview__items--link glightbox" data-gallery="product-media-preview" href="{{ asset(env('ADMIN_URL') . '/' . $imagePath) }}">
                                    <img class="product__media--preview__items--img" src="{{ asset(env('ADMIN_URL') . '/' . $imagePath) }}" alt="product-media-img" />
                                </a>
                                <div class="product__media--view__icon">
                                    <a class="product__media--view__icon--link glightbox" href="{{ asset(env('ADMIN_URL') . '/' . $imagePath) }}" data-gallery="product-media-preview">
                                        <svg class="product__media--view__icon--svg" xmlns="http://www.w3.org/2000/svg" width="22.51" height="22.443" viewBox="0 0 512 512">
                                            <path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"></path>
                                            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Swiper Container for Thumbnail Navigation -->
                <div class="product__media--nav swiper">
                    <div class="swiper-wrapper">
                        @foreach($images as $image)
                        @php
                            // Ensure the image path includes 'productImages/' directory
                            $imagePath = Str::startsWith($image, 'productImages/') ? $image : 'productImages/' . $image;
                        @endphp
                        <div class="swiper-slide">
                            <div class="product__media--nav__items">
                                <img class="product__media--nav__items--img" src="{{ asset(env('ADMIN_URL') . '/' . $imagePath) }}" alt="product-nav-img" />
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="swiper__nav--btn swiper-button-next"></div>
                    <div class="swiper__nav--btn swiper-button-prev"></div>
                </div>
            </div>
        </div>
        <!-- Rest of your code -->
    </div>
</div>

