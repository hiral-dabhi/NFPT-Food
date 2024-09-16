@extends('layouts.master')
@section('title', 'Edit IPv6')
@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
<div class="main-content group-data-[sidebar-size=sm]:ml-[70px]">
    <div class="page-content dark:bg-zinc-700">
        <div class="container-fluid px-[0.625rem]">

            <!-- page title -->
            <x-page-title title="Edit Ipv6" pagetitle="Ipv6" />

            <div class="grid grid-cols-1 mt-3">
                <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                    <form method="POST" action="{{ route('ipv6.update', $ipv6->id) }}" class="ipv6-edit-form">
                        @csrf

                        <div class="bg-white sm:p-6 shadow sm:rounded-md">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-4">
                                    <label for="pool_name" class="block text-sm font-medium text-gray-700">Pool
                                        name<span class="text-sm text-red-600">*</span></label>
                                    <input type="text" name="pool_name" id="pool_name" placeholder="Enter Pool name" class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100" value="{{ old('pool_name', $ipv6->pool_name) }}">
                                    @error('pool_name')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-4">
                                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                                    <textarea type="text" name="description" id="description" placeholder="Enter description" class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100">{{ old('description', $ipv6->description) }}</textarea>
                                    @error('description')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-4">
                                    <label for="network" class="block text-sm font-medium text-gray-700">Network<span class="text-sm text-red-600">*</span></label>
                                    <input type="text" name="network" id="network" placeholder="Enter Network" class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100" value="{{ old('network', $ipv6->network) }}">
                                    @error('email')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-span-6 sm:col-span-4">
                                    <label for="prefix_length_id" class="block text-sm font-medium text-gray-700">Prefix
                                        Length<span class="text-sm text-red-600">*</span></label>
                                    <select name="prefix_length_id" id="role" class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100">
                                        <option value="">Select Prefix Length</option>
                                        @foreach ($prefix as $key => $value)
                                        <option value="{{ $value->id }}" {{ old('prefix_length_id', $ipv6->prefix_length_id) == $value->id ? 'selected' : '' }}>
                                            {{ $value->title }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('prefix_length_id')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-span-6 sm:col-span-4">
                                    <label for="prefix_length_id" class="block text-sm font-medium text-gray-700">Operators<span class="text-sm text-red-600">*</span></label>
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

                                <div class="col-span-6 sm:col-span-4 flex items-center justify-center">
                                    <button type="submit" class="mr-1 font-medium text-white border-transparent btn bg-violet-500 w-28 hover:bg-violet-700 focus:bg-violet-700 focus:ring focus:ring-violet-50">Submit</button>
                                    <a class="font-medium text-white border-transparent btn bg-red-500 w-28 hover:bg-red-700 focus:bg-red-700 focus:ring focus:ring-red-50" href="{{ route('ipv6.index') }}">
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
<script src="{{ asset('js/backend/ipv6.js') }}"></script>
<script>
    $(function() {
        ipv6.edit();
    });
</script>
@endsection