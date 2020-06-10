<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddFrequencyRequest;
use Illuminate\Http\Request;
use App\Repositories\ProductFrequencyRepository;


class ProductFrequencyController extends Controller
{

  public function __construct(ProductFrequencyRepository $frequency)
  {
    $this->frequency = $frequency;

  }

  public function createFrequency(AddFrequencyRequest $request) 
  {

    $response = $this->frequency->createFrequency($request->all());

    return $response;

  }

}
