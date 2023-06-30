<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Library\Admin\Services\AdminPriceService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    protected $priceService;

    public function __construct(AdminPriceService $contract)
    {
        $this->priceService = $contract;
    }

    public function index()
    {
        return view('admin.categories.price', $this->priceService->index());
    }

    public function update(Request $request, $id): JsonResponse
    {
        return response()->json([$this->priceService->update($id, $request)]);
    }
}
