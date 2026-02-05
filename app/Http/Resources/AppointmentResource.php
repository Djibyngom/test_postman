<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AppointmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
            // Traduction des jours en français
    $jours = [
        'Monday'=>'Lundi', 'Tuesday'=>'Mardi', 'Wednesday'=>'Mercredi',
        'Thursday'=>'Jeudi', 'Friday'=>'Vendredi',
        'Saturday'=>'Samedi', 'Sunday'=>'Dimanche',
    ];
    $jour = $jours[$this->appointment_date->format('l')];
    $heure = $this->appointment_date->format('H:i');

    return [
        'id'               => $this->id,
        'nom_patient'      => $this->patient->first_name . ' ' . $this->patient->last_name,
        'docteur'          => $this->doctor->name . ' — ' . $this->doctor->specialty,
        'date_rendez_vous' => "Le {$jour} à {$heure}",
        'motif'            => $this->reason,
        'statut'           => $this->status,
        'notes'            => $this->notes,
    ];

    }
}
