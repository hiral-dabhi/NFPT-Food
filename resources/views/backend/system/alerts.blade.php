@extends('layouts.master')
@section('title', 'System')
@section('css')
<!-- DataTables -->
<link href="{{ URL::asset('build/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('build/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

<!-- Responsive datatable examples -->
<link href="{{ URL::asset('build/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="main-content group-data-[sidebar-size=sm]:ml-[70px]">
    <div class="page-content dark:bg-zinc-700">
        <div class="container-fluid px-[0.625rem]">
            <!-- page title -->
            <x-page-title title="Alerts List" pagetitle="Alerts" />

            <div class="grid grid-cols-12 gap-6">
                <div class="col-span-12">
                    <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                        <div class="relative overflow-x-auto card-body">
                            <table id="system-alert-table" class="table w-full pt-4 text-gray-700 dark:text-zinc-100">
                                <thead>
                                    <tr>
                                        <th class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600 py-2 px-4">
                                            Type</th>
                                        <th class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600 py-2 px-4">
                                            Priority</th>
                                        <th class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600 py-2 px-4">
                                            DateTime</th>
                                        <th class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600 py-2 px-4">
                                            subject</th>
                                        <th class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600 py-2 px-4">
                                            Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            @include('backend.system.alert-view-modal')
            <!-- footer -->
            @include('layouts.footer')
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset('js/libs/jquery-3.7.1.min.js') }}"></script>
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

<script src="{{ URL::asset('build/libs/jquery-knob/jquery.knob.min.js') }}"></script>
<script src="{{ URL::asset('build/js/pages/jquery-knob.init.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    var ststemAlertList = "{{ route('system.fetch-alerts') }}";
</script>
<script src="{{ asset('js/backend/system.js') }}"></script>
<script>
    $(document).on('click', '#view-btn', function() {
        var dataId = $(this).data('id');
        $.ajax({
            url: "{{ route('system.view-alert')}}",
            type: 'POST',
            dataType: 'json',
            data: {
                "_token": "{{ csrf_token() }}",
                id: dataId,
            },
            success: function(data) {
                document.getElementById('viewModal').classList.remove('hidden');
                $("#subject").val(data.subject);
                $("#type").val(data.type);
                $("#priority").val(data.priority);
                $("#datetime").val(moment(data.created_at).format('YYYY-MM-DD HH:mm:ss'));
                $("#message").val(data.message);
            },
            error: function(error) {
                Swal.fire("Somthing went wrong!");
                console.error(error);
            }
        });
    })
    $(function() {
        system.systemAlertList();
    });
</script>
@endsection