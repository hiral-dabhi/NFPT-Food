@extends('layouts.master')
@section('title')
    {{ __('Edit User') }}
@endsection
@section('css')
    <link href="{{ URL::asset('build/libs/alertifyjs/build/css/alertify.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('build/libs/alertifyjs/build/css/themes/default.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="main-content group-data-[sidebar-size=sm]:ml-[70px]">
        <div class="page-content dark:bg-zinc-700">
            <div class="container-fluid px-[0.625rem]">

                <!-- page title -->
                <x-page-title title="Edit user" pagetitle="User" />

                <div class="grid grid-cols-1">
                    @include('components.alert-message')
                    <div class="flex flex-wrap card-body">
                        <div class="nav-tabs border-b-tabs">
                            <ul
                                class="flex flex-wrap w-full text-sm font-medium text-center text-gray-500 border-b border-gray-100 nav dark:border-gray-700 dark:text-gray-400">
                                <li>
                                    <a href="{{ route('user.edit', $user->id) }}" class="inline-block p-4 ">General</a>
                                </li>
                                <li>
                                    <a href="{{ route('user.services', $user->id) }}" class="inline-block p-4">Services</a>
                                </li>
                                <li>
                                    <a href="{{ route('user.settings', $user->id) }}" class="inline-block p-4">Settings</a>
                                </li>
                                <li>
                                    <a href="{{ route('user.document', $user->id) }}" class="inline-block p-4">Documents</a>
                                </li>
                                <li>
                                    <a href="{{ route('user.statistic', $user->id) }}"
                                        class="inline-block p-4 active">Statistics</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="grid grid-cols-12 gap-6">
                        <div class="col-span-12">
                            @include('components.alert-message')
                            <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                                <div class="card-body border-b border-gray-100 dark:border-zinc-700">
                                    <p class=""> <i class="fa-regular fa-copy"></i> Online Session</p>
                                </div>
                                <div class="relative overflow-x-auto card-body">
                                    <table id="usage-session-table"
                                        class="table w-full pt-4 text-gray-700 dark:text-zinc-100">
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
                                                    Download</th>
                                                <th
                                                    class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600">
                                                    Upload</th>
                                                <th
                                                    class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600">
                                                    Total</th>
                                                <th
                                                    class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600">
                                                    Up Time</th>
                                                <th
                                                    class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600">
                                                    Start Time</th>
                                                <th
                                                    class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600">
                                                    Framed IPv4</th>
                                                <th
                                                    class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600">
                                                    Framed IPv6</th>
                                                <th
                                                    class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600">
                                                    Delegated IPv6</th>
                                                <th
                                                    class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600">
                                                    MAC</th>
                                                <th
                                                    class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600">
                                                    NAS</th>
                                                <th
                                                    class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600">
                                                    Protocol</th>
                                                <th
                                                    class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600">
                                                    Action</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                            <div class="grid grid-cols-1 lg:gap-x-6 lg:grid-cols-12 mt-4">
                                @include('backend.user.statistics-info-usage')                                
                            </div>
                            <div class="card dark:bg-zinc-800 dark:border-zinc-600 mt-4">
                                <div class="card-body border-b border-gray-100 dark:border-zinc-700">
                                    <p class=""> <i class="fa-regular fa-copy"></i> Daily Usage (Last 30 Days)</p>
                                </div>
                                <div class="relative overflow-x-auto card-body">
                                    <table id="daily-usage-table"
                                        class="table w-full pt-4 text-gray-700 dark:text-zinc-100">
                                        <thead>
                                            <tr>
                                                <th
                                                    class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600">
                                                    ID</th>
                                                <th
                                                    class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600">
                                                    Date</th>
                                                <th
                                                    class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600">
                                                    Sessions</th>
                                                <th
                                                    class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600">
                                                    Download</th>
                                                <th
                                                    class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600">
                                                    Upload</th>
                                                <th
                                                    class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600">
                                                    Total</th>
                                                <th
                                                    class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600">
                                                    Up Time</th>

                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 lg:gap-x-6 lg:grid-cols-12 mt-4">
                        <div class="col-span-12 xl:col-span-6 border border-dark-800">
                            <div class="card-body border-b border-gray-100 dark:border-zinc-700">
                                <p class=""> <i class="fa-regular fa-copy"></i> Daily Usage (Last 30 Days)</p>
                            </div>
                            <div class="p-2 userAuthContent">
                                <table id="userauth-table" class="table w-full pt-4 text-gray-700 dark:text-zinc-100">
                                    <thead>
                                        <tr>
                                            <th
                                                class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600 py-2 px-4">
                                                ID</th>
                                            <th
                                                class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600 py-2 px-4">
                                                Username</th>
                                            <th
                                                class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600 py-2 px-4">
                                                Status</th>
                                            <th
                                                class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600 py-2 px-4">
                                                Message</th>
                                            <th
                                                class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600 py-2 px-4">
                                                Date/Time</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                @include('layouts.footer')
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript" src="{{ asset('js/libs/jquery-3.7.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/libs/jquery.validate.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/pdfmake/build/vfs_fonts.js') }}"></script>

    <script src="{{ URL::asset('build/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>

    <script src="{{ URL::asset('build/js/pages/datatables.init.js') }}"></script>
    <script src="{{ asset('js/backend/user.js') }}"></script>
    <script>
        var userId = "{{ $user->id }}";
        var username = "{{ $user->username ?? '' }}";
        var getlist = "{{ route('user.onlineSession.fetch') }}";
        var getUserAuthLog = "{{ route('user.auth.log') }}";
        var getDailyUsage = "{{ route('user.dailyUsage.fetch') }}";

        $(function() {
            user.statistics();
        });
    </script>
@endsection
