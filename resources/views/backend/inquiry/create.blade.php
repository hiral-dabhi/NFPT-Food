@extends('layouts.master-without-nav')
@section('title')
Contact Us
@endsection
@section('css')
<link rel="stylesheet" href="{{ URL::asset('build/libs/swiper/swiper-bundle.min.css') }}">
@endsection
@section('content')
<div class="container-fluid">
    <div class="h-screen md:overflow-hidden">
        <div class="flex justify-center items-center h-full">
            <div class="col-span-12 md:col-span-5 lg:col-span-4 xl:col-span-3 relative z-50">
                <div class="w-full bg-white xl:p-12 p-10 dark:bg-zinc-800" style="width: 600px !important;">
                    <div class="flex h-[90vh] flex-col">
                        <div class="mx-auto">
                            <a href="{{ url('dashboard') }}" class="">
                                <img src="{{ URL::asset('build/images/logo.png') }}" alt="" class="h-14 inline">
                            </a>
                        </div>

                        <div class="my-auto">
                            <div class="text-center">
                                <h5 class="text-gray-600 dark:text-gray-100">Contact Us</h5>
                            </div>
                            @if (session('status'))
                            <div class="">
                                {{ session('status') }}
                            </div>
                            @endif

                            <form method="POST" action="{{ route('contact-us.store') }}" class="mt-4 pt-2" id="contact-us-form">
                                @csrf
                                <div class="mb-4">
                                    <label for="name" class="text-gray-600 dark:text-gray-100 font-medium mb-2 block">Full Name <span class="text-red-600">*</span></label>
                                    <input type="text" name="name" value="{{ old('name') }}" class="w-full rounded placeholder:text-sm py-2 border-gray-100 dark:bg-zinc-700/50 dark:border-zinc-600 dark:text-gray-100 dark:placeholder:text-zinc-100/60" id="name" placeholder="Enter Full Name">
                                    @error('name')
                                    <span class="text-sm text-red-600">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="email" class="text-gray-600 dark:text-gray-100 font-medium mb-2 block">Email <span class="text-red-600">*</span></label>
                                    <input type="email" name="email" value="{{ old('email') }}" class="w-full rounded placeholder:text-sm py-2 border-gray-100 dark:bg-zinc-700/50 dark:border-zinc-600 dark:text-gray-100 dark:placeholder:text-zinc-100/60" id="email" placeholder="Enter Email">
                                    @error('email')
                                    <span class="text-sm text-red-600">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="contact" class="text-gray-600 dark:text-gray-100 font-medium mb-2 block">Contact<span class="text-red-600">*</span></label>
                                    <input type="text" name="contact" value="{{ old('contact') }}" class="w-full rounded placeholder:text-sm py-2 border-gray-100 dark:bg-zinc-700/50 dark:border-zinc-600 dark:text-gray-100 dark:placeholder:text-zinc-100/60" id="contact" placeholder="Enter Contact">
                                    @error('contact')
                                    <span class="text-sm text-red-600">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="message" class="text-gray-600 dark:text-gray-100 font-medium mb-2 block">Message<span class="text-red-600">*</span></label>
                                    <textarea name="message" class="w-full rounded placeholder:text-sm py-2 border-gray-100 dark:bg-zinc-700/50 dark:border-zinc-600 dark:text-gray-100 dark:placeholder:text-zinc-100/60" id="message" placeholder="Enter Message">{{ old('message') }}</textarea>
                                    @error('message')
                                    <span class="text-sm text-red-600">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mt-3 col-span-6 sm:col-span-4 flex items-center justify-center">
                                    <button type="submit" class="mr-1 font-medium text-white border-transparent btn bg-violet-500 w-28 hover:bg-violet-700 focus:bg-violet-700 focus:ring focus:ring-violet-50">Submit</button>
                                    <a class="font-medium text-white border-transparent btn bg-red-500 w-28 hover:bg-red-700 focus:bg-red-700 focus:ring focus:ring-red-50" href="{{ route('login') }}">
                                        Back to Login
                                    </a>
                                </div>
                            </form>
                        </div>


                        <div class="mt-4 text-center">
                            <p class="text-gray-500 dark:text-gray-100 relative mb-5">©
                                <script>
                                    document.write(new Date().getFullYear())
                                </script> {{ env('APP_NAME', 'NFPT') }}.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript" src="{{ asset('js/libs/jquery-3.7.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/libs/jquery.validate.min.js') }}"></script>

<script src="{{ URL::asset('build/libs/swiper/swiper-bundle.min.js') }}"></script>

<script src="{{ URL::asset('build/js/pages/login.init.js') }}"></script>

<script src="{{ URL::asset('build/js/app.js') }}"></script>
<script src="{{ asset('js/backend/inquiry.js') }}"></script>
<script>
    $(function() {
        inquiry.create();
    });
</script>
@endsection