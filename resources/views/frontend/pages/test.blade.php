@extends('frontend.master')
@section('content')


<!-- Start breadcrumb section -->
<div class="product-details-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-12">
                <ul class="product-d-breadcrumbs-menu">
                    <li>
                        <a href="index.html">Home</a><i class="fi-rr-angle-right"></i>
                    </li>
                    <li>
                        <a href="shop.html">Category</a><i class="fi-rr-angle-right"></i>
                    </li>
                    <li class="active">
                        <a href="product-details.html">Product name here</a>
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
                        <div class="product__details--media">
                            <div class="product__media--preview swiper">
                                <div class="swiper-wrapper">
                                    <!-- Single Slider -->
                                    <div class="swiper-slide">
                                        <div class="product__media--preview__items">
                                            <!-- <img
                              class="product__media--preview__items--img"
                              src="./assets/img/product/product-details/img-1.webp"
                              alt="product-media-img"
                            /> -->
                                            <video autoplay="" loop="" controls="" class="product__media--items-video">
                                                <source type="video/mp4" src="./assets/img/product/KONKA WEBOS TV Series808.mp4" />
                                            </video>
                                        </div>
                                    </div>
                                    <!-- Single Slider -->
                                    <div class="swiper-slide">
                                        <div class="product__media--preview__items zoom zoomSingleImage">
                                            <img class="product__media--preview__items--img" src="./assets/img/product/product-details/img-2.jpg" alt="product-media-img" />
                                        </div>
                                    </div>
                                    <!-- Single Slider -->
                                    <div class="swiper-slide">
                                        <div class="product__media--preview__items zoom zoomSingleImage">
                                            <img class="product__media--preview__items--img" src="./assets/img/product/product-details/img-3.jpg" alt="product-media-img" />
                                        </div>
                                    </div>
                                    <!-- Single Slider -->
                                    <div class="swiper-slide">
                                        <div class="product__media--preview__items zoom zoomSingleImage">
                                            <img class="product__media--preview__items--img" src="./assets/img/product/product-details/img-4.jpg" alt="product-media-img" />
                                        </div>
                                    </div>
                                    <!-- Single Slider -->
                                    <div class="swiper-slide">
                                        <div class="product__media--preview__items zoom zoomSingleImage">
                                            <img class="product__media--preview__items--img" src="./assets/img/product/product-details/img-5.webp" alt="product-media-img" />
                                        </div>
                                    </div>
                                    <!-- Single Slider -->
                                    <div class="swiper-slide">
                                        <div class="product__media--preview__items zoom zoomSingleImage">
                                            <img class="product__media--preview__items--img" src="./assets/img/product/product-details/img-2.jpg" alt="product-media-img" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Slider Thumbs -->
                            <div class="product__media--nav swiper">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="product__media--nav__items">
                                            <img class="product__media--nav__items--img" src="./assets/img/product/product-details/img-1.webp" alt="product-nav-img" />
                                            <i class="fi-rr-play product__media--video-play"></i>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="product__media--nav__items">
                                            <img class="product__media--nav__items--img" src="./assets/img/product/product-details/img-2.jpg" alt="product-nav-img" />
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="product__media--nav__items">
                                            <img class="product__media--nav__items--img" src="./assets/img/product/product-details/img-3.jpg" alt="product-nav-img" />
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="product__media--nav__items">
                                            <img class="product__media--nav__items--img" src="./assets/img/product/product-details/img-4.jpg" alt="product-nav-img" />
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="product__media--nav__items">
                                            <img class="product__media--nav__items--img" src="./assets/img/product/product-details/img-5.webp" alt="product-nav-img" />
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="product__media--nav__items">
                                            <img class="product__media--nav__items--img" src="./assets/img/product/product-details/img-2.jpg" alt="product-nav-img" />
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper__nav--btn swiper-button-next"></div>
                                <div class="swiper__nav--btn swiper-button-prev"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <!-- Product Details Info -->
                        <div class="product__details--info">
                            <form action="#">
                                <h2 class="product__details--info__title mb-15">
                                    KONKA Android Smart 4K LED TV –
                                    UDG55QR680ANT (55″)
                                </h2>
                                <div class="product__details--info__price mb-10">
                                    <span class="current__price">৳28,000</span>
                                    <span class="price__divided"></span>
                                    <span class="old__price">৳30,000</span>
                                </div>
                                <div class="product__variant">
                                    <div class="product__details--info__meta">
                                        <p class="product__details--info__meta--list">
                                            <span>Status:</span>
                                            <strong style="color: green">In stock</strong>
                                        </p>
                                        <p class="product__details--info__meta--list">
                                            <span>Product SKU:</span>
                                            <strong>2530230</strong>
                                        </p>
                                        <p class="product__details--info__meta--list">
                                            <span>Brand:</span>
                                            <strong style="
																color: #fc6736;
															"><a href="#" target="_blank">Samsung</a></strong>
                                        </p>
                                        <p class="product__details--info__meta--list">
                                            <span>Warranty:</span>
                                            <strong>
                                                (Official) 2 years
                                                panel, 1 year spare
                                                parts & 5 years
                                                service
                                                warranty</strong>
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

                                    <!-- <div class="product__variant--list mb-15">
                          <fieldset class="variant__input--fieldset weight">
                            <legend class="product__variant--title mb-8">
                              Weight :
                            </legend>
                            <input
                              id="option4"
                              name="options2"
                              type="radio"
                              class="btn-check"
                              autocomplete="off"
                            />
                            <label
                              class="variant__size--value red btn btn-secondary"
                              for="option4"
                              >5 kg</label
                            >
                            <input
                              id="option5"
                              name="options2"
                              type="radio"
                              class="btn-check"
                              autocomplete="off"
                            />
                            <label
                              class="variant__size--value red btn btn-secondary"
                              for="option5"
                              >3 kg</label
                            >
                            <input
                              id="option6"
                              name="options2"
                              type="radio"
                              class="btn-check"
                              autocomplete="off"
                            />
                            <label
                              class="variant__size--value red btn btn-secondary"
                              for="option6"
                              >2 kg</label
                            >
                          </fieldset>
                        </div> -->

                                    <!-- <div class="product__variant--list mb-10">
                          <div class="price-input">
                            <label for="flexRadioDefault">
                              <div class="price-input-main">
                                <input
                                  class="form-check-input"
                                  type="radio"
                                  name="flexRadioDefault"
                                  id="flexRadioDefault"
                                />
                                <div class="prcie-widget-inner">
                                  <div class="prcie-main">
                                    <span> 15,000 BDT </span
                                    ><del>18,000 BDT</del>
                                  </div>
                                  <div class="prcie-widget-info">
                                    <ul>
                                      <li>Cash Discount Price</li>
                                      <li>Online payment / Cash on delivery</li>
                                    </ul>
                                  </div>
                                </div>
                              </div>
                            </label>

                            <div class="price-input-installment">
                              <div class="price-input-installment-head">
                                <span class="price-input-installment-h-title"
                                  >Buy with installment</span
                                >
                                <select
                                  class="price-input-installment-select"
                                  onchange="updateInstallmentTimeframe()"
                                >
                                  <option selected disabled>
                                    Change timeframe
                                  </option>
                                  <option value="1">3 Month</option>
                                  <option value="2">6 Month</option>
                                  <option value="3">9 Month</option>
                                </select>
                              </div>
                              <label for="flexRadioDefault1">
                                <div class="price-input-main">
                                  <input
                                    class="form-check-input"
                                    type="radio"
                                    name="flexRadioDefault"
                                    id="flexRadioDefault1"
                                  />
                                  <div class="prcie-widget-inner">
                                    <div class="prcie-main">
                                      <span> 2,541 BDT </span
                                      ><strong>/Per month</strong>
                                    </div>
                                    <div class="prcie-interest">
                                      <span>+5% Interest</span>
                                    </div>
                                    <div class="prcie-widget-info">
                                      <ul>
                                        <li>
                                          Total price: <span>15,750 BDT</span>
                                        </li>
                                        <li>
                                          Down payment: <span>5,000 BDT</span>
                                        </li>
                                        <li id="installmentTimeframe">
                                          Installment timeframe:
                                          <span>6 month</span>
                                        </li>
                                      </ul>
                                    </div>
                                  </div>
                                </div>
                              </label>
                            </div>
                          </div>
                        </div> -->

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
                                        <button class="quickview__cart--btn primary__btn" type="submit">
                                            Add To Cart
                                        </button>
                                        <a class="variant__wishlist--icon" href="wishlist.html" title="Add to wishlist">
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
                                    <h2 class="product__tab--content__title h4 mb-10">
                                        Nam provident sequi
                                    </h2>
                                    <p class="product__tab--content__desc">
                                        Lorem ipsum dolor sit, amet
                                        consectetur adipisicing
                                        elit. Nam provident sequi,
                                        nemo sapiente culpa nostrum
                                        rem eum perferendis
                                        quibusdam, magnam a vitae
                                        corporis! Magnam enim modi,
                                        illo harum suscipit tempore
                                        aut dolore doloribus
                                        deserunt voluptatum illum,
                                        est porro? Ducimus dolore
                                        accusamus impedit ipsum
                                        maiores, ea iusto temporibus
                                        numquam eaque mollitia
                                        fugiat laborum dolor tempora
                                        eligendi voluptatem quis
                                        necessitatibus nam ab?
                                    </p>
                                </div>
                                <div class="product__tab--content__step">
                                    <h4 class="product__tab--content__title mb-10">
                                        More Details
                                    </h4>
                                    <ul>
                                        <li class="product__tab--content__list">
                                            <svg class="product__tab--content__list--icon" xmlns="http://www.w3.org/2000/svg" width="22.51" height="20.443" viewBox="0 0 512 512">
                                                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M268 112l144 144-144 144M392 256H100"></path>
                                            </svg>
                                            Lorem ipsum dolor sit
                                            amet consectetur
                                            adipisicing elit.
                                            Laboriosam, dolorum?
                                        </li>
                                        <li class="product__tab--content__list">
                                            <svg class="product__tab--content__list--icon" xmlns="http://www.w3.org/2000/svg" width="22.51" height="20.443" viewBox="0 0 512 512">
                                                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M268 112l144 144-144 144M392 256H100"></path>
                                            </svg>
                                            Magnam enim modi, illo
                                            harum suscipit tempore
                                            aut dolore?
                                        </li>
                                        <li class="product__tab--content__list">
                                            <svg class="product__tab--content__list--icon" xmlns="http://www.w3.org/2000/svg" width="22.51" height="20.443" viewBox="0 0 512 512">
                                                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M268 112l144 144-144 144M392 256H100"></path>
                                            </svg>
                                            Numquam eaque mollitia
                                            fugiat laborum dolor
                                            tempora;
                                        </li>
                                        <li class="product__tab--content__list">
                                            <svg class="product__tab--content__list--icon" xmlns="http://www.w3.org/2000/svg" width="22.51" height="20.443" viewBox="0 0 512 512">
                                                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M268 112l144 144-144 144M392 256H100"></path>
                                            </svg>
                                            Sit amet consectetur
                                            adipisicing elit. Quo
                                            delectus repellat facere
                                            maiores.
                                        </li>
                                        <li class="product__tab--content__list">
                                            <svg class="product__tab--content__list--icon" xmlns="http://www.w3.org/2000/svg" width="22.51" height="20.443" viewBox="0 0 512 512">
                                                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M268 112l144 144-144 144M392 256H100"></path>
                                            </svg>
                                            Repellendus itaque sit
                                            quia consequuntur, unde
                                            veritatis. dolorum?
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div id="specification" class="tab_pane">
                            <div class="product-specification">
                                <table class="product-specification-data">
                                    <tbody>
                                        <tr class="product-specification-single backdrop-color">
                                            <td class="product-specification-title">
                                                Dimensions
                                            </td>
                                            <td class="product-specification-info">
                                                146.7 x 71.5 x 7.8
                                                mm
                                            </td>
                                        </tr>
                                        <tr class="product-specification-single">
                                            <td class="product-specification-title">
                                                Weight
                                            </td>
                                            <td class="product-specification-info">
                                                6.07 ounces (172
                                                grams)
                                            </td>
                                        </tr>
                                        <tr class="product-specification-single backdrop-color">
                                            <td class="product-specification-title">
                                                Display
                                            </td>
                                            <td class="product-specification-info">
                                                Super Retina XDR
                                                display 6.1‑inch
                                                (diagonal)
                                                all‑screen OLED
                                                display
                                                2532‑by‑1170-pixel
                                                resolution at 460
                                                ppi
                                            </td>
                                        </tr>
                                        <tr class="product-specification-single">
                                            <td class="product-specification-title">
                                                Chipset
                                            </td>
                                            <td class="product-specification-info">
                                                A15 Bionic
                                                chip-16‑core Neural
                                                Engine
                                            </td>
                                        </tr>
                                        <tr class="product-specification-single backdrop-color">
                                            <td class="product-specification-title">
                                                CPU
                                            </td>
                                            <td class="product-specification-info">
                                                6‑core CPU with 2
                                                performance and 4
                                                efficiency cores
                                            </td>
                                        </tr>
                                        <tr class="product-specification-single">
                                            <td class="product-specification-title">
                                                GPU
                                            </td>
                                            <td class="product-specification-info">
                                                5‑core GPU
                                            </td>
                                        </tr>
                                        <tr class="product-specification-single backdrop-color">
                                            <td class="product-specification-title">
                                                OS
                                            </td>
                                            <td class="product-specification-info">
                                                iOS 16 iOS is the
                                                world’s most
                                                personal and secure
                                                mobile operating
                                                system, packed with
                                                powerful features
                                                and designed to
                                                protect your
                                                privacy.
                                            </td>
                                        </tr>
                                        <tr class="product-specification-single">
                                            <td class="product-specification-title">
                                                Sensors
                                            </td>
                                            <td class="product-specification-info">
                                                Face ID Barometer
                                                High dynamic range
                                                gyro High-g
                                                accelerometer
                                                Proximity sensor
                                                Dual ambient light
                                                sensors
                                            </td>
                                        </tr>
                                        <tr class="product-specification-single backdrop-color">
                                            <td class="product-specification-title">
                                                Battery
                                            </td>
                                            <td class="product-specification-info">
                                                Built-in
                                                rechargeable
                                                lithium-ion battery
                                            </td>
                                        </tr>
                                        <tr class="product-specification-single">
                                            <td class="product-specification-title">
                                                Charging
                                            </td>
                                            <td class="product-specification-info">
                                                Up to 50% charge in
                                                around 30 minutes15
                                                with 20W adapter or
                                                higher (available
                                                separately)
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div id="videos" class="tab_pane">
                            <div class="product-video">
                                <div class="product-video-overview">
                                    <div class="product-video-thumb-img">
                                        <img alt="#" src="./assets/img/product/product-details/img-1.webp" />
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
                                            <img src="assets/img/other/comment-thumb1.png" alt="comment-thumb" />
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
                                                    <a class="glightbox" href="./assets/img/product/product-details/img-1.webp">
                                                        <img src="./assets/img/product/product-details/img-1.webp" alt="#" />
                                                    </a>
                                                </div>

                                                <div class="single-reviews-date-img">
                                                    <a class="glightbox" href="./assets/img/product/product-details/img-2.jpg">
                                                        <img src="./assets/img/product/product-details/img-2.jpg" alt="#" />
                                                    </a>
                                                </div>

                                                <div class="single-reviews-date-img">
                                                    <a class="glightbox" href="./assets/img/product/product-details/img-3.jpg">
                                                        <img src="./assets/img/product/product-details/img-3.jpg" alt="#" />
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
                                    <form action="#" method="post">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-12">
                                                <div class="form-group">
                                                    <label>Full
                                                        name</label><input tyepe="text" required="" name="full-name" />
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-12">
                                                <div class="form-group">
                                                    <label>Email
                                                        address</label><input tyepe="email" required="" name="email" />
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>Your
                                                        questions?</label><textarea name="your-question"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="product-question-form-btn">
                                                    <button type="submit" class="theme-btn">
                                                        Ask quesiton
                                                    </button>
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
                                    <div class="product-question-main-widget">
                                        <div class="product-question-single display-flex-top">
                                            <div class="product-question-img">
                                                <img alt="#" src="./assets/img/icons/question.svg" />
                                            </div>
                                            <div class="product-question-info">
                                                <h6 class="product-question-info-title">
                                                    Can I get a
                                                    discount if I
                                                    purchase this
                                                    phone with a
                                                    credit card?
                                                </h6>
                                                <div class="product-question-info-bottom">
                                                    <span class="product-question-name">Akash
                                                        Ahmed</span><span class="product-question-date">7 days
                                                        ago</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-answer-single display-flex-top">
                                            <div class="product-answer-img">
                                                <img alt="#" src="./assets/img/icons/answer.svg" />
                                            </div>
                                            <div class="product-answer-info">
                                                <h6 class="product-answer-info-title">
                                                    There is a 25%
                                                    discount if you
                                                    buy this phone
                                                    with a credit
                                                    card.
                                                </h6>
                                                <div class="product-answer-info-bottom">
                                                    <span class="product-answer-name"><a href="#" target="_blank">
                                                            Bestu.com.bd</a></span><span class="product-answer-date">7 days
                                                        ago</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-question-main-widget">
                                        <div class="product-question-single display-flex-top">
                                            <div class="product-question-img">
                                                <img alt="#" src="./assets/img/icons/question.svg" />
                                            </div>
                                            <div class="product-question-info">
                                                <h6 class="product-question-info-title">
                                                    Black color
                                                    available?
                                                </h6>
                                                <div class="product-question-info-bottom">
                                                    <span class="product-question-name">Rubel
                                                        Mahmud</span><span class="product-question-date">5 days
                                                        ago</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-answer-single display-flex-top">
                                            <div class="product-answer-img">
                                                <img alt="#" src="./assets/img/icons/answer.svg" />
                                            </div>
                                            <div class="product-answer-info">
                                                <h6 class="product-answer-info-title">
                                                    Yes sir. Please
                                                    visit our
                                                    showroom. Or
                                                    contact us:
                                                    +880123456790
                                                </h6>
                                                <div class="product-answer-info-bottom">
                                                    <span class="product-answer-name"><a href="#" target="_blank">
                                                            Bestu.com.bd</a></span><span class="product-answer-date">5 days
                                                        ago</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-question-main-widget">
                                        <div class="product-question-single display-flex-top">
                                            <div class="product-question-img">
                                                <img alt="#" src="./assets/img/icons/question.svg" />
                                            </div>
                                            <div class="product-question-info">
                                                <h6 class="product-question-info-title">
                                                    Are you willing
                                                    to accept cash
                                                    on delivery from
                                                    your company?
                                                </h6>
                                                <div class="product-question-info-bottom">
                                                    <span class="product-question-name">Jalal
                                                        uddin</span><span class="product-question-date">5 days
                                                        ago</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-answer-single display-flex-top">
                                            <div class="product-answer-img">
                                                <img alt="#" src="./assets/img/icons/answer.svg" />
                                            </div>
                                            <div class="product-answer-info">
                                                <h6 class="product-answer-info-title">
                                                    Yes sir. We
                                                    accept COD (Cash
                                                    on delivery)
                                                    service. Please
                                                    contact us:
                                                    +880123456790
                                                </h6>
                                                <div class="product-answer-info-bottom">
                                                    <span class="product-answer-name"><a href="#" target="_blank">
                                                            Bestu.com.bd</a></span><span class="product-answer-date">5 days
                                                        ago</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-question-main-widget">
                                        <div class="product-question-single display-flex-top">
                                            <div class="product-question-img">
                                                <img alt="#" src="./assets/img/icons/question.svg" />
                                            </div>
                                            <div class="product-question-info">
                                                <h6 class="product-question-info-title">
                                                    ভাই, ফোনের
                                                    ব্যাটারি হেলথ
                                                    কত?
                                                </h6>
                                                <div class="product-question-info-bottom">
                                                    <span class="product-question-name">Rubel
                                                        Mahmud</span><span class="product-question-date">5 days
                                                        ago</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-answer-single display-flex-top">
                                            <div class="product-answer-img">
                                                <img alt="#" src="./assets/img/icons/answer.svg" />
                                            </div>
                                            <div class="product-answer-info">
                                                <h6 class="product-answer-info-title">
                                                    এটা সম্পূর্ণ
                                                    ব্যান্ড নিউ ফোন
                                                    স্যার। ব্যাটারি
                                                    হেলথ ১০০%
                                                </h6>
                                                <div class="product-answer-info-bottom">
                                                    <span class="product-answer-name"><a href="#" target="_blank">
                                                            Bestu.com.bd</a></span><span class="product-answer-date">5 days
                                                        ago</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-question-main-widget">
                                        <div class="product-question-single display-flex-top">
                                            <div class="product-question-img">
                                                <img alt="#" src="./assets/img/icons/question.svg" />
                                            </div>
                                            <div class="product-question-info">
                                                <h6 class="product-question-info-title">
                                                    ব্লু কালারটি কি
                                                    আছে আপনাদের
                                                    কাছে? আর ২৫৬
                                                    জিবি লাষ্ট কত
                                                    রাখবেন?
                                                </h6>
                                                <div class="product-question-info-bottom">
                                                    <span class="product-question-name">Jalal
                                                        uddin</span><span class="product-question-date">18 days
                                                        ago</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-answer-single display-flex-top">
                                            <div class="product-answer-img">
                                                <img alt="#" src="./assets/img/icons/answer.svg" />
                                            </div>
                                            <div class="product-answer-info">
                                                <h6 class="product-answer-info-title">
                                                    স্যার, বর্তমানে
                                                    আমাদের কাছে ব্লু
                                                    কালারটি নেই। তবে
                                                    আপনি যদি অর্ডার
                                                    করেন, তাহলে আমার
                                                    ম্যানেজ করে দিতে
                                                    পারবো। বিস্তারিত
                                                    জানেত কল করুন এই
                                                    নাম্বারেঃ
                                                    +8801234567890
                                                </h6>
                                                <div class="product-answer-info-bottom">
                                                    <span class="product-answer-name"><a href="#" target="_blank">
                                                            Bestu.com.bd</a></span><span class="product-answer-date">18 days
                                                        ago</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-question-main-widget">
                                        <div class="product-question-single display-flex-top">
                                            <div class="product-question-img">
                                                <img alt="#" src="./assets/img/icons/question.svg" />
                                            </div>
                                            <div class="product-question-info">
                                                <h6 class="product-question-info-title">
                                                    Can I trust this
                                                    product to be
                                                    authentic?
                                                </h6>
                                                <div class="product-question-info-bottom">
                                                    <span class="product-question-name">Rubel
                                                        Mahmud</span><span class="product-question-date">5 days
                                                        ago</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-answer-single display-flex-top">
                                            <div class="product-answer-img">
                                                <img alt="#" src="./assets/img/icons/answer.svg" />
                                            </div>
                                            <div class="product-answer-info">
                                                <h6 class="product-answer-info-title">
                                                    Of course sir.
                                                    We provide 100%
                                                    genuine
                                                    products. For
                                                    more discuss,
                                                    Feel free to
                                                    call us.
                                                </h6>
                                                <div class="product-answer-info-bottom">
                                                    <span class="product-answer-name"><a href="#" target="_blank">
                                                            Bestu.com.bd</a></span><span class="product-answer-date">5 days
                                                        ago</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-question-main-widget">
                                        <div class="product-question-single display-flex-top">
                                            <div class="product-question-img">
                                                <img alt="#" src="./assets/img/icons/question.svg" />
                                            </div>
                                            <div class="product-question-info">
                                                <h6 class="product-question-info-title">
                                                    Are you willing
                                                    to accept cash
                                                    on delivery from
                                                    your company?
                                                </h6>
                                                <div class="product-question-info-bottom">
                                                    <span class="product-question-name">Jalal
                                                        uddin</span><span class="product-question-date">15 days
                                                        ago</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-answer-single display-flex-top">
                                            <div class="product-answer-img">
                                                <img alt="#" src="./assets/img/icons/answer.svg" />
                                            </div>
                                            <div class="product-answer-info">
                                                <h6 class="product-answer-info-title">
                                                    Yes sir. We
                                                    accept COD (Cash
                                                    on delivery)
                                                    service. Please
                                                    contact us:
                                                    +880123456790
                                                </h6>
                                                <div class="product-answer-info-bottom">
                                                    <span class="product-answer-name"><a href="#" target="_blank">
                                                            Bestu.com.bd</a></span><span class="product-answer-date">15 days
                                                        ago</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-question-main-widget">
                                        <div class="product-question-single display-flex-top">
                                            <div class="product-question-img">
                                                <img alt="#" src="./assets/img/icons/question.svg" />
                                            </div>
                                            <div class="product-question-info">
                                                <h6 class="product-question-info-title">
                                                    Black color
                                                    available?
                                                </h6>
                                                <div class="product-question-info-bottom">
                                                    <span class="product-question-name">Hamman</span><span class="product-question-date">10 days
                                                        ago</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-answer-single display-flex-top">
                                            <div class="product-answer-img">
                                                <img alt="#" src="./assets/img/icons/answer.svg" />
                                            </div>
                                            <div class="product-answer-info">
                                                <h6 class="product-answer-info-title">
                                                    Yes sir. Please
                                                    visit our
                                                    showroom. Or
                                                    contact us:
                                                    +880123456790
                                                </h6>
                                                <div class="product-answer-info-bottom">
                                                    <span class="product-answer-name"><a href="#" target="_blank">
                                                            Bestu.com.bd</a></span><span class="product-answer-date">10 days
                                                        ago</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-question-main-widget">
                                        <div class="product-question-single display-flex-top">
                                            <div class="product-question-img">
                                                <img alt="#" src="./assets/img/icons/question.svg" />
                                            </div>
                                            <div class="product-question-info">
                                                <h6 class="product-question-info-title">
                                                    Can I get a
                                                    discount if I
                                                    purchase this
                                                    phone with a
                                                    credit card?
                                                </h6>
                                                <div class="product-question-info-bottom">
                                                    <span class="product-question-name">Akash
                                                        Ahmed</span><span class="product-question-date">7 days
                                                        ago</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-answer-single display-flex-top">
                                            <div class="product-answer-img">
                                                <img alt="#" src="./assets/img/icons/answer.svg" />
                                            </div>
                                            <div class="product-answer-info">
                                                <h6 class="product-answer-info-title">
                                                    There is a 25%
                                                    discount if you
                                                    buy this phone
                                                    with a credit
                                                    card.
                                                </h6>
                                                <div class="product-answer-info-bottom">
                                                    <span class="product-answer-name"><a href="#" target="_blank">
                                                            Bestu.com.bd</a></span><span class="product-answer-date">7 days
                                                        ago</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-question-main-widget">
                                        <div class="product-question-single display-flex-top">
                                            <div class="product-question-img">
                                                <img alt="#" src="./assets/img/icons/question.svg" />
                                            </div>
                                            <div class="product-question-info">
                                                <h6 class="product-question-info-title">
                                                    What is the
                                                    process to buy
                                                    this phone?
                                                </h6>
                                                <div class="product-question-info-bottom">
                                                    <span class="product-question-name">Akash
                                                        Ahmed</span><span class="product-question-date">7 days
                                                        ago</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-answer-single display-flex-top">
                                            <div class="product-answer-img">
                                                <img alt="#" src="./assets/img/icons/answer.svg" />
                                            </div>
                                            <div class="product-answer-info">
                                                <h6 class="product-answer-info-title">
                                                    Just place a
                                                    order from our
                                                    website. Our
                                                    team will
                                                    contact you
                                                    ASAP.
                                                </h6>
                                                <div class="product-answer-info-bottom">
                                                    <span class="product-answer-name"><a href="#" target="_blank">
                                                            Bestu.com.bd</a></span><span class="product-answer-date">7 days
                                                        ago</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
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
                                </div>
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
            <h2 class="section__heading--maintitle">
                You may also like
            </h2>
        </div>
        <div class="product__section--inner product__swiper--column4__activation swiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="product__items">
                        <div class="product__items--thumbnail">
                            <a class="product__items--link" href="product-details.html">
                                <img class="product__items--img product__primary--img" src="./assets/img/product/electronics/all-product/img-1.webp" alt="product-img" />
                                <img class="product__items--img product__secondary--img" src="./assets/img/product/electronics/all-product/img-1.webp" alt="product-img" />
                            </a>
                            <div class="product__badge">
                                <span class="product__badge--items sale">Sale</span>
                            </div>
                        </div>
                        <div class="product__items--content">
                            <span class="product__items--content__subtitle">Electronics</span>
                            <h3 class="product__items--content__title h4">
                                <a href="product-details.html" class="product__items--content__subtitle">Transtec Super Inverter Air
                                    Conditioner | TRS-12ISE | 1
                                    Ton</a>
                            </h3>
                            <div class="product__items--price">
                                <span class="current__price">BDT 58,725</span>
                                <span class="price__divided"></span>
                                <span class="old__price">BDT 67,500</span>
                            </div>
                            <ul class="product__items--action d-flex">
                                <li class="product__items--action__list">
                                    <a class="product__items--action__btn add__to--cart" href="#">
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
                <div class="swiper-slide">
                    <div class="product__items">
                        <div class="product__items--thumbnail">
                            <a class="product__items--link" href="product-details.html">
                                <img class="product__items--img product__primary--img" src="./assets/img/product/electronics/all-product/img-2.webp" alt="product-img" />
                                <img class="product__items--img product__secondary--img" src="./assets/img/product/electronics/all-product/img-2.webp" alt="product-img" />
                            </a>
                            <div class="product__badge">
                                <span class="product__badge--items sale">Sale</span>
                            </div>
                        </div>
                        <div class="product__items--content">
                            <span class="product__items--content__subtitle">Electronics</span>
                            <h3 class="product__items--content__title h4">
                                <a href="product-details.html" class="product__items--content__subtitle">Transtec Super Inverter Air
                                    Conditioner | TRS-12ISE | 1
                                    Ton</a>
                            </h3>
                            <div class="product__items--price">
                                <span class="current__price">BDT 58,725</span>
                                <span class="price__divided"></span>
                                <span class="old__price">BDT 67,500</span>
                            </div>
                            <ul class="product__items--action d-flex">
                                <li class="product__items--action__list">
                                    <a class="product__items--action__btn add__to--cart" href="#">
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
                <div class="swiper-slide">
                    <div class="product__items">
                        <div class="product__items--thumbnail">
                            <a class="product__items--link" href="product-details.html">
                                <img class="product__items--img product__primary--img" src="./assets/img/product/electronics/all-product/img-3.webp" alt="product-img" />
                                <img class="product__items--img product__secondary--img" src="./assets/img/product/electronics/all-product/img-3.webp" alt="product-img" />
                            </a>
                            <div class="product__badge">
                                <span class="product__badge--items sale">Sale</span>
                            </div>
                        </div>
                        <div class="product__items--content">
                            <span class="product__items--content__subtitle">Electronics</span>
                            <h3 class="product__items--content__title h4">
                                <a href="product-details.html" class="product__items--content__subtitle">Transtec Super Inverter Air
                                    Conditioner | TRS-12ISE | 1
                                    Ton</a>
                            </h3>
                            <div class="product__items--price">
                                <span class="current__price">BDT 58,725</span>
                                <span class="price__divided"></span>
                                <span class="old__price">BDT 67,500</span>
                            </div>
                            <ul class="product__items--action d-flex">
                                <li class="product__items--action__list">
                                    <a class="product__items--action__btn add__to--cart" href="#">
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
                <div class="swiper-slide">
                    <div class="product__items">
                        <div class="product__items--thumbnail">
                            <a class="product__items--link" href="product-details.html">
                                <img class="product__items--img product__primary--img" src="./assets/img/product/electronics/all-product/img-5.webp" alt="product-img" />
                                <img class="product__items--img product__secondary--img" src="./assets/img/product/electronics/all-product/img-5.webp" alt="product-img" />
                            </a>
                            <div class="product__badge">
                                <span class="product__badge--items sale">Sale</span>
                            </div>
                        </div>
                        <div class="product__items--content">
                            <span class="product__items--content__subtitle">Electronics</span>
                            <h3 class="product__items--content__title h4">
                                <a href="product-details.html" class="product__items--content__subtitle">Transtec Super Inverter Air
                                    Conditioner | TRS-12ISE | 1
                                    Ton</a>
                            </h3>
                            <div class="product__items--price">
                                <span class="current__price">BDT 58,725</span>
                                <span class="price__divided"></span>
                                <span class="old__price">BDT 67,500</span>
                            </div>
                            <ul class="product__items--action d-flex">
                                <li class="product__items--action__list">
                                    <a class="product__items--action__btn add__to--cart" href="#">
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
                <div class="swiper-slide">
                    <div class="product__items">
                        <div class="product__items--thumbnail">
                            <a class="product__items--link" href="product-details.html">
                                <img class="product__items--img product__primary--img" src="./assets/img/product/electronics/all-product/img-6.webp" alt="product-img" />
                                <img class="product__items--img product__secondary--img" src="./assets/img/product/electronics/all-product/img-6.webp" alt="product-img" />
                            </a>
                            <div class="product__badge">
                                <span class="product__badge--items sale">Sale</span>
                            </div>
                        </div>
                        <div class="product__items--content">
                            <span class="product__items--content__subtitle">Electronics</span>
                            <h3 class="product__items--content__title h4">
                                <a href="product-details.html" class="product__items--content__subtitle">Transtec Super Inverter Air
                                    Conditioner | TRS-12ISE | 1
                                    Ton</a>
                            </h3>
                            <div class="product__items--price">
                                <span class="current__price">BDT 58,725</span>
                                <span class="price__divided"></span>
                                <span class="old__price">BDT 67,500</span>
                            </div>
                            <ul class="product__items--action d-flex">
                                <li class="product__items--action__list">
                                    <a class="product__items--action__btn add__to--cart" href="#">
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
                <div class="swiper-slide">
                    <div class="product__items">
                        <div class="product__items--thumbnail">
                            <a class="product__items--link" href="product-details.html">
                                <img class="product__items--img product__primary--img" src="./assets/img/product/electronics/all-product/img-7.webp" alt="product-img" />
                                <img class="product__items--img product__secondary--img" src="./assets/img/product/electronics/all-product/img-7.webp" alt="product-img" />
                            </a>
                            <div class="product__badge">
                                <span class="product__badge--items sale">Sale</span>
                            </div>
                        </div>
                        <div class="product__items--content">
                            <span class="product__items--content__subtitle">Electronics</span>
                            <h3 class="product__items--content__title h4">
                                <a href="product-details.html" class="product__items--content__subtitle">Transtec Super Inverter Air
                                    Conditioner | TRS-12ISE | 1
                                    Ton</a>
                            </h3>
                            <div class="product__items--price">
                                <span class="current__price">BDT 58,725</span>
                                <span class="price__divided"></span>
                                <span class="old__price">BDT 67,500</span>
                            </div>
                            <ul class="product__items--action d-flex">
                                <li class="product__items--action__list">
                                    <a class="product__items--action__btn add__to--cart" href="#">
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