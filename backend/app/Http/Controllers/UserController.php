<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Degree;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        try {
            $applicants = Applicant::all();

            return response()->json([
                'state' => true,
                'data' => $applicants
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'state' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }

    public function listDegrees()
    {
        try {
            $degrees = Degree::all();

            return response()->json([
                'state' => true,
                'data' => $degrees
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'state' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            // Validate fields about the server
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'document' => 'required',
                'degree_id' => 'required',
            ]);

            // Help with tabine for autocomplete some code lines
            $user = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'role_id' => 2,
                'password' => Hash::make($request->input('document')),
                'status' => true
            ]);


            // Help with tabine for autocomplete some code lines
            $applicant = Applicant::create([
                'document' => $request->input('document'),
                'gender' => $request->input('gender'),
                'social_class' => $request->input('social_class'),
                'birth_date' => $request->input('birth_date'),
                'address' => $request->input('address'),
                'user_id' => $user->id,
                'degree_id' => $request->input('degree_id'),
            ]);

            return response()->json([
                'state' => true,
                'message' => 'Usuario creado correctamente',
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage(),
            ], 500);
        }
    }

    public function findApplicant($id)
    {
        try {

            // Help with tabine for autocomplete some code lines
            $applicant = DB::table('users')
                ->select(
                    'users.name as name',
                    'users.email as email',
                    'users.phone as phone',
                    'users.status as status',
                    'applicants.document as document',
                    'applicants.gender as gender',
                    'applicants.social_class as social_class',
                    'applicants.birth_date as birth_date',
                    'applicants.degree_id as degreeId',
                    'degrees.name as degree',
                )->join('applicants', 'applicants.user_id', '=', 'users.id')
                ->join('degrees', 'degrees.id', '=', 'applicants.degree_id')
                ->where('users.id', '=', $id)
                ->get();

            return response()->json([
                'state' => true,
                'data' => $applicant
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage(),
            ], 500);
        }
    }

    public function updateDetails(Request $request)
    {
        try {
            $request->validate([
                'email' => 'email',
                'phone' => 'required|numeric',
                'password' => 'required',
                'gender' => 'required',
                'social_class' => 'required|numeric',
                'birth_date' => 'required',
                'address' => 'required'
            ]);

            $applicant = Applicant::findOrFail($request->input('id'));

            $applicant->user->update([
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'password' => Hash::make($request->input('password')),
            ]);

            $applicant->update([
                'gender' => $request->input('gender'),
                'social_class' => $request->input('social_class'),
                'birth_date' => $request->input('birth_date'),
                'address' => $request->input('address'),
            ]);

            return response()->json([
                'state' => true,
                'message' => 'Usuario actualizado correctamente',
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage(),
            ], 500);
        }
    }

    // Help with tabine for autocomplte this method
    public function disableApplicant($id)
    {
        try {
            $applicant = Applicant::findOrFail($id);

            $applicant->user->update([
                'status' => false
            ]);

            return response()->json([
                'state' => true,
                'message' => 'Usuario desactivado correctamente',
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage(),
            ], 500);
        }
    }
}
