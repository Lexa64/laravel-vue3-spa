<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBuildingCostRequest extends FormRequest
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
            'wall_material' => 'sometimes|string|max:255',
            'floors' => 'sometimes|string|max:50',
            'repair_cost_under_30' => 'sometimes|integer',
            'repair_cost_over_30' => 'sometimes|integer',
            'modernization_total' => 'sometimes|integer',
            'modernization_thermal' => 'sometimes|integer',
        ];
    }
}
