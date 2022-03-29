<?php

namespace App\Providers;

use App\Repositories\Contracts\CustumersRepositoryInterface;
use App\Repositories\Core\Eloquent\CustomersRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            CustumersRepositoryInterface::class,
            CustomersRepository::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
