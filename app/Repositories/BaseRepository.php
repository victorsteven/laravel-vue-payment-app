<?php
  namespace App\Repositories;

use App\Product;
use App\User;
use Faker\Generator as Faker;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;
use Ramsey\Uuid\Uuid;

class BaseRepository
{
    public function __construct()
    {
        $this->responseData = new \stdClass;
        //$this->mw = new MoneywaveRepository;
        $this->flw = new \stdClass;
    }

    protected function genUuid()
    {
        return Uuid::uuid5(Uuid::NAMESPACE_DNS, \Str::random(5));
    }
}
