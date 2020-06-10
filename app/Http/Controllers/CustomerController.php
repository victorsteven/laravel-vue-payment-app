<?php

namespace App\Http\Controllers;

use App\Repositories\ProductRepository;
use App\Repositories\TransactionRepository;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

  protected $transaction;

    public function __construct(TransactionRepository $transaction)
    {
        $this->middleware('auth');
        // $this->admin = $admin;
        $this->transaction = $transaction;
    }


    // public function getTransactionList()
    // {
    //     $transactions = $this->admin->getTransactionList();

    //     return view('pages.transaction-history', compact('transactions'));
    // }

    public function index()
    {
      $transactions = $this->transaction->getCustomerTransactionList();

      return view('pages.customer-dashboard', compact('transactions'));

    }

    // public function index() {

    //   // return "this is the customer controller";
    //   return view('pages.customer-dashboard', compact('transactions'));

    // }
}
