<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lifecycle extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name',
        'city',
        'wall_material',
        'floors',
        'living_area',
        'auxiliary_area',
        'total_area',
        'apartments_count',
        'residents_count',
        'heating_system',
        'cooking_plates',
        'has_garbage_chute',
        'has_elevator',
        'has_intercom',
        'lifecycle_duration',
        'price_year',
        'design_task_date',
        'construction_start_date',
        'commissioning_date',
        'maintenance_date_1',
        'maintenance_date_2',
        'maintenance_date_3',
        'maintenance_date_4',
        'maintenance_date_5',
        'maintenance_date_6',
        'overhaul_date_1',
        'overhaul_date_2',
        'lifecycle_end_date',
        'construction_cost',
        'maintenance_cost_1',
        'maintenance_cost_2',
        'maintenance_cost_3',
        'maintenance_cost_4',
        'maintenance_cost_5',
        'maintenance_cost_6',
        'overhaul_cost_1',
        'overhaul_cost_2',
        'demolition_cost',
        'total_electricity',
        'auxiliary_electricity',
        'elevator_electricity',
        'household_electricity',
        'heating_electricity',
        'natural_gas',
        'total_thermal_energy',
        'heating_thermal_energy',
        'hot_water_thermal_energy',
        'total_water',
        'cold_water',
        'hot_water',
        'sewage',
        'solid_waste'
    ];
    protected $casts = [
        'design_task_date' => 'date',
        'construction_start_date' => 'date',
        'commissioning_date' => 'date',
        'maintenance_date_1' => 'date',
        'maintenance_date_2' => 'date',
        'maintenance_date_3' => 'date',
        'maintenance_date_4' => 'date',
        'maintenance_date_5' => 'date',
        'maintenance_date_6' => 'date',
        'overhaul_date_1' => 'date',
        'overhaul_date_2' => 'date',
        'lifecycle_end_date' => 'date',
        'has_garbage_chute' => 'boolean',
        'has_elevator' => 'boolean',
        'has_intercom' => 'boolean'
    ];
}
