<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $incrementing = false;

    protected $fillable = [
        'id', 'user_id', 'title', 'description', 'price', 'slug', 'image_path'
    ];

    public function product()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
