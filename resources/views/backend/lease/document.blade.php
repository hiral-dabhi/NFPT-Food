@extends('layouts.master')
@section('title')
    {{ __('Edit Lease') }}
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
                <x-page-title title="Edit Lease" pagetitle="Lease" />

                <div class="grid grid-cols-1">
                    <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                        <div class="flex flex-wrap card-body">
                            <div class="nav-tabs border-b-tabs">
                                <ul
                                    class="flex flex-wrap w-full text-sm font-medium text-center text-gray-500 border-b border-gray-100 nav dark:border-gray-700 dark:text-gray-400">
                                    <li>
                                        <a href="{{ route('lease.edit', $user->id) }}" class="inline-block p-4">General</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('lease.services', $user->id) }}"
                                            class="inline-block p-4">Services</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('lease.settings', $user->id) }}"
                                            class="inline-block p-4">Settings</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('lease.document', $user->id) }}"
                                            class="inline-block p-4 active">Documents</a>
                                    </li>
                                    <li>
                                        <a href="#" class="inline-block p-4">Statistics</a>
                                    </li>


                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            @include('components.alert-message')

                            <label class="block text-sm font-medium text-red-700">KYC Documents Upload</label>
                            <div class="hidden sm:block">
                                <div class="py-8">
                                    <div class="border-t border-gray-200"></div>
                                </div>
                            </div>
                            <div class="relative overflow-x-auto">
                                <table class="w-full text-sm text-left text-gray-500" aria-label="table">
                                    <thead class="text-sm text-gray-700 dark:text-gray-100">
                                        <tr class="border border-gray-50 dark:border-zinc-600">
                                            <th scope="col"
                                                class="px-6 py-3 border-l border-gray-50 dark:border-zinc-600">
                                                Name
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 border-l border-gray-50 dark:border-zinc-600">
                                                Upload
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 border-l border-gray-50 dark:border-zinc-600">
                                                Preview
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 border-l border-gray-50 dark:border-zinc-600">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($docType as $k => $v)
                                            @php
                                                $enum = '';
                                                $name = '';
                                                if ($k === 'id_proof') {
                                                    $enum = config('enum.id_proof_type');
                                                    $name = 'id_proof_type';
                                                } elseif ($k === 'address_proof') {
                                                    $enum = config('enum.address_proof_type');
                                                    $name = 'address_proof_type';
                                                }
                                            @endphp
                                            <tr
                                                class="bg-white border border-gray-50 dark:border-zinc-600 dark:bg-transparent">
                                                <td scope="col"
                                                    class="px-6 py-3.5 text-black font-bold border-l border-gray-50 dark:border-zinc-600 dark:text-zinc-100">
                                                    {{ $v }} {!! in_array($k, $config) ? '<span class="text-sm text-red-600">*</span>' : '' !!}
                                                </td>
                                                <td scope="col"
                                                    class="px-6 py-3.5 border-l border-gray-50 dark:border-zinc-600 dark:text-zinc-100">
                                                    <div class="flex items-center">
                                                        <form
                                                            action="{{ route('lease.document.upload', ['user' => $user, 'documentType' => $k]) }}"
                                                            method="POST" enctype="multipart/form-data"
                                                            class="doc-{{ $k }}">
                                                            @csrf
                                                            <div class="px-6 py-3.5  flex items-center">
                                                                @if (!empty($enum))
                                                                    <div class="mr-2">
                                                                        <select name="{{ $name }}"
                                                                            class="placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                                            value="{{ old($name) }}">
                                                                            <option value="">Select type</option>
                                                                            @foreach ($enum as $key => $value)
                                                                                <option value="{{ $key }}"
                                                                                    {{ $user->userDetail->$name == $key ? 'selected' : '' }}>
                                                                                    {{ $value }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                @endif
                                                                <div><input type="file" name="document_file"
                                                                        class="mr-2" accept="image/*, application/pdf">
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </td>
                                                <td scope="col"
                                                    class="px-6 py-3.5 border-l border-gray-50 dark:border-zinc-600 dark:text-zinc-100">
                                                    @if (!empty($user->userDetail->$k) && file_exists(public_path('storage/uploads/' . $k . '/' . $user->userDetail->$k)))
                                                        @if (in_array(pathinfo($user->userDetail->$k, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png']))
                                                            <img src="{{ asset('storage/uploads/' . $k . '/' . $user->userDetail->$k) }}"
                                                                alt="{{ $v }}" class="max-w-full h-auto"
                                                                height="100px" width="100px">
                                                        @else
                                                            <i
                                                                class="w-10 h-10 text-xl leading-loose text-center text-gray-300 align-middle transition-all duration-300 border bx bxs-file-pdf border-gray-50 ltr:mr-5 rtl:ml-5 group-hover:border-transparent group-hover:bg-violet-50/50 group-hover:text-violet-500 dark:border-zinc-600 dark:group-hover:border-transparent dark:group-hover:bg-violet-500/20"></i>
                                                        @endif
                                                    @else
                                                        No Document
                                                    @endif
                                                </td>
                                                <td scope="col"
                                                    class="px-6 py-3.5 border-l border-gray-50 dark:border-zinc-600 dark:text-zinc-100">
                                                    <button type="button" data-class="{{ $k }}" data-name="{{ $name }}"
                                                        class="text-white btn bg-green-500 border-green-500 hover:bg-green-600 hover:border-violet-600 focus:bg-green-600 focus:border-green-600 focus:ring focus:ring-violet-500/30 active:bg-violet-600 active:border-violet-600 mr-2 upload-doc"
                                                        title="Upload"><i class="bx bx-upload"></i></button>
                                                    @if (!empty($user->userDetail->$k) && file_exists(public_path('storage/uploads/' . $k . '/' . $user->userDetail->$k)))
                                                        <a href="{{ route('lease.document.download', ['user' => $user, 'documentType' => $k]) }}"
                                                            class="text-white btn bg-violet-500 border-violet-500 hover:bg-violet-600 hover:border-violet-600 focus:bg-violet-600 focus:border-violet-600 focus:ring focus:ring-violet-500/30 active:bg-violet-600 active:border-violet-600 mr-2"
                                                            title="Download"><i class="bx bxs-download"></i></a>
                                                    @endif
                                                </td>
                                        @endforeach
                                    </tbody>
                                </table>
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
    <script type="text/javascript" src="{{ asset('js/libs/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/backend/lease.js') }}"></script>
    <script>
        $(function() {
            lease.docs();
        });
    </script>
@endsection
