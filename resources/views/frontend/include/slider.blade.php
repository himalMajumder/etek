<section class="hero">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-xl-8 col-12">
                <div class="hero-slider-main">
                    @foreach ($sliders as $slider)
                    <div class="hero-single-slider background-image" style="background-image: url('{{ url(env('ADMIN_URL') . '/' . $slider->image) }}');"></div>
                    @endforeach
                </div>
            </div>

            <div class="col-lg-12 col-xl-4 col-12 g-0">
                <div class="hero-right-banner">
                    @foreach ($bannerstops as $bannerstop)
                    <a class="hero-single-banner" href="#">
                        <div class="hero-single-banner-img">
                            <img src="{{ url(env('ADMIN_URL') . '/' . $bannerstop->image) }}" alt="#" />
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>