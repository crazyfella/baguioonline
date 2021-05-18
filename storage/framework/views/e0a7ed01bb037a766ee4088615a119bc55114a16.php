<?php $__env->startSection('content'); ?>
<!-- breadcrumb area start -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb-wrap">
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                        <li class="breadcrumb-item" aria-current="page"><?php echo e(Breadcrumbs::render('shop')); ?></li>
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
            <!-- sidebar start -->
            <div class="col-lg-3 order-2 order-lg-1">
                <div class="shop-sidebar-wrap mt-md-28 mt-sm-28">
                    <!-- sidebar categorie start -->
                    <div class="sidebar-widget mb-30">
                    <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-12 mb-3">
                            <div class="profile-img-wrap">
                                <div class="text-center">
                                    <img src="<?php echo e(asset('images/profile/'.$list->photo_user)); ?>" class="" alt="profile">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 contact-info mt-md-28 mt-sm-28">

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
            <div class="col-lg-9 order-1 order-lg-2 mb-5">
               
                   
                    <!-- shop cover top wrap start -->
                    <div class="shop-top-bar">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">   
                                
                                <?php if($list->cover_user=="no-image.jpg"): ?>

                                <?php elseif(is_null($list->cover_user)): ?>
                                    
                                <?php else: ?>
                                <div class="image-widescreen">
                                    <img src="<?php echo e(asset('images/cover/'.$list->cover_user)); ?>" class="img-fluid w-100" alt="profile">
                                </div>    
                                <?php endif; ?>
                                  
                            </div>
                            
                        </div>
                    </div>
                    <!-- shop cover top wrap start -->

                    <!-- shop product top wrap start -->
                    <div class="shop-top-bar">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="top-bar-left">
                                    <div class="product-amount">
                                        <p> Showing <?php echo e(($product->currentpage()-1)*$product->perpage()+1); ?> to <?php echo e($product->currentpage()*$product->perpage()); ?> of  <?php echo e($product->total()); ?> entries</p>
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
        </div>
    
</div>




<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Sites\shop_05-01-2020\resources\views/seller.blade.php ENDPATH**/ ?>