@extends('frontend.master')
@section('content')
<!-- Start breadcrumb section -->
<section class="breadcrumb__section breadcrumb__bg">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8 col-lg-8 col-12">
        <div class="breadcrumb__content style-2 text-center">
          <h1 class="breadcrumb__content--title mb-25">Contact Us</h1>
          <ul class="breadcrumb__content--menu d-flex justify-content-center">
            <li class="breadcrumb__content--menu__items">
              <a href="{{route('frontend.index')}}">Home</a>
            </li>
            <li class="breadcrumb__content--menu__items">
              <span>Contact Us</span>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End breadcrumb section -->

<!-- Start contact section -->



<section class="contact__section section--padding">
  <div class="container">
    <div class="section__heading text-center mb-40">
      <h2 class="section__heading--maintitle">Get In Touch</h2>
    </div>
    <div class="main__contact--area position__relative">

      <div class="contact__form">
        <h3 class="contact__form--title mb-40">Contact Me</h3>


        <form class="contact__form--inner" action="{{ route('contact.submit') }}" method="POST" enctype="multipart/form-data">
          @csrf

          <div class="row">
            <div class="col-lg-6 col-md-6">
              <div class="contact__form--list mb-20">
                <label class="contact__form--label" for="input1"> {{ lan_key('name') }}
                  <span class="contact__form--label__star">*</span></label>
                <input class="contact__form--input" name="name" id="input1" placeholder="Your First Name" type="text" />
              </div>
            </div>

            <div class="col-lg-6 col-md-6">
              <div class="contact__form--list mb-20">
                <label class="contact__form--label" for="input2"> Company Name
                  <span class="contact__form--label__star">*</span></label>
                <input class="contact__form--input" name="company_name" id="input2" placeholder="Your Company name" type="text" />
              </div>
            </div>

            <div class="col-lg-6 col-md-6">
              <div class="contact__form--list mb-20">
                <label class="contact__form--label" for="input3"> {{ lan_key('phone_number') }}
                  <span class="contact__form--label__star">*</span></label>
                <input class="contact__form--input" name="phone" id="input3" placeholder="Phone number" type="text" />
              </div>
            </div>
            <div class="col-lg-6 col-md-6">
              <div class="contact__form--list mb-20">
                <label class="contact__form--label" for="input4">Email
                  <span class="contact__form--label__star">*</span></label>
                <input class="contact__form--input" name="email" id="input4" placeholder="Email" type="email" />
              </div>
            </div>
            <div class="col-12">
              <div class="contact__form--list mb-15">
                <label class="contact__form--label" for="input5">Write Your Message
                  <span class="contact__form--label__star">*</span></label>
                <textarea class="contact__form--textarea" name="message" id="input5" placeholder="Write Your Message"></textarea>
              </div>
            </div>



          </div>
          <button class="contact__form--btn primary__btn" type="submit">
            Send message
          </button>
        </form>

      </div>




      <!-- <div class="contact__info border-radius-5">
        <div class="contact__info--items">
          <h3 class="contact__info--content__title text-white mb-15">
            Contact Us
          </h3>
          <div class="contact__info--items__inner d-flex">
            <div class="contact__info--icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="31.568" height="31.128" viewBox="0 0 31.568 31.128">
                <path id="ic_phone_forwarded_24px" d="M26.676,16.564l7.892-7.782L26.676,1V5.669H20.362v6.226h6.314Zm3.157,7a18.162,18.162,0,0,1-5.635-.887,1.627,1.627,0,0,0-1.61.374l-3.472,3.424a23.585,23.585,0,0,1-10.4-10.257l3.472-3.44a1.48,1.48,0,0,0,.395-1.556,17.457,17.457,0,0,1-.9-5.556A1.572,1.572,0,0,0,10.1,4.113H4.578A1.572,1.572,0,0,0,3,5.669,26.645,26.645,0,0,0,29.832,32.128a1.572,1.572,0,0,0,1.578-1.556V25.124A1.572,1.572,0,0,0,29.832,23.568Z" transform="translate(-3 -1)" fill="currentColor" />
              </svg>
            </div>
            <div class="contact__info--content">
              <p class="contact__info--content__desc text-white">
                Change the design through a range <br />
                <a href="tel:+01234-567890">+01234-567890</a>
                <a href="tel:++01234-5688765">+01234-5688765</a>
              </p>
            </div>
          </div>
        </div>
        <div class="contact__info--items">
          <h3 class="contact__info--content__title text-white mb-15">
            Email Address
          </h3>
          <div class="contact__info--items__inner d-flex">
            <div class="contact__info--icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="31.57" height="31.13" viewBox="0 0 31.57 31.13">
                <path id="ic_email_24px" d="M30.413,4H5.157C3.421,4,2.016,5.751,2.016,7.891L2,31.239c0,2.14,1.421,3.891,3.157,3.891H30.413c1.736,0,3.157-1.751,3.157-3.891V7.891C33.57,5.751,32.149,4,30.413,4Zm0,7.783L17.785,21.511,5.157,11.783V7.891l12.628,9.728L30.413,7.891Z" transform="translate(-2 -4)" fill="currentColor" />
              </svg>
            </div>
            <div class="contact__info--content">
              <p class="contact__info--content__desc text-white">
                <a href="mailto:info@example.com">info@example.com</a>
                <br />
                <a href="mailto:info@example.com">info@example.com</a>
              </p>
            </div>
          </div>
        </div>
        <div class="contact__info--items">
          <h3 class="contact__info--content__title text-white mb-15">
            Office Location
          </h3>
          <div class="contact__info--items__inner d-flex">
            <div class="contact__info--icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="31.57" height="31.13" viewBox="0 0 31.57 31.13">
                <path id="ic_account_balance_24px" d="M5.323,14.341V24.718h4.985V14.341Zm9.969,0V24.718h4.985V14.341ZM2,32.13H33.57V27.683H2ZM25.262,14.341V24.718h4.985V14.341ZM17.785,1,2,8.412v2.965H33.57V8.412Z" transform="translate(-2 -1)" fill="currentColor" />
              </svg>
            </div>
            <div class="contact__info--content">
              <p class="contact__info--content__desc text-white">
                123 Stree New York City , United States Of America NY
                750065.
              </p>
            </div>
          </div>
        </div>
        <div class="contact__info--items">
          <h3 class="contact__info--content__title text-white mb-15">
            Follow Us
          </h3>
          <ul class="contact__info--social d-flex">
            <li class="contact__info--social__list">
              <a class="contact__info--social__icon" target="_blank" href="https://www.facebook.com/">
                <svg xmlns="http://www.w3.org/2000/svg" width="7.667" height="16.524" viewBox="0 0 7.667 16.524">
                  <path data-name="Path 237" d="M967.495,353.678h-2.3v8.253h-3.437v-8.253H960.13V350.77h1.624v-1.888a4.087,4.087,0,0,1,.264-1.492,2.9,2.9,0,0,1,1.039-1.379,3.626,3.626,0,0,1,2.153-.6l2.549.019v2.833h-1.851a.732.732,0,0,0-.472.151.8.8,0,0,0-.246.642v1.719H967.8Z" transform="translate(-960.13 -345.407)" fill="currentColor"></path>
                </svg>
                <span class="visually-hidden">Facebook</span>
              </a>
            </li>
            <li class="contact__info--social__list">
              <a class="contact__info--social__icon" target="_blank" href="https://twitter.com/">
                <svg xmlns="http://www.w3.org/2000/svg" width="16.489" height="13.384" viewBox="0 0 16.489 13.384">
                  <path data-name="Path 303" d="M966.025,1144.2v.433a9.783,9.783,0,0,1-.621,3.388,10.1,10.1,0,0,1-1.845,3.087,9.153,9.153,0,0,1-3.012,2.259,9.825,9.825,0,0,1-4.122.866,9.632,9.632,0,0,1-2.748-.4,9.346,9.346,0,0,1-2.447-1.11q.4.038.809.038a6.723,6.723,0,0,0,2.24-.376,7.022,7.022,0,0,0,1.958-1.054,3.379,3.379,0,0,1-1.958-.687,3.259,3.259,0,0,1-1.186-1.666,3.364,3.364,0,0,0,.621.056,3.488,3.488,0,0,0,.885-.113,3.267,3.267,0,0,1-1.374-.631,3.356,3.356,0,0,1-.969-1.186,3.524,3.524,0,0,1-.367-1.5v-.057a3.172,3.172,0,0,0,1.544.433,3.407,3.407,0,0,1-1.1-1.214,3.308,3.308,0,0,1-.4-1.609,3.362,3.362,0,0,1,.452-1.694,9.652,9.652,0,0,0,6.964,3.538,3.911,3.911,0,0,1-.075-.772,3.293,3.293,0,0,1,.452-1.694,3.409,3.409,0,0,1,1.233-1.233,3.257,3.257,0,0,1,1.685-.461,3.351,3.351,0,0,1,2.466,1.073,6.572,6.572,0,0,0,2.146-.828,3.272,3.272,0,0,1-.574,1.083,3.477,3.477,0,0,1-.913.8,6.869,6.869,0,0,0,1.958-.546A7.074,7.074,0,0,1,966.025,1144.2Z" transform="translate(-951.23 -1140.849)" fill="currentColor"></path>
                </svg>
                <span class="visually-hidden">Twitter</span>
              </a>
            </li>
            <li class="contact__info--social__list">
              <a class="contact__info--social__icon" target="_blank" href="https://www.instagram.com/">
                <svg xmlns="http://www.w3.org/2000/svg" width="16.497" height="16.492" viewBox="0 0 19.497 19.492">
                  <path data-name="Icon awesome-instagram" d="M9.747,6.24a5,5,0,1,0,5,5A4.99,4.99,0,0,0,9.747,6.24Zm0,8.247A3.249,3.249,0,1,1,13,11.238a3.255,3.255,0,0,1-3.249,3.249Zm6.368-8.451A1.166,1.166,0,1,1,14.949,4.87,1.163,1.163,0,0,1,16.115,6.036Zm3.31,1.183A5.769,5.769,0,0,0,17.85,3.135,5.807,5.807,0,0,0,13.766,1.56c-1.609-.091-6.433-.091-8.042,0A5.8,5.8,0,0,0,1.64,3.13,5.788,5.788,0,0,0,.065,7.215c-.091,1.609-.091,6.433,0,8.042A5.769,5.769,0,0,0,1.64,19.341a5.814,5.814,0,0,0,4.084,1.575c1.609.091,6.433.091,8.042,0a5.769,5.769,0,0,0,4.084-1.575,5.807,5.807,0,0,0,1.575-4.084c.091-1.609.091-6.429,0-8.038Zm-2.079,9.765a3.289,3.289,0,0,1-1.853,1.853c-1.283.509-4.328.391-5.746.391S5.28,19.341,4,18.837a3.289,3.289,0,0,1-1.853-1.853c-.509-1.283-.391-4.328-.391-5.746s-.113-4.467.391-5.746A3.289,3.289,0,0,1,4,3.639c1.283-.509,4.328-.391,5.746-.391s4.467-.113,5.746.391a3.289,3.289,0,0,1,1.853,1.853c.509,1.283.391,4.328.391,5.746S17.855,15.705,17.346,16.984Z" transform="translate(0.004 -1.492)" fill="currentColor" />
                </svg>
                <span class="visually-hidden">Instagram</span>
              </a>
            </li>
            <li class="contact__info--social__list">
              <a class="contact__info--social__icon" target="_blank" href="https://www.youtube.com/">
                <svg xmlns="http://www.w3.org/2000/svg" width="16.49" height="11.582" viewBox="0 0 16.49 11.582">
                  <path data-name="Path 321" d="M967.759,1365.592q0,1.377-.019,1.717-.076,1.114-.151,1.622a3.981,3.981,0,0,1-.245.925,1.847,1.847,0,0,1-.453.717,2.171,2.171,0,0,1-1.151.6q-3.585.265-7.641.189-2.377-.038-3.387-.085a11.337,11.337,0,0,1-1.5-.142,2.206,2.206,0,0,1-1.113-.585,2.562,2.562,0,0,1-.528-1.037,3.523,3.523,0,0,1-.141-.585c-.032-.2-.06-.5-.085-.906a38.894,38.894,0,0,1,0-4.867l.113-.925a4.382,4.382,0,0,1,.208-.906,2.069,2.069,0,0,1,.491-.755,2.409,2.409,0,0,1,1.113-.566,19.2,19.2,0,0,1,2.292-.151q1.82-.056,3.953-.056t3.952.066q1.821.067,2.311.142a2.3,2.3,0,0,1,.726.283,1.865,1.865,0,0,1,.557.49,3.425,3.425,0,0,1,.434,1.019,5.72,5.72,0,0,1,.189,1.075q0,.095.057,1C967.752,1364.1,967.759,1364.677,967.759,1365.592Zm-7.6.925q1.49-.754,2.113-1.094l-4.434-2.339v4.66Q958.609,1367.311,960.156,1366.517Z" transform="translate(-951.269 -1359.8)" fill="currentColor"></path>
                </svg>
                <span class="visually-hidden">Youtube</span>
              </a>
            </li>
          </ul>
        </div>
      </div> -->

      <div class="contact__info border-radius-5">
        <div class="contact__info--items">
          <h3 class="contact__info--content__title text-white mb-15">
            Contact Us
          </h3>
          <div class="contact__info--items__inner d-flex">
            <div class="contact__info--icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="31.568" height="31.128" viewBox="0 0 31.568 31.128">
                <path id="ic_phone_forwarded_24px" d="M26.676,16.564l7.892-7.782L26.676,1V5.669H20.362v6.226h6.314Zm3.157,7a18.162,18.162,0,0,1-5.635-.887,1.627,1.627,0,0,0-1.61.374l-3.472,3.424a23.585,23.585,0,0,1-10.4-10.257l3.472-3.44a1.48,1.48,0,0,0,.395-1.556,17.457,17.457,0,0,1-.9-5.556A1.572,1.572,0,0,0,10.1,4.113H4.578A1.572,1.572,0,0,0,3,5.669,26.645,26.645,0,0,0,29.832,32.128a1.572,1.572,0,0,0,1.578-1.556V25.124A1.572,1.572,0,0,0,29.832,23.568Z" transform="translate(-3 -1)" fill="currentColor" />
              </svg>
            </div>
            <div class="contact__info--content">
              <p class="contact__info--content__desc text-white">
                {{ $generalInfo->contact }}
              </p>
            </div>
          </div>
        </div>
        <div class="contact__info--items">
          <h3 class="contact__info--content__title text-white mb-15">
            Email Address
          </h3>
          <div class="contact__info--items__inner d-flex">
            <div class="contact__info--icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="31.57" height="31.13" viewBox="0 0 31.57 31.13">
                <path id="ic_email_24px" d="M30.413,4H5.157C3.421,4,2.016,5.751,2.016,7.891L2,31.239c0,2.14,1.421,3.891,3.157,3.891H30.413c1.736,0,3.157-1.751,3.157-3.891V7.891C33.57,5.751,32.149,4,30.413,4Zm0,7.783L17.785,21.511,5.157,11.783V7.891l12.628,9.728L30.413,7.891Z" transform="translate(-2 -4)" fill="currentColor" />
              </svg>
            </div>
            <div class="contact__info--content">
              <p class="contact__info--content__desc text-white">
                <a href="mailto:{{ $generalInfo->email }}">{{ $generalInfo->email }}</a>
              </p>
            </div>
          </div>
        </div>
        <div class="contact__info--items">
          <h3 class="contact__info--content__title text-white mb-15">
            Office Location
          </h3>
          <div class="contact__info--items__inner d-flex">
            <div class="contact__info--icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="31.57" height="31.13" viewBox="0 0 31.57 31.13">
                <path id="ic_account_balance_24px" d="M5.323,14.341V24.718h4.985V14.341Zm9.969,0V24.718h4.985V14.341ZM2,32.13H33.57V27.683H2ZM25.262,14.341V24.718h4.985V14.341ZM17.785,1,2,8.412v2.965H33.57V8.412Z" transform="translate(-2 -1)" fill="currentColor" />
              </svg>
            </div>
            <div class="contact__info--content">
              <p class="contact__info--content__desc text-white">
                {{ $generalInfo->address }}
              </p>
            </div>
          </div>
        </div>
        <div class="contact__info--items">
          <h3 class="contact__info--content__title text-white mb-15">
            Follow Us
          </h3>
          <ul class="contact__info--social d-flex">
            <li class="contact__info--social__list">
              <a class="contact__info--social__icon" target="_blank" href="{{ $generalInfo->facebook }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="7.667" height="16.524" viewBox="0 0 7.667 16.524">
                  <path data-name="Path 237" d="M967.495,353.678h-2.3v8.253h-3.437v-8.253H960.13V350.77h1.624v-1.888a4.087,4.087,0,0,1,.264-1.492,2.9,2.9,0,0,1,1.039-1.379,3.626,3.626,0,0,1,2.153-.6l2.549.019v2.833h-1.851a.732.732,0,0,0-.472.151.8.8,0,0,0-.246.642v1.719H967.8Z" transform="translate(-960.13 -345.407)" fill="currentColor"></path>
                </svg>
                <span class="visually-hidden">Facebook</span>
              </a>
            </li>
            <li class="contact__info--social__list">
              <a class="contact__info--social__icon" target="_blank" href="{{ $generalInfo->twitter }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="16.489" height="13.384" viewBox="0 0 16.489 13.384">
                  <path data-name="Path 303" d="M966.025,1144.2v.433a9.783,9.783,0,0,1-.621,3.388,10.1,10.1,0,0,1-1.845,3.087,9.153,9.153,0,0,1-3.012,2.259,9.825,9.825,0,0,1-4.122.866,9.632,9.632,0,0,1-2.748-.4,9.346,9.346,0,0,1-2.447-1.11q.4.038.809.038a6.723,6.723,0,0,0,2.24-.376,7.022,7.022,0,0,0,1.958-1.054,3.379,3.379,0,0,1-1.958-.687,3.259,3.259,0,0,1-1.186-1.666,3.364,3.364,0,0,0,.621.056,3.488,3.488,0,0,0,.885-.113,3.267,3.267,0,0,1-1.374-.631,3.415,3.415,0,0,1-.934-1.062,3.253,3.253,0,0,1-.34-1.492v-.038a3.282,3.282,0,0,0,1.492.443,3.309,3.309,0,0,1-1.06-1.175,3.388,3.388,0,0,1-.4-1.617,3.327,3.327,0,0,1,.453-1.684,9.353,9.353,0,0,0,2.36,2.24,9.152,9.152,0,0,0,2.826,1.1,9.635,9.635,0,0,0,3.341.226,3.506,3.506,0,0,1-.113-.809,3.385,3.385,0,0,1,.94-2.34,3.152,3.152,0,0,1,2.33-.953,3.2,3.2,0,0,1,2.384,1.034,6.506,6.506,0,0,0,2.113-.809,3.4,3.4,0,0,1-1.492,1.831,6.728,6.728,0,0,0,1.881-.518A7.433,7.433,0,0,1,966.025,1144.2Z" transform="translate(-949.537 -1140.937)" fill="currentColor"></path>
                </svg>
                <span class="visually-hidden">Twitter</span>
              </a>
            </li>
            <li class="contact__info--social__list">
              <a class="contact__info--social__icon" target="_blank" href="{{ $generalInfo->instagram }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="16.489" height="16.489" viewBox="0 0 16.489 16.489">
                  <path id="ic_instagram_24px" d="M11.245,6.276a5.013,5.013,0,1,0,5.013,5.013A5.01,5.01,0,0,0,11.245,6.276Zm0,8.278a3.265,3.265,0,1,1,3.265-3.265A3.266,3.266,0,0,1,11.245,14.553Zm6.4-8.413a1.17,1.17,0,1,1-1.17-1.17A1.172,1.172,0,0,1,17.646,6.14Zm3.327,1.186a4.82,4.82,0,0,0-1.315-3.413,4.861,4.861,0,0,0-3.413-1.315c-1.346-.077-5.374-.077-6.72,0a4.849,4.849,0,0,0-3.413,1.308A4.849,4.849,0,0,0,4.8,7.326c-.077,1.346-.077,5.374,0,6.72a4.82,4.82,0,0,0,1.315,3.413,4.888,4.888,0,0,0,3.413,1.315c1.346.077,5.374.077,6.72,0a4.82,4.82,0,0,0,3.413-1.315,4.861,4.861,0,0,0,1.315-3.413c.077-1.346.077-5.368,0-6.713Zm-2.1,8.145a2.747,2.747,0,0,1-1.548,1.548c-1.071.425-3.612.327-4.737.327s-3.67.094-4.737-.327a2.747,2.747,0,0,1-1.548-1.548c-.425-1.071-.327-3.612-.327-4.737s-.094-3.67.327-4.737a2.747,2.747,0,0,1,1.548-1.548c1.071-.425,3.612-.327,4.737-.327s3.67-.094,4.737.327a2.747,2.747,0,0,1,1.548,1.548c.425,1.071.327,3.612.327,4.737S19.473,14.2,19.448,15.27Z" transform="translate(-4.8 -2.8)" fill="currentColor"></path>
                </svg>
                <span class="visually-hidden">Instagram</span>
              </a>
            </li>
            <li class="contact__info--social__list">
              <a class="contact__info--social__icon" target="_blank" href="{{ $generalInfo->youtube }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="16.489" height="16.489" viewBox="0 0 16.489 16.489">
                  <path id="Path_230" data-name="Path 230" d="M8.246,18.957h0a1.065,1.065,0,0,1-.505-.127L5.22,17.43a1.062,1.062,0,0,1-.556-.933V15.429a1.062,1.062,0,0,1,.556-.933l2.52-1.4a1.063,1.063,0,0,1,1.061,0l2.52,1.4a1.062,1.062,0,0,1,.556.933v1.068a1.062,1.062,0,0,1-.556.933l-2.52,1.4A1.065,1.065,0,0,1,8.246,18.957Zm-2.52-4.254v1.068L8.246,17.4l2.52-1.4V15.429L8.246,14.026Z" transform="translate(-2.32 -3.309)" fill="currentColor" />
                  <path id="Path_231" data-name="Path 231" d="M12.489,4.8H4.8A2.8,2.8,0,0,0,2,7.6v7.689a2.8,2.8,0,0,0,2.8,2.8h7.689a2.8,2.8,0,0,0,2.8-2.8V7.6A2.8,2.8,0,0,0,12.489,4.8ZM14.288,15.289a1.8,1.8,0,0,1-1.8,1.8H4.8a1.8,1.8,0,0,1-1.8-1.8V7.6a1.8,1.8,0,0,1,1.8-1.8h7.689a1.8,1.8,0,0,1,1.8,1.8Z" transform="translate(-2 -2)" fill="currentColor" />
                </svg>
                <span class="visually-hidden">Youtube</span>
              </a>
            </li>
          </ul>
        </div>
      </div>




    </div>
  </div>
</section>



<!-- End contact section -->

<!-- Start contact map area -->
<div class="contact__map--area pt-0">
  <iframe class="contact__map--iframe" src="{{$generalInfo->google_map_link}}" style="border: 0" allowfullscreen="" loading="lazy"></iframe>
</div>
<!-- End contact map area -->
@endsection
