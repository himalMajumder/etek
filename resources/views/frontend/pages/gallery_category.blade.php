@extends('frontend.master')
@section('content')
    <div class="hero lg:h-64 h-40" style="background-image: url({{ asset('system/bg1.jpg') }});">
        <div class="hero-overlay bg-opacity-70"></div>
        <div class="hero-content text-center text-neutral-content">
            <div class="max-w-md">
                <h1 class="mb-5 lg:text-3xl btn glass lg:px-20 px-5 text-xl font-bold">GALLERY</h1>
                <div class="flex gap-3">
                    <p class="font-bold"><a href="{{ route('frontend.index') }}">Home / </a></p>
                    <p class="text-[#ffbb38] font-semibold"> GALLERY </p>
                </div>
            </div>
        </div>
    </div>



    <div class="mt-10 lg:mx-40 mx-10 grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-10 mb-10 ">
        @foreach ($categories as $category)
            <label for="my-modal-{{ $category->id }}" class="card">
                <a href="{{route('frontend.gallery.image',$category->id)}}" class="relative w-full">
                    <img src="{{ asset('upload/images/gallery_category/' . $category->image) }}" class="h-52 aspect-fill"
                        style="margin: auto;" />
                </a>

                <a href="{{route('frontend.gallery.image',$category->id)}}" class='mt-2'>
                    <a href="{{route('frontend.gallery.image',$category->id)}}" class='lg:text-xl text-lg font-bold'>{{ $category->name }}</a>
                    {{-- <p class='mt-2 text-base'>{{ $service->short_description }}</p>
                    <span class='text-blue-700 text-sm font-bold'>... Learn More</span> --}}
                </a>
            </label>

        @endforeach
    </div>

    <div style="width: 350px; margin: 15px auto;">
        {{ $categories->links() }}
    </div>
@endsection
