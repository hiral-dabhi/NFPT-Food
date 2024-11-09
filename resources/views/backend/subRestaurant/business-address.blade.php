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
                                    <a href="{{ route('subRestaurant.edit', $restaurant->id) }}"
                                        class="inline-block p-4">General</a>
                                </li>
                                <li>
                                    <a href="{{ route('subRestaurant.businessAddress', $restaurant->id) }}"
                                        class="inline-block p-4 active">Address Detail</a>
                                </li>
                                <li>
                                    <a href="{{ route('subRestaurant.menu.list', $restaurant->id) }}"
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
                                                class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
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
    <script async
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDrnKqlsmJIGChHjoharwRwDHX5U0p2SJ8&loading=async&libraries=places&callback=initMap">
    </script>
    <script>
        let map, marker, autocomplete;

        function initMap() {
            // Default coordinates
            const defaultLocation = {
                lat: parseFloat($("#latitude").val()) || -34.397,
                lng: parseFloat($("#longitude").val()) || 150.644
            };

            // Initialize map
            map = new google.maps.Map(document.getElementById("map"), {
                center: defaultLocation,
                zoom: 8
            });

            // Marker setup
            marker = new google.maps.Marker({
                position: defaultLocation,
                map: map,
                draggable: true
            });

            // Check if google.maps.places is loaded
            if (typeof google.maps.places === 'undefined') {
                console.error("Google Places library failed to load.");
                return;
            }

            // Initialize Autocomplete on the address input
            autocomplete = new google.maps.places.Autocomplete(document.getElementById("address"), {
                fields: ["geometry", "address_components"]
            });

            // Event listener for address selection
            autocomplete.addListener("place_changed", () => {
                const place = autocomplete.getPlace();

                if (!place.geometry) {
                    alert("No details available for input: '" + place.name + "'");
                    return;
                }

                // Set map center and marker position
                map.setCenter(place.geometry.location);
                map.setZoom(15);
                marker.setPosition(place.geometry.location);

                // Update latitude and longitude fields
                $("#latitude").val(place.geometry.location.lat());
                $("#longitude").val(place.geometry.location.lng());

                // Initialize variables for address and zip code
                let formattedAddress = ""; // Initialize address without city, state, and country
                let locationName = ""; // Initialize locationName
                let zipCode = ""; // Initialize zipCode

                // Check if address components are available and parse them
                if (place.address_components) {
                    place.address_components.forEach(component => {
                        const componentType = component.types[0];
                        console.log(component.long_name);

                        switch (componentType) {
                            case "locality":
                                $("#city").val(component.long_name); // City
                                break;
                            case "administrative_area_level_1":
                                $("#state").val(component.long_name); // State
                                break;
                            case "country":
                                var countryName = component.long_name;
                                // Find and set the selected option in the dropdown
                                $("#country option").each(function() {
                                    if ($(this).text().trim().toLowerCase() === countryName
                                        .toLowerCase()) {
                                        $(this).prop("selected", true);
                                    }
                                });
                                break;
                            case "postal_code":
                                zipCode = component.long_name; // Zip code
                                break;
                            default:
                                // For the first component that's not locality, state, or country, treat it as the location name
                                if (locationName === "") {
                                    locationName = component.long_name;
                                }

                                // Append other components to the formatted address (excluding city, state, country)
                                formattedAddress += component.long_name + " ";
                                break;
                        }
                    });

                    // Set the location name and zip code as the address value
                    let fullAddress = locationName;
                    // if (zipCode) {
                    //     fullAddress += ", " + zipCode; // Add zip code if found
                    // }

                    // Set the address field to the location name and zip code
                    $("#address").val(fullAddress.trim());
                    $("#zip_code").val(zipCode);
                }
            });

            // Update coordinates when marker is dragged
            google.maps.event.addListener(marker, 'dragend', function(event) {
                $("#latitude").val(event.latLng.lat());
                $("#longitude").val(event.latLng.lng());
            });

            // Re-center map when latitude or longitude fields are changed
            $("#latitude, #longitude").on('keyup', function() {
                const lat = parseFloat($("#latitude").val());
                const lng = parseFloat($("#longitude").val());

                if (lat && lng) {
                    const newPosition = {
                        lat: lat,
                        lng: lng
                    };

                    // Update map position and marker
                    map.setCenter(newPosition);
                    marker.setPosition(newPosition);

                    // Reverse geocode to get address details
                    const geocoder = new google.maps.Geocoder();
                    geocoder.geocode({
                        location: newPosition
                    }, function(results, status) {
                        if (status === google.maps.GeocoderStatus.OK) {
                            if (results[0]) {
                                const addressComponents = results[0].address_components;
                                let formattedAddress =
                                    ""; // Initialize for address without city, state, country
                                console.log(results[0].formatted_address);

                                // Update address fields
                                $("#address").val(results[0].formatted_address);

                                // Clear existing city, state, and country fields
                                $("#city").val("");
                                $("#state").val("");
                                $("#country option").prop("selected", false);

                                // Variable to store the specific location (e.g., Kankaria Lake) and zip code
                                let locationName = "";
                                let zipCode = "";

                                addressComponents.forEach(component => {
                                    const types = component.types;

                                    if (types.includes("locality")) {
                                        $("#city").val(component.long_name); // City
                                    } else if (types.includes("administrative_area_level_1")) {
                                        $("#state").val(component.long_name); // State
                                    } else if (types.includes("country")) {
                                        const countryName = component.long_name;
                                        // Set country dropdown based on the name
                                        $("#country option").each(function() {
                                            if ($(this).text().trim().toLowerCase() ===
                                                countryName.toLowerCase()) {
                                                $(this).prop("selected", true);
                                            }
                                        });
                                    } else if (types.includes("postal_code")) {
                                        zipCode = component.long_name; // Zip code
                                    } else {
                                        // For the first component that's not locality, state, or country, treat it as the location name
                                        if (locationName === "") {
                                            locationName = component.long_name;
                                        }

                                        // Append other components to the formatted address (excluding city, state, country)
                                        formattedAddress += component.long_name + " ";
                                    }
                                });

                                // Set the location name and zip code as the address value
                                let fullAddress = locationName;
                                if (zipCode) {
                                    fullAddress += ", " + zipCode; // Add zip code if found
                                }

                                // Set the address field to the location name and zip code
                                $("#address").val(fullAddress.trim());
                            } else {
                                alert("No results found for the provided location.");
                            }
                        } else {
                            alert("Geocoder failed due to: " + status);
                        }
                    });
                }
            });
        }


        // Ensure initMap is called after the script loads
        window.initMap = initMap;
    </script>
@endsection
