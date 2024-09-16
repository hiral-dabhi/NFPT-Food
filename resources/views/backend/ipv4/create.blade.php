@extends('layouts.master')
@php
    $titlePrefix = $routePrefix == 'ipv4' ? 'IPv4' : 'IPv4 DHCP';
@endphp
@section('title', 'Create ' . $titlePrefix)

@section('content')
<div class="main-content group-data-[sidebar-size=sm]:ml-[70px]">
    <div class="page-content dark:bg-zinc-700">
        <div class="container-fluid px-[0.625rem]">

            <!-- page title -->
            <x-page-title title="Create {{ $titlePrefix }}" pagetitle="{{ $titlePrefix }}" />

            <div class="grid grid-cols-1">
                <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                    <form method="POST" action="{{ route($routePrefix . '.store') }}" class="ipv4-create-form">
                        @csrf
                        <div class="bg-white sm:p-6 shadow sm:rounded-md">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-4">
                                    <label for="pool_name" class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Name<span
                                            class="text-sm text-red-600">*</span></label>
                                    <input type="text" name="pool_name" id="pool_name" placeholder="Enter Pool Name"
                                        class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                        value="{{ old('pool_name') }}">
                                    @error('pool_name')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-span-6 sm:col-span-4">
                                    <label for="description"
                                        class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Description</label>
                                    <textarea type="text" name="description" id="description" placeholder="Enter Description"
                                        class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100">{{ old('description') }}</textarea>
                                    @error('description')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-span-6 sm:col-span-4">
                                    <label for="first_ip" class="block mb-2 font-medium text-gray-700 dark:text-gray-100">First IP<span
                                            class="text-sm text-red-600">*</span></label>
                                    <input type="text" name="first_ip" id="first_ip" placeholder="Enter First IP"
                                        class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                        value="{{ old('first_ip') }}">
                                    @error('first_ip')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-span-6 sm:col-span-4">
                                    <label for="last_ip" class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Last IP<span
                                            class="text-sm text-red-600">*</span></label>
                                    <input type="text" name="last_ip" id="last_ip" placeholder="Enter Last IP"
                                        class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                        value="{{ old('last_ip') }}">
                                    @error('last_ip')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mt-3 col-span-6 sm:col-span-4 flex items-center justify-center">
                                    <button type="submit"
                                        class="mr-1 font-medium text-white border-transparent btn bg-violet-500 w-28 hover:bg-violet-700 focus:bg-violet-700 focus:ring focus:ring-violet-50">Submit</button>
                                    <a class="font-medium text-white border-transparent btn bg-red-500 w-28 hover:bg-red-700 focus:bg-red-700 focus:ring focus:ring-red-50"
                                        href="{{ route($routePrefix . '.index') }}">
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
    <script src="{{ asset('js/backend/ipv4.js') }}"></script>
    <script>
        $(function() {
            ipv4.create();
        });
    </script>
@endsection
