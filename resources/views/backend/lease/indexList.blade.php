@extends('layouts.master')
@section('title')
    {{ __('User') }}
@endsection
@section('content')
    <div class="main-content group-data-[sidebar-size=sm]:ml-[70px]">
        <div class="page-content dark:bg-zinc-700">
            <div class="container-fluid px-[0.625rem]">
                <!-- page title -->
                <x-page-title title="Lease" pagetitle="User list" route="lease.create" />

                <div class="grid grid-cols-12 gap-6">
                    <div class="col-span-12">

                        @include('components.alert-message')
                        <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                            <div class="card-body border-b border-gray-100 dark:border-zinc-600">
                                <div class="flex flex-wrap items-center gap-3">
                                    <div class="ml-auto">
                                        <div class="flex items-center">
                                            <ul class="flex flex-wrap">
                                                <li class="nav-item">
                                                    {{-- <button wire:click="changeView('user-list-grid')"
                                                        class="px-4 py-2 text-white rounded nav-link active bg-violet-500 text-16"
                                                        data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Grid"><i
                                                            class="bx bx-grid-alt"></i></button> --}}
                                                    <a href="{{ route('lease.index') }}"
                                                        class="px-4 py-2 text-gray-600 nav-link text-16 dark:text-gray-100"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        aria-label="Grid"><i class="bx bx-grid-alt"></i></a>
                                                </li>
                                                <li class="nav-item">
                                                    {{-- <button wire:click="changeView('user-list')"
                                                        class="px-4 py-2 text-gray-600 nav-link text-16 dark:text-gray-100"
                                                        data-bs-toggle="tooltip" data-bs-placement="top" aria-label="List"><i
                                                            class="bx bx-list-ul"></i></button> --}}
                                                    <a class="px-4 py-2 text-white rounded nav-link active bg-violet-500 text-16"
                                                        href="{{ route('lease.index.list') }}" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" aria-label="List"><i
                                                            class="bx bx-list-ul"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="relative overflow-x-auto card-body">
                                <div>
                                    @livewire('lease-list')
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
    <script type="text/javascript" src="{{ asset('js/libs/jquery-3.7.1.min.js') }}"></script>
@endsection
