@extends('layouts.master')



@section('content')


<div class="login-register-wrapper mt-5 mb-5">

    <div class="container">

        <div class="member-area-from-wrap">

            <div class="row">

                <!-- Login Content Start -->
                <div class="col-lg-1"></div>
                <div class="col-lg-10">

                    <div class="login-reg-form-wrap  pr-lg-50">

                        <h2>Reset Password</h2>

                        <form method="POST" action="{{ route('password.update') }}">

                        @csrf



                        <input type="hidden" name="token" value="{{ $token }}">



                        <div class="form-group row">

                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>



                            <div class="col-md-6">

                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>



                                @error('email')

                                    <span class="invalid-feedback" role="alert">

                                        <strong>{{ $message }}</strong>

                                    </span>

                                @enderror

                            </div>

                        </div>



                        <div class="form-group row">

                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>



                            <div class="col-md-6">

                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">



                                @error('password')

                                    <span class="invalid-feedback" role="alert">

                                        <strong>{{ $message }}</strong>

                                    </span>

                                @enderror

                            </div>

                        </div>



                        <div class="form-group row">

                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>



                            <div class="col-md-6">

                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                            </div>

                        </div>



                        <div class="form-group row mb-0">

                            <div class="col-md-6 offset-md-4">

                                <button type="submit" class="sqr-btn">

                                    {{ __('Reset Password') }}

                                </button>

                            </div>

                        </div>

                    </form>

                    </div>

                </div>
                <div class="col-lg-1"></div>
                <!-- Login Content End -->

            </div>

        </div>

    </div>

</div>





@endsection

