<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('material_files', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('path'); // Путь в Storage
            $table->string('type'); // 'main' или 'additional'
            $table->string('mime_type'); // image/jpeg, application/pdf
            $table->unsignedInteger('size');
            $table->foreignId('register_of_materials_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('material_files');
    }
};
