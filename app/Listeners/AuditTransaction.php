<?php

namespace App\Listeners;

use App\Events\PaymentSuccessful;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class AuditTransaction implements ShouldQueue
{
    use InteractsWithQueue;
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
    }
}
