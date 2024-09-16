@extends('layouts.master')
@section('title', 'Edit Card')

@section('css')
    <style>
        .select2-results__option {
            padding-right: 20px;
            vertical-align: middle;
        }

        .select2-container,
        #secret {
            max-width: 490px;
        }

        .select2-selection--multiple {
            overflow: hidden !important;
            height: auto !important;
        }

        .select2-results__option:before {
            content: "";
            display: inline-block;
            position: relative;
            height: 20px;
            width: 20px;
            border: 2px solid #e9e9e9;
            border-radius: 4px;
            background-color: #fff;
            margin-right: 20px;
            vertical-align: middle;
        }

        .select2-results__option[aria-selected=true]:before {
            content: "\f00c";
            color: #fff;
            background-color: #67a272;
            border: 0;
            display: inline-block;
            padding-left: 3px;
        }
    </style>
    <!-- alertifyjs Css -->
    <link href="{{ URL::asset('build/libs/alertifyjs/build/css/alertify.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- alertifyjs default themes  Css -->
    <link rel="stylesheet" href="{{ asset('css/libs/select2.min.css') }}">
    <link href="{{ URL::asset('build/libs/alertifyjs/build/css/themes/default.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="main-content group-data-[sidebar-size=sm]:ml-[70px]">
        <div class="page-content dark:bg-zinc-700">
            <div class="container-fluid px-[0.625rem]">

                <!-- page title -->
                <x-page-title title="Edit Card" pagetitle="Card" />

                <div class="grid grid-cols-1 mt-3">
                    <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                        <form method="POST" action="{{ route('cards.update', $card->id) }}" class="card-edit-form">
                            @csrf
                            <div class="bg-white sm:p-6 shadow sm:rounded-md">
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-4">
                                        <label for="quantity"
                                            class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Unused
                                            Cards</label>
                                        <p class="ml-2 font-bold">{{ $card->quantity ?? '' }}</p>
                                        @error('quantity')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    @php
                                        $till_date = $card->valid_till ? $card->valid_till : date('Y-m-d');
                                    @endphp

                                    <div class="col-span-6 sm:col-span-4">
                                        <label for="valid_till"
                                            class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Valid Till<span
                                                class="text-sm text-red-600">*</span></label>
                                        <input type="date" name="valid_till" id="valid_till" placeholder="YYYY-MM-DD"
                                            class="w-full border-gray-100 rounded placeholder:text-13 text-13 py-1.5 focus:border focus:ring focus:ring-violet-500/20 focus:border-violet-100 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 dark:text-zinc-100"
                                            type="datetime-local" value="{{ old('valid_till', $till_date) }}">
                                        @error('valid_till')
                                            <p class="error">{{ $message }}</p>
                                        @enderror
                                    </div>


                                    <div class="col-span-6 sm:col-span-4">
                                        <label for="verification"
                                            class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Verification<span
                                                class="text-sm text-red-600">*</span></label>
                                        <select name="verification" id="verification"
                                            class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100">
                                            <option value="">Select</option>
                                            @foreach (config('enum.verification') as $key => $value)
                                                <option value="{{ $key }}"
                                                    {{ $key == $card->verification ? 'selected' : '' }}>
                                                    {{ $value }}</option>
                                            @endforeach
                                        </select>
                                        @error('verification')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="col-span-6 sm:col-span-4">
                                        <label for="service_id"
                                            class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Service<span
                                                class="text-sm text-red-600">*</span></label>
                                        <select name="service_id" id="service_id"
                                            class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100">
                                            <option value="">Select Service</option>
                                            @foreach ($cardServiceslist as $key => $value)
                                                <option value="{{ $key }}"
                                                    {{ $key == $card->service_id ? 'selected' : '' }}>
                                                    {{ $value }}</option>
                                            @endforeach
                                        </select>
                                        @error('service_id')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="col-span-6 sm:col-span-4">
                                        <label for="concurrent_user"
                                            class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Concurrent
                                            User<span class="text-sm text-red-600">*</span></label>
                                        <input type="number" name="concurrent_user" id="concurrent_user"
                                            placeholder="Enter concurrent_user"
                                            class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                            value="{{ old('concurrent_user', $card->concurrent_user ?? 1) }}">
                                        @error('concurrent_user')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-span-6 sm:col-span-4">
                                        <label for="nas_id"
                                            class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Last Allowed NAS</label>
                                        <input type="text" name="last_allowed_nas" id="last_allowed_nas"
                                            placeholder="Enter last_allowed_nas"
                                            class="w-full placeholder:text-13 font-bold text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                            value="{{ old('last_allowed_nas', implode(', ', $cardNasNames) ?? '') }}" disabled>
                                    </div>

                                    <div class="col-span-6 sm:col-span-4">
                                        <label for="nas_id"
                                            class="block mb-2 font-medium text-gray-700 dark:text-gray-100">NAS<span
                                                class="text-sm text-red-600">*</span></label>
                                        <select name="nas_id[]" id="nas_id"
                                            class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100 multi-select"
                                            multiple="multiple">
                                            @foreach ($nasList as $key => $value)
                                                <option value="{{ $key }}"
                                                    {{ in_array($key, $cardHasNas) ? 'selected' : '' }}>
                                                    {{ $value }}</option>
                                            @endforeach
                                        </select>
                                        @error('nas_id')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                        <a href="javascript:void(0)"
                                            class="bg-green-500 text-white font-bold py-2 px-4 rounded ml-4 select-all"
                                            id="select_btn">Select
                                            All</a>
                                        <div class="nas-error-div"></div>
                                    </div>

                                    <div class="col-span-6 sm:col-span-4">
                                        <label for="operator_id"
                                            class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Operator<span
                                                class="text-sm text-red-600">*</span></label>
                                        <select name="operator_id" id="operator_id"
                                            class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                            value="{{ old('operator_id') }}">
                                            <option value="">None</option>
                                            @foreach ($operatorList as $key => $value)
                                                <option value="{{ $value->id }}"
                                                    {{ $value->id == $card->operator_id ? 'selected' : '' }}>
                                                    {{ $value->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('operator_id')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="col-span-6 sm:col-span-4 flex items-center justify-center">
                                        <button type="submit"
                                            class="mr-1 font-medium text-white border-transparent btn bg-violet-500 w-28 hover:bg-violet-700 focus:bg-violet-700 focus:ring focus:ring-violet-50">Submit</button>
                                        <a class="font-medium text-white border-transparent btn bg-red-500 w-28 hover:bg-red-700 focus:bg-red-700 focus:ring focus:ring-red-50"
                                            href="{{ route('cards.index') }}">
                                            Back
                                        </a>
                                    </div>
                                    <div class="mt-4 col-span-6 sm:col-span-4 flex items-center justify-center">
                                        <h6 class="text-gray-700 text-15 dark:text-gray-100">Other Actions</h6>
                                    </div>
                                    <div class="col-span-6 sm:col-span-4 flex items-center justify-center">
                                        <div class="text-blue-500 font-medium cursor-pointer" data-class="bg-green-500" data-tw-toggle="modal" data-tw-target="#generate_invoice">
                                            [Disable]
                                        </div>
                                        <a class="ml-1 font-medium text-blue-500 delete-link" href="{{ route('cards.destroy', $card->id) }}">
                                            [Delete]
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- footer -->
                @include('backend.cards.disable-card')
                @include('layouts.footer')
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{ asset('js/libs/jquery-3.7.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/libs/select2.full.min.js') }}"></script>
    <script src="{{ asset('js/backend/cards.js') }}"></script>
    <script>
        $(function() {
            card.edit();
        });
    </script>
@endsection
