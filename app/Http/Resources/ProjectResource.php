<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'place' => $this->place,
            'number_of_storeys' => $this->number_of_storeys,
            'wall_material' => $this->wall_material,
            'series' => $this->series,
            'year_construction' => $this->year_construction,
            'year_renovation' => $this->year_renovation,
            'square_living' => $this->square_living,
            'square_auxiliary' => $this->square_auxiliary,
            'apartment_count' => $this->apartment_count,
            'residents_count' => $this->residents_count,
            'user' => $this->user,
            'tariff' => $this->tariff,
            'created_at' => $this->created_at,
        ];
    }
}
