
<ul class="product__review">
    <?php for($i=0; $i<$rate; $i++): ?>
        <li class="product__review--fill"><i class="icon-star"></i></li>
    <?php endfor; ?>
    <?php for($i=0; $i<5-$rate; $i++): ?>
        <li class="product__review--blank"><i class="icon-star"></i></li>    
    <?php endfor; ?>    
</ul><?php /**PATH /var/www/html/food/resources/views/frontend/layouts/components/product_review.blade.php ENDPATH**/ ?>