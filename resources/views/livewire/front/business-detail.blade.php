<div>
    <section class="bg-white">
        <div class="container">
            <div class="row py-3">
                <div class="col-12">
                    <nav>
                        <ol class="breadcrumb small mb-0">
                            <li class="breadcrumb-item"><a href="{{route('front.home')}}"
                                    class="text-decoration-none text-success">Home</a>
                            </li>

                            <li class="breadcrumb-item"><a href="#"
                                    class="text-decoration-none text-success">{{ ucfirst(Crypt::decryptString($business->name)) }}</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <main class="sticky-top ">
        <section class="bg-success">
            <div class="container py-4">
                <div class="row justify-content-between align-items-center">
                    <div class="col-md-6">
                        <div class="d-flex align-items-center listing-detail-info gap-3">
                            <img src="{{ asset('front/images/retaurant.jpg') }}" class="img-fluid rounded-3"
                                alt="...">
                            <div class="listing-detail-info-body">
                                <h3 class="listing-detail-info-title fw-bold mb-1 text-white">
                                    {{ ucfirst(Crypt::decryptString($business->name)) }}</h3>
                                <p class="mb-3 text-white-50">{{$business->description ?? ''}}</p>
                                <div class="d-flex align-items-center gap-4">
                                    <div>
                                        <div class="text-uppercase text-warning-light fw-bold fs-14"><i
                                                class="bi bi-star-fill"></i>
                                            4.0</div>
                                        <p class="text-white-50 small mb-0">1K+ Ratings</p>
                                    </div>
                                    <div>
                                        <div class="text-uppercase text-white fw-bold fs-14">33 mins</div>
                                        <p class="text-white-50 small mb-0">Delivery Time</p>
                                    </div>
                                    <div>
                                        <div class="text-uppercase text-warning-light fw-bold fs-14">Open now</div>
                                        <p class="text-white-50 small mb-0">Opening</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-md-4 d-none d-md-block">
                        <div class="offer-box position-relative bg-white rounded-3 shadow-sm p-4">
                            <small class="offer-box-title fw-bold bg-warning text-white">OFFER</small>
                            <div class="d-flex align-items-center gap-3 mb-3">
                                <i class="bi bi-percent m-0 rounded-pill rounded-icon"></i>
                                <span>
                                    <div class="text-uppercase text-success fw-bold">60% off</div>
                                    <p class="text-muted small mb-0">Up to {{getCurrency()}}120 | Use code MISSEDYOU</p>
                                </span>
                            </div>
                            <div class="d-flex align-items-center gap-3">
                                <i class="bi bi-gift m-0 rounded-pill rounded-icon"></i>
                                <span>
                                    <div class="text-uppercase text-success fw-bold">Free Food</div>
                                    <p class="text-muted small mb-0">Free Laccha Paratha on orders above Rs 349</p>
                                </span>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </section>
    </main>
    <!-- body -->
    <section class="border-bottom bg-light listing-detail-page">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-2">
                    <div class="listing-detail-fixed-sidebar">
                        <div class="nav flex-column listing-detail-tabs mt-3 pb-4" id="v-pills-tab" role="tablist"
                            aria-orientation="vertical">
                            <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill"
                                data-bs-target="#v-pills-home" type="button" role="tab"
                                aria-controls="v-pills-home" aria-selected="true">Recommended</button>
                            @foreach ($category as $key => $value)
                                <button class="nav-link" id="category-{{ $value->id }}-tab" data-bs-toggle="pill"
                                    data-bs-target="#category-{{ $value->id }}" type="button" role="tab"
                                    aria-controls="v-pills-profile category-'{{ $value->id }}"
                                    aria-selected="false">{{ Crypt::decryptString($value->title) }}</button>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="border-start border-end position-relative bg-white">
                        <form class="bg-white border-bottom p-2">
                            <div class="input-group border-0 osahan-search-icon rounded">
                                <span class="input-group-text bg-white border-0"><i class="icofont-search"></i></span>
                                <input type="text" name="search" class="form-control bg-white border-0 ps-2"
                                    placeholder="Search in {{ ucfirst(Crypt::decryptString($business->name)) }}"
                                    wire:model.defer="search">
                                {{-- <input type="text" class="form-control bg-white border-0 ps-2"
                                       wire:model="search" placeholder="Search in {{ ucfirst(Crypt::decryptString($business->name)) }}"> --}}
                            </div>
                        </form>
                        <div class="tab-content" id="v-pills-tabContent">
                            <!-- 1st tab -->
                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                                aria-labelledby="v-pills-home-tab">
                                <div class="bg-light border-bottom p-3">
                                    <h5 class="fw-bold mb-0 text-dark">Recommended</h5>
                                </div>
                                <h6 class="small text-success mb-0 p-3">{{ $menus->count() }} ITEMS</h6>

                                @foreach ($menus as $key => $value)
                                    @php
                                        if (Auth::guard('customer')->check()) {
                                            // Get the cart item for the current product
                                            $cartItem = \Cart::session(Auth::guard('customer')->user()->id)->get(
                                                $value->id,
                                            );
                                        }
                                    @endphp
                                    <div class="product-list d-flex p-3 border-bottom">
                                        @if ($value->image && file_exists(public_path('menu/' . $value->image)))
                                            <img src="{{ asset('menu/' . $value->image) }}" alt="Item Image"
                                                class="img-fluid">
                                        @endif
                                        <div class="product-list-body px-3">
                                            <p class="fw-bold mb-1">{{ Crypt::decryptString($value->title) }}</p>
                                            <p class="mb-1">
                                                Sub Category: {{ ucfirst(Crypt::decryptString($value->subCategoryDetail->title)) }}
                                             </p>
                                             <p class="card-text text-info small mb-1">{{ $value->tag ?? '' }}</p>
                                             <p class="card-text small text-muted mb-2">
                                                 {{ $value->in_stock == '0' ? 'Available' : 'Not Available' }}</p>
                                            <h6 class="fw-bold">{{getCurrency()}}{{ $value->price ?? '0' }}</h6>
                                        </div>
                                        <div class="ms-auto mb-auto">
                                            @if (!empty($cartItem))
                                                <div
                                                    class="d-flex align-items-center justify-content-between rounded-pill border cart-quantity px-1 ms-auto">
                                                    <div class="minus"
                                                        wire:click="decrementQuantity('{{ $cartItem->id }}')">
                                                        <i class="bi bi-dash text-success"></i>
                                                    </div>
                                                    <input class="form-control text-center border-0 py-0 box"
                                                        type="text" value="{{ $cartItem->quantity }}" readonly />
                                                    <div class="plus"
                                                        wire:click="incrementQuantity('{{ $cartItem->id }}')">
                                                        <i class="bi bi-plus text-success"></i>
                                                    </div>
                                                </div>
                                            @else
                                                <button type="button"
                                                    class="btn btn-outline-success btn-sm rounded-pill add-to-cart"
                                                    wire:click="addToCart({{ $value->id }}, '{{ Crypt::decryptString($value->title) }}', {{ $value->price }},{{ $business->id }})">
                                                    <i class="bi bi-plus-lg"></i>&nbsp;ADD
                                                </button>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach

                                <div class="p-3">
                                    <div class="small mb-1"><span><i class="bi bi-newspaper me-2"></i></span>
                                        {{ ucfirst(Crypt::decryptString($business->name)) }}</div>
                                    <div class="text-muted small mb-1"><span><i class="bi bi-coin me-2"></i></span>
                                        {{ Crypt::decryptString($business->userDetail->firstname) . ' ' . Crypt::decryptString($business->userDetail->lastname) }}
                                    </div>
                                    <div class="text-muted small mb-1"><span><i
                                                class="bi bi-geo-alt-fill me-2"></i></span>{{ $business->address }}
                                    </div>
                                    <div class="fw-bold ps-3 ms-1">License No. 23319009001905</div>
                                </div>
                            </div>
                            <!-- 2nd tab -->
                            @foreach ($category as $key => $value)
                                <div class="tab-pane fade" id="category-{{ $value->id }}" role="tabpanel"
                                    aria-labelledby="category-{{ $value->id }}-tab">
                                    <div class="bg-light border-bottom p-3">
                                        <h5 class="fw-bold mb-0 text-dark">{{ Crypt::decryptString($value->title) }}</h5>
                                    </div>
                                    <h6 class="small text-success mb-0 p-3">{{ $value->items->count() }} ITEMS</h6>
                                    @forelse ($value->items as $k => $v)
                                        <div class="product-list d-flex p-3 border-bottom">
                                            @if ($v->image && file_exists(public_path('menu/' . $v->image)))
                                                <img src="{{ asset('menu/' . $v->image) }}" alt="Item Image"
                                                    class="img-fluid">
                                            @endif
                                            {{-- <img src="assets/img/p10.jpg" class="img-fluid" alt="..."> --}}
                                            <div class="product-list-body px-3">
                                                <p class="fw-bold mb-1">{{ ucfirst(Crypt::decryptString($v->title)) }}
                                                </p>
                                                <p class="mb-1">
                                                   Sub Category: {{ ucfirst(Crypt::decryptString($v->subCategoryDetail->title)) }}
                                                </p>
                                                <p class="card-text text-info small mb-1">{{ $v->tag ?? '' }}</p>
                                                <p class="card-text small text-muted mb-2">
                                                    {{ $v->in_stock == '0' ? 'Available' : 'Not Available' }}</p>
                                                <h6 class="fw-bold">{{getCurrency()}}{{ $v->price }}</h6>
                                            </div>
                                            <div
                                                class="d-flex align-items-center justify-content-between rounded-pill border cart-quantity px-1 ms-auto mb-auto">
                                                <div class="ms-auto mb-auto">
                                                    @if (!empty($cartItem))
                                                        <div
                                                            class="d-flex align-items-center justify-content-between rounded-pill border cart-quantity px-1 ms-auto">
                                                            <div class="minus"
                                                                wire:click="decrementQuantity('{{ $cartItem->id }}')">
                                                                <i class="bi bi-dash text-success"></i>
                                                            </div>
                                                            <input class="form-control text-center border-0 py-0 box"
                                                                type="text" value="{{ $cartItem->quantity }}"
                                                                readonly />
                                                            <div class="plus"
                                                                wire:click="incrementQuantity('{{ $cartItem->id }}')">
                                                                <i class="bi bi-plus text-success"></i>
                                                            </div>
                                                        </div>
                                                    @else
                                                        <button type="button"
                                                            class="btn btn-outline-success btn-sm rounded-pill add-to-cart"
                                                            wire:click="addToCart({{ $v->id }}, '{{ Crypt::decryptString($v->title) }}', {{ $v->price }},{{ $business->id }})">
                                                            <i class="bi bi-plus-lg"></i>&nbsp;ADD
                                                        </button>
                                                    @endif

                                                    {{-- @if (!empty($cartItem))
                                                        <!-- If item is in the cart -->
                                                        <div
                                                            class="d-flex align-items-center justify-content-between rounded-pill border cart-quantity px-1 ms-auto">
                                                            <!-- Minus Button -->
                                                            <div class="minus cart-quantity-btn"
                                                                data-id="{{ $cartItem->id }}">
                                                                <i class="bi bi-dash text-success"></i>
                                                            </div>
                                                            <!-- Quantity Input -->
                                                            <input class="form-control text-center border-0 py-0 box"
                                                                type="text" placeholder=""
                                                                aria-label="default input example"
                                                                value="{{ $cartItem->quantity }}" />
                                                            <!-- Plus Button -->
                                                            <div class="plus cart-quantity-btn-plus"
                                                                data-id="{{ $cartItem->id }}">
                                                                <i class="bi bi-plus text-success"></i>
                                                            </div>
                                                        </div>
                                                    @else
                                                        <!-- If item is not in the cart -->
                                                        <button type="button"
                                                            class="btn btn-outline-success btn-sm rounded-pill add-to-cart"
                                                            data-id="{{ $value->id }}"
                                                            data-title="{{ Crypt::decryptString($value->title) }}"
                                                            data-price="{{ $value->price }}">
                                                            <i class="bi bi-plus-lg"></i>&nbsp;ADD
                                                        </button>
                                                    @endif --}}
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="product-list-body px-3">
                                            <p class="fw-bold mb-1">No Items</p>
                                        </div>
                                    @endforelse
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="listing-detail-fixed-sidebar mb-4">
                        @if (!empty($cartItems))
                            <div class="bg-white cart-box border rounded position-relative mt-4 my-cart">
                                <div class="p-3 border-bottom">
                                    <h5 class="mb-0 fw-bold">Your Cart</h5>
                                    <p class="small mb-0">{{ !empty($cartItems) ? $cartItems->count() : '0' }} items
                                        from
                                        <span
                                            class="text-success">{{ ucfirst(Crypt::decryptString($business->name)) }}</span>
                                    </p>
                                </div>
                                <div class="py-2">
                                    @foreach ($cartItems as $item)
                                        <div class="cart-box-item d-flex align-items-center py-2 px-3">
                                            <div class="success-dot"></div>
                                            <div class="cart-box-item-title px-2">
                                                <p class="mb-0">{{ $item->name }}</p>
                                                <p class="small text-muted mb-0">
                                                    {{ $item->attributes['size'] ?? 'N/A' }}
                                                </p>
                                                <!-- Example attribute -->
                                            </div>
                                            <div
                                                class="d-flex align-items-center justify-content-between rounded-pill border cart-quantity px-1 ms-auto">
                                                <div class="minus"
                                                    wire:click="decrementQuantity('{{ $item->id }}')">
                                                    <i class="bi bi-dash text-success"></i>
                                                </div>
                                                <input class="form-control text-center border-0 py-0 box"
                                                    type="text" value="{{ $item->quantity }}" readonly />
                                                <div class="plus"
                                                    wire:click="incrementQuantity('{{ $item->id }}')">
                                                    <i class="bi bi-plus text-success"></i>
                                                </div>
                                            </div>
                                            <div class="cart-box-item-price">
                                                <div class="text-end">{{getCurrency()}}{{ $item->price * $item->quantity }}
                                                </div>
                                                <!-- Display item total price -->
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="d-grid my-4">
                                <a href="{{ route('view.cart') }}" class="btn btn-success btn-lg py-3 px-4">
                                    <div class="d-flex justify-content-between">
                                        <div>Checkout</div>
                                        <div class="fw-bold">{{getCurrency()}}{{ $totalAmount }}</div>
                                        <!-- Display total amount -->
                                    </div>
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
