<?php

namespace App\Providers;

use App\Library\Admin\Contracts\AdminPriceContract;
use App\Library\Admin\Services\AdminPriceService;
use Illuminate\Support\ServiceProvider;

class AdminPriceServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(AdminPriceContract::class, function () {
            return new AdminPriceService();
        });
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
