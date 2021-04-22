@extends('frontend.layouts.app')
@push('css_lib')

@endpush
@section('content')
<div class="container-fluid">
    @include('flash::message')
</div>

    <!-- :::::: Start Main Container Wrapper :::::: -->
    <main id="main-container" class="main-container">
        <div class="product m-t-100">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- Start Section Title -->
                        <div class="section-content section-content--border m-b-35">
                            <h5 class="section-content__title">Markets</h5>
                            <a href="{{route('home')}}"
                                class="btn btn--icon-left btn--small btn--radius btn--transparent btn--border-green btn--border-green-hover-green font--regular text-capitalize">More
                                Markets<i class="fal fa-angle-right"></i></a>
                        </div> <!-- End Section Title -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="default-slider default-slider--hover-bg-red product-default-slider">
                            <div class="product-default-slider-4grid-1rows gap__col--30 gap__row--40">




                                @foreach ($markets as $market)

                                    <!-- Start Single Default Product -->
                                    <div class="product__box product__default--single text-center">
                                        <!-- Start Product Image -->
                                        <div class="product__img-box  pos-relative">
                                            <a href="{{route('product',$market->id)}}"
                                                class="product__img--link">
                                                {!! getMediaurl($market, 'image', 'product__img img-fluid') !!}                                                
                                            </a>
                                        
                                        </div> <!-- End Product Image -->
                                        <!-- Start Product Content -->
                                        <div class="product__content m-t-20">
                                            @include('frontend.layouts.components.product_review',['rate'=>($market->rate!=null)?((int)$market->rate):0])
                                            
                                            <a href="{{route('market',$market->id)}}"
                                                class="product__link">{{ $market->name }}</a>
                                            <p class="blog-feed__excerpt">{!! \Illuminate\Support\Str::limit($market->description, 50, ' (...)') !!}</p>
                                        </div> <!-- End Product Content -->
                                    </div> <!-- End Single Default Product -->


                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- ::::::  End  Product Style - Default Section  ::::::  -->


        <div class="product m-t-100">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- Start Section Title -->
                        <div class="section-content section-content--border m-b-35">
                            <h5 class="section-content__title">Products</h5>
                            <a href="{{route('home')}}"
                                class="btn btn--icon-left btn--small btn--radius btn--transparent btn--border-green btn--border-green-hover-green font--regular text-capitalize">More
                                Products<i class="fal fa-angle-right"></i></a>
                        </div> <!-- End Section Title -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="default-slider default-slider--hover-bg-red product-default-slider">
                            <div class="product-default-slider-4grid-1rows gap__col--30 gap__row--40">




                                @foreach ($products as $product)

                                    <!-- Start Single Default Product -->
                                    <div class="product__box product__default--single text-center">
                                        <!-- Start Product Image -->
                                        <div class="product__img-box  pos-relative">
                                            <a href="{{route('product',$product->id)}}"
                                                class="product__img--link">
                                                {!! getMediaurl($product, 'image', 'product__img img-fluid') !!}                                                
                                            </a>
                                            
                                            <ul class="product__action--link pos-absolute">
                                                <li><a href="#modalAddCart" data-quantity="1" data-user_id="{{@\Auth::user()->id}}" data-product_id="{{$product->id}}" data-toggle="modal"><i
                                                            class="icon-shopping-cart"></i></a></li>
                                                <li><a href="{{ asset('/') }}frontend/compare.html"><i
                                                            class="icon-sliders"></i></a></li>
                                                <li><a href="{{ asset('/') }}frontend/wishlist.html"><i
                                                            class="icon-heart"></i></a></li>
                                                <li><a href="#modalQuickView" data-id="{{$product->id}}" data-toggle="modal"><i
                                                            class="icon-eye"></i></a></li>
                                            </ul> <!-- End Product Action Link -->
                                        </div> <!-- End Product Image -->
                                        <!-- Start Product Content -->
                                        <div class="product__content m-t-20">
                                            @include('frontend.layouts.components.product_review',['rate'=>($product->rate!=null)?((int)$product->rate):0])
                                            
                                            <a href="{{route('product',$product->id)}}"
                                                class="product__link">{{ $product->name }}</a>
                                            <div class="product__price m-t-5">
                                                <span class="product__price">{{ $product->market->currency->symbol }} {{ $product->price }} <del> {{ $product->market->currency->symbol }} {{ $product->discount_price }} </del></span>
                                            </div>
                                        </div> <!-- End Product Content -->
                                    </div> <!-- End Single Default Product -->


                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- ::::::  End  Product Style - Default Section  ::::::  -->


    </main> <!-- :::::: End MainContainer Wrapper :::::: -->

@endsection
@push('scripts_lib')
@endpush
