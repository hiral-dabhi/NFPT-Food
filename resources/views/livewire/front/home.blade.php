<div wire:poll.2s>
    <section class="main-banner bg-white pt-4">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h5 class="mb-0 fw-bold">Business</h5>
                <a class="text-decoration-none text-success" href="{{ route('business.list') }}">View All <i
                        class="bi bi-arrow-right-circle-fill ms-1"></i></a>
            </div>
            <div class="row row-cols-2 row-cols-md-4 row-cols-lg-4 g-4">
                @foreach ($restaurants as $key => $value)
                    <div class="col"><a href="{{ route('business.detail', $value->id) }}"><img
                                src="{{ asset('front/images/retaurant.jpg') }}" alt="#"
                                class="img-fluid rounded-3"></a>{{ ucfirst(Crypt::decryptString($value->name)) }}</div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="bg-white">
        <div class="container py-5">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h5 class="mb-0 fw-bold">Explore our Range of Products</h5>
                <a class="text-decoration-none text-success" href="{{ route('business.list') }}">View All <i
                        class="bi bi-arrow-right-circle-fill ms-1"></i></a>
            </div>
            <div class="row row-cols-2 row-cols-md-4 row-cols-lg-6 g-4 homepage-products-range">
                @foreach ($category as $key => $value)
                    <div class="col">
                        <div class="text-center position-relative border rounded pb-4">
                            <img src="{{ asset('front/images/category.jpeg') }}" class="img-fluid rounded-3 p-3"
                                alt="...">
                            <div class="listing-card-body pt-0">
                                <h6 class="card-title mb-1 fs-14">{{ Crypt::decryptString($value->title) }}</h6>
                            </div>
                            <a href="{{ route('business.list', $value->id) }}" class="stretched-link"></a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    {{-- <section class="bg-white">
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
    </section> --}}
    {{-- <section id="app-section" class="bg-white py-5 mobile-app-section">
        <div class="container">
            <div class="bg-light rounded px-4 pt-4 px-md-4 pt-md-4 px-lg-5 pt-lg-5 pb-0">
                <div class="row justify-content-center align-items-center app-2 px-lg-4">
                    <div class="col-md-7 px-lg-5">
                        <div class="text-md-start text-center">
                            <h1 class="fw-bold mb-2 text-dark">Get the Eatsie app</h1>
                            <div class="m-0 text-muted">We will send you a link, open it on your phone to download the
                                app
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
    </section> --}}
</div>
