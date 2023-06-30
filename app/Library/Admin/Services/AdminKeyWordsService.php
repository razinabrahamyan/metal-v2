<?php

namespace App\Library\Admin\Services;

use App\Library\Admin\Contracts\KeyWordContract;
use App\Models\Meta;
use App\Models\Slug;

class AdminKeyWordsService implements KeyWordContract
{

    public function index()
    {
        $slug = Slug::query()
            ->select('id', 'name')
            ->whereHas('meta')
            ->with('meta')
            ->paginate(50);

        return ['keywords' => $slug];
    }

    public function update($id, $data)
    {
        return Meta::query()->findOrFail($id)->update([
            'keywords' => $data['keywords'],
            'description' => $data['meta_description'],
            'title' => $data['title']
        ]);
    }
}