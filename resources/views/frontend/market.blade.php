@extends('frontend.layouts.app')
@push('css_lib')

@endpush
@section('content')
<div class="container-fluid">
    @include('flash::message')
</div>



    <div class="page-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul class="page-breadcrumb__menu">
                        <li class="page-breadcrumb__nav"><a href="{{url('/')}}">Home</a></li>
                        <li class="page-breadcrumb__nav active">{{$market->name}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div> <!-- ::::::  End  Breadcrumb Section  ::::::  -->



    <main id="main-container" class="main-container">
        <div class="container">
            <div class="row">
                <!-- Start Rightside - Content -->
                <div class="col-12">
                    <div class="img-responsive">
                        <img src="assets/img/banner/size-wide/banner-shop-1-img-1-wide.jpg" alt="">
                    </div>


                    <div class="product-tab-area">
                        <div class="tab-content tab-animate-zoom">
                            <div class="tab-pane show active shop-grid" id="sort-grid">
                                <div class="row">



                                    @foreach ($market->products as $product)
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12">
                                            <!-- Start Single Default Product -->
                                            <div class="product__box product__default--single text-center">
                                                <!-- Start Product Image -->
                                                <div class="product__img-box  pos-relative">
                                                    <a href="{{route('product',$product->id)}}"
                                                        class="product__img--link">
                                                        {!! getMediaurl($product, 'image', 'product__img img-fluid') !!}
                                                    </a>
                                                    <span class="product__label product__label--sale-dis">-34%</span>


                                                    <ul class="product__action--link pos-absolute">
                                                        <li><a href="#modalAddCart" data-quantity="1"
                                                                data-user_id="{{ @\Auth::user()->id }}"
                                                                data-product_id="{{ $product->id }}"
                                                                data-toggle="modal"><i class="icon-shopping-cart"></i></a>
                                                        </li>
                                                        <li><a href="{{ asset('/') }}frontend/compare.html"><i
                                                                    class="icon-sliders"></i></a></li>
                                                        <li><a href="{{ asset('/') }}frontend/wishlist.html"><i
                                                                    class="icon-heart"></i></a></li>
                                                        <li><a href="#modalQuickView" data-id="{{ $product->id }}"
                                                                data-toggle="modal"><i class="icon-eye"></i></a></li>
                                                    </ul> <!-- End Product Action Link -->
                                                </div> <!-- End Product Image -->
                                                <!-- Start Product Content -->
                                                <div class="product__content m-t-20">
                                                    @include('frontend.layouts.components.product_review',['rate'=>($product->rate!=null)?((int)$product->rate):0])

                                                    <a href="{{route('product',$product->id)}}"
                                                        class="product__link">{{ $product->name }}</a>
                                                    <div class="product__price m-t-5">
                                                        <span
                                                            class="product__price">{{ $product->market->currency->symbol }}
                                                            {{ $product->price }} <del>
                                                                {{ $product->market->currency->symbol }}
                                                                {{ $product->discount_price }} </del></span>
                                                    </div>
                                                </div> <!-- End Product Content -->
                                            </div> <!-- End Single Default Product -->
                                        </div>

                                    @endforeach
                                </div>
                            </div>
                            <div class="tab-pane shop-list" id="sort-list">
                                <div class="row">
                                    <!-- Start Single List Product -->
                                    <div class="col-12">
                                        <div class="product__box product__box--list">
                                            <!-- Start Product Image -->
                                            <div class="product__img-box  pos-relative text-center">
                                                <a href="product-single-default.html" class="product__img--link">
                                                    <img class="product__img img-fluid"
                                                        src="assets/img/product/size-normal/product-home-1-img-5.jpg"
                                                        alt="">
                                                </a>
                                                <!-- Start Procuct Label -->
                                                <span class="product__label product__label--sale-dis">-31%</span>
                                                <!-- End Procuct Label -->
                                            </div> <!-- End Product Image -->
                                            <!-- Start Product Content -->
                                            <div class="product__content">
                                                <ul class="product__review">
                                                    <li class="product__review--fill"><i class="icon-star"></i></li>
                                                    <li class="product__review--fill"><i class="icon-star"></i></li>
                                                    <li class="product__review--fill"><i class="icon-star"></i></li>
                                                    <li class="product__review--fill"><i class="icon-star"></i></li>
                                                    <li class="product__review--blank"><i class="icon-star"></i></li>
                                                </ul>
                                                <a href="product-single-default.html" class="product__link">
                                                    <h5 class="font--regular">Best Red Meat</h5>
                                                </a>
                                                <div class="product__price m-t-5">
                                                    <span class="product__price">$55.00 <del>$80.00</del></span>
                                                </div>
                                                <div class="product__desc">
                                                    <p>
                                                        At vero eos et accusamus et iusto odio dignissimos ducimus qui
                                                        blanditiis praesentium voluptatum deleniti atque corrupti quos
                                                        dolores et quas molestias excepturi sint occaecati cupiditate non
                                                        provident, similique sunt in culpa qui officia deserunt mollitia
                                                        animi, id est laborum et dolorum fuga.
                                                    </p>
                                                </div>
                                                <!-- Start Product Action Link-->
                                                <ul class="product__action--link-list m-t-30">
                                                    <li><a href="#modalAddCart" data-toggle="modal"
                                                            class="btn--black btn--black-hover-green">Add to cart</a></li>
                                                    <li><a href="compare.html"><i class="icon-sliders"></i></a></li>
                                                    <li><a href="wishlist.html"><i class="icon-heart"></i></a></li>
                                                </ul> <!-- End Product Action Link -->
                                            </div> <!-- End Product Content -->
                                        </div>
                                    </div> <!-- End Single List Product -->
                                    <!-- Start Single List Product -->
                                    <div class="col-12">
                                        <!-- Start Single List Product -->
                                        <div class="product__box product__box--list">
                                            <!-- Start Product Image -->
                                            <div class="product__img-box  pos-relative text-center">
                                                <a href="product-single-default.html" class="product__img--link">
                                                    <img class="product__img img-fluid"
                                                        src="assets/img/product/size-normal/product-home-1-img-8.jpg"
                                                        alt="">
                                                </a>
                                                <!-- Start Procuct Label -->
                                                <span class="product__label product__label--sale-dis">-35%</span>
                                                <!-- End Procuct Label -->
                                                <!-- Start Product Countdown -->
                                                <div class="product__counter-box">
                                                    <div class="product__counter-item" data-countdown="2021/03/01"></div>
                                                </div> <!-- End Product Countdown -->
                                            </div> <!-- End Product Image -->
                                            <!-- Start Product Content -->
                                            <div class="product__content">
                                                <ul class="product__review">
                                                    <li class="product__review--fill"><i class="icon-star"></i></li>
                                                    <li class="product__review--fill"><i class="icon-star"></i></li>
                                                    <li class="product__review--fill"><i class="icon-star"></i></li>
                                                    <li class="product__review--fill"><i class="icon-star"></i></li>
                                                    <li class="product__review--blank"><i class="icon-star"></i></li>
                                                </ul>
                                                <a href="product-single-default.html" class="product__link">
                                                    <h5 class="font--regular">Best Ripe Grapes</h5>
                                                </a>
                                                <div class="product__price m-t-5">
                                                    <span class="product__price">$39.00 <del>$60.00</del></span>
                                                </div>
                                                <div class="product__desc">
                                                    <p>
                                                        On the other hand, we denounce with righteous indignation and
                                                        dislike men who are so beguiled and demoralized by the charms of
                                                        pleasure of the moment, so blinded by desire, that they cannot
                                                        foresee the pain and trouble that are bound to ensue; and equal
                                                        blame belongs to those who fail in their duty through weakness of
                                                        will
                                                    </p>
                                                </div>
                                                <!-- Start Product Action Link-->
                                                <ul class="product__action--link-list m-t-30">
                                                    <li><a href="#modalAddCart" data-toggle="modal"
                                                            class="btn--black btn--black-hover-green">Add to cart</a></li>
                                                    <li><a href="compare.html"><i class="icon-sliders"></i></a></li>
                                                    <li><a href="wishlist.html"><i class="icon-heart"></i></a></li>
                                                </ul> <!-- End Product Action Link -->
                                            </div> <!-- End Product Content -->
                                        </div> <!-- End Single List Product -->
                                    </div> <!-- End Single List Product -->
                                    <!-- Start Single List Product -->
                                    <div class="col-12">
                                        <!-- Start Single List Product -->
                                        <div class="product__box product__box--list">
                                            <!-- Start Product Image -->
                                            <div class="product__img-box  pos-relative text-center">
                                                <a href="product-single-default.html" class="product__img--link">
                                                    <img class="product__img img-fluid"
                                                        src="assets/img/product/size-normal/product-home-1-img-4.jpg"
                                                        alt="">
                                                </a>
                                            </div> <!-- End Product Image -->
                                            <!-- Start Product Content -->
                                            <div class="product__content">
                                                <ul class="product__review">
                                                    <li class="product__review--fill"><i class="icon-star"></i></li>
                                                    <li class="product__review--fill"><i class="icon-star"></i></li>
                                                    <li class="product__review--fill"><i class="icon-star"></i></li>
                                                    <li class="product__review--fill"><i class="icon-star"></i></li>
                                                    <li class="product__review--blank"><i class="icon-star"></i></li>
                                                </ul>
                                                <a href="product-single-default.html" class="product__link">
                                                    <h5 class="font--regular">Cabbage Vegetables</h5>
                                                </a>
                                                <div class="product__price m-t-5">
                                                    <span class="product__price">$50.00</span>
                                                </div>
                                                <div class="product__desc">
                                                    <p>
                                                        On the other hand, we denounce with righteous indignation and
                                                        dislike men who are so beguiled and demoralized by the charms of
                                                        pleasure of the moment, so blinded by desire, that they cannot
                                                        foresee the pain and trouble that are bound to ensue; and equal
                                                        blame belongs to those who fail in their duty through weakness of
                                                        will
                                                    </p>
                                                </div>
                                                <!-- Start Product Action Link-->
                                                <ul class="product__action--link-list m-t-30">
                                                    <li><a href="#modalAddCart" data-toggle="modal"
                                                            class="btn--black btn--black-hover-green">Add to cart</a></li>
                                                    <li><a href="compare.html"><i class="icon-sliders"></i></a></li>
                                                    <li><a href="wishlist.html"><i class="icon-heart"></i></a></li>
                                                </ul> <!-- End Product Action Link -->
                                            </div> <!-- End Product Content -->
                                        </div> <!-- End Single List Product -->
                                    </div> <!-- End Single List Product -->
                                    <!-- Start Single List Product -->
                                    <div class="col-12">
                                        <!-- Start Single List Product -->
                                        <div class="product__box product__box--list">
                                            <!-- Start Product Image -->
                                            <div class="product__img-box  pos-relative text-center">
                                                <a href="product-single-default.html" class="product__img--link">
                                                    <img class="product__img img-fluid"
                                                        src="assets/img/product/size-normal/product-home-1-img-9.jpg"
                                                        alt="">
                                                </a>
                                                <!-- Start Procuct Label -->
                                                <span class="product__label product__label--sale-out">Soldout</span>
                                                <!-- End Procuct Label -->
                                            </div> <!-- End Product Image -->
                                            <!-- Start Product Content -->
                                            <div class="product__content">
                                                <ul class="product__review">
                                                    <li class="product__review--fill"><i class="icon-star"></i></li>
                                                    <li class="product__review--fill"><i class="icon-star"></i></li>
                                                    <li class="product__review--fill"><i class="icon-star"></i></li>
                                                    <li class="product__review--fill"><i class="icon-star"></i></li>
                                                    <li class="product__review--blank"><i class="icon-star"></i></li>
                                                </ul>
                                                <a href="product-single-default.html" class="product__link">
                                                    <h5 class="font--regular">Cow Fresh Milk</h5>
                                                </a>
                                                <div class="product__price m-t-5">
                                                    <span class="product__price">$50.00</span>
                                                </div>
                                                <div class="product__desc">
                                                    <p>
                                                        Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis
                                                        suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis
                                                        autem vel eum iure reprehenderit qui in ea voluptate velit esse quam
                                                        nihil molestiae consequatur.
                                                    </p>
                                                </div>
                                                <!-- Start Product Action Link-->
                                                <ul class="product__action--link-list m-t-30">
                                                    <li><a href="#modalAddCart" data-toggle="modal"
                                                            class="btn--black btn--black-hover-green">Add to cart</a></li>
                                                    <li><a href="compare.html"><i class="icon-sliders"></i></a></li>
                                                    <li><a href="wishlist.html"><i class="icon-heart"></i></a></li>
                                                </ul> <!-- End Product Action Link -->
                                            </div> <!-- End Product Content -->
                                        </div> <!-- End Single List Product -->
                                    </div> <!-- End Single List Product -->
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </main>



@endsection
@push('scripts_lib')
@endpush
