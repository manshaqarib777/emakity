<?php if($customFields): ?>
    <h5 class="col-12 pb-4"><?php echo trans('lang.main_fields'); ?></h5>
<?php endif; ?>
<div style="flex: 50%;max-width: 50%;padding: 0 4px;" class="column">
    <!-- Name Field -->
    <div class="form-group row ">
        <?php echo Form::label('name', trans("lang.market_name"), ['class' => 'col-3 control-label text-right']); ?>

        <div class="col-9">
            <?php echo Form::text('name', null,  ['class' => 'form-control','placeholder'=>  trans("lang.market_name_placeholder")]); ?>

            <div class="form-text text-muted">
                <?php echo e(trans("lang.market_name_help")); ?>

            </div>
        </div>
    </div>

    <!-- fields Field -->
    <div class="form-group row ">
        <?php echo Form::label('fields[]', trans("lang.market_fields"),['class' => 'col-3 control-label text-right']); ?>

        <div class="col-9">
            <?php echo Form::select('fields[]', $field, $fieldsSelected, ['class' => 'select2 form-control' , 'multiple'=>'multiple']); ?>

            <div class="form-text text-muted"><?php echo e(trans("lang.market_fields_help")); ?></div>
        </div>
    </div>

    <div class="form-group row">
        <?php echo Form::label('country_id', trans('lang.app_country'), ['class' => 'col-3 control-label text-right']); ?>

        <div class="col-9">
            <?php echo Form::select('country_id',
            $countries
            ,null, ['class' => 'select2 form-control']); ?>

            <div class="form-text text-muted"><?php echo e(trans("lang.app_setting_default_country_help")); ?></div>
        </div>
    </div>


    <div class="form-group row">
        <?php echo Form::label('currency_id', trans('lang.app_setting_default_currency'), ['class' => 'col-3 control-label text-right']); ?>

        <div class="col-9">
            <?php echo Form::select('currency_id',
            $currencies
            ,null, ['class' => 'select2 form-control']); ?>

            <div class="form-text text-muted"><?php echo e(trans("lang.app_setting_default_currency_help")); ?></div>
        </div>
    </div>

    <div class="form-group row">
        <?php echo Form::label('currency_right', trans('lang.app_setting_currency_right'),['class' => 'col-3 control-label text-right']); ?>

        <div class="col-9">
            <div class="checkbox icheck">
                <label class="w-100 ml-2 form-check-inline">
                    <?php echo Form::hidden('currency_right', null); ?>

                    <?php echo Form::checkbox('currency_right', 1, null); ?>

                    <span class="ml-2"><?php echo trans('lang.app_setting_currency_right_help'); ?></span>
                </label>
            </div>
        </div>
    </div>

    <?php if(auth()->check() && auth()->user()->hasAnyRole('admin|manager')): ?>
    <!-- Users Field -->
    <div class="form-group row ">
        <?php echo Form::label('drivers[]', trans("lang.market_drivers"),['class' => 'col-3 control-label text-right']); ?>

        <div class="col-9">
            <?php echo Form::select('drivers[]', $drivers, $driversSelected, ['class' => 'select2 form-control' , 'multiple'=>'multiple']); ?>

            <div class="form-text text-muted"><?php echo e(trans("lang.market_drivers_help")); ?></div>
        </div>
    </div>
    <!-- delivery_fee Field -->
    <div class="form-group row ">
        <?php echo Form::label('delivery_fee', trans("lang.market_delivery_fee"), ['class' => 'col-3 control-label text-right']); ?>

        <div class="col-9">
            <?php echo Form::number('delivery_fee', null,  ['class' => 'form-control','step'=>'any','placeholder'=>  trans("lang.market_delivery_fee_placeholder")]); ?>

            <div class="form-text text-muted">
                <?php echo e(trans("lang.market_delivery_fee_help")); ?>

            </div>
        </div>
    </div>

    <!-- delivery_range Field -->
    <div class="form-group row ">
        <?php echo Form::label('delivery_range', trans("lang.market_delivery_range"), ['class' => 'col-3 control-label text-right']); ?>

        <div class="col-9">
            <?php echo Form::number('delivery_range', null,  ['class' => 'form-control', 'step'=>'any','placeholder'=>  trans("lang.market_delivery_range_placeholder")]); ?>

            <div class="form-text text-muted">
                <?php echo e(trans("lang.market_delivery_range_help")); ?>

            </div>
        </div>
    </div>

    <!-- default_tax Field -->
    <div class="form-group row ">
        <?php echo Form::label('default_tax', trans("lang.market_default_tax"), ['class' => 'col-3 control-label text-right']); ?>

        <div class="col-9">
            <?php echo Form::number('default_tax', null,  ['class' => 'form-control', 'step'=>'any','placeholder'=>  trans("lang.market_default_tax_placeholder")]); ?>

            <div class="form-text text-muted">
                <?php echo e(trans("lang.market_default_tax_help")); ?>

            </div>
        </div>
    </div>

    <?php endif; ?>

    <!-- Phone Field -->
    <div class="form-group row ">
        <?php echo Form::label('phone', trans("lang.market_phone"), ['class' => 'col-3 control-label text-right']); ?>

        <div class="col-9">
            <?php echo Form::text('phone', null,  ['class' => 'form-control','placeholder'=>  trans("lang.market_phone_placeholder")]); ?>

            <div class="form-text text-muted">
                <?php echo e(trans("lang.market_phone_help")); ?>

            </div>
        </div>
    </div>

    <!-- Mobile Field -->
    <div class="form-group row ">
        <?php echo Form::label('mobile', trans("lang.market_mobile"), ['class' => 'col-3 control-label text-right']); ?>

        <div class="col-9">
            <?php echo Form::text('mobile', null,  ['class' => 'form-control','placeholder'=>  trans("lang.market_mobile_placeholder")]); ?>

            <div class="form-text text-muted">
                <?php echo e(trans("lang.market_mobile_help")); ?>

            </div>
        </div>
    </div>

    <!-- Address Field -->
    <div class="form-group row ">
        <?php echo Form::label('address', trans("lang.market_address"), ['class' => 'col-3 control-label text-right']); ?>

        <div class="col-9">
            <?php echo Form::text('address', null,  ['class' => 'form-control','placeholder'=>  trans("lang.market_address_placeholder")]); ?>

            <div class="form-text text-muted">
                <?php echo e(trans("lang.market_address_help")); ?>

            </div>
        </div>
    </div>

    <!-- Latitude Field -->
    <div class="form-group row ">
        <?php echo Form::label('latitude', trans("lang.market_latitude"), ['class' => 'col-3 control-label text-right']); ?>

        <div class="col-9">
            <?php echo Form::text('latitude', null,  ['class' => 'form-control','placeholder'=>  trans("lang.market_latitude_placeholder")]); ?>

            <div class="form-text text-muted">
                <?php echo e(trans("lang.market_latitude_help")); ?>

            </div>
        </div>
    </div>

    <!-- Longitude Field -->
    <div class="form-group row ">
        <?php echo Form::label('longitude', trans("lang.market_longitude"), ['class' => 'col-3 control-label text-right']); ?>

        <div class="col-9">
            <?php echo Form::text('longitude', null,  ['class' => 'form-control','placeholder'=>  trans("lang.market_longitude_placeholder")]); ?>

            <div class="form-text text-muted">
                <?php echo e(trans("lang.market_longitude_help")); ?>

            </div>
        </div>
    </div>
    <!-- 'Boolean closed Field' -->
    <div class="form-group row ">
        <?php echo Form::label('closed', trans("lang.market_closed"),['class' => 'col-3 control-label text-right']); ?>

        <div class="checkbox icheck">
            <label class="col-9 ml-2 form-check-inline">
                <?php echo Form::hidden('closed', 0); ?>

                <?php echo Form::checkbox('closed', 1, null); ?>

            </label>
        </div>
    </div>

    <!-- 'Boolean available_for_delivery Field' -->
    <div class="form-group row ">
        <?php echo Form::label('available_for_delivery', trans("lang.market_available_for_delivery"),['class' => 'col-3 control-label text-right']); ?>

        <div class="checkbox icheck">
            <label class="col-9 ml-2 form-check-inline">
                <?php echo Form::hidden('available_for_delivery', 0); ?>

                <?php echo Form::checkbox('available_for_delivery', 1, null); ?>

            </label>
        </div>
    </div>

