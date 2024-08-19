@extends('frontend.master')
@section('content')
    <section class="auth-page-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-xl-4 col-md-8 col-12">
                    <div class="auth-card">
                        <div class="auth-card-head">
                            <div class="auth-card-head-icon">
                                <img src="./assets/img/icon/lock.svg" alt="#" />
                            </div>
                            <h4 class="auth-card-title">Sign in</h4>
                        </div>
                        <div class="auth-card-form-body">



                            <form class="auth-card-form" action="{{ route('login.data') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <div class="form-group-icon">
                                        <i class="fi fi-ss-user"></i>
                                    </div>
                                    <input name="login" placeholder="Email or phone number" required type="text"
                                        id="login" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <div class="form-group-icon">
                                        <i class="fi fi-ss-lock"></i>
                                    </div>
                                    <input name="password" placeholder="Password" required type="password" id="password"
                                        class="form-control" />
                                </div>
                                <div class="auth-card-info">
                                    <div class="form-check">
                                        <input type="checkbox" id="custom-checkbox" class="form-check-input" />
                                        <label for="custom-checkbox" class="form-check-label">Remember me</label>
                                    </div>
                                    <a href="forget-password.html">Forgotten password?</a>
                                </div>

                                <button type="submit" class="auth-card-form-btn primary__btn">
                                    Sign in
                                </button>
                            </form>






                            <div class="auth-card-bottom">
                                <span>or</span>
                                <div class="auth-card-google-btn">
                                    <a href="{{ url('auth/google') }}"><img src="./assets/img/icon/google.svg"
                                            alt="#" />Sign in
                                        with Google</a>
                                </div>
                                <p class="auth-card-bottom-link">
                                    Don’t have any account?<a href="{{ route('register.account') }}">Register account</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
