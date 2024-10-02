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
            'uc_1' => rtrim(rtrim($this->uc_1, '0'), '.'),
            'uc_1_1' => rtrim(rtrim($this->uc_1_1, '0'), '.'),
            'uc_1_2' => rtrim(rtrim($this->uc_1_2, '0'), '.'),
            'uc_1_3' => rtrim(rtrim($this->uc_1_3, '0'), '.'),
            'uc_1_4' => rtrim(rtrim($this->uc_1_4, '0'), '.'),
            'uc_2' => rtrim(rtrim($this->uc_2, '0'), '.'),
            'uc_3' => rtrim(rtrim($this->uc_3, '0'), '.'),
            'uc_3_1' => rtrim(rtrim($this->uc_3_1, '0'), '.'),
            'uc_3_2' => rtrim(rtrim($this->uc_3_2, '0'), '.'),
            'uc_4' => rtrim(rtrim($this->uc_4, '0'), '.'),
            'uc_4_1' => rtrim(rtrim($this->uc_4_1, '0'), '.'),
            'uc_4_2' => rtrim(rtrim($this->uc_4_2, '0'), '.'),
            'uc_5' => rtrim(rtrim($this->uc_5, '0'), '.'),
            'uc_7_1' => rtrim(rtrim($this->uc_7_1, '0'), '.'),
            'uc_7_2' => rtrim(rtrim($this->uc_7_2, '0'), '.'),
            'project_id' => $this->project_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
