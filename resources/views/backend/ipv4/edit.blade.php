@extends('layouts.master')
@php
$titlePrefix = $routePrefix == 'ipv4' ? 'IPv4' : 'IPv4 DHCP';
@endphp
@section('title', 'Edit ' . $titlePrefix)
@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
<div class="main-content group-data-[sidebar-size=sm]:ml-[70px]">
    <div class="page-content dark:bg-zinc-700">
        <div class="container-fluid px-[0.625rem]">

            <!-- page title -->
            <x-page-title title="Edit {{ $titlePrefix }}" pagetitle="{{ $titlePrefix }}" />

            <div class="grid grid-cols-1">
                @include('components.alert-message')
                <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                    <form method="POST" action="{{ route($routePrefix . '.update', $ipv4->id) }}" class="ipv4-edit-form">
                        @csrf

                        <div class="bg-white sm:p-6 shadow sm:rounded-md">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-4">
                                    <label for="pool_name" class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Name<span class="text-sm text-red-600">*</span></label>
                                    <input type="text" name="pool_name" id="pool_name" placeholder="Enter Pool Name" class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100" value="{{ old('pool_name', $ipv4->pool_name) }}">
                                    @error('pool_name')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-span-6 sm:col-span-4">
                                    <label for="description" class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Description</label>
                                    <textarea type="text" name="description" id="description" placeholder="Enter Description" class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100">{{ old('description', $ipv4->description) }}</textarea>
                                    @error('description')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-span-6 sm:col-span-4">
                                    <label for="first_ip" class="block mb-2 font-medium text-gray-700 dark:text-gray-100">First IP<span class="text-sm text-red-600">*</span></label>
                                    <input type="text" name="first_ip" id="first_ip" placeholder="Enter First IP" class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100" value="{{ old('first_ip', $ipv4->first_ip) }}">
                                    @error('first_ip')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-span-6 sm:col-span-4">
                                    <label for="last_ip" class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Last IP<span class="text-sm text-red-600">*</span></label>
                                    <input type="text" name="last_ip" id="last_ip" placeholder="Enter Last IP" class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100" value="{{ old('last_ip', $ipv4->last_ip) }}">
                                    @error('last_ip')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-span-6 sm:col-span-4">
                                    <label for="prefix_length_id" class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Operators<span class="text-sm text-red-600">*</span></label>
                                    <div class="flex items-center col-span-6 sm:col-span-4">

                                        <select name="operator_id[]" id="operator_id" class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100 multi-select" multiple>
                                            <option value="">Select Operators</option>
                                            @foreach ($operators as $key => $value)
                                            <option value="{{ $value->id }}" {{ in_array($value->id, $currentOperators) ? 'selected' : '' }}>
                                                {{ $value->username }}
                                            </option>
                                            @endforeach
                                        </select>
                                        <a href="javascript:void(0)" class="bg-green-500 text-white font-bold py-2 px-4 rounded ml-4 select-all" id="select_btn">Select
                                            All</a>
                                    </div>
                                    @error('operator_id')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mt-3 col-span-6 sm:col-span-4 flex items-center justify-center">
                                    <button type="submit" class="mr-1 font-medium text-white border-transparent btn bg-violet-500 w-28 hover:bg-violet-700 focus:bg-violet-700 focus:ring focus:ring-violet-50">Submit</button>
                                    <a class="font-medium text-white border-transparent btn bg-red-500 w-28 hover:bg-red-700 focus:bg-red-700 focus:ring focus:ring-red-50" href="{{ route($routePrefix . '.index') }}">
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
<script type="text/javascript" src="{{ asset('js/libs/select2.min.js') }}"></script>
<script src="{{ asset('js/backend/ipv4.js') }}"></script>
<script>
    $(function() {
        ipv4.edit();
    });
</script>

@endsection