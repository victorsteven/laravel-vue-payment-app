<?php
  namespace App\Repositories;

    use Auth;
    use App\Product;
    use App\User;
    use Paystack;
    use Ramsey\Uuid\Uuid;
    use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

class AdminRepository extends BaseRepository
{

    public function __construct()
    {
        parent::__construct();
        $this->transaction = new TransactionRepository;
        $this->product = new ProductRepository;
    }


    public function getTransactionList()
    {
        return $this->transaction->getTransactionList();
    }

    public function getAdmin($id)
    {
        return User::where('id', $id)->firstOrfail();
    }

    public function deleteProduct($data)
    {
        $log = new \stdClass();
        $product  = $this->product->delete($data);
        if ($product) {
            $log->isSuccessful = true;
        } else {
            $log->isSuccessful = false;
        }
        return $log;
    }

    public function editProduct($data)
    {
        $log = new \stdClass();
        $product = $this->product->update($data);
        if ($product) {
            $log->isSuccessful = true;
        } else {
            $log->isSuccessful = false;
        }
        return $log;
    }


    public function checkStat($data)
    {
        $transaction = $this->transaction->getTransactionByRefrence($data['reference_code']);

        if ($transaction) {
            $this->responseData->isFound = true;
            $this->responseData->data = $transaction;
            return $this->responseData;
        }

        $this->responseData->isFound = false;
        return $this->responseData;
    }

    public function convert($ref)
    {
        $transaction = $this->transaction->getTransactionByRefrence($ref);
        $updateData = ['status' => 'success'];

        $transaction = $this->transaction->updateTransaction($transaction['id'], $updateData);

        if($transaction) {
            $transaction = $this->transaction->getTransactionByRefrence($ref);
            dd($transaction);
        }
    }

    public function validatePayment($data)
    {
        $transaction = $this->transaction->updateTransaction($data['transaction_id'], ['verified' => $data['verify']]);
        if ($transaction) {
            return true;
        }
        return false;
    }

    public function getStatistics()
    {
        $transactions = $this->getTransactionList();

        $data['transactions'] = count($transactions);
        $data['products'] = count($this->product->getProducts());
        $data['revenue'] = $this->computeRevenue($transactions);

        logger("the data to be sent: ");
        logger($data);

        return (object) $data;
    }

    private function computeRevenue($transactions)
    {
        $sum = 0;
        foreach ($transactions as $key => $value) {
            if($value['status'] == 'success')
                $sum += $value['amount'];
        }
        return number_format($sum);
    }
}
