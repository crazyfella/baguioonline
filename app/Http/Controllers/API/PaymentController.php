<?php



namespace App\Http\Controllers\API;

use Auth;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;



use PayPal\Api\Item;

use PayPal\Api\Payer;

use PayPal\Api\Amount;

use PayPal\Api\Details;

use PayPal\Api\Payment;

use PayPal\Api\ItemList;

use PayPal\Api\WebProfile;

use PayPal\Api\InputFields;

use PayPal\Api\Transaction;

use PayPal\Api\RedirectUrls;

use PayPal\Api\PaymentExecution;

use App\Subscription;

use App\PaymentAccount;

use App\User;

use Carbon\Carbon;

use App\Inbox;

use Illuminate\Support\Str;


class PaymentController extends Controller

{

  



    public function checkOut($membership)

    {

    

        $apiContext = new \PayPal\Rest\ApiContext(

            new \PayPal\Auth\OAuthTokenCredential(

                'ATXEhzx4EkJLuLJ5j4kgq4j8jdXq5NpA1J1bZIBSI-JHci427a4CZYLyCc6sR-CYxrmYxjG9ttuPqofm',     // ClientID

                'EECH0KJk0FbcPJid--vcD69xa4o0jSspQmXCquRKJrkHUycsyPDuGd2qSTlyv-gfJzW3sTHcmAwsoa7I'     // ClientSecret

            )

        );

    

        $payer = new Payer();

        $payer->setPaymentMethod("paypal");

    

        $subs = Subscription::where('subscription',$membership)->first()->subscription;
        $price = Subscription::where('subscription',$membership)->first()->payment;



        $title = $subs . ' Subscription';

        if($subs == $membership){

            $item1 = new Item();

            $item1->setName($title)

                ->setDescription('Annual Payment')

                ->setCurrency('PHP')

                ->setQuantity(1)

                ->setPrice($price);

        

            $itemList = new ItemList();

            $itemList->setItems(array($item1));

        

            $details = new Details();

            $details->setShipping(0)

                ->setTax(0)

                ->setSubtotal($price);

        

            $amount = new Amount();

            $amount->setCurrency("PHP")

                ->setTotal($price)

                ->setDetails($details);

        }

        

    

        $transaction = new Transaction();

        $transaction->setAmount($amount)

            ->setItemList($itemList)

            ->setDescription("Payment description")

            ->setInvoiceNumber(uniqid());

    

        $redirectUrls = new RedirectUrls();

        $redirectUrls->setReturnUrl("http://laravel-paypal-example.test")

            ->setCancelUrl("http://laravel-paypal-example.test");

    

        // Add NO SHIPPING OPTION

        $inputFields = new InputFields();

        $inputFields->setNoShipping(1);

    

        $webProfile = new WebProfile();

        $webProfile->setName('test' . uniqid())->setInputFields($inputFields);

    

        $webProfileId = $webProfile->create($apiContext)->getId();

    

        $payment = new Payment();

        $payment->setExperienceProfileId($webProfileId); // no shipping

        $payment->setIntent("sale")

            ->setPayer($payer)

            ->setRedirectUrls($redirectUrls)

            ->setTransactions(array($transaction));

    

        try {

            $payment->create($apiContext);

        } catch (Exception $ex) {

            echo $ex;

            exit(1);

        }

    

        return $payment;

    }



    public function payment(Request $request)

    {

        

        $apiContext = new \PayPal\Rest\ApiContext(

            new \PayPal\Auth\OAuthTokenCredential(

                'ATXEhzx4EkJLuLJ5j4kgq4j8jdXq5NpA1J1bZIBSI-JHci427a4CZYLyCc6sR-CYxrmYxjG9ttuPqofm',     // ClientID

                'EECH0KJk0FbcPJid--vcD69xa4o0jSspQmXCquRKJrkHUycsyPDuGd2qSTlyv-gfJzW3sTHcmAwsoa7I'      // ClientSecret

            )

        );

    

        $paymentId = $request->paymentID;

        $payment = Payment::get($paymentId, $apiContext);

    

        $execution = new PaymentExecution();

        $execution->setPayerId($request->payerID);



    

        try {

            $result = $payment->execute($execution, $apiContext);

        } catch (Exception $ex) {

            echo $ex;

            exit(1);

        }

    

        return $result;

    }



    public function paypal($membership)

    {

        $id = auth('api')->user()->id;

        $now = Carbon::today();

        $next_year = $now->copy()->addYears(1);



        $subsId = Subscription::where('subscription',$membership)->first()->id;

        $subs = Subscription::where('subscription',$membership)->first()->subscription;

        $price = Subscription::where('subscription',$membership)->first()->payment;



        //UPDATE USER ACCOUNT SUBSCRIPTION

        $user = $update = User::findOrFail($id);

        $update->update(['subscription'  => $subsId, 'status' => 1]);



        //SEND MESSAGE TO INBOX

        $messages = "<b>Thank you for your business</b>

        <br><br>

        We have recieved your payment.

        <br><br>

        Details:<br>

        Subscription Type: ".Str::ucfirst($subs)."<br>

        Registered On: ".date("F d, Y", strtotime($now))."<br>

        Expires On:  ".date("F d, Y", strtotime($next_year))."

        <br><br>

        If you have any questions, please let us know. We'll get back to you as soon as we can.

        <br><br>

        Thank You,<br>

        Baguio Online

        ";

        Inbox::create([

            'userId'            => $id,

            'product_id'         => '0',

            'name'              => "Administrator",

            'contact'           => "info@baguioonline.com",

            'subject'           => "Subsciption",

            'messages'           => $messages,

            'status'            =>'0'

        ]);

        

        if (PaymentAccount::where('userId', $id)->exists()) { //IF USER EXIST

            $update = PaymentAccount::where('userId', $id)->firstOrFail();

            $update->update([

                'userId'            => $id,

                'payment'           => $price,

                'method'            => "paypal",

                'subscription_at'   => $now,

                'expired_at'        => $next_year,

                ]);

        }else{

            PaymentAccount::create([

                'userId'            => $id,

                'payment'           => $price,

                'method'            => "paypal",

                'subscription_at'   => $now,

                'expired_at'        => $next_year,

            ]);

        }



        

    }

}

