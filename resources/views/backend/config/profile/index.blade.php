@extends('layouts.master')
@section('title', 'Edit Profile')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')

    @php
        $kycDoc = $config['kyc_verification_docs_misc_id'] ?? [];
        if (!empty($kycDoc)) {
            $kycDoc = explode(',', $kycDoc);
        }
    @endphp

    <div class="main-content group-data-[sidebar-size=sm]:ml-[70px]">
        <div class="page-content dark:bg-zinc-700">
            <div class="container-fluid px-[0.625rem]">
                <!-- page title -->
                <x-page-title title="Edit Profile" pagetitle="Profile" />
                <div class="grid grid-cols-1">
                    @include('components.alert-message')
                    <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                        <form action="{{ route('config.update-profile') }}" method="POST" class="config-profile-form"
                            id="config-profile-form">
                            @csrf
                            <div class="bg-white sm:p-6 shadow sm:rounded-md">
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-4">
                                        <label for="name"
                                            class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Name<span class="text-sm text-red-600">*</span></label>
                                        <input type="text" name="name" id="name"
                                            placeholder="Enter First Name"
                                            class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                            value="{{ old('name', $config['name'] ?? '') }}">
                                        @error('name')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="col-span-6 sm:col-span-4">
                                        <label for="company_name"
                                            class="block mb-2 font-medium text-gray-700 dark:text-gray-100">
                                            Company
                                            Name<span class="text-sm text-red-600">*</span></label>
                                        <input type="text" name="company_name" id="company_name"
                                            placeholder="Enter Company Name"
                                            class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                            value="{{ old('company_name', $config['company_name'] ?? '') }}">
                                        @error('company_name')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="col-span-6 sm:col-span-4">
                                        <label for="tagline"
                                            class="block mb-2 font-medium text-gray-700 dark:text-gray-100">
                                            Tagline/Slogan</label>
                                        <input type="text" name="tagline" id="tagline"
                                            placeholder="Enter Tagline/Slogan"
                                            class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                            value="{{ old('tagline', $config['tagline'] ?? '') }}">
                                        @error('tagline')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="col-span-6 sm:col-span-4">
                                        <label for="description"
                                            class="block mb-2 font-medium text-gray-700 dark:text-gray-100">
                                            Description</label>
                                        <textarea type="text" name="description" id="description" placeholder="Enter Description"
                                            class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100">{{ old('description', $config['description'] ?? '') }}</textarea>
                                        @error('description')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="col-span-6 sm:col-span-4">
                                        <label for="address"
                                            class="block mb-2 font-medium text-gray-700 dark:text-gray-100">
                                            Address<span class="text-sm text-red-600">*</span></label>
                                        <input type="text" name="address" id="address" placeholder="Enter Address"
                                            class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                            value="{{ old('address', $config['address'] ?? '') }}">
                                        @error('address')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="col-span-6 sm:col-span-4">
                                        <label for="city"
                                            class="block mb-2 font-medium text-gray-700 dark:text-gray-100">
                                            City<span class="text-sm text-red-600">*</span></label>
                                        <input type="text" name="city" id="city" placeholder="Enter City"
                                            class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                            value="{{ old('city', $config['city'] ?? '') }}">
                                        @error('city')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="col-span-6 sm:col-span-4">
                                        <label for="email"
                                            class="block mb-2 font-medium text-gray-700 dark:text-gray-100">
                                            Email<span class="text-sm text-red-600">*</span></label>
                                        <input type="email" name="email" id="email" placeholder="Enter Email"
                                            class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                            value="{{ old('email', $config['email'] ?? '') }}">
                                        @error('email')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="col-span-6 sm:col-span-4">
                                        <label for="contact"
                                            class="block mb-2 font-medium text-gray-700 dark:text-gray-100">
                                            Contact<span class="text-sm text-red-600">*</span></label>
                                        <input type="text" name="contact" id="contact" placeholder="Enter Contact"
                                            class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                            value="{{ old('contact', $config['contact'] ?? '') }}">
                                        @error('contact')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="col-span-6 sm:col-span-4">
                                        <label for="domain_name"
                                            class="block mb-2 font-medium text-gray-700 dark:text-gray-100">
                                            Domain Name<span class="text-sm text-red-600">*</span></label>
                                        <input type="text" name="domain_name" id="domain_name"
                                            placeholder="Enter Domain Name"
                                            class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                            value="{{ old('domain_name', $config['domain_name'] ?? '') }}">
                                        @error('domain_name')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="col-span-6 sm:col-span-4">
                                        <label for="language_code"
                                            class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Select
                                            Language<span class="text-sm text-red-600">*</span></label>
                                        <!-- Replace the below select with your language options -->
                                        <select name="language_code" id="language_code"
                                            class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100">
                                            <option value="">Select Language</option>
                                            @foreach ($languges as $key => $value)
                                                <option value="{{ $key }}"
                                                    {{ isset($config['language_code']) && $config['language_code'] == $key ? 'selected' : '' }}>
                                                    {{ $value }}</option>
                                            @endforeach
                                        </select>
                                        @error('language_code')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="col-span-6 sm:col-span-4">
                                        <label for="currency_code"
                                            class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Select
                                            Currency<span class="text-sm text-red-600">*</span></label>
                                        <select name="currency_code" id="currency_code"
                                            class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100">
                                            <option value="">Select Currency</option>
                                            @foreach ($currencies as $key => $value)
                                                <option value="{{ $key }}"
                                                    {{ isset($config['currency_code']) && $config['currency_code'] == $key ? 'selected' : '' }}>
                                                    {{ $value }}</option>
                                            @endforeach
                                        </select>
                                        @error('currency_code')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="col-span-6 sm:col-span-4">
                                        <label for="session_timeout_misc_id"
                                            class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Select
                                            Session
                                            Timeout<span class="text-sm text-red-600">*</span></label>
                                        <select name="session_timeout_misc_id" id="session_timeout_misc_id"
                                            class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100">
                                            <option value="">Select Session Timeout</option>
                                            @foreach ($sessionTime as $key => $val)
                                                <option value="{{ $key }}"
                                                    {{ isset($config['session_timeout_misc_id']) && $config['session_timeout_misc_id'] == $key ? 'selected' : '' }}>
                                                    {{ $val }}</option>
                                            @endforeach
                                        </select>
                                        @error('session_timeout_misc_id')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-span-6 sm:col-span-4">
                                        <label for="kyc_verification_docs_misc_id"
                                            class="mb-5 block mb-2 font-medium text-red-700 dark:text-red-100">KYC
                                            Verification
                                            Settings<span class="text-sm text-red-600">*</span></label>

                                            <label for="kyc_verification_docs_misc_id"
                                            class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Mandatory KYC Docs</label>
                                        <select name="kyc_verification_docs_misc_id[]" id="kyc_verification_docs_misc_id"
                                            class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100 multi-select"
                                            multiple>
                                            <option value="">Select KYC Verification Setting</option>
                                            @foreach ($kycDocsList as $key => $val)
                                                <option value="{{ $key }}"
                                                    {{ in_array($key, $kycDoc) ? 'selected' : '' }}>
                                                    {{ $val }}</option>
                                            @endforeach
                                        </select>
                                        @error('kyc_verification_docs_misc_id')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="col-span-6 sm:col-span-4">
                                        <label for="is_user_with_kyc_docs"
                                            class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Create User
                                            With KYC docs</label>
                                        <select name="is_user_with_kyc_docs" id="is_user_with_kyc_docs"
                                            class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100">
                                            <option value="">Select</option>
                                            <option value="Yes"
                                                {{ isset($config['is_user_with_kyc_docs']) && $config['is_user_with_kyc_docs'] == 'Yes' ? 'selected' : '' }}>
                                                Yes</option>
                                            <option value="No"
                                                {{ isset($config['is_user_with_kyc_docs']) && $config['is_user_with_kyc_docs'] == 'No' ? 'selected' : '' }}>
                                                No</option>
                                        </select>
                                        @error('is_user_with_kyc_docs')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="col-span-6 sm:col-span-4">
                                        <label for="is_kyc_alert"
                                            class="block mb-2 font-medium text-gray-700 dark:text-gray-100">KYC
                                            Alerts</label>
                                        <select name="is_kyc_alert" id="is_kyc_alert"
                                            class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100">
                                            <option value="">Select</option>
                                            <option value="Yes"
                                                {{ isset($config['is_kyc_alert']) && $config['is_kyc_alert'] == 'Yes' ? 'selected' : '' }}>
                                                Yes
                                            </option>
                                            <option value="No"
                                                {{ isset($config['is_kyc_alert']) && $config['is_kyc_alert'] == 'No' ? 'selected' : '' }}>
                                                No
                                            </option>
                                        </select>
                                        @error('is_kyc_alert')
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
    <script src="{{ asset('js/backend/config.js') }}"></script>
    <script>
        $(function() {
            config.profile();
        });
    </script>
@endsection
