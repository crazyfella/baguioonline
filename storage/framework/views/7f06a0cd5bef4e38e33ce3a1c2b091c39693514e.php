



<?php $__env->startSection('content'); ?>

<!-- breadcrumb area start -->

<div class="breadcrumb-area">

    <div class="container">

        <div class="row">

            <div class="col-12">

                <div class="breadcrumb-wrap">

                    <nav aria-label="breadcrumb">

                        <ul class="breadcrumb">

                            <li class="breadcrumb-item"><?php echo e(Breadcrumbs::render('contact-us')); ?></li>

                        </ul>

                    </nav>

                </div>

            </div>

        </div>

    </div>

</div>

<!-- breadcrumb area end -->

<!-- contact area start -->

<div class="contact-area pb-34 pb-md-18 pb-sm-0">

            <div class="container">

                <div class="row">

                    <div class="col-lg-8">

                        <div class="contact-message">

                            <h2>tell us your concern</h2>

                            <?php echo $__env->make('flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



                            <form method="post"  action="<?php echo e(url('submit_contact')); ?>" class="contact-form">

                            <?php echo csrf_field(); ?>





                                <div class="row">

                                    <div class="col-lg-6 col-md-6 col-sm-6">

                                        <input name="name" placeholder="Name (required)" type="text" required>

                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-6">

                                        <input name="phone" placeholder="Phone (required)" type="text" required>

                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-6">

                                        <input name="email" placeholder="Email" type="text">

                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-6">

                                        <input name="subject" placeholder="Subject (required)" type="text">

                                    </div>

                                    <div class="col-12">

                                        <div class="contact2-textarea text-center">

                                            <textarea placeholder="Message (required)" name="message"  class="form-control2" ></textarea>

                                            <?php if($errors->has('message')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('message')); ?></strong>
                                                </span>
                                            <?php endif; ?>

                                        </div>

                                        <div class="contact-btn">
                                        (required)
                                            <?php echo htmlFormSnippet(); ?>

                                            <?php if($errors->has('g-recaptcha-response')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('g-recaptcha-response')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                            <br>
                                            <button class="sqr-btn" type="submit" data-style="expand-right">Send Message</button>

                                        </div>

                                    </div>

                                </div>

                            </form>

                        </div>

                    </div>

                    <div class="col-lg-4">

                        <div class="contact-info mt-md-28 mt-sm-28">

                            <h2>contact us</h2>

                            <p>Please free to contact us.</p>

                            <ul>



                                <li><i class="fa fa-phone"></i> Phone Number : +63 915 6623 243</li>

                                <li><i class="fa fa-envelope-o"></i> Emaill Adress : info@baguioonline.com</li>

                            </ul>

                            <div class="working-time">

                                <h3>Working hours</h3>

                                <p><span>Monday – Saturday:</span>08AM – 22PM</p>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- contact area end -->

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customer/www/baguioonline.com/public_html/resources/views/contact.blade.php ENDPATH**/ ?>