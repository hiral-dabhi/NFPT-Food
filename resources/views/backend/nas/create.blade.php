@extends('layouts.master')
@section('title', 'Create NAS')
@section('content')
    <div class="main-content group-data-[sidebar-size=sm]:ml-[70px]">
        <div class="page-content dark:bg-zinc-700">
            <div class="container-fluid px-[0.625rem]">
                <x-page-title title="Create NAS" pagetitle="NAS" />
                <div class="grid grid-cols-1">
                    <div class="card dark:bg-zinc-800 dark:border-zinc-600 mt-3">
                        <form method="POST" action="{{ route('nas.store') }}" class="nas-create-form" id="nas_create_form">
                            @csrf

                            <div class="card-body">
                                <div class="grid grid-cols-12 gap-x-6">
                                    <div class="col-span-12 lg:col-span-6">
                                        <label class="block text-sm font-medium text-red-700">For AAA (Authentication,
                                            Authorization
                                            and
                                            Accounting)</label>
                                        <div class="hidden sm:block">
                                            <div class="py-2">
                                                <div class="border-t border-gray-200"></div>
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-6 gap-6">
                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="short_name"
                                                    class="block text-sm font-medium text-gray-700">Short
                                                    name<span class="text-sm text-red-600">*</span></label>
                                                <input type="text" name="short_name" id="short_name"
                                                    placeholder="Enter NAS short name"
                                                    class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                    value="{{ old('short_name') }}">
                                                @error('short_name')
                                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="nas_type" class="block text-sm font-medium text-gray-700">Nas
                                                    Type<span class="text-sm text-red-600">*</span></label>
                                                <select name="nas_type" id="nas_type"
                                                    class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                    value="{{ old('nas_type') }}">
                                                    <option value="">Select Nas type</option>
                                                    <option value="mikrotik" selected>Mikrotik</option>
                                                </select>
                                                @error('nas_type')
                                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="ip_address" class="block text-sm font-medium text-gray-700">IP
                                                    Address<span class="text-sm text-red-600">*</span></label>
                                                <input type="text" name="ip_address" id="ip_address"
                                                    placeholder="Enter IP Address"
                                                    class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                    value="{{ old('ip_address') }}">
                                                @error('ip_address')
                                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="items-center col-span-6 sm:col-span-6">
                                                <label for="ip_address"
                                                    class="block text-sm font-medium text-gray-700">Secret<span
                                                        class="text-sm text-red-600">*</span></label>
                                                <div class="flex">
                                                    <input type="text" name="secret" id="secret"
                                                        placeholder="Enter secret"
                                                        class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                        value="{{ old('secret') }}">
                                                    @error('secret')
                                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                                    @enderror
                                                    <a href="javascript:void(0)"
                                                        class="bg-green-500 text-white font-bold py-2 px-4 rounded ml-4 generate_secret">Generate</a>
                                                </div>
                                            </div>
                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="coa_port" class="block text-sm font-medium text-gray-700">COA
                                                    Port<span class="text-sm text-red-600">*</span></label>
                                                <input type="text" name="coa_port" id="coa_port"
                                                    placeholder="Enter COA Port"
                                                    class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                    value="{{ old('coa_port') }}">
                                                @error('coa_port')
                                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="interim_time"
                                                    class="block text-sm font-medium text-gray-700">Interim
                                                    Time
                                                    (Minute)<span class="text-sm text-red-600">*</span></label>
                                                <input type="text" name="interim_time" id="interim_time"
                                                    placeholder="Enter Interim time"
                                                    class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                    value="{{ old('interim_time') }}">
                                                @error('interim_time')
                                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-span-12 lg:col-span-6">
                                        <label class="block text-sm font-medium text-red-700">For Monitoring (Only work with
                                            Mikrotik NAS
                                            Type)</label>
                                        <div class="hidden sm:block">
                                            <div class="py-2">
                                                <div class="border-t border-gray-200"></div>
                                            </div>
                                        </div>

                                        <div class="grid grid-cols-6 gap-6">
                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="api_username"
                                                    class="block text-sm font-medium text-gray-700">API
                                                    Username</label>
                                                <input type="text" name="api_username" id="api_username"
                                                    placeholder="Enter API Username"
                                                    class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                    value="{{ old('api_username') }}">
                                                @error('api_username')
                                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                                @enderror

                                            </div>
                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="api_password"
                                                    class="block text-sm font-medium text-gray-700">API
                                                    Password</label>
                                                <input type="password" name="api_password" id="api_password"
                                                    placeholder="Enter API Password"
                                                    class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                    value="{{ old('api_password') }}">
                                                @error('api_password')
                                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="api_port" class="block text-sm font-medium text-gray-700">API
                                                    Port</label>
                                                <input type="text" name="api_port" id="api_port"
                                                    placeholder="Enter API Port"
                                                    class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                    value="{{ old('api_port') }}">
                                                @error('api_port')
                                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="wan_interface"
                                                    class="block text-sm font-medium text-gray-700">WAN
                                                    Interface</label>
                                                <input type="text" name="wan_interface" id="wan_interface"
                                                    placeholder="Enter WAN interface"
                                                    class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                    value="{{ old('wan_interface') }}">
                                                @error('wan_interface')
                                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="lan_interface"
                                                    class="block text-sm font-medium text-gray-700">LAN
                                                    Interface<span class="text-sm text-red-600">*</span></label>
                                                <input type="text" name="lan_interface" id="lan_interface"
                                                    placeholder="Enter LAN interface"
                                                    class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                    value="{{ old('lan_interface') }}">
                                                @error('lan_interface')
                                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="lan_ip_pool"
                                                    class="block text-sm font-medium text-gray-700">LAN
                                                    IP-Pool</label>
                                                <input type="text" name="lan_ip_pool" id="lan_ip_pool"
                                                    placeholder="Enter LAN IP-Pool"
                                                    class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                    value="{{ old('lan_ip_pool') }}">
                                                @error('lan_ip_pool')
                                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-span-12 lg:col-span-6">
                                        <label class="mt-5 block text-sm font-medium text-red-700">For CTS/NAT logs</label>
                                        <div class="hidden sm:block">
                                            <div class="py-2">
                                                <div class="border-t border-gray-200"></div>
                                            </div>
                                        </div>

                                        <div class="grid grid-cols-6 gap-6">
                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="log_server"
                                                    class="block text-sm font-medium text-gray-700">Log
                                                    Server<span class="text-sm text-red-600">*</span></label>
                                                <select name="log_server" id="log_server"
                                                    class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                    value="{{ old('log_server') }}">
                                                    <option value="">Select Log server</option>
                                                    @foreach (config('enum.log_server') as $key => $value)
                                                        <option value="{{ $key }}"
                                                            {{ $key == old('log_server', '') ? 'selected' : '' }}>
                                                            {{ $value }}</option>
                                                    @endforeach
                                                </select>
                                                @error('log_server')
                                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="prefix_directory"
                                                    class="block text-sm font-medium text-gray-700">Prefix/Directory</label>
                                                <input type="text" name="prefix_directory" id="prefix_directory"
                                                    placeholder="Enter Prefix/Directory"
                                                    class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                    value="{{ old('prefix_directory') }}">
                                                @error('prefix_directory')
                                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-span-12 lg:col-span-6">
                                        <label class="mt-5 block text-sm font-medium text-red-700">Advanced</label>
                                        <div class="hidden sm:block">
                                            <div class="py-2">
                                                <div class="border-t border-gray-200"></div>
                                            </div>
                                        </div>

                                        <div class="grid grid-cols-6 gap-6">
                                            <div class="col-span-6 sm:col-span-6">
                                                <div style="display: flex; align-items: center;">
                                                    <input type="checkbox"
                                                        class="mr-2 ckb-password align-middle rounded focus:ring-0 focus:ring-offset-0 dark:bg-zinc-700 dark:border-zinc-400 checked:bg-violet-500 dark:checked:bg-violet-500"
                                                        name="block_unwanted" value="0">
                                                    <label class="block text-sm font-medium text-gray-700"
                                                        style="margin-right: 10px;">Blocked
                                                        Unwanted request(s)</label>
                                                </div>
                                            </div>
                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="blocked_ip_pool"
                                                    class="block text-sm font-medium text-gray-700">Blocked
                                                    IP-Pool</label>
                                                <input type="text" name="blocked_ip_pool" id="blocked_ip_pool"
                                                    placeholder="Enter Blocked IP-Pool"
                                                    class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                    value="{{ old('blocked_ip_pool') }}">
                                                @error('blocked_ip_pool')
                                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="blocked_address_list"
                                                    class="block text-sm font-medium text-gray-700">Blocked
                                                    Address list</label>
                                                <input type="text" name="blocked_address_list"
                                                    id="blocked_address_list" placeholder="Enter Blocked Address list"
                                                    class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                    value="{{ old('blocked_address_list') }}">
                                                @error('blocked_address_list')
                                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-span-6 sm:col-span-6">
                                                <div style="display: flex; align-items: center;">
                                                    <input type="checkbox"
                                                        class="mr-2 ckb-username align-middle rounded focus:ring-0 focus:ring-offset-0 dark:bg-zinc-700 dark:border-zinc-400 checked:bg-violet-500 dark:checked:bg-violet-500"
                                                        name="catch_username" value="0">
                                                    <label class="block text-sm font-medium text-gray-700"
                                                        style="margin-right: 10px;">Catch
                                                        Username</label>
                                                </div>
                                            </div>
                                            <div class="col-span-6 sm:col-span-6 catch-username">
                                                <label for="default_service_id"
                                                    class="block text-sm font-medium text-gray-700">Default Plan<span
                                                        class="text-sm text-red-600">*</span></label>
                                                <select name="default_service_id" id="default_service_id"
                                                    class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                    value="{{ old('default_service_id') }}">
                                                    <option value="">Select Service Plan</option>
                                                    @foreach ($services as $key => $value)
                                                        <option value="{{ $value->id }}">{{ $value->service_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('default_service_id')
                                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-span-6 sm:col-span-6 catch-username">
                                                <label for="default_operator_id"
                                                    class="block text-sm font-medium text-gray-700">Default
                                                    Operator</label>
                                                <select name="default_operator_id" id="default_operator_id"
                                                    class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                    value="{{ old('default_operator_id') }}">
                                                    <option value="">None</option>
                                                    @foreach ($operators as $key => $value)
                                                        <option value="{{ $value->id }}">{{ $value->username }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('default_operator_id')
                                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-span-6 sm:col-span-6 catch-username">
                                                <label for="default_user_group"
                                                    class="block text-sm font-medium text-gray-700">Default
                                                    User Group</label>
                                                <select name="default_user_group" id="default_user_group"
                                                    class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                    value="{{ old('default_user_group') }}">
                                                    @foreach (config('enum.user_group') as $key => $value)
                                                        <option value="{{ $key }}"
                                                            {{ $key == old('default_user_group', '') ? 'selected' : '' }}>
                                                            {{ $value }}</option>
                                                    @endforeach
                                                </select>
                                                @error('default_user_group')
                                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                                <div style="display: flex; align-items: center;">
                                                    <input type="checkbox"
                                                        class="mr-2 catch-password align-middle rounded focus:ring-0 focus:ring-offset-0 dark:bg-zinc-700 dark:border-zinc-400 checked:bg-violet-500 dark:checked:bg-violet-500"
                                                        name="catch_password" value="0">
                                                    <label class="block text-sm font-medium text-gray-700"
                                                        style="margin-right: 10px;">Catch
                                                        Password</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-6 sm:col-span-6 flex items-center justify-center mb-5">
                                <button type="submit"
                                    class="font-medium mr-1 text-white border-transparent btn bg-violet-500 w-28 hover:bg-violet-700 focus:bg-violet-700 focus:ring focus:ring-violet-50">Submit</button>
                                <a class="font-medium text-white border-transparent btn bg-red-500 w-28 hover:bg-red-700 focus:bg-red-700 focus:ring focus:ring-red-50"
                                    href="{{ route('nas.index') }}">
                                    Back
                                </a>
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
    <script src="{{ asset('js/backend/nas.js') }}"></script>
    <script>
        $(function() {
            nas.create();
        });
    </script>
@endsection
