@extends('layouts.master')
@section('title')
{{ __('System') }}
@endsection
@section('css')
<!-- DataTables -->
<link href="{{ URL::asset('build/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('build/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

<!-- Responsive datatable examples -->
<link href="{{ URL::asset('build/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<style>
    .knob {
        font-size: 17px;
    }
    .knob-canvas {
            border: none !important; /* Hide the border */
        }
</style>
@endsection
@section('content')
<div class="main-content group-data-[sidebar-size=sm]:ml-[70px]">
    <div class="page-content dark:bg-zinc-700">
        <div class="container-fluid px-[0.625rem]">

            <!-- page title -->
            <x-page-title title="System" pagetitle="System" />
            <div class="col-span-12 md:col-span-5 lg:col-span-4 xl:col-span-3 relative gap-6">
                <div class="grid grid-cols-1 lg:gap-x-6 lg:grid-cols-12">
                    <div class="col-span-12 xl:col-span-3">
                        <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                            <div class="card-body">
                                <div class="flex flex-col items-center justify-center">
                                    <h6 class="mb-4 text-gray-600 text-15 dark:text-gray-100">CPU</h6>
                                    <input class="knob" data-width="150" data-fgcolor="#5156be" data-displayinput="true" value="4.92%">
                                    <h6 class="mb-4 text-gray-600 text-15 dark:text-gray-100">19.68(1 min) / 19.73(5 min)</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 xl:col-span-3">
                        <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                            <div class="card-body">
                                <div class="flex flex-col items-center justify-center">
                                    <h6 class="mb-4 text-gray-600 text-15 dark:text-gray-100">Memory Usage</h6>
                                    <input class="knob" data-width="150" data-fgcolor="#5156be" data-displayinput="true" value="77">
                                    <h6 class="mb-4 text-gray-600 text-15 dark:text-gray-100">231.15 MB Free / 31.31 GB Total</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 xl:col-span-3">
                        <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                            <div class="card-body">
                                <div class="flex flex-col items-center justify-center">
                                    <h6 class="mb-4 text-gray-600 text-15 dark:text-gray-100">Disk Usage (ROOT)</h6>
                                    <input class="knob" data-width="150" data-fgcolor="#5156be" data-displayinput="true" value="36">
                                    <h6 class="mb-4 text-gray-600 text-15 dark:text-gray-100">31.47 GB Free / 31.31 GB Total</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 xl:col-span-3">
                        <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                            <div class="card-body">
                                <div class="flex flex-col items-center justify-center">
                                    <h6 class="mb-4 text-gray-600 text-15 dark:text-gray-100">Disk Usage (CTS)</h6>
                                    <input class="knob" data-width="150" data-fgcolor="#5156be" data-displayinput="true" value="83">
                                    <h6 class="mb-4 text-gray-600 text-15 dark:text-gray-100">751.79 GB Free / 3.58 TB Total</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-12 gap-6">
                <div class="col-span-12">
                    <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                        <div class="relative overflow-x-auto card-body">
                            <div class="col-span-12 xl:col-span-3 border border-dark-800 mb-4">
                                <div class="col-span-12 flex p-2 bg-green-700 ">
                                    <div class="col-span-2 mr-5 flex justify-start items-center">
                                        <i class="fa fa-warning text-white" aria-hidden="true"></i><span
                                            class="text-white ml-1"><b>Top Alerts</b></span>
                                    </div>
                                </div>
                                
                            </div>
                            <table id="system-alert-table" class="table w-full pt-4 text-gray-700 dark:text-zinc-100">
                                <thead>
                                    <tr>
                                        <th class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600 py-2 px-4">
                                            Type</th>
                                        <th class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600 py-2 px-4">
                                            Priority</th>
                                        <th class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600 py-2 px-4">
                                            DateTime</th>
                                        <th class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600 py-2 px-4">
                                            subject</th>
                                        <th class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600 py-2 px-4">
                                            Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            @include('backend.system.alert-view-modal')
            <!-- footer -->
            @include('layouts.footer')
        </div>
    </div>
    @endsection
    @section('scripts')
    <script type="text/javascript" src="{{ asset('js/libs/jquery-3.7.1.min.js') }}"></script>

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

    <script src="{{ URL::asset('build/libs/jquery-knob/jquery.knob.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/pages/jquery-knob.init.js') }}"></script>
    <script>
        var ststemAlertList = "{{ route('system.fetch-alerts') }}";
    </script>
    <script src="{{ asset('js/backend/system.js') }}"></script>
    <script>
        $('.knob').knob({
            thickness: 0.2, // Set to a small value to minimize the border
            format: function (value) {
                return value + '%';
            },
            draw: function () {
                $(this.i).css('font-size', '22px');
                // Set circle and font color based on value
                var value = this.cv;
                var color;
                if (value >= 1 && value <= 30) {
                    color = '#ff0000'; // Red
                } else if (value >= 31 && value <= 50) {
                    color = '#42adf5'; // Blue
                } else if (value >= 51 && value <= 80) {
                    color = '#24bfad'; // Green
                } else {
                    color = '#f5a442'; // Yellow
                }
                this.o.fgColor = color;
                $(this.i).css('color', color);
            }
        });
        $('.knob').each(function() {
            $(this).parent().find('canvas').css('border', 'none');
        });
        $(function() {
            system.systemAlertList();
        });
    </script>
    @endsection