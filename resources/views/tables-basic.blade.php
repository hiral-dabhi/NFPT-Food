@extends('layouts.master')
@section('title')
    {{ __('Bootstrap Basic Tables') }}
@endsection
@section('content')
    <div class="main-content group-data-[sidebar-size=sm]:ml-[70px]">
        <div class="page-content dark:bg-zinc-700">
            <div class="container-fluid px-[0.625rem]">

                <!-- page title -->
                <x-page-title title="Bootstrap Basic Tables" pagetitle="Tables" />

                <div class="grid grid-cols-12 gap-6">
                    <div class="col-span-12 xl:col-span-6">
                        <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                            <div class="card-body border-b border-gray-100 dark:border-zinc-600">
                                <h6 class="mb-1 text-gray-700 text-15 dark:text-gray-100">Basic example</h6>
                            </div>
                            <div class="card-body">
                                <div class="relative overflow-x-auto w-full">
                                    <table class="text-sm text-left text-gray-500 w-full">
                                        <thead class="text-sm text-gray-700 dark:text-gray-100">
                                            <tr>
                                                <th scope="col" class="px-6 py-3">
                                                    #
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    First Name
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Last Name
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Username
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr
                                                class="bg-white border-b border-gray-50 dark:bg-zinc-700 dark:border-zinc-600">
                                                <th scope="row"
                                                    class="px-6 py-3.5 font-medium text-gray-900 whitespace-nowrap dark:text-zinc-100">
                                                    1
                                                </th>
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    Mark
                                                </td>
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    Otto
                                                </td>
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    @mdo
                                                </td>
                                            </tr>
                                            <tr
                                                class="bg-white border-b border-gray-50 dark:bg-zinc-700 dark:border-zinc-600">
                                                <th scope="row"
                                                    class="px-6 py-3.5 font-medium text-gray-900 whitespace-nowrap dark:text-zinc-100">
                                                    2
                                                </th>
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    Jacob
                                                </td>
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    Thornton
                                                </td>
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    @fat
                                                </td>
                                            </tr>
                                            <tr class="bg-white dark:bg-zinc-700 dark:border-zinc-600">
                                                <th scope="row"
                                                    class="px-6 py-3.5 font-medium text-gray-900 whitespace-nowrap dark:text-zinc-100">
                                                    3
                                                </th>
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    Larry
                                                </td>
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    the Bird
                                                </td>
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    @twitter
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-span-12 xl:col-span-6">
                        <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                            <div class="card-body border-b border-gray-100 dark:border-zinc-600">
                                <h6 class="mb-1 text-gray-700 text-15 dark:text-gray-100">Full width</h6>
                            </div>
                            <div class="card-body">
                                <div class="relative overflow-x-auto w-full">
                                    <table
                                        class="w-full text-sm text-left text-gray-500 dark:bg-zinc-700 dark:border-zinc-600">
                                        <thead class="text-sm text-gray-700 dark:text-gray-100 ">
                                            <tr>
                                                <th scope="col" class="px-6 py-3">
                                                    #
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    First Name
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Last Name
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Username
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr
                                                class="bg-white border-b border-gray-50 dark:bg-zinc-700 dark:border-zinc-600">
                                                <th scope="row"
                                                    class="px-6 py-3.5 font-medium text-gray-900 whitespace-nowrap dark:text-zinc-100">
                                                    1
                                                </th>
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    Mark
                                                </td>
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    Otto
                                                </td>
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    @mdo
                                                </td>
                                            </tr>
                                            <tr
                                                class="bg-white border-b border-gray-50 dark:bg-zinc-700 dark:border-zinc-600">
                                                <th scope="row"
                                                    class="px-6 py-3.5 font-medium text-gray-900 whitespace-nowrap dark:text-zinc-100">
                                                    2
                                                </th>
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    Jacob
                                                </td>
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    Thornton
                                                </td>
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    @fat
                                                </td>
                                            </tr>
                                            <tr class="bg-white dark:bg-zinc-700 dark:border-zinc-600">
                                                <th scope="row"
                                                    class="px-6 py-3.5 font-medium text-gray-900 whitespace-nowrap dark:text-zinc-100">
                                                    3
                                                </th>
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    Larry
                                                </td>
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    the Bird
                                                </td>
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    @twitter
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="grid grid-cols-12 gap-6">
                    <div class="col-span-12 xl:col-span-6">
                        <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                            <div class="card-body border-b border-gray-100 dark:border-zinc-600">
                                <h6 class="mb-1 text-gray-700 text-15 dark:text-gray-100">Table head</h6>
                            </div>
                            <div class="card-body">
                                <div class="relative overflow-x-auto w-full">
                                    <table class="w-full text-sm text-left text-gray-500 ">
                                        <thead class="text-sm text-gray-700 dark:text-gray-100 bg-gray-50 dark:bg-zinc-600">
                                            <tr>
                                                <th scope="col" class="px-6 py-3">
                                                    #
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    First Name
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Last Name
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Username
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr
                                                class="bg-white border-b border-gray-50 dark:bg-zinc-700 dark:border-zinc-600">
                                                <th scope="row"
                                                    class="px-6 py-3.5 font-medium text-gray-900 whitespace-nowrap dark:text-zinc-100">
                                                    1
                                                </th>
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    Mark
                                                </td>
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    Otto
                                                </td>
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    @mdo
                                                </td>
                                            </tr>
                                            <tr
                                                class="bg-white border-b border-gray-50 dark:bg-zinc-700 dark:border-zinc-600">
                                                <th scope="row"
                                                    class="px-6 py-3.5 font-medium text-gray-900 whitespace-nowrap dark:text-zinc-100">
                                                    2
                                                </th>
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    Jacob
                                                </td>
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    Thornton
                                                </td>
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    @fat
                                                </td>
                                            </tr>
                                            <tr class="bg-white dark:bg-zinc-700">
                                                <th scope="row"
                                                    class="px-6 py-3.5 font-medium text-gray-900 whitespace-nowrap dark:text-zinc-100">
                                                    3
                                                </th>
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    Larry
                                                </td>
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    the Bird
                                                </td>
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    @twitter
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-span-12 xl:col-span-6">
                        <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                            <div class="card-body border-b border-gray-100 dark:border-zinc-600">
                                <h6 class="mb-1 text-gray-700 text-15 dark:text-gray-100">Striped rows</h6>
                            </div>
                            <div class="card-body">
                                <div class="relative overflow-x-auto">
                                    <table class="w-full text-sm text-left text-gray-500 ">
                                        <thead class="text-sm text-gray-700 dark:text-gray-100">
                                            <tr>
                                                <th scope="col" class="px-6 py-3.5">
                                                    #
                                                </th>
                                                <th scope="col" class="px-6 py-3.5">
                                                    First Name
                                                </th>
                                                <th scope="col" class="px-6 py-3.5">
                                                    Last Name
                                                </th>
                                                <th scope="col" class="px-6 py-3.5">
                                                    Username
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="bg-gray-50/60 dark:bg-zinc-600/50">
                                                <th scope="row"
                                                    class="px-6 py-3.5 font-medium text-gray-900 whitespace-nowrap dark:text-zinc-100">
                                                    1
                                                </th>
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    Mark
                                                </td>
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    Otto
                                                </td>
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    @mdo
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row"
                                                    class="px-6 py-3.5 font-medium text-gray-900 whitespace-nowrap dark:text-zinc-100">
                                                    2
                                                </th>
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    Jacob
                                                </td>
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    Thornton
                                                </td>
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    @fat
                                                </td>
                                            </tr>
                                            <tr class="bg-gray-50/60 dark:bg-zinc-600/50">
                                                <th scope="row"
                                                    class="px-6 py-3.5 font-medium text-gray-900 whitespace-nowrap dark:text-zinc-100">
                                                    3
                                                </th>
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    Larry
                                                </td>
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    the Bird
                                                </td>
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    @twitter
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="grid grid-cols-12 gap-6">
                    <div class="col-span-12 xl:col-span-6">
                        <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                            <div class="card-body border-b border-gray-100 dark:border-zinc-600">
                                <h6 class="mb-1 text-gray-700 text-15 dark:text-gray-100">Bordered table</h6>
                            </div>
                            <div class="card-body">
                                <div class="relative overflow-x-auto">
                                    <table class="w-full text-sm text-left text-gray-500 ">
                                        <thead class="text-sm text-gray-700 dark:text-gray-100">
                                            <tr class="border border-gray-50 dark:border-zinc-600">
                                                <th scope="col"
                                                    class="px-6 py-3 border-l border-gray-50 dark:border-zinc-600">
                                                    #
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 border-l border-gray-50 dark:border-zinc-600">
                                                    First Name
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 border-l border-gray-50 dark:border-zinc-600">
                                                    Last Name
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 border-l border-gray-50 dark:border-zinc-600">
                                                    Username
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr
                                                class="bg-white border border-gray-50 dark:border-zinc-600 dark:bg-transparent">
                                                <th scope="row"
                                                    class="px-6 py-3.5 border-l border-gray-50 dark:border-zinc-600 font-medium text-gray-900 whitespace-nowrap dark:text-zinc-100">
                                                    1
                                                </th>
                                                <td
                                                    class="px-6 py-3.5 border-l border-gray-50 dark:border-zinc-600 dark:text-zinc-100">
                                                    Mark
                                                </td>
                                                <td
                                                    class="px-6 py-3.5 border-l border-gray-50 dark:border-zinc-600 dark:text-zinc-100">
                                                    Otto
                                                </td>
                                                <td
                                                    class="px-6 py-3.5 border-l border-gray-50 dark:border-zinc-600 dark:text-zinc-100">
                                                    @mdo
                                                </td>
                                            </tr>
                                            <tr
                                                class="bg-white border border-gray-50 dark:border-zinc-600 dark:bg-transparent">
                                                <th scope="row"
                                                    class="px-6 py-3.5 border-l border-gray-50 dark:border-zinc-600 font-medium text-gray-900 whitespace-nowrap dark:text-zinc-100">
                                                    2
                                                </th>
                                                <td
                                                    class="px-6 py-3.5 border-l border-gray-50 dark:border-zinc-600 dark:text-zinc-100">
                                                    Jacob
                                                </td>
                                                <td
                                                    class="px-6 py-3.5 border-l border-gray-50 dark:border-zinc-600 dark:text-zinc-100">
                                                    Thornton
                                                </td>
                                                <td
                                                    class="px-6 py-3.5 border-l border-gray-50 dark:border-zinc-600 dark:text-zinc-100">
                                                    @fat
                                                </td>
                                            </tr>
                                            <tr
                                                class="bg-white border border-gray-50 dark:border-zinc-600 dark:bg-transparent">
                                                <th scope="row"
                                                    class="px-6 py-3.5 border-l border-gray-50 dark:border-zinc-600 font-medium text-gray-900 whitespace-nowrap dark:text-zinc-100">
                                                    3
                                                </th>
                                                <td
                                                    class="px-6 py-3.5 border-l border-gray-50 dark:border-zinc-600 dark:text-zinc-100">
                                                    Larry
                                                </td>
                                                <td
                                                    class="px-6 py-3.5 border-l border-gray-50 dark:border-zinc-600 dark:text-zinc-100">
                                                    the Bird
                                                </td>
                                                <td
                                                    class="px-6 py-3.5 border-l border-gray-50 dark:border-zinc-600 dark:text-zinc-100">
                                                    @twitter
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-span-12 xl:col-span-6">
                        <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                            <div class="card-body border-b border-gray-100 dark:border-zinc-600">
                                <h6 class="mb-1 text-gray-700 text-15 dark:text-gray-100">Borderless table</h6>
                            </div>
                            <div class="card-body">
                                <div class="relative overflow-x-auto">
                                    <table class="w-full text-sm text-left text-gray-500 ">
                                        <thead class="text-sm text-gray-700 dark:text-gray-100">
                                            <tr>
                                                <th scope="col" class="px-6 py-3.5">
                                                    #
                                                </th>
                                                <th scope="col" class="px-6 py-3.5">
                                                    First Name
                                                </th>
                                                <th scope="col" class="px-6 py-3.5">
                                                    Last Name
                                                </th>
                                                <th scope="col" class="px-6 py-3.5">
                                                    Username
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row"
                                                    class="px-6 py-3.5 font-medium text-gray-900 whitespace-nowrap dark:text-zinc-100">
                                                    1
                                                </th>
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    Mark
                                                </td>
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    Otto
                                                </td>
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    @mdo
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row"
                                                    class="px-6 py-3.5 font-medium text-gray-900 whitespace-nowrap dark:text-zinc-100">
                                                    2
                                                </th>
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    Jacob
                                                </td>
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    Thornton
                                                </td>
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    @fat
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row"
                                                    class="px-6 py-3.5 font-medium text-gray-900 whitespace-nowrap dark:text-zinc-100">
                                                    3
                                                </th>
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    Larry
                                                </td>
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    the Bird
                                                </td>
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    @twitter
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="grid grid-cols-12 gap-6">
                    <div class="col-span-12 xl:col-span-6">
                        <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                            <div class="card-body border-b border-gray-100 dark:border-zinc-600">
                                <h6 class="mb-1 text-gray-700 text-15 dark:text-gray-100">Nesting</h6>
                            </div>
                            <div class="card-body">
                                <div class="relative overflow-x-auto">
                                    <table class="w-full text-sm text-left text-gray-500 ">
                                        <thead class="text-sm text-gray-700 dark:text-gray-100">
                                            <tr class="border border-gray-50 dark:border-zinc-600">
                                                <th scope="col"
                                                    class="px-6 py-3 border-l border-gray-50 dark:border-zinc-600">
                                                    #
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 border-l border-gray-50 dark:border-zinc-600">
                                                    First Name
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 border-l border-gray-50 dark:border-zinc-600">
                                                    Last Name
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 border-l border-gray-50 dark:border-zinc-600">
                                                    Username
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr
                                                class="border border-gray-50 dark:border-zinc-600 bg-neutral-50/20 dark:bg-zinc-700/50">
                                                <th scope="row"
                                                    class="px-6 py-3.5 border-l border-gray-50 dark:border-zinc-600 font-medium text-gray-900 whitespace-nowrap dark:text-zinc-100">
                                                    1
                                                </th>
                                                <td
                                                    class="px-6 py-3.5 border-l border-gray-50 dark:border-zinc-600 dark:text-zinc-100">
                                                    Mark
                                                </td>
                                                <td
                                                    class="px-6 py-3.5 border-l border-gray-50 dark:border-zinc-600 dark:text-zinc-100">
                                                    Otto
                                                </td>
                                                <td
                                                    class="px-6 py-3.5 border-l border-gray-50 dark:border-zinc-600 dark:text-zinc-100">
                                                    @mdo
                                                </td>
                                            </tr>
                                            <tr class="border border-gray-50 dark:border-zinc-600">
                                                <td colspan="4" class="p-2">
                                                    <table class="table w-full text-sm text-left text-gray-500 ">
                                                        <thead class="text-sm text-gray-700 dark:text-gray-100">
                                                            <tr class="border border-gray-50 dark:border-zinc-600">
                                                                <th scope="col"
                                                                    class="px-6 py-3.5 border-l border-gray-50 dark:border-zinc-600 font-medium text-gray-900 whitespace-nowrap dark:text-gray-100">
                                                                    Header</th>
                                                                <th scope="col"
                                                                    class="px-6 py-3.5 border-l border-gray-50 dark:border-zinc-600 dark:text-gray-100">
                                                                    Header</th>
                                                                <th scope="col"
                                                                    class="px-6 py-3.5 border-l border-gray-50 dark:border-zinc-600 dark:text-gray-100">
                                                                    Header</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr class="border border-gray-50 dark:border-zinc-600">
                                                                <th scope="row"
                                                                    class="px-6 py-3.5 border-l border-gray-50 dark:border-zinc-600 font-medium text-gray-900 whitespace-nowrap dark:text-zinc-100">
                                                                    A</th>
                                                                <td
                                                                    class="px-6 py-3.5 border-l border-gray-50 dark:border-zinc-600 dark:text-zinc-100">
                                                                    First</td>
                                                                <td
                                                                    class="px-6 py-3.5 border-l border-gray-50 dark:border-zinc-600 dark:text-zinc-100">
                                                                    Last</td>
                                                            </tr>
                                                            <tr class="border border-gray-50 dark:border-zinc-600">
                                                                <th scope="row"
                                                                    class="px-6 py-3.5 border-l border-gray-50 dark:border-zinc-600 font-medium text-gray-900 whitespace-nowrap dark:text-zinc-100">
                                                                    B</th>
                                                                <td
                                                                    class="px-6 py-3.5 border-l border-gray-50 dark:border-zinc-600 dark:text-zinc-100">
                                                                    First</td>
                                                                <td
                                                                    class="px-6 py-3.5 border-l border-gray-50 dark:border-zinc-600 dark:text-zinc-100">
                                                                    Last</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr
                                                class="border bg-neutral-50/20 border-gray-50 dark:border-zinc-600 dark:bg-zinc-700/50">
                                                <th scope="row"
                                                    class="px-6 py-3.5 border-l border-gray-50 dark:border-zinc-600 font-medium text-gray-900 whitespace-nowrap dark:text-zinc-100">
                                                    3
                                                </th>
                                                <td
                                                    class="px-6 py-3.5 border-l border-gray-50 dark:border-zinc-600 dark:text-zinc-100">
                                                    Larry
                                                </td>
                                                <td
                                                    class="px-6 py-3.5 border-l border-gray-50 dark:border-zinc-600 dark:text-zinc-100">
                                                    the Bird
                                                </td>
                                                <td
                                                    class="px-6 py-3.5 border-l border-gray-50 dark:border-zinc-600 dark:text-zinc-100">
                                                    @twitter
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-span-12 xl:col-span-6">
                        <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                            <div class="card-body border-b border-gray-100 dark:border-zinc-600">
                                <h6 class="mb-1 text-gray-700 text-15 dark:text-gray-100">Hover state </h6>
                            </div>
                            <div class="card-body">
                                <div class="relative overflow-x-auto">
                                    <table class="w-full text-sm text-left text-gray-500 ">
                                        <thead
                                            class="text-sm text-gray-700 border-b dark:text-gray-100 border-gray-50 dark:border-zinc-600">
                                            <tr>
                                                <th scope="col" class="px-6 py-3.5">
                                                    #
                                                </th>
                                                <th scope="col" class="px-6 py-3.5">
                                                    First Name
                                                </th>
                                                <th scope="col" class="px-6 py-3.5">
                                                    Last Name
                                                </th>
                                                <th scope="col" class="px-6 py-3.5">
                                                    Username
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr
                                                class="text-sm text-gray-700 transition-all duration-200 border-b dark:text-gray-100 border-gray-50 dark:border-zinc-600 hover:bg-gray-50/50">
                                                <th scope="row"
                                                    class="px-6 py-3.5 font-medium text-gray-900 whitespace-nowrap dark:text-zinc-100">
                                                    1
                                                </th>
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    Mark
                                                </td>
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    Otto
                                                </td>
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    @mdo
                                                </td>
                                            </tr>
                                            <tr
                                                class="text-sm text-gray-700 transition-all duration-200 border-b dark:text-gray-100 border-gray-50 dark:border-zinc-600 hover:bg-gray-50/50">
                                                <th scope="row"
                                                    class="px-6 py-3.5 font-medium text-gray-900 whitespace-nowrap dark:text-zinc-100">
                                                    2
                                                </th>
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    Jacob
                                                </td>
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    Thornton
                                                </td>
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    @fat
                                                </td>
                                            </tr>
                                            <tr
                                                class="text-sm text-gray-700 transition-all duration-200 border-b dark:text-gray-100 border-gray-50 dark:border-zinc-600 hover:bg-gray-50/50">
                                                <th scope="row"
                                                    class="px-6 py-3.5 font-medium text-gray-900 whitespace-nowrap dark:text-zinc-100">
                                                    3
                                                </th>
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    Larry
                                                </td>
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    the Bird
                                                </td>
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    @twitter
                                                </td>
                                            </tr>
                                            <tr
                                                class="text-sm text-gray-700 transition-all duration-200 border-b dark:text-gray-100 border-gray-50 dark:border-zinc-600 hover:bg-gray-50/50">
                                                <th scope="row"
                                                    class="px-6 py-3.5 font-medium text-gray-900 whitespace-nowrap dark:text-zinc-100">
                                                    4
                                                </th>
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    Mark
                                                </td>
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    Otto
                                                </td>
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    @mdo
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-12 gap-6">
                    <div class="col-span-12 xl:col-span-6">
                        <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                            <div class="card-body border-b border-gray-100 dark:border-zinc-600">
                                <h6 class="mb-1 text-gray-700 text-15 dark:text-gray-100">Small table</h6>
                            </div>
                            <div class="card-body">
                                <div class="relative overflow-x-auto">
                                    <table class="w-full text-sm text-left text-gray-500 ">
                                        <thead
                                            class="text-sm text-gray-700 border-b dark:text-gray-100 border-gray-50 dark:border-zinc-600">
                                            <tr>
                                                <th scope="col" class="px-6 py-1.5">
                                                    #
                                                </th>
                                                <th scope="col" class="px-6 py-1.5">
                                                    First Name
                                                </th>
                                                <th scope="col" class="px-6 py-1.5">
                                                    Last Name
                                                </th>
                                                <th scope="col" class="px-6 py-1.5">
                                                    Username
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr
                                                class="text-sm text-gray-700 border-b dark:text-gray-100 border-gray-50 dark:border-zinc-600">
                                                <th scope="row"
                                                    class="px-6 py-1.5 font-medium text-gray-900 whitespace-nowrap dark:text-zinc-100">
                                                    1
                                                </th>
                                                <td class="px-6 py-1.5 dark:text-zinc-100">
                                                    Mark
                                                </td>
                                                <td class="px-6 py-1.5 dark:text-zinc-100">
                                                    Otto
                                                </td>
                                                <td class="px-6 py-1.5 dark:text-zinc-100">
                                                    @mdo
                                                </td>
                                            </tr>
                                            <tr
                                                class="text-sm text-gray-700 border-b dark:text-gray-100 border-gray-50 dark:border-zinc-600">
                                                <th scope="row"
                                                    class="px-6 py-1.5 font-medium text-gray-900 whitespace-nowrap dark:text-zinc-100">
                                                    2
                                                </th>
                                                <td class="px-6 py-1.5 dark:text-zinc-100">
                                                    Jacob
                                                </td>
                                                <td class="px-6 py-1.5 dark:text-zinc-100">
                                                    Thornton
                                                </td>
                                                <td class="px-6 py-1.5 dark:text-zinc-100">
                                                    @fat
                                                </td>
                                            </tr>
                                            <tr
                                                class="text-sm text-gray-700 border-b dark:text-gray-100 border-gray-50 dark:border-zinc-600 ">
                                                <th scope="row"
                                                    class="px-6 py-1.5 font-medium text-gray-900 whitespace-nowrap dark:text-zinc-100">
                                                    3
                                                </th>
                                                <td class="px-6 py-1.5 dark:text-zinc-100">
                                                    Larry
                                                </td>
                                                <td class="px-6 py-1.5 dark:text-zinc-100">
                                                    the Bird
                                                </td>
                                                <td class="px-6 py-1.5 dark:text-zinc-100">
                                                    @twitter
                                                </td>
                                            </tr>
                                            <tr
                                                class="text-sm text-gray-700 border-b dark:text-gray-100 border-gray-50 dark:border-zinc-600">
                                                <th scope="row"
                                                    class="px-6 py-1.5 font-medium text-gray-900 whitespace-nowrap dark:text-zinc-100">
                                                    4
                                                </th>
                                                <td class="px-6 py-1.5 dark:text-zinc-100">
                                                    Mark
                                                </td>
                                                <td class="px-6 py-1.5 dark:text-zinc-100">
                                                    Otto
                                                </td>
                                                <td class="px-6 py-1.5 dark:text-zinc-100">
                                                    @mdo
                                                </td>
                                            </tr>
                                            <tr
                                                class="text-sm text-gray-700 border-b dark:text-gray-100 border-gray-50 dark:border-zinc-600 ">
                                                <th scope="row"
                                                    class="px-6 py-1.5 font-medium text-gray-900 whitespace-nowrap dark:text-zinc-100">
                                                    5
                                                </th>
                                                <td class="px-6 py-1.5 dark:text-zinc-100">
                                                    Larry
                                                </td>
                                                <td class="px-6 py-1.5 dark:text-zinc-100">
                                                    the Bird
                                                </td>
                                                <td class="px-6 py-1.5 dark:text-zinc-100">
                                                    @twitter
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-span-12 xl:col-span-6">
                        <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                            <div class="card-body border-b border-gray-100 dark:border-zinc-600">
                                <h6 class="mb-1 text-gray-700 text-15 dark:text-gray-100">Table caption</h6>
                            </div>
                            <div class="card-body">
                                <div class="relative overflow-x-auto">
                                    <table class="w-full text-sm text-left text-gray-500 ">
                                        <caption
                                            class="p-5 py-0 text-lg font-semibold text-left text-gray-900 bg-transparent dark:text-gray-100">
                                            Our products
                                            <p class="mt-1 text-sm font-normal text-gray-500 dark:text-zinc-100/60">Browse
                                                a list of Flowbite products designed to help you work and play, stay
                                                organized, get answers, keep in touch, grow your business, and more.</p>
                                        </caption>

                                        <thead class="text-sm text-gray-700 dark:text-gray-100">
                                            <tr>
                                                <th scope="col" class="px-6 py-3.5">
                                                    #
                                                </th>
                                                <th scope="col" class="px-6 py-3.5">
                                                    First Name
                                                </th>
                                                <th scope="col" class="px-6 py-3.5">
                                                    Last Name
                                                </th>
                                                <th scope="col" class="px-6 py-3.5">
                                                    Username
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row"
                                                    class="px-6 py-3.5 font-medium text-gray-900 whitespace-nowrap dark:text-zinc-100">
                                                    1
                                                </th>
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    Mark
                                                </td>
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    Otto
                                                </td>
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    @mdo
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row"
                                                    class="px-6 py-3.5 font-medium text-gray-900 whitespace-nowrap dark:text-zinc-100">
                                                    2
                                                </th>
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    Jacob
                                                </td>
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    Thornton
                                                </td>
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    @fat
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row"
                                                    class="px-6 py-3.5 font-medium text-gray-900 whitespace-nowrap dark:text-zinc-100">
                                                    3
                                                </th>
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    Larry
                                                </td>
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    the Bird
                                                </td>
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    @twitter
                                                </td>
                                            </tr>
                                        </tbody>
                                        <caption class="inline p-5 font-medium text-gray-700 text-md dark:text-gray-100">
                                            List of users</caption>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="grid grid-cols-12 gap-6">
                    <div class="col-span-12 xl:col-span-6">
                        <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                            <div class="card-body border-b border-gray-100 dark:border-zinc-600">
                                <h6 class="mb-1 text-gray-700 text-15 dark:text-gray-100">Table colors </h6>
                            </div>
                            <div class="card-body">
                                <div class="relative overflow-x-auto rounded">
                                    <table class="w-full text-sm text-left text-gray-500 rounded">
                                        <thead
                                            class="text-sm border-b border-white bg-violet-50 text-violet-500 dark:bg-violet-500/10 dark:border-transparent">
                                            <tr>
                                                <th scope="col" class="px-6 py-3">
                                                    #
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Column heading
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Column heading
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Column heading
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr
                                                class="font-medium text-gray-700 border-b border-white bg-gray-50/50 dark:text-gray-100 dark:bg-gray-500/10 dark:border-transparent">
                                                <th scope="row" class="px-6 py-3.5 whitespace-nowrap">
                                                    1
                                                </th>
                                                <td class="px-6 py-3.5">
                                                    Column content
                                                </td>
                                                <td class="px-6 py-3.5">
                                                    Column content
                                                </td>
                                                <td class="px-6 py-3.5">
                                                    Column content
                                                </td>
                                            </tr>
                                            <tr
                                                class="font-medium text-green-600 border-b border-white bg-green-50/50 dark:bg-green-500/10 dark:border-transparent">
                                                <th scope="row" class="px-6 py-3.5 whitespace-nowrap">
                                                    2
                                                </th>
                                                <td class="px-6 py-3.5">
                                                    Column content
                                                </td>
                                                <td class="px-6 py-3.5">
                                                    Column content
                                                </td>
                                                <td class="px-6 py-3.5">
                                                    Column content
                                                </td>
                                            </tr>
                                            <tr
                                                class="font-medium border-b border-white text-sky-600 bg-sky-50/50 dark:bg-sky-500/10 dark:border-transparent">
                                                <th scope="row" class="px-6 py-3.5 whitespace-nowrap">
                                                    3
                                                </th>
                                                <td class="px-6 py-3.5">
                                                    Column content
                                                </td>
                                                <td class="px-6 py-3.5">
                                                    Column content
                                                </td>
                                                <td class="px-6 py-3.5">
                                                    Column content
                                                </td>
                                            </tr>
                                            <tr
                                                class="font-medium text-yellow-600 border-b border-white bg-yellow-50/50 dark:bg-violet-500/10 dark:border-transparent">
                                                <th scope="row" class="px-6 py-3.5 whitespace-nowrap">
                                                    4
                                                </th>
                                                <td class="px-6 py-3.5">
                                                    Column content
                                                </td>
                                                <td class="px-6 py-3.5">
                                                    Column content
                                                </td>
                                                <td class="px-6 py-3.5">
                                                    Column content
                                                </td>
                                            </tr>
                                            <tr
                                                class="font-medium text-red-600 border-b border-white bg-red-50/50 dark:bg-red-500/10 dark:border-transparent">
                                                <th scope="row" class="px-6 py-3.5 whitespace-nowrap">
                                                    5
                                                </th>
                                                <td class="px-6 py-3.5">
                                                    Column content
                                                </td>
                                                <td class="px-6 py-3.5">
                                                    Column content
                                                </td>
                                                <td class="px-6 py-3.5">
                                                    Column content
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-span-12 xl:col-span-6">
                        <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                            <div class="card-body border-b border-gray-100 dark:border-zinc-600">
                                <h6 class="mb-1 text-gray-700 text-15 dark:text-gray-100">Checkbox selection</h6>
                            </div>
                            <div class="card-body">
                                <div class="relative overflow-x-auto rounded-lg">
                                    <table class="w-full text-sm text-left text-gray-500">
                                        <thead
                                            class="text-xs text-gray-700 uppercase dark:text-gray-100 bg-gray-50/50 dark:bg-zinc-700/50">
                                            <tr>
                                                <th scope="col" class="p-4">
                                                    <div class="flex items-center">
                                                        <input id="checkbox-all" type="checkbox"
                                                            class="w-4 h-4 border-gray-100 rounded focus:ring-0 focus:outline-0 focus:ring-offset-0 dark:bg-zinc-700 dark:border-zinc-500 dark:checked:bg-violet-500">
                                                        <label for="checkbox-all" class="sr-only">checkbox</label>
                                                    </div>
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Product name
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Color
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Category
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Price
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Action
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr
                                                class="bg-white border-b border-gray-100 hover:bg-gray-50/50 dark:bg-zinc-700 dark:hover:bg-zinc-700/50 dark:border-zinc-600">
                                                <td class="w-4 p-4">
                                                    <div class="flex items-center">
                                                        <input id="checkbox-all" type="checkbox"
                                                            class="w-4 h-4 border-gray-100 rounded focus:ring-0 focus:outline-0 focus:ring-offset-0 dark:bg-zinc-700 dark:border-zinc-500 dark:checked:bg-violet-500">
                                                        <label for="checkbox-all" class="sr-only">checkbox</label>
                                                    </div>
                                                </td>
                                                <th scope="row"
                                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    Apple MacBook Pro 17"
                                                </th>
                                                <td class="px-6 py-4">
                                                    Sliver
                                                </td>
                                                <td class="px-6 py-4">
                                                    Laptop
                                                </td>
                                                <td class="px-6 py-4">
                                                    $2999
                                                </td>
                                                <td class="px-6 py-4">
                                                    <a href="#"
                                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                                </td>
                                            </tr>
                                            <tr
                                                class="bg-white border-b border-gray-100 hover:bg-gray-50/50 dark:bg-zinc-700 dark:hover:bg-zinc-700/50 dark:border-zinc-600">
                                                <td class="w-4 p-4">
                                                    <div class="flex items-center">
                                                        <input id="checkbox-all" type="checkbox"
                                                            class="w-4 h-4 border-gray-100 rounded focus:ring-0 focus:outline-0 focus:ring-offset-0 dark:bg-zinc-700 dark:border-zinc-500 dark:checked:bg-violet-500">
                                                        <label for="checkbox-all" class="sr-only">checkbox</label>
                                                    </div>
                                                </td>
                                                <th scope="row"
                                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    Microsoft Surface Pro
                                                </th>
                                                <td class="px-6 py-4">
                                                    White
                                                </td>
                                                <td class="px-6 py-4">
                                                    Laptop PC
                                                </td>
                                                <td class="px-6 py-4">
                                                    $1999
                                                </td>
                                                <td class="px-6 py-4">
                                                    <a href="#"
                                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                                </td>
                                            </tr>
                                            <tr
                                                class="bg-white border-b border-gray-100 hover:bg-gray-50/50 dark:bg-zinc-700 dark:hover:bg-zinc-700/50 dark:border-zinc-600">
                                                <td class="w-4 p-4">
                                                    <div class="flex items-center">
                                                        <input id="checkbox-all" type="checkbox"
                                                            class="w-4 h-4 border-gray-100 rounded focus:ring-0 focus:outline-0 focus:ring-offset-0 dark:bg-zinc-700 dark:border-zinc-500 dark:checked:bg-violet-500">
                                                        <label for="checkbox-all" class="sr-only">checkbox</label>
                                                    </div>
                                                </td>
                                                <th scope="row"
                                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    Magic Mouse 2
                                                </th>
                                                <td class="px-6 py-4">
                                                    Black
                                                </td>
                                                <td class="px-6 py-4">
                                                    Accessories
                                                </td>
                                                <td class="px-6 py-4">
                                                    $99
                                                </td>
                                                <td class="px-6 py-4">
                                                    <a href="#"
                                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                                </td>
                                            </tr>
                                            <tr
                                                class="bg-white border-b border-gray-100 hover:bg-gray-50/50 dark:bg-zinc-700 dark:hover:bg-zinc-700/50 dark:border-zinc-600">
                                                <td class="w-4 p-4">
                                                    <div class="flex items-center">
                                                        <input id="checkbox-all" type="checkbox"
                                                            class="w-4 h-4 border-gray-100 rounded focus:ring-0 focus:outline-0 focus:ring-offset-0 dark:bg-zinc-700 dark:border-zinc-500 dark:checked:bg-violet-500">
                                                        <label for="checkbox-all" class="sr-only">checkbox</label>
                                                    </div>
                                                </td>
                                                <th scope="row"
                                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    Apple Watch
                                                </th>
                                                <td class="px-6 py-4">
                                                    Silver
                                                </td>
                                                <td class="px-6 py-4">
                                                    Accessories
                                                </td>
                                                <td class="px-6 py-4">
                                                    $179
                                                </td>
                                                <td class="px-6 py-4">
                                                    <a href="#"
                                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                                </td>
                                            </tr>
                                            <tr
                                                class="bg-white border-b border-gray-100 hover:bg-gray-50/50 dark:bg-zinc-700 dark:hover:bg-zinc-700/50 dark:border-zinc-600">
                                                <td class="w-4 p-4">
                                                    <div class="flex items-center">
                                                        <input id="checkbox-all" type="checkbox"
                                                            class="w-4 h-4 border-gray-100 rounded focus:ring-0 focus:outline-0 focus:ring-offset-0 dark:bg-zinc-700 dark:border-zinc-500 dark:checked:bg-violet-500">
                                                        <label for="checkbox-all" class="sr-only">checkbox</label>
                                                    </div>
                                                </td>
                                                <th scope="row"
                                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    iPad
                                                </th>
                                                <td class="px-6 py-4">
                                                    Gold
                                                </td>
                                                <td class="px-6 py-4">
                                                    Tablet
                                                </td>
                                                <td class="px-6 py-4">
                                                    $699
                                                </td>
                                                <td class="px-6 py-4">
                                                    <a href="#"
                                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                                </td>
                                            </tr>
                                            <tr
                                                class="bg-white border-b border-gray-100 hover:bg-gray-50/50 dark:bg-zinc-700 dark:hover:bg-zinc-700/50 dark:border-zinc-600">
                                                <td class="w-4 p-4">
                                                    <div class="flex items-center">
                                                        <input id="checkbox-all" type="checkbox"
                                                            class="w-4 h-4 border-gray-100 rounded focus:ring-0 focus:outline-0 focus:ring-offset-0 dark:bg-zinc-700 dark:border-zinc-500 dark:checked:bg-violet-500">
                                                        <label for="checkbox-all" class="sr-only">checkbox</label>
                                                    </div>
                                                </td>
                                                <th scope="row"
                                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    Apple iMac 27"
                                                </th>
                                                <td class="px-6 py-4">
                                                    Silver
                                                </td>
                                                <td class="px-6 py-4">
                                                    PC Desktop
                                                </td>
                                                <td class="px-6 py-4">
                                                    $3999
                                                </td>
                                                <td class="px-6 py-4">
                                                    <a href="#"
                                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="grid grid-cols-12 gap-6">
                    <div class="col-span-12 xl:col-span-6">
                        <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                            <div class="card-body border-b border-gray-100 dark:border-zinc-600">
                                <h6 class="mb-1 text-gray-700 text-15 dark:text-gray-100">Table with users</h6>
                            </div>
                            <div class="card-body">
                                <div class="relative overflow-x-auto">
                                    <div class="pb-4 bg-white dark:bg-transparent">
                                        <label for="table-search" class="sr-only">Search</label>
                                        <div class="relative">
                                            <div
                                                class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                <i class="pt-1 text-lg text-gray-400 mdi mdi-magnify"></i>
                                            </div>
                                            <input type="text" id="table-search-users"
                                                class="block p-2 pl-10 text-sm text-gray-900 border rounded border-gray-50 w-80 bg-gray-50/20 focus:ring-0 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder:text-zinc-100/60 dark:text-zinc-100"
                                                placeholder="Search for users">
                                        </div>
                                    </div>
                                    <table class="w-full text-sm text-left text-gray-500">
                                        <thead
                                            class="text-xs text-gray-700 uppercase dark:text-gray-100 bg-gray-50/50 dark:bg-zinc-700">
                                            <tr>
                                                <th scope="col" class="p-4">
                                                    <div class="flex items-center">
                                                        <input id="checkbox-all" type="checkbox"
                                                            class="w-4 h-4 border-gray-100 rounded focus:ring-0 focus:outline-0 focus:ring-offset-0 dark:bg-zinc-700 dark:border-zinc-500 dark:checked:bg-violet-500">
                                                        <label for="checkbox-all-search" class="sr-only">checkbox</label>
                                                    </div>
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Name
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Position
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Status
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Action
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr
                                                class="bg-white border-b border-gray-50 hover:bg-gray-50/50 dark:bg-zinc-700/50 dark:border-zinc-600">
                                                <td class="w-4 p-4">
                                                    <div class="flex items-center">
                                                        <input id="checkbox-all" type="checkbox"
                                                            class="w-4 h-4 border-gray-100 rounded focus:ring-0 focus:outline-0 focus:ring-offset-0 dark:bg-zinc-700 dark:border-zinc-500 dark:checked:bg-violet-500">
                                                        <label for="checkbox-table-search-1"
                                                            class="sr-only">checkbox</label>
                                                    </div>
                                                </td>
                                                <th scope="row"
                                                    class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap">
                                                    <img class="w-10 h-10 rounded-full"
                                                        src="{{ URL::asset('build/images/users/avatar-1.jpg') }}" alt="Jese image">
                                                    <div class="ltr:pl-3 rtl:pr-3 ltr:text-left rtl:text-right">
                                                        <div class="text-base font-semibold dark:text-gray-100">Mark</div>
                                                        <div class="font-normal text-gray-500 dark:text-zinc-100/80">
                                                            mark@snowball.com</div>
                                                    </div>
                                                </th>
                                                <td class="px-6 py-4 dark:text-zinc-100/80">
                                                    React Developer
                                                </td>
                                                <td class="px-6 py-4">
                                                    <div class="flex items-center dark:text-zinc-100/80">
                                                        <div
                                                            class="h-2.5 w-2.5 rounded-full bg-green-500 ltr:mr-2 rtl:ml-2">
                                                        </div> Online
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4">
                                                    <a href="#"
                                                        class="font-medium text-blue-600 hover:underline">Edit user</a>
                                                </td>
                                            </tr>
                                            <tr
                                                class="bg-white border-b border-gray-50 hover:bg-gray-50/50 dark:bg-zinc-700/50 dark:border-zinc-600">
                                                <td class="w-4 p-4">
                                                    <div class="flex items-center">
                                                        <input id="checkbox-all" type="checkbox"
                                                            class="w-4 h-4 border-gray-100 rounded focus:ring-0 focus:outline-0 focus:ring-offset-0 dark:bg-zinc-700 dark:border-zinc-500 dark:checked:bg-violet-500">
                                                        <label for="checkbox-table-search-2"
                                                            class="sr-only">checkbox</label>
                                                    </div>
                                                </td>
                                                <th scope="row"
                                                    class="flex items-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                                    <img class="w-10 h-10 rounded-full"
                                                        src="{{ URL::asset('build/images/users/avatar-3.jpg') }}" alt="Jese image">
                                                    <div class="ltr:pl-3 rtl:pr-3 ltr:text-left rtl:text-right">
                                                        <div class="text-base font-semibold dark:text-gray-100">Jacob Greek
                                                        </div>
                                                        <div class="font-normal text-gray-500 dark:text-zinc-100/80">
                                                            jacob@Greek.com</div>
                                                    </div>
                                                </th>
                                                <td class="px-6 py-4 dark:text-zinc-100/80">
                                                    Designer
                                                </td>
                                                <td class="px-6 py-4">
                                                    <div class="flex items-center dark:text-zinc-100/80">
                                                        <div
                                                            class="h-2.5 w-2.5 rounded-full bg-green-500 ltr:mr-2 rtl:ml-2">
                                                        </div> Online
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4">
                                                    <a href="#"
                                                        class="font-medium text-blue-600 hover:underline">Edit user</a>
                                                </td>
                                            </tr>
                                            <tr
                                                class="bg-white border-b border-gray-50 hover:bg-gray-50/50 dark:bg-zinc-700/50 dark:border-zinc-600">
                                                <td class="w-4 p-4">
                                                    <div class="flex items-center">
                                                        <input id="checkbox-all" type="checkbox"
                                                            class="w-4 h-4 border-gray-100 rounded focus:ring-0 focus:outline-0 focus:ring-offset-0 dark:bg-zinc-700 dark:border-zinc-500 dark:checked:bg-violet-500">
                                                        <label for="checkbox-table-search-2"
                                                            class="sr-only">checkbox</label>
                                                    </div>
                                                </td>
                                                <th scope="row"
                                                    class="flex items-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                                    <img class="w-10 h-10 rounded-full"
                                                        src="{{ URL::asset('build/images/users/avatar-5.jpg') }}" alt="Jese image">
                                                    <div class="ltr:pl-3 rtl:pr-3 ltr:text-left rtl:text-right">
                                                        <div class="text-base font-semibold dark:text-gray-100">Larry Leos
                                                        </div>
                                                        <div class="font-normal text-gray-500 dark:text-zinc-100/80">
                                                            thebird@larry.com</div>
                                                    </div>
                                                </th>
                                                <td class="px-6 py-4 dark:text-zinc-100/80">
                                                    Vue JS Developer
                                                </td>
                                                <td class="px-6 py-4">
                                                    <div class="flex items-center dark:text-zinc-100/80">
                                                        <div
                                                            class="h-2.5 w-2.5 rounded-full bg-green-500 ltr:mr-2 rtl:ml-2">
                                                        </div> Online
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4">
                                                    <a href="#"
                                                        class="font-medium text-blue-600 hover:underline">Edit user</a>
                                                </td>
                                            </tr>
                                            <tr
                                                class="bg-white border-b border-gray-50 hover:bg-gray-50/50 dark:bg-zinc-700/50 dark:border-zinc-600">
                                                <td class="w-4 p-4">
                                                    <div class="flex items-center">
                                                        <input id="checkbox-all" type="checkbox"
                                                            class="w-4 h-4 border-gray-100 rounded focus:ring-0 focus:outline-0 focus:ring-offset-0 dark:bg-zinc-700 dark:border-zinc-500 dark:checked:bg-violet-500">
                                                        <label for="checkbox-table-search-2"
                                                            class="sr-only">checkbox</label>
                                                    </div>
                                                </td>
                                                <th scope="row"
                                                    class="flex items-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                                    <img class="w-10 h-10 rounded-full"
                                                        src="{{ URL::asset('build/images/users/avatar-7.jpg') }}" alt="Jese image">
                                                    <div class="ltr:pl-3 rtl:pr-3 ltr:text-left rtl:text-right">
                                                        <div class="text-base font-semibold dark:text-gray-100">Lambly Den
                                                        </div>
                                                        <div class="font-normal text-gray-500 dark:text-zinc-100/80">
                                                            den@flowbite.com</div>
                                                    </div>
                                                </th>
                                                <td class="px-6 py-4 dark:text-zinc-100/80">
                                                    UI/UX Engineer
                                                </td>
                                                <td class="px-6 py-4">
                                                    <div class="flex items-center dark:text-zinc-100/80">
                                                        <div
                                                            class="h-2.5 w-2.5 rounded-full bg-green-500 ltr:mr-2 rtl:ml-2">
                                                        </div> Online
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4">
                                                    <a href="#"
                                                        class="font-medium text-blue-600 hover:underline">Edit user</a>
                                                </td>
                                            </tr>
                                            <tr class="bg-white hover:bg-gray-50/50 dark:bg-zinc-700/50">
                                                <td class="w-4 p-4">
                                                    <div class="flex items-center">
                                                        <input id="checkbox-all" type="checkbox"
                                                            class="w-4 h-4 border-gray-100 rounded focus:ring-0 focus:outline-0 focus:ring-offset-0 dark:bg-zinc-700 dark:border-zinc-500 dark:checked:bg-violet-500">
                                                        <label for="checkbox-table-search-3"
                                                            class="sr-only">checkbox</label>
                                                    </div>
                                                </td>
                                                <th scope="row"
                                                    class="flex items-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                                    <img class="w-10 h-10 rounded-full"
                                                        src="{{ URL::asset('build/images/users/avatar-8.jpg') }}" alt="Jese image">
                                                    <div class="ltr:pl-3 rtl:pr-3 ltr:text-left rtl:text-right">
                                                        <div class="text-base font-semibold dark:text-gray-100">Lucy
                                                            Marinda</div>
                                                        <div class="font-normal text-gray-500 dark:text-zinc-100/80">
                                                            lucy12@marinda.com</div>
                                                    </div>
                                                </th>
                                                <td class="px-6 py-4 dark:text-zinc-100/80">
                                                    SEO Specialist
                                                </td>
                                                <td class="px-6 py-4">
                                                    <div class="flex items-center dark:text-zinc-100/80">
                                                        <div class="h-2.5 w-2.5 rounded-full bg-red-500 ltr:mr-2 rtl:ml-2">
                                                        </div> Offline
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4">
                                                    <a href="#"
                                                        class="font-medium text-blue-600 hover:underline">Edit user</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-span-12 xl:col-span-6">
                        <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                            <div class="card-body border-b border-gray-100 dark:border-zinc-600">
                                <h6 class="mb-1 text-gray-700 text-15 dark:text-gray-100">Action selection</h6>
                            </div>
                            <div class="card-body">
                                <div class="relative overflow-x-auto sm:rounded-lg">
                                    <table class="w-full text-sm text-left text-gray-500">
                                        <thead
                                            class="text-xs text-gray-700 uppercase dark:text-gray-100 bg-gray-50/50 dark:bg-zinc-700">
                                            <tr>
                                                <th scope="col" class="px-6 py-3">
                                                    <span class="sr-only">Image</span>
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Product
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Qty
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Price
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Action
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr
                                                class="bg-white border-b border-gray-50 hover:bg-gray-50/50/20 dark:bg-zinc-700/50 dark:border-zinc-600">
                                                <td class="w-32 p-4">
                                                    <img src="{{ URL::asset('build/images/products/02.png') }}" alt="Mochi shoes">
                                                </td>
                                                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-gray-100">
                                                    Mochi shoes
                                                </td>
                                                <td class="px-6 py-4">
                                                    <div class="flex items-center space-x-3">
                                                        <button
                                                            class="inline-flex items-center text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-full rtl:ml-3 focus:outline-none hover:bg-gray-50/50 focus:ring-4 focus:ring-gray-50 dark:bg-zinc-700 dark:focus:ring-gray-500/20 dark:border-zinc-500 dark:text-gray-100"
                                                            type="button">
                                                            <span class="sr-only">Quantity button</span>
                                                            <i
                                                                class="mdi mdi-minus px-0.5 py-0.5 text-lg leading-none"></i>
                                                        </button>
                                                        <div>
                                                            <input type="number" id="first_product"
                                                                class="bg-gray-50/20 w-14 border border-gray-100 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block px-2.5 py-1 dark:bg-zinc-700 dark:border-zinc-600 dark:text-zinc-100"
                                                                placeholder="1" required>
                                                        </div>
                                                        <button
                                                            class="inline-flex items-center text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-full focus:outline-none hover:bg-gray-50/50 focus:ring-4 focus:ring-gray-50 dark:bg-zinc-700 dark:focus:ring-gray-500/20 dark:border-zinc-500 dark:text-gray-100"
                                                            type="button">
                                                            <span class="sr-only">Quantity button</span>
                                                            <i class="mdi mdi-plus px-0.5 py-0.5 text-lg leading-none"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-gray-100">
                                                    $599
                                                </td>
                                                <td class="px-6 py-4">
                                                    <a href="#"
                                                        class="font-medium text-red-600 hover:underline">Remove</a>
                                                </td>
                                            </tr>
                                            <tr
                                                class="bg-white border-b border-gray-50 hover:bg-gray-50/50/20 dark:bg-zinc-700/50 dark:border-zinc-600">
                                                <td class="w-32 p-4">
                                                    <img src="{{ URL::asset('build/images/products/04.png') }}" alt="Mask">
                                                </td>
                                                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-gray-100">
                                                    Mask
                                                </td>
                                                <td class="px-6 py-4">
                                                    <div class="flex items-center space-x-3">
                                                        <button
                                                            class="inline-flex items-center text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-full rtl:ml-3 focus:outline-none hover:bg-gray-50/50 focus:ring-4 focus:ring-gray-50 dark:bg-zinc-700 dark:focus:ring-gray-500/20 dark:border-zinc-500 dark:text-gray-100"
                                                            type="button">
                                                            <span class="sr-only">Quantity button</span>
                                                            <i
                                                                class="mdi mdi-minus px-0.5 py-0.5 text-lg leading-none"></i>
                                                        </button>
                                                        <div>
                                                            <input type="number" id="second_product"
                                                                class="bg-gray-50/20 w-14 border border-gray-100 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block px-2.5 py-1 dark:bg-zinc-700 dark:border-zinc-600 dark:text-zinc-100"
                                                                placeholder="1" required>
                                                        </div>
                                                        <button
                                                            class="inline-flex items-center text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-full focus:outline-none hover:bg-gray-50/50 focus:ring-4 focus:ring-gray-50 dark:bg-zinc-700 dark:focus:ring-gray-500/20 dark:border-zinc-500 dark:text-gray-100"
                                                            type="button">
                                                            <span class="sr-only">Quantity button</span>
                                                            <i class="mdi mdi-plus px-0.5 py-0.5 text-lg leading-none"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-gray-100">
                                                    $2499
                                                </td>
                                                <td class="px-6 py-4">
                                                    <a href="#"
                                                        class="font-medium text-red-600 hover:underline">Remove</a>
                                                </td>
                                            </tr>
                                            <tr
                                                class="bg-white border-b border-gray-50 hover:bg-gray-50/50/20 dark:bg-zinc-700/50 dark:border-zinc-600">
                                                <td class="w-32 p-4">
                                                    <img src="{{ URL::asset('build/images/products/05.png') }}" alt="Bag">
                                                </td>
                                                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-gray-100">
                                                    Bag
                                                </td>
                                                <td class="px-6 py-4">
                                                    <div class="flex items-center space-x-3">
                                                        <button
                                                            class="inline-flex items-center text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-full rtl:ml-3 focus:outline-none hover:bg-gray-50/50 focus:ring-4 focus:ring-gray-50 dark:bg-zinc-700 dark:focus:ring-gray-500/20 dark:border-zinc-500 dark:text-gray-100"
                                                            type="button">
                                                            <span class="sr-only">Quantity button</span>
                                                            <i
                                                                class="mdi mdi-minus px-0.5 py-0.5 text-lg leading-none"></i>
                                                        </button>
                                                        <div>
                                                            <input type="number" id="third_product"
                                                                class="bg-gray-50/20 w-14 border border-gray-100 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block px-2.5 py-1 dark:bg-zinc-700 dark:border-zinc-600 dark:text-zinc-100"
                                                                placeholder="1" required>
                                                        </div>
                                                        <button
                                                            class="inline-flex items-center text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-full focus:outline-none hover:bg-gray-50/50 focus:ring-4 focus:ring-gray-50 dark:bg-zinc-700 dark:focus:ring-gray-500/20 dark:border-zinc-500 dark:text-gray-100"
                                                            type="button">
                                                            <span class="sr-only">Quantity button</span>
                                                            <i class="mdi mdi-plus px-0.5 py-0.5 text-lg leading-none"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-gray-100">
                                                    $999
                                                </td>
                                                <td class="px-6 py-4">
                                                    <a href="#"
                                                        class="font-medium text-red-600 hover:underline">Remove</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
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
