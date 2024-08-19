@extends('frontend.master')
@section('content')



<!-- Auth Page  Area -->
<section class="auth-page-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-xl-4 col-md-8 col-12">
                <div class="auth-card">
                    <div class="auth-card-head">
                        <div class="auth-card-head-icon">
                            <img src="./assets/img/icon/edit.svg" alt="#" />
                        </div>
                        <h4 class="auth-card-title">Register Account</h4>
                    </div>
                    <div class="auth-card-form-body">



                        <form class="auth-card-form" action="{{route('register')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <div class="form-group-icon">
                                    <i class="fi fi-ss-user"></i>
                                </div>
                                <input name="name" placeholder="Full name" required="" type="text" id="name" class="form-control" value="" />
                            </div>
                            <div class="form-group">
                                <div class="form-group-icon">
                                    <i class="fi fi-ss-user"></i>
                                </div>
                                <input name="email" placeholder="Email or phone number" required="" type="email" id="email" class="form-control" value="" />
                            </div>
                            <div class="form-group">
                                <div class="form-group-icon">
                                    <i class="fi fi-ss-lock"></i>
                                </div>
                                <input name="password" placeholder="Password" required="" type="password" id="password" class="form-control" value="" />
                            </div>
                            <div class="form-group">
                                <div class="form-group-icon">
                                    <i class="fi-ss-home-location-alt"></i>
                                </div>
                                <input name="address" placeholder="Address" required="" type="address" id="address" class="form-control" value="" />
                            </div>
                            <button id="show-confirmation-email-modal" type="submit" class="auth-card-form-btn primary__btn">
                                Register account
                            </button>
                        </form>




                        <div class="auth-card-bottom">
                            <span>or</span>
                            <div class="auth-card-google-btn">
                                <a target="_blank" href="#"><img src="./assets/img/icon/google.svg" alt="#" />Register with Google</a>
                            </div>
                            <p class="auth-card-bottom-link">
                                Already have an account?<a href="login.html">Sign in</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Auth Page  Area -->

@endsection