<?php

namespace App\Library\Admin\Services;

use App\Library\Admin\Contracts\AdminContentContract;
use App\Models\Content;
use App\Models\Slug;
use Illuminate\Database\Eloquent\Builder;

class AdminContentService implements AdminContentContract
{
    /**
     * @var Builder
     */
    protected $query;

    /**
     * PageService constructor.
     */
    public function __construct()
    {
        $this->query = Slug::query();
    }

    /**
     * @return array
     */
    public function index(): array
    {
        return ['pages' => $this->query->with('slugable')->get()];
    }

    /**
     * @param $id
     * @return array
     */
    public function edit($id): array
    {
        $slug = $this->query->findOrFail($id);
        return ['content' => Content::query()->findOrFail($slug->id), 'slug' => $slug['name']];
    }

    /**
     * @param $id
     * @param $data
     * @return bool|int
     */
    public function update($id, $data)
    {
        return Content::query()->findOrFail($id)->update([
            'content_text' => $data->text,
        ]);
    }
}