<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Repositories\ProductRepository;

class AjaxController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct(AdminRepository $merchant, ItemRepository $item)
    
    public function __construct(ProductRepository $product)
    {
        $this->middleware('auth');
        $this->product = $product;
    }

    public function getProductDetails($id)
    {
        $product = $this->product->getProduct($id);

        return $product;
    }
}
