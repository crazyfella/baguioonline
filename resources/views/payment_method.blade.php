@extends('layouts.master')



@section('content')



<div class="container mt-5 mb-5">



        <div id="generic_price_table">

        <div>

            <div >

            <div class="mt-md-28 mt-sm-28">

                            <h2>Payment Method</h2>

                            @if($message==1)

                                <div class="alert alert-danger alert-block">

                                    <button type="button" class="close" data-dismiss="alert">×</button>

                                    <strong>Note: Your account is already subscribe. Updating the subscription will forfeit the existing one. </strong>

                                </div>

                            @endif

                            

                            @include('flash-message')

                            <p>Choose the plan that’s right for your business.</p>

                           
                            <br>
                            <div class="working-time payment_details mb-3">

                                <h3>Payment Details:</h3>
                                <ul>    
                                    <li>Subscription Type: {{ucfirst($subscription)}}</li>
                                    <li>Annual Payment: {{number_format($payment,2)}}</li>
                                    <li>Additional Products: {{$limit}}</li>
                                </ul>

                            </div>

                        </div>

                <div class="row">

                    <div class="col-lg-12">

                        <div class="flash-message"></div>

                    </div>

                </div>

                <div class="row" id="methods">

                    <div class="col-lg-4">

                        <div class="tile pt-inner text-center p-0 overflow-hidden">

                            <div class="pti-header bg-primary-payment">

                                <h2>Paypal <small></small></h2>

                                <div class="ptih-title">Paypal / Visa / Mastercard</div>

                            </div>

                            <div class="pti-footer border-top">

                                

                                <div id="paypal-button-container"></div>

                                

                            </div>

                        </div>

                    </div>

                    <div class="col-lg-4">

                        <div class="tile pt-inner text-center p-0 overflow-hidden">

                            <div class="pti-header bg-success-payment">

                                <h2>Cash / Direct Bank Transfer<small></small></h2>

                                <div class="ptih-title">Cash / Dropping Area / Bank</div>

                            </div>



                            <div class="pti-body">



                            </div>



                            <div class="pti-footer border-top">

                                <a href="#" class="btn btn-success" data-toggle="modal" data-target="#cash">Contact Us</a>

                            </div>

                        </div>

                    </div>

                    <div class="col-lg-4">

                        <div class="tile pt-inner text-center p-0 overflow-hidden">

                            <div class="pti-header bg-danger-payment">

                                <h2>Money Transfer<small></small></h2>

                                <div class="ptih-title">M LHUILLIER, PALAWAN EXPRESS, WESTERN UNION</div>

                            </div>



                            <div class="pti-body">



                            </div>



                            <div class="pti-footer border-top">

                                <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#padala" >Contact Us</a>

                            </div>

                        </div>

                    </div>

                </div>



                <div class="row" id="loading">

                    <div class="col-md-2"></div>

                    <div class="col-md-10">

                        <div><img src="{{ asset('assets/img/loading.gif')}}"/></div>

                    </div>

                    <div class="col-md-2"></div>

                </div>

                

                

                <!--//BLOCK ROW END-->

            </div>

        </div>

    </div>





<!-- Modal PADALA-->

