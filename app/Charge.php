<?php

namespace App;

use App\contract\BankContract;
use Illuminate\Database\Eloquent\Model;

class Charge extends Model implements BankContract
{
    protected $fillable = ['data', 'transaction_id', 'event', 'paystack_reference', 'email', 'status'];

    protected $with = ['transaction'];

    protected $casts = [
        'data' => 'object',
    ];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }

    public function getNumbers()
    {
        return [1, 2, 3, 4];
    }
}
