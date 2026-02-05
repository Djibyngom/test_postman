<?php
namespace App\Http\Controllers\API;

use App\Models\Appointment;
use App\Http\Controllers\Controller;
use App\Http\Resources\AppointmentResource;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        // with() évite le problème N+1
        return AppointmentResource::collection(
            Appointment::with(['patient', 'doctor'])->get()
        );
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'patient_id'        => 'required|exists:patients,id',
            'doctor_id'         => 'required|exists:doctors,id',
            'appointment_date'  => 'required|date_format:Y-m-d H:i:s|after:now',
            'reason'            => 'required|string|min:10',
            'status'            => 'sometimes|string|in:en_attente,confirmé,annulé',
            'notes'             => 'nullable|string',
        ]);

        $appointment = Appointment::create($validated);
        $appointment->load(['patient', 'doctor']);
        return new AppointmentResource($appointment);
    }

    public function show(Appointment $appointment)
    {
        $appointment->load(['patient', 'doctor']);
        return new AppointmentResource($appointment);
    }

    public function update(Request $request, Appointment $appointment)
    {
        $validated = $request->validate([
            'patient_id'        => 'sometimes|exists:patients,id',
            'doctor_id'         => 'sometimes|exists:doctors,id',
            'appointment_date'  => 'sometimes|date_format:Y-m-d H:i:s|after:now',
            'reason'            => 'sometimes|string|min:10',
            'status'            => 'sometimes|string|in:en_attente,confirmé,annulé',
            'notes'             => 'nullable|string',
        ]);
        $appointment->update($validated);
        $appointment->load(['patient', 'doctor']);
        return new AppointmentResource($appointment);
    }

    public function destroy(Appointment $appointment)
    {
        $appointment->delete();
        return response()->json(['message'=>'Rendez-vous supprimé'], 200);
    }
}
