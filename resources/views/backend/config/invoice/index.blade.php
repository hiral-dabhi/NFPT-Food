@extends('layouts.master')
@section('title', 'Invoice/Billing')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
    <div class="main-content group-data-[sidebar-size=sm]:ml-[70px]">
        <div class="page-content dark:bg-zinc-700">
            <div class="container-fluid px-[0.625rem]">
                <!-- page title -->
                <x-page-title title="Invoice/Billing" pagetitle="Invoice/Billing" />
                <div class="grid grid-cols-1">
                    @include('components.alert-message')
                    <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                        <form action="{{ route('config.update-invoice') }}" method="POST" class="edit-invoice-form"
                            id="edit-invoice-form">
                            @csrf
                            <div class="bg-white sm:p-6 shadow sm:rounded-md">
                                <div class="grid grid-cols-6 gap-6">
                                    {{-- Tax1 --}}
                                    <div class="col-span-6 sm:col-span-4">
                                        <label for="tax1_config"
                                            class="block font-medium text-gray-700 dark:text-gray-100">Tax1
                                            Config<span class="text-sm text-red-600">*</span></label>
                                    </div>
                                    <div class="col-span-6 sm:col-span-4">
                                        <label for="tax1_config_status" class="block text-sm font-medium text-gray-700"><span class="text-sm text-red-600">*</span>Tax1</label>
                                        <div class="mt-1 flex items-center">
                                            <div class="flex items-center" style="margin-right: 10px">
                                                <input type="radio" id="tax1_active" name="tax1_config_status" value="active"
                                                    {{ old('tax1_config_status', $configInvoiceData['tax1_config_status'] ?? '') == 'active' ? 'checked' : '' }}
                                                    class="form-radio h-4 w-4 text-indigo-600 transition duration-150 ease-in-out">
                                                <label for="tax1_active"
                                                    class="ml-2 block text-sm leading-5 text-gray-700">Active</label>
                                            </div>
                                            <div class="flex items-center">
                                                <input type="radio" id="tax1_inactive" name="tax1_config_status" value="inactive"
                                                    {{ old('tax1_config_status', $configInvoiceData['tax1_config_status'] ?? 'inactive') == 'inactive' ? 'checked' : '' }}
                                                    class="form-radio h-4 w-4 text-indigo-600 transition duration-150 ease-in-out">
                                                <label for="tax1_inactive"
                                                    class="ml-2 block text-sm leading-5 text-gray-700">Inactive</label>
                                            </div>
                                        </div>
                                        @error('tax1_config_status')
                                            <p class="error">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="col-span-6 sm:col-span-4">
                                        <label for="tax1_name"
                                            class="block mb-2 font-medium text-gray-700 dark:text-gray-100"><span
                                            class="text-sm text-red-600">*</span>Tax1 Name</label>
                                        <input type="text" name="tax1_name" id="tax1_name" placeholder="Tax1 Name"
                                            class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                            value="{{ old('tax1_name', $configInvoiceData['tax1_name'] ?? '') }}">
                                        @error('tax1_name')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="col-span-6 sm:col-span-4">
                                        <label for="tax1_per"
                                            class="block mb-2 font-medium text-gray-700 dark:text-gray-100"><span class="text-sm text-red-600">*</span>Tax1
                                            Percentage</label>
                                        <input type="number" name="tax1_per" id="tax1_per" placeholder="Tax1 Percentage"
                                            class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                            value="{{ old('tax1_per', $configInvoiceData['tax1_per'] ?? '') }}">
                                        @error('tax1_per')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="col-span-6 sm:col-span-4 mt-2">
                                        <label for="tax2_config"
                                            class="block font-medium text-gray-700 dark:text-gray-100">Tax2
                                            Config<span class="text-sm text-red-600">*</span></label>
                                    </div>

                                    <div class="col-span-6 sm:col-span-4">
                                        <label for="tax2_config_status" class="block text-sm font-medium text-gray-700"><span class="text-sm text-red-600">*</span>Tax2</label>
                                        <div class="mt-1 flex items-center">
                                            <div class="flex items-center" style="margin-right: 10px">
                                                <input type="radio" id="tax2_active" name="tax2_config_status" value="active"
                                                    {{ old('tax2_config_status', $configInvoiceData['tax2_config_status'] ?? '') == 'active' ? 'checked' : '' }}
                                                    class="form-radio h-4 w-4 text-indigo-600 transition duration-150 ease-in-out">
                                                <label for="tax2_active"
                                                    class="ml-2 block text-sm leading-5 text-gray-700">Active</label>
                                            </div>
                                            <div class="flex items-center">
                                                <input type="radio" id="tax2_inactive" name="tax2_config_status" value="inactive"
                                                    {{ old('tax2_config_status', $configInvoiceData['tax2_config_status'] ?? 'inactive') == 'inactive' ? 'checked' : '' }}
                                                    class="form-radio h-4 w-4 text-indigo-600 transition duration-150 ease-in-out">
                                                <label for="tax2_inactive"
                                                    class="ml-2 block text-sm leading-5 text-gray-700">Inactive</label>
                                            </div>
                                        </div>
                                        @error('tax2_config_status')
                                            <p class="error">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="col-span-6 sm:col-span-4">
                                        <label for="tax2_name"
                                            class="block mb-2 font-medium text-gray-700 dark:text-gray-100"><span
                                            class="text-sm text-red-600">*</span>Tax2 Name</label>
                                        <input type="text" name="tax2_name" id="tax2_name" placeholder="Tax2 Name"
                                            class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                            value="{{ old('tax2_name', $configInvoiceData['tax2_name'] ?? '') }}">
                                        @error('tax2_name')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="col-span-6 sm:col-span-4">
                                        <label for="tax2_per"
                                            class="block mb-2 font-medium text-gray-700 dark:text-gray-100"><span class="text-sm text-red-600">*</span>Tax2
                                            Percentage</label>
                                        <input type="number" name="tax2_per" id="tax2_per" placeholder="Tax2 Percentage"
                                            class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                            value="{{ old('tax2_per', $configInvoiceData['tax2_per'] ?? '') }}">
                                        @error('tax2_per')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="col-span-6 sm:col-span-4">
                                        <label for="general_config"
                                            class="block mb-2 font-medium text-gray-700 dark:text-gray-100">General
                                            Config<span class="text-sm text-red-600">*</span></label>
                                    </div>

                                    <div class="col-span-6 sm:col-span-4">
                                        <label for="tax_no_label"
                                            class="block mb-2 font-medium text-gray-700 dark:text-gray-100"><span class="text-sm text-red-600">*</span>TaxNo
                                            Label</label>
                                        <input type="text" name="tax_no_label" id="tax_no_label"
                                            placeholder="TaxNo Lable"
                                            class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                            value="{{ old('tax_no_label', $configInvoiceData['tax_no_label'] ?? '') }}">
                                        @error('tax_no_label')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="col-span-6 sm:col-span-4">
                                        <label for="rollback_hour"
                                            class="block mb-2 font-medium text-gray-700 dark:text-gray-100"><span class="text-sm text-red-600">*</span>Rollback
                                            Hour(s)</label>
                                        <input type="number" name="rollback_hour" id="rollback_hour"
                                            placeholder="Rollback Hour"
                                            class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                            value="{{ old('rollback_hour', $configInvoiceData['rollback_hour'] ?? '') }}">
                                        @error('rollback_hour')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="col-span-6 sm:col-span-4">
                                        <label for="due_days"
                                            class="block mb-2 font-medium text-gray-700 dark:text-gray-100"><span
                                            class="text-sm text-red-600">*</span>Due Day(s)</label>
                                        <input type="number" name="due_days" id="due_days" placeholder="Due Day"
                                            class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                            value="{{ old('due_days', $configInvoiceData['due_days'] ?? '') }}">
                                        @error('due_days')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="col-span-6 sm:col-span-4">
                                        <label for="tax_invoice_prefix"
                                            class="block mb-2 font-medium text-gray-700 dark:text-gray-100"><span class="text-sm text-red-600">*</span>Tax Invoice
                                            Prefix</label>
                                        <input type="text" name="tax_invoice_prefix" id="tax_invoice_prefix"
                                            placeholder="Tax Invoice Prefix"
                                            class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                            value="{{ old('tax_invoice_prefix', $configInvoiceData['tax_invoice_prefix'] ?? '') }}">
                                        @error('tax_invoice_prefix')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>


                                    <div class="col-span-6 sm:col-span-4">
                                        <label for="no_tax_invoice_prefix"
                                            class="block mb-2 font-medium text-gray-700 dark:text-gray-100"><span class="text-sm text-red-600">*</span>NoTax Invoice
                                            Prefix</label>
                                        <input type="text" name="no_tax_invoice_prefix" id="no_tax_invoice_prefix"
                                            placeholder="NoTax Invoice Prefix"
                                            class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                            value="{{ old('no_tax_invoice_prefix', $configInvoiceData['no_tax_invoice_prefix'] ?? '') }}">
                                        @error('no_tax_invoice_prefix')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="col-span-6 sm:col-span-4">
                                        <label for="company_tax_no"
                                            class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Company
                                            TaxNo</label>
                                        <input type="text" name="company_tax_no" id="company_tax_no"
                                            placeholder="Company TaxNo"
                                            class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                            value="{{ old('company_tax_no', $configInvoiceData['company_tax_no'] ?? '') }}">
                                        @error('company_tax_no')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="col-span-6 sm:col-span-4">
                                        <label for="invoice_size"
                                            class="block mb-2 font-medium text-gray-700 dark:text-gray-100"><span class="text-sm text-red-600">*</span>Invoice
                                            Size</label>
                                        <select name="invoice_size" id="invoice_size"
                                            class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100">
                                            <option value="">Select Invoice Size</option>
                                            <option value="A4"
                                                {{ isset($configInvoiceData['invoice_size']) && $configInvoiceData['invoice_size'] == 'A4' ? 'selected' : '' }}>
                                                A4</option>
                                            <option value="A5"
                                                {{ isset($configInvoiceData['invoice_size']) && $configInvoiceData['invoice_size'] == 'A5' ? 'selected' : '' }}>
                                                A5</option>
                                        </select>
                                        @error('invoice_size')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    {{-- color picker --}}
                                    <div class="col-span-6 sm:col-span-4">
                                        <label for="invoice_color"
                                            class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Invoice Color</label>
                                        <input
                                            class="h-10 p-1 text-sm text-gray-500 bg-transparent border border-gray-100 rounded focus:border focus:border-violet-500 focus:ring-0 dark:bg-zinc-700/50 dark:border-zinc-600 dark:text-zinc-100 w-14"
                                            type="color" name="invoice_color" id="invoice_color" value="{{ $configInvoiceData['invoice_color'] ?? '' }}">
                                        @error('invoice_color')
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
            config.invoice();
        });
    </script>
@endsection
