<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisterOfMaterial extends Model
{
    use HasFactory;

    protected $table = 'register_of_materials';

    protected $fillable = [
        'wall_material',
        'date_of_registration',
        'valid_until',
        'extended_until',
        'name_of_material',
        'appointment',
        'manufacturer',
        'applicant',
        'testing_laboratory',
        'protocol_number',
        'date_expert_opinions',
        'certificate_is_valid_for',
        'special_marks',
        'user_id'
    ];

    protected $casts = [
        'date_of_registration' => 'date',
        'valid_until' => 'date',
        'extended_until' => 'date',
        'date_expert_opinions' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