</div>
<div style="flex: 50%;max-width: 50%;padding: 0 4px;" class="column">

    <!-- Image Field -->
    <div class="form-group row">
        <?php echo Form::label('image', trans("lang.market_image"), ['class' => 'col-3 control-label text-right']); ?>

        <div class="col-9">
            <div style="width: 100%" class="dropzone image" id="image" data-field="image">
                <input type="hidden" name="image">
            </div>
            <a href="#loadMediaModal" data-dropzone="image" data-toggle="modal" data-target="#mediaModal" class="btn btn-outline-<?php echo e(setting('theme_color','primary')); ?> btn-sm float-right mt-1"><?php echo e(trans('lang.media_select')); ?></a>
            <div class="form-text text-muted w-50">
                <?php echo e(trans("lang.market_image_help")); ?>

            </div>
        </div>
    </div>
    <?php $__env->startPrepend('scripts'); ?>
        <script type="text/javascript">
            var var15671147011688676454ble = '';
            <?php if(isset($market) && $market->hasMedia('image')): ?>
                var15671147011688676454ble = {
                name: "<?php echo $market->getFirstMedia('image')->name; ?>",
                size: "<?php echo $market->getFirstMedia('image')->size; ?>",
                type: "<?php echo $market->getFirstMedia('image')->mime_type; ?>",
                collection_name: "<?php echo $market->getFirstMedia('image')->collection_name; ?>"
            };
                    <?php endif; ?>
            var dz_var15671147011688676454ble = $(".dropzone.image").dropzone({
                    url: "<?php echo url('uploads/store'); ?>",
                    addRemoveLinks: true,
                    maxFiles: 1,
                    init: function () {
                        <?php if(isset($market) && $market->hasMedia('image')): ?>
                        dzInit(this, var15671147011688676454ble, '<?php echo url($market->getFirstMediaUrl('image','thumb')); ?>')
                        <?php endif; ?>
                    },
                    accept: function (file, done) {
                        dzAccept(file, done, this.element, "<?php echo config('medialibrary.icons_folder'); ?>");
                    },
                    sending: function (file, xhr, formData) {
                        dzSending(this, file, formData, '<?php echo csrf_token(); ?>');
                    },
                    maxfilesexceeded: function (file) {
                        dz_var15671147011688676454ble[0].mockFile = '';
                        dzMaxfile(this, file);
                    },
                    complete: function (file) {
                        dzComplete(this, file, var15671147011688676454ble, dz_var15671147011688676454ble[0].mockFile);
                        dz_var15671147011688676454ble[0].mockFile = file;
                    },
                    removedfile: function (file) {
                        dzRemoveFile(
                            file, var15671147011688676454ble, '<?php echo url("markets/remove-media"); ?>',
                            'image', '<?php echo isset($market) ? $market->id : 0; ?>', '<?php echo url("uplaods/clear"); ?>', '<?php echo csrf_token(); ?>'
                        );
                    }
                });
            dz_var15671147011688676454ble[0].mockFile = var15671147011688676454ble;
            dropzoneFields['image'] = dz_var15671147011688676454ble;
        </script>
