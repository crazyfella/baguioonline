<?php $__env->startSection('content'); ?>



<!-- hero slider start -->

<div class="hero-slider-area">

            <div class="container">

                <div class="row">

                    <div class="col-lg-12">

                        <div class="slider-wrapper-area2 mt-30">

                            <div class="hero-slider-active hero__2 slick-dot-style hero-dot">

                                <div class="single-slider d-flex align-items-center" style="background-image: url(assets/img/slider/slider22_bg.jpg);">

                                    <div class="container">

                                        <div class="slider-main-content">

                                            <div class="slider-text text-center">

                                                <h2>baguio online</h2>
                                                <br>

                                                <p>Baguio Online is a commerce website that allows anyone to set up an online store and sell their products. </p>

                                                <a class="home-btn" href="<?php echo e(url('register')); ?>">register now</a>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <div class="single-slider d-flex align-items-center" style="background-image: url(assets/img/slider/slider21_bg.jpg);">

                                    <div class="container">

                                        <div class="slider-main-content">

                                            <div class="slider-text text-center">

                                                <h2>baguio online</h2>


                                                <p>Buying and Selling for everyone</p>
                                                

                                                <a class="home-btn" href="<?php echo e(url('register')); ?>">register now</a>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- hero slider end -->







      







        <!-- page wrapper start -->

        <div class="main-home-wrapper">

            <div class="container">

                <div class="row">



                    <div class="col-lg-12">

                        <!-- featured category area start -->

                        <div class="feature-category-area">

                            <div class="section-title mb-30">

                                <div class="title-icon">

                                    <i class="fa fa-bookmark"></i>

                                </div>

                                <h3>featured</h3>

                            </div> <!-- section title end -->

                            <!-- featured category start -->

                            <div class="container">

                                <div class="featured-carousel-active2 row slick-arrow-style" data-row="2">

                                    <!-- product single item start -->

                                    <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                                    <div class="col">

                                        <div class="product-item fix mb-30">

                                            <div class="product-thumb">

                                                <a href="<?php echo e(route('product-details', ['details'=>$list->productSlug])); ?>">

                                                <?php if($list->photo == ""): ?>

                                                    <img src="images/no-image.jpg"/>

                                                <?php else: ?>

                                                    <img src="<?php echo e(asset('images/featured/'.$list->photo)); ?>" alt="" />

                                                    

                                                <?php endif; ?>

                                                </a>

                                            </div>

                                            <div class="product-content">

                                                <h4><a href="<?php echo e(route('product-details', ['details'=>$list->productSlug])); ?>"><?php echo e($list->productName); ?></a></h4>

                                                <div class="pricebox">

                                                    <span class="regular-price">&#8369;<?php echo e(number_format($list->productPrice,2)); ?></span></span>

                                                    <div class="pro-review">

                                        <span><?php echo e($list->view); ?> view(s)</span>

                                    </div>



                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                                        <p>No replies</p>

                                    <?php endif; ?>



                                </div>

                            </div>

                            <!-- featured category end -->

                        </div>

                        <!-- featured category area end -->

                    </div>

                </div>

            </div>

        </div>

        <!-- page wrapper end -->



        <!-- latest product start -->

        <div class="latest-product latest-pro-2 pt-14 pt-lg-0 pt-md-0 pt-sm-0 mb-5">

            <div class="container">

                <div class="section-title mb-30">

                    <div class="title-icon">

                        <i class="fa fa-flash"></i>

                    </div>

                    <h3>latest product</h3>

                </div> <!-- section title end -->

                <!-- featured category start -->

                <div class="latest-product-active slick-padding slick-arrow-style">

                    <!-- product single item start -->

                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <div class="product-item fix">

                        <div class="product-thumb">

                            <a href="<?php echo e(route('product-details', ['details'=>$list->productSlug])); ?>">

                                <?php if($list->photo == ""): ?>

                                    <img src="images/no-image.jpg"/>

                                <?php else: ?>

                                    <img src="<?php echo e(asset('images/featured/'.$list->photo)); ?>" alt="" />

                                <?php endif; ?>

                            </a>

                        </div>

                        <div class="product-content">

                            <h4><a href="<?php echo e(route('product-details', ['details'=>$list->productSlug])); ?>"><?php echo e($list->productName); ?></a></h4>

                            <div class="pricebox">

                                <span class="regular-price">&#8369;<?php echo e(number_format($list->productPrice,2)); ?></span>

                                <div class="ratings">



                                    <div class="pro-review float-right">

                                        <span><?php echo e($list->view); ?> view(s)</span>

                                    </div>

                                </div>

                            </div>

                        </div>





                    </div>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <!-- product single item end -->



                </div>

                <!-- featured category end -->

            </div>

        </div>

        <!-- latest product end -->



    </div>





<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Sites\shop_04-11-2020\resources\views/main.blade.php ENDPATH**/ ?>