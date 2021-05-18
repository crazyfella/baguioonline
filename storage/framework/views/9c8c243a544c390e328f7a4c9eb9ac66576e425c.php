<!DOCTYPE html>

<html class="no-js" lang="en">



<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="Buy & Sell electronics, computers, books, clothes & more on Baguio Online. Free registration and easy to use.">

    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-162440241-1"></script>

    <script>

    window.dataLayer = window.dataLayer || [];

    function gtag(){dataLayer.push(arguments);}

    gtag('js', new Date());

    gtag('config', 'UA-162440241-1');

    </script>
    

    <!-- Site title -->

    <title>Baguio Online: Online Shopping for Electronics, Computers, Books, Clothes & more</title>

    <!-- Favicon -->

    <link rel="shortcut icon" href="<?php echo e(asset('assets/img/favicon.ico')); ?>" type="image/x-icon" />

    <!-- Bootstrap CSS -->

    <link href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>" rel="stylesheet">

    <!-- Font-Awesome CSS -->

    <link href="<?php echo e(asset('assets/css/font-awesome.min.css')); ?>" rel="stylesheet">

    <!-- helper class css -->

    <link href="<?php echo e(asset('assets/css/helper.min.css')); ?>" rel="stylesheet">

    <!-- Plugins CSS -->

    <link href="<?php echo e(asset('assets/css/plugins.css')); ?>" rel="stylesheet">

    <!-- Social Button CSS -->

    <link href="<?php echo e(asset('assets/css/bootstrap-social.css')); ?>" rel="stylesheet">

    <!-- Main Style CSS -->

    <link href="<?php echo e(asset('assets/css/style.css')); ?>" rel="stylesheet">



    <link href="<?php echo e(asset('assets/css/skin-default.css')); ?>" rel="stylesheet" id="galio-skin">

    <link href="<?php echo e(asset('pace/themes/red/pace-theme-bounce.css')); ?>" rel="stylesheet" />

    
    <script data-ad-client="ca-pub-6685871233475089" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

    <?php echo htmlScriptTagJsApi(); ?>



</head>



