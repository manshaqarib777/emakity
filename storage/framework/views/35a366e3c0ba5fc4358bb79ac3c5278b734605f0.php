
<?php $__env->startPush('css_lib'); ?>
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/iCheck/flat/blue.css')); ?>">
    <!-- select2 -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/select2/select2.min.css')); ?>">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/summernote/summernote-bs4.css')); ?>">
    
    <link rel="stylesheet" href="<?php echo e(asset('plugins/dropzone/bootstrap.min.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('settings_title',trans('lang.user_table')); ?>
<?php $__env->startSection('settings_content'); ?>
    <?php echo $__env->make('flash::message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('adminlte-templates::common.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="clearfix"></div>
    <div class="card">
        <div class="card-header">
            <ul class="nav nav-tabs align-items-end card-header-tabs w-100">

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo url('settings/payment/payment'); ?>"><i class="fa fa-money mr-2"></i><?php echo e(trans('lang.app_setting_payment')); ?></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo url('settings/payment/paypal'); ?>"><i class="fa fa-envelope mr-2"></i><?php echo e(trans('lang.app_setting_paypal')); ?><?php if(setting('enable_paypal', false)): ?><span class="badge ml-2 badge-success"><?php echo e(trans('lang.active')); ?></span><?php endif; ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="<?php echo url('settings/payment/stripe'); ?>"><i class="fa fa-envelope-o mr-2"></i><?php echo e(trans('lang.app_setting_stripe')); ?><?php if(setting('enable_stripe',false)): ?><span class="badge ml-2 badge-success"><?php echo e(trans('lang.active')); ?></span><?php endif; ?>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo url('settings/payment/razorpay'); ?>"><i class="fa fa-envelope-o mr-2"></i><?php echo e(trans('lang.app_setting_razorpay')); ?><?php if(setting('enable_razorpay',false)): ?><span class="badge ml-2 badge-success"><?php echo e(trans('lang.active')); ?></span><?php endif; ?>
                    </a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <?php echo Form::open(['url' => ['settings/update'], 'method' => 'patch']); ?>

            <div class="row">
                <div style="flex: 70%;max-width: 70%;padding: 0 4px;" class="column">
                <!-- 'Boolean enable_facebook Field' -->
                    <div class="form-group row col-12">
                        <?php echo Form::label('enable_stripe', trans('lang.app_setting_enable_stripe'),['class' => 'col-3 control-label text-right']); ?>

                        <div class="checkbox icheck">
                            <label class="w-100 ml-2 form-check-inline">
                                <?php echo Form::hidden('enable_stripe', null); ?>

                                <?php echo Form::checkbox('enable_stripe', 1, setting('enable_stripe', false)); ?>

                                <span class="ml-2"><?php echo trans('lang.app_setting_enable_stripe_help'); ?></span>
                            </label>
                        </div>
                    </div>
                    <!-- facebook_app_id Field -->
                    <div class="form-group row col-12">
                        <?php echo Form::label('stripe_key', trans('lang.app_setting_stripe_key'), ['class' => 'col-3 control-label text-right']); ?>

                        <div class="col-9">
                            <?php echo Form::text('stripe_key', setting('stripe_key'),  ['class' => 'form-control','placeholder'=>  trans('lang.app_setting_stripe_key_placeholder')]); ?>

                            <div class="form-text text-muted">
                                <?php echo trans('lang.app_setting_stripe_key_help'); ?>

                            </div>
                        </div>
                    </div>

                    <!-- facebook_app_secret Field -->
                    <div class="form-group row col-12">
                        <?php echo Form::label('stripe_secret', trans('lang.app_setting_stripe_secret'), ['class' => 'col-3 control-label text-right']); ?>

                        <div class="col-9">
                            <?php echo Form::text('stripe_secret', setting('stripe_secret'),  ['class' => 'form-control','placeholder'=>  trans('lang.app_setting_stripe_secret_placeholder')]); ?>

                            <div class="form-text text-muted">
                                <?php echo trans('lang.app_setting_stripe_secret_help'); ?>

                            </div>
                        </div>
                    </div>
                </div>

                <div style="flex: 30%;max-width: 30%;padding: 0 4px;" class="column">
                    <!-- TODO explain stripe here-->
                </div>
                <!-- Submit Field -->
                <div class="form-group mt-4 col-12 text-right">
                    <button type="submit" class="btn btn-<?php echo e(setting('theme_color')); ?>"><i class="fa fa-save"></i> <?php echo e(trans('lang.save')); ?> <?php echo e(trans('lang.app_setting_payment')); ?></button>
                    <a href="<?php echo route('users.index'); ?>" class="btn btn-default"><i class="fa fa-undo"></i> <?php echo e(trans('lang.cancel')); ?></a>
                </div>

            </div>
            <?php echo Form::close(); ?>

            <div class="clearfix"></div>
        </div>
    </div>
    </div>
    <?php echo $__env->make('layouts.media_modal',['collection'=>null], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts_lib'); ?>
    <!-- iCheck -->
    <script src="<?php echo e(asset('plugins/iCheck/icheck.min.js')); ?>"></script>
    <!-- select2 -->
    <script src="<?php echo e(asset('plugins/select2/select2.min.js')); ?>"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?php echo e(asset('plugins/summernote/summernote-bs4.min.js')); ?>"></script>
    
    <script src="<?php echo e(asset('plugins/dropzone/dropzone.js')); ?>"></script>
    <script type="text/javascript">
        Dropzone.autoDiscover = false;
        var dropzoneFields = [];
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.settings.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/food/resources/views/settings/payment/stripe.blade.php ENDPATH**/ ?>