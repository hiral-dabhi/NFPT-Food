@extends('front.layouts.app')
@section('title')
    {{ __('Home') }}
@endsection
@section('content')
    <div class="container py-3">
        <div class="row">
            <div class="col-12">
                <nav>
                    <ol class="breadcrumb small mb-0">
                        <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-success">Home</a></li>
                        <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-success">Punjab</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Groceries & Essentials</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="bg-white">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="py-5 d-flex align-items-center gap-4">
                        <div class="d-none d-md-block"><img alt="#" src="assets/img/grocery.png"
                                class="img-fluid ch-100 rounded-pill bg-light p-4"></div>
                        <div class="text-md-start text-center">
                            <h2 class="mb-2 fw-bold">Groceries & Essentials in Bangalore</h2>
                            <p class="lead m-0"><i class="bi bi-shop me-2"></i> 197 Stores</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Body -->
    <div class="container py-5">
        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-4">
            @foreach ($restaurants as $key => $value)
                <div class="col">
                    <div class="bg-white listing-card shadow-sm rounded-3 p-3 position-relative">
                        <img src="{{ asset('front/images/retaurant.jpg') }}" class="img-fluid rounded-3" alt="...">
                        <div class="listing-card-body pt-3">
                            <h6 class="card-title fw-bold mb-1">{{ ucfirst(Crypt::decryptString($value->name)) }}</h6>
                            <p class="card-text text-muted mb-2">{{ $value->address }}</p>
                            <p class="card-text text-muted">2.9 km</p>
                        </div>
                        <a href="{{ route('business.detail', $value->id) }}" class="stretched-link"></a>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- pagination -->
        {{-- <div class="text-center mt-5">
            <div class="spinner-border" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
            <p class="mb-0 mt-2">Loading</p>
        </div> --}}
    </div>
@endsection
@section('scripts')
    <script>
        console.log('hereee');
    </script>
@endsection