@extends('layouts.master')
@section('title', 'Create Ticket')

@section('content')
    <div class="main-content group-data-[sidebar-size=sm]:ml-[70px]">
        <div class="page-content dark:bg-zinc-700">
            <div class="container-fluid px-[0.625rem]">

                <!-- page title -->
                <x-page-title title="Create Ticket" pagetitle="Ticket" />

                <div class="grid grid-cols-1 mt-3">
                    <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                        @if (getCurrentUserRoleName() == 'Subscriber')
                            {{-- Subscriber --}}
                            <form method="POST" action="{{ route('subscriber.ticket-list.store') }}" class="ticket-create-form"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="bg-white sm:p-6 shadow sm:rounded-md">
                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-6 sm:col-span-4">
                                            <label for="subject"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100"><span
                                                    class="text-sm text-red-600">*</span>Subject</label>
                                            <input type="text" name="subject" id="subject" placeholder="Ticket Subject"
                                                class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                value="{{ old('subject') }}">
                                            @error('subject')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="col-span-6 sm:col-span-4">
                                            <label for="message"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100"><span
                                                    class="text-sm text-red-600">*</span>Message</label>
                                            <textarea type="text" name="message" id="message" placeholder="Ticket Message"
                                                class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100">{{ old('message') }}</textarea>
                                            @error('message')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="col-span-6 sm:col-span-4">
                                            <label for="priority"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100"><span
                                                    class="text-sm text-red-600">*</span>Priority</label>
                                            <select name="priority" id="priority"
                                                class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100">
                                                <option value="">Select Priority</option>
                                                @foreach ($priorityMapping as $key => $value)
                                                    <option value="{{ $key }}"
                                                        {{ old('priorityMapping') == $key ? 'selected' : '' }}>
                                                        {{ $value }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('priority')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="col-span-6 sm:col-span-4">
                                            <label for="group_misc_id"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100"><span
                                                    class="text-sm text-red-600">*</span>Group</label>
                                            <select name="group_misc_id" id="group_misc_id"
                                                class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100">
                                                <option value="">Select Group</option>
                                                @foreach ($group as $key => $value)
                                                    <option value="{{ $key }}"
                                                        {{ old('group_misc_id') == $key ? 'selected' : '' }}>
                                                        {{ $value }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('group_misc_id')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="col-span-6 sm:col-span-4">
                                            <label for="file_name"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Upload</label>
                                            <input type="file" name="file_name[]" id="file_name"
                                                class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                value="{{ old('file_name') }}" multiple>
                                            @error('file_name')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="col-span-6 sm:col-span-4 flex items-center justify-center">
                                            <button type="submit"
                                                class="mr-1 font-medium text-white border-transparent btn bg-violet-500 w-28 hover:bg-violet-700 focus:bg-violet-700 focus:ring focus:ring-violet-50">Submit</button>
                                            <a class="font-medium text-white border-transparent btn bg-red-500 w-28 hover:bg-red-700 focus:bg-red-700 focus:ring focus:ring-red-50"
                                                href="{{ route('subscriber.ticket-list.index') }}">
                                                Back
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        @else
                            <form method="POST" action="{{ route('tickets.list.store') }}" class="ticket-create-form"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="bg-white sm:p-6 shadow sm:rounded-md">
                                    <div class="grid grid-cols-6 gap-6">

                                        <div class="col-span-6 sm:col-span-4">
                                            <label for="portal_user_name"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100"><span
                                                    class="text-sm text-red-600">*</span>Portal Username</label>
                                            <select name="portal_user_name" id="portal_user_name"
                                                class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100">
                                                <option value="">None</option>
                                                @foreach ($portalUser as $key => $value)
                                                    <option value="{{ $value->id }}"
                                                        {{ old('portal_user_name') == $value->id ? 'selected' : '' }}>
                                                        {{ $value->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('portal_user_name')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="col-span-6 sm:col-span-4">
                                            <label for="subject"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100"><span
                                                    class="text-sm text-red-600">*</span>Subject</label>
                                            <input type="text" name="subject" id="subject" placeholder="Ticket Subject"
                                                class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                value="{{ old('subject') }}">
                                            @error('subject')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="col-span-6 sm:col-span-4">
                                            <label for="message"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100"><span
                                                    class="text-sm text-red-600">*</span>Message</label>
                                            <textarea type="text" name="message" id="message" placeholder="Ticket Message"
                                                class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100">{{ old('message') }}</textarea>
                                            @error('message')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="col-span-6 sm:col-span-4">
                                            <label for="priority"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100"><span
                                                    class="text-sm text-red-600">*</span>Priority</label>
                                            <select name="priority" id="priority"
                                                class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100">
                                                <option value="">Select Priority</option>
                                                @foreach ($priorityMapping as $key => $value)
                                                    <option value="{{ $key }}"
                                                        {{ old('priorityMapping') == $key ? 'selected' : '' }}>
                                                        {{ $value }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('priority')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="col-span-6 sm:col-span-4">
                                            <label for="group_misc_id"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100"><span
                                                    class="text-sm text-red-600">*</span>Group</label>
                                            <select name="group_misc_id" id="group_misc_id"
                                                class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100">
                                                <option value="">Select Group</option>
                                                @foreach ($group as $key => $value)
                                                    <option value="{{ $key }}"
                                                        {{ old('group_misc_id') == $key ? 'selected' : '' }}>
                                                        {{ $value }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('group_misc_id')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="col-span-6 sm:col-span-4">
                                            <label for="due_date"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100"><span
                                                    class="text-sm text-red-600">*</span>Due Date</label>
                                            <input
                                                class="w-full border-gray-100 rounded placeholder:text-13 text-13 py-1.5 focus:border focus:ring focus:ring-violet-500/20 focus:border-violet-100 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 dark:text-zinc-100"
                                                type="datetime-local" value="{{ old('due_date', '') }}" id="due_date"
                                                name="due_date">

                                            @error('due_date')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="col-span-6 sm:col-span-4">
                                            <label for="person_called"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Person
                                                Called</label>
                                            <input type="text" name="person_called" id="person_called"
                                                placeholder="Person Called"
                                                class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                value="{{ old('person_called') }}">
                                            @error('person_called')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="col-span-6 sm:col-span-4">
                                            <label for="operator_id"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100"><span
                                                    class="text-sm text-red-600">*</span>Operator</label>
                                            <select name="operator_id" id="operator_id"
                                                class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100">
                                                <option value="">None</option>
                                                @foreach ($operator as $key => $value)
                                                    <option value="{{ $value->id }}"
                                                        {{ old('operator_id') == $value->id ? 'selected' : '' }}>
                                                        {{ $value->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('operator_id')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="col-span-6 sm:col-span-4">
                                            <label for="employee_id"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100"><span
                                                    class="text-sm text-red-600">*</span>Employee</label>
                                            <select name="employee_id" id="employee_id"
                                                class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100">
                                                <option value="">None</option>
                                                @foreach ($employee as $key => $value)
                                                    <option value="{{ $value->id }}"
                                                        {{ old('employee_id') == $value->id ? 'selected' : '' }}>
                                                        {{ $value->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('employee_id')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="col-span-6 sm:col-span-4">
                                            <label for="otp_verification"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100">OTP
                                                Verification</label>
                                            <select name="otp_verification" id="otp_verification"
                                                class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100">
                                                <option value="">Select</option>
                                                <option value="0">No</option>
                                                <option value="1">Yes</option>
                                            </select>
                                            @error('otp_verification')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="col-span-6 sm:col-span-4">
                                            <label for="file_name"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Upload</label>
                                            <input type="file" name="file_name[]" id="file_name"
                                                class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                value="{{ old('file_name') }}" multiple>
                                            @error('file_name')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="col-span-6 sm:col-span-4 flex items-center justify-center">
                                            <button type="submit"
                                                class="mr-1 font-medium text-white border-transparent btn bg-violet-500 w-28 hover:bg-violet-700 focus:bg-violet-700 focus:ring focus:ring-violet-50">Submit</button>
                                            <a class="font-medium text-white border-transparent btn bg-red-500 w-28 hover:bg-red-700 focus:bg-red-700 focus:ring focus:ring-red-50"
                                                href="{{ route('tickets.list.index') }}">
                                                Back
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        @endif
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
    <script src="{{ asset('js/backend/tickets.js') }}"></script>
    <script>
        $(function() {
            tickets.create();
        });
    </script>
@endsection
