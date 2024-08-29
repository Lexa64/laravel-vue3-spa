<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUtilityCostRequest;
use App\Http\Requests\UpdateUtilityCostRequest;
use App\Http\Resources\UtilityCostResource;
use App\Models\UtilityCost;

class UtilityCostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return UtilityCostResource::collection(UtilityCost::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUtilityCostRequest $request)
    {
        $utilityCost = UtilityCost::create([
            'uc_1' => $request->uc_1,
            'uc_1_1' => $request->uc_1_1,
            'uc_1_2' => $request->uc_1_2,
            'uc_1_3' => $request->uc_1_3,
            'uc_2' => $request->uc_2,
            'uc_3' => $request->uc_3,
            'uc_3_1' => $request->uc_3_1,
            'uc_3_2' => $request->uc_3_2,
            'uc_4' => $request->uc_4,
            'uc_4_1' => $request->uc_4_1,
            'uc_4_2' => $request->uc_4_2,
            'uc_5' => $request->uc_5,
            'uc_6' => $request->uc_6,
            'uc_6_1' => $request->uc_6_1,
            'uc_6_2' => $request->uc_6_2,
            'uc_6_3' => $request->uc_6_3,
            'uc_7' => $request->uc_7,
            'uc_8' => $request->uc_8,
            'uc_9' => $request->uc_9,
            'uc_10' => $request->uc_10,
            'project_id' => 1,
        ]);

        return new UtilityCostResource($utilityCost);
    }

    /**
     * Display the specified resource.
     */
    public function show(UtilityCost $utilityCost)
    {
        return new UtilityCostResource($utilityCost);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UtilityCost $utilityCost)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUtilityCostRequest $request, UtilityCost $utilityCost)
    {
        //$utilityCost->update($request->validated());
        $utilityCost->update($request->all());

        return new UtilityCostResource($utilityCost);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UtilityCost $utilityCost)
    {
        $utilityCost->delete();

        return response()->noContent();
    }
}
