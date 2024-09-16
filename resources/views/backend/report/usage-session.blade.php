@extends('layouts.master')
@section('title', 'Usage / Session')
@section('css')
    <link href="{{ URL::asset('build/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ URL::asset('build/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />

    <link href="{{ URL::asset('build/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}"
        rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="main-content group-data-[sidebar-size=sm]:ml-[70px]">
        <div class="page-content dark:bg-zinc-700">
            <div class="container-fluid px-[0.625rem]">

                <x-page-title title="Usage / Session" pagetitle="Reports" />
                <div class="grid grid-cols-1">
                    <div class="card dark:bg-zinc-800 dark:border-zinc-600">

                        <div class="card-body">
                            <div class="grid grid-cols-12 gap-x-3 gap-y-3">
                                <div class="col-span-12 lg:col-span-3">
                                    <div>
                                        <div class="mb-2">
                                            <label for="username"
                                                class="font-medium text-gray-500 form-label text-13 dark:text-zinc-100">Username</label>
                                        </div>
                                        <input type="text" name="username"
                                            class="w-full rounded placeholder:text-sm py-2 border-gray-100 dark:bg-zinc-700/50 dark:border-zinc-600 dark:text-gray-100 dark:placeholder:text-zinc-100/60"
                                            placeholder="Username" id="username">
                                    </div>
                                </div>
                                <div class="col-span-12 lg:col-span-3">
                                    <div>
                                        <div class="mb-2">
                                            <label for="ip_address"
                                                class="font-medium text-gray-500 form-label text-13 dark:text-zinc-100">IP
                                                Address</label>
                                        </div>
                                        <input type="text" name="ip_address"
                                            class="w-full rounded placeholder:text-sm py-2 border-gray-100 dark:bg-zinc-700/50 dark:border-zinc-600 dark:text-gray-100 dark:placeholder:text-zinc-100/60"
                                            placeholder="IP Address" id="ip_address">
                                    </div>
                                </div>
                                <div class="col-span-12 lg:col-span-3">
                                    <div>
                                        <div class="mb-2">
                                            <label for="mac_address"
                                                class="font-medium text-gray-500 form-label text-13 dark:text-zinc-100">MAC
                                                Address</label>
                                        </div>
                                        <input type="text" name="mac_address"
                                            class="w-full rounded placeholder:text-sm py-2 border-gray-100 dark:bg-zinc-700/50 dark:border-zinc-600 dark:text-gray-100 dark:placeholder:text-zinc-100/60"
                                            placeholder="MAC Address" id="mac_address">
                                    </div>
                                </div>
                                <div class="col-span-12 lg:col-span-3">
                                    <div class="mb-3">
                                        <div class="mb-2">
                                            <label for="nas_id"
                                                class="font-medium text-gray-500 form-label text-13 dark:text-zinc-100">Protocol</label>
                                        </div>
                                        <select name="nas_id" id="nas_id"
                                            class="w-full rounded placeholder:text-sm py-2 border-gray-100 dark:bg-zinc-700/50 dark:border-zinc-600 dark:text-gray-100 dark:placeholder:text-zinc-100/60">
                                            <option value="">All</option>
                                            @foreach ($protocol as $key => $value)
                                                <option value="{{ $value }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-span-12 lg:col-span-3">
                                    <div>
                                        <div class="mb-2">
                                            <label for="date"
                                                class="font-medium text-gray-500 form-label text-13 dark:text-zinc-100">Date</label>
                                        </div>
                                        <input type="text" name="date"
                                            class="w-full rounded placeholder:text-sm py-2 border-gray-100 dark:bg-zinc-700/50 dark:border-zinc-600 dark:text-gray-100 dark:placeholder:text-zinc-100/60"
                                            placeholder="Select Date" id="date">
                                    </div>
                                </div>
                                <div class="col-span-12 lg:col-span-3">
                                    <div class="mb-3">
                                        <div class="mb-2">
                                            <label for="nas_id"
                                                class="font-medium text-gray-500 form-label text-13 dark:text-zinc-100">NAS</label>
                                        </div>
                                        <select name="nas_id" id="nas_id"
                                            class="w-full rounded placeholder:text-sm py-2 border-gray-100 dark:bg-zinc-700/50 dark:border-zinc-600 dark:text-gray-100 dark:placeholder:text-zinc-100/60">
                                            <option value="">All</option>
                                            @foreach ($nas as $key => $value)
                                                <option value="{{ $key }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-span-12 lg:col-span-3">
                                    <div>
                                        <div class="mb-2">
                                            <label for="nas_ip_address"
                                                class="font-medium text-gray-500 form-label text-13 dark:text-zinc-100">NAS
                                                IP Address</label>
                                        </div>
                                        <input type="text" name="nas_ip_address"
                                            class="w-full rounded placeholder:text-sm py-2 border-gray-100 dark:bg-zinc-700/50 dark:border-zinc-600 dark:text-gray-100 dark:placeholder:text-zinc-100/60"
                                            placeholder="NAS IP Address" id="nas_ip_address">
                                    </div>
                                </div>
                                <div class="col-span-12 lg:col-span-3">
                                    <div class="mb-3">
                                        <div class="mb-2">
                                            <label for="terminate_cause"
                                                class="font-medium text-gray-500 form-label text-13 dark:text-zinc-100">Terminate Cause</label>
                                        </div>
                                        <select name="terminate_cause" id="terminate_cause"
                                            class="w-full rounded placeholder:text-sm py-2 border-gray-100 dark:bg-zinc-700/50 dark:border-zinc-600 dark:text-gray-100 dark:placeholder:text-zinc-100/60">
                                            <option value="">All</option>
                                            @foreach ($terminateCauses as $key => $value)
                                                <option value="{{ $value }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-12 gap-6">
                    <div class="col-span-12">
                        @include('components.alert-message')
                        <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                            <div class="col-span-12 xl:col-span-3 border border-dark-800 mb-4">
                                <div class="col-span-12 flex p-2 bg-gray-200 ">
                                    <div class="col-span-2 mr-5 flex justify-start items-center">
                                        <i class="fa fa-info-circle text-black" aria-hidden="true"></i><span
                                            class="text-black ml-1"><b>Statistics</b></span>
                                    </div>
                                </div>
                                <div class="p-2 userStatusContent">
                                    <div class="grid grid-cols-12 gap-x-4 gap-y-4">
                                        <div class="col-span-12 lg:col-span-4">
                                            <p class="inline-block mr-6">Total Session(s): 
                                                <b><span class="total-session">--</span></b>
                                            </p>
                                        </div>
                                        <div class="col-span-12 lg:col-span-4">
                                            <p class="inline-block mr-6 float-center">Total Uptime: 
                                                <b><span class="total-uptime">--</span></b>
                                            </p>
                                        </div>
                                        <div class="col-span-12 lg:col-span-4">
                                            <p class="inline-block">Total DATA: 
                                                <b><span class="total-data">--</span></b>
                                            </p>
                                        </div>
                                        <div class="col-span-12 lg:col-span-4">
                                            <p class="inline-block">Total Upload DATA: 
                                                <b><span class="total-upload">--</span></b>
                                            </p>
                                        </div>
                                        <div class="col-span-12 lg:col-span-4">
                                            <p class="inline-block">Total Download DATA:  
                                                <b><span class="total-download">--</span></b>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="relative overflow-x-auto card-body">
                                <table id="usage-session-table" class="table w-full pt-4 text-gray-700 dark:text-zinc-100">
                                    <thead>
                                        <tr>
                                            <th
                                                class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600">
                                                ID</th>
                                            <th
                                                class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600">
                                                User Name</th>
                                            <th
                                                class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600">
                                                Start Time</th>
                                            <th
                                                class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600">
                                                Last Update</th>
                                            <th
                                                class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600">
                                                End Time</th>
                                            <th
                                                class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600">
                                                Up Time</th>
                                            <th
                                                class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600">
                                                Upload</th>
                                            <th
                                                class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600">
                                                Download</th>
                                            <th
                                                class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600">
                                                Data</th>
                                            <th
                                                class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600">
                                                MAC</th>
                                            <th
                                                class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600">
                                                Framed IPv4</th>
                                            <th
                                                class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600">
                                                Framed IPv6</th>
                                            <th
                                                class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600">
                                                NAS</th>
                                            <th
                                                class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600">
                                                Protocol</th>
                                            <th
                                                class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600">
                                                Terminate Cause</th>
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
    <script type="text/javascript" src="{{ asset('js/libs/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/pdfmake/build/vfs_fonts.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>

    <script src="{{ URL::asset('build/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>

    <script src="{{ URL::asset('build/js/pages/datatables.init.js') }}"></script>
    <script>
        var getlist = "{{ route('reports.usageSession.fetch') }}";
        var getTotalDataCount = "{{ route('reports.usageSession.totalCount') }}";
    </script>
    <script src="{{ asset('js/backend/reports.js') }}"></script>
    <script>
        $(function() {
            reports.usageSession();
        });
    </script>
@endsection
