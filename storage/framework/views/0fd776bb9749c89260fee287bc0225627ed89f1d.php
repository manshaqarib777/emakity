<?php if($customFields): ?>
    <h5 class="col-12 pb-4"><?php echo trans('lang.main_fields'); ?></h5>
<?php endif; ?>
<div style="flex: 50%;max-width: 50%;padding: 0 4px;" class="column">
    <!-- Name Field -->
    <div class="form-group row ">
        <?php echo Form::label('name', trans("lang.product_name"), ['class' => 'col-3 control-label text-right']); ?>

        <div class="col-9">
            <?php echo Form::text('name', null,  ['class' => 'form-control','placeholder'=>  trans("lang.product_name_placeholder")]); ?>

            <div class="form-text text-muted">
                <?php echo e(trans("lang.product_name_help")); ?>

            </div>
        </div>
    </div>

    <!-- Image Field -->
    <div class="form-group row">
        <?php echo Form::label('image', trans("lang.product_image"), ['class' => 'col-3 control-label text-right']); ?>

        <div class="col-9">
            <div style="width: 100%" class="dropzone image" id="image" data-field="image">
            </div>
            <a href="#loadMediaModal" data-dropzone="image" data-toggle="modal" data-target="#mediaModal" class="btn btn-outline-<?php echo e(setting('theme_color','primary')); ?> btn-sm float-right mt-1"><?php echo e(trans('lang.media_select')); ?></a>
            <div class="form-text text-muted w-50">
                <?php echo e(trans("lang.product_image_help")); ?>

            </div>
        </div>
    </div>
    <?php $__env->startPrepend('scripts'); ?>
        <script type="text/javascript">
            var var15671147171873255749ble = [];
            <?php if(isset($product) && $product->hasMedia('image')): ?>
            <?php $__currentLoopData = $product->getMedia('image'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $media): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            var15671147171873255749ble.push({
                name: "<?php echo $media->name; ?>",
                size: "<?php echo $media->size; ?>",
                type: "<?php echo $media->mime_type; ?>",
                uuid: "<?php echo $media->getCustomProperty('uuid');; ?>",
                thumb: "<?php echo $media->getUrl('thumb');; ?>",
                collection_name: "<?php echo $media->collection_name; ?>"
            });
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
            var dz_var15671147171873255749ble = $(".dropzone.image").dropzone({
                    url: "<?php echo url('uploads/store'); ?>",
                    addRemoveLinks: true,
                    maxFiles: 5 - var15671147171873255749ble.length,
                    init: function () {
                        <?php if(isset($product) && $product->hasMedia('image')): ?>
                        var15671147171873255749ble.forEach(media => {
                            dzInit(this, media, media.thumb);
                        });
                        <?php endif; ?>
                    },
                    accept: function (file, done) {
                        dzAccept(file, done, this.element, "<?php echo config('medialibrary.icons_folder'); ?>");
                    },
                    sending: function (file, xhr, formData) {
                        dzSendingMultiple(this, file, formData, '<?php echo csrf_token(); ?>');
                    },
                    complete: function (file) {
                        dzCompleteMultiple(this, file);

                        dz_var15671147171873255749ble[0].mockFile = file;
                    },
                    removedfile: function (file) {
                        //this.removeFile(file);
                        dzRemoveFileMultiple(
                            file, var15671147171873255749ble, '<?php echo url("products/remove-media"); ?>',
                            'image', '<?php echo isset($product) ? $product->id : 0; ?>', '<?php echo url("uplaods/clear"); ?>', '<?php echo csrf_token(); ?>'
                        );
                    }
                });
            dz_var15671147171873255749ble[0].mockFile = var15671147171873255749ble;
            dropzoneFields['image'] = dz_var15671147171873255749ble;
        </script>
<?php $__env->stopPrepend(); ?>

<!-- Price Field -->
    <div class="form-group row ">
        <?php echo Form::label('price', trans("lang.product_price"), ['class' => 'col-3 control-label text-right']); ?>

        <div class="col-9">
            <?php echo Form::number('price', null,  ['class' => 'form-control','placeholder'=>  trans("lang.product_price_placeholder"),'step'=>"any", 'min'=>"0"]); ?>

            <div class="form-text text-muted">
                <?php echo e(trans("lang.product_price_help")); ?>

            </div>
        </div>
    </div>

    <!-- Discount Price Field -->
    <div class="form-group row ">
        <?php echo Form::label('discount_price', trans("lang.product_discount_price"), ['class' => 'col-3 control-label text-right']); ?>

        <div class="col-9">
            <?php echo Form::number('discount_price', null,  ['class' => 'form-control','placeholder'=>  trans("lang.product_discount_price_placeholder"),'step'=>"any", 'min'=>"0"]); ?>

            <div class="form-text text-muted">
                <?php echo e(trans("lang.product_discount_price_help")); ?>

            </div>
        </div>
    </div>

    <!-- Description Field -->
    <div class="form-group row ">
        <?php echo Form::label('description', trans("lang.product_description"), ['class' => 'col-3 control-label text-right']); ?>

        <div class="col-9">
            <?php echo Form::textarea('description', null, ['class' => 'form-control','placeholder'=>
             trans("lang.product_description_placeholder")  ]); ?>

            <div class="form-text text-muted"><?php echo e(trans("lang.product_description_help")); ?></div>
        </div>
    </div>
