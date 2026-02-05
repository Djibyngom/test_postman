<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DoctorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
            return [
        'id'              => $this->id,
        'nom'             => $this->name,
        'specialite'      => $this->specialty,
        'numero_licence'  => $this->license_number,
        'annees_exp'      => $this->experience_years,
        'actif'           => $this->is_active,
        'bio'             => $this->bio,
    ];

    }
}
