@extends('layouts.master')

@section('fbMetaTags')
    @foreach($details as $meta)
        <meta property="og:url"           content="https://www.baguioonline.com/product-details?details={{$meta->productSlug}}" />
        <meta property="og:type"          content="article" />
        <meta property="og:title"         content="{{$meta->productName}}" />
        <meta property="og:description"   content="{{strip_tags($meta->productDescription)}}" />
        <meta property="fb:app_id"        content="169994830983601"/>
        <meta property="og:image"     content="{{ asset('images/featured/'.$meta->photo) }}" />
       
    @endforeach

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

                                    <li class="breadcrumb-item">{{ Breadcrumbs::render('product-details') }}</li>   

                                </ul>

                            </nav>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- breadcrumb area end -->



        <!-- product details wrapper start -->

        <div class="product-details-wrapper">





            @foreach($details as $product)



            <div class="container">

                <div class="row">

                    <div class="col-lg-9">

                        <!-- product details inner end -->

                        <div class="product-details-inner">

                            <div class="row">

                                <div class="col-lg-6">

                                    <div class="product-large-slider mb-20 slick-arrow-style_2">

                                    @forelse ($images as $img)



                                        <div class="pro-large-img img-zoom" id="{{$img->id}}">

                                            <img src="{{asset('images/'.$img->image)}}" alt="" />

                                        </div>

                                    @empty

                                        <div class="pro-large-img img-zoom" id="">

                                            <img src="{{asset('images/featured/'.$product->photo)}}"/>

                                        </div>

                                    @endforelse

                                    </div>



                                    <div class="pro-nav slick-padding2 slick-arrow-style_2">



                                    @forelse ($images as $img)

                                        <div class="pro-nav-thumb"><img src="{{asset('images/'.$img->image)}}" alt="" /></div>

                                    @empty

                                        <div class="pro-nav-thumb"> <img src="{{asset('images/featured/'.$product->photo)}}"/></div>

                                    @endforelse



                                    </div>

                                </div>

                                <div class="col-lg-6">



                                    <div class="product-details-des mt-md-34 mt-sm-34">

                                    @include('flash-message')<br>

                                    <h3><a href="{{route('product-details', ['details'=>$product->productSlug])}}">{{$product->productName}}</a></h3>

                                        <div class="pricebox">

                                            <span class="regular-price">&#8369;{{number_format($product->productPrice,2)}}</span>

                                        </div>

                                        <p>{!!substr($product->productDescription, 0,  300)!!}</p>





                                        <div class="availability mt-10">



                                            <ul class="location">

                                                <li><i class="fa fa-user"></i>Seller:  {{$product->name}}</li>

                                                <li><i class="fa fa-phone"></i>Contact Number:  {{$product->contact}}</li>

                                                @if($product->address==null)

                                                    <li></li>

                                                @else

                                                    <li><i class="fa fa-map-marker"></i>Address:  {!!$product->address!!}</li>

                                                @endif

                                            </ul>

                                        </div>



                                        <div class="share-icon mt-20">

                                            <a class="facebook" href="{{$product->facebook}}" target="_blank"><i class="fa fa-facebook"></i>like</a>

                                            <a class="pinterest" href="{{$product->instagram}}" target="_blank"><i class="fa fa-instagram"></i>follow</a>

                                            <a class="google" href="{{$product->website}}" target="_blank"><i class="fa fa-globe"></i>visit</a>

                                        </div><hr>

                                        <a href="{{route('sellerPage',$product->slug_shop)}}" class="btn btn-danger ">Visit Shop</a>

                                        <a href="#" class="btn btn-info"  data-toggle="modal" data-target="#myModal">Send Message</a>

                                        

                                    </div>

                                </div>

                            </div>

                        </div>

                        <!-- product details inner end -->



                        <!-- product details reviews start -->

                        <div class="product-details-reviews mt-34">

                            <div class="row">

                                <div class="col-lg-12">

                                    <div class="product-review-info">

                                        <ul class="nav review-tab">

                                            <li>

                                                <a class="active" data-toggle="tab" href="#tab_one">description</a>

                                            </li>

                                            <li>

                                                <a data-toggle="tab" href="#tab_two">information</a>

                                            </li>



                                        </ul>

                                        <div class="tab-content reviews-tab">

                                            <div class="tab-pane fade show active" id="tab_one">

                                                <div class="tab-one">

                                                    {!!$product->productDescription!!}

                                                </div>

                                            </div>

                                            <div class="tab-pane fade" id="tab_two">

                                                <table class="table table-bordered">

                                                    <tbody>

                                                        <tr>

                                                            <td>color</td>

                                                            <td>{{$product->productColor}}</td>

                                                        </tr>

                                                        <tr>

                                                            <td>size</td>

                                                            <td>{{$product->productSize}}</td>

                                                        </tr>

                                                    </tbody>

                                                </table>

                                            </div>



                                        </div>

                                    </div>

                                </div>

                            </div>

                            @endforeach

                        </div>

                        <!-- product details reviews end -->



                        <!-- related products area start -->

                        <div class="related-products-area mt-34 mb-5">

                            <div class="section-title mb-30">

                                <div class="title-icon">

                                    <i class="fa fa-desktop"></i>

                                </div>

                                <h3>related products</h3>

                            </div> <!-- section title end -->

                            <!-- featured category start -->

                            <div class="featured-carousel-active slick-padding slick-arrow-style">

                                <!-- product single item start -->

                                @foreach($related as $list)

                                <div class="product-item fix">

                                    <div class="product-thumb">

                                        <a href="{{route('product-details', ['details'=>$list->productSlug])}}">

                                        @if ($list->photo == "")

                                            <img src="images/no-image.jpg"/>

                                        @else

                                            <img src="{{asset('images/featured/'.$list->photo)}}" alt="" />

                                        @endif



                                        </a>



                                    </div>

                                    <div class="product-content">

                                        <h4><a href="{{route('product-details', ['details'=>$list->productSlug])}}">{{$list->productName}}</a></h4>

                                        <div class="pricebox">

                                            <span class="regular-price">&#8369;{{number_format($list->productPrice,2)}}</span>

                                            <div class="ratings">



                                                <div class="pro-review float-right">

                                                    <span>{{$list->view}} view(s)</span>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                                @endforeach

                                <!-- product single item end -->



                            </div>

                            <!-- featured category end -->

                        </div>

                        <!-- related products area end -->

                    </div>



                    <!-- sidebar start -->

                    <div class="col-lg-3">

                        <div class="shop-sidebar-wrap fix mt-md-22 mt-sm-22">

                            <!-- featured category start -->

                            <div class="sidebar-widget mb-22">

                                <div class="section-title-2 d-flex justify-content-between mb-28">

                                    <h3>Other Products</h3>

                                    <div class="category-append"></div>

                                </div> <!-- section title end -->

                                @foreach($random as $list)

                                <div class="category-carousel-active row" data-row="4">

                                    <div class="col">

                                        <div class="category-item">

                                            <div class="category-thumb">

                                                <a href="product-details.html">

                                                    <img src="{{asset('images/featured/'.$list->photo)}}" alt="">

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

                                                        <span>{{$list->view}} view(s)</span>

                                                    </div>

                                                </div>

                                            </div>

                                        </div> <!-- end single item -->

                                    </div> <!-- end single item column -->



                                </div>

                                @endforeach



                                <!-- sidebar banner start -->

                            <div class="sidebar-widget mb-22">

                                <div class="img-container fix img-full mt-30">

                                    <!-- <a href="#"><img src="assets/img/banner/banner_shop.jpg" alt=""></a> -->

                                </div>

                            </div>

                            <!-- sidebar banner end -->

                                

                            </div>

                            <!-- featured category end -->













                        </div>

                    </div>

                    <!-- sidebar end -->

                </div>

            </div>

        </div>

        <!-- product details wrapper end -->











        <!-- Modal -->

        <div id="myModal" class="modal fade" role="dialog">

        <div class="modal-dialog modal-lg">



            <!-- Modal content-->

            <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal">&times;</button>

                <h4 class="modal-title"></h4>

            </div>

            <div class="modal-body">

            <div class="contact-message">

                <h2>Send a Message</h2>

                <div class="contact-info">

                @foreach($details as $product)

                    <ul>



                        <li><i class="fa fa-shopping-cart"></i> Product Name : {{$product->productName}}</li>

                        <li><i class="fa fa-tag"></i> Price : {{number_format($product->productPrice,2)}}</li>

                    </ul>





                </div>



                <form method="post"  action="{{ url('submit_message/'.$product->productSlug) }}" class="contact-form">

                @csrf

                    <div class="row">

                        <div class="col-lg-6 col-md-6 col-sm-6">

                            <input name="name" placeholder="Name *" type="text" required>

                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6">

                            <input name="contact" placeholder="Phone *" type="text" required>

                        </div>

                        <div class="col-12">

                            <input name="subject" placeholder="Subject *" type="text">

                        </div>

                        <div class="col-12">

                            <div class="contact2-textarea text-center">

                                <textarea placeholder="Message *" name="message"  class="form-control2" required=""></textarea>

                            </div>



                        </div>

                        <div class="col-12">

                            <div class="contact2-textarea text-center">

                            {!! htmlFormSnippet() !!}

                            </div>



                        </div>

                        

                    </div>



                    <div class="modal-footer">

                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                        <button class="btn btn-danger" type="submit">Send Message</button>

                    </div>

                    </form>

                    @endforeach

            </div>

            </div>

            </div>



        </div>

        </div>

@endsection

