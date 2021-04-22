
<?php $__env->startSection('content'); ?>


    <div class="col-xl-8 col-lg-8 content-right" id="start">
        <div id="wizard_container">
            <div id="top-wizard">
                <span id="location"></span>
                <div id="progressbar"></div>
            </div>
            <!-- /top-wizard -->
            <div class="card-body login-card-body">
                <div class="card-body login-card-body">
                    <p class="login-box-msg"><?php echo e(__('auth.reset_title')); ?></p>
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>
                    <form action="<?php echo e(url('password/email')); ?>" method="post">
                        <?php echo csrf_field(); ?>


                        <div class="input-group mb-3">
                            <input value="<?php echo e(old('email')); ?>" type="email"
                                class="form-control <?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email"
                                placeholder="<?php echo e(__('auth.email')); ?>" aria-label="<?php echo e(__('auth.email')); ?>">
                            <?php if($errors->has('email')): ?>
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('email')); ?>

                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="row mb-2">
                            <div class="col-8">
                                <button type="submit" class="submit"><?php echo e(__('auth.send_password')); ?></button>
                            </div>
                        </div>


                    </form>


                    <p class="mb-1 text-center">
                        <a href="<?php echo e(url('/login')); ?>"><?php echo e(__('auth.remember_password')); ?></a>
                    </p>
                </div>
            </div>
        </div>
        <!-- /Wizard container -->
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('authentication.layouts.auth.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/food/resources/views/authentication/auth/passwords/email.blade.php ENDPATH**/ ?>