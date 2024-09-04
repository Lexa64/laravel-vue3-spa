<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UtilityTariffResource extends JsonResource
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
            'ut_1_1_1_economically_justified' => $this->ut_1_1_1_economically_justified,
            'ut_1_1_2_economically_justified' => $this->ut_1_1_2_economically_justified,
            'ut_1_2_economically_justified' => $this->ut_1_2_economically_justified,
            'ut_1_3_economically_justified' => $this->ut_1_3_economically_justified,
            'ut_1_4_economically_justified' => $this->ut_1_4_economically_justified,
            'ut_2_1_economically_justified' => $this->ut_2_1_economically_justified,
            'ut_2_2_economically_justified' => $this->ut_2_2_economically_justified,
            'ut_3_1_economically_justified' => $this->ut_3_1_economically_justified,
            'ut_3_2_economically_justified' => $this->ut_3_2_economically_justified,
            'ut_4_1_economically_justified' => $this->ut_4_1_economically_justified,
            'ut_4_2_economically_justified' => $this->ut_4_2_economically_justified,
            'ut_5_economically_justified' => $this->ut_5_economically_justified,
            'ut_1_1_1_state_subsidized' => $this->ut_1_1_1_state_subsidized,
            'ut_1_1_2_state_subsidized' => $this->ut_1_1_2_state_subsidized,
            'ut_1_2_state_subsidized' => $this->ut_1_2_state_subsidized,
            'ut_1_3_state_subsidized' => $this->ut_1_3_state_subsidized,
            'ut_1_4_state_subsidized' => $this->ut_1_4_state_subsidized,
            'ut_2_1_state_subsidized' => $this->ut_2_1_state_subsidized,
            'ut_2_2_state_subsidized' => $this->ut_2_2_state_subsidized,
            'ut_3_1_state_subsidized' => $this->ut_3_1_state_subsidized,
            'ut_3_2_state_subsidized' => $this->ut_3_2_state_subsidized,
            'ut_4_1_state_subsidized' => $this->ut_4_1_state_subsidized,
            'ut_4_2_state_subsidized' => $this->ut_4_2_state_subsidized,
            'ut_5_state_subsidized' => $this->ut_5_state_subsidized,
            'year' => $this->year,
            'decree_number' => $this->decree_number,
            'project' => $this->project,
            'created_at' => $this->created_at,
        ];
    }
}
