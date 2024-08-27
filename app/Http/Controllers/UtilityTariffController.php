<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUtilityTariffRequest;
use App\Http\Requests\UpdateUtilityTariffRequest;
use App\Http\Resources\UtilityTariffResource;
use App\Models\UtilityTariff;

class UtilityTariffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return UtilityTariffResource::collection(UtilityTariff::all());
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
    public function store(StoreUtilityTariffRequest $request)
    {
        $utilityTariff = UtilityTariff::create([
            'ut_1_1_1_economically_justified' => $request->ut_1_1_1_economically_justified,
            'ut_1_1_2_economically_justified' => $request->ut_1_1_2_economically_justified,
            'ut_1_2_economically_justified' => $request->ut_1_2_economically_justified,
            'ut_1_3_economically_justified' => $request->ut_1_3_economically_justified,
            'ut_2_economically_justified' => $request->ut_2_economically_justified,
            'ut_3_1_economically_justified' => $request->ut_3_1_economically_justified,
            'ut_3_2_economically_justified' => $request->ut_3_2_economically_justified,
            'ut_4_1_economically_justified' => $request->ut_4_1_economically_justified,
            'ut_4_2_economically_justified' => $request->ut_4_2_economically_justified,
            'ut_5_economically_justified' => $request->ut_5_economically_justified,
            'ut_6_1_economically_justified' => $request->ut_6_1_economically_justified,
            'ut_6_2_economically_justified' => $request->ut_6_2_economically_justified,
            'ut_6_3_economically_justified' => $request->ut_6_3_economically_justified,
            'ut_7_1_economically_justified' => $request->ut_7_1_economically_justified,
            'ut_7_2_economically_justified' => $request->ut_7_2_economically_justified,
            'ut_8_1_economically_justified' => $request->ut_8_1_economically_justified,
            'ut_8_2_economically_justified' => $request->ut_8_2_economically_justified,
            'ut_9_economically_justified' => $request->ut_9_economically_justified,
            'ut_10_economically_justified' => $request->ut_10_economically_justified,
            'ut_1_1_1_state_subsidized' => $request->ut_1_1_1_state_subsidized,
            'ut_1_1_2_state_subsidized' => $request->ut_1_1_2_state_subsidized,
            'ut_1_2_state_subsidized' => $request->ut_1_2_state_subsidized,
            'ut_1_3_state_subsidized' => $request->ut_1_3_state_subsidized,
            'ut_2_state_subsidized' => $request->ut_2_state_subsidized,
            'ut_3_1_state_subsidized' => $request->ut_3_1_state_subsidized,
            'ut_3_2_state_subsidized' => $request->ut_3_2_state_subsidized,
            'ut_4_1_state_subsidized' => $request->ut_4_1_state_subsidized,
            'ut_4_2_state_subsidized' => $request->ut_4_2_state_subsidized,
            'ut_5_state_subsidized' => $request->ut_5_state_subsidized,
            'ut_6_1_state_subsidized' => $request->ut_6_1_state_subsidized,
            'ut_6_2_state_subsidized' => $request->ut_6_2_state_subsidized,
            'ut_6_3_state_subsidized' => $request->ut_6_3_state_subsidized,
            'ut_7_1_state_subsidized' => $request->ut_7_1_state_subsidized,
            'ut_7_2_state_subsidized' => $request->ut_7_2_state_subsidized,
            'ut_8_1_state_subsidized' => $request->ut_8_1_state_subsidized,
            'ut_8_2_state_subsidized' => $request->ut_8_2_state_subsidized,
            'ut_9_state_subsidized' => $request->ut_9_state_subsidized,
            'ut_10_state_subsidized' => $request->ut_10_state_subsidized,
            'year' => $request->year,
            'decree_number' => $request->decree_number,
            'project_id' => 1,
        ]);

        return new UtilityTariffResource($utilityTariff);
    }

    /**
     * Display the specified resource.
     */
    public function show(UtilityTariff $utilityTariff)
    {
        return new UtilityTariffResource($utilityTariff);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UtilityTariff $utilityTariff)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUtilityTariffRequest $request, UtilityTariff $utilityTariff)
    {
        $utilityTariff->update($request->validated());

        return new UtilityTariffResource($utilityTariff);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UtilityTariff $utilityTariff)
    {
        $utilityTariff->delete();

        return response()->noContent();
    }
}