<div class="modal fade" id="padala" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">

  <div class="modal-dialog modal-lg" role="document">

    <div class="modal-content">

      <div class="modal-header">

        <h5 class="modal-title" id="exampleModalLabel"></h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>

        </button>

      </div>

      <div class="modal-body">

            <div class="contact-message">

                <h2>Money Transfer</h2>

                <b>Note: Membership will be activated once your payment is recieved. We will be in contact with you for more instructions.</b>
                
                <br><br>

                

                <form method="post"  action="{{ url('payment_contact') }}" class="contact-form">

                @csrf

                    <div class="row">

                        <div class="col-12 mb-3">

                            <select name="category">

                                <option>Please Select</option>

                                <option>Cebuana Lhuillier</option>

                                <option>Western Union</option>

                                <option>M lhuillier</option>

                            </select>

                        </div>



                        <div class="col-12">

                            <input name="phone" placeholder="Phone *" type="text" required>

                        </div>



                        <div class="col-12">

                            Other concern

                        </div>



                        <div class="col-12">

                            <input name="subject" placeholder="Subject" type="text">

                        </div>

                        <div class="col-12">

                            <div class="contact2-textarea text-center">

                                <textarea placeholder="Message" name="message"  class="form-control2" required=""></textarea>

                            </div>

                            <div class="contact2-textarea text-center">

                                {!! htmlFormSnippet() !!}<br>
                            </div>

                            <div class="contact-btn float-right">

                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                <button class="sqr-btn" type="submit" data-style="expand-right">Send Message</button>

                            </div>

                        </div>

                    </div>

                </form>

            </div>

      </div>

    

    

    </div>

  </div>

</div>





<!-- Modal CASH-->

<div class="modal fade" id="cash" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">

  <div class="modal-dialog modal-lg" role="document">

    <div class="modal-content">

      <div class="modal-header">

        <h5 class="modal-title" id="exampleModalLabel"></h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>

        </button>

      </div>

      <div class="modal-body">

            <div class="contact-message">

                <h2>Cash / Direct Bank Transfer</h2>

                <b>Note: Membership will be activated once your payment is recieved. We will be in contact with you for more instructions.</b>
                
                <br><br>

                <form method="post"  action="{{ url('payment_contact') }}" class="contact-form">

                @csrf

                    <div class="row">

                        <div class="col-12 mb-3">

                            <select name="category">

                                <option>Please Select Area</option>

                                <option>Baguio City - Dropping Area</option>

                                <option>La Trinidad - Dropping Area</option>

                                <option>Direct Bank Transfer</option>

                            </select>

                        </div>



                        <div class="col-12">

                            <input name="phone" placeholder="Phone *" type="text" required>

                        </div>

                        <div class="col-12">

                            Other concern

                        </div>

                        <div class="col-12">

                            <input name="subject" placeholder="Subject" type="text">

                        </div>

                        <div class="col-12">

                            <div class="contact2-textarea text-center">

                                <textarea placeholder="Message" name="message"  class="form-control2" required=""></textarea>

                            </div>

                            <div class="contact2-textarea text-center">

                                {!! htmlFormSnippet() !!}<br>
                            </div>

                            <div class="contact-btn float-right">

                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                <button class="sqr-btn" type="submit" data-style="expand-right">Send Message</button>

                            </div>

                        </div>

                    </div>

                </form>

            </div>

      </div>



    </div>

  </div>

</div>



</div>



@endsection



@push('scripts')

    <script src="https://www.paypal.com/sdk/js?client-id=ATXEhzx4EkJLuLJ5j4kgq4j8jdXq5NpA1J1bZIBSI-JHci427a4CZYLyCc6sR-CYxrmYxjG9ttuPqofm&currency=PHP"></script>

    <script>



    $(document).ready(function(){

            $("#loading").hide();

    });

    

    paypal.Buttons({

    style: {

          size: 'responsive',

          color: 'blue',

          shape: 'pill',

        },

    createOrder: function(data, actions) {

        

      var paid = {!! json_encode($paid) !!};

      return actions.order.create({

        purchase_units: [{

          amount: {

            value: paid

          }

        }]

      });

    },

    onApprove: function(data, actions) {

        $("#loading").show();

        $("#methods").hide();

      return actions.order.capture().then(function(details) {

        

       var mem = {!! json_encode($subs) !!};


                axios.post('/api/payment-user/'+mem)

                .then(function(res) {

                    $("#loading").css("display", "none");

                    $("#methods").show();

                    $('div.flash-message').html('<div class="alert alert-success alert-block"> <strong>Payment Successful. Check My Account page. If you have any concerns please dont hesitate to contact us.</strong></div>');

                });

                



      });

    }

  }).render('#paypal-button-container');

    </script>

@endpush

