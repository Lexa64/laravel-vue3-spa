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
            'uc_6' => $this->uc_6,
            'uc_6_1' => $this->uc_6_1,
            'uc_6_2' => $this->uc_6_2,
            'uc_6_3' => $this->uc_6_3,
            'uc_7' => $this->uc_7,
            'uc_8' => $this->uc_8,
            'uc_9' => $this->uc_9,
            'uc_10' => $this->uc_10,
            'project_id' => $this->project_id,
            'created_at' => $this->created_at,
        ];
    }
}
