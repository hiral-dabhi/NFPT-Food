@extends('layouts.master')
@section('title')
    {{ __('Schedule Edit') }}
@endsection
@section('css')
    <!-- DataTables -->
    <link href="{{ URL::asset('build/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ URL::asset('build/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="{{ URL::asset('build/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}"
        rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="main-content group-data-[sidebar-size=sm]:ml-[70px]">
        <div class="page-content dark:bg-zinc-700">
            <div class="container-fluid px-[0.625rem]">

                <!-- page title -->
                <x-page-title title="Schedule Edit" pagetitle="Lease" />

                <div class="grid grid-cols-12 gap-6">
                    <div class="col-span-12">
                        @include('components.alert-message')
                        <div class="card dark:bg-zinc-800 dark:border-zinc-600">                            
                            <div class="relative overflow-x-auto card-body">
                                <form class="space-y-4 update-schedule" id="update_schedule"
                                    action="{{ route('lease.schedule.update', $userSchedule->id) }}" method="POST">
                                    @csrf
                                    <div class="grid grid-cols-12 ">
                                        <div class="col-span-6">
                                            <div class="mt-4">
                                                <label for="username"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-100 ltr:text-left rtl:text-right">UserName</label>
                                                <span>{{ $user->username }}</span>
                                            </div>
                                            <div class="mb-4">
                                                <label for="service_id"
                                                    class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Service
                                                    /
                                                    Plan<span class="text-sm text-red-600">*</span></label>
                                                <select name="service_id" id="service_id"
                                                    class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                    value="{{ old('service_id') }}">
                                                    <option value="">Select Service</option>
                                                    @foreach ($services as $key => $value)
                                                        <option value="{{ $key }}"{{($userSchedule->service_id == $key) ? 'selected' : ''}}>
                                                            {{ $value }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('service_id')
                                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="mb-4">
                                                <label for="schedule_date"
                                                    class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Schedule
                                                    On
                                                    Date<span class="text-sm text-red-600">*</span></label>
                                                <input type="date" name="schedule_date" id="schedule_date"
                                                    placeholder="Select expiry date"
                                                    class="w-full border-gray-100 rounded placeholder:text-13 text-13 py-1.5 focus:border focus:ring focus:ring-violet-500/20 focus:border-violet-100 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 dark:text-zinc-100"
                                                    type="datetime-local"
                                                    value="{{ old('schedule_date', $userSchedule->schedule_date ?? '') }}">
                                                @error('schedule_date')
                                                    <p class="error">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="mt-4">
                                                <label for="comment"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-100 ltr:text-left rtl:text-right">Comment</label>
                                                <textarea type="text" name="comment" id="comment" placeholder="Comment Here..."
                                                    class="border border-gray-100 w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100">{{ old('comment', $userSchedule->comment ?? '') }}
                                                </textarea>
                                            </div>

                                            <div class="mt-4">
                                                <label for="discount"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-100 ltr:text-left rtl:text-right">Discount</label>
                                                <input type="number" name="discount" id="discount"
                                                    class="border border-gray-100  placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                    value="{{ old('discount', $userSchedule->discount ?? '') }}"
                                                    value="0" min="0">
                                                <i class="mdi mdi-percent"></i>
                                            </div>
                                            <div class="mt-4">
                                                <label for="other_charges"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-100 ltr:text-left rtl:text-right">Other
                                                    Charges</label>
                                                <input type="number" name="other_charges" id="other_charges"
                                                    class="border border-gray-100  placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20   dark:placeholder:text-zinc-100 placeholder:text-gray-800 dark:text-zinc-100"
                                                    value="{{ old('other_charges', $userSchedule->other_charges ?? '') }}"
                                                    value="0" min="0">
                                                <i class="bx bx-rupee"></i>
                                            </div>
                                            <div class="mb-4">
                                                <label
                                                    class="font-medium text-gray-700 ltr:mr-2 rtl:ml-2 dark:text-zinc-100"
                                                    for="formrow-customCheck">Paid</label>
                                                <input type="checkbox"
                                                    class="ckb-burst-enable align-middle rounded focus:ring-0 focus:ring-offset-0 dark:bg-zinc-700 dark:border-zinc-400 checked:bg-violet-500 dark:checked:bg-violet-500 "
                                                    name="is_paid" value="1"
                                                    {{ old('is_paid', $userSchedule->is_paid) == '1' ? 'checked' : '' }}>
                                            </div>
                                            <div class="col-span-6 sm:col-span-6 flex items-center justify-center mb-5">
                                                <button type="submit"
                                                    class="font-medium mr-1 text-white border-transparent btn bg-violet-500 w-28 hover:bg-violet-700 focus:bg-violet-700 focus:ring focus:ring-violet-50">Submit</button>
                                                <a class="font-medium text-white border-transparent btn bg-red-500 w-28 hover:bg-red-700 focus:bg-red-700 focus:ring focus:ring-red-50"
                                                    href="{{ route('lease.schedule',$user->id) }}">
                                                    Back
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
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
    <script src="{{ asset('js/backend/lease.js') }}"></script>
    <script>
        $(function() {
            lease.scheduleEdit();
        });
    </script>
@endsection
