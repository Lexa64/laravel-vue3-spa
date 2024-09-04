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
        'uc_1_3',
        'uc_2',
        'uc_3',
        'uc_3_1',
        'uc_3_2',
        'uc_4',
        'uc_4_1',
        'uc_4_2',
        'uc_5',
        'project_id',
    ];
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
