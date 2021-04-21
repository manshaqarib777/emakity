<div class="table-content table-responsive cart-table-content m-t-30">
    <table>
        <thead class="gray-bg" >
            <tr>
                <th>Image</th>
                <th>Product Name</th>
                <th>Until Price</th>
                <th>Qty</th>
                <th>Subtotal</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td class="product-thumbnail">
                    <a href="#">
                        <?php echo getMediaurl($product['product'], 'image', 'product__img img-fluid'); ?>

                    </a>
                </td>
                <td class="product-name"><a href="#"><?php echo e($product['product']['name']); ?></a></td>
                <td class="product-price-cart"><span class="amount"><?php echo e(getPriceValue($product['product'],'discount_price') * $product['quantity']); ?></span></td>
                <td class="product-quantities">
                    <div class="quantity d-inline-block">
                        <input type="number" min="1" step="1" value="<?php echo e($product['quantity']); ?>" data-id='<?php echo e($product['id']); ?>'>
                    </div>
                </td>
                <td class="product-subtotal"><?php echo e(getPriceValue($product['product'],'discount_price') * $product['quantity']); ?></td>
                <td class="product-remove">
                    <a href="#"><i class="fa fa-pencil-alt"></i></a>
                    <a href="#" onclick="delete_cart(<?php echo e($product['id']); ?>)"><i class="fa fa-times"></i></a>
                </td>
            </tr>    
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
        </tbody>
    </table>
</div><?php /**PATH /var/www/html/food/resources/views/frontend/carts/all.blade.php ENDPATH**/ ?>