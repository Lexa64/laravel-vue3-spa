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
        Schema::create('cost_estimates', function (Blueprint $table) {
            $table->id();
            $table->integer('ce_1_indicator')->nullable();
            $table->decimal('ce_1_total_costs', 16, 6)->nullable();
            $table->decimal('ce_2_indicator', 16, 6)->nullable();
            $table->decimal('ce_2_total_costs', 16, 6)->nullable();
            $table->timestamp('ce_3_indicator')->nullable();
            $table->decimal('ce_3_total_costs', 16, 6)->nullable();
            $table->decimal('ce_4_indicator', 16, 6)->nullable();
            $table->decimal('ce_4_total_costs', 16, 6)->nullable();
            $table->decimal('ce_5_indicator', 16, 6)->nullable();
            $table->decimal('ce_5_total_costs', 16, 6)->nullable();
            $table->decimal('ce_6_indicator', 16, 6)->nullable();
            $table->decimal('ce_6_total_costs', 16, 6)->nullable();
            $table->decimal('ce_7_indicator', 16, 6)->nullable();
            $table->decimal('ce_7_total_costs', 16, 6)->nullable();
            $table->decimal('ce_8_indicator', 16, 6)->nullable();
            $table->decimal('ce_8_total_costs', 16, 6)->nullable();
            $table->decimal('ce_9_indicator', 16, 6)->nullable();
            $table->decimal('ce_9_total_costs', 16, 6)->nullable();
            $table->decimal('ce_10_indicator', 16, 6)->nullable();
            $table->decimal('ce_10_total_costs', 16, 6)->nullable();
            $table->string('ce_11_indicator')->nullable();
            $table->decimal('ce_11_total_costs', 16, 6)->nullable();
            $table->decimal('ce_12_indicator', 16, 6)->nullable();
            $table->decimal('ce_12_total_costs', 16, 6)->nullable();
            $table->decimal('ce_13_indicator', 16, 6)->nullable();
            $table->decimal('ce_13_total_costs', 16, 6)->nullable();
            $table->decimal('ce_14_indicator', 16, 6)->nullable();
            $table->decimal('ce_14_total_costs', 16, 6)->nullable();
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
        Schema::dropIfExists('cost_estimate');
    }
};
