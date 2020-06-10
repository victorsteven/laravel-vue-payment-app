<?php

namespace App\Http\Controllers;

use App\Events\PaymentSuccessful;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

use Paystack;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\TransactionRepository;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{

    public function __construct(TransactionRepository $transaction)
    {
        $this->transaction = $transaction;
    }

    /**
     * Redirect the User to Paystack Payment Page
     * @param Request $request
     * @return RedirectResponse
     */
    public function redirectToGateway(Request $request): RedirectResponse
    {
        // Validate request
        $transaction      =    $this->transaction->getTransaction($request->transaction_id);
        $total_amount     =    ($transaction->amount) * 100;
        $data = [
            'email'                 =>    auth()->user()->email,
            'orderID'               =>    $transaction->product->id,
            'amount'                =>    $total_amount, 
            'metadata'              =>    json_encode(['transaction_id' => $transaction->id, 'name' => auth()->user()->name]),
            'reference'             =>    "PAY-" . Paystack::genTranxRef(),
            'key'                   =>    config('paystack.secretKey'),
            'callback_url'          =>    route('payment.callback'),
        ];


        // In case User goes back in history and clicks "Pay Now" Button Again
        if ($transaction->status === "success") {

            alert()->info("This invoice has already been paid for!")->persistent();

            return back();
        }

        return Paystack::getAuthorizationUrl($data)->redirectNow();
    }


    /**
     * Obtain Paystack payment information and update Transaction based on that
     */
    public function handleGatewayCallback()
    {
        try {
            $data = Paystack::getPaymentData();
        } catch (\Exception $exception) {
            abort(404);
        }

        if($data->status === 'success')
        {
            $updateData = [
                        'status'       =>     'success',
                        'flw_reference'   =>     $data->reference,
                        'authorization_code' =>  $data->authorization['authorization_code']

            ];

            $transaction = $this->transaction->updateTransaction($data->metadata['transaction_id'], $updateData);

            if ($transaction) {
                $transaction = $this->transaction->getTransaction($data->metadata['transaction_id']);
                $vdata['product'] = $transaction->product;

//              event(new PaymentSuccessful($transaction));

                return view('pages.payment-completed', $vdata);
            }
        } else {

            alert()->error('Unable to Complete Payment')->persistent();

            return back();
        }
    }

    public function RecurrentBilling()
    {
        try {
            $data = Paystack::getPaymentData();
        } catch (\Exception $exception) {
            abort(404);
        }

        if($data->status === 'success')
        {
            $updateData = [
                        'status'       =>     'success',
                        'flw_reference'   =>     $data->reference,
                        'authorization_code' =>  $data->authorization['authorization_code']

            ];

            $transaction = $this->transaction->updateTransaction($data->metadata['transaction_id'], $updateData);

            if ($transaction) {
                $transaction = $this->transaction->getTransaction($data->metadata['transaction_id']);
                $vdata['product'] = $transaction->product;

//              event(new PaymentSuccessful($transaction));

                return view('pages.payment-completed', $vdata);
            }
        } else {

            alert()->error('Unable to Complete Payment')->persistent();

            return back();
        }
    }
}
