@extends('layouts.master')
@section('title', 'Find EventLog(s)')
@section('css')
<!-- DataTables -->
<link href="{{ URL::asset('build/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('build/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

<!-- Responsive datatable examples -->
<link href="{{ URL::asset('build/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="{{ asset('css/libs/select2.min.css') }}">
<link rel="stylesheet" href="{{ URL::asset('build/libs/flatpickr/flatpickr.min.css') }}">

@endsection

@section('content')
<div class="main-content group-data-[sidebar-size=sm]:ml-[70px]">
    <div class="page-content dark:bg-zinc-700">
        <div class="container-fluid px-[0.625rem]">
            <x-page-title title="Find EventLog(s)" pagetitle="EventLog" />
            <div class="flex flex-wrap card-body">
                <div class="nav-tabs border-b-tabs">
                    <ul class="flex flex-wrap w-full text-sm font-medium text-center text-gray-500 border-b border-gray-100 nav dark:border-gray-700 dark:text-gray-400">
                        <li>
                            <a href="{{route('logs.server.auth')}}" class="inline-block p-4">AuthLog</a>
                        </li>
                        <li>
                            <a href="{{route('logs.server.event')}}" class="inline-block p-4 active">EventLog</a>
                        </li>

                    </ul>
                </div>
            </div>
            <div class="grid grid-cols-12 gap-6">
                <div class="col-span-12">
                    @include('components.alert-message')
                    <div class="card dark:bg-zinc-800 dark:border-zinc-600">

                        <div class="card-body">
                            <div class="grid grid-cols-12 gap-x-3 gap-y-3">
                                <div class="col-span-12 lg:col-span-4">
                                    <div>
                                        <div class="mb-2">
                                            <label for="date" class="font-medium text-gray-500 form-label text-13 dark:text-zinc-100">Date:</label>
                                        </div>
                                        <input type="text" name="date" class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100" placeholder="Select Date" id="date">
                                    </div>
                                </div>

                                <div class="col-span-12 lg:col-span-4">
                                    <div class="mb-3">
                                        <div class="mb-2">
                                            <label for="ipaddress" class="font-medium text-gray-500 form-label text-13 dark:text-zinc-100">IP
                                                Address:</label>
                                        </div>
                                        <input type="text" name="ipaddress" id="ipaddress" placeholder="IP Address" class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100" value="{{ old('username') }}">
                                    </div>
                                </div>

                                <div class="col-span-12 lg:col-span-4">
                                    <div class="mb-3">
                                        <div class="mb-2">
                                            <label for="status" class="font-medium text-gray-500 form-label text-13 dark:text-zinc-100">Status</label>
                                        </div>
                                        <select name="status" id="status" class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100">
                                            <option value="">All</option>
                                            <option value="accept">Accept</option>
                                            <option value="reject">Reject</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-x-3 gap-y-3">
                                <div class="col-span-12 lg:col-span-4">
                                    <div class="mb-3">
                                        <div class="mb-2">
                                            <label for="type" class="font-medium text-gray-500 form-label text-13 dark:text-zinc-100">Type</label>
                                        </div>
                                        <select name="type" id="type" class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100">
                                            <option value="">All</option>
                                            @foreach ($serverLogType as $key => $value)
                                            <option value="{{ $value }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-span-12 lg:col-span-4">
                                    <div class="mb-3">
                                        <div class="mb-2">
                                            <label for="message" class="font-medium text-gray-500 form-label text-13 dark:text-zinc-100">Message:</label>
                                        </div>
                                        <input type="text" name="message" id="message" placeholder="Event Message" class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100" value="{{ old('tax_no') }}">
                                    </div>
                                </div>

                                <div class="col-span-12 lg:col-span-4">
                                    <div class="mb-3">
                                        <div class="mb-2">
                                            <label for="action_by" class="font-medium text-gray-500 form-label text-13 dark:text-zinc-100">Action
                                                By</label>
                                        </div>
                                        <select name="action_by" id="action_by" class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100">
                                            <option value="">All</option>
                                            @foreach ($actionBy as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="relative overflow-x-auto card-body">
                            <div class="col-span-12 xl:col-span-3 border border-dark-800 mb-4">
                                <div class="col-span-12 flex p-2 bg-gray-200 ">
                                    <div class="col-span-2 mr-5 flex justify-start items-center">
                                        <i class="fa fa-info-circle text-black" aria-hidden="true"></i><span class="text-black ml-1"><b>Statistics</b></span>
                                    </div>
                                </div>
                                <div class="p-2 userStatusContent">
                                    <div class="grid grid-cols-12 gap-x-4 gap-y-4">

                                        <div class="col-span-12 lg:col-span-6">
                                            <p class="inline-block mr-6 text-green-700">Accept :
                                                <span>{{ $acceptCount }}</span>
                                            </p>
                                        </div>

                                        <div class="col-span-12 lg:col-span-6">
                                            <p class="inline-block text-red-700">Reject :
                                                <span class="text-red-600">{{ $rejectCount }}</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <table id="event-log-table" class="table w-full pt-4 text-gray-700 dark:text-zinc-100">
                                <thead>
                                    <tr>
                                        <th class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600">
                                            ID</th>
                                        <th class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600">
                                            Status</th>
                                        <th class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600">
                                            Message</th>
                                        <th class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600">
                                            Perticulars</th>
                                        <th class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600">
                                            Type</th>
                                        <th class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600">
                                            Remote IP</th>
                                        <th class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600">
                                            Action By</th>
                                        <th class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600">
                                            Created Date</th>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<!-- Required datatable js -->
<script src="{{ URL::asset('build/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('build/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<!-- Buttons examples -->
<script src="{{ URL::asset('build/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ URL::asset('build/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>

<!-- Responsive examples -->
<script src="{{ URL::asset('build/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('build/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>

<!-- Datatable init js -->
<script type="text/javascript" src="{{ asset('js/libs/select2.full.min.js') }}"></script>
<script>
    var getEventLogList = "{{ route('logs.server.get.event') }}";
</script>
<script src="{{ asset('js/backend/logs.js') }}"></script>
<script>
    $(function() {
        logs.eventlog();
    });
</script>
@endsection