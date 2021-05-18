@extends('layouts.master')



@section('content')





<!-- login register wrapper start -->

<div class="login-register-wrapper mt-5 mb-5">

    <div class="container">

        <div class="member-area-from-wrap">

            <div class="row">

                <!-- Login Content Start -->

                <div class="col-lg-6">

                    <div class="login-reg-form-wrap  pr-lg-50">

                        <h2>Sign In</h2>

                        <form method="POST" action="{{ route('login') }}">

                        @csrf

                            <div class="single-input-item">

                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>



                            @error('email')

                                <span class="invalid-feedback" role="alert">

                                    <strong>{{ $message }}</strong>

                                </span>

                            @enderror

                            </div>

                            <div class="single-input-item">

                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">



                                @error('password')

                                    <span class="invalid-feedback" role="alert">

                                        <strong>{{ $message }}</strong>

                                    </span>

                                @enderror

                            </div>

                            <div class="single-input-item">

                                <div class="login-reg-form-meta d-flex align-items-center justify-content-between">

                                    <div class="remember-meta">

                                        <div class="custom-control custom-checkbox">
                                            
                                            <input class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="custom-control-label" for="remember">Remember Me</label>
                                        </div>

                                    </div>

                                    @if (Route::has('password.request'))
                                    <a class="forget-pwd" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                    @endif

                                    <a href="/register" class="forget-pwd">Not yet registered?</a>

                                </div>

                            </div>

                            <div class="single-input-item">

                                <button class="sqr-btn">Login</button>

                            </div>

                        </form>

                    </div>

                </div>

                <!-- Login Content End -->



                <div class="col-lg-6">

                    <div class="login-reg-form-wrap  pr-lg-50">

                        <h2>or Login With</h2>

                        <div class="col-md-8 col-md-offset-5">

                            <a href="{{url('/redirect_facebook')}}" class="btn btn-social btn-facebook mb-3"><span class="fa fa-facebook"></span> Sign In with Facebook</a>

                            

                            <a href="{{url('/redirect_google')}}" class="btn btn-social btn-google"><span class="fa fa-google"></span>Sign In with Google</a>

                        </div>

                    </div>

                </div>



            </div>

        </div>

    </div>

</div>

<!-- login register wrapper end -->

@endsection

