<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'place',
        'number_of_storeys',
        'wall_material',
        'series',
        'year_construction',
        'year_renovation',
        'square_living',
        'square_auxiliary',
        'apartment_count',
        'residents_count',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tariff()
    {
        return $this->hasOne(UtilityTariff::class);
    }

    public function utilityCost(): HasOne
    {
        return $this->hasOne(UtilityCost::class);
    }
}
