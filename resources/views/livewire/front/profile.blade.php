<div>
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-12">
                <div class="shadow-sm bg-white rounded overflow-hidden border">
                    <div class="p-0">
                        <div class="row px-0 m-0">
                            <div class="col-12 col-md-3 px-0 bg-light">
                                <div class="border-bottom d-flex bg-white border-end align-items-center gap-3 p-4">
                                    <img src="assets/img/team1.jpeg" alt=""
                                        class="img-fluid rounded-circle bg-light h-40">
                                    <span class="text-start">
                                        <p class="mb-0 fw-bold">Askbootstrap</p>
                                        <small class="text-muted"><i class="bi bi-phone"></i> +91 12345-67890</small>
                                    </span>
                                    <span class="ms-auto" data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Edit Profile">
                                        <a data-bs-toggle="modal" data-bs-target="#staticBackdropep"
                                            class="text-decoration-none" href="#"><i
                                                class="bi bi-pencil-square icon-sm"></i></a>
                                    </span>
                                </div>
                                <div class="nav p-4 ps-md-4 py-md-4 pe-md-0 bg-light flex-column delivery-tabs"
                                    id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <button class="nav-link py-3 active" id="v-pills-home-tab" data-bs-toggle="pill"
                                        data-bs-target="#v-pills-home" type="button" role="tab"
                                        aria-controls="v-pills-home" aria-selected="true"><i class="bi bi-list"></i>
                                        Orders List</button>
                                    <button class="nav-link py-3" id="v-pills-profile-tab" data-bs-toggle="pill"
                                        data-bs-target="#v-pills-profile" type="button" role="tab"
                                        aria-controls="v-pills-profile" aria-selected="false"><i
                                            class="bi bi-geo-alt"></i> Addresses</button>
                                    <button class="nav-link py-3" id="v-pills-messages-tab" data-bs-toggle="pill"
                                        data-bs-target="#v-pills-messages" type="button" role="tab"
                                        aria-controls="v-pills-messages" aria-selected="false"><i
                                            class="bi bi-wallet"></i> Manage Payments</button>
                                    <button class="nav-link py-3" id="v-pills-settings-tab" data-bs-toggle="pill"
                                        data-bs-target="#v-pills-settings" type="button" role="tab"
                                        aria-controls="v-pills-settings" aria-selected="false"><i
                                            class="bi bi-cash"></i> Eatsie Cash</button>
                                    <button class="nav-link py-3" id="v-pills-support-tab" data-bs-toggle="pill"
                                        data-bs-target="#v-pills-support" type="button" role="tab"
                                        aria-controls="v-pills-support" aria-selected="false"><i
                                            class="bi bi-question-circle"></i> Support</button>
                                    <button class="nav-link py-3" id="v-pills-about-tab" data-bs-toggle="pill"
                                        data-bs-target="#v-pills-about" type="button" role="tab"
                                        aria-controls="v-pills-about" aria-selected="false"><i class="bi bi-globe"></i>
                                        About</button>
                                    <a href="{{ route('user.logout') }}" class="nav-link py-3"><i
                                            class="bi bi-lock"></i> Logout</a>
                                </div>
                            </div>
                            <div class="col-12 col-md-9 px-0">
                                <!-- 1st tab -->
                                <div class="tab-content" id="v-pills-tabContent">
                                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                                        aria-labelledby="v-pills-home-tab">
                                        <div class="p-4">
                                            <div class="mb-4">
                                                <h5 class="mb-0 fw-bold">Past Orders</h5>
                                            </div>
                                            <div class="row row-cols-1 row-cols-md-1 g-4">
                                                @foreach ($orders as $order)
                                                    <div class="col">
                                                        <div class="border rounded p-3 shadow-sm history-card">
                                                            <div class="d-flex gap-3">
                                                                <!-- Example image, replace src with actual image URL if available -->
                                                                <img src="{{ asset('front/assets/img/list8.jpg') }}"
                                                                    alt=""
                                                                    class="img-fluid rounded bg-light h-40">
                                                                <span class="text-start">
                                                                    <h6 class="mb-1 fw-bold">
                                                                        {{ Crypt::decryptString($order->businessDetail->name) ?? 'Business Name' }}
                                                                    </h6>
                                                                    <div class="text-muted small text-opacity-50 mb-1">
                                                                        {{ $order->businessDetail->type ?? 'Cuisine Type' }}
                                                                    </div>
                                                                    <div class="text-muted small">ORDER
                                                                        #{{ $order->id }} |
                                                                        {{ $order->created_at->format('D, M j, Y, h:i A') }}
                                                                    </div>
                                                                </span>
                                                                <div class="ms-auto text-end">
                                                                    <small><i
                                                                            class="bi bi-check-circle-fill text-success"></i>
                                                                        Delivered on</small>
                                                                    <p class="mb-0 small text-success">
                                                                        {{ $order->updated_at->format('D, M j, Y, h:i A') }}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="d-flex align-items-center gap-3 border-top pt-3 mt-3">
                                                                <span class="text-start">
                                                                    @foreach ($order->itemDetail as $item)
                                                                        <p class="mb-0">
                                                                            {{ Crypt::decryptString($item->menuDetail->title) ?? 'Dish Name' }}
                                                                            x {{ $item->quantity }}</p>
                                                                    @endforeach
                                                                    <p class="mb-0 text-danger">Total Paid:
                                                                        <b>{{getCurrency()}}{{ $order->total_amount }}</b>
                                                                    </p>
                                                                </span>
                                                                <div class="ms-auto text-end">
                                                                    <button
                                                                        class="btn btn-sm btn-outline-success text-uppercase me-2"
                                                                        type="button">REORDER</button>
                                                                        <button wire:click="viewDetails({{ $order->id }})" class="btn btn-sm btn-success text-uppercase"
                                                                           type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                                                                           aria-controls="offcanvasRight">
                                                                           VIEW DETAILS
                                                                       </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                                <div class="p-4">
                                                    <div class="mb-4">
                                                        <h5 class="mb-0 fw-bold">Past Orders</h5>
                                                    </div>
                                                    <div class="row row-cols-1 row-cols-md-1 g-4">
                                                        <div class="col">
                                                            <div class="border rounded p-3 shadow-sm history-card">
                                                                <div class="d-flex gap-3">
                                                                    <img src="assets/img/list8.jpg" alt=""
                                                                        class="img-fluid rounded bg-light h-40">
                                                                    <span class="text-start">
                                                                        <h6 class="mb-1 fw-bold">Deal 4 Grocery</h6>
                                                                        <div
                                                                            class="text-muted small text-opacity-50 mb-1">
                                                                            Cafe, Beverages, Fast
                                                                            Food, Desserts, India</div>
                                                                        <div class="text-muted small">ORDER
                                                                            #124104988300 | Sat, Jan 1, 2022, 03:06
                                                                            PM</div>
                                                                    </span>
                                                                    <div class="ms-auto text-end">
                                                                        <small><i
                                                                                class="bi bi-check-circle-fill text-success"></i>
                                                                            Delivered on
                                                                        </small>
                                                                        <p class="mb-0 small text-success">Sat, Jan 1,
                                                                            2022, 03:46 PM</p>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="d-flex align-items-center gap-3 border-top pt-3 mt-3">
                                                                    <span class="text-start">
                                                                        <p class="mb-0">1 Plate Chana Bhatura (2
                                                                            Pcs)(Served with chana, aloo and
                                                                            pickle) x 2</p>
                                                                        <p class="mb-0 text-danger">Total Paid:
                                                                            <b>{{getCurrency()}}174</b>
                                                                        </p>
                                                                    </span>
                                                                    <div class="ms-auto text-end">
                                                                        <button
                                                                            class="btn btn-sm btn-outline-success text-uppercase me-2"
                                                                            type="button" data-bs-toggle="offcanvas"
                                                                            data-bs-target="#offcanvasRight"
                                                                            aria-controls="offcanvasRight">REORDER</button>
                                                                        <button
                                                                            class="btn btn-sm btn-success text-uppercase"
                                                                            type="button" data-bs-toggle="offcanvas"
                                                                            data-bs-target="#offcanvasRight"
                                                                            aria-controls="offcanvasRight">VIEW
                                                                            DETAILS</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col">
                                                            <button type="button"
                                                                class="btn btn-outline-success btn-lg py-3 px-4 w-100">
                                                                SHOW MORE ORDERS
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <button type="button"
                                                        class="btn btn-outline-success btn-lg py-3 px-4 w-100">
                                                        SHOW MORE ORDERS
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- 2nd tab -->
                                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                                        aria-labelledby="v-pills-profile-tab">
                                        <div class="p-4">
                                            <div class="mb-4">
                                                <h5 class="mb-0 fw-bold">Manage Addresses</h5>
                                            </div>
                                            <div class="btn-group gap-3 osahan-btn-group d-flex" role="group"
                                                aria-label="Basic radio toggle button group">
                                                <input type="radio" class="btn-check" name="btnradio"
                                                    id="btnradio1" autocomplete="off" checked>
                                                <label class="btn btn-outline-light d-flex gap-4 rounded p-4 col-6"
                                                    for="btnradio1">
                                                    <i class="bi bi-house h5 mb-0"></i>
                                                    <span class="text-start">
                                                        <h6 class="mb-1 fw-bold">Home</h6>
                                                        <div class="text-muted small text-opacity-50 mb-4">925 S
                                                            Chugach St #APT 10,
                                                            Palmer, Alaska 99645, USA</div>
                                                        <a data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                                                            class="fw-bold text-success text-decoration-none text-uppercase me-3"
                                                            href="#">Edit</a>
                                                        <a data-bs-toggle="modal" data-bs-target="#trashpop"
                                                            class="fw-bold text-danger text-decoration-none text-uppercase"
                                                            href="#">DELETE</a>
                                                    </span>
                                                    <i class="bi bi-check-circle-fill ms-auto"></i>
                                                </label>
                                                <input type="radio" class="btn-check" name="btnradio"
                                                    id="btnradio2" autocomplete="off">
                                                <label class="btn btn-outline-light d-flex gap-4 rounded p-4 col-6"
                                                    for="btnradio2">
                                                    <i class="bi bi-building h5 mb-0"></i>
                                                    <span class="text-start">
                                                        <h6 class="mb-1 fw-bold">Work</h6>
                                                        <div class="text-muted small text-opacity-50 mb-4">Pune, 2336
                                                            Jack Warren Rd,
                                                            Delta Junction, Alaska, USA</div>
                                                        <a data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                                                            class="fw-bold text-success text-decoration-none text-uppercase me-3"
                                                            href="#">Edit</a>
                                                        <a data-bs-toggle="modal" data-bs-target="#trashpop"
                                                            class="fw-bold text-danger text-decoration-none text-uppercase"
                                                            href="#">DELETE</a>
                                                    </span>
                                                    <i class="bi bi-check-circle-fill ms-auto"></i>
                                                </label>
                                            </div>
                                            <div class="btn-group gap-3 osahan-btn-group d-flex my-3" role="group"
                                                aria-label="Basic radio toggle button group">
                                                <input type="radio" class="btn-check" name="btnradio"
                                                    id="btnradio13" autocomplete="off" checked>
                                                <label class="btn btn-outline-light d-flex gap-4 rounded p-4 col-6"
                                                    for="btnradio13">
                                                    <i class="bi bi-geo-alt h5 mb-0"></i>
                                                    <span class="text-start">
                                                        <h6 class="mb-1 fw-bold">Other</h6>
                                                        <div class="text-muted small text-opacity-50 mb-4">Kalyani
                                                            Yukon Rd, Kasilof,
                                                            Alaska 99610, Maharashtra</div>
                                                        <a data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                                                            class="fw-bold text-success text-decoration-none text-uppercase me-3"
                                                            href="#">Edit</a>
                                                        <a data-bs-toggle="modal" data-bs-target="#trashpop"
                                                            class="fw-bold text-danger text-decoration-none text-uppercase"
                                                            href="#">DELETE</a>
                                                    </span>
                                                    <i class="bi bi-check-circle-fill ms-auto"></i>
                                                </label>
                                                <input type="radio" class="btn-check" name="btnradio"
                                                    id="btnradio23" autocomplete="off">
                                                <label class="btn btn-outline-light d-flex gap-4 rounded p-4 col-6"
                                                    for="btnradio23">
                                                    <i class="bi bi-geo-alt h5 mb-0"></i>
                                                    <span class="text-start">
                                                        <h6 class="mb-1 fw-bold">Other</h6>
                                                        <div class="text-muted small text-opacity-50 mb-4">Maharashtra
                                                            Lanark Dr,
                                                            Wasilla, Alaska 99654</div>
                                                        <a data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                                                            class="fw-bold text-success text-decoration-none text-uppercase me-3"
                                                            href="#">Edit</a>
                                                        <a data-bs-toggle="modal" data-bs-target="#trashpop"
                                                            class="fw-bold text-danger text-decoration-none text-uppercase"
                                                            href="#">DELETE</a>
                                                    </span>
                                                    <i class="bi bi-check-circle-fill ms-auto"></i>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- 3rd tab -->
                                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel"
                                        aria-labelledby="v-pills-messages-tab">
                                        <div class="p-4">
                                            <div class="mb-4">
                                                <h5 class="mb-0 fw-bold">Payments</h5>
                                            </div>
                                            <div class="row row-cols-1 row-cols-md-2 g-4">
                                                <div class="col">
                                                    <div class="border rounded d-flex gap-3 p-4">
                                                        <img src="assets/img/payment2.png" alt=""
                                                            class="img-fluid rounded-circle bg-light h-40">
                                                        <span class="text-start">
                                                            <h6 class="mb-1 fw-bold">4691-XXXXXXXX-8449</h6>
                                                            <div class="text-muted small text-opacity-50 mb-3">VALID
                                                                TILL 02/2024</div>
                                                            <a data-bs-toggle="modal" data-bs-target="#trashpop"
                                                                class="fw-bold text-danger text-decoration-none text-uppercase"
                                                                href="#">DELETE</a>
                                                        </span>
                                                        <i class="bi bi-check-circle-fill ms-auto"></i>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="border rounded d-flex gap-3 p-4">
                                                        <img src="assets/img/payment3.png" alt=""
                                                            class="img-fluid rounded-circle bg-light h-40">
                                                        <span class="text-start">
                                                            <h6 class="mb-1 fw-bold">6070-XXXXXXXX-0666</h6>
                                                            <div class="text-muted small text-opacity-50 mb-3">VALID
                                                                TILL 10/2025</div>
                                                            <a data-bs-toggle="modal" data-bs-target="#trashpop"
                                                                class="fw-bold text-danger text-decoration-none text-uppercase"
                                                                href="#">DELETE</a>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="border rounded d-flex gap-3 p-4">
                                                        <img src="assets/img/payment1.png" alt=""
                                                            class="img-fluid rounded-circle bg-light h-40">
                                                        <span class="text-start">
                                                            <h6 class="mb-1 fw-bold">yourupiid@okaxis</h6>
                                                            <div class="text-muted small text-opacity-50 mb-3">Saved
                                                                UPI Addresses</div>
                                                            <a data-bs-toggle="modal" data-bs-target="#trashpop"
                                                                class="fw-bold text-danger text-decoration-none text-uppercase"
                                                                href="#">DELETE</a>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- 4rth tab -->
                                    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel"
                                        aria-labelledby="v-pills-settings-tab">
                                        <div class="p-4">
                                            <div class="mb-4">
                                                <h5 class="mb-0 fw-bold">Eatsie Cash</h5>
                                            </div>
                                            <div class="row row-cols-1 row-cols-md-1 g-4">
                                                <div class="col">
                                                    <div class="border rounded d-flex gap-3 p-4">
                                                        <img src="assets/img/login3.png" alt=""
                                                            class="img-fluid rounded-circle birder bg-light h-40">
                                                        <span class="text-start">
                                                            <h6 class="mb-1 fw-bold">You got {{getCurrency()}}50.0 Eatsie Cash!</h6>
                                                            <div class="text-muted small text-opacity-50 mb-3">use this
                                                                Eatsie Cash to
                                                                save on your next orders</div>
                                                            <a class="fw-bold btn btn-sm btn-success text-uppercase"
                                                                href="listing.html">Tap to order</a>
                                                        </span>
                                                        <div class="ms-auto text-end">
                                                            <small>Expire In</small>
                                                            <p class="mb-0 small text-success">6d:23h</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- 5th tab -->
                                    <div class="tab-pane fade" id="v-pills-support" role="tabpanel"
                                        aria-labelledby="v-pills-support-tab">
                                        <div class="p-4">
                                            <div class="mb-4">
                                                <h5 class="mb-0 fw-bold">Support</h5>
                                            </div>
                                            <div class="mb-4">
                                                <h6 class="fw-bold">Term and Termination</h6>
                                                <p class="text-muted">Either It is a long established fact that a
                                                    reader will be
                                                    distracted by the readable content of a page when looking at its
                                                    layout. The point
                                                    of using Lorem Ipsum is that it has a more-or-less normal
                                                    distribution of letters,
                                                    as opposed to using 'Content here, content here', making it look
                                                    like readable
                                                    English. Many desktop publishing packages and web page editors now
                                                    use Lorem Ipsum
                                                    as their default model text, and a search for 'lorem ipsum' will
                                                    uncover many web
                                                    sites still in their infancy. Various versions have evolved over the
                                                    years,
                                                    sometimes by accident, sometimes on purpose (injected humour and the
                                                    like).
                                                </p>
                                            </div>
                                            <div class="mb-4">
                                                <h6 class="fw-bold">Relationship</h6>
                                                <p class="text-muted">Contrary to popular belief, Lorem Ipsum is not
                                                    simply random
                                                    text. It has roots in a piece of classical Latin literature from 45
                                                    BC, making it
                                                    over 2000 years old. Richard McClintock, a Latin professor at
                                                    Hampden-Sydney College
                                                    in Virginia, looked up one of the more obscure Latin words,
                                                    consectetur, from a
                                                    Lorem Ipsum passage, and going through the cites.</p>
                                            </div>
                                            <div class="mb-4">
                                                <h6 class="fw-bold">Notice</h6>
                                                <p class="text-muted mb-2">All notices under these Terms shall be sent
                                                    by registered
                                                    post acknowledgment due, contemporaneous courier or email to the
                                                    address mentioned
                                                    below: </p>
                                                <div class="text-muted">
                                                    <div class="fw-bold">Eatsie.</div>
                                                    <p>Reg Office: 5665, 20th Main Road, HAL 2nd Stage, Bengaluru,
                                                        Karnataka 565656554
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- 6th tab -->
                                    <div class="tab-pane fade" id="v-pills-about" role="tabpanel"
                                        aria-labelledby="v-pills-about-tab">
                                        <div class="p-4">
                                            <div class="mb-4">
                                                <h5 class="mb-0 fw-bold">About Us</h5>
                                            </div>
                                            <div class="mb-4">
                                                <h6 class="fw-bold">You now have the power to move things</h6>
                                                <p class="text-muted">There are many variations of passages of Lorem
                                                    Ipsum available,
                                                    but the majority have suffered alteration in some form, by injected
                                                    humour, or
                                                    randomised words which don't look even slightly believable.</p>
                                            </div>
                                            <div class="mb-4">
                                                <h6 class="fw-bold">Relationship</h6>
                                                <p class="text-muted">The standard chunk of Lorem Ipsum used since the
                                                    1500s is
                                                    reproduced below for those interested. Sections 1.10.32 and 1.10.33
                                                    from "de Finibus
                                                    Bonorum et Malorum" by Cicero are also reproduced in their exact
                                                    original form,
                                                    accompanied by English versions from the 1914 translation by H.
                                                    Rackham.</p>
                                            </div>
                                            <div class="mb-4">
                                                <h6 class="fw-bold">Notice</h6>
                                                <p class="text-muted mb-2">Internet tend to repeat predefined chunks as
                                                    necessary,
                                                    making this the first true generator on the Internet. It uses a
                                                    dictionary. </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
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
                                        <h5 class="mb-2 fw-bold">Hey! what’s your number?</h5>
                                        <p class="text-muted mb-0">Please login with this number the next time you
                                            sign-in</p>
                                    </div>
                                    <form>
                                        <div class="input-group bg-white border rounded mb-3 p-2">
                                            <span class="input-group-text bg-white border-0"><i
                                                    class="bi bi-phone pe-2"></i> +91 </span>
                                            <input type="text" class="form-control bg-white border-0 ps-0"
                                                placeholder="Enter phone number">
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label small text-muted border-end pe-1"
                                                for="exampleCheck1">I accept the Terms of use & Privacy Policy</label>
                                            <a href="#" class="text-decoration-none text-success small">View T&C
                                                <i class="bi bi-chevron-right"></i></a>
                                        </div>
                                    </form>
                                    <button class="btn btn-success btn-lg py-3 px-4 text-uppercase w-100 mt-4"
                                        data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Get OTP <i
                                            class="bi bi-arrow-right ms-2"></i></button>
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
                        <div class="mb-3"><img src="assets/img/login2.png" class="col-6 mx-auto" alt="">
                        </div>
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
                            <div class="mb-5"><img src="assets/img/login3.png" alt=""
                                    class="col-6 mx-auto"></div>
                            <div class="my-3">
                                <h5 class="fw-bold">You got {{getCurrency()}}50.0 Eatsie Cash!</h5>
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
    <div class="modal fade" id="add-delivery-location" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow">
                <div class="modal-header px-4">
                    <h5 class="h6 modal-title fw-bold">Add Your Location</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <form>
                        <div class="input-group border p-1 overflow-hidden osahan-search-icon shadow-sm rounded mb-3">
                            <span class="input-group-text bg-white border-0"><i class="icofont-search"></i></span>
                            <input type="text" class="form-control bg-white border-0 ps-0"
                                placeholder="Search for area, location name">
                        </div>
                    </form>
                    <div class="mb-4">
                        <a href="#" data-bs-dismiss="modal" aria-label="Close"
                            class="text-success d-flex gap-2 text-decoration-none fw-bold">
                            <i class="bi bi-compass text-success"></i>
                            <div>Use Current Location</div>
                        </a>
                    </div>
                    <div class="text-muted text-uppercase small">Search Results</div>
                    <div>
                        <div data-bs-dismiss="modal" aria-label="Close"
                            class="d-flex align-items-center gap-3 border-bottom py-3">
                            <i class="icofont-search h6"></i>
                            <div>
                                <p class="mb-1 fw-bold">Bangalore</p>
                                <p class="text-muted small m-0">Karnataka, India</p>
                            </div>
                        </div>
                        <div data-bs-dismiss="modal" aria-label="Close"
                            class="d-flex align-items-center gap-3 border-bottom py-3">
                            <i class="icofont-search h6"></i>
                            <div>
                                <p class="mb-1 fw-bold">Bangalore internaltional airport</p>
                                <p class="text-muted small m-0">Karmpegowda.in't Airport, Hunachur, karnataka, India
                                </p>
                            </div>
                        </div>
                        <div data-bs-dismiss="modal" aria-label="Close"
                            class="d-flex align-items-center gap-3 border-bottom py-3">
                            <i class="icofont-search h6"></i>
                            <div>
                                <p class="mb-1 fw-bold">Railway Station back gate</p>
                                <p class="text-muted small m-0">M.G. Railway Colony, Majestic, Bangaluru, Karnataka.
                                </p>
                            </div>
                        </div>
                        <div data-bs-dismiss="modal" aria-label="Close"
                            class="d-flex align-items-center gap-3 border-bottom py-3">
                            <i class="icofont-search h6"></i>
                            <div>
                                <p class="mb-1 fw-bold">Bangalore Cant</p>
                                <p class="text-muted small m-0">Cantonent Railway Station Road, Contonment Railway.</p>
                            </div>
                        </div>
                        <div data-bs-dismiss="modal" aria-label="Close" class="d-flex align-items-center gap-3 py-3">
                            <i class="icofont-search h6"></i>
                            <div>
                                <p class="mb-1 fw-bold">Bangalore Contonement Railway Station</p>
                                <p class="text-muted small m-0">Contonement Railway Quarters, Shivaji nagar.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Edit profile Model -->
    <div class="modal fade" id="staticBackdropep" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow overflow-hidden">
                <div class="modal-header px-4">
                    <h5 class="h6 modal-title fw-bold">Edit Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <form>
                        <div class="mb-3">
                            <label for="exampleInputName1" class="form-label">Your Name</label>
                            <input type="text" class="form-control" id="exampleInputName1"
                                aria-describedby="textHelp" placeholder="e.g. Rahul Mishra">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputNo1" class="form-label">Phone Number</label>
                            <input type="number" class="form-control" id="exampleInputNo1"
                                aria-describedby="numberHelp" placeholder="123456789">
                        </div>
                        <div>
                            <label for="exampleInputEmail1" class="form-label">Email ID</label>
                            <input type="email" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="e.g. example@gmail.com">
                        </div>
                    </form>
                </div>
                <div class="border-top d-flex">
                    <button type="button" class="w-100 btn btn-lg py-4 border-0 btn-outline-success rounded-0"
                        data-bs-dismiss="modal">CANCEL</button>
                    <button type="button" class="w-100 btn btn-lg py-4 border-0 btn-success rounded-0"
                        data-bs-dismiss="modal">SAVE</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Drop detail change modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow overflow-hidden">
                <div class="modal-header px-4">
                    <h5 class="h6 modal-title fw-bold">Add Drop Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="bg-light rounded overflow-hidden border mb-4">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d54776.1744782857!2d75.8216539883091!3d30.900340484153784!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391a837462345a7d%3A0x681102348ec60610!2sLudhiana%2C%20Punjab!5e0!3m2!1sen!2sin!4v1659863868963!5m2!1sen!2sin"
                            width="100%" height="150" class="border-0" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                        <div class="p-3">
                            <div class="d-flex align-items-center gap-3">
                                <i class="bi bi-pin-map h5 mb-0"></i>
                                <span class="text-start">
                                    <h6 class="mb-1 fw-bold">Selected Location</h6>
                                    <div class="text-muted small text-opacity-50">925 S Chugach St #APT 10, Palmer,
                                        Alaska 99645, USA</div>
                                </span>
                                <i class="bi bi-check-circle-fill ms-auto"></i>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label class="form-label">Flat, Floor, Building Name</label>
                            <div class="input-group rounded overflow-hidden border">
                                <span class="input-group-text bg-white border-0"><i
                                        class="bi bi-house-door-fill text-muted"></i></span>
                                <input type="text" class="form-control bg-white border-0 ps-1"
                                    placeholder="e.g., 123, Eatsie" aria-label="Username"
                                    aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="col-6 mb-3">
                            <label class="form-label">How to Reach (Optoinal)</label>
                            <div class="input-group rounded overflow-hidden border">
                                <span class="input-group-text bg-white border-0"><i
                                        class="bi bi-map-fill text-muted"></i></span>
                                <input type="text" class="form-control bg-white border-0 ps-1"
                                    placeholder="e.g. Take Left" aria-label="Username"
                                    aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="col-6 mb-3">
                            <label class="form-label">Contact Person Name</label>
                            <div class="input-group rounded overflow-hidden border">
                                <span class="input-group-text bg-white border-0"><i
                                        class="bi bi-person-fill text-muted"></i></span>
                                <input type="text" class="form-control bg-white border-0 ps-1"
                                    placeholder="e.g. Nikhal" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="col-6 mb-3">
                            <label class="form-label">Contact Number</label>
                            <div class="input-group rounded overflow-hidden border">
                                <span class="input-group-text bg-white border-0"><i
                                        class="bi bi-telephone-fill text-muted"></i></span>
                                <input type="text" class="form-control bg-white border-0 ps-1"
                                    placeholder="e.g. 12345678" aria-label="Username"
                                    aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Save Address As</label>
                            <div class="row">
                                <div class="col-auto"><input type="radio" class="btn-check" name="btnradio"
                                        id="btnradio133" autocomplete="off">
                                    <label class="btn btn-outline-secondary" for="btnradio133">Home</label>
                                </div>
                                <div class="col-auto px-0"><input type="radio" class="btn-check" name="btnradio"
                                        id="btnradio233" autocomplete="off">
                                    <label class="btn btn-outline-secondary" for="btnradio233">Office</label>
                                </div>
                                <div class="col-auto"><input type="radio" class="btn-check" name="btnradio"
                                        id="btnradio333" autocomplete="off">
                                    <label class="btn btn-outline-secondary" for="btnradio333">Other</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="border-top d-flex">
                    <button type="button" class="w-100 btn btn-lg py-4 border-0 btn-outline-success rounded-0"
                        data-bs-dismiss="modal">CLOSE</button>
                    <button type="button" class="w-100 btn btn-lg py-4 border-0 btn-success rounded-0"
                        data-bs-dismiss="modal">SAVE ADDRESS</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="trashpop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content border-0 shadow overflow-hidden">
                <div class="modal-body p-4 text-center">
                    <i class="bi bi-trash display-1 mb-4"></i>
                    <h5 class="m-0">Are you sure you want to delete this address?</h5>
                </div>
                <div class="border-top d-flex">
                    <button type="button" class="w-100 btn btn-lg py-3 border-0 btn-outline-danger rounded-0"
                        data-bs-dismiss="modal">CANCEL</button>
                    <button type="button" class="w-100 btn btn-lg py-3 border-0 btn-danger rounded-0"
                        data-bs-dismiss="modal">DELETE</button>
                </div>
            </div>
        </div>
    </div>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header border-bottom px-4">
            <h6 class="offcanvas-title fw-bold" id="offcanvasRightLabel">
                Order #{{ $selectedOrder['id'] ?? 'N/A' }}
            </h6>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body p-4">
            @if ($selectedOrder)
                <div class="mb-3 d-flex gap-3">
                    <i class="bi bi-geo-alt h5 mb-0"></i>
                    <span class="text-start">
                        <h6 class="mb-0 fw-bold">
                            {{ Crypt::decryptString($selectedOrder['businessDetail']['name']) ?? 'Restaurant' }}</h6>
                        <div class="text-muted small text-opacity-50">
                            {{ $selectedOrder['businessDetail']['address'] ?? 'Address' }}
                        </div>
                    </span>
                </div>

                <div class="bg-white cart-box border rounded position-relative mb-3">
                    <div class="p-3 border-bottom">
                        <p class="small mb-0">Items from <span
                                class="text-success">{{ Crypt::decryptString($selectedOrder['businessDetail']['name']) }}</span>
                        </p>
                    </div>
                    <div class="py-2">
                        @foreach ($selectedOrder['itemDetail'] as $item)
                            <div class="cart-box-item d-flex align-items-center py-2 px-3">
                                <div class="success-dot"></div>
                                <div class="cart-box-item-title px-2">
                                    <p class="mb-0">
                                        {{ Crypt::decryptString($item['menuDetail']['title']) ?? 'Dish' }}</p>
                                    <p class="small text-muted mb-0">{{ $item['quantity'] }} x {{getCurrency()}}{{ $item['price'] }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="accordion-body border p-3 rounded">
                    <div class="d-flex justify-content-between align-items-center pb-1">
                        <div class="text-muted">Total Amount</div>
                        <div class="text-dark">{{getCurrency()}}{{ $selectedOrder['total_amount'] }}</div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
</div>
