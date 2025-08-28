<?php

use App\Http\Controllers\Api\BuildingCostController;
use App\Http\Controllers\Api\CostEstimateController;
use App\Http\Controllers\Api\ForecastIndexController;
use App\Http\Controllers\Api\PermissionController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\UtilityCostController;
use App\Http\Controllers\Api\UtilityTariffController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('forget-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('forget.password.post');
Route::post('reset-password', [ResetPasswordController::class, 'reset'])->name('password.reset');

Route::group(['middleware' => 'auth:sanctum'], function() {
    Route::apiResource('users', UserController::class);
    Route::apiResource('roles', RoleController::class);
    Route::apiResource('permissions', PermissionController::class);
    Route::apiResource('projects', ProjectController::class);
    Route::apiResource('utility_tariffs', UtilityTariffController::class);
    Route::apiResource('utility_costs', UtilityCostController::class);
    Route::apiResource('cost_estimates', CostEstimateController::class);
    Route::put('/forecast-indices/bulk-update', [ForecastIndexController::class, 'bulkUpdate']);
    Route::apiResource('forecast-indices', ForecastIndexController::class);
    Route::apiResource('building-costs', BuildingCostController::class);

    Route::get('role-list', [RoleController::class, 'getList']);
    Route::get('role-permissions/{id}', [PermissionController::class, 'getRolePermissions']);
    Route::get('/user', [ProfileController::class, 'user']);
    Route::get('abilities', function(Request $request) {
        return $request->user()->roles()->with('permissions')
            ->get()
            ->pluck('permissions')
            ->flatten()
            ->pluck('name')
            ->unique()
            ->values()
            ->toArray();
    });

    Route::put('/role-permissions', [PermissionController::class, 'updateRolePermissions']);
    Route::put('/user', [ProfileController::class, 'update']);


    Route::post('/lifecycle/calculate', [ProjectController::class, 'calculateLifecycle']);
    Route::get('/lifecycle/get-data', [ProjectController::class, 'getData']);
});

Route::get('/lifecycle/get-data', [ProjectController::class, 'getData']);
