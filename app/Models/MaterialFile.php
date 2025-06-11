<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterialFile extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'path', 'type', 'mime_type', 'size', 'register_of_materials_id'];

    public function material()
    {
        return $this->belongsTo(RegisterOfMaterial::class);
    }
}
