@extends('frontend.master')
@section('content')


<!-- Start breadcrumb section -->
<div class="product-details-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-12">
                <ul class="product-d-breadcrumbs-menu">
                    <li>
                        <a href="{{route('frontend.index')}}">Home</a><i class="fi-rr-angle-right"></i>
                    </li>
                    <li>
                        <a href="#">Category</a><i class="fi-rr-angle-right"></i>
                    </li>
                    <li class="active">
                        <a href="#">Product name here</a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <div class="quickview__social d-flex align-items-center justify-content-end">
                    <label class="quickview__social--title">Social Share:</label>
                    <ul class="quickview__social--wrapper mt-0 d-flex">
                        <li class="quickview__social--list">
                            <a class="quickview__social--icon" target="_blank" href="https://www.facebook.com/">
                                <svg xmlns="http://www.w3.org/2000/svg" width="7.667" height="16.524" viewBox="0 0 7.667 16.524">
                                    <path data-name="Path 237" d="M967.495,353.678h-2.3v8.253h-3.437v-8.253H960.13V350.77h1.624v-1.888a4.087,4.087,0,0,1,.264-1.492,2.9,2.9,0,0,1,1.039-1.379,3.626,3.626,0,0,1,2.153-.6l2.549.019v2.833h-1.851a.732.732,0,0,0-.472.151.8.8,0,0,0-.246.642v1.719H967.8Z" transform="translate(-960.13 -345.407)" fill="currentColor"></path>
                                </svg>
                                <span class="visually-hidden">Facebook</span>
                            </a>
                        </li>
                        <li class="quickview__social--list">
                            <a class="quickview__social--icon" target="_blank" href="https://twitter.com/">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16.489" height="13.384" viewBox="0 0 16.489 13.384">
                                    <path data-name="Path 303" d="M966.025,1144.2v.433a9.783,9.783,0,0,1-.621,3.388,10.1,10.1,0,0,1-1.845,3.087,9.153,9.153,0,0,1-3.012,2.259,9.825,9.825,0,0,1-4.122.866,9.632,9.632,0,0,1-2.748-.4,9.346,9.346,0,0,1-2.447-1.11q.4.038.809.038a6.723,6.723,0,0,0,2.24-.376,7.022,7.022,0,0,0,1.958-1.054,3.379,3.379,0,0,1-1.958-.687,3.259,3.259,0,0,1-1.186-1.666,3.364,3.364,0,0,0,.621.056,3.488,3.488,0,0,0,.885-.113,3.267,3.267,0,0,1-1.374-.631,3.356,3.356,0,0,1-.969-1.186,3.524,3.524,0,0,1-.367-1.5v-.057a3.172,3.172,0,0,0,1.544.433,3.407,3.407,0,0,1-1.1-1.214,3.308,3.308,0,0,1-.4-1.609,3.362,3.362,0,0,1,.452-1.694,9.652,9.652,0,0,0,6.964,3.538,3.911,3.911,0,0,1-.075-.772,3.293,3.293,0,0,1,.452-1.694,3.409,3.409,0,0,1,1.233-1.233,3.257,3.257,0,0,1,1.685-.461,3.351,3.351,0,0,1,2.466,1.073,6.572,6.572,0,0,0,2.146-.828,3.272,3.272,0,0,1-.574,1.083,3.477,3.477,0,0,1-.913.8,6.869,6.869,0,0,0,1.958-.546A7.074,7.074,0,0,1,966.025,1144.2Z" transform="translate(-951.23 -1140.849)" fill="currentColor"></path>
                                </svg>
                                <span class="visually-hidden">Twitter</span>
                            </a>
                        </li>
                        <li class="quickview__social--list">
                            <a class="quickview__social--icon" target="_blank" href="https://www.instagram.com/">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16.497" height="16.492" viewBox="0 0 19.497 19.492">
                                    <path data-name="Icon awesome-instagram" d="M9.747,6.24a5,5,0,1,0,5,5A4.99,4.99,0,0,0,9.747,6.24Zm0,8.247A3.249,3.249,0,1,1,13,11.238a3.255,3.255,0,0,1-3.249,3.249Zm6.368-8.451A1.166,1.166,0,1,1,14.949,4.87,1.163,1.163,0,0,1,16.115,6.036Zm3.31,1.183A5.769,5.769,0,0,0,17.85,3.135,5.807,5.807,0,0,0,13.766,1.56c-1.609-.091-6.433-.091-8.042,0A5.8,5.8,0,0,0,1.64,3.13,5.788,5.788,0,0,0,.065,7.215c-.091,1.609-.091,6.433,0,8.042A5.769,5.769,0,0,0,1.64,19.341a5.814,5.814,0,0,0,4.084,1.575c1.609.091,6.433.091,8.042,0a5.769,5.769,0,0,0,4.084-1.575,5.807,5.807,0,0,0,1.575-4.084c.091-1.609.091-6.429,0-8.038Zm-2.079,9.765a3.289,3.289,0,0,1-1.853,1.853c-1.283.509-4.328.391-5.746.391S5.28,19.341,4,18.837a3.289,3.289,0,0,1-1.853-1.853c-.509-1.283-.391-4.328-.391-5.746s-.113-4.467.391-5.746A3.289,3.289,0,0,1,4,3.639c1.283-.509,4.328-.391,5.746-.391s4.467-.113,5.746.391a3.289,3.289,0,0,1,1.853,1.853c.509,1.283.391,4.328.391,5.746S17.855,15.705,17.346,16.984Z" transform="translate(0.004 -1.492)" fill="currentColor"></path>
                                </svg>
                                <span class="visually-hidden">Instagram</span>
                            </a>
                        </li>
                        <li class="quickview__social--list">
                            <a class="quickview__social--icon" target="_blank" href="https://www.youtube.com/">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16.49" height="11.582" viewBox="0 0 16.49 11.582">
                                    <path data-name="Path 321" d="M967.759,1365.592q0,1.377-.019,1.717-.076,1.114-.151,1.622a3.981,3.981,0,0,1-.245.925,1.847,1.847,0,0,1-.453.717,2.171,2.171,0,0,1-1.151.6q-3.585.265-7.641.189-2.377-.038-3.387-.085a11.337,11.337,0,0,1-1.5-.142,2.206,2.206,0,0,1-1.113-.585,2.562,2.562,0,0,1-.528-1.037,3.523,3.523,0,0,1-.141-.585c-.032-.2-.06-.5-.085-.906a38.894,38.894,0,0,1,0-4.867l.113-.925a4.382,4.382,0,0,1,.208-.906,2.069,2.069,0,0,1,.491-.755,2.409,2.409,0,0,1,1.113-.566,19.2,19.2,0,0,1,2.292-.151q1.82-.056,3.953-.056t3.952.066q1.821.067,2.311.142a2.3,2.3,0,0,1,.726.283,1.865,1.865,0,0,1,.557.49,3.425,3.425,0,0,1,.434,1.019,5.72,5.72,0,0,1,.189,1.075q0,.095.057,1C967.752,1364.1,967.759,1364.677,967.759,1365.592Zm-7.6.925q1.49-.754,2.113-1.094l-4.434-2.339v4.66Q958.609,1367.311,960.156,1366.517Z" transform="translate(-951.269 -1359.8)" fill="currentColor"></path>
                                </svg>
                                <span class="visually-hidden">Youtube</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End breadcrumb section -->

