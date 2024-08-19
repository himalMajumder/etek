@extends('frontend.master')


<style>
    .align {
        text-align: justify;
    }

    .line {
        line-height: 30px;
    }

    .zoom {
        padding: 50px;
        transition: transform .2s;
        margin: 0 auto;
    }

    .zoom:hover {
        transform: scale(1.2);
    }


    .swiper-slide {
        text-align: center;
        font-size: 18px;
        background: #fff;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .swiper-slide img {
        display: block;
        object-fit: cover;
    }

    .mbtn {
        padding: 7px;
        margin: 0;
        height: 27px;
        width: 27px;
        border-radius: 50%;
        position: absolute;
        top: 2px;
        right: 4px;
        z-index: 9;
        background: #b73a3a85;
    }

    .swiper-button-next {
        right: 0;
        /* background: #ff00006b;
        border-radius: 50%;
        height: 27px;
        width: 27px; */
    }

    .swiper-button-prev {
        
        left: 0;
    }


    .sample-slider [class^="swiper-button-"]::after{
        font-size: 16px;
    }
</style>


@section('content')
    <div class="mt-2 mb-10">

        <div class="bg-[#f2fdfe] lg:p-4 p-2">
            <h2 class="text-center font-semibold text-xl">PHOTO GALLERY</h2>
            <h2 class="lg:text-3xl text-3xl text-center font-bold mt-2 text-blue-900">{{ $category->name }}</h2>
            <p class="mt-2 text-sm"><a href="{{ route('frontend.index') }}">Home</a> » <a
                    href="{{ route('frontend.gallery.image', $category->id) }}">{{ $category->name }}</a></p>
        </div>

        <div class="mt-2 px-10">
            <div class="grid lg:grid-cols-4 md:grid-cols-4 grid-cols-1 gap-5">

                @foreach ($images as $image)
                    <label for="my-modal-3" class="border border-gray-200 p-3 zoom">

                        <img src="{{ asset('upload/images/gallery/' . $image->image) }}" alt=""
                            class="rounded-3xl lg:w-96 w-72 lg:h-64 h-52">
                        <div class="card-body items-center text-center">
                            <P class="font-bold lg:text-left text-center">{{ $image->title }}</P>
                        </div>
                    </label>
                @endforeach


                <!-- MOdal______________________________ -->

                <input type="checkbox" id="my-modal-3" class="modal-toggle" />

                <div class="modal" style="height: 100%; margin: auto;">
                    <div class="modal-box relative p-3" style="height: 100%;">
                        <label for="my-modal-3" class="btn btn-sm btn-circle absolute right-2 top-2"
                            style="z-index: 1000;">✕</label>
                        <div class="swiper mySwiper">
                            <div class="swiper-wrapper">
                                @foreach ($images as $image)
                                    <div class="swiper-slide flex items-center justify-center  " style="height: 500px;">
                                        <img src="{{ asset('upload/images/gallery/' . $image->image) }}" class="object-fill"
                                            style="max-height: 500px;">
                                    </div>
                                @endforeach
                            </div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                </div>

                {{-- <div class="fixed z-10 overflow-y-auto top-0 w-full left-0 hidden" id="modal">
                    <div class="flex items-center justify-center min-height-100vh pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                        <div class="fixed inset-0 transition-opacity">
                            <div class="absolute inset-0 bg-gray-900 opacity-75"></div>
                        </div>
                        <span class="hidden sm:inline-block sm:align-middle sm:h-screen">&#8203;</span>
                        <div class="inline-block align-center bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                            role="dialog" aria-modal="true" aria-labelledby="modal-headline"
                            style="position: absolute;
                            top: 0;
                            right: 0;
                            bottom: 0;
                            left: 0;
                            margin: auto;
                            height: fit-content;
                            width: fit-content;
                            z-index: 10000;">
                            <div class="text-right">
                                <button type="button" class="text-white mbtn bg-[#b73a3a85]"
                                    onclick="toggleModal()"><i class="fas fa-times"></i></button>
                            </div>

                            <div class="bg-white px-1 pt-1 pb-1 sm:p-1 sm:pb-1">
                                <div class="swiper mySwiper">
                                    <div class="swiper-wrapper">
                                        @foreach ($images as $image)
                                            <div class="swiper-slide flex items-center justify-center" style="height: 500px;">
                                                <img src="{{ asset('upload/images/gallery/' . $image->image) }}"
                                                     style="max-height: 450px;
                                                    max-width: 450px; margin: auto;">
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>
                                    <div class="swiper-pagination"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdn.tailwindcss.com"></script>

    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>


    <script>
        function toggleModal() {
            document.getElementById('modal').classList.toggle('hidden')
        }

        var swiper = new Swiper(".mySwiper", {

             
            pagination: {
                el: ".swiper-pagination",
                type: "fraction",
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>
@endsection
