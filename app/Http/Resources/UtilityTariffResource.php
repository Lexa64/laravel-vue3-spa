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
            'utility_tariffs_1_1_1_economically_justified' => $this->utility_tariffs_1_1_1_economically_justified,
            'utility_tariffs_1_1_2_economically_justified' => $this->utility_tariffs_1_1_2_economically_justified,
            'utility_tariffs_1_2_economically_justified' => $this->utility_tariffs_1_2_economically_justified,
            'utility_tariffs_1_3_economically_justified' => $this->utility_tariffs_1_3_economically_justified,
            'utility_tariffs_2_economically_justified' => $this->utility_tariffs_2_economically_justified,
            'utility_tariffs_3_1_economically_justified' => $this->utility_tariffs_3_1_economically_justified,
            'utility_tariffs_3_2_economically_justified' => $this->utility_tariffs_3_2_economically_justified,
            'utility_tariffs_4_1_economically_justified' => $this->utility_tariffs_4_1_economically_justified,
            'utility_tariffs_4_2_economically_justified' => $this->utility_tariffs_4_2_economically_justified,
            'utility_tariffs_5_economically_justified' => $this->utility_tariffs_5_economically_justified,
            'utility_tariffs_6_1_economically_justified' => $this->utility_tariffs_6_1_economically_justified,
            'utility_tariffs_6_2_economically_justified' => $this->utility_tariffs_6_2_economically_justified,
            'utility_tariffs_6_3_economically_justified' => $this->utility_tariffs_6_3_economically_justified,
            'utility_tariffs_7_1_economically_justified' => $this->utility_tariffs_7_1_economically_justified,
            'utility_tariffs_7_2_economically_justified' => $this->utility_tariffs_7_2_economically_justified,
            'utility_tariffs_8_1_economically_justified' => $this->utility_tariffs_8_1_economically_justified,
            'utility_tariffs_8_2_economically_justified' => $this->utility_tariffs_8_2_economically_justified,
            'utility_tariffs_9_economically_justified' => $this->utility_tariffs_9_economically_justified,
            'utility_tariffs_10_economically_justified' => $this->utility_tariffs_10_economically_justified,
            'utility_tariffs_1_1_1_state_subsidized' => $this->utility_tariffs_1_1_1_state_subsidized,
            'utility_tariffs_1_1_2_state_subsidized' => $this->utility_tariffs_1_1_2_state_subsidized,
            'utility_tariffs_1_2_state_subsidized' => $this->utility_tariffs_1_2_state_subsidized,
            'utility_tariffs_1_3_state_subsidized' => $this->utility_tariffs_1_3_state_subsidized,
            'utility_tariffs_2_state_subsidized' => $this->utility_tariffs_2_state_subsidized,
            'utility_tariffs_3_1_state_subsidized' => $this->utility_tariffs_3_1_state_subsidized,
            'utility_tariffs_3_2_state_subsidized' => $this->utility_tariffs_3_2_state_subsidized,
            'utility_tariffs_4_1_state_subsidized' => $this->utility_tariffs_4_1_state_subsidized,
            'utility_tariffs_4_2_state_subsidized' => $this->utility_tariffs_4_2_state_subsidized,
            'utility_tariffs_5_state_subsidized' => $this->utility_tariffs_5_state_subsidized,
            'utility_tariffs_6_1_state_subsidized' => $this->utility_tariffs_6_1_state_subsidized,
            'utility_tariffs_6_2_state_subsidized' => $this->utility_tariffs_6_2_state_subsidized,
            'utility_tariffs_6_3_state_subsidized' => $this->utility_tariffs_6_3_state_subsidized,
            'utility_tariffs_7_1_state_subsidized' => $this->utility_tariffs_7_1_state_subsidized,
            'utility_tariffs_7_2_state_subsidized' => $this->utility_tariffs_7_2_state_subsidized,
            'utility_tariffs_8_1_state_subsidized' => $this->utility_tariffs_8_1_state_subsidized,
            'utility_tariffs_8_2_state_subsidized' => $this->utility_tariffs_8_2_state_subsidized,
            'utility_tariffs_9_state_subsidized' => $this->utility_tariffs_9_state_subsidized,
            'utility_tariffs_10_state_subsidized' => $this->utility_tariffs_10_state_subsidized,
            'year' => $this->year,
            'created_at' => $this->created_at,
        ];
    }
}
