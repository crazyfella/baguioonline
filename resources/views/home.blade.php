@extends('layouts.master')

@section('fbMetaTags')
    @foreach($user as $meta)
        <meta property="og:url"           content="https://www.baguioonline.com/store/{{$meta->slug_shop}}" />
        <meta property="og:type"          content="article" />
        <meta property="og:title"         content="{{$meta->shop_name}}" />
        <meta property="og:description"   content="Buy & Sell electronics, computers, books, clothes & more on Baguio Online. Free registration and easy to use." />
        <meta property="fb:app_id"        content="169994830983601"/>
        @if($meta->cover_user == "no-image.jpg")
            <meta property="og:image"     content="{{ asset('images/cover/logoBaguioOnline.png') }}" />
        @else
            <meta property="og:image"     content="{{ asset('images/cover/'.$meta->cover_user) }}" />
        @endif
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

                            <li class="breadcrumb-item"><a href="/">Home</a></li>

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

                                <router-link to="/inbox"><i class="fa fa-inbox"></i>Inbox <span class="float-right text-danger">({{$messages}})</span></router-link>

                                <router-link to="/products"><i class="fa fa-cart-arrow-down"></i> Products</router-link>

                                <router-link to="/accountDetails"><i class="fa fa-lock"></i> Account Details</router-link>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">

                                    @csrf

                                </form>

                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> <i class="fa fa-sign-out"></i> {{ __('Logout') }}</a>

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





@endsection

