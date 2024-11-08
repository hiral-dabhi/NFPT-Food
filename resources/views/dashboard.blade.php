@extends('layouts.master')
@section('title')
    {{ __('Dashboard') }}
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('css/libs/select2.min.css') }}">
    <link href="{{ URL::asset('build/libs/alertifyjs/build/css/themes/default.min.css') }}" rel="stylesheet" type="text/css" />
    <style>
        .custom-modal {
            overflow-y: scroll;
            max-height: 550px;
        }

        .apexcharts-yaxis text {
            fill: #6d92e2 !important;
        }
    </style>
@endsection
@section('content')
    <div class="main-content group-data-[sidebar-size=sm]:ml-[70px]">
        <div class="page-content dark:bg-zinc-700">
            <div class="container-fluid px-[0.625rem]">
                <!-- page title -->
                <x-page-title title="Dashboard" pagetitle="Home" />

                @include('components.alert-message')
                @if (auth()->user()->hasRole('SuperAdmin'))
                    <div class="col-span-12 md:col-span-5 lg:col-span-4 xl:col-span-3 relative gap-6 mt-3">
                        <div class="grid grid-cols-1 lg:gap-x-6 lg:grid-cols-12">
                            <div class="col-span-12 xl:col-span-3">
                                <div class="p-5 bg-green-600 border-green-600 rounded card">
                                    <div class="grid grid-cols-12 gap-6">
                                        <div class="col-span-6 lg:col-span-6">
                                            <i class="fas fa-ticket-alt mr-3 text-white fa-3x"
                                                style="transform: rotate(-45deg);"></i>
                                        </div>
                                        <div class="col-span-6 lg:col-span-6 float-right">
                                            <div class="text-white flex justify-end">
                                                <span><b>Businesses</b></span>
                                            </div>
                                            <div class="text-white flex justify-end mt-2">
                                                <span>
                                                    <h4>{{ $restaurantCount }}</h4>
                                                </span>
                                            </div>
                                        </div>
                                        {{-- <div class="col-span-12">
                                        <hr>
                                    </div> --}}
                                        {{-- <div class="col-span-12">
                                        <i class="fas fa-ticket-alt mr-3 text-white" style="transform: rotate(-45deg);"></i>
                                        <span class="text-white"><b>Today's Total Tickets</b></span>
                                    </div> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-12 xl:col-span-3">
                                <div class="p-5 rounded card bg-sky-400 border-sky-400">
                                    <div class="grid grid-cols-12 gap-6">
                                        <div class="col-span-6 lg:col-span-6">
                                            <i class="fas fa-ticket-alt mr-3 text-white fa-3x"
                                                style="transform: rotate(-45deg);"></i>
                                        </div>
                                        <div class="col-span-6 lg:col-span-6 float-right">
                                            <div class="text-white flex justify-end">
                                                <span><b>Drivers</b></span>
                                            </div>
                                            <div class="text-white flex justify-end mt-2">
                                                <span>
                                                    <h4>{{ $driverCount }}</h4>
                                                </span>
                                            </div>
                                        </div>
                                        {{-- <div class="col-span-12">
                                        <hr>
                                    </div> --}}
                                        {{-- <div class="col-span-12">
                                        <i class="fas fa-ticket-alt mr-3 text-white" style="transform: rotate(-45deg);"></i>
                                        <span class="text-white"><b>Today's Resolved Tickets</b></span>
                                    </div> --}}
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-span-12 xl:col-span-3">
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
                        </div> --}}
                        </div>
                    </div>
                @endif
                <!-- footer -->
                @include('layouts.footer')
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript" src="{{ asset('js/libs/select2.full.min.js') }}"></script>
    {{-- <script src="{{ URL::asset('build/libs/apexcharts/apexcharts.min.js') }}"></script> --}}
    <script src="{{ URL::asset('build/libs/swiper/swiper-bundle.min.js') }}"></script>


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

    <script src="{{ asset('js/backend/dashboard.js') }}"></script>
    {{-- <script src="{{ asset('js/backend/interface-traffic.js') }}"></script> --}}
    {{-- <script src="{{ asset('build/js/pages/highcharts.js') }}"></script> --}}
    <script>
        $(function() {
            dashboard.dataTraffic();
        });
    </script>
    <script></script>
@endsection
