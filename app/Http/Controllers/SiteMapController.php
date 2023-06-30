<?php

namespace App\Http\Controllers;

use App\Classes\Constants\PagesMeta;
use App\Models\Market;

class SiteMapController extends Controller
{
    /**
     * SiteMapController constructor.
     */
    public function __construct()
    {
        //
    }

    public function __invoke()
    {
        $markets = Market::query()
            ->orderBy( \DB::raw('FIELD(id, 4, 1, 2, 3, 5, 6, 7)'))
            ->with('slug', 'categories.products','products.price')
            ->with('products', function ($query) {
                return $query->doesntHave('category');
            })
            ->get();
        return view('pages.sitemap', [
            'markets' => $markets,
            'meta'    => PagesMeta::getMeta('sitemap'),
        ]);
    }

}