<!-- Start product details section -->


<section class="product__details--section section--padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-xl-10 col-md-10 col-12">
                <div class="row">
                    <div class="col-lg-6 col-12">

                        @include('frontend.include.product_gallery')

                    </div>


                    <div class="col-lg-6 col-12">
                        <!-- Product Details Info -->
                        <div class="product__details--info">
                            <form action="#">
                                <h2 class="product__details--info__title mb-15">
                                    {{$product->name ?? 'N/A'}}
                                </h2>



                                <div class="product__details--info__price mb-10">
                                    <span class="current__price">BDT {{ $product->discount_price }}</span>
                                    @if ($product->discount_price < $product->price)
                                        <span class="price__divided"></span>
                                        <span class="old__price">BDT {{ $product->price }}</span>
                                        @endif
                                </div>

                                <div class="product__variant">
                                    <div class="product__details--info__meta">


                                        <p class="product__details--info__meta--list">
                                            <span>Status:</span>
                                            @if ($product->stock > 0)
                                            <strong style="color: green">In stock</strong>
                                            @else
                                            <strong style="color: red">Out of stock</strong>
                                            @endif
                                        </p>


                                        <p class="product__details--info__meta--list">
                                            <span>Product SKU:</span>
                                            <strong>{{$product->code ?? 'N/A'}}</strong>
                                        </p>

                                        <p class="product__details--info__meta--list">
                                            <span>Brand:</span>
                                            <strong style="color: #fc6736;">
                                                <a href="#" target="_blank">{{$product->brand_name ?? 'N/A'}}</a></strong>
                                        </p>


                                        <p class="product__details--info__meta--list">
                                            <span>Warranty:</span>
                                            <strong>
                                                @php
                                                $warranty = App\Models\ProductWarrenty::find($product->warrenty_id);
                                                @endphp
                                                {{ $warranty->name ?? 'No warranty' }}

                                            </strong>
                                        </p>


                                    </div>
                                    <hr />
                                    <div class="product__variant--list mb-20">
                                        <fieldset class="variant__input--fieldset color-field">
                                            <legend class="product__variant--title mb-8">
                                                Select Color :
                                            </legend>
                                            <input id="option1" name="options" type="radio" class="btn-check" checked="" />
                                            <label class="variant__color--value red btn btn-secondary" for="option1" title="Red"></label>
                                            <input id="option2" class="btn-check" name="options" type="radio" />
                                            <label class="variant__color--value black btn btn-secondary" for="option2" title="Black"></label>
                                            <input id="option3" class="btn-check" name="options" type="radio" />
                                            <label class="variant__color--value pink btn btn-secondary" for="option3" title="Pink"></label>
                                        </fieldset>
                                    </div>

                                    <div class="product__variant--list mb-20">
                                        <fieldset class="variant__input--fieldset weight">
                                            <legend class="product__variant--title mb-8">
                                                Select Size:
                                            </legend>

                                            <div class="product__variant-main">
                                                <input id="option4" name="options2" type="radio" class="btn-check" autocomplete="off" />
                                                <label class="variant__size--value red btn btn-secondary" for="option4">Small</label>
                                                <input id="option5" name="options2" type="radio" class="btn-check" autocomplete="off" />
                                                <label class="variant__size--value red btn btn-secondary" for="option5">Medium</label>
                                                <input id="option6" name="options2" type="radio" class="btn-check" autocomplete="off" />
                                                <label class="variant__size--value red btn btn-secondary" for="option6">Large</label>
                                                <input id="option7" name="options2" type="radio" class="btn-check" autocomplete="off" />
                                                <label class="variant__size--value red btn btn-secondary" for="option7">Extra
                                                    Large</label>
                                            </div>
                                        </fieldset>
                                    </div>


                                    <div class="product__variant--list quantity d-flex align-items-center mb-20">
                                        <div class="quantity__box minicart__quantity">
                                            <button type="button" class="quantity__value decrease" aria-label="quantity value" value="Decrease Value">
                                                -
                                            </button>
                                            <label>
                                                <input type="number" class="quantity__number" value="1" data-counter="" />
                                            </label>
                                            <button type="button" class="quantity__value increase" value="Increase Value">
                                                +
                                            </button>
                                        </div>

                                        <!-- <a class="variant__wishlist--icon" href="wishlist.html" title="Add to wishlist">
                                            <i class="fi fi-rs-heart"></i>
                                            Add to Wishlist
                                        </a>

                                        <a class="variant__wishlist--icon" href="wishlist.html" title="Add to wishlist" onclick="handleWishlistClick(event)">
                                            <i class="fi fi-rs-heart"></i>
                                            Add to Wishlist
                                        </a> -->
                                        <a class="variant__wishlist--icon" href="javascript:void(0);" title="Add to wishlist" onclick="addToWishlist({{ $product->id }}, '{{ $product->slug }}')">
                                            <i class="fi fi-rs-heart"></i>
                                            Add to Wishlist
                                        </a>

                                    </div>
                                    <div class="product__variant--list mb-15">
                                        <a href="checkout.html" class="variant__buy--now__btn primary__btn" type="submit">
                                            Buy it now
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</section>



