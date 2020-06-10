<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ProductRepository;
use Illuminate\Support\Facades\Log;

class PagesController extends Controller
{

  protected $viewData;

  public function __construct(ProductRepository $product)
  {
      $this->product = $product;
  }


  public function index()
  {
      $products = $this->product->getProducts();

      // Log::info($products);

      return view('pages.index')->with([
        'products' => $products
        ]);
  }


  public function showLoginPage()
  {
      return view('pages.login');
  }

  public function showRegistrationPage()
  {
      return view('pages.register');
  }

  public function showAboutPage()
  {
      return view('pages.about');
  }

  public function showDetailsPage()
  {
      return view('pages.item-detail');
  }

  public function showDashboardPage()
  {
      return view('pages.dashboard');
  }
}
