<?php

namespace App\Providers;

use App\Library\Admin\Contracts\AdminContentContract;
use App\Library\Admin\Services\AdminContentService;
use Illuminate\Support\ServiceProvider;

class AdminContentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(AdminContentContract::class, function () {
            return new AdminContentService();
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
