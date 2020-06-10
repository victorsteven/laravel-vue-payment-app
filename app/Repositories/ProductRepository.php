<?php
  namespace App\Repositories;

use App\Product;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Str;


class ProductRepository
{
    public function getProducts()
    {
        return Product::all();
    }

    public function createProduct($data)
    {

        $id = Uuid::uuid5(Uuid::NAMESPACE_DNS, Str::random(5));

        $slug = $data['title'] . md5(time());

        Product::create([
          'id' => $id,
          'user_id' => auth()->id(),
          'title' => $data['title'],
          'slug' => $slug,
          'price' => $data['price'],
          'description' => $data['description'],
          'image_path' => $data['image_path']
        ]);
    }

    public function updateProduct($data)
    {
      $product = Product::where('id', $data['id'])->first();
      $product->title = $data['title'];
      $product->price = $data['price'];
      $product->description = $data['description'];
      if($data['image_path']) {
        $product->image_path = $data['image_path'];
      }
      $product->save();
    }

    public function getProduct($product_id)
    {
        return Product::where('id', $product_id)->first();
    }

    public function getProductBySlug($slug)
    {
        return Product::where('slug', $slug)->first();
    }

    public function createInvoice($data, $product_id)
    {
      logger("we came to the invoice");
      
        $product = Product::where('id', $product_id)->first();

        $transaction = new TransactionRepository;

        $buyerData = [
            'name' => auth()->user()->name,
            'email' => auth()->user()->email,
        ];

        $data = [
            'id' => $this->genUuid(),
            'user_id' => auth()->user()->id,
            'product_id' => $product->id,
            'amount' => $product->price, 
            'status' => 'pending',
            'refrence_code' => $this->getRefrenceCode(),
            'data' => json_encode($buyerData),
            'flw_reference' => $this->getRefrenceCode(),
         ];

        return $transaction->create($data);
    }

    private function genUuid()
    {
        return Uuid::uuid5(Uuid::NAMESPACE_DNS, Str::random(5));
    }

    private function getRefrenceCode() :string
    {
        return Str::random(12);
    }
}
