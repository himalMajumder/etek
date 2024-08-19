@extends('frontend.master')
@section('content') <!-- Start breadcrumb section -->
<section class="breadcrumb__section breadcrumb__bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-lg-8 col-12">
                <div class="breadcrumb__content style-2 text-center">
                    <h1 class="breadcrumb__content--title mb-25">{{ lan_key('faq') }}</h1>
                    <ul class="breadcrumb__content--menu d-flex justify-content-center">
                        <li class="breadcrumb__content--menu__items">
                            <a href="{{route('frontend.index')}}">{{ lan_key('home') }}</a>
                        </li>
                        <li class="breadcrumb__content--menu__items">
                            <span>{{ lan_key('faq') }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End breadcrumb section -->

<!-- faq page section start -->
<section class="faq__section section--padding">
    <div class="container">
        <div class="faq__section--inner">


            <div class="face__step one border-bottom" id="accordionExample">
                <h2 class="face__step--title h3 mb-30">{{ lan_key('faq') }} (FAQ) </h2>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="accordion__container">
                            @foreach($faqs as $index => $faq)
                            @if($index % 2 == 0) {{-- Split the FAQs into two columns --}}
                            <div class="accordion__items">
                                <h2 class="accordion__items--title">
                                    <button class="faq__accordion--btn accordion__items--button">
                                        {{ $faq->question }}
                                        <svg class="accordion__items--button__icon" xmlns="http://www.w3.org/2000/svg" width="20.355" height="13.394" viewBox="0 0 512 512">
                                            <path d="M98 190.06l139.78 163.12a24 24 0 0036.44 0L414 190.06c13.34-15.57 2.28-39.62-18.22-39.62h-279.6c-20.5 0-31.56 24.05-18.18 39.62z" fill="currentColor" />
                                        </svg>
                                    </button>
                                </h2>
                                <div class="accordion__items--body">
                                    <p class="accordion__items--body__desc">
                                        {{ $faq->answer }}
                                    </p>
                                </div>
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="accordion__container">
                            @foreach($faqs as $index => $faq)
                            @if($index % 2 != 0) {{-- Split the FAQs into two columns --}}
                            <div class="accordion__items">
                                <h2 class="accordion__items--title">
                                    <button class="faq__accordion--btn accordion__items--button">
                                        {{ $faq->question }}
                                        <svg class="accordion__items--button__icon" xmlns="http://www.w3.org/2000/svg" width="20.355" height="13.394" viewBox="0 0 512 512">
                                            <path d="M98 190.06l139.78 163.12a24 24 0 0036.44 0L414 190.06c13.34-15.57 2.28-39.62-18.22-39.62h-279.6c-20.5 0-31.56 24.05-18.18 39.62z" fill="currentColor" />
                                        </svg>
                                    </button>
                                </h2>
                                <div class="accordion__items--body">
                                    <p class="accordion__items--body__desc">
                                        {{ $faq->answer }}
                                    </p>
                                </div>
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</section>
<!-- faq page section end -->
@endsection
