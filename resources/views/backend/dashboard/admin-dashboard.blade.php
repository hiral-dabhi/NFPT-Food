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
                @can('dashboard-config')
                    <div class="col-span-12 xl:col-span-6 mt-2 ml-auto text-right mb-4">
                        <h5> <span id="currentDateTime" class="text-blue-500"></span> <span> / <i class="fa fa-cogs"></i>
                                <button type="button" class="text-blue-500" data-tw-toggle="modal"
                                    data-tw-target="#configModal">Config</button></span> </h5>
                    </div>
                @endcan
                @include('components.alert-message')
                @if (getCurrentUserRoleName() === 'SuperAdmin')
                    @include('backend.dashboard.dashboard-reports')
                @else
                    @can('dashboard-reports')
                        @include('backend.dashboard.dashboard-reports')
                    @endcan
                @endif
                <!-- footer -->
                @include('layouts.footer')
                @include('layouts.config-modal')
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @php
        $isGraph = false;
        if (getCurrentUserRoleName() === 'SuperAdmin') {
            $isGraph = true;
        }
    @endphp
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
    <script src="{{ asset('js/backend/interface-traffic.js') }}"></script>
    <script src="{{ asset('build/js/pages/highcharts.js') }}"></script>
    <script>
        var isGraph = "<?php echo $isGraph; ?>";
        var getMikrotikData = "{{ route('mikrotik.fetch') }}";
        var getLivebyNas = "{{ route('dashboard.livebynas') }}";
        var getUserAuthLog = "{{ route('user.auth.log') }}";
        var streamProcessorUrl = "{{ route('mikrotik.streamData') }}/";
        var interfacesUrl = "{{ route('mikrotik.getInterfaces') }}/";
        $(function() {
            dashboard.dataTraffic();
        });
    </script>
    <script></script>
@endsection
