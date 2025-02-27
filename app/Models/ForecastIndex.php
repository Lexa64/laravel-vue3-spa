<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ForecastIndex extends Model
{
    use HasFactory;

    /**
     * Поля, которые можно массово назначать.
     *
     * @var array
     */
    protected $fillable = [
        'project_id', // Может быть NULL
        'period',     // Период (например, "Январь")
        'values',     // Значения за каждый год в формате JSON
    ];

    /**
     * Поля, которые должны быть приведены к определенным типам.
     *
     * @var array
     */
    protected $casts = [
        'values' => 'array', // Приводим поле values к типу array
    ];

    /**
     * Отношение "один к одному" с моделью Project.
     * Если project_id = NULL, вернется пустой объект Project.
     *
     * @return BelongsTo
     */
    public function project()
    {
        return $this->belongsTo(Project::class)->withDefault();
    }
}
