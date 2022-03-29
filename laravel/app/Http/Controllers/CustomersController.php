<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\CustumersRepositoryInterface;


class CustomersController extends Controller
{
    private $CustomersRepository;

    public function __construct(CustumersRepositoryInterface $CustomersRepository)
    {
        $this->CustomersRepository = $CustomersRepository;
    }
    public function index()
    {

        $customers = $this->CustomersRepository->all();

        return $customers;
    }

    public function show($customersId)
    {

        $customers = $this->CustomersRepository->findById($customersId);
        return $customers;
    }

    public function update($customersId)
    {

        $this->CustomersRepository->update($customersId);
        return redirect('/customer/' . $customersId);
    }

    public function destroy($customersId)
    {
        $this->CustomersRepository->delete($customersId);
        return redirect('/customer/' . $customersId);
    }
}
