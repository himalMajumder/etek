@extends('frontend.master')
@section('content')
<!-- Start breadcrumb section -->
<section class="breadcrumb__section breadcrumb__bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-lg-8 col-12">
                <div class="breadcrumb__content text-center style-2">
                    <h1 class="breadcrumb__content--title mb-25">Apply Job</h1>
                    <ul class="breadcrumb__content--menu d-flex justify-content-center">
                        <li class="breadcrumb__content--menu__items">
                            <a href="index.html">Home</a>
                        </li>
                        <li class="breadcrumb__content--menu__items">
                            <span>Apply Job</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End breadcrumb section -->

<!-- Apply Job -->



<section class="apply-career-form-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10 col-12">




                <form class="apply-career-form" action="{{ route('job.apply.submit') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Full name *</label><input type="text" name="name" required />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Email address *</label><input type="text" name="email" required />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Phone number *</label><input type="text" name="phone" required />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>LinkedIn/ Facebook ID *</label><input type="text" name="online_link" required />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Present address *</label><input type="text" name="present_address" required />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Permanent address *</label><input type="text" name="permanent_address" required />
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Cover letter</label><textarea name="cover_letter" cols="50" required></textarea>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>How did you hear about this position? *</label><input type="text" name="about_position" placeholder="ex: Google, Facebook and others" />
                            </div>
                        </div>


                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Attach CV/Resume *</label>
                                <input type="file" name="attach_file" placeholder="Choose file" id="resume" class="inputfile" onchange="showFileName(this)" />
                                <label for="resume" id="fileLabel">Choose file</label>
                            </div>
                        </div>


                        <input type="hidden" name="job_id" value="{{$job->id}}" />



                        <div class="col-lg-6">
                            <button type="submit" class="btn contact-form-btn">
                                Apply
                            </button>
                        </div>
                    </div>
                </form>


            </div>
        </div>
    </div>
</section>
<!-- End Apply Job -->

<!-- File Upload Input JS -->
<script type="text/javascript">
    function showFileName(input) {
        var fileName = input.files[0].name;
        document.getElementById("fileLabel").innerText = fileName;
    }
</script>
@endsection