<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public $incrementing = false;

    protected $fillable = [
        'id', 'user_id', 'product_id', 'amount', 'refrence_code', 'data', 'status', 'flw_reference'
    ];

    protected $with = ['user', 'product'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    public function getDataAttribute($data)
    {
        return json_decode($data);
    }

    public function getStatusColor()
    {
        switch ($this->status) {
            case 'success':
                return 'green';
            case 'pending':
                return '#a79715';
            default:
                return 'red';
        }
    }
}
