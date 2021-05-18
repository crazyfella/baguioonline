<?php $__env->startSection('content'); ?>
<div class="container mt-5 mb-5">
    <!-- Register Content Start -->
    <div class="row">
    <div class="col-md-7">
        <div class="login-reg-form-wrap mt-md-34 mt-sm-34 mb-3">
            <h2>Singup Form</h2>
            <form method="POST" action="<?php echo e(route('register')); ?>">
                            <?php echo csrf_field(); ?>
                <div class="single-input-item">
                <input id="name" type="text" placeholder="Full Name" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="name" value="<?php echo e(old('name')); ?>" required autocomplete="name" autofocus>

                <?php $__errorArgs = ['name'];
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
                <div class="single-input-item">
                <input id="email" type="email" placeholder="Email Address" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email">

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
                <div class="row">
                    <div class="col-lg-6">
                        <div class="single-input-item">
                        <input id="password" placeholder="Password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="new-password">

                        <?php $__errorArgs = ['password'];
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
                    <div class="col-lg-6">
                        <div class="single-input-item">
                        <input id="password-confirm" placeholder="Confirm Password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="single-input-item">
                            <label>By clicking Sign Up, you have read and agreed to the following <a href="#" data-toggle="modal" data-target="#terms" data-backdrop="static" data-keyboard="false" class="terms_link">terms and conditions</a></label> 
                        </div>
                    </div>
                </div>

                <div class="single-input-item">
                    <button class="sqr-btn">Sign Up</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Register Content End -->

    <div class="col-md-4">
        <div class="login-reg-form-wrap  pr-lg-50">
            <h2>or register With</h2>
            <div class="col-md-8 col-md-offset-5">
                <a href="<?php echo e(url('/redirect_facebook')); ?>" class="btn btn-social btn-facebook mb-3"><span class="fa fa-facebook"></span> Sign Up with Facebook</a>
                
                <a href="<?php echo e(url('/redirect_google')); ?>" class="btn btn-social btn-google"><span class="fa fa-google"></span>Sign Up with Google</a>
            </div>
        </div>
    </div>

    </div>
</div>




<!-- Modal -->
<div class="modal fade" id="terms" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean at laoreet nisl. Suspendisse nunc lacus, lacinia ut augue et, sollicitudin scelerisque mauris. Phasellus vehicula a nisl non sollicitudin. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas quis metus ullamcorper leo euismod mollis. Fusce vulputate nec lacus at maximus. Proin ut aliquam mauris, vitae sodales quam. Aliquam erat volutpat. Donec cursus rhoncus nunc, faucibus tempor dolor consequat a. Sed iaculis nisl velit, eget ornare ante dictum et. Ut ac ipsum auctor erat pellentesque laoreet.

Donec viverra purus nisl, id gravida arcu finibus id. Donec sed tellus sed turpis tincidunt tristique. Quisque lectus orci, convallis ac imperdiet sed, rutrum at eros. Nulla sagittis interdum scelerisque. Mauris varius neque ut augue feugiat auctor. Pellentesque nec lectus et leo gravida tempus. Sed id efficitur mauris, in egestas diam. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nunc tempor laoreet leo eget pretium. Vivamus mollis euismod leo id ullamcorper. Quisque lacus tortor, maximus quis sodales at, dictum non velit. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Duis sit amet eros quam. Integer dapibus finibus odio ac gravida. Vestibulum a maximus quam, nec fermentum nisl. Vivamus pharetra ornare metus elementum sagittis.

Etiam volutpat lectus in eros accumsan ultrices. Etiam eget eros ut nulla sagittis sollicitudin. Ut non mauris fringilla, tristique dolor nec, interdum leo. Vestibulum ornare dapibus pulvinar. Cras volutpat eros consectetur arcu ultrices gravida. Proin eu mi vel dui ornare laoreet. Proin laoreet tortor in semper mollis. Proin cursus sagittis convallis. Pellentesque at nisi sed elit consectetur lobortis vitae sit amet nisl. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut eleifend consectetur nunc quis laoreet. Maecenas nisl risus, fermentum vel lobortis egestas, blandit at lacus. Donec cursus ac ante at mattis. Duis risus dolor, venenatis vitae vehicula in, pellentesque vitae risus. Maecenas sit amet ligula blandit, imperdiet sapien non, malesuada tortor.

Vivamus laoreet nunc sed elit lacinia, quis feugiat nisi imperdiet. Nunc placerat iaculis erat, vitae efficitur orci finibus ut. Sed sit amet ante in lectus pretium imperdiet. Vivamus quis sodales mi. Cras arcu ante, bibendum sit amet imperdiet porttitor, aliquam ut ante. Morbi at tortor non magna scelerisque consectetur. Ut in ante orci.

Aenean tempor dictum mattis. Vestibulum nunc libero, maximus sed pulvinar ac, gravida sed massa. Vivamus ipsum nulla, lobortis non sem vel, aliquet varius arcu. Suspendisse quis orci neque. Cras vulputate magna lorem, sed pretium ipsum sollicitudin porta. Praesent ex ligula, vulputate vitae mi id, gravida suscipit lacus. Fusce a augue turpis. Morbi a suscipit nisi. Quisque faucibus lacinia ligula, nec lobortis nunc ornare a. Aenean a nibh dolor.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Sites\haaayyyss\resources\views/auth/register.blade.php ENDPATH**/ ?>