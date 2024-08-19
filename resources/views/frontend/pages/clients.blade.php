@extends('frontend.master')
@section('content')
    <div class="hero lg:h-64 h-40" style="background-image: url({{ asset('system/bg1.jpg') }});">
        <div class="hero-overlay bg-opacity-70"></div>
        <div class="hero-content text-center text-neutral-content">
            <div class="max-w-md">
                <h1 class="mb-5 lg:text-3xl btn glass lg:px-20 px-5 text-xl font-bold">CLIENTS </h1>
                <div class="flex gap-3">
                    <p class="font-bold"><a href="{{ route('frontend.index') }}">Home / </a></p>
                    <p class="text-[#ffbb38] font-semibold">Clients </p>
                </div>
            </div>
        </div>
    </div>

    <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-5 lg:mx-40 mx-10 lg:mt-20 mt-10">
        @foreach ($members as $member)
            <label for="my-modal-{{ $member->id }}" class="bg-base-100 card bg-[#c57523]">
                
                <img src="{{ asset('upload/images/client/' . $member->photo) }}" style="margin:auto"
                        class="rounded-full lg:w-40 w-32 h-32 lg:h-40" />
               
                <div class="card-body items-center text-center">
                    <p class="card-title text-white">{{ $member->name }}</p>
                    {{-- <button class="w-full mt-1">{{ $member->designation }}</button> --}}
                </div>
            </label>


            {{-- <input type="checkbox" id="my-modal-{{ $member->id }}" class="modal-toggle" />
            <div class="modal">
                <div class="modal-box relative">
                    <label for="my-modal-{{ $member->id }}" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>

                    <img src="{{ asset('upload/images/client/' . $member->photo) }}" alt="Shoes"
                        class="rounded-full lg:w-60 w-32 h-32 lg:h-60" style="margin:auto" />

                    <h2 class="card-title">{{ $member->name }}</h2>
                    <h2 class="card-title">{{ $member->designation }}</h2>
                    <p>
                        {!! $member->details !!}
                    </p>

                </div>
            </div> --}}
        @endforeach
    </div>
@endsection
