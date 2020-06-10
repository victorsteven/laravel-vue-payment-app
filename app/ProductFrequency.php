<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductFrequency extends Model
{
  public $incrementing = false;

  protected $fillable = [
      'id', 'user_id', 'product_id', 'frequency', 'period'
  ];
}
