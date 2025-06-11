<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RegisterOfMaterialResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'wall_material' => $this->wall_material,
            'date_of_registration' => $this->date_of_registration?->format('Y-m-d'),
            'valid_until' => $this->valid_until?->format('Y-m-d'),
            'extended_until' => $this->extended_until?->format('Y-m-d'),
            'name_of_material' => $this->name_of_material,
            'appointment' => $this->appointment,
            'manufacturer' => $this->manufacturer,
            'applicant' => $this->applicant,
            'testing_laboratory' => $this->testing_laboratory,
            'protocol_number' => $this->protocol_number,
            'date_expert_opinions' => $this->date_expert_opinions?->format('Y-m-d'),
            'certificate_is_valid_for' => $this->certificate_is_valid_for,
            'special_marks' => $this->special_marks,
            'user_id' => $this->user_id,
            'created_at' => $this->created_at?->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at?->format('Y-m-d H:i:s'),
        ];
    }
}
