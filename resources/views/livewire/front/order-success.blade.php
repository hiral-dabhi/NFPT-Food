<div>
    <div class="container py-5">
        <div class="row justify-content-center py-4">
            <div class="col-lg-6 mx-auto text-center">
                <h1 class="display-1 mb-4"><img src="{{ asset('front/assets/img/order-done.gif') }}" alt="Askbootstrap"
                        class="img-fluid h-200 rounded-pill shadow-sm" /> </h1>
                <h1 class="fw-bold">Osahan, Your order has been successful</h1>
                <p>Check your order status in <a href="{{ route('profile') }}"
                        class="fw-bold text-decoration-none text-success">My Orders</a> about next steps information.</p>
                <div class="text-center mt-5 gap-3">
                    <a href="{{ route('front.home') }}" class="btn btn-outline-success btn-lg py-3 px-4 m-2">
                        <i class="bi bi-house me-2"></i> Back to Home
                    </a>
                    <a href="{{ route('profile') }}" class="btn btn-success btn-lg py-3 px-5 m-2">
                        <i class="bi bi-box me-2"></i> My Order
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
