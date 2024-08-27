<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'place' => ['required', 'max:255'],
            'number_of_storeys' => ['required', 'integer'],
            'wall_material' => ['required', 'max:255'],
            'series' => ['required', 'max:255'],
            'year_construction' => ['required', 'integer'],
            'square_living' => ['required', 'numeric'],
            'square_auxiliary' => ['required', 'numeric'],
            'apartment_count' => ['required', 'integer'],
            'residents_count' => ['required', 'integer'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'place.required' => __('validation.required', ['attribute' => "''" . __('projects.place') . "''"]),
            'number_of_storeys.required' => __('validation.required', ['attribute' => "''" . __('projects.number_of_storeys') . "''"]),
            'wall_material.required' => __('validation.required', ['attribute' => "''" . __('projects.wall_material') . "''"]),
            'series.required' => __('validation.required', ['attribute' => "''" . __('projects.series') . "''"]),
            'year_construction.required' => __('validation.required', ['attribute' => "''" . __('projects.year_construction') . "''"]),
            'square_living.required' => __('validation.required', ['attribute' => "''" . __('projects.square_living') . "''"]),
            'square_auxiliary.required' => __('validation.required', ['attribute' => "''" . __('projects.square_auxiliary') . "''"]),
            'apartment_count.required' => __('validation.required', ['attribute' => "''" . __('projects.apartment_count') . "''"]),
            'residents_count.required' => __('validation.required', ['attribute' => "''" . __('projects.residents_count') . "''"]),
        ];
    }
}
