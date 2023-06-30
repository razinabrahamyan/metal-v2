<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MarqueePrice;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MarqueeController extends Controller
{
    /**
     * MarqueeController constructor.
     */
    public function __construct()
    {
        //
    }


    public function index()
    {
        return view('admin.categories.marquee', ['marquees' => MarqueePrice::all()]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return JsonResponse
     */
    public function update(Request $request, $id): JsonResponse
    {
        $marquee = MarqueePrice::query()->findOrFail($id)->update([
            'price' => $request['price'],
            'direction' => $request['direction']
        ]);
        return response()->json([$marquee]);
    }
}
