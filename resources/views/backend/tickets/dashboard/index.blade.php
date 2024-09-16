@extends('layouts.master')
@section('title', 'Tickets')
@section('css')
<!-- DataTables -->
<link href="{{ URL::asset('build/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('build/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

<!-- Responsive datatable examples -->
<link href="{{ URL::asset('build/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="main-content group-data-[sidebar-size=sm]:ml-[70px]">
    <div class="page-content dark:bg-zinc-700">
        <div class="container-fluid px-[0.625rem]">
            <!-- page title -->
            <x-page-title title="Tickets Dashboard" pagetitle="Tickets" />
            <div class="col-span-12 md:col-span-5 lg:col-span-4 xl:col-span-3 relative gap-6 mt-3">
                <div class="grid grid-cols-1 lg:gap-x-6 lg:grid-cols-12">
                    <div class="col-span-12 xl:col-span-3">
                        <div class="p-5 bg-green-600 border-green-600 rounded card">
                            <div class="grid grid-cols-12 gap-6">
                                <div class="col-span-6 lg:col-span-6">
                                    <i class="fas fa-ticket-alt mr-3 text-white fa-3x" style="transform: rotate(-45deg);"></i>
                                </div>
                                <div class="col-span-6 lg:col-span-6 float-right">
                                    <div class="text-white flex justify-end">
                                        <span><b>Today's Total</b></span>
                                    </div>
                                    <div class="text-white flex justify-end mt-2">
                                        <span>
                                            <h4>{{$todayTotalTicket}}</h4>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-span-12">
                                    <hr>
                                </div>
                                <div class="col-span-12">
                                    <i class="fas fa-ticket-alt mr-3 text-white" style="transform: rotate(-45deg);"></i>
                                    <span class="text-white"><b>Today's Total Tickets</b></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 xl:col-span-3">
                        <div class="p-5 rounded card bg-sky-400 border-sky-400">
                            <div class="grid grid-cols-12 gap-6">
                                <div class="col-span-6 lg:col-span-6">
                                    <i class="fas fa-ticket-alt mr-3 text-white fa-3x" style="transform: rotate(-45deg);"></i>
                                </div>
                                <div class="col-span-6 lg:col-span-6 float-right">
                                    <div class="text-white flex justify-end">
                                        <span><b>Today's Resolved</b></span>
                                    </div>
                                    <div class="text-white flex justify-end mt-2">
                                        <span>
                                            <h4>{{$todayResolvedTicket}}</h4>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-span-12">
                                    <hr>
                                </div>
                                <div class="col-span-12">
                                    <i class="fas fa-ticket-alt mr-3 text-white" style="transform: rotate(-45deg);"></i>
                                    <span class="text-white"><b>Today's Resolved Tickets</b></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 xl:col-span-3">
                        <div class="p-5 rounded card bg-yellow-700 border-yellow-700">
                            <div class="grid grid-cols-12 gap-6">
                                <div class="col-span-6 lg:col-span-6">
                                    <i class="fas fa-ticket-alt mr-3 text-white fa-3x" style="transform: rotate(-45deg);"></i>
                                </div>
                                <div class="col-span-6 lg:col-span-6 float-right">
                                    <div class="text-white flex justify-end">
                                        <span><b>Total In Progress</b></span>
                                    </div>
                                    <div class="text-white flex justify-end mt-2">
                                        <span>
                                            <h4>{{$totalInProcessTicket}}</h4>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-span-12">
                                    <hr>
                                </div>
                                <div class="col-span-12">
                                    <i class="fas fa-ticket-alt mr-3 text-white" style="transform: rotate(-45deg);"></i>
                                    <span class="text-white"><b>Total In Progress Tickets</b></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 xl:col-span-3">
                        <div class="p-5 rounded card bg-red-700 border-red-700">
                            <div class="grid grid-cols-12 gap-6">
                                <div class="col-span-6 lg:col-span-6">
                                    <i class="fas fa-ticket-alt mr-3 text-white fa-3x" style="transform: rotate(-45deg);"></i>
                                </div>
                                <div class="col-span-6 lg:col-span-6 float-right">
                                    <div class="text-white flex justify-end">
                                        <span><b>Assign To Me</b></span>
                                    </div>
                                    <div class="text-white flex justify-end mt-2">
                                        <span>
                                            <h4>{{$assignedToMeTickets}}</h4>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-span-12">
                                    <hr>
                                </div>
                                <div class="col-span-12">
                                    <i class="fas fa-ticket-alt mr-3 text-white" style="transform: rotate(-45deg);"></i>
                                    <span class="text-white"><b>Total Assign To Me</b></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-12 gap-6">
                <div class="col-span-12">
                    <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                        <div class="card-body border-b border-gray-100 dark:border-zinc-700">
                            <p class=""> <i class="fa fa-ticket-alt" style="transform: rotate(-45deg);"></i> Assigned To Me</p>
                        </div>
                        <div class="relative overflow-x-auto card-body">
                            <table id="assigned-to-me-tickets-table" class="table w-full pt-4 text-gray-700 dark:text-zinc-100" aria-label="table">
                                <thead>
                                    <tr>
                                        <th class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600 py-2 px-4">
                                            Ticket</th>
                                        <th class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600 py-2 px-4">
                                            Portal Username</th>
                                        <th class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600 py-2 px-4">
                                            Subject</th>
                                        <th class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600 py-2 px-4">
                                            Group</th>
                                        <th class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600 py-2 px-4">
                                            Priority</th>
                                        <th class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600 py-2 px-4">
                                            Status</th>
                                        <th class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600 py-2 px-4">
                                            Due Date</th>
                                        <th class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600 py-2 px-4">
                                            PersonCalled</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-12 gap-6">
                <div class="col-span-12">
                    <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                        <div class="card-body border-b border-gray-100 dark:border-zinc-700">
                            <p class=""> <i class="fa-regular fa-copy"></i> Total Events</p>
                        </div>
                        <div class="relative overflow-x-auto card-body">
                            <table id="top-event-of-tickets-table" class="table w-full pt-4 text-gray-700 dark:text-zinc-100" aria-label="table">
                                <thead>
                                    <tr>
                                        <th class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600 py-2 px-4">
                                            Status</th>
                                        <th class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600 py-2 px-4">
                                            Message</th>
                                        <th class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600 py-2 px-4">
                                            Comment</th>
                                        <th class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600 py-2 px-4">
                                            Ticket</th>
                                        <th class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600 py-2 px-4">
                                            ActionBy</th>
                                        <th class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600 py-2 px-4">
                                            CreatedDate</th>
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
    var getAssignToMeTicketList = "{{ route('tickets.dashboard.assigned-me-tickets') }}";
    var getTopEventOfTicketList = "{{ route('tickets.dashboard.top-event-of-tickets') }}";
    var ticketStatus="";
</script>
<script src="{{ asset('js/backend/tickets.js') }}"></script>

<script>
    $(function() {
        tickets.init();
        tickets.assignToMeTickes();
        tickets.topEventOfTickets();
    });
</script>
@endsection