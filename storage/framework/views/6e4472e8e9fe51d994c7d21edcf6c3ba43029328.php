<!-- Id Field -->
<div class="form-group row col-md-4 col-sm-12">
    <?php echo Form::label('id', trans('lang.order_id'), ['class' => 'col-4 control-label']); ?>

    <div class="col-8">
    <p>#<?php echo $order->id; ?></p>
  </div>

    <?php echo Form::label('order_client', trans('lang.order_client'), ['class' => 'col-4 control-label']); ?>

    <div class="col-8">
    <p><?php echo $order->user->name; ?></p>
  </div>

    <?php echo Form::label('order_client_phone', trans('lang.order_client_phone'), ['class' => 'col-4 control-label']); ?>

    <div class="col-8">
    <p><?php echo isset($order->user->custom_fields['phone']) ? $order->user->custom_fields['phone']['view'] : ""; ?></p>
  </div>

    <?php echo Form::label('delivery_address', trans('lang.delivery_address'), ['class' => 'col-4 control-label']); ?>

    <div class="col-8">
    <p><?php echo $order->deliveryAddress ? $order->deliveryAddress->address : ''; ?></p>
  </div>

    <?php echo Form::label('order_date', trans('lang.order_date'), ['class' => 'col-4 control-label']); ?>

    <div class="col-8">
    <p><?php echo $order->created_at; ?></p>
  </div>


</div>

<!-- Order Status Id Field -->
<div class="form-group row col-md-4 col-sm-12">
    <?php echo Form::label('order_status_id', trans('lang.order_status_status'), ['class' => 'col-4 control-label']); ?>

    <div class="col-8">
    <p><?php echo $order->orderStatus->status; ?></p>
  </div>

    <?php echo Form::label('active', trans('lang.order_active'), ['class' => 'col-4 control-label']); ?>

    <div class="col-8">
    <?php if($order->active): ?>
      <p><span class='badge badge-success'> <?php echo e(trans('lang.yes')); ?></span></p>
      <?php else: ?>
      <p><span class='badge badge-danger'><?php echo e(trans('lang.order_canceled')); ?></span></p>
      <?php endif; ?>
  </div>

    <?php echo Form::label('payment_method', trans('lang.payment_method'), ['class' => 'col-4 control-label']); ?>

    <div class="col-8">
    <p><?php echo isset($order->payment) ? $order->payment->method : ''; ?></p>
  </div>

    <?php echo Form::label('payment_status', trans('lang.payment_status'), ['class' => 'col-4 control-label']); ?>

    <div class="col-8">
    <p><?php echo isset($order->payment) ? $order->payment->status : trans('lang.order_not_paid'); ?></p>
  </div>
    <?php echo Form::label('order_updated_date', trans('lang.order_updated_at'), ['class' => 'col-4 control-label']); ?>

    <div class="col-8">
        <p><?php echo $order->updated_at; ?></p>
    </div>

</div>

<!-- Id Field -->
<div class="form-group row col-md-4 col-sm-12">
    <?php echo Form::label('market', trans('lang.market'), ['class' => 'col-4 control-label']); ?>

    <div class="col-8">
        <?php if(isset($order->productOrders[0])): ?>
            <p><?php echo $order->productOrders[0]->product->market->name; ?></p>
        <?php endif; ?>
    </div>

    <?php echo Form::label('market_address', trans('lang.market_address'), ['class' => 'col-4 control-label']); ?>

    <div class="col-8">
        <?php if(isset($order->productOrders[0])): ?>
            <p><?php echo $order->productOrders[0]->product->market->address; ?></p>
        <?php endif; ?>
    </div>

    <?php echo Form::label('market_phone', trans('lang.market_phone'), ['class' => 'col-4 control-label']); ?>

    <div class="col-8">
        <?php if(isset($order->productOrders[0])): ?>
            <p><?php echo $order->productOrders[0]->product->market->phone; ?></p>
        <?php endif; ?>
    </div>

    <?php echo Form::label('driver', trans('lang.driver'), ['class' => 'col-4 control-label']); ?>

    <div class="col-8">
        <?php if(isset($order->driver)): ?>
            <p><?php echo $order->driver->name; ?></p>
        <?php else: ?>
            <p><?php echo e(trans('lang.order_driver_not_assigned')); ?></p>
        <?php endif; ?>

    </div>

    <?php echo Form::label('hint', 'Hint:', ['class' => 'col-4 control-label']); ?>

    <div class="col-8">
        <p><?php echo $order->hint; ?></p>
    </div>

</div>










<?php /**PATH /var/www/html/food/resources/views/orders/show_fields.blade.php ENDPATH**/ ?>