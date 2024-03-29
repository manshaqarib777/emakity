



<div class="form-group row">
    <?php echo Form::label($name, $key,['class' => $item ?'col-4 control-label text-right':'col-4 control-label text-right text-danger']); ?>

    <div class="input-group input-group-sm col-8">
        <?php echo Form::text($name, $item,  ['class' => 'form-control','placeholder'=>  $keyWithFileName]); ?>

        <div class="input-group-append">
            <button class="btn btn-outline-danger delete-lang-item" type="button"><?php echo e(__('lang.delete')); ?></button>
        </div>
    </div>
    <div class="form-text offset-4 px-2 text-muted">
        <?php echo trans($keyWithFileName); ?>

    </div>
</div><?php /**PATH /var/www/html/food/resources/views/layouts/components/lang_item.blade.php ENDPATH**/ ?>