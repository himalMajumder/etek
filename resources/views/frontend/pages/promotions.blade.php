@extends('frontend.master')
@section('content')
    <div class="hero lg:h-64 h-40" style="background-image: url({{ asset('system/bg1.jpg') }});">
        <div class="hero-overlay bg-opacity-70"></div>
        <div class="hero-content text-center text-neutral-content">
            <div class="max-w-md">
                <h1 class="mb-5 lg:text-3xl btn glass lg:px-20 px-5 text-xl font-bold">Promotions </h1>
                <div class="flex gap-3">
                    <p class="font-bold"><a href="{{ route('frontend.index') }}">Home / </a></p>
                    <p class="text-[#ffbb38] font-semibold">Promotions </p>
                </div>
            </div>
        </div>
    </div>


    <div class="mt-10 lg:mx-40 mx-10 grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-10 mb-10 ">
        @foreach ($promotions as $promotion)
            <label for="my-modal-{{ $promotion->id }}" class="card">
                <div class="relative w-full">
                    <img src="{{ asset('upload/images/promotion/' . $promotion->image) }}" class="max-h-60 aspect-fill" />
                </div>

                <div class='mt-5'>
                    <div class='flex gap-5'>
                        <div class='flex gap-2 font-semibold text-sm'>
                            <p class='text-blue-700'>{{ $promotion->created_at }}</p>
                        </div>
                    </div>

                    <div class='mt-2'>
                        <h1 class='lg:text-xl text-lg font-bold'>{{ $promotion->name }}</h1>
                        <p class='mt-3 text-base'>{{ $promotion->short_description }}</p>
                        <p class='mt-2 text-blue-700 text-sm font-bold'>Learn More</p>
                    </div>
                </div>
            </label>


            <input type="checkbox" id="my-modal-{{ $promotion->id }}" class="modal-toggle" />
            <div class="modal">
                <div class="modal-box relative"  style="padding: 15px;">
                    <label for="my-modal-{{ $promotion->id }}"
                        class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>

                    <img src="{{ asset('upload/images/promotion/' . $promotion->image) }}"
                        class="h-52 aspect-fill" style="margin: auto;" />
                    <h3 class="text-lg font-bold">{{ $promotion->name }}</h3>
                    <p class="py-4">{!! $promotion->description !!}</p>

                    <div class="modal-action sticky bottom-2">
                        <label for="my-modal-{{ $promotion->id }}" class="btn btn-sm">Close!</label>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
@endsection
