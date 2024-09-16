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
                                        class="inline-block p-4"><i class="fa fa-info-circle"></i> General</a> 
                                </li>
                                <li>
                                    <a href="{{ route('system.backupRestore.googleDrive') }}"
                                        class="inline-block p-4 active"><i class="fab fa-google"></i> Google Drive</a>
                                </li>
                                <li>
                                    <a href="{{ route('system.backupRestore.dropBox') }}"
                                        class="inline-block p-4"><i class="fab fa-dropbox"></i> Dropbox</a>
                                </li>
                                <li>
                                    <a href="{{ route('system.backupRestore.ftp') }}" class="inline-block p-4"><i class="fa fa-folder-open" aria-hidden="true"></i> FTP</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card dark:bg-zinc-800 dark:border-zinc-600 w-full">
                        <div class="card-body">
                            @include('components.alert-message')
                            <form method="POST" action="{{ route('system.google-config-store') }}"
                                class="google-configuration-form">
                                @csrf
                                <div class="grid grid-cols-12 gap-x-6">
                                    <div class="col-span-12 lg:col-span-6">
                                        <div id="additionalDivsDrive"">
                                            <label class="block text-sm font-medium text-red-700">*GoogleDrive configuration
                                            </label>
                                            <div class="hidden sm:block">
                                                <div class="py-4">
                                                    <div class="border-t border-gray-200"></div>
                                                </div>
                                            </div>
                                            <div class="mb-4">
                                                <label for="client_id_drive"
                                                    class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Client
                                                    Id<span class="text-sm text-red-600 validated">*</span></label>
                                                <input type="text" name="client_id_drive" id="client_id_drive"
                                                    placeholder="Enter Client Id"
                                                    class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                    value="{{ old('client_id_drive', $backupRestoreConfigData['client_id_drive'] ?? '') }}">
                                                @error('client_id_drive')
                                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="mb-4">
                                                <label for="client_secret_drive"
                                                    class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Client
                                                    Secret<span class="text-sm text-red-600 validated">*</span></label>
                                                <input type="text" name="client_secret_drive" id="client_secret_drive"
                                                    placeholder="Enter Client Secret"
                                                    class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                    value="{{ old('client_secret_drive', $backupRestoreConfigData['client_secret_drive'] ?? '') }}">
                                                @error('client_secret_drive')
                                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="mb-4">
                                                <label for="refresh_token_drive"
                                                    class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Refresh
                                                    Token<span class="text-sm text-red-600 validated">*</span></label>
                                                <input type="text" name="refresh_token_drive" id="refresh_token_drive"
                                                    placeholder="Enter Refresh Token"
                                                    class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                    value="{{ old('refresh_token_drive', $backupRestoreConfigData['refresh_token_drive'] ?? '') }}">
                                                @error('refresh_token_drive')
                                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="mb-4">
                                                <label for="redirect_url_drive"
                                                    class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Redirect
                                                    URL<span class="text-sm text-red-600 validated">*</span></label>
                                                <input type="text" name="redirect_url_drive" id="redirect_url_drive"
                                                    placeholder="Enter Redirect URL"
                                                    class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                    value="{{ old('redirect_url_drive', $backupRestoreConfigData['redirect_url_drive'] ?? '') }}">
                                                @error('redirect_url_drive')
                                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="mb-4">
                                                <label for="autobackup_interval_drive"
                                                    class="block mb-2 font-medium text-gray-700 dark:text-gray-100">AutoBackup
                                                    Interval<span class="text-sm text-red-600 validated">*</span></label>
                                                <select name="autobackup_interval_drive" id="autobackup_interval_drive"
                                                    class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100">
                                                    <option value="">Never</option>
                                                    @for ($day = 1; $day <= 30; $day++)
                                                        <option value="{{ $day }}"
                                                            {{ isset($backupRestoreConfigData['autobackup_interval_drive']) && $day == $backupRestoreConfigData['autobackup_interval_drive'] ? 'selected' : '' }}>
                                                            Every {{ $day }} Day(s)</option>
                                                    @endfor
                                                </select>
                                                @error('autobackup_interval_drive')
                                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="mb-4">
                                                <label for="status"
                                                    class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Status<span
                                                        class="text-sm text-red-600">*</span></label>
                                                <div class="mt-1 flex items-center">
                                                    <div class="flex items-center" style="margin-right: 10px">
                                                        <input type="radio" id="status1" name="enable_billing_drive"
                                                            value="1"
                                                            {{ isset($backupRestoreConfigData['enable_billing_drive']) && $backupRestoreConfigData['enable_billing_drive'] == 1 ? 'checked' : '' }}
                                                            class="form-radio h-4 w-4 text-indigo-600 transition duration-150 ease-in-out status">
                                                        <label for="status1"
                                                            class="ml-2 block text-sm leading-5 text-gray-700">Active</label>
                                                    </div>

                                                    <div class="flex items-center">
                                                        <input type="radio" id="status2" name="enable_billing_drive"
                                                            value="0"
                                                            {{ isset($backupRestoreConfigData['enable_billing_drive']) && $backupRestoreConfigData['enable_billing_drive'] == 0 ? 'checked' : '' }}
                                                            class="form-radio h-4 w-4 text-indigo-600 transition duration-150 ease-in-out status">
                                                        <label for="status2"
                                                            class="ml-2 block text-sm leading-5 text-gray-700">Inactive</label>
                                                    </div>
                                                </div>
                                                @error('status')
                                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-span-6 sm:col-span-4 flex items-center justify-center">
                                                <button type="submit"
                                                    class="mr-1 font-medium text-white border-transparent btn bg-violet-500 w-28 hover:bg-violet-700 focus:bg-violet-700 focus:ring focus:ring-violet-50">Submit</button>
                                                <a class="font-medium text-white border-transparent btn bg-red-500 w-28 hover:bg-red-700 focus:bg-red-700 focus:ring focus:ring-red-50"
                                                    href="{{ route('system.dashboard') }}">
                                                    Back
                                                </a>
                                            </div>


                                        </div>

                                    </div>
                                    <div class="col-span-12 lg:col-span-6">
                                        <label class="block text-sm font-medium text-red-700">*Instant Backup On
                                            GoogleDrive
                                        </label>
                                        <div class="hidden sm:block">
                                            <div class="py-2">
                                                <div class="border-t border-gray-200"></div>
                                            </div>
                                        </div>
                                        <div class="mb-4">
                                            <label for="last_autobackup_drive"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Last
                                                AutoBackup<span class="text-sm text-red-600">*</span></label>
                                            <input type="text" name="last_autobackup_drive" id="last_autobackup_drive"
                                                placeholder="Date and time"
                                                class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                value="{{ old('last_autobackup_drive', $backupRestoreConfigData['last_autobackup_drive'] ?? '') }}"
                                                disabled>
                                            @error('last_autobackup_drive')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-span-6 sm:col-span-4 flex items-center justify-center">
                                            <input type="file" name="drive_upload" id="drive_upload"
                                                placeholder="Date and time"
                                                class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100">
                                        </div>
                                    </div>
                                </div>
                            </form>
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
    <script>
        $(function() {
            system.drive();
        });
    </script>
@endsection
