@extends('layouts.master')



@section('content')

<!-- breadcrumb area start -->

<div class="breadcrumb-area">

    <div class="container">

        <div class="row">

            <div class="col-12">

                <div class="breadcrumb-wrap">

                    <nav aria-label="breadcrumb">

                        <ul class="breadcrumb">

                            <li class="breadcrumb-item">{{ Breadcrumbs::render('contact-us') }}</li>

                        </ul>

                    </nav>

                </div>

            </div>

        </div>

    </div>

</div>

<!-- breadcrumb area end -->

<!-- contact area start -->

<div class="contact-area pb-34 pb-md-18 pb-sm-0">

            <div class="container">

                <div class="row">

                    <div class="col-lg-8">

                        <div class="contact-message">

                            <h2>tell us your concern</h2>

                            @include('flash-message')



                            <form method="post"  action="{{ url('submit_contact') }}" class="contact-form">

                            @csrf





                                <div class="row">

                                    <div class="col-lg-6 col-md-6 col-sm-6">

                                        <input name="name" placeholder="Name (required)" type="text" required>

                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-6">

                                        <input name="phone" placeholder="Phone (required)" type="text" required>

                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-6">

                                        <input name="email" placeholder="Email" type="text">

                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-6">

                                        <input name="subject" placeholder="Subject (required)" type="text">

                                    </div>

                                    <div class="col-12">

                                        <div class="contact2-textarea text-center">

                                            <textarea placeholder="Message (required)" name="message"  class="form-control2" ></textarea>

                                            @if ($errors->has('message'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('message') }}</strong>
                                                </span>
                                            @endif

                                        </div>

                                        <div class="contact-btn">
                                        (required)
                                            {!! htmlFormSnippet() !!}
                                            @if ($errors->has('g-recaptcha-response'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                                </span>
                                            @endif
                                            <br>
                                            <button class="sqr-btn" type="submit" data-style="expand-right">Send Message</button>

                                        </div>

                                    </div>

                                </div>

                            </form>

                        </div>

                    </div>

                    <div class="col-lg-4">

                        <div class="contact-info mt-md-28 mt-sm-28">

                            <h2>contact us</h2>

                            <p>Please free to contact us.</p>

                            <ul>



                                <li><i class="fa fa-phone"></i> Phone Number : +63 915 6623 243</li>

                                <li><i class="fa fa-envelope-o"></i> Emaill Adress : info@baguioonline.com</li>

                            </ul>

                            <div class="working-time">

                                <h3>Working hours</h3>

                                <p><span>Monday – Saturday:</span>08AM – 22PM</p>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- contact area end -->

@endsection

