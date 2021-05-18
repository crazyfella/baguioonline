<?php $__env->startSection('content'); ?>
<!-- breadcrumb area start -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb-wrap">
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item"><a href="shop-grid-left-sidebar.html">shop</a></li>
                            <li class="breadcrumb-item active" aria-current="page">product details</li>
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
                                <div class="text-center"><img src="<?php echo e(asset('images/profile/'.$list->photo_user)); ?>" class="" alt="profile"></div>
                            </div>
                        </div>
                        <div class="col-lg-10 contact-info mt-md-28 mt-sm-28">

                            <ul>
                                <li><i class="fa fa-user"></i> Seller Name : <?php echo e($list->name); ?></li>
                                <li><i class="fa fa-fax"></i> Address : <?php echo e($list->address); ?></li>
                                <li><i class="fa fa-phone"></i> Contact Number : <?php echo e($list->contact); ?></li>
                            </ul>
                        </div>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>

        </div>
        <hr class="style">
    </div>

     <!-- page wrapper start -->
     <div class="page-main-wrapper">
            <div class="container">
                <div class="row">




         <!-- sidebar start -->
         <div class="col-lg-3 order-2 order-lg-1">
            <div class="shop-sidebar-wrap mt-md-28 mt-sm-28">
                <!-- sidebar categorie start -->
                <div class="sidebar-widget mb-30">
                    <div class="sidebar-category">
                        <ul>
                            <li class="title"><i class="fa fa-bars"></i> categories</li>
                            <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><a href="<?php echo e(url('retailer-category/'.$list->slug_user.'/'. $list->sub_category_slug)); ?>"><?php echo e($list->sub_category); ?></a></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>
                <!-- sidebar categorie start -->
            </div>
        </div>
        <!-- sidebar end -->


        <!-- product main wrap start -->
        <div class="col-lg-9 order-1 order-lg-2">
            <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-3 col-md-4 col-sm-6">
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
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>


                </div>
            </div>
        </div>
    </div>
        <!-- page wrapper end -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Sites\haaayyyss\resources\views/seller_category.blade.php ENDPATH**/ ?>