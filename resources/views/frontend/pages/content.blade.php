@extends('frontend.master')
@section('content')
    <div class="hero lg:h-64 h-40"
        style="background-image: url({{ asset('system/bg1.jpg') }});">
        <div class="hero-overlay bg-opacity-70"></div>
        <div class="hero-content text-center text-neutral-content">
            <div class="max-w-md">
                <h1 class="mb-5 lg:text-4xl text-3xl btn glass  px-5 font-bold">{!!$data->name!!}</h1>
                <div class="flex gap-3">
                    <p class="font-bold"><a href="{{ route('frontend.index') }}">Home / </a></p>
                    <p class="text-[#ffbb38] font-semibold">{!!$data->name!!}</p>
                </div>

            </div>
        </div>
    </div>



    <div class="lg:mx-40 mx-10 lg:mt-20 mt-10 mb-20">
    <div class="w-8 h-1 mb-2 rounded-3xl bg-[#7ba90e]"></div>
        <h1 class="lg:text-4xl text-3xl font-bold"> {!!$data->name!!}</h1>
        {!!$data->description!!}
    </div>

@endsection