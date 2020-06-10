<?php

namespace App\Http\Controllers;

use App\Bank;
use App\contract\BankContract;
use App\Transaction;
use App\User;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public $bank;

    public function __construct(BankContract $bank)
    {
        $this->bank = $bank;
    }

    public function index()
    {
        $user = Transaction::first();
        return [config('paystack.webhookUrl', '/paystack/hook')];
    }
}
