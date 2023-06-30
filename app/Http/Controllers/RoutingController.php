<?php

namespace App\Http\Controllers;

use App\Classes\Constants\PagesMeta;
use App\Models\Product;
use App\Models\Slug;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class RoutingController extends Controller
{

    public function __construct()
    {
        //
    }

    public function index($slug = null)
    {
        if (!$slug) {
            return view('welcome')->with([
                'meta' => PagesMeta::getMeta('welcome'),
            ]);
        }

        $slugObject = Slug::with(['content', 'meta'])->where('name', $slug)->first();
        $slugable = $slugObject->slugable()->first();

        $marketPrices = $categoriesPrices = $productPrice = [];

        switch (get_class($slugable)) {
            case 'App\Models\Market':
            {
                $marketPrices = Product::with(['pricing', 'category', 'market'])->where('market_id', $slugable->id)
                                       ->get()->groupBy('category_id');
                break;
            }
            case 'App\Models\Category':
            {
                $categoriesPrices = Product::with(['pricing', 'category', 'market'])
                                           ->where('category_id', $slugable->id)
                                           ->get();
                break;
            }
            case 'App\Models\Product':
            {
                $productPrice = Product::with(['pricing'])->where('id', $slugable->id)->first();
                break;
            }
        }

        $contentParams = [
            'slug'             => $slugObject,
            'meta'             => $slugObject->meta,
            'marketPrices'     => $marketPrices,
            'categoriesPrices' => $categoriesPrices,
            'productPrice'     => $productPrice,
            'markets'          => Cache::get('markets'),
            'content'          => $slugObject->content,
            'faqs'             => !empty($slugObject->content) ? json_decode($slugObject->content->faq) : [],
        ];

        //TODO change structure
        return view('pages.content', $contentParams);
    }

    public function pages()
    {
        $slug = request()->route()->uri();

        if ($slug == 'prices') {
            $marketPricesByCategory = Product::with(['pricing', 'category', 'market'])->get();
            $cher_id = 10; //Do not change!
            $chermet = $marketPricesByCategory->groupBy('category_id')[$cher_id];
            $marketPricesByCategory = $marketPricesByCategory->groupBy('category_id')
                                                             ->forget($cher_id)
                                                             ->prepend($chermet, $cher_id);
        }


        return view("pages.$slug", [
            'markets'                => Cache::get('markets'),
            'marketPricesByCategory' => $marketPricesByCategory ?? [],
            'meta'                   => PagesMeta::getMeta($slug),
        ]);
    }
}
