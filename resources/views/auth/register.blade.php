@extends('layouts.master')

@section('content')
<div class="container mt-5 mb-5">
    <!-- Register Content Start -->
    <div class="row">
    <div class="col-md-7">
        <div class="login-reg-form-wrap mt-md-34 mt-sm-34 mb-3">
            <h2>Signup Form</h2>
            <form method="POST" action="{{ route('register') }}">
                            @csrf
                <div class="single-input-item">
                    <input id="name" type="text" placeholder="Full Name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="single-input-item">
                <input id="email" type="email" placeholder="Email Address" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="single-input-item">
                        <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="single-input-item">
                        <input id="password-confirm" placeholder="Confirm Password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>
                </div>

                <div class="single-input-item">
                    <input id="shop_name" type="text" placeholder="Store Name (Optional: you can edit this later)" class="form-control @error('shop_name') is-invalid @enderror" name="shop_name" value="{{ old('shop_name') }}" autocomplete="shop_name" autofocus>

                        @error('shop_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="single-input-item">
                            <label>By clicking Sign Up, you have read and agreed to the following <a href="{{ url('terms-services') }}" class="terms_link">terms and conditions</a></label> 
                        </div>
                    </div>
                </div>

                <div class="single-input-item">
                    <button class="sqr-btn">Create your Store</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Register Content End -->

    <div class="col-md-4">
        <div class="login-reg-form-wrap  pr-lg-50">
            <h2>or register With</h2>
            <div class="col-md-8 col-md-offset-5">
                <a href="{{url('/redirect_facebook')}}" class="btn btn-social btn-facebook mb-3"><span class="fa fa-facebook"></span> Sign Up with Facebook</a>
                
                <a href="{{url('/redirect_google')}}" class="btn btn-social btn-google"><span class="fa fa-google"></span>Sign Up with Google</a>
            </div>
        </div>
    </div>

    </div>
</div>



</div>
@endsection
