<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLifecycleRequest;
use App\Http\Requests\UpdateLifecycleRequest;
use App\Http\Resources\LifecycleResource;
use App\Models\Lifecycle;
use Illuminate\Http\Request;

class LifecycleController extends Controller
{
    public function index()
    {
        return LifecycleResource::collection(Lifecycle::all());
    }
    public function store(StoreLifecycleRequest $request)
    {
        $lifecycle = Lifecycle::create($request->validated());
        return new LifecycleResource($lifecycle);
    }
    public function show(Lifecycle $lifecycle)
    {
        return new LifecycleResource($lifecycle);
    }
    public function update(UpdateLifecycleRequest $request, Lifecycle $lifecycle)
    {
        $lifecycle->update($request->validated());
        return new LifecycleResource($lifecycle);
    }
    public function destroy(Lifecycle $lifecycle)
    {
        $lifecycle->delete();
        return response()->noContent();
    }
}
