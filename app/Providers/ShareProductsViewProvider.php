<?php

namespace App\Providers;

use App\Models\Market;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ShareProductsViewProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if (Cache::has('markets')) {
            $markets = Cache::get('markets');
        } else {
            $markets = Market::query()
                ->orderBy( \DB::raw('FIELD(id, 4, 1, 2, 3, 5, 6, 7)'))
                ->with('slug', 'categories.products','products.price')
                ->with('products', function ($query) {
                    return $query->doesntHave('category');
                })
                ->get();
            Cache::put('markets', $markets, now()->addHours(48));
        }
        View::composer('*', function ($view) use($markets) {
            return $view->with('nav_market', $markets);
        });
    }
}
