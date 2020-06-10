<?php
  namespace App\Repositories;

    use Auth;
    use App\ProductFrequency;
    use App\User;
    use Paystack;
    use Ramsey\Uuid\Uuid;
    use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;
    use Illuminate\Support\Str;


class ProductFrequencyRepository extends BaseRepository
{
    public function __construct()
    {
        parent::__construct();
        $this->product = new ProductRepository;

    }

    public function createFrequency($data = null) 
    {
        $id = Uuid::uuid5(Uuid::NAMESPACE_DNS, Str::random(5));

        $product = $this->product->getProduct($data['product_id']);
        if($product) {

        return ProductFrequency::create([
          'id' => $id,
          'user_id' => auth()->id(),
          'product_id' => $product->id,
          'frequency' => $data['frequency'],
          'period' => $data['period']
        ]);
      }
    }


    public function getCustomerTransactionList()
    {

        return $this->transaction->getTransactionList();
    }

    public function getAdmin($id)
    {
        return User::where('id', $id)->firstOrfail();
    }

    public function validatePayment($data)
    {
        $transaction = $this->transaction->updateTransaction($data['transaction_id'], ['verified' => $data['verify']]);
        if ($transaction) {
            return true;
        }
        return false;
    }
}
