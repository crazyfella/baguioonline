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
                            <li class="breadcrumb-item active" aria-current="page">my account</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb area end -->

<div class="my-account-wrapper mb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- My Account Page Start -->
                <div class="myaccount-page-wrapper">
                    <!-- My Account Tab Menu Start -->
                    <div class="row">
                        <div class="col-lg-3 col-md-4">
                            <div class="myaccount-tab-menu nav" role="tablist">
                                <router-link to="/dashboard"><i class="fa fa-dashboard"></i>Dashboard</router-link>
                                <router-link to="/inbox"><i class="fa fa-inbox"></i>Inbox <span class="float-right text-danger">(<?php echo e($messages); ?>)</span></router-link>
                                <router-link to="/products"><i class="fa fa-cart-arrow-down"></i> Products</router-link>
                                <router-link to="/accountDetails"><i class="fa fa-lock"></i> Account Details</router-link>
                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                    <?php echo csrf_field(); ?>
                                </form>
                                <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> <i class="fa fa-sign-out"></i> <?php echo e(__('Logout')); ?></a>
                            </div>
                        </div>
                        <!-- My Account Tab Menu End -->
                        <div class="col-lg-9 col-md-8">
                            <router-view></router-view>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Glenn\Desktop\backup\resources\views/home.blade.php ENDPATH**/ ?>