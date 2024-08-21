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
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UtilityTariff $utilityTariff)
    {
        //
    }
}
