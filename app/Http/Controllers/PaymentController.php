<?php

namespace App\Http\Controllers;
use App\Models\Advertisement;
use App\Models\Purchase;
use App\Models\Purchasing;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Omnipay\Omnipay;
use App\Models\Payment;

class PaymentController extends Controller
{

    private $gateway;

    public function __construct()
    {
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
        $this->gateway->setSecret(env('PAYPAL_CLIENT_SECRET'));
        $this->gateway->setTestMode(true); //set it to 'false' when go live
    }

    public function index()
    {
        return view('payment');
    }

    public function charge(Request $request)
    {
        $advertisement = Advertisement::find($request['id']);

        Purchasing::create([
            'advertisement_id' => $advertisement['id'],
            'user_id' => Auth::user()->getAuthIdentifier()
        ]);

        if($request->input('submit'))
        {
            try {
                $response = $this->gateway->purchase(array(
                    'amount' => $request->input('amount'),
                    'items' => array(
                        array(
                            'name' => $advertisement['title'],
                            'price' => $request->input('amount'),
                            'description' => 'You are buying a product: ' . $advertisement['title'],
                            'quantity' => 1
                        ),
                    ),
                    'currency' => env('PAYPAL_CURRENCY'),
                    'returnUrl' => url('success'),
                    'cancelUrl' => url('error'),
                ))->send();

                if ($response->isRedirect()) {
                    $response->redirect(); // this will automatically forward the customer
                } else {
                    // not successful
                    return $response->getMessage();
                }
            } catch(Exception $e) {
                return $e->getMessage();
            }
        }
    }

    /**
     * Charge a payment and store the transaction.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function success(Request $request)
    {

        // Once the transaction has been approved, we need to complete it.
        if ($request->input('paymentId') && $request->input('PayerID'))
        {
            $transaction = $this->gateway->completePurchase(array(
                'payer_id'             => $request->input('PayerID'),
                'transactionReference' => $request->input('paymentId'),
            ));
            $response = $transaction->send();

            if ($response->isSuccessful())
            {
                // The customer has successfully paid.
                $arr_body = $response->getData();

                // Insert transaction data into the database
                $payment = new Payment;
                $payment->payment_id = $arr_body['id'];
                $payment->payer_id = $arr_body['payer']['payer_info']['payer_id'];
                $payment->payer_email = $arr_body['payer']['payer_info']['email'];
                $payment->amount = $arr_body['transactions'][0]['amount']['total'];
                $payment->currency = env('PAYPAL_CURRENCY');
                $payment->payment_status = $arr_body['state'];
                $payment->save();

                $user_id = Auth::user()->getAuthIdentifier();

                $purchasing = Purchasing::where('user_id', $user_id)->orderByDesc('id')->first();

                $hidden = Advertisement::find($purchasing['advertisement_id']);
                $hidden->hidden = 1;
                $hidden->save();

                Purchase::create([
                    'advertisement_id' => $purchasing['advertisement_id'],
                    'user_id' => $purchasing['user_id'],
                    'payment_id' => $payment['id']
                ]);

                $purchasing->delete();

                return redirect()->route('purchases');
            } else {
                return $response->getMessage();
            }
        } else {
            return 'Transaction is declined';
        }
    }

    /**
     * Error Handling.
     */
    public function error()
    {
        $user = Purchase::where('user_id', Auth::user()->getAuthIdentifier())->get();
        $user->delete();
        return 'User cancelled the payment.';
    }
}
