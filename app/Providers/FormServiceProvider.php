<?php

namespace App\Providers;

use App\Library\Services\Contracts\FormContract;
use App\Library\Services\FormService;
use Illuminate\Support\ServiceProvider;

class FormServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(FormContract::class, function () {
            return new FormService();
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
