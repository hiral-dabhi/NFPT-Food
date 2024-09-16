@extends('layouts.master')
@section('title', 'License')

@section('content')
<div class="main-content group-data-[sidebar-size=sm]:ml-[70px]">
    <div class="page-content dark:bg-zinc-700">
        <div class="container-fluid px-[0.625rem]">

            <!-- page title -->
            <x-page-title title="License Details" pagetitle="License" />

            <div class="grid grid-cols-1">
                <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                    <div class="col-span-12 xl:col-span-6">
                        <div class="card-body">
                            <div class="w-1/2 mx-px">
                                <div class="relative overflow-x-auto">
                                    <table class="w-full text-sm text-left text-gray-500 ">
                                        <thead class="text-sm text-gray-700 dark:text-gray-100">
                                            <tr>
                                                <th scope="col" class="px-6 py-3.5">
                                                    ExpireOn
                                                </th>
                                                <th scope="col" class="px-6 py-3.5">
                                                    Unlimited
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="bg-gray-50/60 dark:bg-zinc-600/50">
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    DaysToExpire
                                                </td>
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    Unlimited
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    Con.User Limit
                                                </td>
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    1000000000
                                                </td>
                                            </tr>
                                            <tr class="bg-gray-50/60 dark:bg-zinc-600/50">
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    NAS Limit
                                                </td>
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    1000000000
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    Support PIN
                                                </td>
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    FN35HW9Z
                                                </td>
                                            </tr>
                                            <tr class="bg-gray-50/60 dark:bg-zinc-600/50">
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    Support ExpireOn
                                                </td>
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    2020-08-28
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    MAC Address
                                                </td>
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    74:56:3c:30:28:3d
                                                </td>
                                            </tr>

                                            <tr class="bg-gray-50/60 dark:bg-zinc-600/50">
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    IP Address
                                                </td>
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    103.137.19.46
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    Status
                                                </td>
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    Active
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
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
<script type="text/javascript" src="{{ asset('js/libs/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('js/backend/ipv6.js') }}"></script>
<script>
    $(function() {
        ipv6.create();
    });
</script>
@endsection