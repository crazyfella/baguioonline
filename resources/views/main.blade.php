@extends('layouts.master')

@section('fbMetaTags')

        <meta property="og:url"           content="https://www.baguioonline.com" />
        <meta property="og:type"          content="article" />
        <meta property="og:title"         content="Baguio Online: Online Shopping for Electronics, Computers, Books, Clothes & more" />
        <meta property="og:description"   content="Buy & Sell electronics, computers, books, clothes & more on Baguio Online. Free registration and easy to use." />
        <meta property="fb:app_id"        content="169994830983601"/>
        <meta property="og:image"     content="{{ asset('images/cover/logoBaguioOnline.jpg') }}" />
@stop

@section('content')



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

                                            <a class="home-btn" href="{{ url('register') }}">register now</a>

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


                                            <a class="home-btn" href="{{ url('register') }}">register now</a>

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

                                    @forelse($products as $list)

                                    <div class="col">

                                        <div class="product-item fix mb-30">

                                            <div class="product-thumb">

                                                <a href="{{route('product-details', ['details'=>$list->productSlug])}}">

                                                @if ($list->photo == "")

                                                    <img src="images/no-image.jpg"/>

                                                @else

                                                    <img src="{{asset('images/featured/'.$list->photo)}}" alt="" height="188" width="251" />



                                                @endif

                                                </a>

                                            </div>

                                            <div class="product-content">

                                                <h4><a href="{{route('product-details', ['details'=>$list->productSlug])}}">{{$list->productName}}</a></h4>

                                                <div class="pricebox">

                                                    <span class="regular-price">&#8369;{{number_format($list->productPrice,2)}}</span></span>

                                                    <div class="pro-review">

                                        <span>{{$list->view}} view(s)</span>

                                    </div>



                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                    @empty

                                        <p>No replies</p>

                                    @endforelse



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
                                @foreach($products as $list)
                                <div class="col">
                                    <div class="category-item">
                                        <div class="category-thumb">
                                        <a href="{{route('product-details', ['details'=>$list->productSlug])}}">
                                            @if ($list->photo == "")

                                                <img src="images/no-image.jpg"/>

                                            @else

                                                <img src="{{asset('images/featured/'.$list->photo)}}" alt="" />

                                            @endif

                                            </a>
                                        </div>
                                        <div class="category-content">
                                            <h4><a href="{{route('product-details', ['details'=>$list->productSlug])}}">{{$list->productName}}</a></h4>
                                            <div class="price-box">
                                                <div class="regular-price">
                                                    &#8369;{{number_format($list->productPrice,2)}}
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
                                @endforeach
                            </div>
                        </div>
                        <!-- best seller area end -->

                    </div>

                </div>

            </div>

        </div>

        <!-- page wrapper end -->


    </div>


@endsection

