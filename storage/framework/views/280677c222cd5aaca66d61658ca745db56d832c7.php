<?php $__env->startSection('content'); ?>
<!-- breadcrumb area start -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb-wrap">
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">shop</a></li>
                            <li class="breadcrumb-item active" aria-current="page">product retail</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb area end -->

<div class="product-details-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-2">
                            <div class="profile-img-wrap">
                                <div class="text-center">
                                    <img src="<?php echo e(asset('images/profile/'.$list->photo_user)); ?>" class="" alt="profile">
                                    </div>
                            </div>
                        </div>
                        <div class="col-lg-10 contact-info mt-md-28 mt-sm-28">

                            <ul>
                                <li><i class="fa fa-user"></i> Shop Name : <?php echo e($list->shop_name); ?></li>
                                <li><i class="fa fa-fax"></i> Address :  <?php echo $list->address; ?></li>
                                <li><i class="fa fa-phone"></i> Contact Number : <?php echo e($list->contact); ?></li>
                            </ul>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    <hr class="style">
</div>


<!-- page wrapper start for list of products-->
<div class="page-main-wrapper mb-5">
    <div class="container">
        <div class="row">
            <!-- product main wrap start -->
            <div class="col-lg-12 order-1 order-lg-2">
                <!-- product view wrapper area start -->
                <div class="shop-product-wrapper pt-34">
                    <!-- shop product top wrap start -->
                    <div class="shop-top-bar">
                        <div class="row">
                            <div class="col-lg-7 col-md-6">
                                <div class="top-bar-left">

                                    <div class="product-amount">
                                        <div>Showing <?php echo e(($product->currentpage()-1)*$product->perpage()+1); ?> to <?php echo e($product->currentpage()*$product->perpage()); ?> of  <?php echo e($product->total()); ?> entries</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-6">
                                <div class="top-bar-right">
                                    <div class="product-short">
                                       
                                        <!-- <b>Price:</b> <a href="#"> Low to High <a>| <a href="#"> High to Low <a> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- shop product top wrap start -->

                    <!-- product item start -->
                    <div class="shop-product-wrap grid row">    
                        <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>        
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <!-- product single grid item start -->
                            <div class="product-item fix mb-30">
                                <div class="product-thumb">
                                    <a href="<?php echo e(url('product-details?details='.$list->productSlug)); ?>">
                                        <img src="<?php echo e(asset('images/featured/'.$list->photo)); ?>" class="img-pri" alt="">
                                    </a>
                                </div>
                                <div class="product-content">
                                    <h4><a href="<?php echo e(url('product-details?details='.$list->productSlug)); ?>"><?php echo e($list->productName); ?></a></h4>
                                    <div class="pricebox">
                                        <span class="regular-price">Php <?php echo e(number_format($list->productPrice,2)); ?></span>
                                        <div class="ratings">
                                        
                                            <div class="pro-review">
                                                <span><?php echo e($list->view); ?> view(s)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- product single grid item end -->
                        
                        </div> <!-- product single column end -->
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <!-- product item end -->
                </div>
                <!-- product view wrapper area end -->

                <!-- start pagination area -->
                <div class="paginatoin-area text-center pt-28">
                    <div class="row">

                        <div class="col-sm"></div>
                        <div class="col-sm">
                            <?php echo e($product->links()); ?>

                        </div>
                        <div class="col-sm"></div>
                    </div>
                </div>
                <!-- end pagination area -->

            </div>
            <!-- product main wrap end -->
        </div>
    </div>
</div> <!-- page wrapper end -->



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Sites\haaayyyss\resources\views/seller.blade.php ENDPATH**/ ?>