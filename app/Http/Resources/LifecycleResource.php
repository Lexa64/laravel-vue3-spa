<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LifecycleResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'city' => $this->city,
            'wall_material' => $this->wall_material,
            'floors' => $this->floors,
            'living_area' => $this->living_area,
            'auxiliary_area' => $this->auxiliary_area,
            'total_area' => $this->total_area,
            'apartments_count' => $this->apartments_count,
            'residents_count' => $this->residents_count,
            'heating_system' => $this->heating_system,
            'cooking_plates' => $this->cooking_plates,
            'has_garbage_chute' => $this->has_garbage_chute,
            'has_elevator' => $this->has_elevator,
            'has_intercom' => $this->has_intercom,
            'lifecycle_duration' => $this->lifecycle_duration,
            'price_year' => $this->price_year,
            'design_task_date' => $this->design_task_date,
            'construction_start_date' => $this->construction_start_date,
            'commissioning_date' => $this->commissioning_date,
            'maintenance_date_1' => $this->maintenance_date_1,
            'maintenance_date_2' => $this->maintenance_date_2,
            'maintenance_date_3' => $this->maintenance_date_3,
            'maintenance_date_4' => $this->maintenance_date_4,
            'maintenance_date_5' => $this->maintenance_date_5,
            'maintenance_date_6' => $this->maintenance_date_6,
            'overhaul_date_1' => $this->overhaul_date_1,
            'overhaul_date_2' => $this->overhaul_date_2,
            'lifecycle_end_date' => $this->lifecycle_end_date,
            'construction_cost' => $this->construction_cost,
            'maintenance_cost_1' => $this->maintenance_cost_1,
            'maintenance_cost_2' => $this->maintenance_cost_2,
            'maintenance_cost_3' => $this->maintenance_cost_3,
            'maintenance_cost_4' => $this->maintenance_cost_4,
            'maintenance_cost_5' => $this->maintenance_cost_5,
            'maintenance_cost_6' => $this->maintenance_cost_6,
            'overhaul_cost_1' => $this->overhaul_cost_1,
            'overhaul_cost_2' => $this->overhaul_cost_2,
            'demolition_cost' => $this->demolition_cost,
            'total_electricity' => $this->total_electricity,
            'auxiliary_electricity' => $this->auxiliary_electricity,
            'elevator_electricity' => $this->elevator_electricity,
            'household_electricity' => $this->household_electricity,
            'heating_electricity' => $this->heating_electricity,
            'natural_gas' => $this->natural_gas,
            'total_thermal_energy' => $this->total_thermal_energy,
            'heating_thermal_energy' => $this->heating_thermal_energy,
            'hot_water_thermal_energy' => $this->hot_water_thermal_energy,
            'total_water' => $this->total_water,
            'cold_water' => $this->cold_water,
            'hot_water' => $this->hot_water,
            'sewage' => $this->sewage,
            'solid_waste' => $this->solid_waste,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
