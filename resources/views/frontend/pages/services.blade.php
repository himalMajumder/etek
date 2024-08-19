@extends('frontend.master')
@section('content')
    <div class="hero lg:h-64 h-40" style="background-image: url({{ asset('system/bg1.jpg') }});">
        <div class="hero-overlay bg-opacity-70"></div>
        <div class="hero-content text-center text-neutral-content">
            <div class="max-w-md">
                <h1 class="mb-5 lg:text-3xl btn glass lg:px-20 px-5 text-xl font-bold">SERVICE </h1>
                <div class="flex gap-3">
                    <p class="font-bold"><a href="{{ route('frontend.index') }}">Home / </a></p>
                    <p class="text-[#ffbb38] font-semibold">SERVICE </p>
                </div>
            </div>
        </div>
    </div>



    <div class="mt-10 lg:mx-40 mx-10 grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-10 mb-10 ">
        @foreach ($services as $service)
            <label for="my-modal-{{ $service->id }}" class="card">
                <div class="relative w-full">
                    <img src="{{ asset('upload/images/service/' . $service->image) }}" class="h-52 aspect-fill"
                        style="margin: auto;" />
                </div>

                <div class='mt-5'>
                    <h1 class='lg:text-xl text-lg font-bold'>{{ $service->name }}</h1>
                    <p class='mt-2 text-base'>{{ $service->short_description }}</p>
                    <span class='text-blue-700 text-sm font-bold'>... Learn More</span>
                </div>
            </label>

            <input type="checkbox" id="my-modal-{{ $service->id }}" class="modal-toggle" />
            <div class="modal">

                <div class="modal-box relative text center" style="padding: 15px;">

                    <label for="my-modal-{{ $service->id }}" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>

                    <img src="{{ asset('upload/images/service/' . $service->image) }}" class="h-52 aspect-fill"
                        style="margin: auto;" />
                    <h3 class="text-lg font-bold mt-4">{{ $service->name }}</h3>
                    <p class="py-4">{!! $service->description !!}</p>
                    <div class="modal-action sticky bottom-2">
                        <label for="my-modal-{{ $service->id }}" class="btn btn-sm">Close!</label>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div style="width: 350px; margin: 15px auto;">
        {{ $services->links() }}
    </div>
@endsection
