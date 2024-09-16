@extends('layouts.master')
@section('title', 'Payment Gateway')
@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')

<div class="main-content group-data-[sidebar-size=sm]:ml-[70px]">
    <div class="page-content dark:bg-zinc-700">
        <div class="container-fluid px-[0.625rem]">
            <!-- page title -->
            <x-page-title title="Payment Gateway" pagetitle="PaymentGateway" />

            <div class="grid grid-cols-1">
                @include('components.alert-message')
                <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                    <form action="{{ route('config.update-payment-gateway') }}" method="POST" class="config-paymentGateway-edit-form" id="config-paymentGateway-edit">
                        @csrf
                        <div class="bg-white sm:p-6 shadow sm:rounded-md" id="paymentGateway">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-4">
                                    <label for="payment_gateway_type" class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Gateway<span class="text-sm text-red-600">*</span></label>

                                    <select name="payment_gateway_type" id="payment_gateway_type" class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100">
                                        <option value="">Select Payment Gateway</option>
                                        @foreach ($paymentGatewayList as $key => $val)
                                        <option value="{{ $key }}" {{ (old('payment_gateway_type') == $key || ($paymentGatewayData['type'] ?? null) == $key) ? 'selected' : '' }}>
                                            {{ $val }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('payment_gateway_type')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-span-6 sm:col-span-4 mt-4">
                                <div class="col-span-6 sm:col-span-4">
                                    <div class="mb-4">
                                        <label for="status" class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Status<span class="text-sm text-red-600">*</span></label>
                                        <div class="mt-1 flex items-center">
                                            <div class="flex items-center" style="margin-right: 10px">
                                                <input type="radio" id="status1" name="status" value="active" {{ old('status') == 'active' ? 'checked' : '' }} {{ ($paymentGatewayData['payment_gateway_status'] ?? null) == 'active' ? 'checked' : '' }} class="form-radio h-4 w-4 text-indigo-600 transition duration-150 ease-in-out">
                                                <label for="status1" class="ml-2 block text-sm leading-5 text-gray-700">Active</label>
                                            </div>

                                            <div class="flex items-center">
                                                <input type="radio" id="status2" name="status" value="inactive" {{ old('status') == 'inactive' ? 'checked' : '' }} {{ ($paymentGatewayData['payment_gateway_status'] ?? null) == 'active' ? '' : 'checked' }} class="form-radio h-4 w-4 text-indigo-600 transition duration-150 ease-in-out">
                                                <label for="status2" class="ml-2 block text-sm leading-5 text-gray-700">Inactive</label>
                                            </div>
                                        </div>
                                        @error('status')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white sm:p-6 shadow sm:rounded-md" id="payuMoney" hidden>
                            <div class="grid grid-cols-6 gap-6">
                                <!-- payuMoney -->


                                <div class="col-span-6 sm:col-span-4">
                                    <label for="base_url_payuMoney" class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Base URL<span class="text-sm text-red-600">*</span></label>

                                    <input name="base_url_payuMoney" id="base_url_payuMoney" class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100" placeholder="Base URL" value="{{ old('base_url_payuMoney', ($paymentGatewayData['type'] ?? null) == 'payumoney' ? ($paymentGatewayData['base_url'] ?? null) : '') }}">
                                    @error('base_url_payuMoney')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-4">
                                    <label for="merchant_key_payumoney" class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Merchant Key<span class="text-sm text-red-600">*</span></label>

                                    <input name="merchant_key_payumoney" id="merchant_key_payumoney" class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100" placeholder="Merchant Key" value="{{ old('merchant_key_payumoney', ($paymentGatewayData['type'] ?? null) == 'payumoney' ? ($paymentGatewayData['merchant_key'] ?? null) : '') }}">
                                    @error('merchant_key_payumoney')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-4">
                                    <label for="salt_payumoney" class="block mb-2 font-medium text-gray-700 dark:text-gray-100">SALT<span class="text-sm text-red-600">*</span></label>

                                    <input name="salt_payumoney" id="salt_payumoney" class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100" placeholder="SALT" value="{{ old('salt_payumoney', ($paymentGatewayData['type'] ?? null) == 'payumoney' ? ($paymentGatewayData['salt'] ?? null) : '') }}">
                                    @error('salt_payumoney')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-4">
                                    <label for="service_provider_payuMoney" class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Service Provider<span class="text-sm text-red-600">*</span></label>

                                    <input name="service_provider_payuMoney" id="service_provider_payuMoney" class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100" placeholder="Service Provider" value="{{ old('service_provider_payuMoney', ($paymentGatewayData['type'] ?? null) == 'payumoney' ? ($paymentGatewayData['service_provider'] ?? null) : '') }}">
                                    @error('service_provider_payuMoney')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="bg-white sm:p-6 shadow sm:rounded-md" id="ccAvenue" hidden>
                            <div class="grid grid-cols-6 gap-6">
                                <!-- CCAvenue -->
                                <div class="col-span-6 sm:col-span-4">
                                    <label for="base_url_ccavenue" class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Base URL<span class="text-sm text-red-600">*</span></label>

                                    <input name="base_url_ccavenue" id="base_url_ccavenue" class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100" placeholder="Base URL" value="{{ old('base_url_ccavenue', ($paymentGatewayData['type'] ?? null) == 'ccavenue' ? ($paymentGatewayData['base_url'] ?? null) : '') }}">
                                    @error('base_url_ccavenue')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-4">
                                    <label for="merchant_id_ccavenue" class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Merchant ID<span class="text-sm text-red-600">*</span></label>

                                    <input name="merchant_id_ccavenue" id="merchant_id_ccavenue" class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100" placeholder="Merchant ID" value="{{ old('merchant_id_ccavenue', ($paymentGatewayData['type'] ?? null) == 'ccavenue' ? ($paymentGatewayData['merchant_id'] ?? null) : '') }}">
                                    @error('merchant_id_ccavenue')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-4">
                                    <label for="working_key_ccavenue" class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Working Key<span class="text-sm text-red-600">*</span></label>

                                    <input name="working_key_ccavenue" id="working_key_ccavenue" class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100" placeholder="Working Key" value="{{ old('working_key_ccavenue', ($paymentGatewayData['type'] ?? null) == 'ccavenue' ? ($paymentGatewayData['working_key'] ?? null) : '') }}">
                                    @error('working_key_ccavenue')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-4">
                                    <label for="access_code_ccavenue" class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Access Code<span class="text-sm text-red-600">*</span></label>

                                    <input name="access_code_ccavenue" id="access_code_ccavenue" class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100" placeholder="Access Code" value="{{ old('access_code_ccavenue', ($paymentGatewayData['type'] ?? null) == 'ccavenue' ? ($paymentGatewayData['access_code'] ?? null) : '') }}">
                                    @error('access_code_ccavenue')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-4">
                                    <label for="ccavenue_currency" class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Currency<span class="text-sm text-red-600">*</span></label>

                                    <select name="ccavenue_currency" id="ccavenue_currency" class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100">
                                        <option value="">Select Currency</option>
                                        @foreach ($currencies as $key => $val)
                                        <option value="{{ $key }}" {{ ($paymentGatewayData['currency'] ?? null) == $key ? 'selected' : '' }}>
                                            {{ $val }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('ccavenue_currency')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="bg-white sm:p-6 shadow sm:rounded-md" id="paytm" hidden>
                            <div class="grid grid-cols-6 gap-6">
                                <!-- paytm -->

                                <div class="col-span-6 sm:col-span-4">
                                    <label for="base_url_paytm" class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Base URL<span class="text-sm text-red-600">*</span></label>

                                    <input name="base_url_paytm" id="base_url_paytm" class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100" placeholder="Base URL" value="{{ old('base_url_paytm', ($paymentGatewayData['type'] ?? null) == 'paytm' ? ($paymentGatewayData['base_url'] ?? null) : '') }}">
                                    @error('base_url_paytm')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-4">
                                    <label for="status_url_paytm" class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Status URL<span class="text-sm text-red-600">*</span></label>

                                    <input name="status_url_paytm" id="status_url_paytm" class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100" placeholder="Status URL" value="{{ old('status_url_paytm', ($paymentGatewayData['type'] ?? null) == 'paytm' ? ($paymentGatewayData['status_url'] ?? null) : '') }}">
                                    @error('status_url_paytm')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-4">
                                    <label for="merchant_id_paytm" class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Merchant ID<span class="text-sm text-red-600">*</span></label>

                                    <input name="merchant_id_paytm" id="merchant_id_paytm" class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100" placeholder="Merchant ID" value="{{ old('merchant_id_paytm', ($paymentGatewayData['type'] ?? null) == 'paytm' ? ($paymentGatewayData['merchant_id'] ?? null) : '') }}">
                                    @error('merchant_id_paytm')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-4">
                                    <label for="merchant_key_paytm" class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Merchant Key<span class="text-sm text-red-600">*</span></label>

                                    <input name="merchant_key_paytm" id="merchant_key_paytm" class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100" placeholder="Merchant Key" value="{{ old('merchant_key_paytm', ($paymentGatewayData['type'] ?? null) == 'paytm' ? ($paymentGatewayData['merchant_key'] ?? null) : '') }}">
                                    @error('merchant_key_paytm')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-4">
                                    <label for="merchant_web_paytm" class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Merchant Web<span class="text-sm text-red-600">*</span></label>

                                    <input name="merchant_web_paytm" id="merchant_web_paytm" class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100" placeholder="Merchant Web" value="{{ old('merchant_web_paytm', ($paymentGatewayData['type'] ?? null) == 'paytm' ? ($paymentGatewayData['merchant_web'] ?? null) : '') }}">
                                    @error('merchant_web_paytm')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-4">
                                    <label for="industry_paytm" class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Industry<span class="text-sm text-red-600">*</span></label>

                                    <input name="industry_paytm" id="industry_paytm" class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100" placeholder="Industry" value="{{ old('industry_paytm', (($paymentGatewayData['industry'] ?? null) &&($paymentGatewayData['type'] ?? null) == 'paytm') ? ($paymentGatewayData['industry'] ?? null) : '')}}">
                                    @error('industry_paytm')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="bg-white sm:p-6 shadow sm:rounded-md" id="instaMojo" hidden>
                            <div class="grid grid-cols-6 gap-6">
                                <!-- instaMojo -->

                                <div class="col-span-6 sm:col-span-4">
                                    <label for="base_url_instamojo" class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Base URL<span class="text-sm text-red-600">*</span></label>

                                    <input name="base_url_instamojo" id="base_url_instamojo" class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100" placeholder="Base URL" value="{{ old('base_url_instamojo', ($paymentGatewayData['type'] ?? null) == 'instamojo' ? ($paymentGatewayData['base_url'] ?? null) : '') }}">
                                    @error('base_url_instamojo')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-4">
                                    <label for="api_key_instamojo" class="block mb-2 font-medium text-gray-700 dark:text-gray-100">API Key<span class="text-sm text-red-600">*</span></label>

                                    <input name="api_key_instamojo" id="api_key_instamojo" class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100" placeholder="API Key" value="{{ old('api_key_instamojo', ($paymentGatewayData['type'] ?? null) == 'instamojo' ? ($paymentGatewayData['api_key'] ?? null) : '') }}">
                                    @error('api_key_instamojo')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-4">
                                    <label for="auth_token_instamojo" class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Auth Token<span class="text-sm text-red-600">*</span></label>

                                    <input name="auth_token_instamojo" id="auth_token_instamojo" class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100" placeholder="Auth Token" value="{{ old('auth_token_instamojo', ($paymentGatewayData['type'] ?? null) == 'instamojo' ? ($paymentGatewayData['api_key'] ?? null) : '') }}">
                                    @error('auth_token_instamojo')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-4">
                                    <label for="salt_instamojo" class="block mb-2 font-medium text-gray-700 dark:text-gray-100">SALT<span class="text-sm text-red-600">*</span></label>

                                    <input name="salt_instamojo" id="salt_instamojo" class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100" placeholder="SALT" value="{{ old('salt_instamojo', ($paymentGatewayData['type'] ?? null) == 'instamojo' ? ($paymentGatewayData['salt'] ?? null) : '') }}">
                                    @error('salt_instamojo')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="bg-white sm:p-6 shadow sm:rounded-md" id="razorPay" hidden>
                            <div class="grid grid-cols-6 gap-6">

                                <!-- RazorPay -->
                                <div class="col-span-6 sm:col-span-4">
                                    <label for="key_id_razorpay" class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Key ID<span class="text-sm text-red-600">*</span></label>

                                    <input name="key_id_razorpay" id="key_id_razorpay" class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100" placeholder="API Key" value="{{ old('key_id_razorpay', ($paymentGatewayData['type'] ?? null) == 'razorpay' ? ($paymentGatewayData['key_id'] ?? null) : '') }}">
                                    @error('key_id_razorpay')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-4">
                                    <label for="key_secret_razorpay" class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Key Secret<span class="text-sm text-red-600">*</span></label>

                                    <input name="key_secret_razorpay" id="key_secret_razorpay" class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100" placeholder="Auth Token" value="{{ old('key_secret_razorpay', ($paymentGatewayData['type'] ?? null) == 'razorpay' ? ($paymentGatewayData['key_secret'] ?? null) : '') }}">
                                    @error('key_secret_razorpay')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-4">
                                    <label for="razorpay_currency" class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Currency<span class="text-sm text-red-600">*</span></label>

                                    <select name="razorpay_currency" id="razorpay_currency" class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100">
                                        <option value="">Select Currency</option>
                                        @foreach ($currencies as $key => $val)
                                        <option value="{{ $key }}" {{ ($paymentGatewayData['currency'] ?? null) == $key ? 'selected' : '' }}>
                                            {{ $val }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('razorpay_currency')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="bg-white sm:p-6 shadow sm:rounded-md">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-4 flex items-center justify-center">
                                    <button type="submit" class="font-medium text-white border-transparent btn bg-violet-500 w-28 hover:bg-violet-700 focus:bg-violet-700 focus:ring focus:ring-violet-50">Update</button>
                                </div>
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
        config.paymentGateway();
    });
</script>
@endsection