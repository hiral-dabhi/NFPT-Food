@extends('layouts.master')
@section('title', 'Tickets')
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
                <x-page-title title="Tickets List" pagetitle="Tickets" permission="ticket-complaint-create" route="tickets.list.create" />

                <div class="grid grid-cols-12 gap-6">
                    <div class="col-span-12">
                        @include('components.alert-message')
                        <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                            <div class="relative overflow-x-auto card-body">
                                <table id="tickets-table" class="table w-full pt-4 text-gray-700 dark:text-zinc-100" aria-label="table">
                                    <thead>
                                        <tr>
                                            <th
                                                class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600 py-2 px-4">
                                                Ticket</th>
                                            <th
                                                class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600 py-2 px-4">
                                                Portal Username</th>
                                            <th
                                                class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600 py-2 px-4">
                                                Subject</th>
                                            <th
                                                class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600 py-2 px-4">
                                                Group</th>
                                            <th
                                                class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600 py-2 px-4">
                                                Priority</th>
                                            <th
                                                class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600 py-2 px-4">
                                                Status</th>
                                            <th
                                                class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600 py-2 px-4">
                                                Due Date</th>
                                            <th
                                                class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600 py-2 px-4">
                                                PersonCalled</th>
                                            <th
                                                class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600 py-2 px-6">
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
    <script src="{{ URL::asset('js/libs/jquery-3.7.1.min.js') }}"></script>
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
        var getlist = "{{ route('tickets.list.fetch') }}";
        var ticketStatus="{{$status}}";
    </script>
    <script src="{{ asset('js/backend/tickets.js') }}"></script>
    <script>
        $(function() {
            tickets.init();
        });
    </script>
@endsection