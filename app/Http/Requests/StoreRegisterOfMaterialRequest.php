<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRegisterOfMaterialRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'authorized_body' => 'nullable|in:РУП "СтройМедиаПроект",РУП "СТРОЙТЕХНОРМ",РУП "Институт БелНИИС",РУП "БИСП" Управление делами Президента Республики Беларусь,УП "БелДорНИИ",УП "Институт НИИСМ",РУП "Сертис" РУП "Белстройцентр"',
            'date_of_registration' => 'nullable|date',
            'valid_until' => 'nullable|date',
            'extended_until' => 'nullable|date',
            'name_of_material' => 'nullable|string|max:255',
            'appointment' => 'nullable|string|max:255',
            'manufacturer' => 'nullable|string|max:255',
            'applicant' => 'nullable|string|max:255',
            'testing_laboratory' => 'nullable|in:Лаборатория 1,Лаборатория 2,Лаборатория 3',
            'protocol_number' => 'nullable|string|max:255',
            'date_expert_opinions' => 'nullable|date',
            'certificate_is_valid_for' => 'nullable|in:Опция 1,Опция 2,Опция 3',
            'special_marks' => 'nullable|string|max:255',
            //'is_draft' => 'nullable|boolean',
        ];
    }
}
