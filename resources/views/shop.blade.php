@extends('layouts.master')

@section('fbMetaTags')
   
        <meta property="og:url"           content="https://www.baguioonline.com" />
        <meta property="og:type"          content="article" />
        <meta property="og:title"         content="" />
        <meta property="og:description"   content="Buy & Sell electronics, computers, books, clothes & more on Baguio Online. Free registration and easy to use." />
        <meta property="fb:app_id"        content="169994830983601"/>
       
            <meta property="og:image"     content="{{ asset('images/cover/logoBaguioOnline.jpg') }}" />
  

@stop

@section('content')

<!-- breadcrumb area start -->

<div class="breadcrumb-area">

            <div class="container">

                <div class="row">

                    <div class="col-12">

                        <div class="breadcrumb-wrap">

                            <nav aria-label="breadcrumb">

                                <ul class="breadcrumb">

                                    <li class="breadcrumb-item" aria-current="page">{{ Breadcrumbs::render('shop') }}</li>

                                </ul>

                            </nav>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- breadcrumb area end -->



        <!-- page wrapper start -->

        <div class="page-main-wrapper mb-5">

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

                                        @foreach($subCategory as $list)

                                        <li>

                                        <a href="{{url('category?category='.$list->sub_category_slug)}}">{{$list->sub_category}}</a></li>



                                        @endforeach

                                    </ul>

                                </div>

                            </div>

                            <!-- sidebar categorie start -->







                            <!-- sidebar banner start -->

                            <div class="sidebar-widget mb-30">

                                <div class="img-container fix img-full">

                                    <!-- <a href="#"><img src="assets/img/banner/banner_shop.jpg" alt=""></a> -->
                                    
                                </div>

                            </div>

                            <!-- sidebar banner end -->

                        </div>

                    </div>

                    <!-- sidebar end -->



                    <!-- product main wrap start -->

                    <div class="col-lg-9 order-1 order-lg-2">

                        <div class="shop-banner img-full">

                            <!-- <img src="assets/img/banner/banner_static1.jpg" alt=""> -->
                            <h2>{{ucfirst($title)}}</h2>
                        </div>

                        <!-- product view wrapper area start -->

                        <div class="shop-product-wrapper pt-34">

                            <!-- shop product top wrap start -->

                            <div class="shop-top-bar">

                                <div class="row">

                                    <div class="col-lg-7 col-md-6">

                                        <div class="top-bar-left">

                                            <div class="product-view-mode mr-70 mr-sm-0">

                                                

                                            </div>

                                            <div class="product-amount">

                                            <div>Showing {{($product->currentpage()-1)*$product->perpage()+1}} to {{$product->currentpage()*$product->perpage()}} of  {{$product->total()}} entries</div>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-lg-5 col-md-6">

                                        <div class="top-bar-right">

                                            <div class="product-short">

                                                <!-- <p>Sort By : </p>

                                                <select class="nice-select" name="sortby">

                                                    <option value="trending">Relevance</option>

                                                    <option value="sales">Name (A - Z)</option>

                                                    <option value="sales">Name (Z - A)</option>

                                                    <option value="rating">Price (Low &gt; High)</option>

                                                    <option value="date">Rating (Lowest)</option>

                                                    <option value="price-asc">Model (A - Z)</option>

                                                    <option value="price-asc">Model (Z - A)</option>

                                                </select> -->

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <!-- shop product top wrap start -->



                            <!-- product item start -->

                            <div class="shop-product-wrap grid row">

                                @foreach($product as $list)

                                <div class="col-lg-3 col-md-4 col-sm-6">

                                    <!-- product single grid item start -->

                                    <div class="product-item fix mb-30">

                                        <div class="product-thumb">

                                            <a href="{{url('product-details?details='.$list->productSlug)}}">

                                                <img src="{{ asset('images/featured/'.$list->photo) }}" class="img-pri" alt="">

                                            </a>

                                        </div>

                                        <div class="product-content">

                                            <h4><a href="{{url('product-details?details='.$list->productSlug)}}">{{$list->productName}}</a></h4>

                                            <div class="pricebox">

                                                <span class="regular-price">Php {{number_format($list->productPrice,2)}}</span>

                                                <div class="pro-review float-right">

                                                    <span>{{$list->view}} view(s)</span>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                    <!-- product single grid item end -->



                                </div> <!-- product single column end -->

                                @endforeach









                            </div>

                            <!-- product item end -->

                        </div>

                        <!-- product view wrapper area end -->



                        <!-- start pagination area -->

                        <div class="paginatoin-area text-center pt-28">

                            <div class="row">



                                <div class="col-sm"></div>

                                <div class="col-sm">

                                    

                                    {{ $product->appends(['category' => $list->sub_category_slug])->links() }}

                                </div>

                                <div class="col-sm"></div>

                            </div>

                        </div>

                        <!-- end pagination area -->



                    </div>

                    <!-- product main wrap end -->

                </div>

            </div>

        </div>

        <!-- page wrapper end -->



       

</div>





@endsection

