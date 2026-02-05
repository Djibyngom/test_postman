<?php

namespace App\Http\Controllers\API;

use App\Models\Patient;
use App\Http\Controllers\Controller;
use App\Http\Resources\PatientResource;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
        return PatientResource::collection(Patient::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name'  => 'required|string|max:100',
            'last_name'   => 'required|string|max:100',
            'email'       => 'required|email|unique:patients',
            'phone'       => 'required|string',
            'birth_date'  => 'required|date',
            'blood_group' => 'required|string|in:A+,A-,B+,B-,AB+,AB-,O+,O-',
        ]);
        return new PatientResource(Patient::create($validated));
    }

    public function show(Patient $patient)
    {
        return new PatientResource($patient);
    }

    public function update(Request $request, Patient $patient)
    {
        $validated = $request->validate([
            'first_name'  => 'sometimes|string|max:100',
            'last_name'   => 'sometimes|string|max:100',
            'email'       => 'sometimes|email|unique:patients,email,' . $patient->id,
            'phone'       => 'sometimes|string',
            'birth_date'  => 'sometimes|date',
            'blood_group' => 'sometimes|string|in:A+,A-,B+,B-,AB+,AB-,O+,O-',
        ]);
        $patient->update($validated);
        return new PatientResource($patient);
    }

    public function destroy(Patient $patient)
    {
        $patient->delete();
        return response()->json(['message'=>'Patient supprimé'], 200);
    }
}
