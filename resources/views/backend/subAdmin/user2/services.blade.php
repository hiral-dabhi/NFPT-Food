@extends('layouts.master')
@section('title')
    {{ __('Edit User') }}
@endsection
@section('css')
    <style>
        .select2-results__option {
            padding-right: 20px;
            vertical-align: middle;
        }
        .disabled {
            background-color: #d7d7d7 !important; /* Change this color to match your desired gray */
            color: #666; /* Change this color to match your desired text color */
            cursor: not-allowed; /* Optional: Change cursor to indicate that the input is disabled */
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

        .select2-results__option[aria-selected=true]::before {
            content: "\2714";
            color: #fff;
            background-color: #67a272;
            border: 0;
            display: inline-block;
            margin-right: 5px;
            padding: 2px 6px;
            font-size: 14px;
            line-height: 1;
            border-radius: 3px; 
        }
        .custom-modal{
            overflow-y: scroll;
            max-height: 700px;
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
                <x-page-title title="Edit user" pagetitle="User" />

                <div class="grid grid-cols-1">
                    @include('components.alert-message')
                    <div class="flex flex-wrap card-body">
                        <div class="nav-tabs border-b-tabs">
                            <ul
                                class="flex flex-wrap w-full text-sm font-medium text-center text-gray-500 border-b border-gray-100 nav dark:border-gray-700 dark:text-gray-400">
                                <li>
                                    <a href="{{ route('user.edit', $user->id) }}" class="inline-block p-4 ">General</a>
                                </li>
                                <li>
                                    <a href="{{ route('user.services', $user->id) }}"
                                        class="inline-block p-4 active">Services</a>
                                </li>
                                <li>
                                    <a href="{{ route('user.settings', $user->id) }}" class="inline-block p-4">Settings</a>
                                </li>
                                <li>
                                    <a href="{{ route('user.document', $user->id) }}" class="inline-block p-4">Documents</a>
                                </li>
                                <li>
                                    <a href="{{ route('user.statistic', $user->id) }}" class="inline-block p-4">Statistics</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                        <div class="card-body">
                            <div class="grid grid-cols-12 gap-x-6">
                                <div class="col-span-12 lg:col-span-4">
                                    <div id="external-events">
                                        <div class="mt-4">
                                            <div class="cursor-pointer bg-gray-500/30 px-4 py-2 rounded text-gray-800 mx-2 my-[5px] dark:bg-gray-100 text-[13px]"
                                                data-class="bg-green-500" data-tw-toggle="modal"
                                                data-tw-target="#add_credit">
                                                <i class="align-middle  bx bx-plus-medical text-11 ltr:mr-2 rtl:ml-2"></i>
                                                Add Credit
                                            </div>
                                            <div class="cursor-pointer bg-gray-500/30 px-4 py-2 rounded text-gray-800 mx-2 my-[5px] dark:bg-gray-100 text-[13px]"
                                                data-class="bg-sky-500" data-tw-toggle="modal"
                                                data-tw-target="#add_deposit">
                                                <i
                                                    class="align-middle  bx bx-plus-medical text-11 ltr:mr-2 rtl:ml-2"></i>Add
                                                Deposit
                                            </div>
                                            <div class="cursor-pointer bg-gray-500/30 px-4 py-2 rounded text-gray-800 mx-2 my-[5px] dark:bg-gray-100 text-[13px]"
                                                data-class="bg-yellow-500" data-tw-toggle="modal"
                                                data-tw-target="#override_bandwidth">
                                                <i
                                                    class="align-middle  bx bx-transfer-alt text-11 ltr:mr-2 rtl:ml-2"></i>Override
                                                Bandwidth
                                            </div>
                                            <div class="cursor-pointer bg-gray-500/30 px-4 py-2 rounded text-gray-800 mx-2 my-[5px] dark:bg-gray-100 text-[13px]"
                                                data-class="bg-red-500">
                                                <i class="align-middle  bx bx-list-ul text-11 ltr:mr-2 rtl:ml-2"></i>List
                                                Invoice
                                            </div>
                                            <div class="cursor-pointer bg-gray-500/30 px-4 py-2 rounded text-gray-800 mx-2 my-[5px] dark:bg-gray-100 text-[13px]"
                                                data-class="bg-zinc-800">
                                                <i class="align-middle  bx bx-history text-11 ltr:mr-2 rtl:ml-2"></i>Service
                                                History
                                            </div>
                                            <div class="cursor-pointer bg-gray-500/30 px-4 py-2 rounded text-gray-800 mx-2 my-[5px] dark:bg-gray-100 text-[13px]"
                                                data-class="bg-zinc-800" data-tw-toggle="modal"
                                                data-tw-target="#add_schedule">
                                                <i class="align-middle  bx bxs-time text-11 ltr:mr-2 rtl:ml-2"></i>Add
                                                Schedule
                                            </div>
                                            <div class="cursor-pointer bg-gray-500/30 px-4 py-2 rounded text-gray-800 mx-2 my-[5px] dark:bg-gray-100 text-[13px]"
                                                data-class="bg-zinc-800">
                                                <i class="align-middle bx bx-list-ul text-11 ltr:mr-2 rtl:ml-2"></i><a
                                                    href="{{ route('user.schedule', $user->id) }}">
                                                    List Schedule
                                                </a>
                                            </div>
                                            <div class="cursor-pointer bg-gray-500/30 px-4 py-2 rounded text-gray-800 mx-2 my-[5px] dark:bg-gray-100 text-[13px]"
                                                data-class="bg-zinc-800">
                                                <i class="align-middle  bx bx-list-ul text-11 ltr:mr-2 rtl:ml-2"></i> <a href="{{ route('user.wallet-index', $user->id) }}">Wallet</a>
                                            </div>
                                            <div class="cursor-pointer bg-gray-500/30 px-4 py-2 rounded text-gray-800 mx-2 my-[5px] dark:bg-gray-100 text-[13px]"
                                                data-class="bg-zinc-800">
                                                <i
                                                    class="align-middle  bx bx-list-ul text-11 ltr:mr-2 rtl:ml-2"></i><a href="{{ route('user.statement-index', $user->id) }}">Statement(s)</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-12 lg:col-span-8">
                                    <form method="POST" action="{{ route('user.update.services', $user->id) }}"
                                        class="user-service" id="user_service" enctype="multipart/form-data">
                                        @csrf
                                        <label class="block text-sm font-medium text-red-700">Policy Configuration</label>
                                        <div class="hidden sm:block">
                                            <div class="py-4">
                                                <div class="border-t border-gray-200"></div>
                                            </div>
                                        </div>
                                        <div class="mb-4">
                                            <label for="service_id"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Service /
                                                Plan<span class="text-sm text-red-600">*</span></label>
                                            <select name="service_id" id="service_id"
                                                class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                value="{{ old('service_id') }}">
                                                <option value="">Select Service</option>
                                                @foreach ($services as $key => $value)
                                                    <option value="{{ $key }}"
                                                        {{ $user->userDetail->service_id == $key ? 'selected' : '' }}>
                                                        {{ $value }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('service_id')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label for="nas_id"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100">NAS<span
                                                    class="text-sm text-red-600">*</span></label>
                                            <select name="nas_id[]" id="nas_id"
                                                class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100 multi-select"
                                                multiple="multiple">
                                                @foreach ($nas as $key => $value)
                                                    <option value="{{ $key }}"
                                                        {{ in_array($key, $currentNass) ? 'selected' : '' }}>
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
                                        <div class="mb-4">
                                            <label for="concurrent_user"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Concurrent
                                                User<span class="text-sm text-red-600">*</span></label>
                                            <input type="number" name="concurrent_user" id="concurrent_user"
                                                placeholder="Enter Concurrent User"
                                                class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                value="{{ old('concurrent_user', $user->userDetail->concurrent_user ?? '') }}"
                                                min="1">
                                            @error('concurrent_user')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="mb-4">
                                            <label for="cpe_mac_address"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100">CPE
                                                MAC-Address<span class="text-sm text-red-600">*</span></label>
                                            <textarea type="text" name="cpe_mac_address" id="cpe_mac_address" placeholder="Enter CPE MAC-Address"
                                                class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100">{{ old('cpe_mac_address', $user->userDetail->cpe_mac_address ?? '') }}</textarea>
                                            @error('cpe_mac_address')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                            <div class="mac-address-error"></div>
                                            <label class="font-medium text-gray-700 ltr:mr-2 rtl:ml-2 dark:text-zinc-100"
                                                for="formrow-customCheck">Allow this MAC(s) only</label>
                                            <input type="checkbox"
                                                class="align-middle rounded focus:ring-0 focus:ring-offset-0 dark:bg-zinc-700 dark:border-zinc-400 checked:bg-violet-500 dark:checked:bg-violet-500 ckb-mac"
                                                name="is_mac"
                                                {{ old('is_mac', $user->userDetail->is_mac) === '1' ? 'checked' : '' }}
                                                value="1">
                                        </div>

                                        <div class="hidden sm:block">
                                            <div class="py-4">
                                                <div class="border-t border-gray-200"></div>
                                            </div>
                                        </div>
                                        <label class="block text-sm font-medium text-red-700">IPv4 Configuration</label>
                                        <div class="hidden sm:block">
                                            <div class="py-4">
                                                <div class="border-t border-gray-200"></div>
                                            </div>
                                        </div>

                                        <div class="mb-4">
                                            <label for="ipv4_mode"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100">IPv4
                                                Mode<span class="text-sm text-red-600">*</span></label>
                                            <select name="ipv4_mode" id="ipv4_mode"
                                                class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                value="{{ old('ipv4_mode') }}">
                                                @foreach (config('enum.ipv4_mode') as $key => $value)
                                                    <option value="{{ $key }}"
                                                        {{ $key == $user->userDetail->ipv4_mode ? 'selected' : '' }}>
                                                        {{ $value }}
                                                    </option>
                                                @endforeach
                                            </select>

                                            @error('ipv4_mode')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div
                                            class="ipv4-static-div {{ $user->userDetail->ipv4_mode == '1' ? '' : 'hidden' }}">
                                            <div class="mb-4 flex">
                                                <label for="ipv4_static_pool"
                                                    class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Static
                                                    IPv4
                                                    <span class="text-sm text-red-600">*</span></label>
                                                <div class="mr-2 flex-1">
                                                    <select name="ipv4_static_pool" id="ipv4_static_pool"
                                                        class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                        value="{{ old('ipv4_static_pool') }}">
                                                        <option value="">Select Static Pool</option>
                                                        @foreach ($IPv4Static as $key => $value)
                                                            <option value="{{ $key }}"
                                                                {{ old('ipv4_static_pool', $user->userDetail->ipv4_static_pool) == $key ? 'selected' : '' }}>
                                                                {{ $value }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('ipv4_static_pool')
                                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="mr-2 flex-1">
                                                    <select name="ipv4_static_ip" id="ipv4_static_ip"
                                                        class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                        value="{{ old('ipv4_static_ip') }}">
                                                        <option value="">Select Static IP</option>
                                                    </select>
                                                    @error('ipv4_static_ip')
                                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                                    @enderror
                                                </div>

                                            </div>
                                            <div class="mb-4">
                                                <label for="ipv4_expirydate"
                                                    class="block mb-2 font-medium text-gray-700 dark:text-gray-100">IPv4
                                                    Expiry
                                                    Date<span class="text-sm text-red-600">*</span></label>
                                                <input type="date" name="ipv4_expirydate" id="ipv4_expirydate"
                                                    placeholder="Select expiry date"
                                                    class="w-full border-gray-100 rounded placeholder:text-13 text-13 py-1.5 focus:border focus:ring focus:ring-violet-500/20 focus:border-violet-100 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 dark:text-zinc-100"
                                                    type="datetime-local"
                                                    value="{{ old('ipv4_expirydate', $user->userDetail->ipv4_expirydate ?? '') }}">
                                                @error('ipv4_expirydate')
                                                    <p class="error">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div
                                            class="ipv4-dhcp-div {{ $user->userDetail->ipv4_mode == '2' ? '' : 'hidden' }}">
                                            <div class="mb-4 flex">
                                                <label for="ipv4_dhcp_pool"
                                                    class="block mb-2 font-medium text-gray-700 dark:text-gray-100">IP Pool
                                                    <span class="text-sm text-red-600">*</span></label>
                                                <div class="mr-2 flex-1">
                                                    <select name="ipv4_dhcp_pool" id="ipv4_dhcp_pool"
                                                        class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                        value="{{ old('ipv4_dhcp_pool') }}">
                                                        <option value="">Select DHCP Pool</option>
                                                        @foreach ($IPv4DHCP as $key => $value)
                                                            <option value="{{ $key }}"
                                                                {{ old('ipv4_dhcp_pool', $user->userDetail->ipv4_dhcp_pool) == $key ? 'selected' : '' }}>
                                                                {{ $value }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('ipv4_dhcp_pool')
                                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="hidden sm:block">
                                            <div class="py-4">
                                                <div class="border-t border-gray-200"></div>
                                            </div>
                                        </div>
                                        <label class="block text-sm font-medium text-red-700">IPv6 Configuration</label>
                                        <div class="hidden sm:block">
                                            <div class="py-4">
                                                <div class="border-t border-gray-200"></div>
                                            </div>
                                        </div>

                                        <div class="mb-4">
                                            <label class="font-medium text-gray-700 ltr:mr-2 rtl:ml-2 dark:text-zinc-100"
                                                for="formrow-customCheck">IPv6 Prefix Enable</label>
                                            <input type="checkbox"
                                                class="ckb-prefix-enable align-middle rounded focus:ring-0 focus:ring-offset-0 dark:bg-zinc-700 dark:border-zinc-400 checked:bg-violet-500 dark:checked:bg-violet-500 "
                                                name="ipv6_prefix_enable" value="1"
                                                {{ old('ipv6_prefix_enable', $user->userDetail->ipv6_prefix_enable) == '1' ? 'checked' : '' }}>
                                        </div>

                                        <div
                                            class="ipv6-prefix-div {{ $user->userDetail->ipv6_prefix_enable != '1' ? 'hidden' : '' }}">
                                            <div class="mb-4 flex">
                                                <label for="ipv6_pool"
                                                    class="block mb-2 font-medium text-gray-700 dark:text-gray-100">IPv6
                                                    Prefix<span class="text-sm text-red-600">*</span></label>
                                                <div class="mr-2 flex-1">
                                                    <select name="ipv6_pool" id="ipv6_pool"
                                                        class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                        value="{{ old('ipv6_pool') }}">
                                                        <option value="">Select pool</option>
                                                        @foreach ($IPv6 as $key => $value)
                                                            <option value="{{ $key }}"
                                                                {{ old('ipv6_pool', $user->userDetail->ipv6_pool) == $key ? 'selected' : '' }}>
                                                                {{ $value }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('ipv6_pool')
                                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="mr-2 flex-1">
                                                    <select name="ipv6_prefix" id="ipv6_prefix"
                                                        class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                        value="{{ old('ipv6_prefix') }}">
                                                        <option value="">Select Prefix</option>
                                                        @foreach ($IPv6Prefix as $key => $value)
                                                            <option value="{{ $key }}"
                                                                {{ old('ipv6_pool', $user->userDetail->ipv6_prefix) == $key ? 'selected' : '' }}>
                                                                {{ $value }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('ipv6_prefix')
                                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                                    @enderror
                                                </div>

                                            </div>
                                            <div class="mb-4">
                                                <label for="ipv6_expirydate"
                                                    class="block mb-2 font-medium text-gray-700 dark:text-gray-100">IPv6
                                                    Prefix Expiry
                                                    Date<span class="text-sm text-red-600">*</span></label>
                                                <input type="date" name="ipv6_expirydate" id="ipv6_expirydate"
                                                    placeholder="Select expiry date"
                                                    class="w-full border-gray-100 rounded placeholder:text-13 text-13 py-1.5 focus:border focus:ring focus:ring-violet-500/20 focus:border-violet-100 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 dark:text-zinc-100"
                                                    type="datetime-local"
                                                    value="{{ old('ipv6_expirydate', $user->userDetail->ipv6_expirydate ?? '') }}">
                                                @error('ipv6_expirydate')
                                                    <p class="error">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-4">
                                            <label class="font-medium text-gray-700 ltr:mr-2 rtl:ml-2 dark:text-zinc-100"
                                                for="formrow-customCheck">IPv6 Delegation Enable</label>
                                            <input type="checkbox"
                                                class="ckb-prefix-delegation-enable align-middle rounded focus:ring-0 focus:ring-offset-0 dark:bg-zinc-700 dark:border-zinc-400 checked:bg-violet-500 dark:checked:bg-violet-500 ckb-portal-password"
                                                name="ipv6_delegation_enable" value="1"
                                                {{ old('ipv6_delegation_enable', $user->userDetail->ipv6_delegation_enable) == '1' ? 'checked' : '' }}>
                                        </div>
                                        <div
                                            class="ipv6-prefix-delegation-div {{ $user->userDetail->ipv6_delegation_enable != '1' ? 'hidden' : '' }}">
                                            <div class="mb-4 flex">
                                                <label for="ipv6_pool_delegation"
                                                    class="block mb-2 font-medium text-gray-700 dark:text-gray-100">IPv6
                                                    Prefix Delegation<span class="text-sm text-red-600">*</span></label>
                                                <div class="mr-2 flex-1">
                                                    <select name="ipv6_pool_delegation" id="ipv6_pool_delegation"
                                                        class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                        value="{{ old('ipv6_pool_delegation') }}">
                                                        <option value="">Select pool</option>
                                                        @foreach ($IPv6 as $key => $value)
                                                            <option value="{{ $key }}"
                                                                {{ old('ipv6_pool', $user->userDetail->ipv6_pool_delegation) == $key ? 'selected' : '' }}>
                                                                {{ $value }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('ipv6_pool_delegation')
                                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="mr-2 flex-1">
                                                    <select name="ipv6_prefix_delegation" id="ipv6_prefix_delegation"
                                                        class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                        value="{{ old('ipv6_prefix_delegation') }}">
                                                        <option value="">Select Prefix</option>
                                                        @foreach ($IPv6Prefix as $key => $value)
                                                            <option value="{{ $key }}"
                                                                {{ old('ipv6_pool', $user->userDetail->ipv6_prefix_delegation) == $key ? 'selected' : '' }}>
                                                                {{ $value }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('ipv6_prefix_delegation')
                                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                                    @enderror
                                                </div>

                                            </div>
                                            <div class="mb-4">
                                                <label for="ipv6_expirydate_delegation"
                                                    class="block mb-2 font-medium text-gray-700 dark:text-gray-100">IPv6
                                                    Prefix Expiry
                                                    Date<span class="text-sm text-red-600">*</span></label>
                                                <input type="date" name="ipv6_expirydate_delegation"
                                                    id="ipv6_expirydate_delegation" placeholder="Select expiry date"
                                                    class="w-full border-gray-100 rounded placeholder:text-13 text-13 py-1.5 focus:border focus:ring focus:ring-violet-500/20 focus:border-violet-100 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 dark:text-zinc-100"
                                                    type="datetime-local"
                                                    value="{{ old('ipv6_expirydate_delegation', $user->userDetail->ipv6_expirydate_delegation ?? '') }}">
                                                @error('ipv6_expirydate_delegation')
                                                    <p class="error">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="hidden sm:block">
                                            <div class="py-4">
                                                <div class="border-t border-gray-200"></div>
                                            </div>
                                        </div>
                                        <label class="block text-sm font-medium text-red-700">DATA Accounting / Billing
                                        </label>
                                        <div class="hidden sm:block">
                                            <div class="py-4">
                                                <div class="border-t border-gray-200"></div>
                                            </div>
                                        </div>

                                        <div class="mb-4">
                                            <label for="enable_billing"
                                                class="font-medium text-gray-700 ltr:mr-2 rtl:ml-2 dark:text-zinc-100"
                                                for="formrow-customCheck">Enable Billing</label>
                                            <input type="checkbox"
                                                class="align-middle rounded focus:ring-0 focus:ring-offset-0 dark:bg-zinc-700 dark:border-zinc-400 checked:bg-violet-500 dark:checked:bg-violet-500 ckb-portal-password"
                                                name="enable_billing" value="1" id="enable_billing"
                                                {{ old('enable_billing', $user->userDetail->enable_billing) == '1' ? 'checked' : '' }}>
                                        </div>
                                        <div
                                            class="billing-enable-div {{ $user->userDetail->enable_billing == '1' ? 'hidden' : '' }}">
                                            <div class="mb-4">
                                                <label for="data_limit"
                                                    class="block mb-2 font-medium text-gray-700 dark:text-gray-100">DATA
                                                    Limit (MB)<span class="text-sm text-red-600">*</span></label>
                                                <input type="number" name="data_limit" id="data_limit"
                                                    placeholder="Enter Data Limit"
                                                    class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                    value="{{ old('data_limit', $user->userDetail->data_limit ?? '') }}"
                                                    min="1">
                                                @error('data_limit')
                                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="mb-4">
                                                <label for="uptime_month"
                                                    class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Uptime
                                                    Limit (MM:DD:hh:mm)</label>
                                                <div class="grid grid-cols-12 gap-x-6">
                                                    <div class="col-span-12 lg:col-span-3">
                                                        <div class="mb-3">
                                                            <div class="relative">
                                                                <input type="number" name="uptime_month" min="0"
                                                                    id="uptime_month"
                                                                    class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                                    placeholder="MM"
                                                                    value="{{ old('uptime_month', $user->userDetail->uptime_month ?? '') }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-span-12 lg:col-span-3">
                                                        <div class="mb-3">
                                                            <div class="relative">
                                                                <input type="number" name="uptime_day" min="0"
                                                                    id="uptime_day"
                                                                    class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                                    placeholder="DD"
                                                                    value="{{ old('uptime_day', $user->userDetail->uptime_day ?? '') }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-span-12 lg:col-span-3">
                                                        <div class="mb-3">
                                                            <div class="relative">
                                                                <input type="number" name="uptime_hour" min="0"
                                                                    id="uptime_hour"
                                                                    class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                                    placeholder="hh"
                                                                    value="{{ old('uptime_hour', $user->userDetail->uptime_hour ?? '') }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-span-12 lg:col-span-3">
                                                        <div class="mb-3">
                                                            <div class="relative">
                                                                <input type="number" name="uptime_minute" min="0"
                                                                    id="uptime_minute"
                                                                    class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                                    placeholder="mm"
                                                                    value="{{ old('uptime_minute', $user->userDetail->uptime_minute ?? '') }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-4">
                                                <label for="expiration_date"
                                                    class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Expiration
                                                    Date<span class="text-sm text-red-600">*</span></label>
                                                <input type="date" name="expiration_date" id="expiration_date"
                                                    placeholder="Select Expiration Date"
                                                    class="w-full border-gray-100 rounded placeholder:text-13 text-13 py-1.5 focus:border focus:ring focus:ring-violet-500/20 focus:border-violet-100 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 dark:text-zinc-100"
                                                    type="datetime-local"
                                                    value="{{ old('expiration_date', $user->userDetail->expiration_date ?? '') }}">
                                                @error('expiration_date')
                                                    <p class="error">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mt-3 col-span-6 sm:col-span-4 flex items-center">
                                            <button type="submit"
                                                class="mr-1 font-medium text-white border-transparent btn bg-violet-500 w-28 hover:bg-violet-700 focus:bg-violet-700 focus:ring focus:ring-violet-50">Submit</button>
                                            <a class="font-medium text-white border-transparent btn bg-red-500 w-28 hover:bg-red-700 focus:bg-red-700 focus:ring focus:ring-red-50"
                                                href="{{ route('user.index') }}">
                                                Back
                                            </a>
                                        </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @include('layouts.footer')
            </div>
        </div>
    </div>

    @include('backend.user.serviceModal')
@endsection
@section('scripts')
    <script type="text/javascript" src="{{ asset('js/libs/jquery-3.7.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/libs/jquery.validate.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/libs/select2.full.min.js') }}"></script>
    <script>
        var getIp4s = "{{ route('user.ipv4.get') }}";
        var userId = "{{ $user->id }}";
        var ipv4PoolId = "{{ $user->userDetail->ipv4_static_pool }}";
        var ipv4staticIp = "{{ $user->userDetail->ipv4_static_ip }}";
        var servicePrice = "{{ ($user->userDetail->serviceDetail->price) ?? '0' }}";
        var totalTax = "{{$totalTax}}";
    </script>
    <script src="{{ asset('js/backend/user.js') }}"></script>
    <script>
        $(function() {
            user.services();
        });
    </script>
@endsection
