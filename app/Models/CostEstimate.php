<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CostEstimate extends Model
{
    use HasFactory;

    protected $fillable = [
        'ce_1_indicator',
        'ce_1_total_costs',
        'ce_2_indicator',
        'ce_2_total_costs',
        'ce_3_indicator',
        'ce_3_total_costs',
        'ce_4_indicator',
        'ce_4_total_costs',
        'ce_5_indicator',
        'ce_5_total_costs',
        'ce_6_indicator',
        'ce_6_total_costs',
        'ce_7_indicator',
        'ce_7_total_costs',
        'ce_8_indicator',
        'ce_8_total_costs',
        'ce_9_indicator',
        'ce_9_total_costs',
        'ce_10_indicator',
        'ce_10_total_costs',
        'ce_11_indicator',
        'ce_11_total_costs',
        'ce_12_indicator',
        'ce_12_total_costs',
        'ce_13_indicator',
        'ce_13_total_costs',
        'ce_14_indicator',
        'ce_14_total_costs',
        'project_id',
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
