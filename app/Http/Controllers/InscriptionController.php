<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Inscription;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InscriptionController extends Controller
{
    public function store(Request $request)
    {
        try {
            $inscription = Inscription::create([
                'service_id' => $request->input('service_id'),
                // Help with ChatGpt for get the now date
                'inscription_date' => Carbon::now()
            ]);

            $inscription->applicants()->attach(1);

            return response()->json([
                'state' => true,
                'message' => 'Incripcion al servicio correctamente'
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage(),
            ], 500);
        }
    }

    public function cancelInscription(Request $request)
    {
        try {
            $inscription =  Applicant::find(1)
                ->inscriptions()
                ->where('service_id', $request->input('service_id'))
                ->pluck('id')
                ->first();

            $cancelInscription = Inscription::findOrFail($inscription);
            $cancelInscription->applicants()->detach();
            $cancelInscription->delete();

            return response()->json([
                'state' => true,
                'message' => 'Incripción cancelada correctamente',
                'data' => $inscription
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage(),
            ], 500);
        }
    }
}
