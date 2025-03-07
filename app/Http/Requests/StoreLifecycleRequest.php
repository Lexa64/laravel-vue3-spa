<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLifecycleRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'wall_material' => 'required|in:крупнопанельные,мелкоштучные элементы,каркасные системы,деревянные',
            'floors' => 'required|integer|min:1',
            'living_area' => 'required|numeric|min:0',
            'auxiliary_area' => 'required|numeric|min:0',
            'total_area' => 'required|numeric|min:0',
            'apartments_count' => 'required|integer|min:0',
            'residents_count' => 'required|integer|min:0',
            'heating_system' => 'required|in:централизованный источник,децентрализованная газовая,децентрализованная электрическая,другое',
            'cooking_plates' => 'required|in:электрические,газовые',
            'has_garbage_chute' => 'required|boolean',
            'has_elevator' => 'required|boolean',
            'has_intercom' => 'required|boolean',
            'lifecycle_duration' => 'required|integer|min:1',
            'price_year' => 'required|integer|min:1900|max:2100',
            'design_task_date' => 'required|date',
            'construction_start_date' => 'required|date',
            'commissioning_date' => 'required|date',
            'maintenance_date_1' => 'nullable|date',
            'maintenance_date_2' => 'nullable|date',
            'maintenance_date_3' => 'nullable|date',
            'maintenance_date_4' => 'nullable|date',
            'maintenance_date_5' => 'nullable|date',
            'maintenance_date_6' => 'nullable|date',
            'overhaul_date_1' => 'nullable|date',
            'overhaul_date_2' => 'nullable|date',
            'lifecycle_end_date' => 'required|date',
            'construction_cost' => 'required|numeric|min:0',
            'maintenance_cost_1' => 'nullable|numeric|min:0',
            'maintenance_cost_2' => 'nullable|numeric|min:0',
            'maintenance_cost_3' => 'nullable|numeric|min:0',
            'maintenance_cost_4' => 'nullable|numeric|min:0',
            'maintenance_cost_5' => 'nullable|numeric|min:0',
            'maintenance_cost_6' => 'nullable|numeric|min:0',
            'overhaul_cost_1' => 'nullable|numeric|min:0',
            'overhaul_cost_2' => 'nullable|numeric|min:0',
            'demolition_cost' => 'required|numeric|min:0',
            'total_electricity' => 'required|numeric|min:0',
            'auxiliary_electricity' => 'required|numeric|min:0',
            'elevator_electricity' => 'required|numeric|min:0',
            'household_electricity' => 'required|numeric|min:0',
            'heating_electricity' => 'required|numeric|min:0',
            'natural_gas' => 'required|numeric|min:0',
            'total_thermal_energy' => 'required|numeric|min:0',
            'heating_thermal_energy' => 'required|numeric|min:0',
            'hot_water_thermal_energy' => 'required|numeric|min:0',
            'total_water' => 'required|numeric|min:0',
            'cold_water' => 'required|numeric|min:0',
            'hot_water' => 'required|numeric|min:0',
            'sewage' => 'required|numeric|min:0',
            'solid_waste' => 'required|numeric|min:0'
        ];
    }
}