</div>
<div style="flex: 50%;max-width: 50%;padding: 0 4px;" class="column">

    <!-- Capacity Field -->
    <div class="form-group row ">
        <?php echo Form::label('capacity', trans("lang.product_capacity"), ['class' => 'col-3 control-label text-right']); ?>

        <div class="col-9">
            <?php echo Form::number('capacity', null,  ['class' => 'form-control','placeholder'=>  trans("lang.product_capacity_placeholder"),'step'=>"any", 'min'=>"0"]); ?>

            <div class="form-text text-muted">
                <?php echo e(trans("lang.product_capacity_help")); ?>

            </div>
        </div>
    </div>

    <!-- unit Field -->
    <div class="form-group row ">
        <?php echo Form::label('unit', trans("lang.product_unit"), ['class' => 'col-3 control-label text-right']); ?>

        <div class="col-9">
            <?php echo Form::text('unit', null,  ['class' => 'form-control','placeholder'=>  trans("lang.product_unit_placeholder")]); ?>

            <div class="form-text text-muted">
                <?php echo e(trans("lang.product_unit_help")); ?>

            </div>
        </div>
    </div>

    <!-- package_items_count Field -->
    <div class="form-group row ">
        <?php echo Form::label('package_items_count', trans("lang.product_package_items_count"), ['class' => 'col-3 control-label text-right']); ?>

        <div class="col-9">
            <?php echo Form::number('package_items_count', null,  ['class' => 'form-control','placeholder'=>  trans("lang.product_package_items_count_placeholder"),'step'=>"any", 'min'=>"0"]); ?>

            <div class="form-text text-muted">
                <?php echo e(trans("lang.product_package_items_count_help")); ?>

            </div>
        </div>
    </div>

    <!-- Market Id Field -->
    <div class="form-group row ">
        <?php echo Form::label('market_id', trans("lang.product_market_id"),['class' => 'col-3 control-label text-right']); ?>

        <div class="col-9">
            <?php echo Form::select('market_id', $market, null, ['class' => 'select2 form-control']); ?>

            <div class="form-text text-muted"><?php echo e(trans("lang.product_market_id_help")); ?></div>
        </div>
    </div>

    <!-- Category Id Field -->
    <div class="form-group row ">
        <?php echo Form::label('category_id', trans("lang.product_category_id"),['class' => 'col-3 control-label text-right']); ?>

        <div class="col-9">
            <?php echo Form::select('category_id', $category, null, ['class' => 'select2 form-control']); ?>

            <div class="form-text text-muted"><?php echo e(trans("lang.product_category_id_help")); ?></div>
        </div>
    </div>

    <!-- 'Boolean Featured Field' -->
    <div class="form-group row ">
        <?php echo Form::label('featured', trans("lang.product_featured"),['class' => 'col-3 control-label text-right']); ?>

        <div class="checkbox icheck">
            <label class="col-9 ml-2 form-check-inline">
                <?php echo Form::hidden('featured', 0); ?>

                <?php echo Form::checkbox('featured', 1, null); ?>

            </label>
        </div>
    </div>

    <!-- 'Boolean deliverable Field' -->
    <div class="form-group row ">
        <?php echo Form::label('deliverable', trans("lang.product_deliverable"),['class' => 'col-3 control-label text-right']); ?>

        <div class="checkbox icheck">
            <label class="col-9 ml-2 form-check-inline">
                <?php echo Form::hidden('deliverable', 0); ?>

                <?php echo Form::checkbox('deliverable', 1, null); ?>

            </label>
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
    <button type="submit" class="btn btn-<?php echo e(setting('theme_color')); ?>"><i class="fa fa-save"></i> <?php echo e(trans('lang.save')); ?> <?php echo e(trans('lang.product')); ?></button>
    <a href="<?php echo route('products.index'); ?>" class="btn btn-default"><i class="fa fa-undo"></i> <?php echo e(trans('lang.cancel')); ?></a>
</div>
<?php /**PATH /var/www/html/food/resources/views/products/fields.blade.php ENDPATH**/ ?>