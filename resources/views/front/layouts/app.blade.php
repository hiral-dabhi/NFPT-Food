<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    {{-- <link rel="icon" type="image/png" href="{{ asset('front/assets/img/fav.png') }}"> --}}
    <link rel="shortcut icon" href="{{ URL::asset('logo/logo.png') }}" />

    <title>
        @hasSection('title')
            @yield('title') |
        @endif {{ env('APP_NAME', 'NFPT') }}
    </title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('front/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Icofont Icon-->
    <link href="{{ asset('front/assets/vendor/icons/icofont.min.css') }}" rel="stylesheet" type="text/css">
    <!-- Bootstraps icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="{{ asset('front/assets/css/style.css') }}" rel="stylesheet">
    @livewireStyles
    <style>
        .loader {
            border: 4px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            border-top: 4px solid #000;
            /* Spinner color */
            width: 30px;
            height: 30px;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>
</head>

<body class="bg-light">
    <!-- Navbar -->
    @include('front.layouts.header')
    @yield('content')
    @include('front.layouts.footer')
    <!-- 1st -->
    <div class="modal fade" id="loginModal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered login-popup-main">
            <div class="modal-content border-0 shadow overflow-hidden rounded">
                <div class="modal-body p-0">
                    <div class="login-popup">
                        <button type="button" class="btn-close position-absolute" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                        <div class="row g-0">
                            <div class="d-none d-md-flex col-md-4 col-lg-4 bg-image1"></div>
                            <div class="col-md-8 col-lg-8 py-lg-5">
                                <div class="login p-5">
                                    <div class="mb-4 pb-2">
                                        <h5 class="mb-2 fw-bold">Sign In Here</h5>
                                        {{-- <p class="text-muted mb-0">Please login with this Email the next time you
                                            sign-in</p> --}}
                                    </div>
                                    <form method="POST" action="{{ route('user.login') }}" class="user-login">
                                        @csrf
                                        <div class="input-group bg-white border rounded mb-3 p-2">
                                            <span class="input-group-text bg-white border-0"><i
                                                    class="bi bi-envelope pe-2"></i> </span>
                                            <input type="email" name="email"
                                                class="form-control bg-white border-0 ps-0" placeholder="Enter Email"
                                                required>
                                            @error('email')
                                                <span>{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="input-group bg-white border rounded mb-3 p-2">
                                            <span class="input-group-text bg-white border-0"><i
                                                    class="bi bi-key pe-2"></i> </span>
                                            <input type="password" name="password"
                                                class="form-control bg-white border-0 ps-0" placeholder="Enter password"
                                                required>
                                            @error('password')
                                                <span>{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label small text-muted border-end pe-1"
                                                for="exampleCheck1">I accept the Terms of use & Privacy Policy</label>
                                            <a href="#" class="text-decoration-none text-success small">View T&C
                                                <i class="bi bi-chevron-right"></i></a>
                                        </div>
                                        <button type="submit"
                                            class="btn btn-success btn-lg py-3 px-4 text-uppercase w-100 mt-4">Sign In
                                            <i class="bi bi-arrow-right ms-2"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- 2nd -->
    <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2"
        tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered login-popup-main">
            <div class="modal-content border-0 shadow overflow-hidden rounded">
                <div class="modal-body p-0">
                    <div class="login-popup">
                        <button type="button" class="btn-close position-absolute" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                        <div class="row g-0">
                            <div class="d-none d-md-flex col-md-4 col-lg-4 bg-image1"></div>
                            <div class="col-md-8 col-lg-8 py-lg-5">
                                <div class="login p-5">
                                    <div class="mb-4 pb-2">
                                        <h5 class="mb-2 fw-bold">Confirm your number</h5>
                                        <p class="text-muted mb-0">Enter the 4 digit OTP we’ve sent by SMS to
                                            123456-78909
                                            <a data-bs-target="#exampleModalToggle2" data-bs-toggle="modal"
                                                class="text-success text-decoration-none" href="#"><i
                                                    class="bi bi-pencil-square"></i> Edit</a>
                                        </p>
                                    </div>
                                    <form>
                                        <div class="d-flex gap-3 text-center">
                                            <div class="input-group bg-white border rounded mb-3 p-2">
                                                <input type="text" value="1"
                                                    class="form-control bg-white border-0 text-center">
                                            </div>
                                            <div class="input-group bg-white border rounded mb-3 p-2">
                                                <input type="text" value="3"
                                                    class="form-control bg-white border-0 text-center">
                                            </div>
                                            <div class="input-group bg-white border rounded mb-3 p-2">
                                                <input type="text" value="1"
                                                    class="form-control bg-white border-0 text-center">
                                            </div>
                                            <div class="input-group bg-white border rounded mb-3 p-2">
                                                <input type="text" value="3"
                                                    class="form-control bg-white border-0 text-center">
                                            </div>
                                        </div>
                                        <div class="form-check ps-0">
                                            <label class="small text-muted">Resend OTP in 0:55</label>
                                        </div>
                                    </form>
                                    <button class="btn btn-success btn-lg py-3 px-4 text-uppercase w-100 mt-4"
                                        data-bs-target="#exampleModalToggle3" data-bs-toggle="modal">Get OTP <i
                                            class="bi bi-arrow-right ms-2"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- 3rd -->
    <div class="modal fade" id="exampleModalToggle3" aria-hidden="true" aria-labelledby="exampleModalToggleLabel3"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow">
                <div class="modal-header p-4 border-0">
                    <h5 class="h6 modal-title fw-bold" id="exampleModalToggleLabel3"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="text-center mb-5 pb-2">
                        <div class="mb-3"><img src="{{ asset('front/assets/img/login2.png') }}"
                                class="col-6 mx-auto" alt=""></div>
                        <h5 class="mb-2">Have a Referral or Invite Code?</h5>
                        <p class="text-muted">Use code GET50 to earn 50 Eatsie Cash</p>
                    </div>
                    <form>
                        <label class="form-label">Enter your referral/invite code</label>
                        <div class="input-group mb-2 border rounded-3 p-1">
                            <span class="input-group-text border-0 bg-white"><i
                                    class="bi bi bi-ticket-perforated  text-secondary"></i></span>
                            <input type="text" class="form-control border-0 bg-white ps-1"
                                placeholder="Enter the code" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                    </form>
                </div>
                <div class="modal-footer px-4 pb-4 pt-0 border-0">
                    <button class="btn btn-success btn-lg py-3 px-4 text-uppercase  w-100 m-0"
                        data-bs-target="#exampleModalToggle4" data-bs-toggle="modal">Claim Eatsie Cash</button>
                </div>
            </div>
        </div>
    </div>
    <!-- 4rth -->
    <div class="modal fade" id="exampleModalToggle4" aria-hidden="true" aria-labelledby="exampleModalToggleLabel4"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow">
                <div class="modal-header p-4 border-0">
                    <h5 class="h6 modal-title fw-bold" id="exampleModalToggleLabel4"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="row justify-content-center">
                        <div class="col-10 text-center">
                            <div class="mb-5"><img src="{{ asset('front/assets/img/login3.png') }}" alt=""
                                    class="col-6 mx-auto"></div>
                            <div class="my-3">
                                <h5 class="fw-bold">You got &#8377;50.0 Eatsie Cash!</h5>
                                <p class="text-muted h6">use this Eatsie Cash to save on your next orders</p>
                            </div>
                            <div class="my-4">
                                <p class="small text-muted mb-0">Your Eatsie Cash will expire in</p>
                                <div class="h5 text-success">6d:23h</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer px-4 pb-4 pt-0 border-0">
                    <a href="index.html" class="btn btn-success btn-lg py-3 px-4 text-uppercase w-100 m-0">Tap to
                        order</a>
                </div>
            </div>
        </div>
    </div>
    <!-- location Modal -->
    {{-- <div class="modal fade" id="add-delivery-location" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow">
                <div class="modal-header px-4">
                    <h5 class="h6 modal-title fw-bold">Add Your Location</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <!-- Autocomplete Search Input -->
                    <div class="input-group border p-1  osahan-search-icon shadow-sm rounded mb-3">
                        <span class="input-group-text bg-white border-0"><i class="icofont-search"></i></span>
                        <input type="text" id="autocomplete" placeholder="Search for area, location name" class="form-control bg-white border-0 ps-0">
                    </div>
    
                    <!-- Use Current Location Link -->
                    <div class="mb-4">
                        <a href="#" id="use-current-location" class="text-success d-flex gap-2 text-decoration-none fw-bold">
                            <i class="bi bi-compass text-success"></i>
                            <div>Use Current Location</div>
                        </a>
                    </div>
    
                    <!-- Map Display Area -->
                    <div class="text-muted text-uppercase small">Search Results</div>
                    <div>
                        <div id="map" style="height: 400px; width: 100%;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    
    @livewireScripts
    <script src="{{ asset('front/assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('front/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Custom scripts for all pages-->
    <script src="{{ asset('front/assets/js/custom.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    @yield('scripts')

    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDrnKqlsmJIGChHjoharwRwDHX5U0p2SJ8&libraries=places&callback=initAutocomplete"
        async defer></script>
    <script>
        function initAutocomplete() {
            const input = document.getElementById('autocomplete');
            const autocomplete = new google.maps.places.Autocomplete(input);
            // console.log(autocomplete);

            autocomplete.addListener('place_changed', function() {
                console.log(autocomplete);

                const place = autocomplete.getPlace();
                if (place.geometry) {
                    const location = place.geometry.location;
                    console.log(location);
                } else {
                    alert('No location details available');
                }
            });
        }


        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var latitude = position.coords.latitude;
                var longitude = position.coords.longitude;

                // Use the Google Maps Geocoding API to reverse-geocode the coordinates
                var geocodeUrl =
                    `https://maps.googleapis.com/maps/api/geocode/json?latlng=${latitude},${longitude}&key=AIzaSyDrnKqlsmJIGChHjoharwRwDHX5U0p2SJ8`;

                axios.get(geocodeUrl)
                    .then(response => {
                        // Check if the response contains any results
                        if (response.data && response.data.results && response.data.results.length > 0) {
                            // Get the formatted address from the response
                            var address = response.data.results[0].formatted_address;

                            // Initialize city and country variables
                            var city = '';
                            var country = '';

                            // Loop through address components to find city and country
                            var addressComponents = response.data.results[0].address_components;
                            addressComponents.forEach(function(component) {
                                if (component.types.includes('locality')) {
                                    city = component.long_name; // City
                                }
                                if (component.types.includes('country')) {
                                    country = component.long_name; // Country
                                }
                            });
                            // Send the latitude, longitude, and address to the backend to store in the session
                            axios.post('/store-location-session', {
                                latitude: latitude,
                                longitude: longitude,
                                address: address,
                                city: city,
                                country: country
                            }).then(response => {
                                console.log(response.data);
                            }).catch(error => {
                                console.log('Error sending location to backend:', error);
                            });
                        } else {
                            console.log('No results found from Geocoding API');
                        }
                    })
                    .catch(error => {
                        console.log('Error getting address from Geocode API:', error);
                    });

            }, function(error) {
                console.log('Error getting location: ' + error.message);
            });
        } else {
            console.log('Geolocation is not supported by this browser.');
        }

        $(document).ready(function() {
            @if (session()->has('success'))
                toastr.success("{{ session('success') }}");
            @endif
            @if (session()->has('error'))
                toastr.error("{{ session('error') }}");
            @endif
        });
    </script>
</body>

</html>
