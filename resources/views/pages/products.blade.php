@extends('app')
@section('content')
    <style>
        .accordion-item li a {
            color: #000;
        }

        .accordion-item .active {
            color: #c2a476;
        }

        li {
            list-style: none;
        }

        .tags a {
            border: 1px solid #ebebeb;
            color: #9f9f9f;
            border-radius: 3px;
            display: inline-block;
            font-size: 13px;
            font-weight: 400;
            line-height: 17px;
            margin: 0 5px 10px 0;
            padding: 6px 12px;
            text-transform: capitalize;
        }

        .tags a:hover {
            border-color: #3f3f3f;
            color: #3f3f3f;
        }
    </style>
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
    <div class="page-title-overlap bg-dark pt-4">
        <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
            <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
                        <li class="breadcrumb-item"><a class="text-nowrap" href="/"><i class="ci-home"></i>Home</a>
                        </li>
                        <li class="breadcrumb-item text-nowrap"><a href="#">Shop</a>
                        </li>
                        <li class="breadcrumb-item text-nowrap active" aria-current="page">{{ $cateProducts->nameCategory }}
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
                <h1 class="h3 text-light mb-0">{{ $cateProducts->nameCategory }}</h1>
            </div>
        </div>
    </div>
    <div class="container pb-5 mb-2 mb-md-4">
        <div class="row">
            <!-- Sidebar-->
            <aside class="col-lg-4">
                <!-- Sidebar-->
                <div class="offcanvas offcanvas-collapse bg-white w-100 rounded-3 shadow-lg py-1" id="shop-sidebar"
                    style="max-width: 22rem;">
                    <div class="offcanvas-header align-items-center shadow-sm">
                        <h2 class="h5 mb-0">Filters</h2>
                        <button class="btn-close ms-auto" type="button" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body py-grid-gutter px-lg-grid-gutter">
                        <!-- Categories-->
                        <div class="widget widget-categories mb-4 pb-4 border-bottom">
                            <h6>Ranges</h6>
                            <div class="accordion mt-n1" id="shop-categories">
                                <div class="accordion-item">
                                    <li style="font-size:14px"> <i class="ci-lable mt-n1 me-2"></i><a class="{{ Request::get('price') == 1 ? 'active' : '' }}"
                                            href="{{ request()->fullUrlWithQuery(['price' => 1]) }}">Dưới 1.000.000 đ</a>
                                    </li>
                                    <li style="font-size:14px"> <i class="ci-lable mt-n1 me-2"></i><a
                                            class="{{ Request::get('price') == 2 ? 'active' : '' }}"
                                            href="{{ request()->fullUrlWithQuery(['price' => 2]) }}">1.000.000 - 3.000.000
                                            đ</a></li>
                                    <li style="font-size:14px"> <i class="ci-lable mt-n1 me-2"></i><a
                                            class="{{ Request::get('price') == 3 ? 'active' : '' }}"
                                            href="{{ request()->fullUrlWithQuery(['price' => 3]) }}">3.000.000 - 5.000.000
                                            đ</a></li>
                                    <li style="font-size:14px"> <i class="ci-lable mt-n1 me-2"></i><a
                                            class="{{ Request::get('price') == 4 ? 'active' : '' }}" 
                                            href="{{ request()->fullUrlWithQuery(['price' => 4]) }}">5.000.000 - 7.000.000
                                            đ</a></li>
                                    <li style="font-size:14px"> <i class="ci-lable mt-n1 me-2"></i><a
                                            class="{{ Request::get('price') == 5 ? 'active' : '' }}"
                                            href="{{ request()->fullUrlWithQuery(['price' => 5]) }}">7.000.000 -
                                            10.000.000
                                            đ</a></li>

                                    <li style="font-size:14px"> <i class="ci-lable mt-n1 me-2"></i><a
                                            class="{{ Request::get('price') == 6 ? 'active' : '' }}"
                                            href="{{ request()->fullUrlWithQuery(['price' => 6]) }}">Lớn Hơn 10.000.000
                                            đ</a>
                                    </li>
                                </div>

                            </div>
                        </div>
                        <!-- Filter by Size-->
                        <div class="widget widget-filter mb-4 pb-4 border-bottom">
                            <h3 class="widget-title">Tags</h3>
                            <div class="tags">
                                @foreach ($category as $tag)
                                    <a href="#">{{ $tag->nameCategory }}</a>
                                @endforeach
                            </div>
                        </div>
                        <!-- Filter by Color-->
                        <div class="widget">
                            <h3 class="widget-title">Color</h3>
                            <div class="d-flex flex-wrap">
                                <div class="form-check form-option text-center mb-2 mx-1" style="width: 4rem;">
                                    <input class="form-check-input" type="checkbox" id="color-blue-gray">
                                    <label class="form-option-label rounded-circle" for="color-blue-gray"><span
                                            class="form-option-color rounded-circle"
                                            style="background-color: #b3c8db;"></span></label>
                                    <label class="d-block fs-xs text-muted mt-n1" for="color-blue-gray">Blue-gray</label>
                                </div>
                                <div class="form-check form-option text-center mb-2 mx-1" style="width: 4rem;">
                                    <input class="form-check-input" type="checkbox" id="color-burgundy">
                                    <label class="form-option-label rounded-circle" for="color-burgundy"><span
                                            class="form-option-color rounded-circle"
                                            style="background-color: #ca7295;"></span></label>
                                    <label class="d-block fs-xs text-muted mt-n1" for="color-burgundy">Burgundy</label>
                                </div>
                                <div class="form-check form-option text-center mb-2 mx-1" style="width: 4rem;">
                                    <input class="form-check-input" type="checkbox" id="color-teal">
                                    <label class="form-option-label rounded-circle" for="color-teal"><span
                                            class="form-option-color rounded-circle"
                                            style="background-color: #91c2c3;"></span></label>
                                    <label class="d-block fs-xs text-muted mt-n1" for="color-teal">Teal</label>
                                </div>
                                <div class="form-check form-option text-center mb-2 mx-1" style="width: 4rem;">
                                    <input class="form-check-input" type="checkbox" id="color-brown">
                                    <label class="form-option-label rounded-circle" for="color-brown"><span
                                            class="form-option-color rounded-circle"
                                            style="background-color: #9a8480;"></span></label>
                                    <label class="d-block fs-xs text-muted mt-n1" for="color-brown">Brown</label>
                                </div>
                                <div class="form-check form-option text-center mb-2 mx-1" style="width: 4rem;">
                                    <input class="form-check-input" type="checkbox" id="color-coral-red">
                                    <label class="form-option-label rounded-circle" for="color-coral-red"><span
                                            class="form-option-color rounded-circle"
                                            style="background-color: #ff7072;"></span></label>
                                    <label class="d-block fs-xs text-muted mt-n1" for="color-coral-red">Coral red</label>
                                </div>
                                <div class="form-check form-option text-center mb-2 mx-1" style="width: 4rem;">
                                    <input class="form-check-input" type="checkbox" id="color-navy">
                                    <label class="form-option-label rounded-circle" for="color-navy"><span
                                            class="form-option-color rounded-circle"
                                            style="background-color: #696dc8;"></span></label>
                                    <label class="d-block fs-xs text-muted mt-n1" for="color-navy">Navy</label>
                                </div>
                                <div class="form-check form-option text-center mb-2 mx-1" style="width: 4rem;">
                                    <input class="form-check-input" type="checkbox" id="color-charcoal">
                                    <label class="form-option-label rounded-circle" for="color-charcoal"><span
                                            class="form-option-color rounded-circle"
                                            style="background-color: #4e4d4d;"></span></label>
                                    <label class="d-block fs-xs text-muted mt-n1" for="color-charcoal">Charcoal</label>
                                </div>
                                <div class="form-check form-option text-center mb-2 mx-1" style="width: 4rem;">
                                    <input class="form-check-input" type="checkbox" id="color-sky-blue">
                                    <label class="form-option-label rounded-circle" for="color-sky-blue"><span
                                            class="form-option-color rounded-circle"
                                            style="background-color: #8bcdf5;"></span></label>
                                    <label class="d-block fs-xs text-muted mt-n1" for="color-sky-blue">Sky blue</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>
            <!-- Content  -->
            <section class="col-lg-8">
                <!-- Toolbar-->
                <div class="d-flex justify-content-center justify-content-sm-between align-items-center pt-2 pb-4 pb-sm-5">
                    <div class="d-flex flex-wrap">
                        <div class="d-flex align-items-center flex-nowrap me-3 me-sm-4 pb-3">
                            <label class="text-light opacity-75 text-nowrap fs-sm me-2 d-none d-sm-block"
                                for="sorting">Sắp Xếp :</label>
                            <form action="" id="form_order" method="get">
                                <select class="form-select" name="orderby" id="sorting">
                                    <option {{ Request::get('orderby') == 'md' ? 'selected' : '' }} value="md"
                                        selected>Mặc Định</option>
                                    <option {{ Request::get('orderby') == 'desc' ? 'selected' : '' }} value="desc">
                                        Mới Nhất</option>
                                    <option {{ Request::get('orderby') == 'asc' ? 'selected' : '' }} value="asc">
                                        Sản Phẩm Cũ</option>
                                    <option {{ Request::get('orderby') == 'price_max' ? 'selected' : '' }}
                                        value="price_max">Giá Tăng Dần</option>
                                    <option {{ Request::get('orderby') == 'price_min' ? 'selected' : '' }}
                                        value="price_min">Giá Giảm Dần</option>
                                </select>
                            </form>
                            <span class="fs-sm text-light opacity-75 text-nowrap ms-2 d-none d-md-block">of
                                {{ $count_products }}
                                products</span>
                        </div>
                    </div>
                    {{-- <div class="d-flex pb-3"><a class="nav-link-style nav-link-light me-3" href="#"><i
                                class="ci-arrow-left"></i></a><span class="fs-md text-light">1 / 5</span><a
                            class="nav-link-style nav-link-light ms-3" href="#"><i class="ci-arrow-right"></i></a>
                    </div> --}}
                    <div class="d-none d-sm-flex pb-3"><a
                            class="btn btn-icon nav-link-style bg-light text-dark disabled opacity-100 me-2"
                            href="#"><i class="ci-view-grid"></i></a><a
                            class="btn btn-icon nav-link-style nav-link-light"><i class="ci-view-list"></i></a></div>
                </div>
                {{-- <!-- Banner-->
                <div class="py-sm-2">
                    <div
                        class="d-sm-flex justify-content-between align-items-center bg-secondary overflow-hidden mb-4 rounded-3">
                        <div class="py-4 my-2 my-md-0 py-md-5 px-4 ms-md-3 text-center text-sm-start">
                            <h4 class="fs-lg fw-light mb-2">Converse All Star</h4>
                            <h3 class="mb-4">Make Your Day Comfortable</h3><a class="btn btn-primary btn-shadow btn-sm"
                                href="/">Shop Now</a>
                        </div><img class="d-block ms-auto"
                            src="https://cartzilla.createx.studio/img/shop/catalog/banner.jpg" alt="Shop Converse">
                    </div>
                </div> --}}
                <!-- Products grid-->
                <div class="row mx-n2">
                    @foreach ($products as $item)
                        <!-- Product-->
                        <div class="col-md-4 col-sm-6 px-2 mb-4">
                            <div class="card product-card">
                                <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip"
                                    data-bs-placement="left" title="Add to wishlist"><i class="ci-heart"></i></button><a
                                    class="card-img-top d-block overflow-hidden"
                                    href="{{ route('products_detail', $item->slug) }}"><img
                                        src="{{ $item->imgProducts }}" alt="Product"></a>
                                <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1"
                                        href="#">Women's
                                        Swimwear</a>
                                    <h3 class="product-title fs-sm"><a
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
                                                class="star-rating-icon ci-star"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body card-body-hidden">
                                    <a href="{{ route('addToCart', $item->id) }}"
                                        class="btn btn-primary btn-sm d-block w-100 mb-2" type="button"><i
                                            class="ci-cart fs-sm me-1"></i>Add to Cart</a>
                                    <div class="text-center"><a class="nav-link-style fs-ms" href="#{{ $item->slug }}"
                                            data-bs-toggle="modal"><i class="ci-eye align-middle me-1"></i>Quick view</a>
                                    </div>
                                </div>
                            </div>
                            <hr class="d-sm-none">
                        </div>
                        <!-- End Product-->
                    @endforeach
                </div>
                <hr class="my-3">
                <!-- Pagination-->
                {{ $products->links('vendor.pagination.default') }}
            </section>
        </div>
    </div>
    </main>
@endsection
