@extends('layouts.master')
@section('title', 'Edit Generated')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
    <div class="main-content group-data-[sidebar-size=sm]:ml-[70px]">
        <div class="page-content dark:bg-zinc-700">
            <div class="container-fluid px-[0.625rem]">

                <!-- page title -->
                <x-page-title title="Edit Generated" pagetitle="Edit Generated" />
                
                <div class="grid grid-cols-1">
                    @include('components.alert-message')
                    <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                        <form action="{{ route('invoice.print-invoice', $invoice) }}" id="generatedInvoiceForm" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="grid grid-cols-12 gap-x-6">
                                    <div class="col-span-12 lg:col-span-6">
                                        <input type="hidden" name="invoice_id" id="invoice_id" value="{{ $invoice->id }}">
                                        <div class="mb-4 grid grid-cols-6">
                                            <label
                                                class="col-span-2 font-medium text-gray-700 dark:text-gray-100"><b>ID</b></label>
                                            <span
                                                class="col-span-4 font-medium text-gray-700 dark:text-gray-100">{{ $invoice->id }}</span>
                                        </div>

                                        <div class="mb-4 grid grid-cols-6">
                                            <label class="col-span-2 font-medium text-gray-700 dark:text-gray-100"><b>User
                                                    Name</b></label>
                                            <span
                                                class="col-span-4 font-medium text-gray-700 dark:text-gray-100">{{ $invoice->userData->username ?? '--' }}</span>
                                        </div>

                                        <div class="mb-4 grid grid-cols-6">
                                            <label
                                                class="col-span-2 font-medium text-gray-700 dark:text-gray-100"><b>Service</b></label>
                                            <span
                                                class="col-span-4 font-medium text-gray-700 dark:text-gray-100">{{ $invoice->serviceData->service_name ?? '--' }}</span>
                                        </div>

                                        <div class="mb-4 grid grid-cols-6">
                                            <label
                                                class="col-span-2 font-medium text-gray-700 dark:text-gray-100"><b>CreditDate</b></label>
                                            <span
                                                class="col-span-4 font-medium text-gray-700 dark:text-gray-100">{{ $invoice->created_at ?? '--' }}</span>
                                        </div>

                                        <div class="mb-4 grid grid-cols-6">
                                            <label for="full_name"
                                                class="col-span-2 font-medium text-gray-700 dark:text-gray-100"><b>Full
                                                    Name</b></label>
                                            <span
                                                class="col-span-4 font-medium text-gray-700 dark:text-gray-100">{{ $invoice->full_name ?? '--' }}</span>
                                        </div>

                                        <div class="mb-4 grid grid-cols-6">
                                            <label for="address"
                                                class="col-span-2 font-medium text-gray-700 dark:text-gray-100"><b>Address</b></label>
                                            <span
                                                class="col-span-4 font-medium text-gray-700 dark:text-gray-100">{{ $invoice->address ?? '--' }}</span>
                                        </div>

                                        <div class="mb-4 grid grid-cols-6">
                                            <label for="tax_no"
                                                class="col-span-2 font-medium text-gray-700 dark:text-gray-100"><b>TaxNo</b></label>
                                            <span
                                                class="col-span-4 font-medium text-gray-700 dark:text-gray-100">{{ $invoice->tax_no ?? '--' }}</span>
                                        </div>

                                        <div class="mb-4 grid grid-cols-6">
                                            <label for="invoice_no"
                                                class="col-span-2 font-medium text-gray-700 dark:text-gray-100"><b>Invoice
                                                    No</b></label>
                                            <span
                                                class="col-span-4 font-medium text-gray-700 dark:text-gray-100">{{ $invoice->invoice_number ?? '--' }}</span>
                                        </div>

                                        <div class="mb-4 grid grid-cols-6">
                                            <label for="price"
                                                class="col-span-2 font-medium text-gray-700 dark:text-gray-100"><b>Unit
                                                    Price</b></label>
                                            <div class="col-span-4">
                                                <label
                                                    class="unit_price block mb-2 font-medium text-gray-700 dark:text-gray-100">₹
                                                    {{ $invoice->unit_price ?? '--' }}</label>
                                            </div>
                                        </div>

                                        <div class="mb-4 grid grid-cols-6">
                                            <label for="quantity"
                                                class="col-span-2 font-medium text-gray-700 dark:text-gray-100"><b>Quantity</b></label>
                                            <span
                                                class="col-span-4 font-medium text-gray-700 dark:text-gray-100">{{ $invoice->quantity ?? '--' }}</span>
                                        </div>

                                        <div class="mb-4 grid grid-cols-6">
                                            <label for="sub_total"
                                                class="col-span-2 font-medium text-gray-700 dark:text-gray-100"><b>Sub
                                                    Total</b></label>
                                            <div class="col-span-4">
                                                <label
                                                    class="sub_total block mb-2 font-medium text-gray-700 dark:text-gray-100">₹
                                                    {{ $invoice->sub_total ?? '--' }}</label>
                                            </div>
                                        </div>

                                        <div class="mb-4 grid grid-cols-6">
                                            <label for="other_charges"
                                                class="col-span-2 font-medium text-gray-700 dark:text-gray-100"><b>Other
                                                    Charges</b></label>
                                            <span class="col-span-4 font-medium text-gray-700 dark:text-gray-100">₹
                                                {{ $invoice->other_charges ?? '--' }}</span>
                                        </div>

                                        <div class="mb-4 grid grid-cols-6">
                                            <label for="cgst"
                                                class="col-span-2 font-medium text-gray-700 dark:text-gray-100"><b>CGST</b></label>
                                            <div class="mb-3">
                                                <span
                                                    class="cgst_percentage block mb-2 font-medium text-gray-700 dark:text-gray-100">{{ $invoice->cgst_percentage ?? '--' }}
                                                    %</span>
                                                <label
                                                    class="cgst block mb-2 font-medium text-gray-700 dark:text-gray-100">₹
                                                    {{ $invoice->cgst ?? '--' }}</label>
                                            </div>
                                        </div>
                                        <div class="mb-4 grid grid-cols-6">
                                            <label for="ggst"
                                                class="col-span-2 font-medium text-gray-700 dark:text-gray-100"><b>GGST</b></label>
                                            <div class="mb-3">
                                                <span
                                                    class="ggst_percentage block mb-2 font-medium text-gray-700 dark:text-gray-100">{{ $invoice->ggst_percentage ?? '--' }}
                                                    %</span>
                                                <label
                                                    class="ggst block mb-2 font-medium text-gray-700 dark:text-gray-100">₹
                                                    {{ $invoice->ggst ?? '--' }}</label>
                                            </div>
                                        </div>

                                        <div class="mb-4 grid grid-cols-6">
                                            <label for="other_charges"
                                                class="col-span-2 font-medium text-gray-700 dark:text-gray-100"><b>Grand
                                                    Total</b></label>
                                            <span class="col-span-4 font-medium text-gray-700 dark:text-gray-100">₹
                                                {{ $invoice->grand_total ?? '--' }}</span>
                                        </div>
                                        <div class="mb-4 grid grid-cols-6">
                                            <label for="other_charges"
                                                class="col-span-2 font-medium text-gray-700 dark:text-gray-100"><b>Paid</b></label>
                                            <span class="col-span-4 font-medium text-gray-700 dark:text-gray-100">₹
                                                {{ $invoice->paid_amount ?? '--' }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-6 sm:col-span-4 flex items-center justify-center">
                                    <button type="submit"
                                        class="mr-1 font-medium text-white border-transparent btn bg-violet-500 w-28 hover:bg-violet-700 focus:bg-violet-700 focus:ring focus:ring-violet-50">Print</button>
                                    @if ($invoice->status == 1 && $invoice->unpaid_amount !== '0')
                                        <div class="mr-1 font-medium text-white border-transparent btn bg-green-500 w-28 hover:bg-green-700 focus:bg-green-700 focus:ring focus:ring-green-50"
                                            data-class="bg-green-500" data-tw-toggle="modal"
                                            data-tw-target="#paid_model">
                                            Paid
                                        </div>
                                    @endif
                                </div>
                        </form>
                    </div>
                </div>
                @include('backend.invoice.pending.paidModel')
                <!-- footer -->
                @include('layouts.footer')
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{ asset('js/libs/jquery-3.7.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/libs/select2.min.js') }}"></script>

    <script src="{{ asset('js/backend/generated-invoice.js') }}"></script>
    <script>
        $(function() {
            invoice.edit();
        });
    </script>
@endsection