<?php $__env->stopPrepend(); ?>

<!-- Description Field -->
    <div class="form-group row ">
        <?php echo Form::label('description', trans("lang.market_description"), ['class' => 'col-3 control-label text-right']); ?>

        <div class="col-9">
            <?php echo Form::textarea('description', null, ['class' => 'form-control','placeholder'=>
             trans("lang.market_description_placeholder")  ]); ?>

            <div class="form-text text-muted"><?php echo e(trans("lang.market_description_help")); ?></div>
        </div>
    </div>
    <!-- Information Field -->
    <div class="form-group row ">
        <?php echo Form::label('information', trans("lang.market_information"), ['class' => 'col-3 control-label text-right']); ?>

        <div class="col-9">
            <?php echo Form::textarea('information', null, ['class' => 'form-control','placeholder'=>
             trans("lang.market_information_placeholder")  ]); ?>

            <div class="form-text text-muted"><?php echo e(trans("lang.market_information_help")); ?></div>
        </div>
    </div>

</div>

<?php if(auth()->check() && auth()->user()->hasRole('admin')): ?>
<div class="col-12 custom-field-container">
    <h5 class="col-12 pb-4"><?php echo trans('lang.admin_area'); ?></h5>
    <div style="flex: 50%;max-width: 50%;padding: 0 4px;" class="column">
        <!-- Users Field -->
        <div class="form-group row ">
            <?php echo Form::label('users[]', trans("lang.market_users"),['class' => 'col-3 control-label text-right']); ?>

            <div class="col-9">
                <?php echo Form::select('users[]', $user, $usersSelected, ['class' => 'select2 form-control' , 'multiple'=>'multiple']); ?>

                <div class="form-text text-muted"><?php echo e(trans("lang.market_users_help")); ?></div>
            </div>
        </div>
        
    </div>
    <div style="flex: 50%;max-width: 50%;padding: 0 4px;" class="column">
        <!-- admin_commission Field -->
        <div class="form-group row ">
            <?php echo Form::label('admin_commission', trans("lang.market_admin_commission"), ['class' => 'col-3 control-label text-right']); ?>

            <div class="col-9">
                <?php echo Form::number('admin_commission', null,  ['class' => 'form-control', 'step'=>'any', 'placeholder'=>  trans("lang.market_admin_commission_placeholder")]); ?>

                <div class="form-text text-muted">
                    <?php echo e(trans("lang.market_admin_commission_help")); ?>

                </div>
            </div>
        </div>
        <div class="form-group row ">
            <?php echo Form::label('active', trans("lang.market_active"),['class' => 'col-3 control-label text-right']); ?>

            <div class="checkbox icheck">
                <label class="col-9 ml-2 form-check-inline">
                    <?php echo Form::hidden('active', 0); ?>

                    <?php echo Form::checkbox('active', 1, null); ?>

                </label>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

<?php if($customFields): ?>
    <div class="clearfix"></div>
    <div class="col-12 custom-field-container">
        <h5 class="col-12 pb-4"><?php echo trans('lang.custom_field_plural'); ?></h5>
        <?php echo $customFields; ?>

    </div>
<?php endif; ?>
<!-- Submit Field -->
<div class="form-group col-12 text-right">
    <button type="submit" class="btn btn-<?php echo e(setting('theme_color')); ?>"><i class="fa fa-save"></i> <?php echo e(trans('lang.save')); ?> <?php echo e(trans('lang.market')); ?></button>
    <a href="<?php echo route('markets.index'); ?>" class="btn btn-default"><i class="fa fa-undo"></i> <?php echo e(trans('lang.cancel')); ?></a>
</div>
<?php /**PATH /var/www/html/food/resources/views/markets/fields.blade.php ENDPATH**/ ?>