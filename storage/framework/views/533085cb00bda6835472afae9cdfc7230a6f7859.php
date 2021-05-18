

<?php $__env->startSection('fbMetaTags'); ?>
    <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $meta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <meta property="og:url"           content="https://www.baguioonline.com/store/<?php echo e($meta->slug_shop); ?>" />
        <meta property="og:type"          content="article" />
        <meta property="og:title"         content="<?php echo e($meta->shop_name); ?>" />
        <meta property="og:description"   content="Buy & Sell electronics, computers, books, clothes & more on Baguio Online. Free registration and easy to use." />
        <meta property="fb:app_id"        content="169994830983601"/>
        <?php if($meta->cover_user == "no-image.jpg"): ?>
            <meta property="og:image"     content="<?php echo e(asset('images/cover/logoBaguioOnline.jpg')); ?>" />
        <?php else: ?>
            <meta property="og:image"     content="<?php echo e(asset('images/cover/'.$meta->cover_user)); ?>" />
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__env->stopSection(); ?>

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
            <div class="col-lg-9 order-1 order-lg-1 mb-5">
               
                   
               <!-- shop cover top wrap start -->
               <div class="shop-top-bar">
                   <div class="row">
                       <div class="col-lg-12 col-md-12">   
                       <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cover): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <?php if($cover->cover_user=="no-image.jpg"): ?>

                           <?php elseif(is_null($cover->cover_user)): ?>
                               
                           <?php else: ?>
                           <div class="image-widescreen">
                               <img src="<?php echo e(asset('images/cover/'.$cover->cover_user)); ?>" class="img-fluid w-100" alt="profile">
                           </div>    
                           <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                             
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

            <div class="col-lg-3 order-2 order-lg-2">
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
                                <li><i class="fa fa-user"></i> <?php echo e($list->shop_name); ?></li>
                                <li><i class="fa fa-map-marker"></i>  <?php echo $list->address; ?></li>
                                <li><i class="fa fa-phone"></i> <?php echo e($list->contact); ?></li>
                            </ul>
                           
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                    </div>
                </div>
            </div>
           
        </div>
    
</div>




<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customer/www/baguioonline.com/public_html/resources/views/seller.blade.php ENDPATH**/ ?>