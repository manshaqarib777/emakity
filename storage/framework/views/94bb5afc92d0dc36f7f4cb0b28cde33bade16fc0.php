<div class="row">
    <div class="col-md-7">
        <div class="row">
            <div class="col-md-4">
                <div class="modal__product-img">
                    <?php echo getMediaurl($product->product, 'image', 'product__img img-fluid'); ?>                                                

                </div>
            </div>
            <div class="col-md-8">
                <div class="link--green link--icon-left"><i
                        class="fal fa-check-square"></i>Added to cart successfully!</div>
                <div class="modal__product-cart-buttons m-tb-15">
                    <a href="<?php echo e(route('cart')); ?>"
                        class="btn btn--box  btn--tiny btn--green btn--green-hover-black btn--uppercase">View
                        Cart</a>
                    <a href="<?php echo e(route('checkout.index')); ?>"
                        class="btn btn--box  btn--tiny btn--green btn--green-hover-black btn--uppercaset">Checkout</a>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH /var/www/html/food/resources/views/frontend/carts/single.blade.php ENDPATH**/ ?>