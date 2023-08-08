@extends('app')
@section('content')
    <div class="page-title-overlap bg-dark pt-4">
        <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
            <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
                        <li class="breadcrumb-item"><a class="text-nowrap" href="/"><i class="ci-home"></i>Home</a>
                        </li>
                        <li class="breadcrumb-item text-nowrap"><a href="#">Shop</a>
                        </li>
                        <li class="breadcrumb-item text-nowrap active" aria-current="page">Product Page</li>
                    </ol>
                </nav>
            </div>
            <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
                <h1 class="h3 text-light mb-2">{{ $products_detail->nameProducts }}</h1>
                <div>
                    <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i
                            class="star-rating-icon ci-star-filled active"></i><i
                            class="star-rating-icon ci-star-filled active"></i><i
                            class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star"></i>
                    </div><span class="d-inline-block fs-sm text-white opacity-70 align-middle mt-1 ms-1">74 Reviews</span>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="bg-light shadow-lg rounded-3">
            <!-- Tabs-->
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item"><a class="nav-link py-4 px-sm-4 active" href="#general" data-bs-toggle="tab"
                        role="tab">General <span class='d-none d-sm-inline'>Info</span></a></li>
                <li class="nav-item"><a class="nav-link py-4 px-sm-4" href="#reviews" data-bs-toggle="tab"
                        role="tab">Reviews <span class="fs-sm opacity-60">(74)</span></a></li>
            </ul>
            <div class="px-4 pt-lg-3 pb-3 mb-5">
                <div class="tab-content px-lg-3">
                    <!-- General info tab-->
                    <div class="tab-pane fade show active" id="general" role="tabpanel">
                        <div class="row">
                            <!-- Product gallery-->
                            <div class="col-lg-7 pe-lg-0">
                                <div class="product-gallery">
                                    <div class="product-gallery-preview order-sm-2">
                                        <img src="{{ $products_detail->imgProducts }}" alt="">
                                    </div>

                                </div>
                            </div>
                            <!-- Product details-->
                            <div class="col-lg-5 pt-4 pt-lg-0">
                                <div class="product-details ms-auto pb-3">
                                    <div class="h3 fw-normal text-accent mb-3 me-1">
                                        {{ number_format($products_detail->priceProducts, 0, ',', '.') }} VNĐ</div>

                                    <div class="position-relative me-n4 mb-3">
                                        <div class="form-check form-option form-check-inline mb-2">
                                            <div class="product-badge product-available mt-n1 mb-2"><i
                                                class="ci-security-check"></i>Product available</div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center pt-2 pb-4">

                                        <a href="{{ route('addToCart', $products_detail->id) }}"
                                            class="btn btn-primary btn-shadow d-block w-100" type="button"><i
                                                class="ci-cart fs-lg me-2"></i>Add to Cart</a>
                                    </div>
                                    <div class="d-flex mb-4">
                                        <div class="w-100 me-3">
                                            <button class="btn btn-secondary d-block w-100" type="button"><i
                                                    class="ci-heart fs-lg me-2"></i><span class='d-none d-sm-inline'>Add
                                                    to </span>Wishlist</button>
                                        </div>
                                        <div class="w-100">
                                            <button class="btn btn-secondary d-block w-100" type="button"><i
                                                    class="ci-compare fs-lg me-2"></i>Compare</button>
                                        </div>
                                    </div>
                                    <!-- Product panels-->
                                    <div class="accordion mb-4" id="productPanels">
                                        <div class="accordion-item">
                                            <h3 class="accordion-header"><a class="accordion-button"
                                                    href="#shippingOptions" role="button" data-bs-toggle="collapse"
                                                    aria-expanded="true" aria-controls="shippingOptions"><i
                                                        class="ci-delivery text-muted lead align-middle mt-n1 me-2"></i>Shipping
                                                    options</a></h3>
                                            <div class="accordion-collapse collapse show" id="shippingOptions"
                                                data-bs-parent="#productPanels">
                                                <div class="accordion-body fs-sm">
                                                    <div class="d-flex justify-content-between border-bottom pb-2">
                                                        <div>
                                                            <div class="fw-semibold text-dark">Local courier shipping</div>
                                                            <div class="fs-sm text-muted">2 - 4 days</div>
                                                        </div>
                                                        <div>$16.50</div>
                                                    </div>
                                                    <div class="d-flex justify-content-between border-bottom py-2">
                                                        <div>
                                                            <div class="fw-semibold text-dark">UPS ground shipping</div>
                                                            <div class="fs-sm text-muted">4 - 6 days</div>
                                                        </div>
                                                        <div>$19.00</div>
                                                    </div>
                                                    <div class="d-flex justify-content-between pt-2">
                                                        <div>
                                                            <div class="fw-semibold text-dark">Local pickup from store
                                                            </div>
                                                            <div class="fs-sm text-muted">&mdash;</div>
                                                        </div>
                                                        <div>$0.00</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h3 class="accordion-header"><a class="accordion-button collapsed"
                                                    href="#localStore" role="button" data-bs-toggle="collapse"
                                                    aria-expanded="true" aria-controls="localStore"><i
                                                        class="ci-location text-muted fs-lg align-middle mt-n1 me-2"></i>Find
                                                    in local store</a></h3>
                                            <div class="accordion-collapse collapse" id="localStore"
                                                data-bs-parent="#productPanels">
                                                <div class="accordion-body">
                                                    <select class="form-select">
                                                        <option value>Select your country</option>
                                                        <option value="Argentina">Argentina</option>
                                                        <option value="Belgium">Belgium</option>
                                                        <option value="France">France</option>
                                                        <option value="Germany">Germany</option>
                                                        <option value="Spain">Spain</option>
                                                        <option value="UK">United Kingdom</option>
                                                        <option value="USA">USA</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Sharing-->
                                    <label class="form-label d-inline-block align-middle my-2 me-3">Share:</label><a
                                        class="btn-share btn-twitter me-2 my-2" href="#"><i
                                            class="ci-twitter"></i>Twitter</a><a class="btn-share btn-instagram me-2 my-2"
                                        href="#"><i class="ci-instagram"></i>Instagram</a><a
                                        class="btn-share btn-facebook my-2" href="#"><i
                                            class="ci-facebook"></i>Facebook</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Reviews tab-->
                    <div class="tab-pane fade" id="reviews" role="tabpanel">
                        <div class="d-md-flex justify-content-between align-items-start pb-4 mb-4 border-bottom">
                            <div class="d-flex align-items-center me-md-3"><img
                                    src="https://cartzilla.createx.studio/img/shop/single/gallery/th05.jpg" width="90"
                                    alt="Product thumb">
                                <div class="ps-3">
                                    <h6 class="fs-base mb-2">Smartwatch Youth Edition</h6>
                                    <div class="h4 fw-normal text-accent">$124.<small>99</small></div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center pt-3">
                                <a href="{{ route('addToCart', $products_detail->slug) }}"
                                    class="btn btn-primary btn-shadow me-2" type="button"><i
                                        class="ci-cart fs-lg me-sm-2"></i><span class="d-none d-sm-inline">Add to
                                        Cart</span></a>
                                <div class="me-2">
                                    <button class="btn btn-secondary btn-icon" type="button" data-bs-toggle="tooltip"
                                        title="Add to Wishlist"><i class="ci-heart fs-lg"></i></button>
                                </div>
                                <div>
                                    <button class="btn btn-secondary btn-icon" type="button" data-bs-toggle="tooltip"
                                        title="Compare"><i class="ci-compare fs-lg"></i></button>
                                </div>
                            </div>
                        </div>
                        <!-- Reviews-->
                        <div class="row pt-2 pb-3">
                            <div class="col-lg-4 col-md-5">
                                <h2 class="h3 mb-4">74 Reviews</h2>
                                <div class="star-rating me-2"><i class="ci-star-filled fs-sm text-accent me-1"></i><i
                                        class="ci-star-filled fs-sm text-accent me-1"></i><i
                                        class="ci-star-filled fs-sm text-accent me-1"></i><i
                                        class="ci-star-filled fs-sm text-accent me-1"></i><i
                                        class="ci-star fs-sm text-muted me-1"></i></div><span
                                    class="d-inline-block align-middle">4.1 Overall rating</span>
                                <p class="pt-3 fs-sm text-muted">58 out of 74 (77%)<br>Customers recommended this product
                                </p>
                            </div>
                            <div class="col-lg-8 col-md-7">
                                <div class="d-flex align-items-center mb-2">
                                    <div class="text-nowrap me-3"><span
                                            class="d-inline-block align-middle text-muted">5</span><i
                                            class="ci-star-filled fs-xs ms-1"></i></div>
                                    <div class="w-100">
                                        <div class="progress" style="height: 4px;">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 60%;"
                                                aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div><span class="text-muted ms-3">43</span>
                                </div>
                                <div class="d-flex align-items-center mb-2">
                                    <div class="text-nowrap me-3"><span
                                            class="d-inline-block align-middle text-muted">4</span><i
                                            class="ci-star-filled fs-xs ms-1"></i></div>
                                    <div class="w-100">
                                        <div class="progress" style="height: 4px;">
                                            <div class="progress-bar" role="progressbar"
                                                style="width: 27%; background-color: #a7e453;" aria-valuenow="27"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div><span class="text-muted ms-3">16</span>
                                </div>
                                <div class="d-flex align-items-center mb-2">
                                    <div class="text-nowrap me-3"><span
                                            class="d-inline-block align-middle text-muted">3</span><i
                                            class="ci-star-filled fs-xs ms-1"></i></div>
                                    <div class="w-100">
                                        <div class="progress" style="height: 4px;">
                                            <div class="progress-bar" role="progressbar"
                                                style="width: 17%; background-color: #ffda75;" aria-valuenow="17"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div><span class="text-muted ms-3">9</span>
                                </div>
                                <div class="d-flex align-items-center mb-2">
                                    <div class="text-nowrap me-3"><span
                                            class="d-inline-block align-middle text-muted">2</span><i
                                            class="ci-star-filled fs-xs ms-1"></i></div>
                                    <div class="w-100">
                                        <div class="progress" style="height: 4px;">
                                            <div class="progress-bar" role="progressbar"
                                                style="width: 9%; background-color: #fea569;" aria-valuenow="9"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div><span class="text-muted ms-3">4</span>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="text-nowrap me-3"><span
                                            class="d-inline-block align-middle text-muted">1</span><i
                                            class="ci-star-filled fs-xs ms-1"></i></div>
                                    <div class="w-100">
                                        <div class="progress" style="height: 4px;">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 4%;"
                                                aria-valuenow="4" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div><span class="text-muted ms-3">2</span>
                                </div>
                            </div>
                        </div>
                        <hr class="mt-4 mb-3">
                        <div class="row py-4">
                            <!-- Reviews list-->
                            <div class="col-md-7">
                                <div class="d-flex justify-content-end pb-4">
                                    <div class="d-flex flex-nowrap align-items-center">
                                        <label class="fs-sm text-muted text-nowrap me-2 d-none d-sm-block"
                                            for="sort-reviews">Sort by:</label>
                                        <select class="form-select form-select-sm" id="sort-reviews">
                                            <option>Newest</option>
                                            <option>Oldest</option>
                                            <option>Popular</option>
                                            <option>High rating</option>
                                            <option>Low rating</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- Review-->
                                <div class="product-review pb-4 mb-4 border-bottom">
                                    <div class="d-flex mb-3">
                                        <div class="d-flex align-items-center me-4 pe-2"><img class="rounded-circle"
                                                src="https://cartzilla.createx.studio/img/shop/reviews/01.jpg"
                                                width="50" alt="Rafael Marquez">
                                            <div class="ps-3">
                                                <h6 class="fs-sm mb-0">Rafael Marquez</h6><span
                                                    class="fs-ms text-muted">June 28, 2019</span>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="star-rating"><i
                                                    class="star-rating-icon ci-star-filled active"></i><i
                                                    class="star-rating-icon ci-star-filled active"></i><i
                                                    class="star-rating-icon ci-star-filled active"></i><i
                                                    class="star-rating-icon ci-star-filled active"></i><i
                                                    class="star-rating-icon ci-star"></i>
                                            </div>
                                            <div class="fs-ms text-muted">83% of users found this review helpful</div>
                                        </div>
                                    </div>
                                    <p class="fs-md mb-2">Nam libero tempore, cum soluta nobis est eligendi optio cumque
                                        nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas
                                        assumenda est...</p>
                                    <ul class="list-unstyled fs-ms pt-1">
                                        <li class="mb-1"><span class="fw-medium">Pros:&nbsp;</span>Consequuntur magni,
                                            voluptatem sequi, tempora</li>
                                        <li class="mb-1"><span class="fw-medium">Cons:&nbsp;</span>Architecto beatae,
                                            quis autem</li>
                                    </ul>
                                    <div class="text-nowrap">
                                        <button class="btn-like" type="button">15</button>
                                        <button class="btn-dislike" type="button">3</button>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button class="btn btn-outline-accent" type="button"><i
                                            class="ci-reload me-2"></i>Load more reviews</button>
                                </div>
                            </div>
                            <!-- Leave review form-->
                            <div class="col-md-5 mt-2 pt-4 mt-md-0 pt-md-0">
                                <div class="bg-secondary py-grid-gutter px-grid-gutter rounded-3">
                                    <h3 class="h4 pb-2">Write a review</h3>
                                    <form class="needs-validation" method="post" novalidate>
                                        <div class="mb-3">
                                            <label class="form-label" for="review-name">Your name<span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" type="text" required id="review-name">
                                            <div class="invalid-feedback">Please enter your name!</div><small
                                                class="form-text text-muted">Will be displayed on the comment.</small>
                                        </div>


                                        <div class="mb-3">
                                            <label class="form-label" for="review-text">Review<span
                                                    class="text-danger">*</span></label>
                                            <textarea class="form-control" rows="6" required id="review-text"></textarea>
                                            <div class="invalid-feedback">Please write a review!</div><small
                                                class="form-text text-muted">Your review must be at least 50
                                                characters.</small>
                                        </div>

                                        <button class="btn btn-primary btn-shadow d-block w-100" type="submit">Submit a
                                            Review</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Product carousel (You may also like)-->
    <div class="container pt-lg-2 pb-5 mb-md-3">
        <h2 class="h3 text-center pb-4">You may also like</h2>
        <div class="tns-carousel tns-controls-static tns-controls-outside">
            <div class="tns-carousel-inner"
                data-carousel-options="{&quot;items&quot;: 2, &quot;controls&quot;: true, &quot;nav&quot;: false, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;500&quot;:{&quot;items&quot;:2, &quot;gutter&quot;: 18},&quot;768&quot;:{&quot;items&quot;:3, &quot;gutter&quot;: 20}, &quot;1100&quot;:{&quot;items&quot;:4, &quot;gutter&quot;: 30}}}">
                <!-- Product-->
                <div>
                    <div class="card product-card card-static">
                        <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip"
                            data-bs-placement="left" title="Add to wishlist"><i class="ci-heart"></i></button><a
                            class="card-img-top d-block overflow-hidden" href="#"><img
                                src="https://cartzilla.createx.studio/img/shop/catalog/66.jpg" alt="Product"></a>
                        <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1"
                                href="#">Smartwatches</a>
                            <h3 class="product-title fs-sm"><a href="#">Health &amp; Fitness Smartwatch</a></h3>
                            <div class="d-flex justify-content-between">
                                <div class="product-price"><span class="text-accent">$250.<small>00</small></span></div>
                                <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i
                                        class="star-rating-icon ci-star-filled active"></i><i
                                        class="star-rating-icon ci-star-filled active"></i><i
                                        class="star-rating-icon ci-star-filled active"></i><i
                                        class="star-rating-icon ci-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Product-->
                <div>
                    <div class="card product-card card-static">
                        <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip"
                            data-bs-placement="left" title="Add to wishlist"><i class="ci-heart"></i></button><a
                            class="card-img-top d-block overflow-hidden" href="#"><img
                                src="https://cartzilla.createx.studio/img/shop/catalog/67.jpg" alt="Product"></a>
                        <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1"
                                href="#">Smartwatches</a>
                            <h3 class="product-title fs-sm"><a href="#">Heart Rate &amp; Activity Tracker</a></h3>
                            <div class="d-flex justify-content-between">
                                <div class="product-price text-accent">$26.<small>99</small></div>
                                <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i
                                        class="star-rating-icon ci-star-filled active"></i><i
                                        class="star-rating-icon ci-star-half active"></i><i
                                        class="star-rating-icon ci-star"></i><i class="star-rating-icon ci-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Product-->
                <div>
                    <div class="card product-card card-static">
                        <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip"
                            data-bs-placement="left" title="Add to wishlist"><i class="ci-heart"></i></button><a
                            class="card-img-top d-block overflow-hidden" href="#"><img
                                src="https://cartzilla.createx.studio/img/shop/catalog/64.jpg" alt="Product"></a>
                        <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1"
                                href="#">Smartwatches</a>
                            <h3 class="product-title fs-sm"><a href="#">Smart Watch Series 5, Aluminium</a></h3>
                            <div class="d-flex justify-content-between">
                                <div class="product-price text-accent">$349.<small>99</small></div>
                                <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i
                                        class="star-rating-icon ci-star-filled active"></i><i
                                        class="star-rating-icon ci-star-filled active"></i><i
                                        class="star-rating-icon ci-star-filled active"></i><i
                                        class="star-rating-icon ci-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Product-->
                <div>
                    <div class="card product-card card-static">
                        <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip"
                            data-bs-placement="left" title="Add to wishlist"><i class="ci-heart"></i></button><a
                            class="card-img-top d-block overflow-hidden" href="#"><img
                                src="https://cartzilla.createx.studio/img/shop/catalog/68.jpg" alt="Product"></a>
                        <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1"
                                href="#">Smartwatches</a>
                            <h3 class="product-title fs-sm"><a href="#">Health &amp; Fitness Smartwatch</a></h3>
                            <div class="d-flex justify-content-between">
                                <div class="product-price text-accent">$118.<small>00</small></div>
                                <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i
                                        class="star-rating-icon ci-star-filled active"></i><i
                                        class="star-rating-icon ci-star-filled active"></i><i
                                        class="star-rating-icon ci-star-filled active"></i><i
                                        class="star-rating-icon ci-star-filled active"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Product-->
                <div>
                    <div class="card product-card card-static">
                        <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip"
                            data-bs-placement="left" title="Add to wishlist"><i class="ci-heart"></i></button><a
                            class="card-img-top d-block overflow-hidden" href="#"><img
                                src="https://cartzilla.createx.studio/img/shop/catalog/69.jpg" alt="Product"></a>
                        <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1"
                                href="#">Smartwatches</a>
                            <h3 class="product-title fs-sm"><a href="#">Heart Rate &amp; Activity Tracker</a></h3>
                            <div class="d-flex justify-content-between">
                                <div class="product-price text-accent">$25.<small>00</small></div>
                                <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i
                                        class="star-rating-icon ci-star-filled active"></i><i
                                        class="star-rating-icon ci-star-filled active"></i><i
                                        class="star-rating-icon ci-star-half active"></i><i
                                        class="star-rating-icon ci-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
