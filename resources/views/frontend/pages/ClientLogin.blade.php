@extends('frontend.master')
@section('content')

  <div class="hero lg:h-64 h-40" style="background-image: url({{ asset('system/bg1.jpg') }});">
    <div class="hero-overlay bg-opacity-70"></div>
    <div class="hero-content text-center text-neutral-content">
      <div class="max-w-md">
        <h1 class="mb-5 lg:text-4xl text-3xl font-bold">Client Login</h1>
        <div class="flex gap-3">
          <p><a href="{{ route('frontend.index') }}">Home / </a></p>
          <p class="text-[#ffbb38]">Client Login</p>
        </div>

      </div>
    </div>
  </div>

  <div class="bg-[#3c75c4] py-14 px-10 mt-20 lg:w-[550px] mx-auto">
    <form action="">

      <h1 class="text-white text-2xl font-semibold">Login to Client Dashboard</h1>

      <div class="mt-5">
        <input type="email" placeholder="Your Email" class="input input-bordered w-full rounded-sm " />
      </div>

      <div class="mt-5">
        <input type="password" placeholder="Your Password" class="input input-bordered w-full rounded-sm " />
      </div>

      <div class="lg:flex lg:justify-between mt-10">
        <button type="submit" class="btn bg-[#7ba90e] border-none rounded-sm px-12 lg:mb-0 mb-5">Login</button>

        <a href="/ClientForgetPassword.html" class="btn bg-[#7ba90e] border-none rounded-sm px-12">Forget Password</a>
      </div>

    </form>
  </div>

@endsection