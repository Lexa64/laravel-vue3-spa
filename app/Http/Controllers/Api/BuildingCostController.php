<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBuildingCostRequest;
use App\Http\Requests\UpdateBuildingCostRequest;
use App\Http\Resources\BuildingCostResource;
use App\Models\BuildingCost;
use Illuminate\Http\Request;

class BuildingCostController extends Controller
{
    public function index()
    {
        return BuildingCostResource::collection(BuildingCost::all());
    }

    public function store(StoreBuildingCostRequest $request)
    {
        $buildingCost = BuildingCost::create($request->validated());
        return new BuildingCostResource($buildingCost);
    }

    public function show(BuildingCost $buildingCost)
    {
        return new BuildingCostResource($buildingCost);
    }

    public function update(UpdateBuildingCostRequest $request, BuildingCost $buildingCost)
    {
        $buildingCost->update($request->validated());
        return new BuildingCostResource($buildingCost);
    }

    public function destroy(BuildingCost $buildingCost)
    {
        $buildingCost->delete();
        return response()->noContent();
    }
}
