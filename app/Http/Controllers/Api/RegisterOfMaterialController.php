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
        if (!in_array($orderColumn, ['id', 'name', 'email', 'created_at'])) {
            $orderColumn = 'created_at';
        }

        $orderDirection = request('order_direction', 'desc');
        if (!in_array($orderDirection, ['asc', 'desc'])) {
            $orderDirection = 'desc';
        }

        $materials = RegisterOfMaterial::when(request('search_id'), function ($query) {
            $query->where('id', request('search_id'));
        })->when(request('search_title'), function ($query) {
            $query->where('name', 'like', '%' . request('search_title') . '%');
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