<body>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&appId=287600731342777&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


    <div id="app" >

    <div class="wrapper box-layout">



        <!-- header area start -->

        <header>



            <!-- header top start -->

            <div class="header-top-area bg-gray text-center text-md-left">

                <div class="container">

                    <div class="row">

                        <div class="col-lg-6 col-md-5">

                            <div class="header-call-action">

                                <a href="#">

                                    <i class="fa fa-envelope"></i>

                                    info@website.com

                                </a>

                                <a href="#">

                                    <i class="fa fa-phone"></i>

                                    +63 915 6623 243
                                    

                                </a>

                            </div>

                        </div>

                        <div class="col-lg-6 col-md-7">

                            <div class="header-top-right float-md-right float-none">



                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <!-- header top end -->



            <!-- header middle start -->

            <div class="header-middle-area header-middle-style-2 pt-20 pb-20">

                <div class="container">

                    <div class="row align-items-center">

                        <div class="col-lg-3">

                            <div class="brand-logo">

                                <a href="/">

                                    <img src="<?php echo e(asset('assets/img/logo/logo.png')); ?>" alt="brand logo">

                                </a>

                            </div>

                        </div> <!-- end logo area -->

                        <div class="col-lg-9">

                            <div class="header-middle-right">

                                <div class="header-middle-shipping mb-20">

                                    <div class="single-block-shipping">

                                        <div class="shipping-icon">

                                            <i class="fa fa-registered"></i>

                                        </div>

                                        <div class="shipping-content">

                                            <h5>Register</h5>

                                            <span>Using your email or facebook account</span>

                                        </div>

                                    </div> <!-- end single shipping -->

                                    <div class="single-block-shipping">

                                        <div class="shipping-icon">

                                            <i class="fa fa-list"></i>

                                        </div>

                                        <div class="shipping-content">

                                            <h5>add products</h5>

                                            <span>add what you sell</span>

                                        </div>

                                    </div> <!-- end single shipping -->

                                    <div class="single-block-shipping">

                                        <div class="shipping-icon">

                                            <i class="fa fa-money"></i>

                                        </div>

                                        <div class="shipping-content">

                                            <h5>Sell</h5>

                                            <span>Share and market your shop</span>

                                        </div>

                                    </div> <!-- end single shipping -->

                                </div>

                                <div class="header-middle-block">

                                    <div class="header-middle-searchbox">

                                        <form action="<?php echo e(route('search')); ?>" method="post">

                                        <?php echo csrf_field(); ?>

                                        <input type="text" placeholder="Search Product..." id="search_text" name="search_product" >

                                        <button class="search-btn" type="submit"><i class="fa fa-search"></i></button>

                                       </form>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <!-- header middle end -->



            <!-- main menu area start -->

            <div class="main-header-wrapper bdr-bottom1">

                <div class="container">

                    <div class="row">

                        <div class="col-lg-12">

                            <div class="main-header-inner header-2">

                                <div class="category-toggle-wrap">

                                    <div class="category-toggle">

                                        category

                                        <div class="cat-icon">

                                            <i class="fa fa-angle-down"></i>

                                        </div>

                                    </div>

                                    <nav class="category-menu category-style-2">



                                        <ul>



                                            <li class="menu-item-has-children"><a href="<?php echo e(route('category-products', ['category'=>'automative-motorcycles'])); ?>"><i class="fa fa-camera"></i> Automative & Motorcycles</a>



                                                <ul class="category-mega-menu">

                                                    <?php $__currentLoopData = $automative; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                        <li>

                                                        <a href="<?php echo e(route('shop.index', ['category'=>$list->sub_category_slug])); ?>"><?php echo e($list->sub_category); ?></a>

                                                        </li>

                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                                                </ul>

                                            </li>



                                            <li class="menu-item-has-children"><a href="<?php echo e(route('category-products', ['category'=>'sports-lifestyle'])); ?>"><i class="fa fa-camera"></i> Sports & Lifestyle</a>



                                                <ul class="category-mega-menu">

                                                    <?php $__currentLoopData = $sport; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                        <li>

                                                        <a href="<?php echo e(route('shop.index', ['category'=>$list->sub_category_slug])); ?>"><?php echo e($list->sub_category); ?></a>

                                                        </li>

                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                                                </ul>

                                            </li>



                                            <li class="menu-item-has-children"><a href="<?php echo e(route('category-products', ['category'=>'fashions'])); ?>"><i class="fa fa-camera"></i> Fashions</a>



                                                <ul class="category-mega-menu">

                                                    <?php $__currentLoopData = $fashion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                        <li>

                                                        <a href="<?php echo e(route('shop.index', ['category'=>$list->sub_category_slug])); ?>"><?php echo e($list->sub_category); ?></a>

                                                        </li>

                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                                                </ul>

                                            </li>



                                            <li class="menu-item-has-children"><a href="<?php echo e(route('category-products', ['category'=>'home-living'])); ?>"><i class="fa fa-camera"></i> Home and Living</a>



                                                <ul class="category-mega-menu">

                                                    <?php $__currentLoopData = $food; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                        <li>

                                                        <a href="<?php echo e(route('shop.index', ['category'=>$list->sub_category_slug])); ?>"><?php echo e($list->sub_category); ?></a>

                                                        </li>

                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                                                </ul>

                                            </li>





                                            <li class="menu-item-has-children"><a href="<?php echo e(route('category-products', ['category'=>'foods-pets'])); ?>"><i class="fa fa-camera"></i> Foods & Pets</a>



                                                <ul class="category-mega-menu">

                                                    <?php $__currentLoopData = $home; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                        <li>

                                                        <a href="<?php echo e(route('shop.index', ['category'=>$list->sub_category_slug])); ?>"><?php echo e($list->sub_category); ?></a>

                                                        </li>

                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                                                </ul>

                                            </li>



                                            <li class="menu-item-has-children"><a href="<?php echo e(route('category-products', ['category'=>'babies-toys'])); ?>"><i class="fa fa-camera"></i> Babies & Toys</a>



                                                <ul class="category-mega-menu">

                                                    <?php $__currentLoopData = $baby; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                        <li>

                                                        <a href="<?php echo e(route('shop.index', ['category'=>$list->sub_category_slug])); ?>"><?php echo e($list->sub_category); ?></a>

                                                        </li>

                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                                                </ul>

                                            </li>



                                            <li class="menu-item-has-children"><a href="<?php echo e(route('category-products', ['category'=>'health-beauty'])); ?>"><i class="fa fa-camera"></i> Health & Beauty</a>



                                                <ul class="category-mega-menu">

                                                    <?php $__currentLoopData = $health; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                        <li>

                                                        <a href="<?php echo e(route('shop.index', ['category'=>$list->sub_category_slug])); ?>"><?php echo e($list->sub_category); ?></a>

                                                        </li>

                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                                                </ul>

                                            </li>



                                            <li class="menu-item-has-children"><a href="<?php echo e(route('category-products', ['category'=>'tv-home-appliances'])); ?>"><i class="fa fa-camera"></i> TV & Home Appliances</a>



                                                <ul class="category-mega-menu">

                                                    <?php $__currentLoopData = $appliance; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                        <li>

                                                        <a href="<?php echo e(route('shop.index', ['category'=>$list->sub_category_slug])); ?>"><?php echo e($list->sub_category); ?></a>

                                                        </li>

                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                                                </ul>

                                            </li>



                                            <li class="menu-item-has-children"><a href="<?php echo e(route('category-products', ['category'=>'electronic-devices'])); ?>"><i class="fa fa-camera"></i> Electronic Devices</a>



                                                <ul class="category-mega-menu">

                                                    <?php $__currentLoopData = $electronic; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                        <li>

                                                            <a href="<?php echo e(route('shop.index', ['category'=>$list->sub_category_slug])); ?>"><?php echo e($list->sub_category); ?></a>

                                                        </li>

                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                                                </ul>

                                            </li>





                                        </ul>

                                    </nav>

                                </div>

                                <div class="main-menu">

                                    <nav id="mobile-menu">

                                        <ul>

                                            <li><a href="<?php echo e(url('/')); ?>">Home</a></li>

                                            <?php if(Auth::check()): ?>

                                                <li><a href="<?php echo e(url('home#/dashboard')); ?>">My Account</a></li>
                                                <li><a href="<?php echo e(url('store')); ?>/<?php echo e(Auth::user()->slug_shop); ?>">My Store</a></li>
                                            <?php else: ?>

                                                <li><a href="<?php echo e(url('/login')); ?>">Login</a></li>

                                                <li><a href="<?php echo e(url('/register')); ?>">Sign Up</a></li>

                                            <?php endif; ?>

                                            <li><a href="<?php echo e(url('/pricing')); ?>">Pricing</a></li>

                                            <li><a href="<?php echo e(url('/contact-us')); ?>">Contact us</a></li>



                                        </ul>

                                    </nav>

                                </div>

                                <div class="mini-cart2">
                                
                                </div>
                               
                               
                                </div>

                            </div>

                        </div>

                        <div class="col-12 d-block d-lg-none"><div class="mobile-menu"></div></div>

                    </div>

                </div>

            </div>

            <!-- main menu area end -->



        </header>

        <!-- header area end -->



        <?php echo $__env->yieldContent('content'); ?>

        

        <!-- footer area start -->  

        <footer>

            <!-- footer top start -->

            <div class="footer-top bg-black pt-14 pb-14">

                <div class="container">

                    <div class="footer-top-wrapper">

                        <div class="newsletter__wrap">

                            <div class="newsletter__title">

                                <!-- <div class="newsletter__icon">

                                    <i class="fa fa-envelope"></i>

                                </div> -->

                                <div class="newsletter__content">

                                    <!-- <h3>sign up for newsletter</h3>

                                    <p>Duis autem vel eum iriureDuis autem vel eum</p> -->

                                </div>

                            </div>

                            <div class="newsletter__box">

                                <!-- <form id="mc-form">

                                    <input type="email" id="mc-email" autocomplete="off" placeholder="Email">

                                    <button id="mc-submit">subscribe!</button>

                                </form> -->

                            </div>

                            <!-- mailchimp-alerts Start -->

                            <div class="mailchimp-alerts">

                                <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->

                                <div class="mailchimp-success"></div><!-- mailchimp-success end -->

                                <div class="mailchimp-error"></div><!-- mailchimp-error end -->

                            </div>

                            <!-- mailchimp-alerts end -->

                        </div>

                        <div class="social-icons">

                            <!-- <a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a>

                            <a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a>

                            <a href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="fa fa-instagram"></i></a>

                            <a href="#" data-toggle="tooltip" data-placement="top" title="Google-plus"><i class="fa fa-google-plus"></i></a>

                            <a href="#" data-toggle="tooltip" data-placement="top" title="Youtube"><i class="fa fa-youtube"></i></a> -->

                        </div>

                    </div>

                </div>

            </div>

            <!-- footer top end -->



            <!-- footer main start -->

            <div class="footer-widget-area pt-40 pb-38 pb-sm-4 pt-sm-30">

                <div class="container">

                    <div class="row">

                        <div class="col-md-3 col-sm-6">

                            <div class="footer-widget mb-sm-26">

                                <div class="widget-title mb-10 mb-sm-6">

                                    <h4>contact us</h4>

                                </div>

                                <div class="widget-body">

                                    <ul class="location">

                                        <li><i class="fa fa-envelope"></i>info@baguioonline</li>

                                        <li><i class="fa fa-phone"></i>+63 915 662 3243</li>

                                        <li><i class="fa fa-map-marker"></i>Address:  Baguio City and La Trinidad</li>

                                    </ul>

                                </div>

                            </div> <!-- single widget end -->

                        </div> <!-- single widget column end -->

                        <div class="col-md-3 col-sm-6">

                            <div class="footer-widget mb-sm-26">

                                <div class="widget-title mb-10 mb-sm-6">

                                    <h4>menu</h4>

                                </div>

                                <div class="widget-body">

                                    <ul>

                                        <li><a href="<?php echo e(url('/')); ?>">Home</a></li>

                                        <?php if(Auth::check()): ?>

                                            <li><a href="<?php echo e(url('home#/dashboard')); ?>">My Account</a></li>

                                        <?php else: ?>

                                            <li><a href="<?php echo e(url('/login')); ?>">Login</a></li>

                                            <li><a href="<?php echo e(url('/register')); ?>">Sign Up</a></li>

                                        <?php endif; ?>

                                        <li><a href="<?php echo e(url('/pricing')); ?>">Pricing</a></li>

                                        <li><a href="<?php echo e(url('/contact-us')); ?>">Contact us</a></li>

                                    </ul>

                                </div>

                            </div> <!-- single widget end -->

                        </div> <!-- single widget column end -->

                        <div class="col-md-3 col-sm-6">

                            <div class="footer-widget mb-sm-26">

                                <div class="widget-title mb-10 mb-sm-6">

                                    <h4>product categories</h4>

                                </div>

                                <div class="widget-body">

                                    <ul>

                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                            <li><a href="<?php echo e(route('category-products', ['category'=>$list->category_slug])); ?>"><?php echo e($list->category); ?></a></li>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </ul>

                                </div>

                            </div> <!-- single widget end -->

                        </div> <!-- single widget column end -->

                        <div class="col-md-3 col-sm-6">

                            <div class="footer-widget mb-sm-26">

                                <div class="widget-title mb-10 mb-sm-6">

                                    <h4>product sub cateogries</h4>

                                </div>

                                <div class="widget-body">

                                    <ul>

                                        <?php $__currentLoopData = $sub_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                            <li><a href="<?php echo e(route('shop.index', ['category'=>$list->sub_category_slug])); ?>"><?php echo e($list->sub_category); ?></a></li>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </ul>

                                </div>

                            </div> <!-- single widget end -->

                        </div> <!-- single widget column end -->

                    </div>

                </div>

            </div>

            <!-- footer main end -->



            <!-- footer bootom start -->

            <div class="footer-bottom-area bg-gray pt-20 pb-20">

                <div class="container">

                    <div class="footer-bottom-wrap">

                        <div class="copyright-text">

                            <p><a href="#">Baguio Online © <?php echo e(now()->year); ?></a></p>

                        </div>

                        <div class="payment-method-img">

                           <a href="#" onclick="window.open('https://www.sitelock.com/verify.php?site=baguioonline.com','SiteLock','width=600,height=600,left=160,top=170');" ><img class="img-responsive" alt="SiteLock" title="SiteLock" src="//shield.sitelock.com/shield/baguioonline.com" /></a>

                        </div>

                    </div>

                </div>

            </div>

            <!-- footer bootom end -->



        </footer>

        <!-- footer area end -->

        </div>

    <!-- Scroll to top start -->

    <div class="scroll-top not-visible">

        <i class="fa fa-angle-up"></i>

    </div>

    <!-- Scroll to Top End -->





    </div>

    </div>

    <script src="<?php echo e(asset('js/app.js')); ?>"></script>

    <!--All jQuery, Third Party Plugins & Activation (main.js) Files-->

    <script src="<?php echo e(asset('assets/js/vendor/modernizr-3.6.0.min.js')); ?>"></script>

    <!-- Jquery Min Js -->

    <!-- <script src="<?php echo e(asset('assets/js/vendor/jquery-3.3.1.min.js')); ?>"></script> -->

    <script src="<?php echo e(asset('assets/js/jquery-1.12.4.js')); ?>"></script>

    <script src="<?php echo e(asset('assets/js/jquery-ui.js')); ?>"></script>

    <!-- Popper Min Js -->

    <script src="<?php echo e(asset('assets/js/vendor/popper.min.js')); ?>"></script>

    <!-- Bootstrap Min Js -->

    <script src="<?php echo e(asset('assets/js/vendor/bootstrap.min.js')); ?>"></script>

    <!-- Plugins Js-->

    <script src="<?php echo e(asset('assets/js/plugins.js')); ?>"></script>

    

    <!-- Active Js -->

    <script src="<?php echo e(asset('assets/js/main.js')); ?>"></script>

   

    <script src="https://cdnjs.cloudflare.com/ajax/libs/velocity/1.2.2/velocity.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/velocity/1.2.2/velocity.ui.min.js"></script>

    

  

    <script>

    $(document).ready(function() {

        src = "<?php echo e(route('searchajax')); ?>";

        $("#search_text").autocomplete({

            source: function(request, response) {

                $.ajax({

                    url: src,

                    dataType: "json",

                    data: {

                        term : request.term

                    },

                    success: function(data) {

                        response(data);

                    

                    }

                });

            },

            minLength: 3,

        

        });

    });

    </script>

<script>

paceOptions = {

    vue: false,

    ajax: false, // disabled,

document: false, // disabled

eventLag: false, // disabled



};

</script>

<script src="<?php echo e(asset('pace/pace.min.js')); ?>" type="text/javascript"></script>



   

    

    <?php echo $__env->yieldPushContent('scripts'); ?>



    

</body>





</html>

<?php /**PATH C:\Users\Glenn\Desktop\backup\resources\views/layouts/master.blade.php ENDPATH**/ ?>