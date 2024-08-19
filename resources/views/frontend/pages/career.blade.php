@extends('frontend.master')
<style>
    .job-apply-btn-container {
        display: flex;
        justify-content: space-between;
        /* or 'space-around', 'space-evenly', 'flex-start', 'flex-end', etc. depending on your layout needs */
    }

    .job-apply-btn {
        margin-right: 10px;
        /* Adjust the margin as needed */
    }

    /* Optional: To ensure buttons are visually distinct and spaced well */
    .primary__btn {
        padding: 10px 20px;
        text-decoration: none;
        background-color: #007bff;
        /* Adjust the background color */
        color: #ffffff;
        border-radius: 5px;
        border: none;
    }

    .primary__btn:hover {
        background-color: #0056b3;
        /* Adjust the hover color */
    }
</style>



@section('content')

<!-- Start breadcrumb section -->
<section class="breadcrumb__section breadcrumb__bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-lg-8 col-12">
                <div class="breadcrumb__content text-center style-2">
                    <h1 class="breadcrumb__content--title mb-25">
                        {{ lan_key('career') }}
                    </h1>
                    <ul class="breadcrumb__content--menu d-flex justify-content-center">
                        <li class="breadcrumb__content--menu__items">
                            <a href="{{route('frontend.index')}}">{{ lan_key('home') }}</a>
                        </li>
                        <li class="breadcrumb__content--menu__items">
                            <span>  {{ lan_key('career') }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End breadcrumb section -->

<!-- Career Area -->
<section class="career-area section--padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="career-job-list">
                    <!-- Single Card -->


                    @foreach ($jobs as $job)
                    <div class="recent-job-card">
                        <div class="recent-job-img">
                            <a href="job-details.html">
                                <img src="{{asset('assets/img/job-icon.svg')}}" alt="Images" />
                            </a>
                        </div>

                        <div class="content-group">
                            <div class="content">
                                <h3>
                                    <a href="job-details.html">{{$job->postion_name}}</a>
                                </h3>
                                <ul class="job-list">

                                    <li>
                                        <i class="fi-rr-clock"></i>
                                        {{ $job->created_at->format('F j, Y') }}
                                    </li>
                                    <li>
                                        <i class="fi-rr-map-marker"></i>
                                        {{$job->address}}
                                    </li>
                                    <li>
                                        <span>৳</span>{{$job->average_salary}}
                                        <b>/Per Month</b>
                                    </li>
                                </ul>
                            </div>
                            <div class="job-apply-btn-container">
                                <div class="job-apply-btn">
                                    <a href="{{route('job.apply', $job->id)}}" class="primary__btn">Apply </a>
                                </div>
                                <div class="job-apply-btn">
                                    <a href="{{ route('job.details', $job->slug) }}" class="primary__btn">Job Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach


                    <!-- Single Card -->
                    <!-- <div class="recent-job-card">
                        <div class="recent-job-img">
                            <a href="job-details.html">
                                <img src="./assets/img/job-icon.svg" alt="Images" />
                            </a>
                        </div>
                        <div class="content-group">
                            <div class="content">
                                <h3>
                                    <a href="job-details.html">Sr. Graphics Designer</a>
                                </h3>
                                <ul class="job-list">
                                    <li>
                                        <i class="fi-rr-briefcase"></i>
                                        Manager
                                    </li>
                                    <li>
                                        <i class="fi-rr-clock"></i>
                                        2 Week Ago
                                    </li>
                                    <li>
                                        <i class="fi-rr-map-marker"></i>
                                        305 Hicks St Brooklyn, NY
                                    </li>
                                    <li>
                                        <span>৳</span>40,000 TK
                                        <b>/Per Month</b>
                                    </li>
                                </ul>
                            </div>
                            <div class="job-apply-btn">
                                <a href="job-apply.html" class="primary__btn">Apply Now</a>
                            </div>
                        </div>
                    </div> -->
                    <!-- Single Card -->
                    <!-- <div class="recent-job-card">
                        <div class="recent-job-img">
                            <a href="job-details.html">
                                <img src="./assets/img/job-icon.svg" alt="Images" />
                            </a>
                        </div>
                        <div class="content-group">
                            <div class="content">
                                <h3>
                                    <a href="job-details.html">Sales Manager</a>
                                </h3>
                                <ul class="job-list">
                                    <li>
                                        <i class="fi-rr-briefcase"></i>
                                        Manager
                                    </li>
                                    <li>
                                        <i class="fi-rr-clock"></i>
                                        2 Week Ago
                                    </li>
                                    <li>
                                        <i class="fi-rr-map-marker"></i>
                                        305 Hicks St Brooklyn, NY
                                    </li>
                                    <li>
                                        <span>৳</span>40,000 TK
                                        <b>/Per Month</b>
                                    </li>
                                </ul>
                            </div>
                            <div class="job-apply-btn">
                                <a href="job-apply.html" class="primary__btn">Apply Now</a>
                            </div>
                        </div>
                    </div> -->
                    <!-- Single Card -->
                    <!-- <div class="recent-job-card">
                        <div class="recent-job-img">
                            <a href="job-details.html">
                                <img src="./assets/img/job-icon.svg" alt="Images" />
                            </a>
                        </div>
                        <div class="content-group">
                            <div class="content">
                                <h3>
                                    <a href="job-details.html">Digital Marketer</a>
                                </h3>
                                <ul class="job-list">
                                    <li>
                                        <i class="fi-rr-briefcase"></i>
                                        Manager
                                    </li>
                                    <li>
                                        <i class="fi-rr-clock"></i>
                                        2 Week Ago
                                    </li>
                                    <li>
                                        <i class="fi-rr-map-marker"></i>
                                        305 Hicks St Brooklyn, NY
                                    </li>
                                    <li>
                                        <span>৳</span>40,000 TK
                                        <b>/Per Month</b>
                                    </li>
                                </ul>
                            </div>
                            <div class="job-apply-btn">
                                <a href="job-apply.html" class="primary__btn">Apply Now</a>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Career Area -->

@endsection
