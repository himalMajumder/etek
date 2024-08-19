@extends('frontend.master')
@section('content')
<!-- Start breadcrumb section -->
<section class="breadcrumb__section breadcrumb__bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-lg-8 col-12">
                <div class="breadcrumb__content style-2 text-center">
                    <h1 class="breadcrumb__content--title mb-25">All Brands</h1>
                    <ul class="breadcrumb__content--menu d-flex justify-content-center">
                        <li class="breadcrumb__content--menu__items">
                            <a href="{{route('frontend.index')}}">Home</a>
                        </li>
                        <li class="breadcrumb__content--menu__items">
                            <span>Brand</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End breadcrumb section -->

<!-- Brand Page Section -->
<section class="brand-page section--padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="brand-page-wrapper">


                    @foreach ($brands as $brand )
                    <a href="#" class="single-brand">
                        <img src="{{ url(env('ADMIN_URL') . '/' . $brand->logo) }}" alt="#" />
                    </a>
                    @endforeach




                    <!-- <a href="#" class="single-brand">
                        <img src="./assets/img/brand/Haiko.webp" alt="#" />
                    </a>
                    <a href="#" class="single-brand">
                        <img src="./assets/img/brand/Konka.webp" alt="#" />
                    </a>
                    <a href="#" class="single-brand">
                        <img src="./assets/img/brand/Gree.webp" alt="#" />
                    </a>
                    <a href="#" class="single-brand">
                        <img src="./assets/img/brand/Haiko.webp" alt="#" />
                    </a>
                    <a href="#" class="single-brand">
                        <img src="./assets/img/brand/Konka.webp" alt="#" />
                    </a>
                    <a href="#" class="single-brand">
                        <img src="./assets/img/brand/Gree.webp" alt="#" />
                    </a>
                    <a href="#" class="single-brand">
                        <img src="./assets/img/brand/Haiko.webp" alt="#" />
                    </a>
                    <a href="#" class="single-brand">
                        <img src="./assets/img/brand/Konka.webp" alt="#" />
                    </a>
                    <a href="#" class="single-brand">
                        <img src="./assets/img/brand/Gree.webp" alt="#" />
                    </a>
                    <a href="#" class="single-brand">
                        <img src="./assets/img/brand/Haiko.webp" alt="#" />
                    </a>
                    <a href="#" class="single-brand">
                        <img src="./assets/img/brand/Konka.webp" alt="#" />
                    </a> -->


                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Brand Page Section -->
@endsection