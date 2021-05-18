<?php $__env->startSection('content'); ?>

<div class="login-register-wrapper mt-5 mb-5">

    <div class="container">

        <div class="member-area-from-wrap">

            <div class="row">

                <!-- Login Content Start -->
                <div class="col-lg-1"></div>
                <div class="col-lg-10">

                    <div class="login-reg-form-wrap  pr-lg-50">

                        <h2>Reset Password</h2>

                        <div class="card-body">

                            <?php if(session('status')): ?>

                                <div class="alert alert-success" role="alert">

                                    <?php echo e(session('status')); ?>


                                </div>

                            <?php endif; ?>



                            <form method="POST" action="<?php echo e(route('password.email')); ?>">

                                <?php echo csrf_field(); ?>



                                <div class="form-group row">

                                    <label for="email" class="col-md-4 col-form-label text-md-right"><?php echo e(__('E-Mail Address')); ?></label>



                                    <div class="col-md-6">

                                        <input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus>



                                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>

                                            <span class="invalid-feedback" role="alert">

                                                <strong><?php echo e($message); ?></strong>

                                            </span>

                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                    </div>

                                </div>



                                <div class="form-group row mb-0">

                                    <div class="col-md-6 offset-md-4">

                                        <button type="submit" class="sqr-btn">

                                            <?php echo e(__('Send Password Reset Link')); ?>


                                        </button>

                                    </div>

                                </div>

                            </form>

                        </div>

                    </div>

                </div>
                <div class="col-lg-1"></div>
                <!-- Login Content End -->

            </div>

        </div>

    </div>

</div>



<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customer/www/baguioonline.com/public_html/resources/views/auth/passwords/email.blade.php ENDPATH**/ ?>