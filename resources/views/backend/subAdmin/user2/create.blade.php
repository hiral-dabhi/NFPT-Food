@extends('layouts.master')
@section('title')
    {{ __('Create User') }}
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
                <x-page-title title="Create user" pagetitle="User" />

                <div class="grid grid-cols-1 mt-3">
                    <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                        <div class="card-body">
                            <form method="POST" action="{{ route('user.store') }}" class="user-create-form"
                                enctype="multipart/form-data">
                                @csrf
                                {{-- <label class="block text-sm font-medium text-red-700">General Information</label> --}}
                                <div class="grid grid-cols-12 gap-x-6">
                                    <div class="col-span-12 lg:col-span-6">
                                        <div class="mb-4">
                                            <label for="name"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Full
                                                Name<span class="text-sm text-red-600">*</span></label>
                                            <input type="text" name="name" id="name"
                                                placeholder="Enter full name"
                                                class="w-full rounded placeholder:text-sm py-2 border-gray-100 dark:bg-zinc-700/50 dark:border-zinc-600 dark:text-gray-100 dark:placeholder:text-zinc-100/60"
                                                value="{{ old('name') }}">
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
                                                class="w-full rounded placeholder:text-sm py-2 border-gray-100 dark:bg-zinc-700/50 dark:border-zinc-600 dark:text-gray-100 dark:placeholder:text-zinc-100/60"
                                                value="{{ old('company_name') }}" autocomplete="off">
                                            @error('company_name')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label for="address"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Address</label>
                                            <textarea type="text" name="address" id="address" placeholder="Enter address"
                                                class="w-full rounded placeholder:text-sm py-2 border-gray-100 dark:bg-zinc-700/50 dark:border-zinc-600 dark:text-gray-100 dark:placeholder:text-zinc-100/60">{{ old('address') }}</textarea>
                                            @error('address')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label for="city"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100">City</label>
                                            <input type="text" name="city" id="city" placeholder="Enter city"
                                                class="w-full rounded placeholder:text-sm py-2 border-gray-100 dark:bg-zinc-700/50 dark:border-zinc-600 dark:text-gray-100 dark:placeholder:text-zinc-100/60"
                                                value="{{ old('city') }}">
                                            @error('city')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label for="zip"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Zip</label>
                                            <input type="text" name="zip" id="zip" placeholder="Enter zip"
                                                class="w-full rounded placeholder:text-sm py-2 border-gray-100 dark:bg-zinc-700/50 dark:border-zinc-600 dark:text-gray-100 dark:placeholder:text-zinc-100/60"
                                                value="{{ old('zip') }}">
                                            @error('zip')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label for="state"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100">State</label>
                                            <input type="text" name="state" id="state" placeholder="Enter state"
                                                class="w-full rounded placeholder:text-sm py-2 border-gray-100 dark:bg-zinc-700/50 dark:border-zinc-600 dark:text-gray-100 dark:placeholder:text-zinc-100/60"
                                                value="{{ old('state') }}">
                                            @error('state')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label for="country"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Country</label>
                                            <input type="text" name="country" id="country" placeholder="Enter country"
                                                class="w-full rounded placeholder:text-sm py-2 border-gray-100 dark:bg-zinc-700/50 dark:border-zinc-600 dark:text-gray-100 dark:placeholder:text-zinc-100/60"
                                                value="{{ old('country') }}">
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
                                                class="w-full rounded placeholder:text-sm py-2 border-gray-100 dark:bg-zinc-700/50 dark:border-zinc-600 dark:text-gray-100 dark:placeholder:text-zinc-100/60"
                                                value="{{ old('phone_no') }}">
                                            @error('phone_no')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="col-span-12 lg:col-span-6">
                                        <div class="mb-4">
                                            <label for="mobile_no"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Mobile
                                                no<span class="text-sm text-red-600">*</span></label>
                                            <input type="number" name="mobile_no" id="mobile_no"
                                                placeholder="Enter mobile no"
                                                class="w-full rounded placeholder:text-sm py-2 border-gray-100 dark:bg-zinc-700/50 dark:border-zinc-600 dark:text-gray-100 dark:placeholder:text-zinc-100/60"
                                                value="{{ old('mobile_no') }}">
                                            @error('mobile_no')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label for="email"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Email</label>
                                            <input type="email" name="email" id="email"
                                                placeholder="Enter email"
                                                class="w-full rounded placeholder:text-sm py-2 border-gray-100 dark:bg-zinc-700/50 dark:border-zinc-600 dark:text-gray-100 dark:placeholder:text-zinc-100/60"
                                                value="{{ old('email') }}">
                                            @error('email')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        {{-- <div class="mb-4">
                                            <label for="nas_type"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100">User
                                                Type<span class="text-sm text-red-600">*</span></label>
                                            <select name="user_type" id="user_type"
                                                class="w-full rounded placeholder:text-sm py-2 border-gray-100 dark:bg-zinc-700/50 dark:border-zinc-600 dark:text-gray-100 dark:placeholder:text-zinc-100/60">
                                                <option>Select User Type</option>
                                                @foreach (config('enum.user_type') as $key => $value)
                                                    <option value="{{ $key }}" {{ ($key == old('user_type','')) ? 'selected' : '' }}>
                                                        {{ $value }}</option>
                                                @endforeach
                                            </select>
                                            @error('user_type')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div> --}}
                                        <div class="mb-4 mac-address-div">
                                            <label for="mac_address"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100">MAC
                                                Address</label>
                                            <input type="text" name="mac_address" id="mac_address"
                                                placeholder="Ex. XX:XX:XX:XX:XX:XX"
                                                class="w-full rounded placeholder:text-sm py-2 border-gray-100 dark:bg-zinc-700/50 dark:border-zinc-600 dark:text-gray-100 dark:placeholder:text-zinc-100/60"
                                                value="{{ old('mac_address') }}">
                                            @error('mac_address')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-4 username-div">
                                            <label for="username"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100">User
                                                Name<span class="text-sm text-red-600">*</span></label>
                                            <input type="text" name="username" id="username"
                                                placeholder="Enter Username"
                                                class="w-full rounded placeholder:text-sm py-2 border-gray-100 dark:bg-zinc-700/50 dark:border-zinc-600 dark:text-gray-100 dark:placeholder:text-zinc-100/60"
                                                value="{{ old('username') }}">
                                            @error('username')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                            <div class="mb-4">
                                                <label for="password"
                                                    class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Password<span
                                                        class="text-sm text-red-600">*</span></label>
                                                <input type="password" name="password" id="password"
                                                    placeholder="Enter Password"
                                                    class="w-full rounded placeholder:text-sm py-2 border-gray-100 dark:bg-zinc-700/50 dark:border-zinc-600 dark:text-gray-100 dark:placeholder:text-zinc-100/60"
                                                    value="{{ old('password') }}">
                                                @error('password')
                                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                                @enderror
                                                <label
                                                    class="font-medium text-gray-700 ltr:mr-2 rtl:ml-2 dark:text-zinc-100"
                                                    for="formrow-customCheck">Same As Above</label>
                                                <input type="checkbox"
                                                    class="align-middle rounded focus:ring-0 focus:ring-offset-0 dark:bg-zinc-700 dark:border-zinc-400 checked:bg-violet-500 dark:checked:bg-violet-500 same-as-above"
                                                    name="same_as_above" value="0">
                                            </div>
                                        </div>
                                        <div class="portal-div">
                                            <div class="mb-4">
                                                <label for="portal_login"
                                                    class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Portal
                                                    login<span class="text-sm text-red-600">*</span></label>
                                                <input type="text" name="portal_login" id="portal_login"
                                                    placeholder="Enter portal login"
                                                    class="w-full rounded placeholder:text-sm py-2 border-gray-100 dark:bg-zinc-700/50 dark:border-zinc-600 dark:text-gray-100 dark:placeholder:text-zinc-100/60"
                                                    value="{{ old('portal_login') }}">
                                                @error('portal_login')
                                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="mb-4">
                                                <label for="portal_password"
                                                    class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Portal
                                                    password<span class="text-sm text-red-600">*</span></label>
                                                <input type="password" name="portal_password" id="portal_password"
                                                    placeholder="Enter portal password"
                                                    class="w-full rounded placeholder:text-sm py-2 border-gray-100 dark:bg-zinc-700/50 dark:border-zinc-600 dark:text-gray-100 dark:placeholder:text-zinc-100/60"
                                                    value="{{ old('portal_password') }}">
                                                @error('portal_password')
                                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-4">
                                            <label for="operator"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Operator<span
                                                    class="text-sm text-red-600">*</span></label>
                                            <select name="operator" id="operator"
                                                class="w-full rounded placeholder:text-sm py-2 border-gray-100 dark:bg-zinc-700/50 dark:border-zinc-600 dark:text-gray-100 dark:placeholder:text-zinc-100/60"
                                                value="{{ old('operator') }}">
                                                <option value="">Select operator</option>
                                                @foreach ($operators as $key => $value)
                                                    <option value="{{ $value->id }}">
                                                        {{ $value->username }}</option>
                                                @endforeach
                                            </select>
                                            @error('operator')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label for="comment"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Comment</label>
                                            <textarea type="text" name="comment" id="comment" placeholder="Enter comment"
                                                class="w-full rounded placeholder:text-sm py-2 border-gray-100 dark:bg-zinc-700/50 dark:border-zinc-600 dark:text-gray-100 dark:placeholder:text-zinc-100/60">{{ old('comment') }}</textarea>
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
                                                        {{ old('status') == '1' ? 'checked' : '' }} checked
                                                        class="form-radio h-4 w-4 text-indigo-600 transition duration-150 ease-in-out">
                                                    <label for="status1"
                                                        class="ml-2 block text-sm leading-5 text-gray-700">Active</label>
                                                </div>

                                                <div class="flex items-center">
                                                    <input type="radio" id="status2" name="status" value="0"
                                                        {{ old('status') == '0' ? 'checked' : '' }}
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
                                <div class="hidden sm:block">
                                    <div class="py-8">
                                        <div class="border-t border-gray-200"></div>
                                    </div>
                                </div>
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
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $docExt = array_keys($docType);
                                            @endphp
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
                                                        class="px-6 py-3.5 border-l text-black font-bold border-gray-50 dark:border-zinc-600 dark:text-zinc-100">
                                                        {{ $v }} {!! in_array($k, $config) ? '<span class="text-sm text-red-600">*</span>' : '' !!}
                                                    </td>
                                                    <td scope="col"
                                                        class="px-6 py-3.5 border-l border-gray-50 dark:border-zinc-600 dark:text-zinc-100">
                                                        <div class="flex items-center">
                                                            <div class="px-6 py-3.5  flex items-center">
                                                                @if (!empty($enum))
                                                                    <div class="mr-2">
                                                                        <select name="{{ $name }}"
                                                                            class="placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                                            value="{{ old($name) }}">
                                                                            <option value="">Select type</option>
                                                                            @foreach ($enum as $key => $value)
                                                                                <option value="{{ $key }}">
                                                                                    {{ $value }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    @error($name)
                                                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                                                    @enderror
                                                                @endif
                                                                <div><input type="file" name="{{ $k }}"
                                                                        class="mr-2" accept="image/*, application/pdf">
                                                                </div>
                                                                @error($k)
                                                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </td>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="mt-3 col-span-6 sm:col-span-4 flex items-center justify-center">
                                    <button type="submit"
                                        class="mr-1 font-medium text-white border-transparent btn bg-violet-500 w-28 hover:bg-violet-700 focus:bg-violet-700 focus:ring focus:ring-violet-50"
                                        data-names="{{ $name }}">Submit</button>
                                    <a class="font-medium text-white border-transparent btn bg-red-500 w-28 hover:bg-red-700 focus:bg-red-700 focus:ring focus:ring-red-50"
                                        href="{{ route('user.index') }}">
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
    <script>
        var requiredDocs = '<?php echo json_encode($config); ?>';
        var extDocs = '<?php echo json_encode($docExt); ?>';
    </script>
    <script src="{{ asset('js/backend/user.js') }}"></script>
    <script>
        $(function() {
            user.create();
        });
    </script>
@endsection
