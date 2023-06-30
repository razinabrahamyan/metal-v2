<?php

namespace App\Providers;

use App\Library\Admin\Contracts\KeyWordContract;
use App\Library\Admin\Services\AdminKeyWordsService;
use Illuminate\Support\ServiceProvider;

class AdminMetaServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(KeyWordContract::class, function () {
            return new AdminKeyWordsService();
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
