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

                        <h2>Confirm Password</h2>
                        <div class="card-body">

                            {{ __('Please confirm your password before continuing.') }}



                            <form method="POST" action="{{ route('password.confirm') }}">

                                @csrf



                                <div class="form-group row">

                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>



                                    <div class="col-md-6">

                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">



                                        @error('password')

                                            <span class="invalid-feedback" role="alert">

                                                <strong>{{ $message }}</strong>

                                            </span>

                                        @enderror

                                    </div>

                                </div>



                                <div class="form-group row mb-0">

                                    <div class="col-md-8 offset-md-4">

                                        <button type="submit" class="btn btn-primary">

                                            {{ __('Confirm Password') }}

                                        </button>



                                        @if (Route::has('password.request'))

                                            <a class="btn btn-link" href="{{ route('password.request') }}">

                                                {{ __('Forgot Your Password?') }}

                                            </a>

                                        @endif

                                    </div>

                                </div>

                            </form>

                        </div>

                    </div>

                </div>
                <div class="col-lg-1"></div>
                <!-- Login Content End -->

            </div>

        </div>

    </div>

</div>



@endsection

