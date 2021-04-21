
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
                    <p class="login-box-msg"><?php echo e(__('auth.login_title')); ?></p>

                    <form action="<?php echo e(url('/login')); ?>" method="post">
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

                        <div class="input-group mb-3">
                            <input value="<?php echo e(old('password')); ?>" type="password"
                                class="form-control  <?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password"
                                placeholder="<?php echo e(__('auth.password')); ?>" aria-label="<?php echo e(__('auth.password')); ?>">
                            <?php if($errors->has('password')): ?>
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('password')); ?>

                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="row mb-2">
                            <div class="col-8">
                                <div class="checkbox icheck">
                                    <label> <input type="checkbox" name="remember"> <?php echo e(__('auth.remember_me')); ?>

                                    </label>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-4">
                                <button type="submit" class="submit"><?php echo e(__('auth.login')); ?></button>
                            </div>
                            <!-- /.col -->
                        </div>
                        <?php if(env('APP_DEMO', false)): ?>
                            <div class="row mb-2">
                                <div class="col-12 callout callout-success">
                                    <h6 class="text-bold">Admin</h6>
                                    <p><small>User: admin@demo.com | Password: 123456</small></p>
                                </div>
                                <!-- /.col -->
                            </div>
                            <div class="row mb-2">
                                <div class="col-12 callout callout-warning">
                                    <h6 class="text-bold">Manager</h6>
                                    <p><small>User: manager@demo.com | Password: 123456</small></p>
                                </div>
                                <!-- /.col -->
                            </div>
                            <div class="row mb-2">
                                <div class="col-12 callout callout-danger">
                                    <h6 class="text-bold">Client</h6>
                                    <p><small>User: client@demo.com | Password: 123456</small></p>
                                </div>
                                <!-- /.col -->
                            </div>
                        <?php endif; ?>

                    </form>

                    <?php if(setting('enable_facebook', false) || setting('enable_google', false) || setting('enable_twitter', false)): ?>
                        <div class="social-auth-links text-center mb-3">
                            <p style="text-transform: uppercase">- <?php echo e(__('lang.or')); ?> -</p>
                            <?php if(setting('enable_facebook', false)): ?>
                                <a href="<?php echo e(url('login/facebook')); ?>" class="btn btn-primary btn-block btn-facebook">
                                    <i class="fa fa-facebook mr-2"></i> <?php echo e(__('auth.login_facebook')); ?>

                                </a>
                            <?php endif; ?>
                            <?php if(setting('enable_google', false)): ?>
                                <a href="<?php echo e(url('login/google')); ?>" class="btn btn-danger btn-block btn-google"> <i
                                        class="fa fa-google-plus mr-2"></i> <?php echo e(__('auth.login_google')); ?>

                                </a>
                            <?php endif; ?>
                            <?php if(setting('enable_twitter', false)): ?>
                                <a href="<?php echo e(url('login/twitter')); ?>" class="btn btn btn-info btn-block btn-twitter"> <i
                                        class="fa fa-twitter mr-2"></i> <?php echo e(__('auth.login_twitter')); ?>

                                </a>
                            <?php endif; ?>
                        </div>
                        <!-- /.social-auth-links -->
                    <?php endif; ?>

                    <p class="mb-1 text-center">
                        <a href="<?php echo e(url('/password/reset')); ?>"><?php echo e(__('auth.forgot_password')); ?></a>
                    </p>
                    <p class="mb-0 text-center">
                        <a href="<?php echo e(url('/register')); ?>" class="text-center"><?php echo e(__('auth.register_new_member')); ?></a>
                    </p>
                </div>
            </div>
        </div>
        <!-- /Wizard container -->
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('authentication.layouts.auth.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/food/resources/views/authentication/auth/login.blade.php ENDPATH**/ ?>