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
        return [
            'name.required' => __('validation.required', ['attribute' => __('registration.name')]),
            'name.string' => __('validation.string', ['attribute' => __('registration.name')]),
            'name.max' => __('validation.max', ['attribute' => __('registration.name')]),
            'email.required' => __('validation.required', ['attribute' => __('registration.email')]),
            'email.string' => __('validation.string', ['attribute' => __('registration.email')]),
            'email.email' => __('validation.email', ['attribute' => __('registration.email')]),
            'email.max' => __('validation.max', ['attribute' => __('registration.email')]),
            'email.unique' => __('validation.unique', ['attribute' => __('registration.email')]),
            'password.required' => __('validation.required', ['attribute' => __('registration.password')]),
            'password.string' => __('validation.string', ['attribute' => __('registration.password')]),
            'password.min' => __('validation.min', ['attribute' => __('registration.password')]),
            'password.confirmed' => __('validation.confirmed', ['attribute' => __('registration.password')]),
        ];
    }
}
