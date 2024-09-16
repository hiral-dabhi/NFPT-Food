@extends('layouts.master')
@section('title')
    {{ __('Dashboard') }}
@endsection
@section('css')
    <link href="{{ URL::asset('build/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet"
        type="text/css">

    <link href="{{ URL::asset('build/libs/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="main-content group-data-[sidebar-size=sm]:ml-[70px]">
        <div class="page-content dark:bg-zinc-700">
            <div class="container-fluid px-[0.625rem]">
                <!-- page title -->
                <x-page-title title="Dashbaord" pagetitle="Home" />
                @include('components.alert-message')
                @if (getCurrentUserRoleName() === 'Subscriber')
                    <div class="grid grid-cols-1 lg:gap-x-6 lg:grid-cols-12">
                        <div class="col-span-12 xl:col-span-3">
                            <div class="p-5 bg-green-600 border-green-600 rounded card">
                                <div class="grid grid-cols-12 gap-6">
                                    <div class="col-span-6 lg:col-span-6">
                                        <i class="fas fa-exchange-alt mr-3 text-white fa-3x"
                                            style="transform: rotate(-90deg);"></i>
                                    </div>
                                    <div class="col-span-6 lg:col-span-6 float-right">
                                        <div class="text-white flex justify-end">
                                            <span><b>Remain Data</b></span>
                                        </div>
                                        <div class="text-white flex justify-end mt-2">
                                            <span>
                                                <h4>Unlimited</h4>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-span-12">
                                        <hr>
                                    </div>
                                    <div class="col-span-12">
                                        <i class="fas fa-exchange-alt mr-3 text-white"
                                            style="transform: rotate(-90deg);"></i>
                                        <span class="text-white"><b>Total Remain Data</b></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 xl:col-span-3">
                            <div class="p-5 rounded card bg-sky-400 border-sky-400">
                                <div class="grid grid-cols-12 gap-6">
                                    <div class="col-span-6 lg:col-span-6">
                                        <i class="fa fa-calendar mr-3 text-white fa-3x"></i>
                                    </div>
                                    <div class="col-span-6 lg:col-span-6 float-right">
                                        <div class="text-white flex justify-end">
                                            <span><b>Remain Days</b></span>
                                        </div>
                                        <div class="text-white flex justify-end mt-2">
                                            <span>
                                                <h4>0</h4>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-span-12">
                                        <hr>
                                    </div>
                                    <div class="col-span-12">
                                        <i class="fa fa-calendar mr-3 text-white"></i>
                                        <span class="text-white"><b>Remain Days to Expire</b></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 xl:col-span-3">
                            <div class="p-5 rounded card bg-yellow-700 border-yellow-700">
                                <div class="grid grid-cols-12 gap-6">
                                    <div class="col-span-6 lg:col-span-6">
                                        <i class="fas fa-clock mr-3 text-white fa-3x"></i>
                                    </div>
                                    <div class="col-span-6 lg:col-span-6 float-right">
                                        <div class="text-white flex justify-end">
                                            <span><b>Remain Uptime</b></span>
                                        </div>
                                        <div class="text-white flex justify-end mt-2">
                                            <span>
                                                <h4>Unlimited</h4>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-span-12">
                                        <hr>
                                    </div>
                                    <div class="col-span-12">
                                        <i class="fas fa-clock mr-3 text-white"></i>
                                        <span class="text-white"><b>Total Remain Uptime</b></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 xl:col-span-3">
                            <div class="p-5 rounded card bg-red-700 border-red-700">
                                <div class="grid grid-cols-12 gap-6">
                                    <div class="col-span-6 lg:col-span-6">
                                        <i class="fa fa-database mr-3 text-white fa-3x"></i>
                                    </div>
                                    <div class="col-span-6 lg:col-span-6 float-right">
                                        <div class="text-white flex justify-end">
                                            <span><b>Today's Usage</b></span>
                                        </div>
                                        <div class="text-white flex justify-end mt-2">
                                            <span>
                                                <h4>0 GB</h4>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-span-12">
                                        <hr>
                                    </div>
                                    <div class="col-span-12">
                                        <i class="fa fa-database mr-3 text-white"></i>
                                        <span class="text-white"><b>Today's Data Usage</b></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="grid grid-cols-12 gap-6 border-2">

                        <div class="col-span-12 flex p-2 bg-green-700 ">
                            <div class="col-span-2 mr-5 flex justify-start items-center">
                                <i class="fa fa-info-circle text-white" aria-hidden="true"></i><span
                                    class="text-white ml-1"><b> Usage</b></span>
                            </div>
                            <div class="col-span-2 mr-2">
                                <select name="time_filter" id="time_filter"
                                    class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                    value="{{ old('time_filter') }}">
                                    @foreach ($timeFilter as $key => $value)
                                        <option value="{{ $key }}">
                                            {{ $value }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-span-2">
                                <select name="chart_type" id="chart_type"
                                    class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                    value="{{ old('chart_type') }}">
                                    @foreach ($chartType as $key => $value)
                                        <option value="{{ $key }}">
                                            {{ $value }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-span-12">
                            <div id="data-usage">
                            </div>
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
    <script src="{{ URL::asset('build/libs/apexcharts/apexcharts.min.js') }}"></script>
    <!-- Plugins js-->
    <script src="{{ URL::asset('build/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js') }}">
    </script>
    <script src="{{ URL::asset('build/libs/swiper/swiper-bundle.min.js') }}"></script>
    <!-- dashboard init -->
    <!-- <script src="{{ URL::asset('build/js/pages/dashboard.init.js') }}"></script> -->
    <script src="{{ URL::asset('build/js/pages/nav&tabs.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/libs/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('js/backend/dashboard.js') }}"></script>

    <script src="{{ URL::asset('build/js/pages/login.init.js') }}"></script>
    <script>
        var dataUsage = "{{ route('subscriber.dashboard.data-usage') }}";
    </script>
    <script>
        $(document).ready(function() {
            $("#time_filter").trigger('change');
        });
        $("#time_filter,#chart_type").on("change", function() {
            $(function() {
                dashboard.subscriber();
            });
        });
    </script>
@endsection
