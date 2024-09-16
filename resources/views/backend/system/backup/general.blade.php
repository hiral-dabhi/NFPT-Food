@extends('layouts.master')
@section('title')
    {{ __('Backup & Restore') }}
@endsection
@section('css')
    <!-- alertifyjs Css -->
    <link href="{{ URL::asset('build/libs/alertifyjs/build/css/alertify.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- alertifyjs default themes  Css -->
    <link href="{{ URL::asset('build/libs/alertifyjs/build/css/themes/default.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="main-content group-data-[sidebar-size=sm]:ml-[70px]">
        <div class="page-content dark:bg-zinc-700">
            <div class="container-fluid px-[0.625rem]">
                <!-- page title -->
                <x-page-title title="Backup & Restore" pagetitle="System" icon="fa fa-refresh" />
                <div class="grid grid-cols-1">
                    <div class="flex flex-wrap card-body">
                        <div class="nav-tabs border-b-tabs">
                            <ul
                                class="flex flex-wrap w-full text-sm font-medium text-center text-gray-500 border-b border-gray-100 nav dark:border-gray-700 dark:text-gray-400">
                                <li>
                                    <a href="{{ route('system.backupRestore.general') }}"
                                        class="inline-block p-4 active"><i class="fa fa-info-circle"></i> General</a>
                                </li>
                                <li>
                                    <a href="{{ route('system.backupRestore.googleDrive') }}" class="inline-block p-4"
                                        onclick="showTab('drive')"><i class="fab fa-google"></i> Google Drive</a>
                                </li>
                                <li>
                                    <a href="{{ route('system.backupRestore.dropBox') }}" class="inline-block p-4"
                                        onclick="showTab('dropbox')"><i class="fab fa-dropbox"></i> Dropbox</a>
                                </li>
                                <li>
                                    <a href="{{ route('system.backupRestore.ftp') }}" class="inline-block p-4"
                                        onclick="showTab('ftp')"><i class="fa fa-folder-open" aria-hidden="true"></i>
                                         FTP</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card dark:bg-zinc-800 dark:border-zinc-600 w-full">
                        <div class="card-body">
                            @include('components.alert-message')
                            <div class="grid grid-cols-12 gap-x-6">
                                <div class="col-span-12 lg:col-span-6">
                                    <form method="POST" action="{{ route('ipv6.store') }}" class="ipv6-create-form">
                                        @csrf
                                        <label class="block text-sm font-medium text-red-700">*Instant Backup
                                        </label>
                                        <div class="hidden sm:block">
                                            <div class="py-4">
                                                <div class="border-t border-gray-200"></div>
                                            </div>
                                        </div>
                                        <div class="col-span-6 sm:col-span-4">
                                            <label for="pool_name"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Last
                                                AutoBackup<span class="text-sm text-red-600">*</span></label>
                                            <input type="text" name="pool_name" id="pool_name"
                                                placeholder="Date and time"
                                                class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                value="{{ old('pool_name') }}" disabled>
                                            @error('pool_name')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        </br>
                                        <div class="col-span-6 sm:col-span-4 flex items-center justify-center">
                                            <button type="submit"
                                                class="mr-1 font-medium text-white border-transparent btn bg-violet-500 w-28 hover:bg-violet-700 focus:bg-violet-700 focus:ring focus:ring-violet-50">Backup</button>
                                            <a class="font-medium text-white border-transparent btn bg-red-500 w-28 hover:bg-red-700 focus:bg-red-700 focus:ring focus:ring-red-50"
                                                href="{{ route('system.dashboard') }}">
                                                Back
                                            </a>
                                        </div>
                                    </form>
                                </div>
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
    <script src="{{ asset('js/backend/system.js') }}"></script>
    {{-- <script>
        $(function() {
            system.general();
        });
    </script> --}}
@endsection
