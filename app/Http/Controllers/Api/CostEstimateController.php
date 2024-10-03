<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCostEstimateRequest;
use App\Http\Requests\UpdateCostEstimateRequest;
use App\Http\Resources\CostEstimateResource;
use App\Models\CostEstimate;

class CostEstimateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return CostEstimateResource::collection(CostEstimate::all());
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
    public function store(StoreCostEstimateRequest $request)
    {
        $costEstimate = CostEstimate::create([
            'ce_1_indicator' => $request->ce_1_indicator,
            'ce_2_indicator' => $request->ce_2_indicator,
            'ce_3_indicator' => $request->ce_3_indicator,
            'ce_4_indicator' => $request->ce_4_indicator,
            'ce_5_indicator' => $request->ce_5_indicator,
            'ce_6_indicator' => $request->ce_6_indicator,
            'ce_7_indicator' => $request->ce_7_indicator,
            'ce_8_indicator' => $request->ce_8_indicator,
            'ce_9_indicator' => $request->ce_9_indicator,
            'ce_10_indicator' => $request->ce_10_indicator,
            'ce_11_indicator' => $request->ce_11_indicator,
            'ce_12_indicator' => $request->ce_12_indicator,
            'ce_13_indicator' => $request->ce_13_indicator,
            'ce_14_indicator' => $request->ce_14_indicator,
            'ce_1_total_costs' => $request->ce_1_total_costs,
            'ce_2_total_costs' => $request->ce_2_total_costs,
            'ce_3_total_costs' => $request->ce_3_total_costs,
            'ce_4_total_costs' => $request->ce_4_total_costs,
            'ce_5_total_costs' => $request->ce_5_total_costs,
            'ce_6_total_costs' => $request->ce_6_total_costs,
            'ce_7_total_costs' => $request->ce_7_total_costs,
            'ce_8_total_costs' => $request->ce_8_total_costs,
            'ce_9_total_costs' => $request->ce_9_total_costs,
            'ce_10_total_costs' => $request->ce_10_total_costs,
            'ce_11_total_costs' => $request->ce_11_total_costs,
            'ce_12_total_costs' => $request->ce_12_total_costs,
            'ce_13_total_costs' => $request->ce_13_total_costs,
            'ce_14_total_costs' => $request->ce_14_total_costs,
            'project_id' => 1,
        ]);

        return new CostEstimateResource($costEstimate);
    }

    /**
     * Display the specified resource.
     */
    public function show(CostEstimate $costEstimate)
    {
        return new CostEstimateResource($costEstimate);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CostEstimate $costEstimate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCostEstimateRequest $request, CostEstimate $costEstimate)
    {
        //$costEstimate->update($request->validated());
        $costEstimate->update($request->all());

        return new CostEstimateResource($costEstimate);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CostEstimate $costEstimate)
    {
        $costEstimate->delete();

        return response()->noContent();
    }
}
