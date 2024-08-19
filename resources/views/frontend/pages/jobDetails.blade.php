@extends('frontend.master')
@section('content')
<!-- Start breadcrumb section -->
<section class="breadcrumb__section breadcrumb__bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-lg-8 col-12">
                <div class="breadcrumb__content text-center style-2">
                    <h1 class="breadcrumb__content--title mb-25">Job Details</h1>
                    <ul class="breadcrumb__content--menu d-flex justify-content-center">
                        <li class="breadcrumb__content--menu__items">
                            <a href="{{route('frontend.index')}}">Home</a>
                        </li>
                        <li class="breadcrumb__content--menu__items">
                            <span>Job Details</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End breadcrumb section -->

<!-- Job Details -->
<section class="career-details-area">
    <div class="container">
        <div class="career-details-inner">
            <div class="row">
                <div class="col-lg-12 col-xl-7 col-12">
                    <div class="career-details-info">
                        <div class="career-details-info-top">
                            <div class="career-d-info-top-details">
                                <h3>{{$job->postion_name ?? "N/A"}}</h3>
                                <p>Etek</p>
                            </div>
                            <span class="career-d-info-top-details-location"><img alt="#" src=" {{asset('assets/img/icon/map-marker.svg')}}" />Dhaka, Bangladesh</span>
                        </div>


                        <div class="career-details-info-widget">
                            <h5 class="career-d-info-widget-title">Requirements</h5>
                            <p>{!! $job->description !!}</p>

                        </div>

                    </div>
                </div>
                <div class="col-lg-8 col-xl-4 offset-xl-1 col-12">
                    <div class="career-details-sidebar">
                        <div class="career-d-sidebar-widget">
                            <div class="career-d-sidebar-widget-icon">
                                <img alt="#" src=" {{asset('assets/img/icon/hand-dollar.svg')}}" />
                            </div>

                            <div class="career-d-sidebar-widget-info">
                                <h6>{{$job->average_salary}}</h6>
                                <p>(Average salary)</p>
                            </div>
                        </div>
                        <div class="career-d-sidebar-widget">
                            <div class="career-d-sidebar-widget-icon">
                                <img alt="#" src=" {{asset('assets/img/icon/clock.svg')}} " />
                            </div>
                            <div class="career-d-sidebar-widget-info">
                                <h6> Employment type</h6>
                                <p> {{$job->employment_type}}</p>
                            </div>
                        </div>
                        <div class="career-d-sidebar-widget">
                            <div class="career-d-sidebar-widget-icon">
                                <img alt="#" src=" {{asset('assets/img/icon/envelope.svg')}} " />
                            </div>
                            <div class="career-d-sidebar-widget-info">
                                <h6>{{$job->email}}</h6>
                                <p>Contact email</p>
                            </div>
                        </div>
                        <div class="career-d-sidebar-widget">
                            <div class="career-d-sidebar-widget-icon">
                                <img alt="#" src="{{asset('assets/img/icon/phone.svg')}} " />
                            </div>
                            <div class="career-d-sidebar-widget-info">
                                <h6>{{$job->phone}}</h6>
                                <p>Contact phone</p>
                            </div>
                        </div>
                        <div class="career-details-sidebar-btn">
                            <a class="primary__btn" href="{{route('job.apply', $job->id)}}">Apply now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Job Details -->
@endsection