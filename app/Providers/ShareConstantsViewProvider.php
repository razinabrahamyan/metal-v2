<?php

namespace App\Providers;

use App\Models\Address;
use App\Models\Market;
use App\Models\MarqueePrice;
use Exception;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ShareConstantsViewProvider extends ServiceProvider
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
        $addresses = $marquee = [];

        if (Cache::has('marquee')) {
            $marquee = Cache::get('marquee');
        } else {
            try {
                $marquee = MarqueePrice::with('slug')->limit(8)->get();
                Cache::put('marquee', $marquee, now()->addHours(48));
            } catch (Exception $exception) {

            }
        }

        if (Cache::has('addresses')) {
            $addresses = Cache::get('addresses');
        } else {
            try {
                $addresses = Address::all();
                Cache::put('addresses', $addresses, now()->addHours(48));
            } catch (Exception $exception) {

            }
        }

        $cache = ['addresses' => $addresses, 'marquee' => $marquee];
        View::composer('*', function ($view) use ($cache) {
            return $view->with($cache);
        });
    }
}
