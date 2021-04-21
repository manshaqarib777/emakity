<?php if($customFields): ?>
    <h5 class="col-12 pb-4"><?php echo trans('lang.main_fields'); ?></h5>
<?php endif; ?>
<div style="flex: 50%;max-width: 50%;padding: 0 4px;" class="column">
    <!-- User Id Field -->
    


    <?php echo Form::hidden('user_id', Auth::user()->id,  ['class' => 'form-control', 'step'=>"any",'placeholder'=>  trans("lang.order_tax_placeholder")]); ?>

    <?php echo Form::hidden('payment', getPayemntOptions(@$product->product->market,'available_for_delivery'),  ['class' => 'form-control', 'step'=>"any",'placeholder'=>  trans("lang.order_tax_placeholder")]); ?>



    <!-- Driver Id Field -->
    <div class="form-group row ">
        <?php echo Form::label('driver_id', trans("lang.order_driver_id"),['class' => 'col-3 control-label text-right']); ?>

        <div class="col-9">
            <?php echo Form::select('driver_id', $driver, null, ['data-empty'=>trans("lang.order_driver_id_placeholder"),'class' => 'select2 not-required form-control']); ?>

            <div class="form-text text-muted"><?php echo e(trans("lang.order_driver_id_help")); ?></div>
        </div>
    </div>

    <!-- Order Status Id Field -->
    <div class="form-group row ">
        <?php echo Form::label('order_status_id', trans("lang.order_order_status_id"),['class' => 'col-3 control-label text-right']); ?>

        <div class="col-9">
            <?php echo Form::select('order_status_id', $orderStatus, null, ['class' => 'select2 form-control']); ?>

            <div class="form-text text-muted"><?php echo e(trans("lang.order_order_status_id_help")); ?></div>
        </div>
    </div>

    <!-- Status Field -->
    <div class="form-group row ">
        <?php echo Form::label('status', trans("lang.payment_status"),['class' => 'col-3 control-label text-right']); ?>

        <div class="col-9">
            <?php echo Form::select('status',
            [
            'Waiting for Client' => trans('lang.order_pending'),
            'Not Paid' => trans('lang.order_not_paid'),
            'Paid' => trans('lang.order_paid'),
            ]
            , isset($order->payment) ? $order->payment->status : '', ['class' => 'select2 form-control']); ?>

            <div class="form-text text-muted"><?php echo e(trans("lang.payment_status_help")); ?></div>
        </div>
    </div>
    <!-- 'Boolean active Field' -->
    <div class="form-group row ">
        <?php echo Form::label('active', trans("lang.order_active"),['class' => 'col-3 control-label text-right']); ?>

        <div class="checkbox icheck">
            <label class="col-9 ml-2 form-check-inline">
                <?php echo Form::hidden('active', 0); ?>

                <?php echo Form::checkbox('active', 1, null); ?>

            </label>
        </div>
    </div>

</div>
<div style="flex: 50%;max-width: 50%;padding: 0 4px;" class="column">

    <!-- Tax Field -->
    <div class="form-group row ">
        <?php echo Form::label('tax', trans("lang.order_tax"), ['class' => 'col-3 control-label text-right']); ?>

        <div class="col-9">
            <?php echo Form::number('tax', null,  ['class' => 'form-control', 'step'=>"any",'placeholder'=>  trans("lang.order_tax_placeholder")]); ?>

            <div class="form-text text-muted">
                <?php echo e(trans("lang.order_tax_help")); ?>

            </div>
        </div>
    </div>

    <!-- delivery_fee Field -->
    <div class="form-group row ">
        <?php echo Form::label('delivery_fee', trans("lang.order_delivery_fee"), ['class' => 'col-3 control-label text-right']); ?>

        <div class="col-9">
            <?php echo Form::number('delivery_fee', null,  ['class' => 'form-control','step'=>"any",'placeholder'=>  trans("lang.order_delivery_fee_placeholder")]); ?>

            <div class="form-text text-muted">
                <?php echo e(trans("lang.order_delivery_fee_help")); ?>

            </div>
        </div>
    </div>
    <!-- Hint Field -->
    <div class="form-group row ">
        <?php echo Form::label('hint', trans("lang.order_hint"), ['class' => 'col-3 control-label text-right']); ?>

        <div class="col-9">
            <?php echo Form::textarea('hint', null, ['class' => 'form-control','placeholder'=>
             trans("lang.order_hint_placeholder")  ]); ?>

            <div class="form-text text-muted"><?php echo e(trans("lang.order_hint_help")); ?></div>
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
    <button type="submit" class="btn btn-<?php echo e(setting('theme_color')); ?>"><i class="fa fa-save"></i> <?php echo e(trans('lang.save')); ?> <?php echo e(trans('lang.order')); ?></button>
    <a href="<?php echo route('orders.index'); ?>" class="btn btn-default"><i class="fa fa-undo"></i> <?php echo e(trans('lang.cancel')); ?></a>
</div>
<?php /**PATH /var/www/html/food/resources/views/orders/fields.blade.php ENDPATH**/ ?>