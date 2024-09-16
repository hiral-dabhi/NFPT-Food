@extends('layouts.master')
@section('title')
    {{ __('Professional Profile') }}
@endsection
@section('css')
    <!-- alertifyjs Css -->
    <link href="{{ URL::asset('build/libs/alertifyjs/build/css/alertify.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- alertifyjs default themes  Css -->
    <link href="{{ URL::asset('build/libs/alertifyjs/build/css/themes/default.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="main-content group-data-[sidebar-size=sm]:ml-[70px]">
        <div class="page-content dark:bg-zinc-700">
            <div class="container-fluid px-[0.625rem]">

                <!-- page title -->
                <x-page-title title="Professional Profile" pagetitle="Bank Details" />
                @include('components.alert-message')

                <div class="grid grid-cols-1 mt-3">
                    <div class="flex flex-wrap card-body">
                        <div class="nav-tabs border-b-tabs">
                            <ul
                                class="flex flex-wrap w-full text-sm font-medium text-center text-gray-500 border-b border-gray-100 nav dark:border-gray-700 dark:text-gray-400">
                                <li>
                                    <a href="{{ route('professionalProfile.profile') }}"
                                        class="inline-block p-4 ">Professional Details</a>
                                </li>
                                <li>
                                    <a href="{{ route('professionalProfile.bank-detail') }}"
                                        class="inline-block p-4 active">Bank Details</a>
                                </li>
                                <li>
                                    <a href="{{ route('professionalProfile.document') }}"
                                        class="inline-block p-4">Documents</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                        <div class="card-body">
                            <form method="POST" action="{{ route('professionalProfile.bank-detail.update', $user->id) }}"
                                class="bank-detail-form" id="bank-detail-form">
                                @csrf
                                <div class="grid grid-cols-12 gap-x-6">
                                    <div class="col-span-12 lg:col-span-6">
                                        <div class="mb-4">
                                            <label for="account_number"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Account
                                                Number<span class="text-sm text-red-600">*</span></label>
                                            <input type="number" name="account_number" id="account_number"
                                                placeholder="Enter Account Number"
                                                class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                value="{{ old('account_number', !empty($user->bankDetail->account_number) ? Crypt::decryptString($user->bankDetail->account_number) : '') }}">
                                            @error('account_number')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label for="account_holder_name"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Account
                                                Holder Name<span class="text-sm text-red-600">*</span></label>
                                            <input type="text" name="account_holder_name" id="account_holder_name"
                                                placeholder="Enter Account Holder Name"
                                                class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                value="{{ old('account_holder_name', !empty($user->bankDetail->account_holder_name) ? Crypt::decryptString($user->bankDetail->account_holder_name) : '') }}">
                                            @error('account_holder_name')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label for="bank_name"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Bank
                                                Name<span class="text-sm text-red-600">*</span></label>
                                            <input type="text" name="bank_name" id="bank_name"
                                                placeholder="Enter Bank Name"
                                                class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                value="{{ old('bank_name', !empty($user->bankDetail->bank_name) ? Crypt::decryptString($user->bankDetail->bank_name) : '') }}">
                                            @error('bank_name')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label for="bank_address"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Bank
                                                Address<span class="text-sm text-red-600">*</span></label>
                                            <input type="text" name="bank_address" id="bank_address"
                                                placeholder="Enter Bank Address"
                                                class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                value="{{ old('bank_address', !empty($user->bankDetail->bank_address) ? Crypt::decryptString($user->bankDetail->bank_address) : '') }}">
                                            @error('bank_address')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>


                                    </div>
                                    <div class="col-span-12 lg:col-span-6">
                                        <div class="mb-4">
                                            <label for="branch_number"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Branch
                                                Number<span class="text-sm text-red-600">*</span></label>
                                            <input type="text" name="branch_number" id="branch_number"
                                                placeholder="Enter Branch Number"
                                                class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                value="{{ old('branch_number', !empty($user->bankDetail->branch_number) ? Crypt::decryptString($user->bankDetail->branch_number) : '') }}">
                                            @error('branch_number')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label for="institute_number"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Institute
                                                Number<span class="text-sm text-red-600">*</span></label>
                                            <input type="text" name="institute_number" id="institute_number"
                                                placeholder="Enter Institute Number"
                                                class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                value="{{ old('institute_number', !empty($user->bankDetail->institute_number) ? Crypt::decryptString($user->bankDetail->institute_number) : '') }}">
                                            @error('institute_number')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label for="routing_number"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Routing
                                                Number<span class="text-sm text-red-600">*</span></label>
                                            <input type="text" name="routing_number" id="routing_number"
                                                placeholder="Enter Routing Number"
                                                class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                value="{{ old('routing_number', !empty($user->bankDetail->routing_number) ? Crypt::decryptString($user->bankDetail->routing_number) : '') }}">
                                            @error('routing_number')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label for="swift_bic_code"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Swift / Bic
                                                Code<span class="text-sm text-red-600">*</span></label>
                                            <input type="text" name="swift_bic_code" id="swift_bic_code"
                                                placeholder="Enter Swift / Bic Code"
                                                class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                value="{{ old('swift_bic_code', !empty($user->bankDetail->swift_bic_code) ? Crypt::decryptString($user->bankDetail->swift_bic_code) : '') }}">
                                            @error('swift_bic_code')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3 col-span-6 sm:col-span-4 flex items-center justify-center">
                                    <button type="submit"
                                        class="mr-1 font-medium text-white border-transparent btn bg-violet-500 w-28 hover:bg-violet-700 focus:bg-violet-700 focus:ring focus:ring-violet-50">Submit</button>
                                    <a class="font-medium text-white border-transparent btn bg-red-500 w-28 hover:bg-red-700 focus:bg-red-700 focus:ring focus:ring-red-50"
                                        href="{{ route('home') }}">
                                        Back
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @include('layouts.footer')
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript" src="{{ asset('js/libs/jquery-3.7.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/libs/jquery.validate.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/alertifyjs/build/alertify.min.js') }}"></script>
    <script src="{{ asset('js/backend/profile.js') }}"></script>
    <script>
        $(function() {
            profile.bankDetail();
        });
    </script>
@endsection
