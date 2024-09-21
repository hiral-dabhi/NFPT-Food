@extends('layouts.master')
@section('title')
    {{ __('Edit Business Detail') }}
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
                <x-page-title title="Edit Business Detail" pagetitle="Business Detail" />
                <div class="grid grid-cols-1 mt-3">
                    @include('components.alert-message')
                    <div class="flex flex-wrap card-body">
                        <div class="nav-tabs border-b-tabs">
                            <ul
                                class="flex flex-wrap w-full text-sm font-medium text-center text-gray-500 border-b border-gray-100 nav dark:border-gray-700 dark:text-gray-400">
                                <li>
                                    <a href="{{ route('restaurantStaff.businessDetail') }}"
                                        class="inline-block p-4">General</a>
                                </li>
                                <li>
                                    <a href="{{ route('restaurantStaff.businessDetailMap') }}"
                                        class="inline-block p-4 active">Address Detail</a>
                                </li>
                                {{-- <li>
                                    <a href="{{ route('user.settings', $user->id) }}" class="inline-block p-4">Settings</a>
                                </li> --}}
                            </ul>
                        </div>
                    </div>
                    <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                        <div class="card-body">
                            <form method="POST"
                                action="{{ route('restaurantStaff.businessAddress.update', $restaurant->id) }}"
                                class="business-address-edit-form" id="business-address_form_edit">
                                @csrf
                                <div class="grid grid-cols-12 gap-x-6">
                                    <div class="col-span-12 lg:col-span-6">
                                        <div class="mb-4">
                                            <label for="address"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Address<span
                                                    class="text-sm text-red-600">*</span></label>
                                            <input type="text" name="address" id="address" placeholder="Enter address"
                                                class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100""
                                                value="{{ old('address', $restaurant->address ?? '') }}">
                                            @error('address')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label for="latitude"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Latitude<span
                                                    class="text-sm text-red-600">*</span></label>
                                            <input type="text" name="latitude" id="latitude"
                                                placeholder="Enter latitude"
                                                class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100""
                                                value="{{ old('latitude', $restaurant->latitude ?? '') }}">
                                            @error('latitude')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label for="longitude"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Longitude<span
                                                    class="text-sm text-red-600">*</span></label>
                                            <input type="text" name="longitude" id="longitude"
                                                placeholder="Enter longitude"
                                                class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100""
                                                value="{{ old('longitude', $restaurant->longitude ?? '') }}">
                                            @error('longitude')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="mb-4">
                                            <label for="city"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100">City<span
                                                    class="text-sm text-red-600">*</span></label>
                                            <input type="text" name="city" id="city" placeholder="Enter city"
                                                class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                value="{{ old('city', $restaurant->city ?? '') }}">
                                            @error('city')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label for="state"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100">State<span
                                                    class="text-sm text-red-600">*</span></label>
                                            <input type="text" name="state" id="state" placeholder="Enter state"
                                                class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                value="{{ old('state', $restaurant->state ?? '') }}">
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
                                                    <option value="{{ $key }}"
                                                        {{ $restaurant->country == $key ? 'selected' : '' }}>
                                                        {{ $value }}</option>
                                                @endforeach
                                            </select>
                                            @error('country')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="col-span-12 lg:col-span-6">
                                        <div class="mb-4">
                                            <div id="map" style="height: 400px; width: 100%;"></div>
                                        </div>
                                        <div class="mb-4">
                                            <label for="zip_code"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Zip
                                                Code<span class="text-sm text-red-600">*</span></label>
                                            <input type="text" name="zip_code" id="zip_code"
                                                placeholder="Enter Zip Code"
                                                class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                value="{{ old('zip_code', $restaurant->zip_code ?? '') }}">
                                            @error('zip_code')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3 col-span-6 sm:col-span-4 flex">
                                    <button type="submit"
                                        class="mr-1 font-medium text-white border-transparent btn bg-violet-500 w-28 hover:bg-violet-700 focus:bg-violet-700 focus:ring focus:ring-violet-50">Submit</button>
                                    <a class="font-medium text-white border-transparent btn bg-red-500 w-28 hover:bg-red-700 focus:bg-red-700 focus:ring focus:ring-red-50"
                                        href="{{ route('home') }}">
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
    <script src="{{ asset('js/backend/restaurantStaff.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap" async defer></script>

    <script>
        let map;
        let marker;
        // marker = new google.maps.Marker({
        //     position: defaultLocation,
        //     map: map,
        //     draggable: true // Enable marker dragging
        // });
        // google.maps.event.addListener(marker, 'dragend', function(event) {
        //     $("#latitude").val(event.latLng.lat());
        //     $("#longitude").val(event.latLng.lng());
        // });
        function initMap() {
            // Default coordinates, you can set a default location or leave empty
            const defaultLocation = {
                lat: parseFloat($("#latitude").val()) || -34.397,
                lng: parseFloat($("#longitude").val()) || 150.644
            };

            // Initialize the map
            map = new google.maps.Map(document.getElementById("map"), {
                center: defaultLocation,
                zoom: 8
            });

            // Add a marker
            marker = new google.maps.Marker({
                position: defaultLocation,
                map: map
            });

            // Update latitude and longitude fields when marker is dragged
            google.maps.event.addListener(marker, 'dragend', function(event) {
                document.getElementById('latitude').value = event.latLng.lat();
                document.getElementById('longitude').value = event.latLng.lng();
            });
        }

        // Trigger map reload when latitude or longitude fields are changed
        $("#latitude, #longitude").on('change', function() {
            const lat = parseFloat($("#latitude").val());
            const lng = parseFloat($("#longitude").val());

            if (lat && lng) {
                const newPosition = {
                    lat: lat,
                    lng: lng
                };
                map.setCenter(newPosition);
                marker.setPosition(newPosition);
            }
        });

        // Initialize the map after the window loads
        window.initMap = initMap;
        $(function() {
            restaurant.businessAddress();
        });
    </script>
@endsection
