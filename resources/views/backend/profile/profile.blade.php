@extends('layouts.master')
@section('title')
    {{ __('Profile') }}
@endsection
@section('css')
@endsection
@section('content')
    <div class="main-content group-data-[sidebar-size=sm]:ml-[70px]">
        <div class="page-content dark:bg-zinc-700">
            <div class="container-fluid px-[0.625rem]">

                <!-- page title -->
                <x-page-title title="Profile" pagetitle="Home" />

                <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                    <div class="card-body">
                        @include('components.alert-message')

                        <form class="user-profile" id="user_profile"
                            action="{{ route('profile.update') }}" method="POST">
                            @csrf
                            <div class="grid grid-cols-12 gap-x-6">
                                <div class="col-span-12 lg:col-span-6">
                                    <div class="mb-4">
                                        <label for="firstname"
                                            class="block mb-2 font-medium text-gray-700 dark:text-gray-100">First Name<span
                                                class="text-sm text-red-600">*</span></label>
                                        <input type="text" name="firstname" id="firstname" placeholder="Enter Name"
                                            class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100""
                                            value="{{ old('firstname', !empty($user->firstname) ? Crypt::decryptString($user->firstname) : '') }}">
                                        @error('firstname')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label for="lastname"
                                            class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Last Name<span
                                                class="text-sm text-red-600">*</span></label>
                                        <input type="text" name="lastname" id="lastname" placeholder="Enter Last Name"
                                            class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100""
                                            value="{{ old('lastname', !empty($user->lastname) ? Crypt::decryptString($user->lastname) : '') }}">
                                        @error('lastname')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label for="email"
                                            class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Email</label>
                                        <input type="email"  name="email" id="email"
                                            placeholder="Enter email"
                                            class="form-control border border-gray-50 py-1.5  w-full rounded bg-gray-50/30 placeholder:text-gray-300 dark:bg-zinc-700/50 dark:border-zinc-600"
                                            value="{{ old('email', $user->email ?? '') }}">
                                        @error('email')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label for="address"
                                            class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Address<span class="text-sm text-red-600">*</span></label>
                                        <textarea type="text"  name="address" id="address" placeholder="Enter address"
                                            class="form-control border border-gray-50 py-1.5  w-full rounded bg-gray-50/30 placeholder:text-gray-300 dark:bg-zinc-700/50 dark:border-zinc-600">{{ old('address', $user->address ?? '') }}</textarea>
                                        @error('address')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label for="city"
                                            class="block mb-2 font-medium text-gray-700 dark:text-gray-100">City<span class="text-sm text-red-600">*</span></label>
                                        <input type="text"  name="city" id="city"
                                            placeholder="Enter city"
                                            class="form-control border border-gray-50 py-1.5  w-full rounded bg-gray-50/30 placeholder:text-gray-300 dark:bg-zinc-700/50 dark:border-zinc-600"
                                            value="{{ old('city', $user->city ?? '') }}">
                                        @error('city')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label for="zip_code"
                                            class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Zip<span class="text-sm text-red-600">*</span></label>
                                        <input type="text"  name="zip_code" id="zip_code" placeholder="Enter zip code"
                                            class="form-control border border-gray-50 py-1.5  w-full rounded bg-gray-50/30 placeholder:text-gray-300 dark:bg-zinc-700/50 dark:border-zinc-600"
                                            value="{{ old('zip_code', $user->zipcode ?? '') }}">
                                        @error('zip_code')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label for="state"
                                            class="block mb-2 font-medium text-gray-700 dark:text-gray-100">State<span class="text-sm text-red-600">*</span></label>
                                        <input type="text"  name="state" id="state"
                                            placeholder="Enter state"
                                            class="form-control border border-gray-50 py-1.5  w-full rounded bg-gray-50/30 placeholder:text-gray-300 dark:bg-zinc-700/50 dark:border-zinc-600"
                                            value="{{ old('state', $user->state ?? '') }}">
                                        @error('state')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label for="country"
                                            class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Country
                                            <span class="text-sm text-red-600">*</span></label>
                                        <select name="country" id="country"
                                            class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100">
                                            <option value="">Select Country</option>
                                            @foreach ($countryList as $key => $value)
                                                <option value="{{ $key }}" {{$user->country == $key ? 'selected' : ''}}>
                                                    {{ $value }}</option>
                                            @endforeach
                                        </select>
                                        @error('country')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>                        
                                    <div class="mb-4">
                                        <label for="contact_number"
                                            class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Contact Number<span class="text-sm text-red-600">*</span></label>
                                        <input type="text"  name="contact_number" id="contact_number"
                                            placeholder="Enter mobile no"
                                            class="form-control border border-gray-50 py-1.5  w-full rounded bg-gray-50/30 placeholder:text-gray-300 dark:bg-zinc-700/50 dark:border-zinc-600"
                                            value="{{ old('contact_number', $user->contact_number ?? '') }}">
                                        @error('contact_number')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            {{-- @can('ucp-update-profile') --}}
                                <div class="col-span-6 sm:col-span-6 flex items-center justify-center mb-5">
                                    <button type="submit"
                                        class="font-medium mr-1 text-white border-transparent btn bg-violet-500 w-28 hover:bg-violet-700 focus:bg-violet-700 focus:ring focus:ring-violet-50">Submit</button>
                                </div>
                            {{-- @endcan --}}
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
    <script src="{{ asset('js/subscriber/profile.js') }}"></script>
    <script>
        var isUpdate = false;
        @can('ucp-update-profile')
            var isUpdate = true;
        @endcan

        $(function() {
            profile.profile();
        });
    </script>
@endsection