<!-- End product details section -->

<script>
    function addToWishlist(productId, productSlug) {
        $.ajax({
            url: '{{ route('wishlist.add') }}',
            type: 'POST',
            data: {
                product_id: productId,
                product_slug: productSlug,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                if(response.status == 'success') {
                    alert(response.message);
                } else {
                    alert(response.message);
                }
            },
            error: function(response) {
                if(response.status == 401) {
                    window.location.href = '{{ route('login') }}';
                } else {
                    alert('An error occurred. Please try again.');
                }
            }
        });
    }
</script>



<!-- Start product details tab section -->
<section class="product__details--tab__section section--padding">
    <div class="container">
        <div class="row row-cols-1">
            <div class="col">
                <ul class="product__details--tab d-flex mb-30">

                    <li class="product__details--tab__list active" data-toggle="tab" data-target="#description">
                        Product description
                    </li>

                    <li class="product__details--tab__list" data-toggle="tab" data-target="#specification">
                        Specification
                    </li>

                    <li class="product__details--tab__list" data-toggle="tab" data-target="#videos">
                        Product Video
                    </li>

                    <li class="product__details--tab__list" data-toggle="tab" data-target="#reviews">
                        Product review
                    </li>

                    <li class="product__details--tab__list" data-toggle="tab" data-target="#question">
                        Questions
                    </li>

                </ul>
                <div class="product__details--tab__inner border-radius-10">
                    <div class="tab_content">


                        <div id="description" class="tab_pane active show">
                            <div class="product__tab--content">
                                <div class="product__tab--content__step mb-30">

                                    <p class="product__tab--content__desc">
                                        {!! $product->description !!}
                                    </p>
                                </div>

                            </div>
                        </div>

                        <div id="specification" class="tab_pane">
                            <div class="product-specification">
                                <table class="product-specification-data">
                                    {!! $product->specification !!}
                                </table>
                            </div>
                        </div>

                        <div id="videos" class="tab_pane">
                            <div class="product-video">
                                <div class="product-video-overview">
                                    <div class="product-video-thumb-img">
                                        <img alt="#" src="{{asset('assets/img/product/product-details/img-1.webp')}}" />
                                    </div>
                                    <div class="video-thumb-icon">
                                        <a href="https://www.youtube.com/watch?v=gyGsPlt06bo" class="video video-popup popup-video">
                                            <i class="fi-rr-play"></i></a>
                                        <div class="waves-block">
                                            <div class="waves wave-1"></div>
                                            <div class="waves wave-2"></div>
                                            <div class="waves wave-3"></div>
                                        </div>
                                    </div>
                                    <div class="product-video-description">
                                        <h5 class="product-video-thumb-title m-0">
                                            KONKA Android Smart 4K
                                            LED TV – UDG55QR680ANT
                                            (55″)
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="reviews" class="tab_pane">
                            <div class="product__reviews">
                                <div class="product__reviews--header">
                                    <h2 class="product__reviews--header__title h3 mb-20">
                                        Customer Reviews
                                    </h2>
                                    <div class="reviews__ratting d-flex align-items-center">
                                        <ul class="rating d-flex">
                                            <li class="rating__list">
                                                <span class="rating__list--icon">
                                                    <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                                        <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                            </li>
                                            <li class="rating__list">
                                                <span class="rating__list--icon">
                                                    <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                                        <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                            </li>
                                            <li class="rating__list">
                                                <span class="rating__list--icon">
                                                    <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                                        <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                            </li>
                                            <li class="rating__list">
                                                <span class="rating__list--icon">
                                                    <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                                        <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                            </li>
                                            <li class="rating__list">
                                                <span class="rating__list--icon">
                                                    <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                                        <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                            </li>
                                        </ul>
                                        <span class="reviews__summary--caption">Based on 2
                                            reviews</span>
                                    </div>
                                </div>
                                <div class="reviews__comment--area">
                                    <div class="reviews__comment--list d-flex">
                                        <div class="reviews__comment--thumb">
                                            <img src="{{asset('assets/img/other/comment-thumb1.png')}}" alt="comment-thumb" />
                                        </div>
                                        <div class="reviews__comment--content">
                                            <div class="reviews__comment--top d-flex justify-content-between">
                                                <div class="reviews__comment--top__left">
                                                    <h3 class="reviews__comment--content__title h4">
                                                        Richard
                                                        Smith
                                                    </h3>
                                                    <ul class="rating reviews__comment--rating d-flex">
                                                        <li class="rating__list">
                                                            <span class="rating__list--icon">
                                                                <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                                                    <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                                                                </svg>
                                                            </span>
                                                        </li>
                                                        <li class="rating__list">
                                                            <span class="rating__list--icon">
                                                                <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                                                    <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                                                                </svg>
                                                            </span>
                                                        </li>
                                                        <li class="rating__list">
                                                            <span class="rating__list--icon">
                                                                <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                                                    <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                                                                </svg>
                                                            </span>
                                                        </li>
                                                        <li class="rating__list">
                                                            <span class="rating__list--icon">
                                                                <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                                                    <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                                                                </svg>
                                                            </span>
                                                        </li>
                                                        <li class="rating__list">
                                                            <span class="rating__list--icon">
                                                                <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                                                    <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                                                                </svg>
                                                            </span>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <span class="reviews__comment--content__date">February 18,
                                                    2022</span>
                                            </div>
                                            <p class="reviews__comment--content__desc">
                                                Lorem ipsum, dolor
                                                sit amet consectetur
                                                adipisicing elit.
                                                Eos ex repellat
                                                officiis neque.
                                                Veniam, rem
                                                nesciunt. Assumenda
                                                distinctio, autem
                                                error repellat
                                                eveniet ratione
                                                dolor facilis
                                                accusantium amet
                                                pariatur, non eius!
                                            </p>
                                            <div class="reviews-date-img">
                                                <div class="single-reviews-date-img">
                                                    <a class="glightbox" href="{{asset('assets/img/product/product-details/img-1.webp')}}">
                                                        <img src="{{asset('assets/img/product/product-details/img-1.webp')}}" alt="#" />
                                                    </a>
                                                </div>

                                                <div class="single-reviews-date-img">
                                                    <a class="glightbox" href="{{asset('assets/img/product/product-details/img-2.jpg')}}">
                                                        <img src="{{asset('assets/img/product/product-details/img-2.jpg')}}" alt="#" />
                                                    </a>
                                                </div>

                                                <div class="single-reviews-date-img">
                                                    <a class="glightbox" href="{{asset('assets/img/product/product-details/img-3.jpg')}}">
                                                        <img src="{{asset('assets/img/product/product-details/img-3.jpg')}}" alt="#" />
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="review-seller-response reviews__comment--list">
                                        <div class="reviews__comment--top d-flex justify-content-between">
                                            <div class="reviews__comment--top__left">
                                                <h3 class="reviews__comment--content__title h4">
                                                    Seller Response
                                                </h3>
                                            </div>
                                            <span class="reviews__comment--content__date">February 18,
                                                2022</span>
                                        </div>
                                        <p class="reviews__comment--content__desc">
                                            Lorem ipsum, dolor sit
                                            amet consectetur
                                            adipisicing elit. Eos ex
                                            repellat officiis neque.
                                            Veniam, rem nesciunt.
                                            Assumenda distinctio,
                                            autem error repellat
                                            eveniet ratione dolor
                                            facilis accusantium amet
                                            pariatur, non eius!
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="question" class="tab_pane">
                            <div class="product-question">
                                <div class="product-question-form">


                                    <form action="{{ route('quesiton.save') }}" method="post">
                                        @csrf
                                        <!-- Form fields here -->
                                        <input type="hidden" name="product_id" value="{{$product->id}}">
                                        <input type="hidden" name="slug" value="{{$product->slug}}">

                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-12">
                                                <div class="form-group">
                                                    <label>Full Name</label>
                                                    <input type="text" required name="full_name" />
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-12">
                                                <div class="form-group">
                                                    <label>Email Address</label>
                                                    <input type="email" required name="email" />
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>Your Questions?</label>
                                                    <textarea name="question" required></textarea>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="product-question-form-btn">
                                                    <button type="submit" class="theme-btn">Ask Question</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>



                                </div>



                                <div class="product-question-main">
                                    <div class="product-question-head">
                                        <h4 class="product-question-title">
                                            Question and answer
                                        </h4>
                                    </div>


                                    @foreach($productQuestionAnswers as $questionAnswer)
                                    <div class="product-question-main-widget">
                                        <div class="product-question-single display-flex-top">
                                            <div class="product-question-img">
                                                <img alt="#" src="{{ asset('assets/img/icons/question.svg') }}" />
                                            </div>
                                            <div class="product-question-info">
                                                <h6 class="product-question-info-title">
                                                    {{ $questionAnswer->question }}
                                                </h6>
                                                <div class="product-question-info-bottom">
                                                    <span class="product-question-name">{{ $questionAnswer->full_name }}</span>
                                                    <span class="product-question-date">{{ $questionAnswer->created_at->diffForHumans() }}</span>
                                                </div>
                                            </div>
                                        </div>

                                        @if ($questionAnswer->answer)
                                        <div class="product-answer-single display-flex-top">
                                            <div class="product-answer-img">
                                                <img alt="#" src="{{ asset('assets/img/icons/answer.svg') }}" />
                                            </div>
                                            <div class="product-answer-info">
                                                <h6 class="product-answer-info-title">
                                                    {{ $questionAnswer->answer }}
                                                </h6>
                                                <div class="product-answer-info-bottom">
                                                    <!-- <span class="product-answer-name">Bestu.com.bd</span> -->
                                                    <span class="product-answer-name">{{ config('app.site_name') }}</span>
                                                    <span class="product-answer-date">{{ $questionAnswer->updated_at->diffForHumans() }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                    @endforeach

                                </div>


                                <!-- <div class="row">
                                    <div class="col-lg-6 offset-lg-6 col-md-6 offset-md-6 col-12">
                                        <div class="pagination-area">
                                            <ul class="pagination-list">
                                                <li class="active">
                                                    <a href="#">1</a>
                                                </li>
                                                <li>
                                                    <a href="#">2</a>
                                                </li>
                                                <li>
                                                    <a href="#">3</a>
                                                </li>
                                                <li>
                                                    <a href="#">4</a>
                                                </li>
                                                <li>
                                                    <a href="#">5</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End product details tab section -->


<!-- Start product section -->

<section class="product__section product__section--style3 section--padding">
    <div class="container product3__section--container">
        <div class="section__heading text-center mb-50">
            <h2 class="section__heading--maintitle">You may also like</h2>
        </div>
        <div class="product__section--inner product__swiper--column4__activation swiper">
            <div class="swiper-wrapper">
                @foreach($mayLikedProducts as $product)
                <div class="swiper-slide">
                    <div class="product__items">
                        <div class="product__items--thumbnail">
                            <a class="product__items--link" href="#">
                                <img class="product__items--img product__primary--img" src="{{ url(env('ADMIN_URL') . '/' . $product->image) }}" alt="product-img" />
                                <img class="product__items--img product__secondary--img" src="{{ url(env('ADMIN_URL') . '/' . $product->image) }}" alt="product-img" />
                            </a>
                            @if ($product->discount_price < $product->price)
                                <div class="product__badge">
                                    <span class="product__badge--items sale">Sale</span>
                                </div>
                                @endif
                        </div>
                        <div class="product__items--content">
                            <span class="product__items--content__subtitle">{{ $product->category_name }}</span>
                            <h3 class="product__items--content__title h4">
                                <a href="#" class="product__items--content__subtitle">{{ $product->name }}</a>
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
                                    <a class="product__items--action__btn add__to--cart" href="#" onclick="addToCart({{ $product->id }})" >
                                        <i class="fi-rr-shopping-cart"></i>
                                        <span class="add__to--cart__text">Add to cart</span>
                                    </a>
                                    <a href="javascript:void(0)" class="quick-view-btn" data-open="modal1">
                                        <i class="fi-rr-eye"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="swiper__nav--btn swiper-button-next"></div>
            <div class="swiper__nav--btn swiper-button-prev"></div>
        </div>
    </div>
</section>

<!-- End product section -->












<!-- All Script JS Plugins here  -->
<script src="{{asset('assets/js/vendor/bootstrap.min.js')}}" defer="defer"></script>
<script src="{{asset('assets/js/vendor/popper.js')}}" defer="defer"></script>
<script src="{{asset('assets/js/plugins/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/jquery-migrate.js')}}"></script>

<script src="{{asset('assets/js/plugins/modernizer.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/wow.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/jquery.counterup.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/waypoints.min.js')}}"></script>

<script src="{{asset('assets/js/plugins/nice-select.js')}}"></script>
<script src="{{asset('assets/js/plugins/swiper-bundle.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/glightbox.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/bootstrap-datepicker.js')}}"></script>

<script src="{{asset('assets/js/plugins/glightbox.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/magnific-popup.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/owl.carousel.min.js')}}"></script>


<script src="{{asset('assets/js/plugins/active.js')}}"></script>
<script src="{{asset('assets/js/script.js')}}"></script>



<!-- Increment Decrement Quantity js -->
<script type="text/javascript">
    function incrementQuantity(inputId) {
        const inputField = document.getElementById(inputId);
        const currentValue = parseInt(inputField.value, 10);
        inputField.value = currentValue + 1;
    }

    function decrementQuantity(inputId) {
        const inputField = document.getElementById(inputId);
        const currentValue = parseInt(inputField.value, 10);
        if (currentValue > 0) {
            inputField.value = currentValue - 1;
        }
    }
</script>

<!-- Image Zoom JS -->
<script type="text/javascript">
    $(document).ready(function() {
        $(".zoomSingleImage").zoom();
    });
</script>

<!-- Installment Select Timeframe JS -->
<script type="text/javascript">
    function updateInstallmentTimeframe() {
        var selectElement = document.querySelector(
            ".price-input-installment-select"
        );
        var selectedOption =
            selectElement.options[selectElement.selectedIndex].text;
        var timeframeElement = document.getElementById(
            "installmentTimeframe"
        );
        timeframeElement.innerHTML =
            "Installment timeframe: <span>" +
            selectedOption +
            "</span>";
    }
</script>

@endsection
