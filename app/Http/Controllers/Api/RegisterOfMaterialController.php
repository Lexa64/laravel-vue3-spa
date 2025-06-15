<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\RegisterOfMaterialResource;
use App\Http\Requests\StoreRegisterOfMaterialRequest;
use App\Http\Requests\UpdateRegisterOfMaterialRequest;
use App\Models\RegisterOfMaterial;

class RegisterOfMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orderColumn = request('order_column', 'created_at');
        if (!in_array($orderColumn, [
            'id',
            'protocol_number',
            'authorized_body',
            'name_of_material',
            'manufacturer',
            'applicant',
            'date_of_registration'
        ])) {
            $orderColumn = 'created_at';
        }

        // TODO: тут мб нужно проверить, стоит ли указывать значение по умолчанию
        $orderDirection = request('order_direction', 'desc');
        if (!in_array($orderDirection, ['asc', 'desc'])) {
            $orderDirection = 'desc';
        }

        $materials = RegisterOfMaterial::when(request('search_id'), function ($query) {
            $query->where('id', request('search_id'));
        })->when(request('search_authorized_body'), function ($query) {
            $query->where('authorized_body', 'like', '%' . request('search_authorized_body') . '%');
        })->when(request('search_name_of_material'), function ($query) {
            $query->where('name_of_material', 'like', '%' . request('search_name_of_material') . '%');
        })->when(request('search_date_of_registration'), function ($query) {
            $query->where('date_of_registration', request('search_date_of_registration'));
        })->when(request('search_protocol_number'), function ($query) {
            $query->where('protocol_number', 'like', '%' . request('search_protocol_number') . '%');
        })->when(request('search_applicant'), function ($query) {
            $query->where('applicant', 'like', '%' . request('search_applicant') . '%');
        })->when(request('search_valid_until'), function ($query) {
            $query->where('valid_until', request('search_valid_until'));
        })->when(request('search_global'), function ($query) {
            $query->where(function ($q) {
                $q->where('id', request('search_global'))
                    ->orWhere('protocol_number', 'like', '%' . request('search_global') . '%');
            });
        })->orderBy($orderColumn, $orderDirection)->paginate(3);

        return RegisterOfMaterialResource::collection($materials);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRegisterOfMaterialRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id();

        $material = RegisterOfMaterial::create($data);

        return new RegisterOfMaterialResource($material);
    }

    /**
     * Display the specified resource.
     */
    public function show(RegisterOfMaterial $registerOfMaterial)
    {
        return new RegisterOfMaterialResource($registerOfMaterial);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRegisterOfMaterialRequest $request, RegisterOfMaterial $registerOfMaterial)
    {
        $registerOfMaterial->update($request->validated());

        return new RegisterOfMaterialResource($registerOfMaterial);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RegisterOfMaterial $registerOfMaterial)
    {
        $registerOfMaterial->delete();

        return response()->noContent();
    }
}
