@extends('layouts.master')
@section('title')
    {{ __('SMS Notification') }}
@endsection
@section('content')
    <div class="main-content group-data-[sidebar-size=sm]:ml-[70px]">
        <div class="page-content dark:bg-zinc-700">
            <div class="container-fluid px-[0.625rem]">


                <div class="col-span-12 xl:col-span-6">
                    <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                        <div class="card-body border-b border-gray-100 dark:border-zinc-600">
                            <h6 class="mb-1 text-gray-700 text-15 dark:text-gray-100">SMS Notification</h6>
                        </div>
                        <div class="flex flex-wrap card-body">
                            <div class="nav-tabs border-b-tabs">
                                <ul
                                    class="flex flex-wrap w-full text-sm font-medium text-center text-gray-500 border-b border-gray-100 nav dark:border-gray-700 dark:text-gray-400">
                                    <li>
                                        <a href="{{ route('config.sms-notification.setting') }}"
                                            class="inline-block p-4 active">Setting</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('config.sms-notification.index') }}"
                                            class="inline-block p-4">Templates</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 p-4">
                            @include('components.alert-message')
                            <div class="card dark:bg-zinc-800 dark:border-zinc-600">

                                <form method="POST" action="{{ route('config.sms-notification.store-setting') }}"
                                    class="sms-notification-setting-form">
                                    @csrf
                                    <div class="bg-white sm:p-6 shadow sm:rounded-md">
                                        <div class="grid grid-cols-6 gap-6">

                                            <div class="col-span-6 sm:col-span-4">
                                                <label for="sms_api"
                                                    class="block mb-2 font-medium text-gray-700 dark:text-gray-100">SMS
                                                    API<span class="text-sm text-red-600">*</span></label>
                                                <textarea name="sms_api" id="sms_api" placeholder="Enter SMS API"
                                                    class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100">{{ $sms['sms_api'] ?? '' }}</textarea>
                                                @error('sms_api')
                                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="col-span-6 sm:col-span-4 flex items-center justify-center">
                                                <button type="submit"
                                                    class="mr-1 font-medium text-white border-transparent btn bg-violet-500 w-28 hover:bg-violet-700 focus:bg-violet-700 focus:ring focus:ring-violet-50">Submit</button>
                                                <button type="button"
                                                    class="mr-1 font-medium text-white border-transparent btn bg-green-500 w-28 hover:bg-green-700 focus:bg-green-700 focus:ring focus:ring-green-50"
                                                    id="send-test-sms">Test</button>
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
    <script src="{{ asset('js/backend/sms-notification.js') }}"></script>
    <script>
        var sendTestSMSUrl= "{{ route('config.sms-notification.send-test-sms') }}";
        $(function() {
            smsNotification.setting();
        });
    </script>
@endsection
