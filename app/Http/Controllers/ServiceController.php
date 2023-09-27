<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        try {
            // List of services type event
            $events = DB::table('services')
                ->select(
                    'services.name as name',
                    'services.description as description',
                    'services.status as status',
                    'services.category_id as categoryId',
                    'services_category.name as category',
                    'services.status as status'
                )
                ->join('services_category', 'services_category.id', '=', 'services.category_id')
                ->where('services.category_id', 1)
                // ->where('status', true)
                // Help with ChatGPT to format these dates to name month and day
                ->selectRaw('services.*, CONCAT(MONTHNAME(services.start_date), " ", DAY(services.start_date)) as start')
                ->selectRaw('services.*, CONCAT(MONTHNAME(services.end_date), " ", DAY(services.end_date)) as end')
                ->where(DB::raw('MONTH(services.start_date)'), $request->input('month'))
                ->get();

            $supports = DB::table('services')
                ->select(
                    'services.name as name',
                    'services.description as description',
                    'services.status as status',
                    'services.category_id as categoryId',
                    'services_category.name as category',
                    'services.status as status'
                )
                ->join('services_category', 'services_category.id', '=', 'services.category_id')
                ->where('services.category_id', 2)
                // ->where('status', true)
                // Help with ChatGPT to format these dates to name month and day
                ->selectRaw('services.*, CONCAT(MONTHNAME(services.start_date), " ", DAY(services.start_date)) as start')
                ->selectRaw('services.*, CONCAT(MONTHNAME(services.end_date), " ", DAY(services.end_date)) as end')
                ->where(DB::raw('MONTH(services.start_date)'), $request->input('month'))
                ->get();

            $categories = ServiceCategory::all();

            return view('service.index', compact('events', 'supports', 'categories'));
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage(),
            ], 500);
        }
    }

    public function listCategories()
    {
        try {
            $categories = ServiceCategory::all();

            return response()->json([
                'state' => true,
                'data' => $categories
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage(),
            ], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            // Help with tabine for autocomplete some code lines
            $request->validate([
                'name' => 'required',
                'description' => 'required',
                'start_date' => 'required',
                'end_date' => 'required',
                'category_id' => 'required',
            ]);

            $service = Service::create([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'start_date' => $request->input('start_date'),
                'end_date' => $request->input('end_date'),
                'category_id' => $request->input('category_id'),
                'status' => true,
                'user_id' => 3,
            ]);

            return response()->json([
                'state' => true,
                'message' => 'Servicio creatdo exitosamente',
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage(),
            ], 500);
        }
    }

    public function findService($id)
    {
        try {
            // Help with tabine for autocomplete some code lines
            $service = DB::table('services')
                ->select(
                    'services.name as name',
                    'services.description as description',
                    'services.start_date as start_date',
                    'services.end_date as end_date',
                    'services.status as status',
                    'services.category_id as categoryId',
                    'services_category.name as category',
                    'services.status as status'
                )
                ->join('services_category', 'services_category.id', '=', 'services.category_id')
                ->where('services.id', $id)
                ->get();

            return response()->json([
                'state' => true,
                'data' => $service,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage(),
            ], 500);
        }
    }

    public function update(Request $request)
    {
        try {
            // Help with tabine for autocomplete some code lines
            $request->validate([
                'name' => 'required',
                'description' => 'required',
                'start_date' => 'required',
                'end_date' => 'required',
                'category_id' => 'required',
            ]);

            $service = Service::findOrFail($request->input('id'));

            // dd($service);

            $service->update([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'start_date' => $request->input('start_date'),
                'end_date' => $request->input('end_date'),
                'category_id' => $request->input('category_id'),
                'status' => true,
            ]);

            return response()->json([
                'state' => true,
                'message' => 'Servicio actualizaro correctamente',
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage(),
            ], 500);
        }
    }

    public function enable($id)
    {
        try {
            $service = Service::findOrFail($id);

            $service->update([
                'status' => true
            ]);

            return response()->json([
                'state' => true,
                'message' => 'Servicio activado correctamente',
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage(),
            ], 500);
        }
    }

    public function disable($id)
    {
        try {
            $service = Service::findOrFail($id);

            $service->update([
                'status' => false
            ]);

            return response()->json([
                'state' => true,
                'message' => 'Servicio desactivado correctamente',
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage(),
            ], 500);
        }
    }
}
