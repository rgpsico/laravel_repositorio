<?php

namespace App\Repositories\Core\Eloquent;


use App\Models\Customer;
use App\Repositories\Contracts\CustumersRepositoryInterface;
use App\Repositories\Core\BaseEloquetRepository;

class CustomersRepository implements CustumersRepositoryInterface
{
    public function entity()
    {
        return Customer::class;
    }

    public function all()
    {
        return $customers = Customer::orderBy('name')
            ->where('active', 1)
            ->with('user')
            ->get()
            ->map
            ->format();
    }

    public function findById($customerId)
    {
        return $customer = Customer::where('id', $customerId)
            ->where('active', 1)
            ->with('user')
            ->firstOrFail()
            ->format();
    }

    public function update(int $customerId)
    {
        $customer = Customer::where('id', $customerId)->firstOrFail();
        $customer->update(request()->only('name'));
    }

    public function delete(int $customerId)
    {
        $customer = Customer::where('id', $customerId)->delete();
    }
}
