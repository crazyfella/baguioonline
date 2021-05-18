<?php $__env->startSection('content'); ?>

<div class="container mt-5 mb-5">

        <div id="generic_price_table">
        <div>
            <div >
            <div class="contact-info mt-md-28 mt-sm-28">
                            <h2>Payment Method</h2>
                            <?php if($message==1): ?>
                                <div class="alert alert-danger alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>Note: Your account is already subscribe. Updating the subscription will forfeit the exisiting subscription. </strong>
                                </div>
                            <?php endif; ?>
                            <?php echo $__env->make('flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <div class="flash-message"></div>
                            <p>Choose the payment method that is comfortable with you.</p>
                           
                            <div class="working-time">
                                <h2>Details:</h2>
                                <p>Subscription Type: <span><?php echo e($subscription); ?></span><br>
                                <span>Annual Payment:</span>&#8369; <?php echo e(number_format($payment,2)); ?><br>
                                <span>Additional Products:</span> <?php echo e($limit); ?></p>
                            </div>
                        </div>
                <div class="row">
                <div class="col-lg-4">
                    <div class="tile pt-inner text-center p-0 overflow-hidden">
                        <div class="pti-header bg-primary-payment">
                            <h2>Paypal <small></small></h2>
                            <div class="ptih-title">Paypal / Visa / Mastercard</div>
                        </div>
                        <div class="pti-footer border-top">
                            For visa or mastercard:<Br> no need to register to paypal.
                            <div id="paypal-button"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="tile pt-inner text-center p-0 overflow-hidden">
                        <div class="pti-header bg-success-payment">
                            <h2>Cash / Dropping Area<small></small></h2>
                            <div class="ptih-title">for Baguio City and La Trinidad only</div>
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
                <b>Note: Membership will be activated once your payment is recieved.</b><br><br>
                <form method="post"  action="<?php echo e(url('payment_contact')); ?>" class="contact-form">
                <?php echo csrf_field(); ?>
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
                            <div class="contact-btn">
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


<!-- Modal PADALA-->
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
                <h2>Cash </h2>
                <b>Note: Membership will be activated once your payment is recieved.</b><br><br>
                <form method="post"  action="<?php echo e(url('payment_contact')); ?>" class="contact-form">
                <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-12 mb-3">
                            <select name="category">
                                <option>Please Select Area</option>
                                <option>Baguio City</option>
                                <option>La Trinidad</option>
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
                            <div class="contact-btn">
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

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
	<script src="https://www.paypalobjects.com/api/checkout.js"></script>
    <script>
      paypal.Button.render({
        env: 'sandbox', // Or 'production'
        style: {
          size: 'responsive',
          color: 'blue',
          shape: 'pill',
        },
        // Set up the payment:
        // 1. Add a payment callback
        
        payment: function(data, actions) {
            var mem = <?php echo json_encode($subs); ?>;
          // 2. Make a request to your server
          return actions.request.post('/api/create-payment/'+mem)
            .then(function(res) {
              // 3. Return res.id from the response
              // console.log(res);
              return res.id;
            });
        },
        // Execute the payment:
        // 1. Add an onAuthorize callback
        onAuthorize: function(data, actions) {
          // 2. Make a request to your server
          return actions.request.post('/api/execute-payment', {
            paymentID: data.paymentID,
            payerID:   data.payerID
          })
            .then(function(res) {
                var mem = <?php echo json_encode($subs); ?>;
                // return actions.request.post('/api/payment-user/'+mem)
                axios.post('/api/payment-user/'+mem)
                .then(function(res) {
                    $('div.flash-message').html('<div class="alert alert-success alert-block"> <strong>thank u adi</strong></div>');
                });
              
              // 3. Show the buyer a confirmation message.
            });
        }
      }, '#paypal-button');
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Sites\haaayyyss\resources\views/payment_method.blade.php ENDPATH**/ ?>