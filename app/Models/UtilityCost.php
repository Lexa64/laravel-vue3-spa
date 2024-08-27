<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UtilityCost extends Model
{
    use HasFactory;

    protected $fillable = [
        'uc_1',
        'uc_1_1',
        'uc_1_2',
        'uc_1.3',
        'uc_2',
        'uc_3',
        'uc_3_1',
        'uc_3_2',
        'uc_4',
        'uc_4_1',
        'uc_4_2',
        'uc_5',
        'uc_6',
        'uc_6_1',
        'uc_6_2',
        'uc_6_3',
        'uc_7',
        'uc_8',
        'uc_9',
        'uc_10',
        'project_id',
    ];
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
