@extends('layouts.master')
@section('title')
    {{ __('Edit Location/Business Mgr.') }}
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
                <x-page-title title="Edit Location/Business Mgr." pagetitle="Location/Business Mgr." />

                <div class="grid grid-cols-1 mt-3">
                    <div class="flex flex-wrap card-body">
                        <div class="nav-tabs border-b-tabs">
                            <ul
                                class="flex flex-wrap w-full text-sm font-medium text-center text-gray-500 border-b border-gray-100 nav dark:border-gray-700 dark:text-gray-400">
                                <li>
                                    <a href="{{ route('subRestaurant.edit',$restaurant->id) }}"
                                        class="inline-block p-4 active">General</a>
                                </li>
                                <li>
                                    <a href="{{ route('subRestaurant.businessAddress',$restaurant->id) }}"
                                        class="inline-block p-4">Address Detail</a>
                                </li>
                                <li>
                                    <a href="{{ route('subRestaurant.menu.list',$restaurant->id) }}"
                                        class="inline-block p-4">Menu</a>
                                </li>
                                {{-- <li>
                                    <a href="{{ route('user.settings', $user->id) }}" class="inline-block p-4">Settings</a>
                                </li> --}}
                            </ul>
                        </div>
                    </div>
                    <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                        <div class="card-body">
                            <form method="POST" action="{{ route('subRestaurant.update', $restaurant->id) }}"
                                class="employee-edit-form" id="employee_form_edit">
                                @csrf
                                <div class="grid grid-cols-12 gap-x-6">
                                    <div class="col-span-12 lg:col-span-6">
                                        <div class="mb-4">
                                            <label for="name"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Name<span
                                                    class="text-sm text-red-600">*</span></label>
                                            <input type="text" name="name" id="name" placeholder="Enter Name"
                                                class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100""
                                                value="{{ old('name', Crypt::decryptString($restaurant->name) ?? '') }}">
                                            @error('name')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label for="email"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Email<span
                                                    class="text-sm text-red-600">*</span></label>
                                            <input type="email" name="email" id="email" placeholder="Enter Email"
                                                class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100""
                                                value="{{ old('email', $restaurant->email ?? '') }}">
                                            @error('email')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label for="contact_number"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Contact Number<span
                                                    class="text-sm text-red-600">*</span></label>
                                            <input type="number" name="contact_number" id="contact_number" placeholder="Enter Contact Number"
                                                class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100""
                                                value="{{ old('contact_number',$restaurant->contact_number ?? '') }}">
                                            @error('contact_number')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label for="description"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Description</label>
                                            <textarea type="text" name="description" id="description" placeholder="Enter Description"
                                                class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100""
                                                >{{$restaurant->description ?? ''}}</textarea>
                                            @error('description')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label for="open_at"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Open At<span class="text-sm text-red-600">*</span></label>
                                            <input type="time" name="open_at" id="open_at"
                                                placeholder="Open At"
                                                class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                value="{{ old('open_at',$restaurant->open_at ?? '') }}">
                                            @error('open_at')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label for="close_at"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Close At<span class="text-sm text-red-600">*</span></label>
                                            <input type="time" name="close_at" id="close_at"
                                                placeholder="Open At"
                                                class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                value="{{ old('close_at',$restaurant->close_at ?? '') }}">
                                            @error('close_at')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>   
                                        <div class="mb-4">
                                            <label for="status"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Status<span
                                                    class="text-sm text-red-600">*</span></label>
                                            <div class="mt-1 flex items-center">
                                                <div class="flex items-center" style="margin-right: 10px">
                                                    <input type="radio" id="status1" name="status" value="0"
                                                        {{ old('status', $restaurant->status) == '0' ? 'checked' : '' }}
                                                        class="form-radio h-4 w-4 text-indigo-600 transition duration-150 ease-in-out">
                                                    <label for="status1"
                                                        class="ml-2 block text-sm leading-5 text-gray-700">Active</label>
                                                </div>

                                                <div class="flex items-center">
                                                    <input type="radio" id="status2" name="status" value="1"
                                                        {{ old('status', $restaurant->status) == '1' ? 'checked' : '' }}
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
                                    <div class="col-span-12 lg:col-span-6">
                                        <div class="mb-4">
                                            <label for="address"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Address<span
                                                    class="text-sm text-red-600">*</span></label>
                                            <textarea type="text" name="address" id="address" placeholder="Enter address"
                                                class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100">{{ old('address',$restaurant->address) }}</textarea>
                                            @error('address')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label for="city"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100">City<span
                                                    class="text-sm text-red-600">*</span></label>
                                            <input type="text" name="city" id="city"
                                                placeholder="Enter city"
                                                class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                value="{{ old('city',$restaurant->city) }}">
                                            @error('city')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label for="state"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100">State<span
                                                    class="text-sm text-red-600">*</span></label>
                                            <input type="text" name="state" id="state"
                                                placeholder="Enter state"
                                                class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                value="{{ old('state',$restaurant->state) }}">
                                            @error('state')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label for="country"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Country
                                                <span class="text-sm text-red-600">*</span></label>
                                            <select name="country" id="country"
                                                class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                value="{{ old('country') }}">
                                                <option value="">Select Country</option>
                                                @foreach ($countryList as $key => $value)
                                                    <option value="{{ $key }}" {{$restaurant->country == $key ? 'selected' : ''}}>
                                                        {{ $value }}</option>
                                                @endforeach
                                            </select>
                                            @error('country')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label for="zip_code"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Zip Code<span
                                                    class="text-sm text-red-600">*</span></label>
                                            <input type="text" name="zip_code" id="zip_code"
                                                placeholder="Enter Zip Code"
                                                class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                value="{{ old('zip_code',$restaurant->zip_code) }}">
                                            @error('zip_code')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        @if (getCurrentUserRoleName() == 'SuperAdmin')                                            
                                            <div class="mb-4">
                                                <label for="user_id"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Business User
                                                <span class="text-sm text-red-600">*</span></label>
                                                <select name="user_id" id="user_id"
                                                class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100">
                                                    <option value="">Select User</option>
                                                    @foreach ($userList as $key => $value)
                                                    <option value="{{ $key }}"{{$key === $restaurant->user_id ? 'selected' : ''}}>
                                                        {{ $value }}</option>
                                                        @endforeach
                                                </select>
                                                @error('user_id')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        @endif                            
                                    </div>
                                </div>
                                <div class="mt-3 col-span-6 sm:col-span-4 flex items-center justify-center">
                                    <button type="submit"
                                        class="mr-1 font-medium text-white border-transparent btn bg-violet-500 w-28 hover:bg-violet-700 focus:bg-violet-700 focus:ring focus:ring-violet-50">Submit</button>
                                    <a class="font-medium text-white border-transparent btn bg-red-500 w-28 hover:bg-red-700 focus:bg-red-700 focus:ring focus:ring-red-50"
                                        href="{{ route('subRestaurant.index') }}">
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
    <script src="{{ asset('js/backend/restaurant.js') }}"></script>
    <script>
        $(function() {
            restaurant.edit();
        });
    </script>
@endsection
