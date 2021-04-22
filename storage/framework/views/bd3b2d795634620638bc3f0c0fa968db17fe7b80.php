<?php $__env->startPush('css_lib'); ?>

<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <?php echo $__env->make('flash::message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>

    <!-- ::::::  Start  Main Container Section  ::::::  -->
    <main id="main-container" class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-content">
                        <h5 class="section-content__title">Your cart items</h5>
                    </div>
                    <div id="show_data"></div>
                    <div class="cart-table-button m-t-10">
                        <div class="cart-table-button--left">
                            <a href="<?php echo e(route('home')); ?>"
                                class="btn btn--box btn--large btn--radius btn--green btn--green-hover-black btn--uppercase font--bold m-t-20">CONTINUE
                                SHOPPING</a>
                        </div>
                        <div class="cart-table-button--right">
                            <a href="#"
                                class="btn btn--box btn--large btn--radius btn--black btn--black-hover-green btn--uppercase font--bold m-t-20">Clear
                                Shopping Cart</a>
                        </div>
                    </div> <!-- End Cart Table Button -->
                </div>
            </div>






            <?php echo Form::model(@$deliveryAddress, ['route' => 'checkout.store', 'method' => 'POST']); ?>


            <div class="row mt-3">
                <!-- Start Client Shipping Address -->

                <div class="col-lg-7">
                    <div class="section-content">
                        <h5 class="section-content__title">Billing Details</h5>
                    </div>
                    <div class="row">

                        <?php echo Form::hidden('user_id', Auth::user()->id, ['class' => 'form-control', 'step' => 'any', 'placeholder' => trans('lang.order_tax_placeholder')]); ?>

                        <?php echo Form::hidden('payment', getPayemntOptions(@$product->product->market, 'available_for_delivery'), ['class' => 'form-control', 'step' => 'any', 'placeholder' => trans('lang.order_tax_placeholder')]); ?>

                        <?php echo Form::hidden('order_status_id', 1); ?>

                        <?php echo Form::hidden('status', 'Waiting for Client'); ?>

                        <?php echo Form::hidden('active', 1); ?>

                        <?php echo Form::hidden('tax', $product->product->market->default_tax); ?>

                        <?php echo Form::hidden('delivery_fee', $product->product->market->delivery_fee); ?>

                        <?php echo Form::hidden('delivery_address_id', $deliveryAddress->id); ?>

                        <!-- Description Field -->
                        <div class="form-group row mb-2">
                            <?php echo Form::label('name', trans('lang.user_name'), ['class' => 'col-3 control-label text-right']); ?>

                            <div class="col-9">
                                <?php echo Form::text('name', auth()->user()->name, ['class' => 'form-control', 'placeholder' => trans('lang.app_setting_mail_username'), 'readonly']); ?>

                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <?php echo Form::label('email', trans('lang.user_email'), ['class' => 'col-3 control-label text-right']); ?>

                            <div class="col-9">
                                <?php echo Form::text('email', auth()->user()->email, ['class' => 'form-control', 'placeholder' => trans('lang.app_setting_mail_useremail'), 'readonly']); ?>

                            </div>
                        </div>
                        <div class="form-group row mb-2 ">
                            <?php echo Form::label('description', trans('lang.delivery_address_description'), ['class' => 'col-3 control-label text-right']); ?>

                            <div class="col-9">
                                <?php echo Form::text('description', null, ['class' => 'form-control', 'placeholder' => trans('lang.delivery_address_description_placeholder')]); ?>

                                <div class="form-text text-muted">
                                    <?php echo e(trans('lang.delivery_address_description_help')); ?>

                                </div>
                            </div>
                        </div>

                        <!-- Address Field -->
                        <div class="form-group row mb-2 ">
                            <?php echo Form::label('address', trans('lang.delivery_address_address'), ['class' => 'col-3 control-label text-right']); ?>

                            <div class="col-9">
                                <?php echo Form::text('address', null, ['class' => 'form-control', 'placeholder' => trans('lang.delivery_address_address_placeholder')]); ?>

                                <div class="form-text text-muted">
                                    <?php echo e(trans('lang.delivery_address_address_help')); ?>

                                </div>
                            </div>
                        </div>

                        <!-- Latitude Field -->
                        <div class="form-group row mb-2 ">
                            <?php echo Form::label('latitude', trans('lang.delivery_address_latitude'), ['class' => 'col-3 control-label text-right']); ?>

                            <div class="col-9">
                                <?php echo Form::text('latitude', null, ['class' => 'form-control', 'placeholder' => trans('lang.delivery_address_latitude_placeholder')]); ?>

                                <div class="form-text text-muted">
                                    <?php echo e(trans('lang.delivery_address_latitude_help')); ?>

                                </div>
                            </div>
                        </div>

                        <!-- Longitude Field -->
                        <div class="form-group row mb-2 ">
                            <?php echo Form::label('longitude', trans('lang.delivery_address_longitude'), ['class' => 'col-3 control-label text-right']); ?>

                            <div class="col-9">
                                <?php echo Form::text('longitude', null, ['class' => 'form-control', 'placeholder' => trans('lang.delivery_address_longitude_placeholder')]); ?>

                                <div class="form-text text-muted">
                                    <?php echo e(trans('lang.delivery_address_longitude_help')); ?>

                                </div>
                            </div>
                        </div>

                        <!-- 'Boolean Is Default Field' -->
                        <div class="form-group row mb-2 ">
                            <?php echo Form::label('is_default', trans('lang.delivery_address_is_default'), ['class' => 'col-3 control-label text-right']); ?>

                            <div class="col-9">

                                <div class="checkbox icheck">
                                    <label class="ml-2 form-check-inline">
                                        <?php echo Form::hidden('is_default', 0); ?>

                                        <?php echo Form::checkbox('is_default', 1, null); ?>

                                    </label>
                                </div>
                            </div>
                        </div>

                    </div>

                </div> <!-- End Client Shipping Address -->

                <!-- Start Order Wrapper -->
                <div class="col-lg-5">
                    <div class="your-order-section">
                        <div class="section-content">
                            <h5 class="section-content__title">Your order</h5>
                        </div>
                        <div class="your-order-box gray-bg m-t-40 m-b-30">
                            <div class="your-order-product-info">
                                <div class="your-order-top d-flex justify-content-between">
                                    <h6 class="your-order-top-left font--bold">Product</h6>
                                    <h6 class="your-order-top-left font--bold">Quantity</h6>
                                    <h6 class="your-order-top-right font--bold">Total</h6>
                                </div>
                                <ul class="your-order-middle">
                                    <?php
                                        $amount = 0;
                                    ?>
                                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productOrder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $amount += getPriceValue($productOrder['product'], 'discount_price') * $productOrder['quantity'];
                                            $price = getPriceValue($productOrder['product'], 'discount_price') * $productOrder['quantity'];
                                        ?>
                                        <li class="d-flex justify-content-between">
                                            <span
                                                class="your-order-middle-left font--semi-bold"><?php echo e($productOrder['product']['name']); ?></span>
                                            <span
                                                class="your-order-middle-right font--semi-bold"><?php echo e($productOrder['quantity']); ?></span>
                                            <span
                                                class="your-order-middle-right font--semi-bold"><?php echo e($product->product->market->currency->symbol); ?>

                                                <?php echo e(getPriceValue($productOrder['product'], 'discount_price') * $productOrder['quantity']); ?></span>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $amount += $product->product->market->delivery_fee;
                                        $amountWithTax = $amount + ($amount * $product->product->market->default_tax) / 100;
                                    ?>

                                </ul>
                                <div class="total-shipping" style="border-top:0px;">
                                    <span>Payment Option</span>
                                    <ul class="shipping-cost m-t-10">
                                        <li>
                                            <label for="ship-standard">
                                                <input type="radio" class="shipping-select" name="shipping-cost"
                                                    value="Standard" id="ship-standard"
                                                    required><span><?php echo e(getPayemntOptions(@$product->product->market, 'available_for_delivery')); ?></span>
                                            </label>
                                        </li>
                                    </ul>
                                </div>
                                <div class="your-order-bottom d-flex justify-content-between">
                                    <h6 class="your-order-bottom-left font--bold">Shipping</h6>
                                    <span
                                        class="your-order-bottom-right font--semi-bold"><?php echo e($product->product->market->currency->symbol); ?>

                                        <?php echo e($product->product->market->delivery_fee); ?></span>
                                </div>
                                <div class="your-order-bottom d-flex justify-content-between">
                                    <h6 class="your-order-bottom-left font--bold">Tax</h6>
                                    <span
                                        class="your-order-bottom-right font--semi-bold"><?php echo e($product->product->market->default_tax); ?>

                                        %</span>
                                </div>
                                <div class="your-order-total d-flex justify-content-between">
                                    <h5 class="your-order-total-left font--bold">Total</h5>
                                    <h5 class="your-order-total-right font--bold">
                                        <?php echo e($product->product->market->currency->symbol); ?> <?php echo e($amountWithTax); ?></h5>
                                </div>


                                
                            </div>
                        </div>
                        <div class="text-center">
                            <button
                                class="btn btn--small btn--radius btn--green btn--green-hover-black btn--uppercase font--bold"
                                type="submit">PLACE ORDER</button>
                        </div>
                    </div>
                </div> <!-- End Order Wrapper -->
            </div>
            <?php echo Form::close(); ?>

        </div>
    </main> <!-- ::::::  End  Main Container Section  ::::::  -->


<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>

    <script type="text/javascript">
        $.ajax({
            url: '<?php echo e(route('cart_ajax')); ?>',
            method: "GET",
            success: function(response) {
                $('#show_data').html('');
                $('#show_data').html(response.data);

                jQuery(
                        '<div class="quantity-nav"><div class="quantity-button quantity-up"><i class="fal fa-plus"></i></div><div class="quantity-button quantity-down"><i class="fal fa-minus"></i></i></div></div>')
                    .insertAfter('.quantity input');
                jQuery('.quantity').each(function() {
                    var spinner = jQuery(this),
                        input = spinner.find('input[type="number"]'),
                        btnUp = spinner.find('.quantity-up'),
                        btnDown = spinner.find('.quantity-down'),
                        min = input.attr('min'),
                        max = input.attr('max');

                    btnUp.click(function() {
                        var oldValue = parseFloat(input.val());
                        if (oldValue >= max) {
                            var newVal = oldValue;
                        } else {
                            var newVal = oldValue + 1;
                        }
                        spinner.find("input").val(newVal);
                        spinner.find("input").trigger("change");
                        update_cart(input.data('id'),'update_cart'); 
                        //alert(input.data('id'));
                    });

                    btnDown.click(function() {
                        var oldValue = parseFloat(input.val());
                        if (oldValue <= min) {
                            var newVal = oldValue;
                        } else {
                            var newVal = oldValue - 1;
                        }
                        spinner.find("input").val(newVal);
                        spinner.find("input").trigger("change");
                        update_cart(input.data('id'),'delete_cart'); 
                    });

                });
            },
            error: function(xhr) {
                if (xhr.status == 500) {

                    $('#show_data').html(`<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        ${xhr.responseJSON.message}
                    </div>`);
                }
                if (xhr.status == 401) {

                    window.location.href = '<?php echo e(route('login')); ?>';
                }
            }
        });

        function update_cart(cart_id,type) {
            console.log(cart_id);
            $.ajax({
                url: '<?php echo e(route('cart_ajax_update')); ?>',
                method: "POST",
                data: {
                    _token: "<?php echo e(csrf_token()); ?>",
                    cart_id: cart_id,
                    type: type
                },
                success: function(response) {
                    
                },
                error: function(xhr) {
                    if (xhr.status == 500) {

                        $('#show_data').html(`<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            ${xhr.responseJSON.message}
                        </div>`);
                    }
                    if (xhr.status == 401) {

                        window.location.href = '<?php echo e(route('login')); ?>';
                    }
                }
            });
        }

        function delete_cart(cart_id) {
            console.log(cart_id);
            $.ajax({
                url: '<?php echo e(route('cart_ajax_delete')); ?>',
                method: "POST",
                data: {
                    _token: "<?php echo e(csrf_token()); ?>",
                    cart_id: cart_id,
                },
                success: function(response) {
                    $('#show_data').html('');
                    $('#show_data').html(response.data);
                },
                error: function(xhr) {
                    if (xhr.status == 500) {

                        $('#show_data').html(`<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            ${xhr.responseJSON.message}
                        </div>`);
                    }
                    if (xhr.status == 401) {

                        window.location.href = '<?php echo e(route('login')); ?>';
                    }
                }
            });
        }

    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/food/resources/views/frontend/carts/index.blade.php ENDPATH**/ ?>