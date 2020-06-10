<?php

namespace App\Repositories;

use Auth;
use App\Product;
use App\Transaction;


class TransactionRepository
{
    public function __construct()
    {
        $this->flw = new \stdClass;
    }

    public function create($data = null)
    {
      logger("came here now");
        if ($data) {
          $data['status'] = 'pending';
            return Transaction::create($data);
        }
    }

    public function getTransaction($id)
    {
        return Transaction::where('id', $id)->firstOrfail();
    }


    public function getTransactionList()
    {
      return Transaction::all();
    }

    public function getCustomerTransactionList()
    {
      $customer_id = auth()->user()->id;
      
      return Transaction::Where("user_id", $customer_id)->get();
    }

    public function getTransactionByRefrence($ref)
    {
        return Transaction::where('refrence_code', $ref)->first();
    }

    public function updateTransaction($id, $data)
    {
        $transaction = Transaction::where('id', $id)->update($data);
        return ($transaction) ? true : false;
    }
}
