<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Http\Request;
use App\Repositories\TransactionRepository;

class TransactionController extends Controller
{
    public function __construct(TransactionRepository $transaction)
    {
        $this->transaction = $transaction;
    }


    public function transaction($id)
    {
        $transaction = $this->transaction->getTransaction($id);
        $data['transaction'] = $transaction;

        return view('product.invoice', $data);
    }

    public function findTransaction(Request $request)
    {
        $transaction = $this->transaction->getTransactionByRefrence($request->transaction_ref);
        if ($transaction) {
            return redirect('/transaction/' . $transaction->id);
        } else {
            return redirect()->back()->with('status', [
                'for' => 'transaction',
                'type' => 'danger',
                'message' => 'We are sorry, but we couldn\'t find any transaction with that reference. Are you sure you entered the correct reference?',
            ]);
        }
    }


    public function process(Request $request)
    {
        $data = $request->all();

        $response = $this->transaction->chargeCardToMerchantWallet($data);
        if ($response->success) {
            if ($response->needsValidation) {
                return redirect()->route('verifypayment', ['id' => $response->transaction_id]);
            }
        } else {
            $card = $this->validateCard($data);
            $card->message = $response->message;
            if (!$card->valid) {
                return redirect()->back()->with('card', $card);
            }
        }
    }

    private function validateCard($data)
    {
        $res = new \stdClass;
        $res->valid = false;
        $res->message = 'Invalid Card';
        foreach ($data as $key => $value) {
            $res->{$key} = $value;
        }
        return $res;
    }


    public function validateTransfer(Request $request)
    {
        $data = $request->all();
        $response = $this->transaction->validateTransfer($data);
        if ($response->success) {
            return redirect()->route('verifypayment', ['id' => $response->transaction_id]);
        }
    }

    public function verifypayment($transaction_id)
    {
        $transaction = $this->transaction->getTransaction($transaction_id);
        $data['transaction'] = $transaction;
        return view('product.validate', $data);
    }

    public function getDetails(Request $request)
    {
        $transactions = Transaction::where('product_id', $request->itemId)->where('status', 'success')->get();

        $hasPaid = false;

        $transactions->each(function ($tr) use(&$hasPaid, $request) {
            if ($tr->data->email === $request->email) {
                $hasPaid = true;
            }
        });

        return [
            'data' => [
                'hasPaid' => $hasPaid,
            ],
        ];
    }
}
