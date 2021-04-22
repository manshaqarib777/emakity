<?php if($customFields): ?>
    <h5 class="col-12 pb-4"><?php echo trans('lang.main_fields'); ?></h5>
<?php endif; ?>
<div style="flex: 50%;max-width: 50%;padding: 0 4px;" class="column">
    <!-- Product Id Field -->
    <div class="form-group row ">
        <?php echo Form::label('product_id', trans('lang.cart_product_id'), ['class' => 'col-3 control-label text-right']); ?>

        <div class="col-9">
            <?php echo Form::select('product_id', $product, null, ['class' => 'select2 form-control']); ?>

            <div class="form-text text-muted"><?php echo e(trans('lang.cart_product_id_help')); ?></div>
        </div>
    </div>
    <?php echo Form::hidden('user_id', Auth::user()->id, ['class' => 'form-control', 'placeholder' => trans('lang.cart_quantity_placeholder')]); ?>



    <!-- User Id Field -->
    


    <!-- Options Field -->
    <div class="form-group row ">
        <?php echo Form::label('options[]', trans('lang.cart_options'), ['class' => 'col-3 control-label text-right']); ?>

        <div class="col-9">
            <?php echo Form::select('options[]', $option, $optionsSelected, ['class' => 'select2 form-control', 'multiple' => 'multiple']); ?>

            <div class="form-text text-muted"><?php echo e(trans('lang.cart_options_help')); ?></div>
        </div>
    </div>


    <!-- Quantity Field -->
    <div class="form-group row ">
        <?php echo Form::label('quantity', trans('lang.cart_quantity'), ['class' => 'col-3 control-label text-right']); ?>

        <div class="col-9">
            <?php echo Form::number('quantity', null, ['class' => 'form-control', 'placeholder' => trans('lang.cart_quantity_placeholder')]); ?>

            <div class="form-text text-muted">
                <?php echo e(trans('lang.cart_quantity_help')); ?>

            </div>
        </div>
    </div>
</div>
<?php if($customFields): ?>
    <div class="clearfix"></div>
    <div class="col-12 custom-field-container">
        <h5 class="col-12 pb-4"><?php echo trans('lang.custom_field_plural'); ?></h5>
        <?php echo $customFields; ?>

    </div>
<?php endif; ?>
<!-- Submit Field -->
<div class="form-group col-12 text-right">
    <button type="submit" class="btn btn-<?php echo e(setting('theme_color')); ?>"><i class="fa fa-save"></i>
        <?php echo e(trans('lang.save')); ?> <?php echo e(trans('lang.cart')); ?></button>
    <a href="<?php echo route('carts.index'); ?>" class="btn btn-default"><i class="fa fa-undo"></i>
        <?php echo e(trans('lang.cancel')); ?></a>
</div>
<?php /**PATH /var/www/html/food/resources/views/carts/fields.blade.php ENDPATH**/ ?>