@extends('layouts.master')
@section('title')
    {{ __('UCP Rights / Permissions') }}
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
                <x-page-title title="UCP Rights" pagetitle="UCP Rights" />

                <div class="grid grid-cols-1">
                    @include('components.alert-message')
                    <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                        <form method="POST" action="{{ route('config.ucp-update') }}" class="ucp-edit-form"
                            id="ucp_edit">
                            @csrf
                            <div class="bg-white sm:p-6 shadow sm:rounded-md">
                                <div class="hidden sm:block">
                                    <div class="py-8">
                                        <h3 class="text-center text-lg text-left text-gray-500">UCP Rights / Permissions</h3>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="relative overflow-x-auto">
                                        <table
                                            class="w-full text-sm text-left text-gray-500 border border-gray-50 dark:border-zinc-600" aria-label="table">
                                            <thead class="text-sm text-gray-700 dark:text-gray-100">
                                                <tr class="bg-white border">
                                                    <th scope="col" class="px-6 py-3 border-l">
                                                        Main Permission
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 border-l">
                                                        Sub Permission
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($permissions->where('parent_id', 0) as $key => $value)
                                                    <tr class="bg-white border">
                                                        <th class="px-3 py-3.5 border-l" scope="col">
                                                            <input type="checkbox" name="permission[]"
                                                                class="permissions mr-2 ckb-password align-middle rounded focus:ring-0 focus:ring-offset-0 dark:bg-zinc-700 dark:border-zinc-400 checked:bg-violet-500 dark:checked:bg-violet-500"
                                                                value="{{ $value->name }}"
                                                                id="permission_{{ $value->id }}"
                                                                data-id="{{ $value->id }}"
                                                                {{ in_array($value->name, $rolePermission) ? 'checked' : '' }}>
                                                            <span>{{ $value->description }}</span>
                                                        </th>
                                                        <td class="px-3 py-3.5 border-l">
                                                            @foreach ($permissions->where('parent_id', $value->id) as $k => $v)
                                                                <div class="mb-2">
                                                                    <input type="checkbox" name="permission[]"
                                                                        class="permissions mr-2 ckb-password align-middle rounded focus:ring-0 focus:ring-offset-0 dark:bg-zinc-700 dark:border-zinc-400 checked:bg-violet-500 dark:checked:bg-violet-500 sub_permission_{{ $value->id }}"
                                                                        value="{{ $v->name }}"
                                                                        id="sub_permission_{{ $value->id }}"
                                                                        data-id="{{ $value->id }}"
                                                                        {{ in_array($v->name, $rolePermission) ? 'checked' : '' }}>
                                                                    <span>{{ $v->description }}</span>
                                                                </div>
                                                            @endforeach
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                                <div class="mt-3 col-span-6 sm:col-span-4 flex items-center justify-center">
                                    <button type="submit"
                                        class="mr-1 font-medium text-white border-transparent btn bg-violet-500 w-28 hover:bg-violet-700 focus:bg-violet-700 focus:ring focus:ring-violet-50">Submit</button>
                                    <a class="font-medium text-white border-transparent btn bg-red-500 w-28 hover:bg-red-700 focus:bg-red-700 focus:ring focus:ring-red-50"
                                        href="{{ route('dashboard') }}">
                                        Back
                                    </a>
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
    <script type="text/javascript" src="{{ asset('js/libs/jquery.validate.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/alertifyjs/build/alertify.min.js') }}"></script>

    <script src="{{ asset('js/backend/role.js') }}"></script>
    <script>
        $(function() {
            role.edit();
        });
    </script>
@endsection