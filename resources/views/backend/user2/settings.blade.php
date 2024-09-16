@extends('layouts.master')
@section('title')
    {{ __('Edit User') }}
@endsection
@section('css')
    <link href="{{ URL::asset('build/libs/alertifyjs/build/css/alertify.min.css') }}" rel="stylesheet" type="text/css" />
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
                                    <a href="{{route('user.services', $user->id) }}" class="inline-block p-4">Services</a>
                                </li>
                                <li>
                                    <a href="{{ route('user.settings', $user->id) }}"
                                        class="inline-block p-4 active">Settings</a>
                                </li>
                                <li>
                                    <a href="{{ route('user.document', $user->id) }}"
                                        class="inline-block p-4">Documents</a>
                                </li>
                                <li>
                                    <a href="{{ route('user.statistic', $user->id) }}" class="inline-block p-4">Statistics</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                        <div class="card-body">
                            <form method="POST" action="{{ route('user.update.setting', $user->id) }}" class="user-setting"
                                id="user_setting" enctype="multipart/form-data">
                                @csrf
                                <div class="grid grid-cols-12 gap-x-6">
                                    <div class="col-span-12 lg:col-span-6">
                                        <label class="block text-sm font-medium text-red-700">Alerts</label>
                                        <div class="hidden sm:block">
                                            <div class="py-8">
                                                <div class="border-t border-gray-200"></div>
                                            </div>
                                        </div>
                                        <div class="mb-4">
                                            <label class="font-medium text-gray-700 ltr:mr-2 rtl:ml-2 dark:text-zinc-100"
                                                for="formrow-customCheck">SMS Alert</label>
                                            <input type="checkbox"
                                                class="align-middle rounded focus:ring-0 focus:ring-offset-0 dark:bg-zinc-700 dark:border-zinc-400 checked:bg-violet-500 dark:checked:bg-violet-500 ckb-portal-password"
                                                name="sms_alert" value="1"  {{ old('sms_alert', $user->userDetail->sms_alert) == '1' ? 'checked' : '' }}>
                                        </div>
                                        <div class="mb-4">
                                            <label class="font-medium text-gray-700 ltr:mr-2 rtl:ml-2 dark:text-zinc-100"
                                                for="formrow-customCheck">Email Alert</label>
                                            <input type="checkbox"
                                                class="align-middle rounded focus:ring-0 focus:ring-offset-0 dark:bg-zinc-700 dark:border-zinc-400 checked:bg-violet-500 dark:checked:bg-violet-500 ckb-portal-password"
                                                name="email_alert" value="1" {{ old('email_alert', $user->userDetail->email_alert) == '1' ? 'checked' : '' }}>
                                        </div>
                                        <div class="hidden sm:block">
                                            <div class="py-8">
                                                <div class="border-t border-gray-200"></div>
                                            </div>
                                        </div>
                                        <label class="block text-sm font-medium text-red-700">Billing</label>
                                        <div class="hidden sm:block">
                                            <div class="py-8">
                                                <div class="border-t border-gray-200"></div>
                                            </div>
                                        </div>
                                        <div class="mb-4">
                                            <label class="font-medium text-gray-700 ltr:mr-2 rtl:ml-2 dark:text-zinc-100"
                                                for="formrow-customCheck">Auto Renew</label>
                                            <input type="checkbox"
                                                class="align-middle rounded focus:ring-0 focus:ring-offset-0 dark:bg-zinc-700 dark:border-zinc-400 checked:bg-violet-500 dark:checked:bg-violet-500 ckb-portal-password"
                                                name="auto_renew" value="1" {{ old('auto_renew', $user->userDetail->auto_renew) == '1' ? 'checked' : '' }}>
                                        </div>
                                        <div class="mb-4">
                                            <label class="font-medium text-gray-700 ltr:mr-2 rtl:ml-2 dark:text-zinc-100"
                                                for="formrow-customCheck">Auto Renew With Wallet</label>
                                            <input type="checkbox"
                                                class="align-middle rounded focus:ring-0 focus:ring-offset-0 dark:bg-zinc-700 dark:border-zinc-400 checked:bg-violet-500 dark:checked:bg-violet-500 ckb-portal-password"
                                                name="Auto_renew_wallet" value="1" {{ old('Auto_renew_wallet', $user->userDetail->Auto_renew_wallet) == '1' ? 'checked' : '' }}>
                                        </div>
                                        <div class="mb-4">
                                            <label for="billing_type"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Billing
                                                type<span class="text-sm text-red-600">*</span></label>
                                            <div class="mt-1 flex items-center">
                                                <div class="flex items-center" style="margin-right: 10px">
                                                    <input type="radio" id="billing_type2" name="billing_type"
                                                        value="0"
                                                        {{ old('billing_type', $user->billing_type) == '1' ? 'checked' : '' }}
                                                        class="form-radio h-4 w-4 text-indigo-600 transition duration-150 ease-in-out">
                                                    <label for="billing_type2"
                                                        class="ml-2 block text-sm leading-5 text-gray-700">Prepaid</label>
                                                </div>
                                                <div class="flex items-center">
                                                    <input type="radio" id="billing_type1" name="billing_type"
                                                        value="1"
                                                        {{ old('billing_type', $user->billing_type) == '1' ? 'checked' : '' }}
                                                        class="form-radio h-4 w-4 text-indigo-600 transition duration-150 ease-in-out">
                                                    <label for="billing_type1"
                                                        class="ml-2 block text-sm leading-5 text-gray-700">Postpaid</label>
                                                </div>

                                            </div>
                                            @error('billing_type')
                                                <p class="error">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="hidden sm:block">
                                            <div class="py-8">
                                                <div class="border-t border-gray-200"></div>
                                            </div>
                                        </div>
                                        <label class="block text-sm font-medium text-red-700">UCP</label>
                                        <div class="hidden sm:block">
                                            <div class="py-8">
                                                <div class="border-t border-gray-200"></div>
                                            </div>
                                        </div>
                                        <div class="mb-4">
                                            <label class="font-medium text-gray-700 ltr:mr-2 rtl:ml-2 dark:text-zinc-100"
                                                for="formrow-customCheck">Enable UCP</label>
                                            <input type="checkbox"
                                                class="align-middle rounded focus:ring-0 focus:ring-offset-0 dark:bg-zinc-700 dark:border-zinc-400 checked:bg-violet-500 dark:checked:bg-violet-500 ckb-portal-password"
                                                name="enable_ucp" value="1" {{ old('enable_ucp', $user->userDetail->enable_ucp) == '1' ? 'checked' : '' }}>
                                        </div>
                                        <div class="mb-4">
                                            <label for="service_group"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Service
                                                Group<span class="text-sm text-red-600">*</span></label>
                                            <select name="service_group" id="service_group"
                                                class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                value="{{ old('service_group') }}">
                                                @foreach (config('enum.service_group') as $key => $value)
                                                    <option value="{{ $key }}"
                                                        {{ $value == 'Default' ? 'selected' : '' }}>{{ $value }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('service_group')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="hidden sm:block">
                                            <div class="py-8">
                                                <div class="border-t border-gray-200"></div>
                                            </div>
                                        </div>
                                        <label class="block text-sm font-medium text-red-700">Advanced</label>
                                        <div class="hidden sm:block">
                                            <div class="py-8">
                                                <div class="border-t border-gray-200"></div>
                                            </div>
                                        </div>
                                        <div class="mb-4">
                                            <label class="font-medium text-gray-700 ltr:mr-2 rtl:ml-2 dark:text-zinc-100"
                                                for="formrow-customCheck">Catch Password</label>
                                            <input type="checkbox"
                                                class="align-middle rounded focus:ring-0 focus:ring-offset-0 dark:bg-zinc-700 dark:border-zinc-400 checked:bg-violet-500 dark:checked:bg-violet-500 ckb-portal-password"
                                                name="catch_password" value="1" {{ old('catch_password', $user->userDetail->catch_password) == '1' ? 'checked' : '' }}>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3 col-span-6 sm:col-span-4 flex items-center justify-center">
                                    <button type="submit"
                                        class="mr-1 font-medium text-white border-transparent btn bg-violet-500 w-28 hover:bg-violet-700 focus:bg-violet-700 focus:ring focus:ring-violet-50">Submit</button>
                                    <a class="font-medium text-white border-transparent btn bg-red-500 w-28 hover:bg-red-700 focus:bg-red-700 focus:ring focus:ring-red-50"
                                        href="{{ route('user.index') }}">
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
    <script src="{{ asset('js/backend/user.js') }}"></script>
    <script>
        $(function() {
            user.setting();
        });
    </script>
@endsection
                                                           