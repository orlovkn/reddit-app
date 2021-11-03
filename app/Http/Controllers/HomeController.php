<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $visitors = Visitor::query()->selectRaw('websites.url, count(*) as visitors')
            ->where('country', request('country'))
            ->whereBetween('visitors.created_at', [
                now()->subDays(60)->startOfDay()->toDateTimeString(),
                now()->subDays(30)->endOfDay()->toDateTimeString(),
            ])
            ->join('websites', 'visitors.website_id', '=', 'websites.id')
            ->groupBy('website_id')
            ->orderByDesc('visitors')
            ->get();

        return response()->json($visitors);
    }
}
