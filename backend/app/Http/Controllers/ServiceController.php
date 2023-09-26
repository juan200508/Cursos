<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    public function indexEvents(Request $request)
    {
        try {
            $events = DB::table('services')
                ->where('services.category_id', 1)
                ->where('status', true);

            return response()->json([
                'state' => true,
                'data' => $events
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage(),
            ], 500);
        }
    }

    public function indexSupports(Request $request)
    {
        try {
            $supports = DB::table('services')
            ->where('services.category_id', 2)
            ->where('status', true);

            return response()->json([
                'state' => true,
                'data' => $supports
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage(),
            ], 500);
        }
    }
}
