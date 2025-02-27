<?php

namespace App\Http\Controllers\Api;

use App\Models\ForecastIndex;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ForecastIndexController extends Controller
{
    public function index()
    {
        return ForecastIndex::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'project_id' => 'nullable|exists:projects,id', // project_id может быть NULL
            'period' => 'required|string',
            'values' => 'required|json',
        ]);

        return ForecastIndex::create($data);
    }

    public function show(ForecastIndex $forecastIndex)
    {
        return $forecastIndex;
    }

    public function update(Request $request, ForecastIndex $forecastIndex)
    {
        $data = $request->validate([
            'project_id' => 'nullable|exists:projects,id', // project_id может быть NULL
            'period' => 'string',
            'values' => 'json',
        ]);

        $forecastIndex->update($data);
        return $forecastIndex;
    }

    public function destroy(ForecastIndex $forecastIndex)
    {
        $forecastIndex->delete();
        return response()->noContent();
    }

    public function bulkUpdate(Request $request)
    {
        $data = $request->input('data');

        foreach ($data as $item) {
            ForecastIndex::where('id', $item['id'])->update([
                'values' => $item['values'],
            ]);
        }

        return response()->json(['message' => 'Данные успешно обновлены']);
    }
}
