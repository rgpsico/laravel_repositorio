<?php

namespace App\Repositories\Contracts;

interface CustumersRepositoryInterface
{

    public function all();
    public function findById(int $customerId);
    public function update(int $customerId);
    public function delete(int $customerId);
}
