<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UtilityCostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'uc_1' => $this->uc_1,
            'uc_1_1' => $this->uc_1_1,
            'uc_1_2' => $this->uc_1_2,
            'uc_1_3' => $this->uc_1_3,
            'uc_2' => $this->uc_2,
            'uc_3' => $this->uc_3,
            'uc_3_1' => $this->uc_3_1,
            'uc_3_2' => $this->uc_3_2,
            'uc_4' => $this->uc_4,
            'uc_4_1' => $this->uc_4_1,
            'uc_4_2' => $this->uc_4_2,
            'uc_5' => $this->uc_5,
            'uc_7_1' => $this->uc_7_1,
            'uc_7_2' => $this->uc_7_2,
            'project_id' => $this->project_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
