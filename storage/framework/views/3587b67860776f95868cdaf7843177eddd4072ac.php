<?php if($customFields): ?>
<h5 class="col-12 pb-4"><?php echo trans('lang.main_fields'); ?></h5>
<?php endif; ?>
<div style="flex: 50%;max-width: 50%;padding: 0 4px;" class="column">
<!-- Review Field -->
<div class="form-group row ">
  <?php echo Form::label('review', trans("lang.product_review_review"), ['class' => 'col-3 control-label text-right']); ?>

  <div class="col-9">
    <?php echo Form::textarea('review', null, ['class' => 'form-control','placeholder'=>
     trans("lang.product_review_review_placeholder")  ]); ?>

    <div class="form-text text-muted"><?php echo e(trans("lang.product_review_review_help")); ?></div>
  </div>
</div>

<!-- Rate Field -->
<div class="form-group row ">
  <?php echo Form::label('rate', trans("lang.product_review_rate"), ['class' => 'col-3 control-label text-right']); ?>

  <div class="col-9">
    <?php echo Form::number('rate', null,  ['class' => 'form-control','placeholder'=>  trans("lang.product_review_rate_placeholder")]); ?>

    <div class="form-text text-muted">
      <?php echo e(trans("lang.product_review_rate_help")); ?>

    </div>
  </div>
</div>
</div>
<div style="flex: 50%;max-width: 50%;padding: 0 4px;" class="column">

<?php if(!in_array('admin',auth()->user()->getRoleNames()->toArray())): ?>
  <!-- User Id Field -->
<div class="form-group row ">
  <?php echo Form::label('user_id', trans("lang.product_review_user_id"),['class' => 'col-3 control-label text-right']); ?>

  <div class="col-9">
    <?php echo Form::select('user_id', $user, null, ['class' => 'select2 form-control']); ?>

    <div class="form-text text-muted"><?php echo e(trans("lang.product_review_user_id_help")); ?></div>
  </div>
</div>
<?php else: ?>
<?php echo Form::hidden('user_id', Auth::user()->id, ['class' => 'form-control', 'placeholder' => trans('lang.cart_quantity_placeholder')]); ?>

<?php endif; ?>


<!-- Product Id Field -->
<div class="form-group row ">
  <?php echo Form::label('product_id', trans("lang.product_review_product_id"),['class' => 'col-3 control-label text-right']); ?>

  <div class="col-9">
    <?php echo Form::select('product_id', $product, null, ['class' => 'select2 form-control']); ?>

    <div class="form-text text-muted"><?php echo e(trans("lang.product_review_product_id_help")); ?></div>
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
  <button type="submit" class="btn btn-<?php echo e(setting('theme_color')); ?>" ><i class="fa fa-save"></i> <?php echo e(trans('lang.save')); ?> <?php echo e(trans('lang.product_review')); ?></button>
  <a href="<?php echo route('productReviews.index'); ?>" class="btn btn-default"><i class="fa fa-undo"></i> <?php echo e(trans('lang.cancel')); ?></a>
</div>
<?php /**PATH /var/www/html/food/resources/views/product_reviews/fields.blade.php ENDPATH**/ ?>