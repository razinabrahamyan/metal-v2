<?php

namespace App\Library\Admin\Services;

use App\Library\Admin\Contracts\AdminPriceContract;
use App\Models\Product;

class AdminPriceService implements AdminPriceContract
{

    public function index(): array
    {
        $prices = Product::query()
            ->with('price', 'category.market', 'market')
            ->get();

        return ['products' => $prices];
    }

    public function update($id, $data)
    {
        $wholesale  = "by_wholesale";
        $above      = "price_above_from_to";
        $below      = "price_below";
        $from       = "price_from_to";
        $weight     = "weight";

        $product = Product::query()->findOrFail($id);
        $product->price()->update([

            $wholesale => $data->$wholesale ?? null,
            $above     => $data->$above ?? null,
            $below     => $data->$below ?? null,
            $from      => $data->$from ?? null,
            $weight    => $data->$weight ?? null

        ]);
        return $product;
    }
}
