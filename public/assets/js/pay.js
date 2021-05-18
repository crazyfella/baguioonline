paypal.Buttons({
    style: {
          size: 'responsive',
          color: 'blue',
          shape: 'pill',
        },
    createOrder: function(data, actions) {
        var paid = {!! json_encode($paid) !!};
      // This function sets up the details of the transaction, including the amount and line item details.
      return actions.order.create({
        purchase_units: [{
          amount: {
            value: paid
          }
        }]
      });
    },
    onApprove: function(data, actions) {
      // This function captures the funds from the transaction.
      return actions.order.capture().then(function(details) {
        // This function shows a transaction success message to your buyer.
       // alert('Transaction completed by ' + details.payer.name.given_name);
       var mem = {!! json_encode($subs) !!};
                // return actions.request.post('/api/payment-user/'+mem)
                axios.post('/api/payment-user/'+mem)
                .then(function(res) {
                    $('div.flash-message').html('<div class="alert alert-success alert-block"> <strong>Payment Successful. Please check your account details. If something went wrong, please contact us.</strong></div>');
                }
                .catch(error=>{
                    $('div.flash-message').html('<div class="alert alert-warning alert-block"> <strong>Something went wrong. Please try again.</strong></div>');
                })
                );

      });
    }
  }).render('#paypal-button-container');
  //This function displays Smart Payment Buttons on your web page.