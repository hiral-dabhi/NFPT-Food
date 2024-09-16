@extends('layouts.master')
@section('title')
    {{ __('Edit Lease') }}
@endsection
@section('css')
    <!-- alertifyjs Css -->
    <link href="{{ URL::asset('build/libs/alertifyjs/build/css/alertify.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- alertifyjs default themes  Css -->
    <link href="{{ URL::asset('build/libs/alertifyjs/build/css/themes/default.min.css') }}" rel="stylesheet" type="text/css" />
    <style>
        .select2-results__option {
            padding-right: 20px;
            vertical-align: middle;
        }

        .disabled {
            background-color: #d7d7d7 !important;
            /* Change this color to match your desired gray */
            color: #666;
            /* Change this color to match your desired text color */
            cursor: not-allowed;
            /* Optional: Change cursor to indicate that the input is disabled */
        }
    </style>
@endsection
@section('content')
    <div class="main-content group-data-[sidebar-size=sm]:ml-[70px]">
        <div class="page-content dark:bg-zinc-700">
            <div class="container-fluid px-[0.625rem]">

                <!-- page title -->
                <x-page-title title="Edit Lease" pagetitle="Lease" />

                <div class="grid grid-cols-1">
                    <div class="flex flex-wrap card-body">
                        <div class="nav-tabs border-b-tabs">
                            <ul
                                class="flex flex-wrap w-full text-sm font-medium text-center text-gray-500 border-b border-gray-100 nav dark:border-gray-700 dark:text-gray-400">
                                <li>
                                    <a href="{{ route('lease.edit', $user->id) }}"
                                        class="inline-block p-4 active">General</a>
                                </li>
                                <li>
                                    <a href="{{ route('lease.services', $user->id) }}" class="inline-block p-4">Services</a>
                                </li>
                                <li>
                                    <a href="{{ route('lease.settings', $user->id) }}" class="inline-block p-4">Settings</a>
                                </li>
                                <li>
                                    <a href="{{ route('lease.document', $user->id) }}"
                                        class="inline-block p-4">Documents</a>
                                </li>
                                <li>
                                    <a href="#" class="inline-block p-4">Statistics</a>
                                </li>


                            </ul>
                        </div>
                    </div>
                    <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                        <div class="card-body">
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-3" style="border: 1px solid #4299e1;">
                            <table class="w-full text-sm text-left rtl:text-right">
                                <tbody style="font-size:12px;">
                                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                        <th scope="row" class="px-6 py-1 border font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            <p> <span class="font-bold">Account Type:</span> Regular </p>
                                        </th>
                                        <td class="px-6 py-1 border">
                                            <p>
                                                <span class="font-bold">Account Status:</span>
                                                @if ($user->status == 1)
                                                <span class="inline-block px-2 py-1 bg-green-500 text-white text-xs font-semibold rounded-full">Active</span>
                                                @else
                                                <span class="inline-block px-2 py-1 bg-red-500 text-white text-xs font-semibold rounded-full">Inactive</span>
                                                @endif
                                            </p>
                                        </td>
                                        <td class="px-6 py-1 border">
                                            <p> <span class="font-bold">Conn. status:</span> </p>
                                        </td>
                                        <td class="px-6 py-1 border">
                                            <p> <span class="font-bold">Last Logoff:</span> </p>
                                        </td>
                                    </tr>
                                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                        <th scope="row" class="px-6 py-1 border font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            <p> <span class="font-bold">Rate (UP/DOWN):</span>
                                                {{ isset($userHasServices) && $userHasServices->up_rate ? $userHasServices->up_rate . ' Kbps' : '' }}
                                                /
                                                {{ isset($userHasServices) && $userHasServices->down_rate ? $userHasServices->down_rate . ' Kbps' : '' }}
                                            </p>
                                        </th>
                                        <td class="px-6 py-1 border">
                                            <p>
                                                <span class="font-bold">DataLimit:</span>
                                                {{ $userHasServices->data_limiter ?? 0
                                                        ? $userHasServices->data_limiter .
                                                            ' ' .
                                                            ($userHasServices->data_limiter_misc_id ? getMiscTitle($userHasServices->data_limiter_misc_id) : '')
                                                        : '0' }}
                                            </p>
                                        </td>
                                        <td class="px-6 py-1 border">
                                            <p>
                                                <span class="font-bold">UptimeLimit:</span>
                                                {{ $userHasServices->uptime_limiter ?? 0
                                                        ? $userHasServices->uptime_limiter . ' ' . getMiscTitle($userHasServices->uptime_limiter_misc_id ?? '')
                                                        : '0' }}
                                            </p>
                                        </td>
                                        <td class="px-6 py-1 border">
                                            <p> <span class="font-bold">ExpiryDate:</span>
                                                {{ $user->userDetail->expiration_date ?? '' }}
                                            </p>
                                        </td>
                                    </tr>
                                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                        <th scope="row" class="px-6 py-1 border font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            <p> <span class="font-bold">Last CreditDate:</span>
                                                {{ $lastCredit ? $lastCredit->created_at->format('Y-m-d H:i:s') : '' }}
                                            </p>
                                        </th>
                                        <td class="px-6 py-1 border">
                                            <p> <span class="font-bold">Last CreditBy:</span>
                                                {{ $lastCredit ? ($lastCredit->createdBy ? $lastCredit->createdBy->name : '') : '' }}
                                            </p>
                                        </td>
                                        <td class="px-6 py-1 border">
                                            <p> <span class="font-bold">Registered on:</span>
                                                {{ $user->created_at ?? '---' }}
                                            </p>
                                        </td>
                                        <td class="px-6 py-1 border">
                                            <p> <span class="font-bold">Registered By:</span>
                                                {{ $user->hasSingleOperator->name ?? '---' }}
                                            </p>
                                        </td>
                                    </tr>
                                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                        <th scope="row" class="px-6 py-1 border font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            <p> <span class="font-bold">Billing Type:</span>
                                                {{ isset($user->billing_type) && $user->billing_type == 0 ? 'Prepaid' : 'PostPaid' }}
                                            </p>
                                        </th>
                                        <td class="px-6 py-1 border">
                                            <p> <span class="font-bold">Wallet Balance:</span> {!! isset($user->userDeposit) ?  '<i class="bx bx-rupee"></i>'.$user->userDeposit->sum('amount') : '' !!} </p>
                                        </td>
                                        <td class="px-6 py-1 border">
                                            <p> <span class="font-bold">Total Paid Amount:</span>{!!isset($user->invoiceList) ? '<i class="bx bx-rupee"></i>'.$user->invoiceList->sum('paid_amount') : ''!!}</p>
                                        </td>
                                        <td class="px-6 py-1 border">
                                            <p> <span class="font-bold">Total Unpaid Amount:</span>{!!isset($user->invoiceList) ? '<i class="bx bx-rupee"></i>'.$user->invoiceList->sum('unpaid_amount') : ''!!}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                    <th scope="row" class="px-6 py-1 border font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            <p> <span class="font-bold">IPv4 Address:</span> {{$user->userDetail->ipv4StaticAddress->addresses ?? 'N/A'}}</p>
                                        </th>
                                        <td class="px-6 py-1 border">
                                            <p> <span class="font-bold">IPv6 Prefix:</span> {{$user->userDetail->userIpv6Prefix->title ?? 'N/A'}} </p>
                                        </td>
                                        <td class="px-6 py-1 border">
                                            <p> <span class="font-bold">IPv6 Delegation: </span>{{$user->userDetail->userIpv6Delegation->pool_name ?? 'N/A'}} </p>
                                        </td>
                                        <td class="px-6 py-1 border">
                                            <p>
                                                <span class="font-bold">Allowed NAS:</span>
                                                @if (!empty($userHasNas))
                                                @php
                                                $nasString = '';
                                                $counter = 0;
                                                foreach ($userHasNas as $index => $nas) {
                                                $counter++;
                                                $nasString .= $counter . ') ' . $nas . ' ';
                                                if ($counter % 3 == 0) {
                                                $nasString .= '<br>';
                                                }
                                                }
                                                @endphp
                                            <p>{!! $nasString !!}</p>
                                            @else
                                            No allowed NAS
                                            @endif
                                            </p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                            <form method="POST" action="{{ route('lease.update', $user->id) }}" class="lease-edit-form"
                                id="lease_form_edit" enctype="multipart/form-data">
                                @csrf
                                <div class="grid grid-cols-12 gap-x-6">
                                    <div class="col-span-12 lg:col-span-6">
                                        <div class="mb-4">
                                            <label for="name"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Full
                                                Name<span class="text-sm text-red-600">*</span></label>
                                            <input type="text" name="name" id="name"
                                                placeholder="Enter full name"
                                                class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                value="{{ old('name', $user->name ?? '') }}">
                                            @error('name')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label for="company_name"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Company
                                                Name</label>
                                            <input type="text" name="company_name" id="company_name"
                                                placeholder="Enter company name"
                                                class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                value="{{ old('company_name', $user->userDetail->company_name ?? '') }}"
                                                autocomplete="off">
                                            @error('company_name')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label for="address"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Address</label>
                                            <textarea type="text" name="address" id="address" placeholder="Enter address"
                                                class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100">{{ old('address', $user->address ?? '') }}</textarea>
                                            @error('address')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label for="city"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100">City</label>
                                            <input type="text" name="city" id="city" placeholder="Enter city"
                                                class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                value="{{ old('city', $user->city ?? '') }}">
                                            @error('city')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label for="zip"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Zip</label>
                                            <input type="text" name="zip" id="zip" placeholder="Enter zip"
                                                class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                value="{{ old('zip', $user->userDetail->zip_code ?? '') }}">
                                            @error('zip')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label for="state"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100">State</label>
                                            <input type="text" name="state" id="state" placeholder="Enter state"
                                                class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                value="{{ old('state', $user->userDetail->state ?? '') }}">
                                            @error('state')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label for="country"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Country</label>
                                            <input type="text" name="country" id="country"
                                                placeholder="Enter country"
                                                class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                value="{{ old('country', $user->userDetail->country ?? '') }}">
                                            @error('country')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label for="phone_no"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Phone
                                                no</label>
                                            <input type="number" name="phone_no" id="phone_no"
                                                placeholder="Enter phone no"
                                                class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                value="{{ old('phone_no', $user->contact ?? '') }}">
                                            @error('phone_no')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label for="mobile_no"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Mobile
                                                no<span class="text-sm text-red-600">*</span></label>
                                            <input type="text" name="mobile_no" id="mobile_no"
                                                placeholder="Enter mobile no"
                                                class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                value="{{ old('mobile_no', $user->userDetail->mobile_no ?? '') }}">
                                            @error('mobile_no')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label for="email"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Email<span
                                                    class="text-sm text-red-600">*</span></label>
                                            <input type="email" name="email" id="email"
                                                placeholder="Enter email"
                                                class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                value="{{ old('email', $user->email ?? '') }}">
                                            @error('email')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label for="gst_no"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100">GST
                                                no</label>
                                            <input type="text" name="gst_no" id="gst_no"
                                                placeholder="Enter GST no"
                                                class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                value="{{ old('gst_no', $user->userDetail->gst_no ?? '') }}">
                                            @error('gst_no')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-span-12 lg:col-span-6">

                                        <div class="mb-4">
                                            <label class="block mb-2 font-medium text-gray-700 dark:text-gray-100">ID
                                            </label>
                                            <span
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100"><b>{{ $user->id ?? '' }}</b></span>
                                        </div>
                                        <div class="mb-4">
                                            <label class="block mb-2 font-medium text-gray-700 dark:text-gray-100">IPv4
                                                Pool
                                            </label>
                                            <span
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100"><b>{{ $user->userDetail->ipv4StaticPool->pool_name ?? '' }}</b></span>
                                        </div>
                                        <div class="mb-4">
                                            <label class="block mb-2 font-medium text-gray-700 dark:text-gray-100">IPv4 IP
                                                Address
                                            </label>
                                            <span
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100"><b>{{ !empty($user->userDetail->ipv4StaticAddress->ipv4_id) &&$user->userDetail->ipv4_static_pool == $user->userDetail->ipv4StaticAddress->ipv4_id ? $user->userDetail->ipv4StaticAddress->addresses ?? '-' : '-' }}</b></span>
                                        </div>

                                        <div class="mb-4">
                                            <label class="block mb-2 font-medium text-gray-700 dark:text-gray-100">UserName
                                            </label>
                                            <span
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100"><b>{{ $user->username ?? '' }}</b></span>
                                        </div>
                                        <div class="mb-4">
                                            <label for="password"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Password</label>
                                            <input type="password" name="password" id="password"
                                                placeholder="Enter password" disabled
                                                class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100  disabled">
                                            @error('password')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                            <label class="font-medium text-gray-700 ltr:mr-2 rtl:ml-2 dark:text-zinc-100"
                                                for="formrow-customCheck">Do you want to change the password?</label>
                                            <input type="checkbox"
                                                class="align-middle rounded focus:ring-0 focus:ring-offset-0 dark:bg-zinc-700 dark:border-zinc-400 checked:bg-violet-500 dark:checked:bg-violet-500 ckb-password"
                                                name="is_password" value="0">
                                        </div>
                                        <div class="mb-4">
                                            <label class="block mb-2 font-medium text-gray-700 dark:text-gray-100">MAC
                                                Address
                                            </label>
                                            <span
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100"><b>{{ $user->userDetail->mac_address ?? '' }}</b></span>
                                        </div>

                                        <div class="mb-4">
                                            <label class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Portal
                                                login</label>
                                            <span
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100"><b>{{ $user->userDetail->portal_login ?? '' }}</b></span>
                                        </div>

                                        <div class="mb-4">
                                            <label for="portal_password"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Portal
                                                password</label>
                                            <input type="password" name="portal_password" id="portal_password"
                                                placeholder="Enter portal password" disabled
                                                class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100  disabled">
                                            @error('portal_password')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                            <label class="font-medium text-gray-700 ltr:mr-2 rtl:ml-2 dark:text-zinc-100"
                                                for="formrow-customCheck">Do you want to change the portal
                                                password?</label>
                                            <input type="checkbox"
                                                class="align-middle rounded focus:ring-0 focus:ring-offset-0 dark:bg-zinc-700 dark:border-zinc-400 checked:bg-violet-500 dark:checked:bg-violet-500 ckb-portal-password"
                                                name="is_portal_password" value="0">
                                        </div>
                                        <div class="mb-4">
                                            <label for="operator"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Operator<span
                                                    class="text-sm text-red-600">*</span></label>
                                            <select name="operator" id="operator"
                                                class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                value="{{ old('operator') }}">
                                                <option value="">Select operator</option>
                                                @foreach ($operators as $key => $value)
                                                    <option value="{{ $value->id }}"
                                                        {{ $value->id === $user->operator_id ? 'selected' : '' }}>
                                                        {{ $value->username }}</option>
                                                @endforeach
                                            </select>
                                            @error('operator')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label for="user_group"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100">User
                                                Group<span class="text-sm text-red-600">*</span></label>
                                            <select name="user_group" id="user_group"
                                                class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                value="{{ old('user_group') }}">
                                                <option value="">Select type</option>
                                                @foreach (config('enum.user_group') as $key => $value)
                                                    <option value="{{ $key }}"
                                                        {{ $value == 'Default' ? 'selected' : '' }}>{{ $value }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('user_group')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label for="comment"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Comment</label>
                                            <textarea type="text" name="comment" id="comment" placeholder="Enter comment"
                                                class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100">{{ old('comment', $user->userDetail->comment ?? '') }}</textarea>
                                            @error('comment')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="mb-4">
                                            <label for="status"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Status<span
                                                    class="text-sm text-red-600">*</span></label>
                                            <div class="mt-1 flex items-center">
                                                <div class="flex items-center" style="margin-right: 10px">
                                                    <input type="radio" id="status1" name="status" value="1"
                                                        {{ old('status', $user->status) === '1' ? 'checked' : '' }}
                                                        class="form-radio h-4 w-4 text-indigo-600 transition duration-150 ease-in-out">
                                                    <label for="status1"
                                                        class="ml-2 block text-sm leading-5 text-gray-700">Active</label>
                                                </div>

                                                <div class="flex items-center">
                                                    <input type="radio" id="status2" name="status" value="0"
                                                        {{ old('status', $user->status) === '0' ? 'checked' : '' }}
                                                        class="form-radio h-4 w-4 text-indigo-600 transition duration-150 ease-in-out">
                                                    <label for="status2"
                                                        class="ml-2 block text-sm leading-5 text-gray-700">Inactive</label>
                                                </div>
                                            </div>
                                            @error('status')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3 col-span-6 sm:col-span-4 flex items-center justify-center">
                                    <button type="submit"
                                        class="mr-1 font-medium text-white border-transparent btn bg-violet-500 w-28 hover:bg-violet-700 focus:bg-violet-700 focus:ring focus:ring-violet-50">Submit</button>
                                    <a class="font-medium text-white border-transparent btn bg-red-500 w-28 hover:bg-red-700 focus:bg-red-700 focus:ring focus:ring-red-50"
                                        href="{{ route('lease.index') }}">
                                        Back
                                    </a>
                                </div>
                            </form>
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
    <script src="{{ URL::asset('build/libs/alertifyjs/build/alertify.min.js') }}"></script>
    <script src="{{ asset('js/backend/lease.js') }}"></script>
    <script>
        $(function() {
            lease.edit();
        });
    </script>
@endsection
