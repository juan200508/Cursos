<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\User;
use App\Models\Inscription;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InscriptionController extends Controller
{
    public function store($id)
    {
        try {
            $inscription = Inscription::create([
                'service_id' => $id,
                // Help with ChatGpt for get the now date
                'inscription_date' => Carbon::now()
            ]);

            $inscription->applicants()->attach(auth()->user()->id);

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

    public function cancelInscription($id)
    {
        try {
            $inscription =  Applicant::find(auth()->user()->id)
                ->inscriptions()
                ->where('service_id', $id)
                ->pluck('id')
                ->first();

            dd($inscription);

            $cancelInscription = Inscription::findOrFail($inscription);
            $cancelInscription->applicants()->detach();
            $cancelInscription->delete();

            return response()->json([
                'state' => true,
                'message' => 'Incripción cancelada correctamente',
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage(),
            ], 500);
        }
    }
}
