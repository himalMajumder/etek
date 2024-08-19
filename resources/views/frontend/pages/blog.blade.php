@extends('frontend.master')
@section('content')
<!-- Start breadcrumb section -->
<section class="breadcrumb__section breadcrumb__bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-lg-8 col-12">
                <div class="breadcrumb__content style-2 text-center">
                    <h1 class="breadcrumb__content--title mb-25">
                        {{ lan_key('blog') }}
                    </h1>
                    <ul class="breadcrumb__content--menu d-flex justify-content-center">
                        <li class="breadcrumb__content--menu__items">
                            <a href="{{route('frontend.index')}}"> {{ lan_key('home') }} </a>
                        </li>
                        <li class="breadcrumb__content--menu__items">
                            <span> {{ lan_key('blog') }}  </span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End breadcrumb section -->

<!-- Start blog section -->
<section class="blog__section section--padding">
    <div class="container">
        <div class="section__heading text-center mb-50">
            <h2 class="section__heading--maintitle">
                From The Blog
            </h2>
        </div>
        <div class="blog__section--inner">
            <div class="row row-cols-lg-3 row-cols-md-2 row-cols-sm-2 row-cols-sm-u-2 row-cols-1 mb--n30">

                @foreach($blogs as $blog)
                <div class="col mb-30">
                    <div class="blog__items">
                        <div class="blog__thumbnail">
                            <a class="blog__thumbnail--link" href="{{ url('blog-details', $blog->slug) }}">
                                <img class="blog__thumbnail--img" src="{{ url(env('ADMIN_URL') . '/' . $blog->image) ?? 'https://placehold.co/360x360/EEE/31343C' }}" alt="blog-img" />
                            </a>
                        </div>
                        <div class="blog__content">
                            <span class="blog__content--meta">{{ \Carbon\Carbon::parse($blog->created_at)->format('F d, Y') }}</span>
                            <h3 class="blog__content--title">
                                <a href="{{ url('blog-details', $blog->id) }}">{{ $blog->title }}</a>
                            </h3>
                            <a class="blog__content--btn primary__btn" href="{{ url('blog-details', $blog->slug) }}">Read more</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="pagination__area bg__gray--color">
                <nav class="pagination justify-content-center">
                    <ul class="pagination__wrapper d-flex align-items-center justify-content-center">
                        <li class="pagination__list">
                            <a href="{{ $blogs->previousPageUrl() }}" class="pagination__item--arrow link" @if($blogs->onFirstPage()) style="pointer-events: none; opacity: 0.5;" @endif>
                                <svg xmlns="http://www.w3.org/2000/svg" width="22.51" height="20.443" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M244 400L100 256l144-144M120 256h292" />
                                </svg>
                                <span class="visually-hidden">pagination arrow</span>
                            </a>
                        </li>

                        @for ($i = 1; $i <= $blogs->lastPage(); $i++)
                            <li class="pagination__list">
                                <a href="{{ $blogs->url($i) }}" class="pagination__item link @if($blogs->currentPage() == $i) pagination__item--current @endif">{{ $i }}</a>
                            </li>
                            @endfor

                            <li class="pagination__list">
                                <a href="{{ $blogs->nextPageUrl() }}" class="pagination__item--arrow link" @if(!$blogs->hasMorePages()) style="pointer-events: none; opacity: 0.5;" @endif>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22.51" height="20.443" viewBox="0 0 512 512">
                                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M268 112l144 144-144 144M392 256H100" />
                                    </svg>
                                    <span class="visually-hidden">pagination arrow</span>
                                </a>
                            </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End blog section -->

<!-- End blog section -->
@endsection
