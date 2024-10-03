<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CostEstimateResource extends JsonResource
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
            'ce_1_indicator' => $this->ce_1_indicator,
            'ce_2_indicator' => $this->ce_2_indicator,
            'ce_3_indicator' => $this->ce_3_indicator,
            'ce_4_indicator' => $this->ce_4_indicator,
            'ce_5_indicator' => $this->ce_5_indicator,
            'ce_6_indicator' => $this->ce_6_indicator,
            'ce_7_indicator' => $this->ce_7_indicator,
            'ce_8_indicator' => $this->ce_8_indicator,
            'ce_9_indicator' => $this->ce_9_indicator,
            'ce_10_indicator' => $this->ce_10_indicator,
            'ce_11_indicator' => $this->ce_11_indicator,
            'ce_12_indicator' => $this->ce_12_indicator,
            'ce_13_indicator' => $this->ce_13_indicator,
            'ce_14_indicator' => $this->ce_14_indicator,
            'ce_1_total_costs' => $this->ce_1_total_costs,
            'ce_2_total_costs' => $this->ce_2_total_costs,
            'ce_3_total_costs' => $this->ce_3_total_costs,
            'ce_4_total_costs' => $this->ce_4_total_costs,
            'ce_5_total_costs' => $this->ce_5_total_costs,
            'ce_6_total_costs' => $this->ce_6_total_costs,
            'ce_7_total_costs' => $this->ce_7_total_costs,
            'ce_8_total_costs' => $this->ce_8_total_costs,
            'ce_9_total_costs' => $this->ce_9_total_costs,
            'ce_10_total_costs' => $this->ce_10_total_costs,
            'ce_11_total_costs' => $this->ce_11_total_costs,
            'ce_12_total_costs' => $this->ce_12_total_costs,
            'ce_13_total_costs' => $this->ce_13_total_costs,
            'ce_14_total_costs' => $this->ce_14_total_costs,
            'project_id' => $this->project_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
