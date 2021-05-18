<?php $__env->startSection('fbMetaTags'); ?>

        <meta property="og:url"           content="https://www.baguioonline.com" />
        <meta property="og:type"          content="article" />
        <meta property="og:title"         content="Baguio Online: Online Shopping for Electronics, Computers, Books, Clothes & more" />
        <meta property="og:description"   content="Buy & Sell electronics, computers, books, clothes & more on Baguio Online. Free registration and easy to use." />
        <meta property="fb:app_id"        content="169994830983601"/>
        <meta property="og:image"     content="<?php echo e(asset('images/cover/logoBaguioOnline.jpg')); ?>" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>



<!-- hero slider start -->

<div class="hero-slider-area">

        <div class="container">

            <div class="row">

                <div class="col-lg-12">

                    <div class="slider-wrapper-area2 mt-30 mb-30">

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

                    <div class="col-lg-9">

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

                                                    <img src="<?php echo e(asset('images/featured/'.$list->photo)); ?>" alt="" height="188" width="251" />



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

                    <div class="col-lg-3">
                        <div class="main-sidebar category-wrapper mb-24 pt-20 mt-md-8">
                            <div class="section-title-2 d-flex justify-content-between mb-28">
                                <h3>latest product</h3>
                                <div class="category-append"></div>
                            </div> <!-- section title end -->
                            <div class="category-carousel-active row" data-row="4">
                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col">
                                    <div class="category-item">
                                        <div class="category-thumb">
                                        <a href="<?php echo e(route('product-details', ['details'=>$list->productSlug])); ?>">
                                            <?php if($list->photo == ""): ?>

                                                <img src="images/no-image.jpg"/>

                                            <?php else: ?>

                                                <img src="<?php echo e(asset('images/featured/'.$list->photo)); ?>" alt="" />

                                            <?php endif; ?>

                                            </a>
                                        </div>
                                        <div class="category-content">
                                            <h4><a href="<?php echo e(route('product-details', ['details'=>$list->productSlug])); ?>"><?php echo e($list->productName); ?></a></h4>
                                            <div class="price-box">
                                                <div class="regular-price">
                                                    &#8369;<?php echo e(number_format($list->productPrice,2)); ?>

                                                </div>

                                            </div>
                                            <div class="ratings">

                                                <div class="pro-review">
                                                    <span>1 view(s)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- end single item -->
                                </div> <!-- end single item column -->
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                        <!-- best seller area end -->

                    </div>

                </div>

            </div>

        </div>

        <!-- page wrapper end -->


    </div>


<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customer/www/baguioonline.com/public_html/resources/views/main.blade.php ENDPATH**/ ?>