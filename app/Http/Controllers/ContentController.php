<?php

namespace App\Http\Controllers;

use App\Library\Admin\Contracts\AdminContentContract;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    protected $contentService;

    /**
     * ContentController constructor.
     * @param AdminContentContract $contract
     */
    public function __construct(AdminContentContract $contract)
    {
        $this->contentService = $contract;
    }

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('admin.categories.pages.index', $this->contentService->index());
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        return view('admin.categories.pages.edit', $this->contentService->edit($id));
    }

    /**
     * @param Request $request
     * @param $id
     * @return JsonResponse
     */
    public function update(Request $request, $id): JsonResponse
    {
        return response()->json([$this->contentService->update($id, $request)]);
    }
}
