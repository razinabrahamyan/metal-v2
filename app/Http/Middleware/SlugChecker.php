<?php

namespace App\Http\Middleware;

use App\Models\Slug;
use Closure;
use Illuminate\Http\Request;

class SlugChecker
{

    public function handle(Request $request, Closure $next)
    {
        $slug = Slug::query()->where('name', $request->segment(1))->exists();
        if ($request->segment(1) && !$slug) {
             return response()->view('errors.404', [], 404);
        }
        return $next($request);
    }
}
