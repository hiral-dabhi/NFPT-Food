@extends('layouts.master')
@section('title')
    {{ __('User Traffic') }}
@endsection
@section('css')
    <link href="{{ URL::asset('build/libs/alertifyjs/build/css/alertify.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('build/libs/alertifyjs/build/css/themes/default.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="main-content group-data-[sidebar-size=sm]:ml-[70px]">
        <div class="page-content dark:bg-zinc-700">
            <div class="container-fluid px-[0.625rem]">

                <!-- page title -->
                <x-page-title title="Edit user" pagetitle="User" />

                <div class="grid grid-cols-1">
                    @include('components.alert-message')
                    <div id="traffic" style="width: 100%; height: 400px;"></div>
                    <div id="traffic_bytes"></div>
                </div>
                @include('layouts.footer')
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript" src="{{ asset('js/libs/jquery-3.7.1.min.js') }}"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="{{ asset('js/backend/user-traffic.js') }}"></script>
    <script>
        var userId = "{{ $user->id }}";
        var userTrafficUrl = "{{ route('mikrotik.userTraffic') }}/";

    </script>
@endsection
