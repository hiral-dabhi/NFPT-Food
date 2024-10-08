@include('front.layouts.app')
@section('content')
    <section class="main-banner bg-white pt-4">
        <div class="container">
            <div id="carouselExampleFade" class="carousel slide carousel-fade mb-4" data-bs-ride="carousel">
                <div class="carousel-inner rounded">
                    <div class="carousel-item active">
                        <a href="listing.html"><img src="{{ asset('front/assets/img/banner1.png') }}" class="d-block w-100"
                                alt="..."></a>
                    </div>
                    <div class="carousel-item">
                        <a href="packages.html"><img src="{{ asset('front/assets/img/banner2.png') }}" class="d-block w-100"
                                alt="..."></a>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <div class="row row-cols-2 row-cols-md-4 row-cols-lg-4 g-4">
                <div class="col"><a href="listing.html"><img src="{{ asset('front/assets/img/l1.png') }}" alt="#"
                            class="img-fluid rounded-3"></a></div>
                <div class="col"><a href="packages.html"><img src="{{ asset('front/assets/img/l3.png') }}" alt="#"
                            class="img-fluid rounded-3"></a></div>
                <div class="col"><a href="listing.html"><img src="{{ asset('front/assets/img/l4.png') }}" alt="#"
                            class="img-fluid rounded-3"></a></div>
                <div class="col"><a href="listing.html"><img src="{{ asset('front/assets/img/l2.png') }}" alt="#"
                            class="img-fluid rounded-3"></a></div>
            </div>
        </div>
    </section>
    <section class="bg-white">
        <div class="container py-5">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h5 class="mb-0 fw-bold">Explore our Range of Products</h5>
                <a class="text-decoration-none text-success" href="listing.html">View All <i
                        class="bi bi-arrow-right-circle-fill ms-1"></i></a>
            </div>
            <div class="row row-cols-2 row-cols-md-4 row-cols-lg-6 g-4 homepage-products-range">
                <div class="col">
                    <div class="text-center position-relative border rounded pb-4">
                        <img src="{{ asset('front/assets/img/1.png') }}" class="img-fluid rounded-3 p-3" alt="...">
                        <div class="listing-card-body pt-0">
                            <h6 class="card-title mb-1 fs-14">Fresh Milk</h6>
                            <p class="card-text small text-success">128 Items</p>
                        </div>
                        <a href="listing.html" class="stretched-link"></a>
                    </div>
                </div>
                <div class="col">
                    <div class="text-center position-relative border rounded pb-4">
                        <img src="{{ asset('front/assets/img/2.png') }}" class="img-fluid rounded-3 p-3" alt="...">
                        <div class="listing-card-body pt-0">
                            <h6 class="card-title mb-1 fs-14">Vegetables</h6>
                            <p class="card-text small text-success">345 Items</p>
                        </div>
                        <a href="listing.html" class="stretched-link"></a>
                    </div>
                </div>
                <div class="col">
                    <div class="text-center position-relative border rounded pb-4">
                        <img src="{{ asset('front/assets/img/3.png') }}" class="img-fluid rounded-3 p-3" alt="...">
                        <div class="listing-card-body pt-0">
                            <h6 class="card-title mb-1 fs-14">Fruits</h6>
                            <p class="card-text small text-success">233 Items</p>
                        </div>
                        <a href="listing.html" class="stretched-link"></a>
                    </div>
                </div>
                <div class="col">
                    <div class="text-center position-relative border rounded pb-4">
                        <img src="{{ asset('front/assets/img/4.png') }}" class="img-fluid rounded-3 p-3" alt="...">
                        <div class="listing-card-body pt-0">
                            <h6 class="card-title mb-1 fs-14">Bakery & Dairy</h6>
                            <p class="card-text small text-success">4445 Items</p>
                        </div>
                        <a href="listing.html" class="stretched-link"></a>
                    </div>
                </div>
                <div class="col">
                    <div class="text-center position-relative border rounded pb-4">
                        <img src="{{ asset('front/assets/img/5.png') }}" class="img-fluid rounded-3 p-3" alt="...">
                        <div class="listing-card-body pt-0">
                            <h6 class="card-title mb-1 fs-14">Beverages</h6>
                            <p class="card-text small text-success">234 Items</p>
                        </div>
                        <a href="listing.html" class="stretched-link"></a>
                    </div>
                </div>
                <div class="col">
                    <div class="text-center position-relative border rounded pb-4">
                        <img src="{{ asset('front/assets/img/6.png') }}" class="img-fluid rounded-3 p-3" alt="...">
                        <div class="listing-card-body pt-0">
                            <h6 class="card-title mb-1 fs-14">Breakfast, Snacks</h6>
                            <p class="card-text small text-success">83 Items</p>
                        </div>
                        <a href="listing.html" class="stretched-link"></a>
                    </div>
                </div>
                <div class="col">
                    <div class="text-center position-relative border rounded pb-4">
                        <img src="{{ asset('front/assets/img/7.png') }}" class="img-fluid rounded-3 p-3" alt="...">
                        <div class="listing-card-body pt-0">
                            <h6 class="card-title mb-1 fs-14">Oils & Masalas</h6>
                            <p class="card-text small text-success">564 Items</p>
                        </div>
                        <a href="listing.html" class="stretched-link"></a>
                    </div>
                </div>
                <div class="col">
                    <div class="text-center position-relative border rounded pb-4">
                        <img src="{{ asset('front/assets/img/8.png') }}" class="img-fluid rounded-3 p-3" alt="...">
                        <div class="listing-card-body pt-0">
                            <h6 class="card-title mb-1 fs-14">Pooja Essentials</h6>
                            <p class="card-text small text-success">233 Items</p>
                        </div>
                        <a href="listing.html" class="stretched-link"></a>
                    </div>
                </div>
                <div class="col">
                    <div class="text-center position-relative border rounded pb-4">
                        <img src="{{ asset('front/assets/img/9.png') }}" class="img-fluid rounded-3 p-3" alt="...">
                        <div class="listing-card-body pt-0">
                            <h6 class="card-title mb-1 fs-14">Baby Care</h6>
                            <p class="card-text small text-success">677 Items</p>
                        </div>
                        <a href="listing.html" class="stretched-link"></a>
                    </div>
                </div>
                <div class="col">
                    <div class="text-center position-relative border rounded pb-4">
                        <img src="{{ asset('front/assets/img/10.png') }}" class="img-fluid rounded-3 p-3"
                            alt="...">
                        <div class="listing-card-body pt-0">
                            <h6 class="card-title mb-1 fs-14">Beauty & Hygiene</h6>
                            <p class="card-text small text-success">456 Items</p>
                        </div>
                        <a href="listing.html" class="stretched-link"></a>
                    </div>
                </div>
                <div class="col">
                    <div class="text-center position-relative border rounded pb-4">
                        <img src="{{ asset('front/assets/img/11.png') }}" class="img-fluid rounded-3 p-3"
                            alt="...">
                        <div class="listing-card-body pt-0">
                            <h6 class="card-title mb-1 fs-14">Cleaning</h6>
                            <p class="card-text small text-success">23 Items</p>
                        </div>
                        <a href="listing.html" class="stretched-link"></a>
                    </div>
                </div>
                <div class="col">
                    <div class="text-center position-relative border rounded pb-4">
                        <img src="{{ asset('front/assets/img/12.png') }}" class="img-fluid rounded-3 p-3"
                            alt="...">
                        <div class="listing-card-body pt-0">
                            <h6 class="card-title mb-1 fs-14">Pet Care</h6>
                            <p class="card-text small text-success">866 Items</p>
                        </div>
                        <a href="listing.html" class="stretched-link"></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-white">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-3 col-6">
                    <a href="listing.html"><img src="{{ asset('front/assets/img/slider1.jpg') }}"
                            class="img-fluid rounded-3"></a>
                </div>
                <div class="col-md-3 col-6">
                    <a href="listing.html"><img src="{{ asset('front/assets/img/slider2.jpg') }}"
                            class="img-fluid rounded-3"></a>
                </div>
                <div class="col-md-3 col-6">
                    <a href="listing.html"><img src="{{ asset('front/assets/img/slider3.jpg') }}"
                            class="img-fluid rounded-3"></a>
                </div>
                <div class="col-md-3 col-6">
                    <a href="listing.html"><img src="{{ asset('front/assets/img/slider4.jpg') }}"
                            class="img-fluid rounded-3"></a>
                </div>
            </div>
        </div>
    </section>
    <section id="app-section" class="bg-white py-5 mobile-app-section">
        <div class="container">
            <div class="bg-light rounded px-4 pt-4 px-md-4 pt-md-4 px-lg-5 pt-lg-5 pb-0">
                <div class="row justify-content-center align-items-center app-2 px-lg-4">
                    <div class="col-md-7 px-lg-5">
                        <div class="text-md-start text-center">
                            <h1 class="fw-bold mb-2 text-dark">Get the Eatsie app</h1>
                            <div class="m-0 text-muted">We will send you a link, open it on your phone to download the app
                            </div>
                        </div>
                        <div class="my-4 me-lg-5">
                            <div class="input-group bg-white shadow-sm rounded-pill p-2">
                                <span class="input-group-text bg-white border-0"><i class="bi bi-phone pe-2"></i> +91
                                </span>
                                <input type="text" class="form-control bg-white border-0 ps-0 me-1"
                                    placeholder="Enter phone number">
                                <button class="btn btn-warning rounded-pill py-2 px-4 border-0" type="button">Send app
                                    link</button>
                            </div>
                        </div>
                        <div class="text-md-start text-center mt-5 mt-md-1 pb-md-4 pb-lg-5">
                            <p class="mb-3">Download app from</p>
                            <a href="#/"><img alt="#" src="{{ asset('front/assets/img/play-store') }}.svg"
                                    class="img-fluid mobile-app-icon"></a>
                            <a href="#/"><img alt="#" src="{{ asset('front/assets/img/app-store') }}.svg"
                                    class="img-fluid mobile-app-icon"></a>
                        </div>
                    </div>
                    <div class="col-md-5 pe-lg-5 mt-3 mt-md-0 mt-lg-0">
                        <img alt="#" src="{{ asset('front/assets/img/mobile-app') }}.png" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
