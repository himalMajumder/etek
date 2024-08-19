@extends('frontend.master')
@section('content')
    <div class="hero lg:h-64 h-40" style="background-image: url({{ asset('system/bg1.jpg') }});">
        <div class="hero-overlay bg-opacity-70"></div>
        <div class="hero-content text-center text-neutral-content">
            <div class="max-w-md">
                <h1 class="mb-5 btn glass  lg:px-20 lg:text-4xl text-3xl font-bold">OUR TEAM </h1>
                <div class="flex gap-3">
                    <p class="font-bold"><a href="{{ route('frontend.index') }}">Home / </a></p>
                    <p class="text-[#ffbb38] font-semibold">Our Team </p>
                </div>

            </div>
        </div>
    </div>

    <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-7 lg:mx-40 mx-10 lg:mt-20 mt-10">
        @foreach ($members as $member)
            <label for="my-modal-{{ $member->id }}" class="card bg-base-100">
                <figure class="px-1 pt-1">
                    <img src="{{ asset('upload/images/team/' . $member->photo) }}" alt="Shoes"
                        class="w-full"/>
                </figure>
                <div class="card-body items-center text-center">
                    <h2 class="card-title">{{ $member->name }}</h2>
                    <button class="w-full mt-1">{{ $member->designation }}</button>
                </div>
            </label>


            <input type="checkbox" id="my-modal-{{ $member->id }}" class="modal-toggle" />


            <div class="modal">
                <div class="modal-box relative">
                    <label for="my-modal-{{ $member->id }}" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
                    <img src="{{ asset('upload/images/team/' . $member->photo) }}" class="h-32" />
                    <table style="text-align: left; margin-top: 15px;">
                        <tr>
                            <th>Name</th>
                            <th>:</th>
                            <td>{{ $member->name }}</td>
                        </tr>

                        <tr>
                            <th>Designation</th>
                            <th>:</th>
                            <td>{{ $member->designation }}</td>
                        </tr>

                        <tr>
                            <th>Phone</th>
                            <th>:</th>
                            <td>{{ $member->email??'' }}</td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <th>:</th>
                            <td>{!! $member->address??'' !!}</td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <th>:</th>
                            <td>{!! $member->details??'' !!}</td>
                        </tr>
                    </table>
                </div>
            </div>
        @endforeach
    </div>
@endsection
