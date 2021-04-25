<!-- Start Single Default Product -->
<div class="product__box product__default--single text-center">
    <!-- Start Product Image -->
    <div class="product__img-box  pos-relative">
        <a href="{{ route('product', $product->id) }}" class="product__img--link">
            {!! getMediaurl_frontend($product, 'web_image', 'product__img img-fluid',asset('frontend/assets/img/product/size-normal/product-home-1-img-1.jpg'),480,480) !!}
        </a>
        <span class="product__label product__label--sale-dis">{{getDiscountPercent($product)}}%</span>


        <ul class="product__action--link pos-absolute">
            <li><a href="#modalAddCart" data-quantity="1" data-user_id="{{ @\Auth::user()->id }}"
                    data-product_id="{{ $product->id }}" data-toggle="modal"><i class="icon-shopping-cart"></i></a>
            </li>
            <li><a href="#modalFavorite" data-user_id="{{ @\Auth::user()->id }}"
                data-product_id="{{ $product->id }}" data-toggle="modal"><i class="icon-heart"></i></a></li>
            <li><a href="{{ route('product', $product->id) }}" data-id="{{ $product->id }}" data-toggle="modal"><i
                        class="icon-eye"></i></a></li>
        </ul> <!-- End Product Action Link -->
    </div> <!-- End Product Image -->
    <!-- Start Product Content -->
    <div class="product__content m-t-20">
        @include('frontend.layouts.components.product_review',['rate'=>($product->rate!=null)?((int)$product->rate):0])

        <a href="{{ route('product', $product->id) }}" class="product__link">{{ $product->name }}</a>
        <div class="product__price m-t-5">
            <span class="product__price">{{ $product->market->currency->symbol }}
                {{ $product->discount_price }} <del>
                    {{ $product->market->currency->symbol }}
                    {{ $product->price }} </del></span>
        </div>
    </div> <!-- End Product Content -->
</div> <!-- End Single Default Product -->
