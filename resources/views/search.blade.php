@extends('layouts.master')

@section('content')
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
                                    @forelse($products as $list)
                                    <div class="col">
                                        <div class="product-item fix mb-30">
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
                                                    <span class="regular-price">&#8369;{{number_format($list->productPrice,2)}}</span></span>
                                                    <div class="pro-review">
                                                    <span>{{$list->view}} view(s)</span>
                                                </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                        <p>No Result Found</p>
                                    @endforelse

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

@endsection
