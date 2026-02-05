<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PatientResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
            return [
        'id'          => $this->id,
        'nom_complet' => $this->first_name . ' ' . $this->last_name,
        'email'       => $this->email,
        'telephone'   => $this->phone,
        'date_naissance' => $this->birth_date->format('d/m/Y'),
        'groupe_sang' => $this->blood_group,
    ];

    }
}
