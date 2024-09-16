@extends('layouts.master')
@section('title')
{{ __('Create Service') }}
@endsection
@section('css')
@endsection
@section('content')
<div class="main-content group-data-[sidebar-size=sm]:ml-[70px]">
    <div class="page-content dark:bg-zinc-700">
        <div class="container-fluid px-[0.625rem]">

            <!-- page title -->
            <x-page-title title="Create Service" pagetitle="Service" />

            <div class="grid grid-cols-1 mt-3">
                <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                    <form action="{{ route('services.store') }}" method="POST" id="serviceForm" class="service-create-form">
                        @csrf
                        <div class="card-body">
                            <div class="grid grid-cols-12 gap-x-6">
                                <div class="col-span-12 lg:col-span-6">
                                    <div class="mb-4">
                                        <label for="service_name" class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Service
                                            Name<span class="text-sm text-red-600">*</span></label>
                                        <input type="text" class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100" id="service_name" name="service_name" placeholder="Service Name" value="{{ old('service_name') }}">
                                        @error('service_name')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label for="description" class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Description<span class="text-sm text-red-600">*</span></label>
                                        <input type="text" class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100" id="description" name="description" placeholder="Description" value="{{ old('description') }}">
                                        @error('description')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label for="service_group" class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Service
                                            Group<span class="text-sm text-red-600">*</span></label>
                                        <select name="service_group" id="service_group" class="w-full rounded placeholder:text-sm py-2 border-gray-100 dark:bg-zinc-700/50 dark:border-zinc-600 dark:text-gray-100 dark:placeholder:text-zinc-100/60" value="{{ old('service_group') }}">
                                            @foreach (config('enum.service_group') as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                        @error('service_group')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label for="service_type" class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Service
                                            Type<span class="text-sm text-red-600">*</span></label>
                                        <select class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100" id="service_type" name="service_type">
                                            <option value="">Select Service Type</option>
                                            <option value="0" {{ old('service_type') == '0' ? 'selected' : '' }}>
                                                Regular</option>
                                            <option value="1" {{ old('service_type') == '1' ? 'selected' : '' }}>
                                                Cards
                                            </option>
                                        </select>
                                        @error('service_type')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label for="price" class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Price<span class="text-sm text-red-600">*</span></label>
                                        <input type="number" class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100" id="price" name="price" placeholder="Price" value="{{ old('price') }}">
                                        @error('price')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div>
                                        <div class="col-span-6">
                                            <label class="block mb-2 font-medium text-red-700 dark:text-red-100"><span class="text-sm text-red-600">*</span><strong>Advance</strong></label>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <div class="grid grid-cols-12 gap-6">
                                            <div class="col-span-6 lg:col-span-1">
                                                <div class="mt-2">
                                                    <label for="down_rate" class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Down Rate
                                                        (kbps)<span class="text-sm text-red-600">*</span></label>
                                                    <input type="number" class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100" id="down_rate" name="down_rate" value="{{ old('down_rate', 0) }}">
                                                    @error('down_rate')
                                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-span-6 lg:col-span-1">
                                                <div class="mt-2">
                                                    <label for="up_rate" class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Up Rate
                                                        (kbps)<span class="text-sm text-red-600">*</span></label>
                                                    <input type="number" class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100" id="up_rate" name="up_rate" value="{{ old('up_rate', 0) }}">
                                                    @error('up_rate')
                                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="mb-4">
                                        <input type="checkbox" id="is_enable_burst_mode" name="is_enable_burst_mode" class="align-middle rounded focus:ring-0 focus:ring-offset-0 dark:bg-zinc-700 dark:border-zinc-400 checked:bg-violet-500 dark:checked:bg-violet-500">
                                        <label for="is_enable_burst_mode" class="text-sm font-medium text-gray-700">Enable
                                            Burst
                                            Mode</label>
                                    </div>
                                    <div class="mb-4 burst-fields">
                                        <label for="burst_limit" class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Burst
                                            Limit
                                            (kbps)</label>
                                        <input type="number" class="p-2 border border-gray-300 rounded-md" id="burst_limit" name="burst_limit" value="{{ old('burst_limit', 0) }}">
                                        @error('burst_limit')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                        <span>/</span>
                                        <input type="number" class="p-2 border border-gray-300 rounded-md" id="from_burst_limit" name="from_burst_limit" value="{{ old('from_burst_limit', 0) }}">
                                        @error('from_burst_limit')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-4 burst-fields">
                                        <label for="threshold_limit" class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Threshold
                                            Limit
                                            (kbps)</label>
                                        <input type="number" class="p-2 border border-gray-300 rounded-md" id="threshold_limit" name="threshold_limit" value="{{ old('threshold_limit', 0) }}">
                                        @error('threshold_limit')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                        <span>/</span>
                                        <input type="number" class="p-2 border border-gray-300 rounded-md" id="from_threshold_limit" name="from_threshold_limit" value="{{ old('from_threshold_limit', 0) }}">
                                        @error('from_threshold_limit')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-4 burst-fields">
                                        <label for="burst_time" class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Burst
                                            Time
                                            (Seconds)</label>
                                        <input type="number" class="p-2 border border-gray-300 rounded-md" id="burst_time" name="burst_time" value="{{ old('burst_time', 0) }}">
                                        @error('burst_time')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                        <span>/</span>
                                        <input type="number" class="p-2 border border-gray-300 rounded-md" id="from_burst_time" name="from_burst_time" value="{{ old('from_burst_time', 0) }}">
                                        @error('from_burst_time')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-4 burst-fields">
                                        <label for="priority" class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Priority<span class="text-sm text-red-600">*</span></label>
                                        <input type="number" class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100" id="priority" name="priority" value="{{ old('priority', 0) }}">
                                        @error('priority')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                </div>
                                <div class="col-span-12 lg:col-span-6">
                                    <div class="mb-1">
                                        <div class="col-span-12 lg:col-span-12 flex mb-2">
                                            <div>
                                                <input type="checkbox" id="is_data_limiter_enable" name="is_data_limiter_enable" class="align-middle rounded focus:ring-0 focus:ring-offset-0 dark:bg-zinc-700 dark:border-zinc-400 checked:bg-violet-500 dark:checked:bg-violet-500" value="1" {{ old('is_data_limiter_enable') ? 'checked' : '' }}>
                                                @error('is_data_limiter_enable')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <label for="data_limiter" class="block font-medium ml-2 text-gray-700 dark:text-gray-100">DATA
                                                Limiter<span class="text-sm text-red-600">*</span></label>
                                        </div>
                                        <div class="grid grid-cols-12 gap-6">
                                            <div class="col-span-6 lg:col-span-6">
                                                <div class="mb-3">
                                                    <input type="number" class="data_limiter w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100" id="data_limiter" name="data_limiter" value="{{ old('data_limiter', 0) }}" disabled>
                                                    @error('data_limiter')
                                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-span-6 lg:col-span-6">
                                                <div class="mb-3">
                                                    <select name="data_limiter_misc_id" class="data_limiter w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100" id="data_limiter_misc_id" disabled>
                                                        @foreach ($storageUnit as $id => $title)
                                                        <option value="{{ $id }}" {{ old('data_limiter_misc_id') == $id ? 'selected' : '' }}>
                                                            {{ $title }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                    @error('data_limiter_misc_id')
                                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-1">
                                        <div class="col-span-12 lg:col-span-12 mb-2 flex">
                                            <div>
                                                <input type="checkbox" id="is_uptime_limiter_enable" name="is_uptime_limiter_enable" class="align-middle rounded focus:ring-0 focus:ring-offset-0 dark:bg-zinc-700 dark:border-zinc-400 checked:bg-violet-500 dark:checked:bg-violet-500" value="1" {{ old('is_uptime_limiter_enable') ? 'checked' : '' }}>
                                                @error('is_uptime_limiter_enable')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <label for="uptime_limiter" class="block font-medium ml-2 text-gray-700 dark:text-gray-100">Uptime
                                                Limiter</label>
                                        </div>
                                        <div class="grid grid-cols-12 gap-6">
                                            <div class="col-span-6 lg:col-span-6">
                                                <div class="mb-3">
                                                    <input type="number" id="uptime_limiter" name="uptime_limiter" value="{{ old('uptime_limiter', 0) }}" class="uptime_limiter w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100" disabled>
                                                    @error('uptime_limiter')
                                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-span-6 lg:col-span-6">
                                                <div class="mb-3">
                                                    <select name="uptime_limiter_misc_id" class="uptime_limiter w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100" disabled>
                                                        @foreach ($timeUnit as $id => $title)
                                                        <option value="{{ $id }}" {{ old('uptime_limiter_misc_id') == $id ? 'selected' : '' }}>
                                                            {{ $title }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                    @error('uptime_limiter_misc_id')
                                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-8">

                                        <div class="col-span-12 lg:col-span-12 mb-2 flex">
                                            <div>
                                                <input type="checkbox" id="is_expiration_limiter_enable" name="is_expiration_limiter_enable" class="align-middle rounded focus:ring-0 focus:ring-offset-0 dark:bg-zinc-700 dark:border-zinc-400 checked:bg-violet-500 dark:checked:bg-violet-500" value="1" {{ old('is_expiration_limiter_enable') ? 'checked' : '' }}>
                                                @error('is_expiration_limiter_enable')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <label for="expiration_limiter" class="block ml-2 font-medium text-gray-700 dark:text-gray-100">Expiration
                                                Limiter</label>
                                        </div>

                                        <div class="grid grid-cols-12 gap-6">
                                            <div class="col-span-6 lg:col-span-6">
                                                <div class="mb-3">
                                                    <input type="number" id="expiration_limiter" name="expiration_limiter" value="{{ old('expiration_limiter', 0) }}" class="expiration_limiter w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100" disabled>
                                                    @error('expiration_limiter')
                                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-span-6 lg:col-span-6">
                                                <div class="mb-3">
                                                    <select name="expiration_limiter_misc_id" class="expiration_limiter w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100" disabled>
                                                        @foreach ($timeUnit as $id => $title)
                                                        <option value="{{ $id }}" {{ old('expiration_limiter_misc_id') == $id ? 'selected' : '' }}>
                                                            {{ $title }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                    @error('expiration_limiter_misc_id')
                                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-8 flex">
                                        <div class="mr-2">
                                            <input type="checkbox" id="is_data_carry" name="is_data_carry" class="align-middle rounded focus:ring-0 focus:ring-offset-0 dark:bg-zinc-700 dark:border-zinc-400 checked:bg-violet-500 dark:checked:bg-violet-500" {{ old('is_data_carry') ? 'checked' : '' }}>
                                            <label for="is_data_carry" class="text-sm font-medium text-gray-700">Data
                                                Carry</label>
                                        </div>
                                        <div class="mr-2">
                                            <input type="checkbox" id="is_uptime_carry" name="is_uptime_carry" class="align-middle rounded focus:ring-0 focus:ring-offset-0 dark:bg-zinc-700 dark:border-zinc-400 checked:bg-violet-500 dark:checked:bg-violet-500" {{ old('is_uptime_carry') ? 'checked' : '' }}>
                                            <label for="is_uptime_carry" class="text-sm font-medium text-gray-700">Uptime
                                                Carry</label>
                                        </div>
                                        <div class="mr-2">
                                            <input type="checkbox" id="is_date_carry" name="is_date_carry" class="align-middle rounded focus:ring-0 focus:ring-offset-0 dark:bg-zinc-700 dark:border-zinc-400 checked:bg-violet-500 dark:checked:bg-violet-500" {{ old('is_date_carry') ? 'checked' : '' }}>
                                            <label for="is_date_carry" class="text-sm font-medium text-gray-700">Date
                                                Carry</label>
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <label for="service_mode" class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Service
                                            Mode<span class="text-sm text-red-600">*</span></label>
                                        <select id="service_mode" name="service_mode" class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100">
                                            <option value="">Select Service Mode</option>
                                            @foreach ($serviceMode as $id => $title)
                                            <option value="{{ $id }}" {{ old('service_mode') == $id ? 'selected' : '' }}>
                                                {{ $title }}
                                            </option>
                                            @endforeach
                                        </select>
                                        @error('service_mode')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="default-hides">
                                        {{-- For FUP --}}
                                        <div class="fup-hide p-4">
                                            <div class="mb-4 extra_service_mode">
                                                <label for="next_fup_service" class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Next
                                                    FUP
                                                    Service<span class="text-sm text-red-600">*</span></label>
                                                <select id="next_fup_service" name="next_fup_service" class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100">
                                                    <option value="">Select</option>
                                                    @foreach ($allServices as $id => $title)
                                                    <option value="{{ $id }}" {{ old('next_fup_service') == $id ? 'selected' : '' }}>
                                                        {{ $title }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                @error('next_fup_service')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="mb-4 flex">
                                                <div class="mr-2 mt-2 extra_service_mode">
                                                    <input type="checkbox" id="reset_data_interval" name="reset_data_interval" class="align-middle rounded focus:ring-0 focus:ring-offset-0 dark:bg-zinc-700 dark:border-zinc-400 checked:bg-violet-500 dark:checked:bg-violet-500" {{ old('reset_data_interval') ? 'checked' : '' }} value="1">
                                                    <label for="reset_data_interval" class="text-sm font-medium text-gray-700">Reset
                                                        DATA Interval</label>
                                                </div>
                                                <div class="mr-2 extra_service_mode">
                                                    <input type="number" id="data_interval_value" name="data_interval_value" value="{{ old('data_interval_value', 0) }}" class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100 interval-enable" disabled>
                                                </div>
                                                <div class="mr-2 extra_service_mode">
                                                    <select name="data_interval_time_unit" class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100 interval-enable" disabled>
                                                        @foreach ($timeUnit as $id => $title)
                                                        <option value="{{ $id }}" {{ old('data_interval_time_unit') == $id ? 'selected' : '' }}>
                                                            {{ $title }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- For daily quota --}}
                                        <div class="daily-quota p-4">
                                            <div class="mb-5 flex">
                                                <div class="mr-2 mt-2 daily_quota">
                                                    <input type="checkbox" id="daily_data_limiter" name="daily_data_limiter" class="align-middle rounded focus:ring-0 focus:ring-offset-0 dark:bg-zinc-700 dark:border-zinc-400 checked:bg-violet-500 dark:checked:bg-violet-500" {{ old('daily_data_limiter') ? 'checked' : '' }} value="1">
                                                    <label for="daily_data_limiter" class="text-sm font-medium text-gray-700">Data Limiter</label>
                                                </div>
                                                <div class="mr-2 daily_quota">
                                                    <input type="number" id="daily_datalimiter_value" name="daily_datalimiter_value" value="{{ old('daily_datalimiter_value', 0) }}" class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100 data-limiter-enable" disabled>
                                                </div>
                                                <div class="mr-2 daily_quota">
                                                    <select name="daily_time_unit" class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100 data-limiter-enable" disabled>
                                                        @foreach ($storageUnit as $id => $title)
                                                        <option value="{{ $id }}" {{ old('daily_time_unit') == $id ? 'selected' : '' }}>
                                                            {{ $title }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="mb-5 flex">
                                                <div class="mr-2 mt-2 daily_quota">
                                                    <input type="checkbox" id="daily_uptime_limiter" name="daily_uptime_limiter" class="align-middle rounded focus:ring-0 focus:ring-offset-0 dark:bg-zinc-700 dark:border-zinc-400 checked:bg-violet-500 dark:checked:bg-violet-500" {{ old('daily_uptime_limiter') ? 'checked' : '' }} value="1">
                                                    <label for="daily_uptime_limiter" class="text-sm font-medium text-gray-700">Uptime
                                                        Limiter</label>
                                                </div>
                                                <div class="mr-2 daily_quota">
                                                    <input type="number" id="daily_uptimelimiter_val" name="daily_uptimelimiter_val" value="{{ old('daily_uptimelimiter_val', 0) }}" class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100 uptime-limiter-enable" disabled>
                                                </div>
                                                <div class="mr-2 daily_quota">
                                                    <select name="daily_uptimelimiter_unit" class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100 uptime-limiter-enable" disabled>
                                                        @foreach ($timeUnit as $id => $title)
                                                        <option value="{{ $id }}" {{ old('daily_uptimelimiter_unit') == $id ? 'selected' : '' }}>
                                                            {{ $title }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="mb-4 daily_quota">
                                                <label for="next_daily_service" class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Next
                                                    Daily
                                                    Service<span class="text-sm text-red-600">*</span></label>
                                                <select id="next_daily_service" name="next_daily_service" class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100">
                                                    <option value="">Select</option>
                                                    @foreach ($allServices as $id => $title)
                                                    <option value="{{ $id }}" {{ old('next_daily_service') == $id ? 'selected' : '' }}>
                                                        {{ $title }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                @error('next_daily_service')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="col-span-6 sm:col-span-4 flex items-center justify-center">
                                <button type="submit" class="mr-1 font-medium text-white border-transparent btn bg-violet-500 w-28 hover:bg-violet-700 focus:bg-violet-700 focus:ring focus:ring-violet-50">Submit</button>
                                <a class="font-medium text-white border-transparent btn bg-red-500 w-28 hover:bg-red-700 focus:bg-red-700 focus:ring focus:ring-red-50" href="{{ route('services.index') }}">
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
<script src="{{ asset('js/backend/service.js') }}"></script>
<script>
    $(function() {
        service.create();
    });
</script>
@endsection