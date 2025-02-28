<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BuildingCostResource extends JsonResource
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
            'wall_material' => $this->wall_material,
            'floors' => $this->floors,
            'repair_cost_under_30' => $this->repair_cost_under_30,
            'repair_cost_over_30' => $this->repair_cost_over_30,
            'modernization_total' => $this->modernization_total,
            'modernization_thermal' => $this->modernization_thermal,
        ];
    }
}
