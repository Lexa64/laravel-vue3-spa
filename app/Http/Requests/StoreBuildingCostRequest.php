<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBuildingCostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'wall_material' => 'required|string|max:255',
            'floors' => 'required|string|max:50',
            'repair_cost_under_30' => 'required|integer',
            'repair_cost_over_30' => 'required|integer',
            'modernization_total' => 'required|integer',
            'modernization_thermal' => 'required|integer',
        ];
    }
}
