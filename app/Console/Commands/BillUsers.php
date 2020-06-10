<?php

namespace App\Console\Commands;

use App\Repositories\TransactionRepository;
use App\Transaction;
use GuzzleHttp\Client;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Ramsey\Uuid\Uuid;

class BillUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bill:users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */

    public function handle()
    {
        $transactions = DB::table('transactions')
                    ->where("authorization_code", '<>', null)
                    ->join('users', 'transactions.user_id', '=', 'users.id')
                    ->join('products', 'transactions.product_id', '=', 'products.id')
                    ->select('transactions.authorization_code', 'transactions.user_id', 'transactions.product_id', 'users.email', 'users.name', 'products.price')
                    ->get();
        
        if($transactions !== null) {          

        $transactions->each(function($tran) {

          $response = Http::withToken(env("PAYSTACK_SECRET_KEY"))->post("https://api.paystack.co/transaction/charge_authorization", [
            "amount" => $tran->price,
            "email" => $tran->email, 
            "authorization_code" => $tran->authorization_code

          ]);

        $res = json_decode($response, true)['data'];

        $buyerData = [
            'name' => $tran->name,
            'email' => $tran->email,
        ];

        Transaction::create([
          'id' =>  Uuid::uuid5(Uuid::NAMESPACE_DNS, \Str::random(5)),
          'user_id' => $tran->user_id,
          'product_id' => $tran->product_id,
          'amount' => $res['amount'],
          'status' => 'failed',
          'refrence_code' => $res['reference'],
          'data' => json_encode($buyerData),
        ]);

        echo "success";

      });
    }
  }
}
