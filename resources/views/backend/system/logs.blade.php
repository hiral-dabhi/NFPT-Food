@extends('layouts.master')
@section('title', 'Logs Management')

@section('content')
<div class="main-content group-data-[sidebar-size=sm]:ml-[70px]">
    <div class="page-content dark:bg-zinc-700">
        <div class="container-fluid px-[0.625rem]">
            <!-- page title -->
            <x-page-title title="Logs Management" pagetitle="Logs Management" />
            @include('components.alert-message')
            <div class="grid grid-cols-1">
                <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                    <form method="POST" action="{{ route('system.log-management-store') }}" class="log-management-form">
                        @csrf
                        <div class="bg-white sm:p-6 shadow sm:rounded-md">
                        <p class="mb-4"><span class="text-sm text-red-800 font-medium">*Log Rotation Setting</span></p>
                            <div class="grid grid-cols-6 gap-6">
                                <input type="hidden" name="logManagement" value="Log Management">
                                <div class="col-span-6 sm:col-span-4">
                                    <label for="aaa_auth_log" class="block mb-2 font-medium text-gray-700 dark:text-gray-100">AAA Auth Logs<span class="text-sm text-red-600">*</span></label>
                                    <select name="aaa_auth_log" id="aaa_auth_log" class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100">
                                        <option value="">Never</option>
                                        @for ($day = 1; $day <= 365; $day++) <option value="{{ $day }}" {{ ($logManagementData['aaa_auth_log'] ?? null) == $day ? 'selected' : '' }}>{{ $day }} Day(s)</option>
                                            @endfor
                                    </select>
                                    @error('aaa_auth_log')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-span-6 sm:col-span-4">
                                    <label for="app_auth_log" class="block mb-2 font-medium text-gray-700 dark:text-gray-100">APP Auth Logs<span class="text-sm text-red-600">*</span></label>
                                    <select name="app_auth_log" id="app_auth_log" class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100">
                                        <option value="">Never</option>
                                        @for ($day = 1; $day <= 365; $day++) <option value="{{ $day }}" {{ ($logManagementData['app_auth_log'] ?? null) == $day ? 'selected' : '' }}>{{ $day }} Day(s)</option>
                                            @endfor
                                    </select>
                                    @error('app_auth_log')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-span-6 sm:col-span-4">
                                    <label for="app_event_log" class="block mb-2 font-medium text-gray-700 dark:text-gray-100">APP Event Logs<span class="text-sm text-red-600">*</span></label>
                                    <select name="app_event_log" id="app_event_log" class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100">
                                        <option value="">Never</option>
                                        @for ($day = 1; $day <= 365; $day++) <option value="{{ $day }}" {{ ($logManagementData['app_event_log'] ?? null) == $day ? 'selected' : '' }}>{{ $day }} Day(s)</option>
                                            @endfor
                                    </select>
                                    @error('app_event_log')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-span-6 sm:col-span-4">
                                    <label for="cts_nat_event_log" class="block mb-2 font-medium text-gray-700 dark:text-gray-100">CTS/NAT Logs<span class="text-sm text-red-600">*</span></label>
                                    <select name="cts_nat_event_log" id="cts_nat_event_log" class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100">
                                        <option value="">Never</option>
                                        @for ($day = 1; $day <= 365; $day++) <option value="{{ $day }}" {{ ($logManagementData['cts_nat_event_log'] ?? null) == $day ? 'selected' : '' }}>{{ $day }} Day(s)</option>
                                            @endfor
                                    </select>
                                    @error('cts_nat_event_log')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-span-6 sm:col-span-4 flex items-center justify-center">
                                    <button type="submit" class="mr-1 font-medium text-white border-transparent btn bg-violet-500 w-28 hover:bg-violet-700 focus:bg-violet-700 focus:ring focus:ring-violet-50">Submit</button>
                                    <a class="font-medium text-white border-transparent btn bg-red-500 w-28 hover:bg-red-700 focus:bg-red-700 focus:ring focus:ring-red-50" href="{{ route('system.dashboard') }}">
                                        Back
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
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
<script src="{{ asset('js/backend/system.js') }}"></script>
<script>
    $(function() {
        system.logManagementValidation();
    });
</script>
@endsection