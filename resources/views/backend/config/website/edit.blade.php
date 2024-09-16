@extends('layouts.master')
@section('title', 'Website')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
    <div class="main-content group-data-[sidebar-size=sm]:ml-[70px]">
        <div class="page-content dark:bg-zinc-700">
            <div class="container-fluid px-[0.625rem]">
                <!-- page title -->
                <x-page-title title="Website" pagetitle="Website" />
                <div class="grid grid-cols-1">
                    @include('components.alert-message')
                    <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                        <form action="{{ route('config.website.update') }}" method="POST" class="config-website-form"
                            id="config-website-form" enctype="multipart/form-data">
                            @csrf
                            <div class="bg-white sm:p-6 shadow sm:rounded-md">
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-4">
                                        <label for="about_us"
                                            class="block mb-2 font-medium text-gray-700 dark:text-gray-100"><span
                                                class="text-sm text-red-600">*</span>About Us</label>
                                        <textarea name="about_us" id="about_us" placeholder="Enter First Name"
                                            class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100">{{ old('about_us', $configWebsiteData['about_us'] ?? '') }}</textarea>
                                        @error('about_us')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="col-span-6 sm:col-span-4">
                                        <label for="terms_condition"
                                            class="block mb-2 font-medium text-gray-700 dark:text-gray-100"><span
                                                class="text-sm text-red-600">*</span>Terms & Conditions</label>
                                        <textarea name="terms_condition" id="terms_condition" placeholder="Enter First Name"
                                            class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100">{{ old('terms_condition', $configWebsiteData['terms_condition'] ?? '') }}</textarea>
                                        @error('terms_condition')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="col-span-6 sm:col-span-4">
                                        <label for="logo"
                                            class="block mb-2 font-medium text-gray-700 dark:text-gray-100"><span
                                                class="text-sm text-red-600">*</span>Logo (Only PNG)</label>
                                        <input type="file" name="logo" id="logo"
                                            class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                            value="{{ old('logo', $configWebsiteData['logo'] ?? '') }}" accept=".png">
                                        @error('logo')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="col-span-3 sm:col-span-3" id="logo_preview">
                                        @if (isset($configWebsiteData['logo']) && !empty($configWebsiteData['logo']) && file_exists(storage_path('app/public/uploads/website_icons/' . $configWebsiteData['logo'])))
                                            <img src="{{ asset('storage/uploads/website_icons/' . $configWebsiteData['logo']) }}"
                                                alt="Current Logo" class="w-32 h-auto" id="current_logo">
                                        @endif
                                    </div>

                                    <div class="col-span-6 sm:col-span-4">
                                        <label for="home_image"
                                            class="block mb-2 font-medium text-gray-700 dark:text-gray-100"><span
                                                class="text-sm text-red-600">*</span>Home Image (Only JPEG)</label>
                                        <input type="file" name="home_image" id="home_image"
                                            class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                            value="{{ old('home_image', $configWebsiteData['home_image'] ?? '') }}"
                                            accept=".jpeg">
                                        @error('home_image')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="col-span-3 sm:col-span-3 " id="home_image_preview">
                                        @if (isset($configWebsiteData['home_image']) && !empty($configWebsiteData['home_image']) && file_exists(storage_path('app/public/uploads/website_icons/' . $configWebsiteData['home_image'])))
                                            <img src="{{ asset('storage/uploads/website_icons/' . $configWebsiteData['home_image']) }}"
                                                alt="Current Logo" class="w-32 h-auto" id="current_home_logo">
                                        @endif
                                    </div>

                                    <div class="col-span-6 sm:col-span-4">
                                        <label for="android_app_link"
                                            class="block mb-2 font-medium text-gray-700 dark:text-gray-100"><span
                                                class="text-sm text-red-600">*</span>Android App Link</label>
                                        <input type="text" name="android_app_link" id="android_app_link"
                                            placeholder="Android App Link"
                                            class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                            value="{{ old('android_app_link', $configWebsiteData['android_app_link'] ?? '') }}">
                                        @error('android_app_link')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="col-span-6 sm:col-span-4">
                                        <label for="iphone_app_link"
                                            class="block mb-2 font-medium text-gray-700 dark:text-gray-100"><span
                                                class="text-sm text-red-600">*</span>Iphone App Link</label>
                                        <input type="text" name="iphone_app_link" id="iphone_app_link"
                                            placeholder="Iphone App Link"
                                            class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                            value="{{ old('iphone_app_link', $configWebsiteData['iphone_app_link'] ?? '') }}">
                                        @error('iphone_app_link')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-span-6 sm:col-span-4 flex items-center justify-center mt-3">
                                    <button type="submit"
                                        class="font-medium mr-1 text-white border-transparent btn bg-violet-500 w-28 hover:bg-violet-700 focus:bg-violet-700 focus:ring focus:ring-violet-50">Submit</button>
                                    <a class="font-medium text-white border-transparent btn bg-red-500 w-28 hover:bg-red-700 focus:bg-red-700 focus:ring focus:ring-red-50"
                                        href="{{ route('dashboard') }}">
                                        Back
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- footer -->
                @include('layouts.footer')
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{ asset('js/libs/jquery-3.7.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/libs/select2.min.js') }}"></script>
    <script>
        var logoValue = "{{ $configWebsiteData['logo'] ?? '' }}";
    </script>
    <script src="{{ asset('js/backend/config.js') }}"></script>
    <script>
        $(function() {
            config.website();
        });
    </script>
@endsection
