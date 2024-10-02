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
        Schema::create('utility_costs', function (Blueprint $table) {
            $table->id();
            $table->decimal('uc_1', 16, 6)->nullable();
            $table->decimal('uc_1_1', 16, 6)->nullable();
            $table->decimal('uc_1_2', 16, 6)->nullable();
            $table->decimal('uc_1_3', 16, 6)->nullable();
            $table->decimal('uc_1_4', 16, 6)->nullable();
            $table->decimal('uc_2', 16, 6)->nullable();
            $table->decimal('uc_3', 16, 6)->nullable();
            $table->decimal('uc_3_1', 16, 6)->nullable();
            $table->decimal('uc_3_2', 16, 6)->nullable();
            $table->decimal('uc_4_1', 16, 6)->nullable();
            $table->decimal('uc_4_2', 16, 6)->nullable();
            $table->decimal('uc_5', 16, 6)->nullable();
            $table->decimal('uc_7_1', 16, 6)->nullable();
            $table->decimal('uc_7_2', 16, 6)->nullable();
                        $table->unsignedBigInteger('project_id');
            $table->foreign('project_id')
                ->references('id')->on('projects');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('utility_costs');
    }
};
