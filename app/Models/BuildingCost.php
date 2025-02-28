<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuildingCost extends Model
{
    use HasFactory;

    protected $fillable = [
        'wall_material',
        'floors',
        'repair_cost_under_30',
        'repair_cost_over_30',
        'modernization_total',
        'modernization_thermal',
    ];
}
