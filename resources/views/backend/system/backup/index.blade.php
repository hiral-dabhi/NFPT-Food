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
            <x-page-title title="Backup & Restore" pagetitle="System" />

            <div class="grid grid-cols-1">
                <div class="flex flex-wrap card-body">
                    <div class="nav-tabs border-b-tabs">
                        <ul class="flex flex-wrap w-full text-sm font-medium text-center text-gray-500 border-b border-gray-100 nav dark:border-gray-700 dark:text-gray-400">
                            <li>
                                <a href="#" class="inline-block p-4" onclick="showTab('general')">General</a>
                            </li>
                            <li>
                                <a href="#" class="inline-block p-4" onclick="showTab('drive')">Google Drive</a>
                            </li>
                            <li>
                                <a href="#" class="inline-block p-4" onclick="showTab('dropbox')">Dropbox</a>
                            </li>
                            <li>
                                <a href="#" class="inline-block p-4" onclick="showTab('ftp')">FTP</a>
                            </li>
                        </ul>
                    </div>
                </div>    
                <div class="card dark:bg-zinc-800 dark:border-zinc-600 w-full">
                    <div class="card-body">
                        <div class="grid grid-cols-2">
                            <div id="generalTab" class="tab-content" style="display: block;">
                                @include('backend.system.backup.general')
                            </div>
                            <div id="driveTab" class="tab-content" style="display: none;">
                                @include('backend.system.backup.drive')
                            </div>
                            <div id="dropboxTab" class="tab-content" style="display: none;">
                                <div class="w-full">
                                </div>
                                @include('backend.system.backup.dropbox')
                            </div>
                            <div id="ftpTab" class="tab-content" style="display: none;">
                                @include('backend.system.backup.ftp')
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
<script src="{{ URL::asset('build/libs/alertifyjs/build/alertify.min.js') }}"></script>
<script>
    function showTab(tabId) {
        document.querySelectorAll('.tab-content').forEach(tab => {
            tab.style.display = 'none';
        });
        document.getElementById(tabId + 'Tab').style.display = 'block';
    }

    $('#enable_billing').change(function() {
        $('#additionalDivs').toggle(this.checked);
    });

    $('#enable_billing_drive').change(function() {
        $('#additionalDivsDrive').toggle(this.checked);
    });

    $('#enable_billing_ftp').change(function() {
        $('#additionalDivsFTP').toggle(this.checked);
    });

    $('#enable_billing_dropbox').change(function() {
        $('#additionalDivsDropbox').toggle(this.checked);
    });
    $(function() {
        system.ConfigValidation();
    });
</script>
<script src="{{ asset('js/backend/system.js') }}"></script>
@endsection