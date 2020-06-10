<?php
  namespace App\Repositories;


class CustomerRepository extends BaseRepository
{

    public function __construct()
    {
        parent::__construct();
        $this->transaction = new TransactionRepository;
    }


    public function getCustomerTransactionList()
    {

        return $this->transaction->getTransactionList();
    }
}
