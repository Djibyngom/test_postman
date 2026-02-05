<?php
namespace App\Http\Controllers\API;

use App\Models\Doctor;
use App\Http\Controllers\Controller;
use App\Http\Resources\DoctorResource;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        return DoctorResource::collection(Doctor::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'             => 'required|string|max:150',
            'specialty'        => 'required|string|max:100',
            'license_number'   => 'required|string|unique:doctors',
            'experience_years' => 'required|integer|min:0',
            'is_active'        => 'sometimes|boolean',
            'bio'              => 'required|string',
        ]);
        return new DoctorResource(Doctor::create($validated));
    }

    public function show(Doctor $doctor)
    {
        return new DoctorResource($doctor);
    }

    public function update(Request $request, Doctor $doctor)
    {
        $validated = $request->validate([
            'name'             => 'sometimes|string|max:150',
            'specialty'        => 'sometimes|string|max:100',
            'license_number'   => 'sometimes|string|unique:doctors,license_number,' . $doctor->id,
            'experience_years' => 'sometimes|integer|min:0',
            'is_active'        => 'sometimes|boolean',
            'bio'              => 'sometimes|string',
        ]);
        $doctor->update($validated);
        return new DoctorResource($doctor);
    }

    public function destroy(Doctor $doctor)
    {
        $doctor->delete();
        return response()->json(['message'=>'Docteur supprimé'], 200);
    }
}
