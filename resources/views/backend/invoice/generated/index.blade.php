@extends('layouts.master')
@section('title')
    {{ __('Invoice') }}
@endsection
@section('css')
    <!-- DataTables -->
    <link href="{{ URL::asset('build/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ URL::asset('build/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="{{ URL::asset('build/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}"
        rel="stylesheet" type="text/css" />
    <style>
        .dataTables_wrapper .dt-buttons {
            float: right;
            margin-right: 15px;
        }

        .dataTables_filter {
            float: right;
        }

        .dataTables_length {
            float: left;
            margin-right: 10px;
        }

        .dt-buttons {
            display: flex;
            align-items: center;
        }

        .dataTables_wrapper .dataTables_filter input {
            margin-left: 0.5em;
        }

        .dataTables_wrapper .dt-buttons button:last-child {
            border-top-right-radius: 5px;
            border-bottom-right-radius: 5px;
        }
    </style>
@endsection
@section('content')
    <div class="main-content group-data-[sidebar-size=sm]:ml-[70px]">
        <div class="page-content dark:bg-zinc-700">
            <div class="container-fluid px-[0.625rem]">

                <!-- page title -->
                <x-page-title title="Generated Invoice(s)" pagetitle="Invoice" />

                <div class="grid grid-cols-12 gap-6">
                    <div class="col-span-12">
                        @include('components.alert-message')
                        <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                            <div class="relative overflow-x-auto card-body">
                                <table id="generatedInvoiceTable"
                                    class="table w-full pt-4 text-gray-700 dark:text-zinc-100">
                                    <thead>
                                        <tr>
                                            <th
                                                class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600 no-sort">
                                                <input type="checkbox"
                                                    class="align-middle rounded focus:ring-0 focus:ring-offset-0 dark:bg-zinc-700 dark:border-zinc-400 checked:bg-violet-500 dark:checked:bg-violet-500"
                                                    name="select_all" value="1" id="select_all"></th>
                                            <th class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600">
                                                Id</th>
                                            <th class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600">
                                                User Name</th>
                                            <th class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600">
                                                Full Name</th>
                                            <th class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600">
                                                Plan</th>
                                            <th class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600">
                                                Unit Price</th>
                                            <th class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600">
                                                Quantity</th>
                                            <th class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600">
                                                Sub Total</th>
                                            <th class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600">
                                                Tax</th>
                                            <th class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600">
                                                Discount</th>
                                            <th class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600">
                                                Grand Total</th>
                                            <th class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600">
                                                Paid</th>
                                            <th class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600">
                                                Unpaid</th>
                                            <th class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600">
                                                Invoice Date</th>
                                            <th class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600">
                                                Action</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- footer -->
                @include('layouts.footer')
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- Required datatable js -->
    <script src="{{ URL::asset('build/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <!-- Buttons examples -->
    <script src="{{ URL::asset('build/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/pdfmake/build/vfs_fonts.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>

    <!-- Responsive examples -->
    <script src="{{ URL::asset('build/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>

    <!-- Datatable init js -->
    <script src="{{ URL::asset('build/js/pages/datatables.init.js') }}"></script>

    <script>
        var getGeneratedInvoiceList = "{{ route('invoice.generated.fetch') }}";
    </script>

    <script src="{{ asset('js/backend/generated-invoice.js') }}"></script>
    <script>
        $(function() {
            invoice.init();
        });
    </script>
@endsection