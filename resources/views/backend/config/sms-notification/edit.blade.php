@extends('layouts.master')
@section('title', 'Edit SMS Notification')

@section('content')
    <div class="main-content group-data-[sidebar-size=sm]:ml-[70px]">
        <div class="page-content dark:bg-zinc-700">
            <div class="container-fluid px-[0.625rem]">

                <!-- page title -->
                <x-page-title title="Edit SMS Notification" pagetitle="SMS Notification" />

                <div class="grid grid-cols-1">
                    <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                        <form method="POST" action="{{ route('config.sms-notification.update', $sms) }}"
                            class="sms-notification-edit-form">
                            @csrf

                            <div class="bg-white sm:p-6 shadow sm:rounded-md">
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-4">
                                        <label for="title" class="block text-sm font-medium text-gray-700">Title<span class="text-sm text-red-600">*</span></label>
                                        <input type="text" name="title" id="title" placeholder="Enter title"
                                            class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                            value="{{ old('title', $sms->title) }}" readonly>
                                        @error('title')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="col-span-6 sm:col-span-4">
                                        <label for="description"
                                            class="block text-sm font-medium text-gray-700">Description<span
                                                class="text-sm text-red-600">*</span></label>
                                        <textarea type="text" name="description" id="description" placeholder="Enter description"
                                            class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100">{{ old('description', $sms->description) }}</textarea>
                                        @error('description')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="col-span-6 sm:col-span-4">
                                        <label for="description" class="block text-sm font-medium text-gray-700">Status<span
                                                class="text-sm text-red-600">*</span></label>

                                        <div class="mt-1 flex items-center">
                                            <div class="flex items-center" style="margin-right: 10px">
                                                <input type="radio" id="status1" name="status" value="1"
                                                    {{ old('status', $sms->status) == '1' ? 'checked' : '' }}
                                                    class="form-radio h-4 w-4 text-indigo-600 transition duration-150 ease-in-out">
                                                <label for="status1"
                                                    class="ml-2 block text-sm leading-5 text-gray-700">Active</label>
                                            </div>

                                            <div class="flex items-center">
                                                <input type="radio" id="status2" name="status" value="0"
                                                    {{ old('status', $sms->status) == '0' ? 'checked' : '' }}
                                                    class="form-radio h-4 w-4 text-indigo-600 transition duration-150 ease-in-out">
                                                <label for="status2"
                                                    class="ml-2 block text-sm leading-5 text-gray-700">Inactive</label>
                                            </div>
                                        </div>
                                        @error('status')
                                            <p class="error">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="col-span-6 sm:col-span-4 flex items-center justify-center">
                                        <button type="submit"
                                            class="mr-1 font-medium text-white border-transparent btn bg-violet-500 w-28 hover:bg-violet-700 focus:bg-violet-700 focus:ring focus:ring-violet-50">Submit</button>
                                        <a class="font-medium text-white border-transparent btn bg-red-500 w-28 hover:bg-red-700 focus:bg-red-700 focus:ring focus:ring-red-50"
                                            href="{{ route('config.sms-notification.index') }}">
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
    <script src="{{ asset('js/backend/sms-notification.js') }}"></script>
    <script>
        $(function() {
            smsNotification.edit();
        });
    </script>
@endsection