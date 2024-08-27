<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UtilityTariff extends Model
{
    use HasFactory;

    protected $fillable = [
        'ut_1_1_1_economically_justified',
        'ut_1_1_2_economically_justified',
        'ut_1_2_economically_justified',
        'ut_1_3_economically_justified',
        'ut_2_economically_justified',
        'ut_3_1_economically_justified',
        'ut_3_2_economically_justified',
        'ut_4_1_economically_justified',
        'ut_4_2_economically_justified',
        'ut_5_economically_justified',
        'ut_6_1_economically_justified',
        'ut_6_2_economically_justified',
        'ut_6_3_economically_justified',
        'ut_7_1_economically_justified',
        'ut_7_2_economically_justified',
        'ut_8_1_economically_justified',
        'ut_8_2_economically_justified',
        'ut_9_economically_justified',
        'ut_10_economically_justified',
        'ut_1_1_1_state_subsidized',
        'ut_1_1_2_state_subsidized',
        'ut_1_2_state_subsidized',
        'ut_1_3_state_subsidized',
        'ut_2_state_subsidized',
        'ut_3_1_state_subsidized',
        'ut_3_2_state_subsidized',
        'ut_4_1_state_subsidized',
        'ut_4_2_state_subsidized',
        'ut_5_state_subsidized',
        'ut_6_1_state_subsidized',
        'ut_6_2_state_subsidized',
        'ut_6_3_state_subsidized',
        'ut_7_1_state_subsidized',
        'ut_7_2_state_subsidized',
        'ut_8_1_state_subsidized',
        'ut_8_2_state_subsidized',
        'ut_9_state_subsidized',
        'ut_10_state_subsidized',
        'year',
        'decree_number',
        'project_id'
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
