<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        ///home/alexey/Projects/laravel-vue-crud-starter-main/app/Http/Controllers/Auth/RegisterController.php
        return [
            'name.required' => __('validation.required'),
            'name.string' => __('validation.string'),
            'name.max' => __('validation.max'),
            'email.required' => __('validation.required'),
            'email.string' => __('validation.string'),
            'email.email' => __('validation.unique'),
            'email.max' => __('validation.max'),
            'email.unique' => __('validation.unique'),
            'password.required' => __('validation.required'),
            'password.string' => __('validation.string'),
            'password.min' => __('validation.min'),
            'password.confirmed' => __('validation.confirmed'),
        ];
    }
}
