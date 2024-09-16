@extends('layouts.master')
@section('title', 'Edit Ticket')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
                <x-page-title title="Ticket Edit: [#{{ $ticket->id }}]" pagetitle="Ticket" />

                <div class="grid grid-cols-1 mt-3">
                    <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                        <div class="card-body">
                            @include('components.alert-message')
                            <div class="flex items-center mb-6">
                                <div class="flex-grow">
                                    <div class="inline-flex items-center">
                                        <span
                                            class="text-lg font-medium text-gray-700 ltr:ml-1.5 rtl:mr-1.5 dark:text-gray-100 py-[1px] px-1.5 rounded text-sm {{ $statusColor }} text-white inline-block font-medium {{ $statusColor }}">
                                            #{{ $statusMapping[$ticket->status] }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <p class="mb-1 dark:text-zinc-100 text-lg text-bold">Ticket: #{{ $ticket->id }} -
                                    {{ $ticket->subject }}
                                </p>
                                <p class="mb-1 text-gray-700 dark:text-zinc-100"><i
                                        class="align-middle ltr:mr-1 rtl:ml-1"></i> CreatedBy:
                                    <strong>{{ $ticket->createdBy->name }}</strong> | CreatedDate:
                                    <strong>{{ $ticket->created_at }}</strong>
                                    | Operator/Employee:
                                    <strong>{{ $ticket->operatorName->name ?? '--' }}/{{ $ticket->employeeName->name ?? '--' }}</strong>
                                </p>
                                @if ($statusMapping[$ticket->status] === 'Open' || $statusMapping[$ticket->status] === 'Re-open')
                                    <button type="button"
                                        class="text-white btn bg-green-500 border-black-500 hover:bg-green-600 focus:ring ring-green-50 focus:bg-green-600"
                                        data-tw-toggle="modal" data-tw-target="#re-assign-modal"><i
                                            class="fa-solid fa-right-left"></i> Re-Assign</button>
                                @endif
                                @if ($statusMapping[$ticket->status] === 'Open' || $statusMapping[$ticket->status] === 'Re-open')
                                    <button type="button"
                                        class="text-white btn bg-green-500 border-black-500 hover:bg-green-600 focus:ring ring-green-50 focus:bg-green-600"
                                        data-tw-toggle="modal" data-tw-target="#re-solved-modal"><i class="fa fa-check"></i>
                                        Resolve</button>
                                @endif
                                @if ($statusMapping[$ticket->status] === 'Re-Solved')
                                    <button type="button"
                                        class="text-white btn bg-violet-500 border-violet-500 hover:bg-violet-600 focus:ring ring-violet-50focus:bg-violet-600"
                                        data-tw-toggle="modal" data-tw-target="#closed-modal"><i class="fa fa-cancel"></i>
                                        Close</button>
                                @endif
                                @if ($statusMapping[$ticket->status] === 'Re-Solved')
                                    <button type="button"
                                        class="text-white btn bg-yellow-500 border-yellow-500 hover:bg-yellow-600 focus:ring ring-yellow-50 focus:bg-yellow-600"
                                        data-tw-toggle="modal" data-tw-target="#re-open-modal"><i class="fa fa-mail"></i>
                                        Re-Open</button>
                                @endif
                                @if (
                                    $statusMapping[$ticket->status] === 'Open' ||
                                        $statusMapping[$ticket->status] === 'Re-Solved' ||
                                        $statusMapping[$ticket->status] === 'Re-open')
                                    <button type="button"
                                        class="text-white btn bg-violet-500 border-violet-500 hover:bg-violet-600 focus:ring ring-violet-50focus:bg-violet-600"
                                        data-tw-toggle="modal" data-tw-target="#comment-modal"><i class="fa fa-comment"></i>
                                        Add Comment</button>
                                @endif
                                @if (
                                    $statusMapping[$ticket->status] === 'Open' ||
                                        $statusMapping[$ticket->status] === 'Re-Solved' ||
                                        $statusMapping[$ticket->status] === 'Closed' ||
                                        $statusMapping[$ticket->status] === 'Re-open')
                                    <a class="text-white bg-red-500 border-red-500 btn hover:bg-red-600 hover:border-red-600 focus:bg-red-600 focus:border-red-600 focus:ring focus:ring-red-500/30 active:bg-red-600 active:border-red-600"
                                        href="{{ route('tickets.list.destroy', $ticket) }}" id="ticket-delete-btn">
                                        <i class="fas fa-trash-alt"></i> Delete
                                    </a>
                                @endif
                                <hr class="my-5 border-gray-100 dark:border-zinc-600">
                            </div>
                            @include('backend.tickets.modals.re-assign-modals')
                            @include('backend.tickets.modals.re-solved-modals')
                            @include('backend.tickets.modals.re-open-modals')
                            @include('backend.tickets.modals.closed-modals')
                            @include('backend.tickets.modals.comment-modals')

                            <div class="grid grid-cols-12">
                                <div class="col-span-6 md:col-span-6 mr-2">
                                    <h5 class="text-gray-700 text-15 dark:text-gray-100"><i class="fa fa-comments"></i>
                                        Comments:</h5>
                                    <div class="mt-3 card dark:border-zinc-600 p-6">
                                        <div style="max-height: 750px; overflow-y: auto;">
                                            @foreach ($ticket->comments as $comment)
                                                <div class="mt-1 card dark:border-zinc-600 p-2">
                                                    <div class="flex items-center">
                                                        <img class="border-[3px] border-gray-700 dark:border-zinc-400 rounded-full w-9 h-9 ltr:xl:mr-2 rtl:xl:ml-2"
                                                            src=""
                                                            alt="Profile Image">
                                                        <span><strong>{{ $comment->createdBy->username }}</strong></span>
                                                    </div>
                                                    <div>
                                                        <span class="time-difference"
                                                            data-created-at="{{ $comment->created_at->format('Y-m-d H:i:s') }}">{{ $comment->created_at->format('Y-m-d H:i:s') }}</span>
                                                    </div>
                                                    <hr class="mt-1 mb-1">
                                                    <div class="grid grid-cols-12">
                                                        <div class="col-span-8 md:col-span-8 mt-2 ml-2">
                                                            <span><strong>{{ $comment->comment }}</strong></span>
                                                        </div>
                                                        <div class="col-span-4 md:col-span-4">
                                                            @if ($comment->file)
                                                                <img src="{{ asset("storage/uploads/ticket_comment_files/{$comment->file->file_name}") }}"
                                                                    height="100px" width="100px" alt="Ticket Image" />
                                                            @endif
                                                        </div>
                                                    </div>

                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-6 md:col-span-6">
                                    <h5 class="text-gray-700 text-15 dark:text-gray-100"><i class="fas fa-info"></i> Info
                                    </h5>
                                    <div class="mt-3 card dark:border-zinc-600 p-6">
                                        <div class=" overflow-x-auto">
                                            <form method="POST" action="{{ route('tickets.list.update', $ticket->id) }}"
                                                class="ticket-edit-form">
                                                @csrf
                                                <div class="grid grid-cols-6 gap-6">
                                                    <div class="col-span-6 sm:col-span-4">
                                                        <label for="portal_user_name"
                                                            class="block mb-2 font-medium text-gray-700 dark:text-gray-100"><span
                                                                class="text-sm text-red-600">*</span>Portal Username</label>
                                                        <select name="portal_user_name" id="portal_user_name"
                                                            class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                            disabled>
                                                            <option value="">None</option>
                                                            @foreach ($portalUser as $key => $value)
                                                                <option value="{{ $value->id }}"
                                                                    {{ old('portal_user_name', $ticket->user_id) == $value->id ? 'selected' : '' }}>
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
                                                        <input type="text" name="subject" id="subject"
                                                            placeholder="Enter Subject"
                                                            class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                            value="{{ old('subject', $ticket->subject) }}"
                                                            {{ $ticket->status == 4 ? 'disabled' : '' }}>
                                                        @error('subject')
                                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                                        @enderror
                                                    </div>

                                                    <div class="col-span-6 sm:col-span-4">
                                                        <label for="priority"
                                                            class="block mb-2 font-medium text-gray-700 dark:text-gray-100">
                                                            <span class="text-sm text-red-600">*</span>Priority
                                                        </label>
                                                        <select name="priority" id="priority"
                                                            class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                            {{ $ticket->status == 4 ? 'disabled' : '' }}>

                                                            <option value="">Select Priority</option>

                                                            @foreach ($priorityMapping as $key => $value)
                                                                <option value="{{ $key }}"
                                                                    {{ old('priority', $ticket->priority) == $key ? 'selected' : '' }}>
                                                                    {{ $value }}</option>
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
                                                            class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                            {{ $ticket->status == 4 ? 'disabled' : '' }}>
                                                            <option value="">Select Group</option>
                                                            @foreach ($group as $key => $value)
                                                                <option value="{{ $key }}"
                                                                    {{ old('group_misc_id', $ticket->group_misc_id) == $key ? 'selected' : '' }}>
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
                                                            type="datetime-local"
                                                            value="{{ old('due_date', $ticket->due_date) }}"
                                                            id="due_date" name="due_date"
                                                            {{ $ticket->status == 4 ? 'disabled' : '' }}>

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
                                                            value="{{ old('person_called', $ticket->person_called) }}"
                                                            {{ $ticket->status == 4 ? 'disabled' : '' }}>
                                                        @error('person_called')
                                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                                        @enderror
                                                    </div>

                                                    <div class="col-span-6 sm:col-span-4">
                                                        <label for="person_called"
                                                            class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Tags</label>
                                                        <div class="chips chips-initial">
                                                        </div>
                                                    </div>
                                                    <input type="hidden"
                                                        value="{{ $ticket->tags ? $ticket->tags : '' }}" id="tagsData"
                                                        name="tagsData">
                                                    <div
                                                        class="col-span-6 sm:col-span-4 {{ $ticket->status == 4 ? 'hidden' : '' }}">
                                                        <label for="otp_verification"
                                                            class="block mb-2 font-medium text-gray-700 dark:text-gray-100">OTP
                                                            Verification</label>
                                                        <select name="otp_verification" id="otp_verification"
                                                            class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100">
                                                            <option value="">Select</option>
                                                            <option value="0"
                                                                {{ isset($ticket->otp_verification) && $ticket->otp_verification == '0' ? 'selected' : '' }}>
                                                                No</option>
                                                            <option value="1"
                                                                {{ isset($ticket->otp_verification) && $ticket->otp_verification == '1' ? 'selected' : '' }}>
                                                                Yes</option>

                                                        </select>
                                                        @error('otp_verification')
                                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="mt-4">
                                                    <div class="float-right pb-5 space-x-2">
                                                        <button type="submit"
                                                            class="mr-1 font-medium text-white border-transparent btn bg-violet-500 w-28 hover:bg-violet-700 focus:bg-violet-700 focus:ring focus:ring-violet-50 {{ $ticket->status == 4 ? 'hidden' : '' }}">
                                                            Submit
                                                        </button>
                                                        <a class="font-medium text-white border-transparent btn bg-red-500 w-28 hover:bg-red-700 focus:bg-red-700 focus:ring focus:ring-red-50"
                                                            href="{{ route('tickets.list.index') }}">
                                                            Back
                                                        </a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6">
                                <div class="col-span-12">
                                    <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                                        <div class="card-body border-b border-gray-100 dark:border-zinc-700">
                                            <p class=""> <i class="fa-regular fa-copy"></i> Event Logs</p>
                                        </div>
                                        <div class="relative overflow-x-auto card-body">
                                            <table id="ticketss-table"
                                                class="table w-full pt-4 text-gray-700 dark:text-zinc-100"
                                                aria-label="table">
                                                <thead>
                                                    <tr>
                                                        <th
                                                            class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600 py-2 px-4">
                                                            Status</th>
                                                        <th
                                                            class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600 py-2 px-4">
                                                            Message</th>
                                                        <th
                                                            class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600 py-2 px-4">
                                                            Comment</th>
                                                        <th
                                                            class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600 py-2 px-4">
                                                            ActionBy</th>
                                                        <th
                                                            class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600 py-2 px-4">
                                                            CreatedDate</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                </div>
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
    <script src="{{ URL::asset('js/libs/jquery-3.7.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/libs/moment.min.js') }}"></script>
    <!-- Required datatable js -->
    <script src="{{ URL::asset('build/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <!-- Buttons examples -->
    <script src="{{ URL::asset('build/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/pdfmake/build/vfs_fonts.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>

    <!-- Responsive examples -->
    <script src="{{ URL::asset('build/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>

    <!-- Datatable init js -->
    <script src="{{ URL::asset('build/js/pages/datatables.init.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/libs/select2.min.js') }}"></script>
    <script>
        var getlist = "{{ route('tickets.list.fetch') }}";
        var getTicketStatusList = "{{ route('tickets.list.ticketStatusDataFetch', ['ticket' => $ticket->id]) }}";
        var ticketStatus="";
    </script>
    <script src="{{ asset('js/backend/tickets.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script>
        var chipsData = [];
        var elems = document.querySelectorAll('.chips');
        var dataTags = {!! json_encode($ticket->tags) !!};
        M.Chips.init(elems, {
            // options if needed
        });
        $('.chips-initial').chips({
            data: chipsData,
        });
        $('#tagsData').val(chipsData);

        function fetchChipsData() {
            var chipsInstances = document.querySelectorAll('.chips-initial');
            chipsData = [];
            chipsInstances.forEach(function(chipInstance) {
                var chipData = M.Chips.getInstance(chipInstance).chipsData;
                chipData.forEach(function(chip) {
                    chipsData.push(chip.tag);
                });
            });
            return chipsData;
        }

        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.chips');
            M.Chips.init(elems, {
                onChipAdd: function() {
                    var chipsData = fetchChipsData();
                    updateHiddenInput(chipsData);
                },
                onChipDelete: function() {
                    var chipsData = fetchChipsData();
                    updateHiddenInput(chipsData);
                }
            });

            function updateHiddenInput(data) {
                $('#tagsData').val(JSON.stringify(data));
            }
        });
    </script>

    <script>
        $(function() {
            tickets.init();
            tickets.edit();
            tickets.time();
            tickets.ticketStatus();
        });
    </script>
@endsection