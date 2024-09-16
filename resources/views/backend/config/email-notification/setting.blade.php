@extends('layouts.master')
@section('title')
{{ __('Email Notification') }}
@endsection
@section('content')
<div class="main-content group-data-[sidebar-size=sm]:ml-[70px]">
    <div class="page-content dark:bg-zinc-700">
        <div class="container-fluid px-[0.625rem]">


            <div class="col-span-12 xl:col-span-6">
                <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                    <div class="card-body border-b border-gray-100 dark:border-zinc-600">
                        <h6 class="mb-1 text-gray-700 text-15 dark:text-gray-100">Email Notification</h6>
                    </div>
                    <div class="flex flex-wrap card-body">
                        <div class="nav-tabs border-b-tabs">
                            <ul class="flex flex-wrap w-full text-sm font-medium text-center text-gray-500 border-b border-gray-100 nav dark:border-gray-700 dark:text-gray-400">
                                <li>
                                    <a href="{{ route('email-notification.setting') }}" class="inline-block p-4 active">Setting</a>
                                </li>
                                <li>
                                    <a href="{{ route('email-notification.index') }}" class="inline-block p-4">Templates</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 p-4">
                        @include('components.alert-message')
                        <div class="card dark:bg-zinc-800 dark:border-zinc-600">

                            <form method="POST" action="{{ route('email-notification.store-setting') }}" class="email-notification-setting-form">
                                @csrf
                                <div class="bg-white sm:p-6 shadow sm:rounded-md">
                                    <div class="grid grid-cols-6 gap-6">

                                        <div class="col-span-6 sm:col-span-4">
                                            <label for="from_email" class="block mb-2 font-medium text-gray-700 dark:text-gray-100">From
                                                Email<span class="text-sm text-red-600">*</span></label>
                                            <input type="text" name="from_email" id="from_email" placeholder="Enter From Email" class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100" value="{{ old('from_email', $email->from_email ?? '') }}">
                                            @error('from_email')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="col-span-6 sm:col-span-4">
                                            <label for="from_name" class="block mb-2 font-medium text-gray-700 dark:text-gray-100">From
                                                Name<span class="text-sm text-red-600">*</span></label>
                                            <input type="text" name="from_name" id="from_name" placeholder="Enter From Name" class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100" value="{{ old('from_name', $email->from_name ?? '') }}">
                                            @error('from_name')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="col-span-6 sm:col-span-4">
                                            <label for="username" class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Username<span class="text-sm text-red-600">*</span></label>
                                            <input type="text" name="username" id="username" placeholder="Enter username" class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100" value="{{ old('username', $email->username ?? '') }}">
                                            @error('username')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="col-span-6 sm:col-span-4">
                                            <label for="password" class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Password<span class="text-sm text-red-600">*</span></label>
                                            <input type="password" name="password" id="password" placeholder="Enter password" class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100" value="{{ old('password', $email->password ?? '') }}">
                                            @error('password')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="col-span-6 sm:col-span-4">
                                            <label for="host" class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Host<span class="text-sm text-red-600">*</span></label>
                                            <input type="text" name="host" id="host" placeholder="Enter host" class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100" value="{{ old('host', $email->host ?? '') }}">
                                            @error('host')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="col-span-6 sm:col-span-4">
                                            <label for="port" class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Port<span class="text-sm text-red-600">*</span></label>
                                            <input type="text" name="port" id="port" placeholder="Enter port" class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100" value="{{ old('port', $email->port ?? '') }}">
                                            @error('port')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="col-span-6 sm:col-span-4">
                                            <label for="status" class="block text-sm font-medium text-gray-700">Status<span class="text-sm text-red-600">*</span></label>

                                            <div class="mt-1 flex items-center status-div">
                                                <div class="flex items-center" style="margin-right: 10px">
                                                    <input type="radio" id="status1" name="protocol" value="0" {{ old('protocol', $email->protocol ?? '') == '0' ? 'checked' : '' }} class="form-radio h-4 w-4 text-indigo-600 transition duration-150 ease-in-out">
                                                    <label for="status1" class="ml-2 block text-sm leading-5 text-gray-700">SSL</label>
                                                </div>

                                                <div class="flex items-center">
                                                    <input type="radio" id="status2" name="protocol" value="1" {{ old('protocol', $email->protocol ?? '') == '1' ? 'checked' : '' }} class="form-radio h-4 w-4 text-indigo-600 transition duration-150 ease-in-out">
                                                    <label for="status2" class="ml-2 block text-sm leading-5 text-gray-700">TLS</label>
                                                </div>
                                            </div>
                                            @error('protocol')
                                            <p class="error">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="col-span-6 sm:col-span-4 flex items-center justify-center">
                                            <button type="submit" class="mr-1 font-medium text-white border-transparent btn bg-violet-500 w-28 hover:bg-violet-700 focus:bg-violet-700 focus:ring focus:ring-violet-50">Submit</button>
                                            <button type="button" class="mr-1 font-medium text-white border-transparent btn bg-green-500 w-28 hover:bg-green-700 focus:bg-green-700 focus:ring focus:ring-green-50" id="send-test-mail">Test</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
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
<script src="{{ asset('js/backend/email-notification.js') }}"></script>
<script>
    const sendTestMailUrl= "{{ route('email-notification.send-test-mail') }}"
    $(function() {
        emailNotification.setting();
    });
</script>
@endsection