<?php

namespace App\Http\Controllers;

use App\Http\Requests\FindProductRequest;
use App\Repositories\TransactionRepository;
use Illuminate\Http\Request;
use App\Repositories\ProductRepository;
use App\Http\Requests\AddProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Image;

class ProductController extends Controller
{
    /**
     * @var TransactionRepository
     */
    private $transactionRepository;

    public function __construct(ProductRepository $product, TransactionRepository $transactionRepository)
    {
        $this->product = $product;
        $this->transactionRepository = $transactionRepository;
    }

    public function createProduct(AddProductRequest $request)
    {

      $data = $request->all();

      if ($request->hasFile('image_path')) {

        $path = public_path() . '/images';
        $filename = md5(time()) . '.' . strtolower($request->file('image_path')->getClientOriginalExtension());

        $file_full_path = $path . '/' . $filename;

        $request->file('image_path')->move($path, $filename);

        $img = Image::make($file_full_path);

        $img->resize(800, null, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });
        $img->save($file_full_path);

        $data['image_path'] = $filename;

      } 

      $response = $this->product->createProduct($data);

      return $response;
    }


    public function updateProduct(UpdateProductRequest $request, string $id)
    {

      $data = $request->all();
      $data['id'] = $id;

      if ($request->hasFile('image_path')) {

        $path = public_path() . '/images';
        $filename = md5(time()) . '.' . strtolower($request->file('image_path')->getClientOriginalExtension());

        $file_full_path = $path . '/' . $filename;

        $request->file('image_path')->move($path, $filename);

        $img = Image::make($file_full_path);

        $img->resize(800, null, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });

        $img->save($file_full_path);
        
        $data['image_path'] = $filename;
      }

      $response = $this->product->updateProduct($data);

      return $response;

    }


    public function details($product_id)
    {
        $product = $this->product->getProduct($product_id);
        $data['product'] = $product;
        return view('product.details', $data);
    }

    public function doInvoice(Request $request, $product_id)
    {
      if(!auth()->user()) {
        return response()->json([
          'redirectUrl' => route('login')
        ]);
      }
      $transaction = $this->product->createInvoice($request->all(), $product_id);
      if ($transaction) {

        return response()->json([
          'redirectUrl' => '/transaction/' . $transaction->id
        ]);
      }
    }

    public function findProduct(FindProductRequest $request)
    {

        $types = ['identifier', 'invoice'];

        if (!in_array($request->type, $types)) {
            return redirect()->back()->with('status', [
                'for' => 'slug',
                'type' => 'danger',
                'message' => 'We couldn\'t find the type you\'re looking for!',
            ]);
        }

        $product = $this->product->getProductBySlug($request->slug);

        if ($request->type === "identifier" && $product) {
            return redirect('/payfor/' . $product->slug);
        } elseif ($request->type === "invoice" && $transaction = $this->transactionRepository->getTransactionByRefrence($request->slug)) {
            return redirect()->route('processpayment', $transaction->id);
        } else {
            return redirect()->back()->with('status', [
                'for' => 'slug',
                'type' => 'danger',
                'message' => 'We are sorry, but we couldn\'t find any item with that slug. Are you sure you entered the correct slug?',
            ]);
        }
    }

    public function findProductSlug($slug)
    {
        $product = $this->product->getProductBySlug($slug);
        if ($product) {
            $data['product'] = $product;
            return view('pages.item-detail', $data);
        } else {
            abort(404, 'We couldn\'t find the Item your\'re looking for.');
        }
    }

    public function getSlug($slug)
    {
        $slug = $this->product->checkSlugExistence($slug);
        return ['status' => $slug];
    }
}
