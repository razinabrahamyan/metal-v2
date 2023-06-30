<?php

use App\Models\Category;
use App\Models\Meta;
use App\Models\Slug;
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::for('home', function ($trail) {
    $trail->push('Главная', route('home'));
});

if (request()->segment(1)) {
    $param = request()->segment(1);
    $slug = Slug::where('name', $param)->with('slugable', 'meta')->first();
    if (isset($slug) && $slug->slugable->getTable() === "products") {
        $category = Category::with('market.slug', 'slug')->find($slug->slugable['category_id']);
        if ($slug->slugable['category_id']) {
            Breadcrumbs::for($category->market['title'], function ($trail) use($category) {
                $trail->parent('home');
                $trail->push($category->market['title'], route('home', $category->market['slug']['name']));
            });

            Breadcrumbs::for($category->slug['name'], function ($trail) use($category) {
                $trail->parent($category->market['title']);
                $trail->push($category->title, route('home', $category->slug['name']));
            });

            Breadcrumbs::for($param, function ($trail) use($slug, $param, $category){
                $trail->parent($category->slug['name']);
                $trail->push($slug->meta['h1'], route('home', $param));
            });
        }
        else {
            $market = $slug->slugable()->first()->market()->with('slug')->first();
            Breadcrumbs::for($market->slug['name'], function ($trail) use($market) {
                $trail->parent('home');
                $trail->push($market->title, route('home', $market->slug['name']));
            });

            Breadcrumbs::for($param, function ($trail) use($slug, $param, $market){

                $trail->parent($market->slug['name']);
                $trail->push($slug->meta['h1'], route('home', $param));
            });
        }
    }
    if (isset($slug) && $slug->slugable->getTable() === "categories") {

        $market = $slug->slugable()->first()->market()->with('slug')->first();
        Breadcrumbs::for($market->slug['name'], function ($trail) use($market) {
            $trail->parent('home');
            $trail->push($market->title, route('home', $market->slug['name']));
        });

        Breadcrumbs::for($param, function ($trail) use($slug, $market) {
            $trail->parent($market->slug['name']);
            $trail->push($slug->meta['h1'], route('home', $slug->name));
        });
    }
    if (isset($slug) && $slug->slugable->getTable() === "markets") {
        Breadcrumbs::for($param, function ($trail) use($slug){
            $trail->parent('home');
            $trail->push($slug->meta['h1'], route('home', $slug->name));
        });
    }

    if (!isset($slug)) {
        $get_meta = \App\Classes\Constants\PagesMeta::getMeta($param);
        Breadcrumbs::for($param, function ($trail) use($param, $get_meta) {
            $trail->parent('home');
            $trail->push($get_meta->h1, route('home', $param));
        });
    }

}