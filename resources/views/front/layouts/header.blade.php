<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top shadow-sm osahan-header py-0">
    <div class="container">
        <a class="navbar-brand me-0 me-lg-3 me-md-3" href="{{ route('front.home') }}">
            <img src="{{ asset('logo/logo.png') }}" alt="#" class="img-fluid d-none d-md-block">

            <img src="{{ asset('front/assets/img/fav.png') }}" alt="#"
                class="d-block d-md-none d-lg-none img-fluid">
        </a>
        <a href="#"
            class="ms-3 text-left d-flex text-dark align-items-center gap-2 text-decoration-none bg-white border-0 me-auto"
            data-bs-toggle="modal" data-bs-target="#add-delivery-location">
            <i class="bi bi-geo-alt-fill fs-5 text-success"></i>
            <span>
                <b>Delivery in 15 minutes</b>
                @if (Session::has('address'))
                    {{ Session::get('address') }} <!-- Display the full address -->
                @else
                    Location not available
                @endif

                <i class="bi bi-arrow-right-circle-fill ms-1"></i>
    </div>
    </span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto me-3 top-link">
            {{-- <li class="nav-item dropdown">
                    <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Shop Pages<i class="bi bi-chevron-down small ms-1"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="search.html">Search</a></li>
                        <li><a class="dropdown-item" href="listing.html">Listing</a></li>
                        <li><a class="dropdown-item" href="listing-detail.html">Listing Detail</a></li>
                        <li><a class="dropdown-item" href="product-detail.html">Product Detail</a></li>
                        <li><a class="dropdown-item" href="{{ route('view.cart') }}">Cart / Checkout</a></li>
                        <li><a class="dropdown-item" href="success-order.html">Success Order</a></li>
                    </ul>
                </li> --}}
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Profile<i class="bi bi-chevron-down small ms-1"></i>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('profile') }}">Orders List</a></li>
                    {{-- <li><a class="dropdown-item" href="profile.html">Addresses</a></li>
                        <li><a class="dropdown-item" href="profile.html">Manage Payments</a></li>
                        <li><a class="dropdown-item" href="profile.html">Eatsie Cash</a></li>
                        <li><a class="dropdown-item" href="profile.html">Support / Help</a></li> --}}
                </ul>
            </li>
            {{-- <li class="nav-item dropdown">
                    <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Pick up & Drop<i class="bi bi-chevron-down small ms-1"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="packages.html">Packages From</a></li>
                        <li><a class="dropdown-item" href="packages-payment.html">Packages Checkout</a></li>
                        <li><a class="dropdown-item" href="success-send.html">Successfully Send</a></li>
                    </ul>
                </li> --}}
            {{-- <li class="nav-item dropdown">
                    <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Extra Page<i class="bi bi-chevron-down small ms-1"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="about.html">About us</a></li>
                        <li><a class="dropdown-item" href="jobs.html">Jobs</a></li>
                        <li><a class="dropdown-item" href="contact.html">Contact Us</a></li>
                        <li><a class="dropdown-item" href="cupons.html">Cupons</a></li>
                    </ul>
                </li> --}}
        </ul>

        <div class="d-flex align-items-center gap-2">
            <a href="search.html" class="btn btn-light position-relative rounded-pill rounded-icon">
                <i class="icofont-search"></i>
            </a>
            <a href="{{ route('view.cart') }}" class="btn btn-light position-relative rounded-pill rounded-icon">
                <i class="bi bi-cart3"></i>
                <span
                    class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-warning">{{ !empty($cartItems) ? $cartItems->count() : '0' }}
                    <span class="visually-hidden">Cart</span>
                </span>
            </a>
            @if (Auth::guard('customer')->check())
                <li class="nav-item dropdown">
                    {{-- Use the user object to retrieve the first name and last name --}}
                    <a class="btn btn-success rounded-pill px-3 text-uppercase ms-2" role="button" href="#"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Crypt::decryptString(Auth::guard('customer')->user()->firstname) . ' ' . Crypt::decryptString(Auth::guard('customer')->user()->lastname) }}
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="profile.html">Orders List</a></li>
                        {{-- <li><a class="dropdown-item" href="profile.html">Addresses</a></li>
                        <li><a class="dropdown-item" href="profile.html">Manage Payments</a></li>
                        <li><a class="dropdown-item" href="profile.html">Eatsie Cash</a></li>
                        <li><a class="dropdown-item" href="profile.html">Support / Help</a></li> --}}
                        <li><a class="dropdown-item" href="{{ route('user.logout') }}">Logout</a></li>
                    </ul>
                </li>
            @else
                <a class="btn btn-success rounded-pill px-3 text-uppercase ms-2" data-bs-toggle="modal"
                    href="#loginModal" role="button">Sign in</a>
                <a class="btn btn-success rounded-pill px-3 text-uppercase ms-2" href="{{ route('register') }}"
                    target="_blank" role="button">Register</a>
            @endif
        </div>
    </div>
    </div>
</nav>
