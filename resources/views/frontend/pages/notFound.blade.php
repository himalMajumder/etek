@extends('frontend.master')
@section('content')
<!-- Start error section -->
<section class="error__section section--padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="error__content text-center">
                    <img class="error__content--img" src="{{asset('assets/img/other/404-error.svg')}}" alt="error-img" />
                    <h2 class="error__content--title">
                        Opps ! We,ar Not Found This Page
                    </h2>
                    <p class="error__content--desc">
                        Lorem, ipsum dolor sit amet consectetur
                        adipisicing elit. Excepturi animi aliquid
                        minima assumenda.
                    </p>
                    <a class="error__content--btn primary__btn" href="{{route('frontend.index')}}">Back To Home</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End error section -->
@endsection