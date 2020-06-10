<?php

namespace App\Listeners;

use App\Events\ChargeSuccessful;
use App\Repositories\TransactionRepository;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Xeviant\LaravelPaystack\Model\PaystackEvent;

class HandleCharge
{
    use InteractsWithQueue;
    /**
     * @var TransactionRepository
     */
    private $transaction;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        $this->transaction = new TransactionRepository;
    }

    /**
     * Handle the event.
     *
     * @param PaystackEvent $event
     * @return void
     */
    public function handle(PaystackEvent $event)
    {
        $data = $event->payload;

        $updateData = [
            'status'        =>     'success',
            'flw_reference' =>     $data->reference
        ];

        $transaction = $this->transaction->updateTransaction($data->metadata['transaction_id'], $updateData);

        if ($transaction) {
            return;
        }
    }
}
