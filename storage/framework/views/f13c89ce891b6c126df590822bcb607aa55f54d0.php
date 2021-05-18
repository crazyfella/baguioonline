<?php $__env->startSection('content'); ?>
<div class="container mt-5 mb-5">

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
                                <h3>Search</h3>
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
                                        <p>No Result Found</p>
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

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Sites\haaayyyss\resources\views/search.blade.php ENDPATH**/ ?>