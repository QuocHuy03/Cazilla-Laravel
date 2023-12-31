 @extends('app')
 @section('content')
     @foreach ($products as $item)
         <div class="modal-quick-view modal fade" id="{{ $item->slug }}" tabindex="-1">
             <div class="modal-dialog modal-xl">
                 <div class="modal-content">
                     <div class="modal-header">
                         <h4 class="modal-title product-title"><a href="#" data-bs-toggle="tooltip"
                                 data-bs-placement="right" title="Go to product page">{{ $item->nameProducts }}<i
                                     class="ci-arrow-right fs-lg ms-2"></i></a></h4>
                         <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                     </div>
                     <div class="modal-body">
                         <div class="row">
                             <!-- Product gallery-->
                             <div class="col-lg-7 pe-lg-0">
                                 <div class="product-gallery">
                                     <a class="card-img-top d-block overflow-hidden"
                                         href="{{ route('products_detail', $item->slug) }}"><img
                                             src="{{ $item->imgProducts }}" alt="Product">
                                     </a>

                                 </div>
                             </div>
                             <!-- Product details-->
                             <div class="col-lg-5 pt-4 pt-lg-0 image-zoom-pane">
                                 <div class="product-details ms-auto pb-3">
                                     <div class="mb-2">
                                         <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i
                                                 class="star-rating-icon ci-star-filled active"></i><i
                                                 class="star-rating-icon ci-star-filled active"></i><i
                                                 class="star-rating-icon ci-star-filled active"></i><i
                                                 class="star-rating-icon ci-star"></i>
                                         </div><span class="d-inline-block fs-sm text-body align-middle mt-1 ms-1">74
                                             Reviews</span>
                                     </div>
                                     <div class="h3 fw-normal text-accent mb-3 me-1">
                                         {{ number_format($item->priceProducts, 0, ',', '.') }} VNĐ</div>
                                     <div class="position-relative me-n4 mb-3">
                                         <div class="form-check form-option form-check-inline mb-2">
                                             <div class="product-badge product-available mt-n1 mb-2"><i
                                                     class="ci-security-check"></i>Product available</div>
                                         </div>
                                     </div>
                                     <div class="d-flex align-items-center pt-2 pb-4">

                                         <a href="{{ route('addToCart', $item->id) }}"
                                             class="btn btn-primary btn-shadow d-block w-100" type="button"><i
                                                 class="ci-cart fs-lg me-2"></i>Add to Cart</a>

                                     </div>
                                     <div class="d-flex mb-4">
                                         <div class="w-100 me-3">
                                             <button class="btn btn-secondary d-block w-100" type="button"><i
                                                     class="ci-heart fs-lg me-2"></i><span class='d-none d-sm-inline'>Add to
                                                 </span>Wishlist</button>
                                         </div>
                                         <div class="w-100">
                                             <button class="btn btn-secondary d-block w-100" type="button"><i
                                                     class="ci-compare fs-lg me-2"></i>Compare</button>
                                         </div>
                                     </div>
                                     <h5 class="h6 mb-3 py-2 border-bottom"><i
                                             class="ci-announcement text-muted fs-lg align-middle mt-n1 me-2"></i>Product
                                         info</h5>
                                     <h6 class="fs-sm mb-2">General</h6>
                                     <ul class="fs-sm pb-2">
                                         <li><span class="text-muted">Model: </span>Amazfit Smartwatch</li>
                                         <li><span class="text-muted">Gender: </span>Unisex</li>
                                         <li><span class="text-muted">OS campitibility: </span>Android / iOS</li>
                                     </ul>
                                     <h6 class="fs-sm mb-2">Physical specs</h6>
                                     <ul class="fs-sm pb-2">
                                         <li><span class="text-muted">Shape: </span>Rectangular</li>
                                         <li><span class="text-muted">Body material: </span>Plastics / Ceramics</li>
                                         <li><span class="text-muted">Band material: </span>Silicone</li>
                                     </ul>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     @endforeach
     <section class="bg-secondary py-4 pt-md-5">
         <div class="container py-xl-2">
             <div class="row">
                 <!-- Slider     -->
                 <div class="col-xl-9 pt-xl-4 order-xl-2">
                     <div class="tns-carousel">
                         <div class="tns-carousel-inner"
                             data-carousel-options="{&quot;items&quot;: 1, &quot;controls&quot;: false, &quot;loop&quot;: false}">
                             <div>
                                 <div class="row align-items-center">
                                     <div class="col-md-6 order-md-2"><img class="d-block mx-auto"
                                             src="https://cartzilla.createx.studio/img/home/hero-slider/05.jpg"
                                             alt="VR Collection"></div>
                                     <div
                                         class="col-lg-5 col-md-6 offset-lg-1 order-md-1 pt-4 pb-md-4 text-center text-md-start">
                                         <h2 class="fw-light pb-1 from-bottom">World of music with</h2>
                                         <h1 class="display-4 from-bottom delay-1">Headphones</h1>
                                         <h5 class="fw-light pb-3 from-bottom delay-2">Choose between top brands</h5>
                                         <div class="d-table scale-up delay-4 mx-auto mx-md-0"><a
                                                 class="btn btn-primary btn-shadow" href="shop-grid-ls.html">Shop Now<i
                                                     class="ci-arrow-right ms-2 me-n1"></i></a></div>
                                     </div>
                                 </div>
                             </div>
                             <div>
                                 <div class="row align-items-center">
                                     <div class="col-md-6 order-md-2"><img class="d-block mx-auto"
                                             src="https://cartzilla.createx.studio/img/home/hero-slider/04.jpg"
                                             alt="VR Collection"></div>
                                     <div
                                         class="col-lg-5 col-md-6 offset-lg-1 order-md-1 pt-4 pb-md-4 text-center text-md-start">
                                         <h2 class="fw-light pb-1 from-start">Explore the best</h2>
                                         <h1 class="display-4 from-start delay-1">VR Collection</h1>
                                         <h5 class="fw-light pb-3 from-start delay-2">on the market</h5>
                                         <div class="d-table scale-up delay-4 mx-auto mx-md-0"><a
                                                 class="btn btn-primary btn-shadow" href="shop-grid-ls.html">Shop Now<i
                                                     class="ci-arrow-right ms-2 me-n1"></i></a></div>
                                     </div>
                                 </div>
                             </div>
                             <div>
                                 <div class="row align-items-center">
                                     <div class="col-md-6 order-md-2"><img class="d-block mx-auto"
                                             src="https://cartzilla.createx.studio/img/home/hero-slider/06.jpg"
                                             alt="VR Collection"></div>
                                     <div
                                         class="col-lg-5 col-md-6 offset-lg-1 order-md-1 pt-4 pb-md-4 text-center text-md-start">
                                         <h2 class="fw-light pb-1 scale-up">Check our huge</h2>
                                         <h1 class="display-4 scale-up delay-1">Smartphones</h1>
                                         <h5 class="fw-light pb-3 scale-up delay-2">&amp; Accessories collection</h5>
                                         <div class="d-table scale-up delay-4 mx-auto mx-md-0"><a
                                                 class="btn btn-primary btn-shadow" href="shop-grid-ls.html">Shop Now<i
                                                     class="ci-arrow-right ms-2 me-n1"></i></a></div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
                 <!-- Banner group-->
                 <div class="col-xl-3 order-xl-1 pt-4 mt-3 mt-xl-0 pt-xl-0">
                     <div class="table-responsive" data-simplebar>
                         <div class="d-flex d-xl-block"><a
                                 class="d-flex align-items-center bg-faded-info rounded-3 pt-2 ps-2 mb-4 me-4 me-xl-0"
                                 href="#" style="min-width: 16rem;"><img
                                     src="https://cartzilla.createx.studio/img/home/banners/banner-sm01.png"
                                     width="125" alt="Banner">
                                 <div class="py-4 px-2">
                                     <h5 class="mb-2"><span class="fw-light">Next Gen</span><br>Video <span
                                             class="fw-light">with</span><br>360 Cam</h5>
                                     <div class="text-info fs-sm">Shop now<i class="ci-arrow-right fs-xs ms-1"></i></div>
                                 </div>
                             </a><a
                                 class="d-flex align-items-center bg-faded-warning rounded-3 pt-2 ps-2 mb-4 me-4 me-xl-0"
                                 href="#" style="min-width: 16rem;"><img
                                     src="https://cartzilla.createx.studio/img/home/banners/banner-sm02.png"
                                     width="125" alt="Banner">
                                 <div class="py-4 px-2">
                                     <h5 class="mb-2"><span class="fw-light">Top Rated</span><br>Gadgets<br><span
                                             class="fw-light">are on </span>Sale</h5>
                                     <div class="text-warning fs-sm">Shop now<i class="ci-arrow-right fs-xs ms-1"></i>
                                     </div>
                                 </div>
                             </a><a class="d-flex align-items-center bg-faded-success rounded-3 pt-2 ps-2 mb-4"
                                 href="#" style="min-width: 16rem;"><img
                                     src="https://cartzilla.createx.studio/img/home/banners/banner-sm03.png"
                                     width="125" alt="Banner">
                                 <div class="py-4 px-2">
                                     <h5 class="mb-2"><span class="fw-light">Catch Big</span><br>Deals <span
                                             class="fw-light">on</span><br>Earbuds</h5>
                                     <div class="text-success fs-sm">Shop now<i class="ci-arrow-right fs-xs ms-1"></i>
                                     </div>
                                 </div>
                             </a></div>
                     </div>
                 </div>
             </div>
         </div>
     </section>
     <!-- Products grid (Trending products)-->
     <section class="container pt-5">
         <!-- Heading-->
         <div class="d-flex flex-wrap justify-content-between align-items-center pt-1 border-bottom pb-4 mb-4">
             <h2 class="h3 mb-0 pt-3 me-2">Trending products</h2>
             <div class="pt-3"><a class="btn btn-outline-accent btn-sm" href="shop-grid-ls.html">More products<i
                         class="ci-arrow-right ms-1 me-n1"></i></a></div>
         </div>
         <!-- Grid-->
         <div class="row pt-2 mx-n2">
             <!-- Product-->
             @foreach ($products as $item)
                 <div class="col-lg-3 col-md-4 col-sm-6 px-2 mb-4">
                     <div class="card product-card">
                         <div class="product-card-actions d-flex align-items-center"><a
                                 class="btn-action nav-link-style me-2" href="#"><i
                                     class="ci-compare me-1"></i>Compare</a>
                             <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip"
                                 data-bs-placement="left" title="Add to wishlist"><i class="ci-heart"></i></button>
                         </div>
                         <a class="card-img-top d-block overflow-hidden"
                             href="{{ route('products_detail', $item->slug) }}"><img src="{{ $item->imgProducts }}"
                                 alt="Product">
                         </a>
                         <div class="card-body py-2">
                             <a class="product-meta d-block fs-xs pb-1" {{-- href="#">{{ $item->category->nameCategory }}</a> --}} <h3
                                 class="product-title fs-sm"><a
                                     href="{{ route('products_detail', $item->slug) }}">{{ $item->nameProducts }}</a>
                                 </h3>
                                 <div class="d-flex justify-content-between">
                                     <div class="product-price"><span
                                             class="text-accent">{{ number_format($item->priceProducts, 0, ',', '.') }}</span>
                                     </div>
                                     <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i
                                             class="star-rating-icon ci-star-filled active"></i><i
                                             class="star-rating-icon ci-star-filled active"></i><i
                                             class="star-rating-icon ci-star-filled active"></i><i
                                             class="star-rating-icon ci-star-filled active"></i>
                                     </div>
                                 </div>
                         </div>
                         <div class="card-body card-body-hidden">
                             <a href="{{ route('addToCart', $item->id) }}"
                                 class="btn btn-primary btn-sm d-block w-100 mb-2" type="button"><i
                                     class="ci-cart fs-sm me-1"></i>Add to Cart</a>
                             <div class="text-center"><a class="nav-link-style fs-ms" href="#{{ $item->slug }}"
                                     data-bs-toggle="modal"><i class="ci-eye align-middle me-1"></i>Quick view</a></div>
                         </div>
                     </div>
                     <hr class="d-sm-none">
                 </div>
             @endforeach
             <!-- End Product-->
         </div>
     </section>
     <!-- Promo banner-->
     <section class="container mt-4 mb-grid-gutter">
         <div class="bg-faded-info rounded-3 py-4">
             <div class="row align-items-center">
                 <div class="col-md-5">
                     <div class="px-4 pe-sm-0 ps-sm-5"><span class="badge bg-danger">Limited Offer</span>
                         <h3 class="mt-4 mb-1 text-body fw-light">All new</h3>
                         <h2 class="mb-1">Last Gen iPad Pro</h2>
                         <p class="h5 text-body fw-light">at discounted price. Hurry up!</p>
                         <div class="countdown py-2 h4" data-countdown="07/01/2023 07:00:00 PM">
                             <div class="countdown-days"><span class="countdown-value"></span><span
                                     class="countdown-label text-muted">d</span></div>
                             <div class="countdown-hours"><span class="countdown-value"></span><span
                                     class="countdown-label text-muted">h</span></div>
                             <div class="countdown-minutes"><span class="countdown-value"></span><span
                                     class="countdown-label text-muted">m</span></div>
                             <div class="countdown-seconds"><span class="countdown-value"></span><span
                                     class="countdown-label text-muted">s</span></div>
                         </div><a class="btn btn-accent" href="#">View offers<i
                                 class="ci-arrow-right fs-ms ms-1"></i></a>
                     </div>
                 </div>
                 <div class="col-md-7"><img src="https://cartzilla.createx.studio/img/home/banners/offer.jpg"
                         alt="iPad Pro Offer"></div>
             </div>
         </div>
     </section>
     <!-- Brands carousel-->
     <section class="container mb-5">
         <div class="tns-carousel border-end">
             <div class="tns-carousel-inner"
                 data-carousel-options="{ &quot;nav&quot;: false, &quot;controls&quot;: false, &quot;autoplay&quot;: true, &quot;autoplayTimeout&quot;: 4000, &quot;loop&quot;: true, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;360&quot;:{&quot;items&quot;:2},&quot;600&quot;:{&quot;items&quot;:3},&quot;991&quot;:{&quot;items&quot;:4},&quot;1200&quot;:{&quot;items&quot;:4}} }">
                 <div><a class="d-block bg-white border py-4 py-sm-5 px-2" href="#"
                         style="margin-right: -.0625rem;"><img class="d-block mx-auto"
                             src="https://cartzilla.createx.studio/img/shop/brands/13.png" style="width: 165px;"
                             alt="Brand"></a></div>
                 <div><a class="d-block bg-white border py-4 py-sm-5 px-2" href="#"
                         style="margin-right: -.0625rem;"><img class="d-block mx-auto"
                             src="https://cartzilla.createx.studio/img/shop/brands/14.png" style="width: 165px;"
                             alt="Brand"></a></div>
                 <div><a class="d-block bg-white border py-4 py-sm-5 px-2" href="#"
                         style="margin-right: -.0625rem;"><img class="d-block mx-auto"
                             src="https://cartzilla.createx.studio/img/shop/brands/17.png" style="width: 165px;"
                             alt="Brand"></a></div>
                 <div><a class="d-block bg-white border py-4 py-sm-5 px-2" href="#"
                         style="margin-right: -.0625rem;"><img class="d-block mx-auto"
                             src="https://cartzilla.createx.studio/img/shop/brands/16.png" style="width: 165px;"
                             alt="Brand"></a></div>
                 <div><a class="d-block bg-white border py-4 py-sm-5 px-2" href="#"
                         style="margin-right: -.0625rem;"><img class="d-block mx-auto"
                             src="https://cartzilla.createx.studio/img/shop/brands/15.png" style="width: 165px;"
                             alt="Brand"></a></div>
                 <div><a class="d-block bg-white border py-4 py-sm-5 px-2" href="#"
                         style="margin-right: -.0625rem;"><img class="d-block mx-auto"
                             src="https://cartzilla.createx.studio/img/shop/brands/18.png" style="width: 165px;"
                             alt="Brand"></a></div>
                 <div><a class="d-block bg-white border py-4 py-sm-5 px-2" href="#"
                         style="margin-right: -.0625rem;"><img class="d-block mx-auto"
                             src="https://cartzilla.createx.studio/img/shop/brands/19.png" style="width: 165px;"
                             alt="Brand"></a></div>
                 <div><a class="d-block bg-white border py-4 py-sm-5 px-2" href="#"
                         style="margin-right: -.0625rem;"><img class="d-block mx-auto"
                             src="https://cartzilla.createx.studio/img/shop/brands/20.png" style="width: 165px;"
                             alt="Brand"></a></div>
             </div>
         </div>
     </section>
     <!-- YouTube feed-->
     <section class="container pb-5 mb-md-3">
         <div class="border rounded-3 p-3">
             <div class="row">
                 <div class="col-md-4 mb-3 mb-md-0">
                     <div class="bg-secondary p-5 text-center"><img class="d-block mb-4 mx-auto"
                             src="https://cartzilla.createx.studio/img/home/yt-logo.png" width="120" alt="YouTube">
                         <div class="d-flex justify-content-center align-items-center mb-4"><img class="me-2"
                                 src="https://cartzilla.createx.studio/img/home/yt-subscribers.png" width="126"
                                 alt="YouTube Subscribers"><span class="fs-sm">250k+</span></div><a
                             class="btn btn-primary border-0 btn-sm mb-3" href="#"
                             style="background-color: #ff0000;"><i class="ci-add-user me-2"></i>Subscribe*</a>
                         <p class="fs-sm mb-0">*View latest gadgets reviews available for purchase in our store.</p>
                     </div>
                 </div>
                 <div class="col-md-8">
                     <div class="d-flex flex-wrap justify-content-between align-items-center pt-3 pb-2">
                         <h2 class="h4 mb-3">Latest videos from Cartzilla channel</h2><a
                             class="btn btn-outline-accent btn-sm mb-3" href="#">More videos<i
                                 class="ci-arrow-right fs-xs ms-1 me-n1"></i></a>
                     </div>
                     <div class="row g-0">
                         <div class="col-lg-4 col-6 mb-3"><a class="d-block text-decoration-0 px-2"
                                 href="https://www.youtube.com/embed/vS93u75NnPo" data-bs-toggle="video">
                                 <div class="position-relative mb-2"><span
                                         class="badge bg-dark position-absolute bottom-0 end-0 mb-2 me-2">6:16</span><img
                                         class="w-100" src="https://cartzilla.createx.studio/img/home/video/cover01.jpg"
                                         alt="Video cover"></div>
                                 <h6 class="fs-sm pt-1">5 New Cool Gadgets You Must See on Cartzilla - Cheap Budget</h6>
                             </a></div>
                         <div class="col-lg-4 col-6 mb-3"><a class="d-block text-decoration-0 px-2"
                                 href="https://www.youtube.com/embed/B6LaYgGogf0" data-bs-toggle="video">
                                 <div class="position-relative mb-2"><span
                                         class="badge bg-dark position-absolute bottom-0 end-0 mb-2 me-2">7:27</span><img
                                         class="w-100" src="https://cartzilla.createx.studio/img/home/video/cover02.jpg"
                                         alt="Video cover"></div>
                                 <h6 class="fs-sm pt-1">5 Super Useful Gadgets on Cartzilla You Must Have in 2020</h6>
                             </a></div>
                         <div class="col-lg-4 col-6 mb-3"><a class="d-block text-decoration-0 px-2"
                                 href="https://www.youtube.com/embed/kB-ROfRS9V4" data-bs-toggle="video">
                                 <div class="position-relative mb-2"><span
                                         class="badge bg-dark position-absolute bottom-0 end-0 mb-2 me-2">6:20</span><img
                                         class="w-100" src="https://cartzilla.createx.studio/img/home/video/cover03.jpg"
                                         alt="Video cover"></div>
                                 <h6 class="fs-sm pt-1">Top 5 New Amazing Gadgets on Cartzilla You Must See</h6>
                             </a></div>
                         <div class="col-lg-4 col-6 mb-3 d-lg-none"><a class="d-block text-decoration-0 px-2"
                                 href="https://www.youtube.com/embed/sJK67XXE_Rg" data-bs-toggle="video">
                                 <div class="position-relative mb-2"><span
                                         class="badge bg-dark position-absolute bottom-0 end-0 mb-2 me-2">6:11</span><img
                                         class="w-100" src="https://cartzilla.createx.studio/img/home/video/cover04.jpg"
                                         alt="Video cover"></div>
                                 <h6 class="fs-sm fw-bold pt-1">5 Amazing Construction Inventions and Working Tools
                                     Available...</h6>
                             </a></div>
                     </div>
                 </div>
             </div>
         </div>
     </section>
     <!-- Blog + Instagram info cards-->
     <section class="container-fluid px-0">
         <div class="row g-0">
             <div class="col-md-6"><a class="card border-0 rounded-0 text-decoration-none py-md-4 bg-faded-primary"
                     href="blog-list-sidebar.html">
                     <div class="card-body text-center"><i class="ci-edit h3 mt-2 mb-4 text-primary"></i>
                         <h3 class="h5 mb-1">Read the blog</h3>
                         <p class="text-muted fs-sm">Latest store, fashion news and trends</p>
                     </div>
                 </a></div>
             <div class="col-md-6"><a class="card border-0 rounded-0 text-decoration-none py-md-4 bg-faded-accent"
                     href="#">
                     <div class="card-body text-center"><i class="ci-instagram h3 mt-2 mb-4 text-accent"></i>
                         <h3 class="h5 mb-1">Follow on Instagram</h3>
                         <p class="text-muted fs-sm">#ShopWithCartzilla</p>
                     </div>
                 </a></div>
         </div>
     </section>
     </main>
 @endsection
