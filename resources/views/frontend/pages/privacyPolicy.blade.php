@extends('frontend.master')
@section('content')


<!-- Start breadcrumb section -->
<section class="breadcrumb__section breadcrumb__bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-lg-8 col-12">
                <div class="breadcrumb__content style-2 text-center">
                    <h1 class="breadcrumb__content--title mb-25">
                        {{ lan_key('privacy_policy') }}
                    </h1>
                    <ul class="breadcrumb__content--menu d-flex justify-content-center">
                        <li class="breadcrumb__content--menu__items">
                            <a href="{{route('frontend.index')}}"> {{ lan_key('home') }}</a>
                        </li>
                        <li class="breadcrumb__content--menu__items">
                            <span> {{ lan_key('privacy_policy') }} </span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End breadcrumb section -->

<!-- Start privacy policy section -->
<div class="privacy__policy--section section--padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="privacy__policy--content">
                    {!! $privacyPolicy->privacy_policy !!}
                </div>

            </div>
        </div>
    </div>
</div>
<!-- End privacy policy section -->

@endsection
