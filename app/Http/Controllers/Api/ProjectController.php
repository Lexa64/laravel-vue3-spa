<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Resources\ProjectResource;
use App\Models\Project;
use Illuminate\Http\Request;

//use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ProjectResource::collection(Project::all());
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
    public function store(StoreProjectRequest $request)
    {
        //$user = Auth::user();
        $project = Project::create([
            'place' => $request->place,
            'number_of_storeys' => $request->number_of_storeys,
            'wall_material' => $request->wall_material,
            'series' => $request->series,
            'year_construction' => $request->year_construction,
            'year_renovation' => $request->year_renovation,
            'square_living' => $request->square_living,
            'square_auxiliary' => $request->square_auxiliary,
            'apartment_count' => $request->apartment_count,
            'residents_count' => $request->residents_count,
            'user_id' => $request->user()->id,
        ]);

        return new ProjectResource($project);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return new ProjectResource($project);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $project->update($request->validated());

        return new ProjectResource($project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return response()->noContent();
    }

    public function calculateLifecycle(Request $request)
    {
        $params = json_decode($request->getContent());
        $project = Project::with('tariff', 'utilityCost')->find($params->project_id);

        $data = [];

        $data['resource_consumption']['1_1_2'] = round($project->square_living, 2);
        $data['economically_justified']['1_1_2'] = round($project->square_living * $project->tariff->ut_1_1_2_economically_justified * 12, 2);
        $data['state_subsidized']['1_1_2'] = round($project->square_living * $project->tariff->ut_1_1_2_state_subsidized * 12, 2);

        $data['resource_consumption']['1_2'] = $project->residents_count;
        $data['economically_justified']['1_2'] = round($project->residents_count * $project->tariff->ut_1_2_economically_justified, 2);
        $data['state_subsidized']['1_2'] = round($data['economically_justified']['1_2'] * $project->tariff->ut_1_2_state_subsidized, 2);

        $data['resource_consumption']['1_3'] = $project->utilityCost->uc_1_3;
        $data['economically_justified']['1_3'] = round($project->utilityCost->uc_1_3 * $project->tariff->ut_1_3_economically_justified, 2);
        $data['state_subsidized']['1_3'] = round($project->utilityCost->uc_1_3 * $project->tariff->ut_1_3_state_subsidized, 2);

        $data['resource_consumption']['2'] = $project->residents_count;
        $data['economically_justified']['2'] = round($project->residents_count * $project->tariff->ut_2_economically_justified * 12, 2);
        $data['state_subsidized']['2'] = round($project->residents_count * $project->tariff->ut_2_state_subsidized * 12, 2);

        $data['resource_consumption']['3_1'] = $project->utilityCost->uc_3_1;
        $data['economically_justified']['3_1'] = round($project->utilityCost->uc_3_1 * $project->tariff->ut_3_1_economically_justified, 2);
        $data['state_subsidized']['3_1'] = round($project->utilityCost->uc_3_1 * $project->tariff->ut_3_1_state_subsidized, 2);

        $data['resource_consumption']['3_2'] = $project->utilityCost->uc_3_2;
        $data['economically_justified']['3_2'] = round($project->utilityCost->uc_3_2 * $project->tariff->ut_3_2_economically_justified, 2);
        $data['state_subsidized']['3_2'] = round($project->utilityCost->uc_3_2 * $project->tariff->ut_3_2_state_subsidized, 2);

        $data['resource_consumption']['4_1'] = $project->utilityCost->uc_4_1;
        $data['economically_justified']['4_1'] = round($project->utilityCost->uc_4_1 * $project->tariff->ut_4_1_economically_justified, 2);
        $data['state_subsidized']['4_1'] = round($project->utilityCost->uc_4_1 * $project->tariff->ut_4_1_state_subsidized, 2);

        $data['resource_consumption']['4_2'] = $project->utilityCost->uc_4_2;
        $data['economically_justified']['4_2'] = round($project->utilityCost->uc_4_2 * $project->tariff->ut_4_2_economically_justified, 2);
        $data['state_subsidized']['4_2'] = round($project->utilityCost->uc_4_2 * $project->tariff->ut_4_2_state_subsidized, 2);

        $data['resource_consumption']['5'] = $project->utilityCost->uc_5;
        $data['economically_justified']['5'] = round($project->utilityCost->uc_5 * $project->tariff->ut_5_economically_justified, 2);
        $data['state_subsidized']['5'] = round($project->utilityCost->uc_5 * $project->tariff->ut_5_state_subsidized, 2);

        $data['resource_consumption']['6_1'] = $project->square_living;
        $data['economically_justified']['6_1'] = round($project->square_living * $project->tariff->ut_6_1_economically_justified * 12, 2);
        $data['state_subsidized']['6_1'] = round($project->square_living * $project->tariff->ut_6_1_state_subsidized * 12, 2);

        $data['resource_consumption']['6_3'] = $project->square_living;
        $data['economically_justified']['6_3'] = round($project->square_living * $project->tariff->ut_6_3_economically_justified * 12, 2);
        $data['state_subsidized']['6_3'] = round($data['economically_justified']['6_3'] * $project->tariff->ut_6_3_state_subsidized * 12, 2);

        $data['resource_consumption']['7_2'] = 2.68 * $project->residents_count;
        $data['economically_justified']['7_2'] = round(2.68 * $project->residents_count * $project->tariff->ut_7_2_economically_justified, 2);
        $data['state_subsidized']['7_2'] = round(2.68 * $project->residents_count * $project->tariff->ut_7_2_state_subsidized, 2);

        $data['resource_consumption']['8_2'] = $project->square_living;
        $data['economically_justified']['8_2'] = round($project->square_living * $project->tariff->ut_8_2_economically_justified * 12, 2);
        $data['state_subsidized']['8_2'] = round($project->square_living * $project->tariff->ut_8_2_state_subsidized * 12, 2);

        $data['resource_consumption']['9'] = $project->square_living;
        $data['economically_justified']['9'] = round($project->square_living * $project->tariff->ut_9_economically_justified * 12, 2);
        $data['state_subsidized']['9'] = round($project->square_living * $project->tariff->ut_9_state_subsidized * 12, 2);

        return $data;
    }
}
