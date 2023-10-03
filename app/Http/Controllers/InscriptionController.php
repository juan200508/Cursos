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

            $applicant = Applicant::where('user_id', auth()->user()->id)->first();

            $inscription->applicants()->attach($applicant);

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
            $inscription =  Applicant::where('user_id', auth()->user()->id)
                ->first()
                ->inscriptions()
                ->where('service_id', $id)
                ->pluck('id');

            DB::table('inscriptions_applicants')->where('inscription_id', $inscription)->delete();
            DB::table('inscriptions')->where('id', $inscription)->delete();

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
