<?php

namespace App\Listeners;

use App\Events\PaymentSuccessful;
use App\Mail\SendReceiptLinkEmail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redis;

class SendReceiptLink
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     *
     * @param  PaymentSuccessful  $event
     * @return void
     */
    public function handle(PaymentSuccessful $event)
    {
        $transaction = $event->transaction;
//        Redis::connection()->del('queues:default');
        Mail::to($transaction->data->email)->queue((new SendReceiptLinkEmail($transaction))->onQueue('default'));
    }
}
