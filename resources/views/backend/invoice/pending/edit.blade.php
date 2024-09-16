@extends('layouts.master')
@section('title', 'Edit Pending')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
    <div class="main-content group-data-[sidebar-size=sm]:ml-[70px]">
        <div class="page-content dark:bg-zinc-700">
            <div class="container-fluid px-[0.625rem]">

                <!-- page title -->
                <x-page-title title="Edit Pending" pagetitle="Edit Pending"/>
                @include('components.alert-message')
                <div class="grid grid-cols-1">
                    <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                        <form action="{{ route('invoice.pending.update', $invoice->id) }}" method="POST"
                            id="pendingInvoiceForm">
                            @csrf
                            <div class="card-body">
                                <div class="grid grid-cols-12 gap-x-6">
                                    <div class="col-span-12 lg:col-span-6">
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


                                        <div class="mb-4">
                                            <label for="full_name"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Full Name
                                                <span class="text-sm text-red-600">*</span></label>
                                            <input type="text"
                                                class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                id="full_name" name="full_name" placeholder="Full Name"
                                                value="{{ $invoice->full_name }}">
                                            @error('full_name')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="mb-4">
                                            <label for="address"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Address
                                                <span class="text-sm text-red-600">*</span></label>
                                            <textarea type="text"
                                                class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                id="address" name="address" placeholder="Address">{{ $invoice->address }}</textarea>
                                            @error('address')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="mb-4">
                                            <label for="tax_no"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100">TaxNo <span
                                                    class="text-sm text-red-600">*</span></label>
                                            <input type="text"
                                                class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                id="tax_no" name="tax_no" placeholder="Tax No"
                                                value="{{ $invoice->tax_no }}">
                                            @error('tax_no')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="mb-4">
                                            <label for="other_charge_name"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Other Charge
                                                Name </label>
                                            <input type="text"
                                                class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                id="other_charge_name" name="other_charge_name"
                                                placeholder="Other Charge Name" value="{{ $invoice->other_charge_name }}">
                                            @error('other_charge_name')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="mb-2 grid grid-cols-6">
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

                                        <div class="mb-4 flex">
                                            <label for="is_manual" class="text-sm font-medium text-gray-700">Manual </label>
                                            <input type="checkbox" id="is_manual" name="is_manual"
                                                class="ml-3 mt-1 align-middle rounded focus:ring-0 focus:ring-offset-0 dark:bg-zinc-700 dark:border-zinc-400"
                                                value="1" {{ $invoice->is_manual == 1 ? 'checked' : '' }}
                                                {{ $invoice->is_manual == 1 ? 'checked:bg-violet-500 dark:checked:bg-violet-500' : '' }}>
                                        </div>

                                        <div claa="manual" id="manual">
                                            <div class="mb-4">
                                                <label for="discount"
                                                    class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Discount
                                                </label>
                                                <div class="mb-1">
                                                    <div class="grid grid-cols-12 gap-6">
                                                        <div class="col-span-4 lg:col-span-4">
                                                            <div class="mb-3">
                                                                <input disabled type="number"
                                                                    class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                                    id="discount_percentage" name="discount_percentage"
                                                                    placeholder="0" max="100" min="0"
                                                                    value="{{ $invoice->discount_percentage }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-span-2 lg:col-span-2 flex items-center">
                                                            <label for="percentage"
                                                                class="block mb-3 font-medium text-gray-700 dark:text-gray-100">%</label>
                                                        </div>
                                                        <div class="col-span-4 lg:col-span-4">
                                                            <div class="mb-3">
                                                                <input disabled type="text"
                                                                    class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                                    id="discount" name="discount" placeholder="0"
                                                                    value="{{ $invoice->discount }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-span-2 lg:col-span-2 flex items-center">
                                                            <label for="ruppes"
                                                                class="block mb-3 font-medium text-gray-700 dark:text-gray-100">₹</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-4">
                                                <label for="other_charges"
                                                    class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Other
                                                    Charges </label>
                                                <div class="mb-1">
                                                    <div class="grid grid-cols-12 gap-6">
                                                        <div class="col-span-10 lg:col-span-10">
                                                            <div class="mb-3">
                                                                <input disabled type="text"
                                                                    class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                                    id="other_charges" name="other_charges"
                                                                    placeholder="0.00"
                                                                    value="{{ $invoice->other_charges }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-span-2 lg:col-span-2 flex items-center">
                                                            <label for="ruppes"
                                                                class="block mb-3 font-medium text-gray-700 dark:text-gray-100">₹</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-4">
                                                <label for="cgst"
                                                    class="block mb-2 font-medium text-gray-700 dark:text-gray-100">CGST
                                                </label>
                                                <div class="mb-1">
                                                    <div class="grid grid-cols-12 gap-6">
                                                        <div class="col-span-4 lg:col-span-4">
                                                            <div class="mb-3">
                                                                <input disabled type="number"
                                                                    class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                                    id="cgst_pr" name="cgst_pr" placeholder="0"
                                                                    value="{{ $invoice->cgst_percentage }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-span-2 lg:col-span-2 flex items-center">
                                                            <label for="percentage"
                                                                class="block mb-3 font-medium text-gray-700 dark:text-gray-100">%</label>
                                                        </div>
                                                        <div class="col-span-4 lg:col-span-4">
                                                            <div class="mb-3">
                                                                <input disabled type="number"
                                                                    class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                                    id="cgst_amount" name="cgst_amount" placeholder="0"
                                                                    value="{{ $invoice->cgst }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-span-2 lg:col-span-2 flex items-center">
                                                            <label for="ruppes"
                                                                class="block mb-3 font-medium text-gray-700 dark:text-gray-100">₹</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-4">
                                                <label for="ggst"
                                                    class="block mb-2 font-medium text-gray-700 dark:text-gray-100">GGST
                                                </label>
                                                <div class="mb-1">
                                                    <div class="grid grid-cols-12 gap-6">
                                                        <div class="col-span-4 lg:col-span-4">
                                                            <div class="mb-3">
                                                                <input disabled type="text"
                                                                    class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                                    id="ggst_pr" name="ggst_pr" placeholder="0"
                                                                    value="{{ $invoice->ggst_percentage }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-span-2 lg:col-span-2 flex items-center">
                                                            <label for="percentage"
                                                                class="block mb-3 font-medium text-gray-700 dark:text-gray-100">%</label>
                                                        </div>
                                                        <div class="col-span-4 lg:col-span-4">
                                                            <div class="mb-3">
                                                                <input disabled type="text"
                                                                    class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                                    id="ggst_amount" name="ggst_amount" placeholder="0"
                                                                    value="{{ $invoice->ggst }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-span-2 lg:col-span-2 flex items-center">
                                                            <label for="rupees"
                                                                class="block mb-3 font-medium text-gray-700 dark:text-gray-100">₹</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-4">
                                                <label for="grand_total"
                                                    class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Grand Total
                                                </label>
                                                <input disabled type="text"
                                                    class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                    id="grand_total" name="grand_total" placeholder="Grand Total"
                                                    value="{{ $invoice->grand_total }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-6 sm:col-span-4 flex items-center justify-center">
                                    <button type="submit"
                                        class="mr-1 font-medium text-white border-transparent btn bg-violet-500 w-28 hover:bg-violet-700 focus:bg-violet-700 focus:ring focus:ring-violet-50">Update</button>
                                    <!-- <a class="font-medium text-white border-transparent btn bg-red-500 w-28 hover:bg-red-700 focus:bg-red-700 focus:ring focus:ring-red-50" href="{{ route('invoice.pending.index') }}">
                                                Back
                                            </a> -->
                                </div>
                            </div>
                        </form>


                    </div>
                    <div class="mt-4 col-span-6 sm:col-span-4 flex items-center justify-center">
                        <h6 class="mb-1 text-gray-700 text-15 dark:text-gray-100">Other Actions</h6>
                    </div>

                    <div class="mt-4 mb-5 col-span-6 sm:col-span-4 flex items-center justify-center">
                        <div class="text-gray font-medium cursor-pointer" data-class="bg-green-500"
                            data-tw-toggle="modal" data-tw-target="#generate_invoice">
                            [ Generate Invoice ]
                        </div>

                        <a class="ml-3 font-medium text-gray" href="{{ route('invoice.print-invoice', $invoice->id) }}"
                            target="_blank" rel="noopener">
                            [ Print Proforma ]
                        </a>

                        <div class="ml-3 text-gray font-medium cursor-pointer" data-class="bg-green-500"
                            data-tw-toggle="modal" data-tw-target="#rollback_invoice">
                            [ Roll Back ]
                        </div>
                    </div>
                    @include('backend.invoice.pending.generateInvoiceModel')
                    @include('backend.invoice.pending.rollbackModel')
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

    <script src="{{ asset('js/backend/pending-invoice.js') }}"></script>
    <script>
        var cgst = parseFloat("{{ $cgst }}");
        var ggst = parseFloat("{{ $ggst }}");
        var subTotal = parseFloat("{{ $invoice->sub_total }}");
        var cgstVal = (subTotal * cgst / 100).toFixed(2);
        var ggstVal = (subTotal * ggst / 100).toFixed(2);
        var totalTax = (parseFloat(cgstVal) + parseFloat(ggstVal)).toFixed(2);
        var grandTotal = "{{ $invoice->creditData->grand_total ?? '' }}";
        $(function() {
            invoice.edit();
        });
    </script>
@endsection
