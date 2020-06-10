<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Repositories\AdminRepository;
use App\Repositories\ProductRepository;
use Illuminate\Http\Response;
use Image;


class AdminController extends Controller
{
    protected $viewData;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AdminRepository $admin, ProductRepository $product)
    {
        $this->middleware('auth');
        $this->admin = $admin;
        $this->product = $product;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $products = $this->product->getProducts();
        $stat = $this->admin->getStatistics();

        return view('pages.dashboard', [
          'products' => $products,
          'stat' => $stat
        ]);
    }

    public function getTransactionList()
    {
        $transactions = $this->admin->getTransactionList();

        return view('pages.transaction-history', compact('transactions'));
    }

    public function checkStat(Request $request)
    {
        $response = $this->admin->checkStat($request->all());
        if ($response->isFound) {
            // Transaction Exists
            return view('pages.reference-check', ['tr' => $response->data]);

        } else {
            // Transaction Does not exists
            return redirect()->back()->with('status', [
                        'message' => 'Cannot find the transaction with reference: <b>'.$request->reference_code.'</b>',
                        'type' => 'danger',
                        'for' => 'search',
                    ]);
        }
    }

    public function convert($ref)
    {
        $this->admin->convert($ref);
    }


    public function validatePayment(Request $request)
    {
        $response = $this->admin->validatePayment($request->all());
        if ($response) {
            alert()->success('Transaction Updated Successfully!')->autoClose(3000);

            return redirect()->route('dashboard');
        }
    }
}
