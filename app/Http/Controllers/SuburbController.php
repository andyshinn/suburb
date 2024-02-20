<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class SuburbController extends Controller
{
    public function getColor(string $suburb): JsonResponse
    {
        return response()->json(['color' => Redis::get('color:suburb:' . $suburb)]);
    }
}
