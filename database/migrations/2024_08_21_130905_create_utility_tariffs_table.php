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
        Schema::create('utility_tariffs', function (Blueprint $table) {
            $table->id();
            $table->decimal('utility_tariffs_1_1_1_economically_justified')->nullable();
            $table->decimal('utility_tariffs_1_1_2_economically_justified')->nullable();
            $table->decimal('utility_tariffs_1_2_economically_justified')->nullable();
            $table->decimal('utility_tariffs_1_3_economically_justified')->nullable();
            $table->decimal('utility_tariffs_2_economically_justified')->nullable();
            $table->decimal('utility_tariffs_3_1_economically_justified')->nullable();
            $table->decimal('utility_tariffs_3_2_economically_justified')->nullable();
            $table->decimal('utility_tariffs_4_1_economically_justified')->nullable();
            $table->decimal('utility_tariffs_4_2_economically_justified')->nullable();
            $table->decimal('utility_tariffs_5_economically_justified')->nullable();
            $table->decimal('utility_tariffs_6_1_economically_justified')->nullable();
            $table->decimal('utility_tariffs_6_2_economically_justified')->nullable();
            $table->decimal('utility_tariffs_6_3_economically_justified')->nullable();
            $table->decimal('utility_tariffs_7_1_economically_justified')->nullable();
            $table->decimal('utility_tariffs_7_2_economically_justified')->nullable();
            $table->decimal('utility_tariffs_8_1_economically_justified')->nullable();
            $table->decimal('utility_tariffs_8_2_economically_justified')->nullable();
            $table->decimal('utility_tariffs_9_economically_justified')->nullable();
            $table->decimal('utility_tariffs_10_economically_justified')->nullable();
            $table->decimal('utility_tariffs_1_1_1_state_subsidized')->nullable();
            $table->decimal('utility_tariffs_1_1_2_state_subsidized')->nullable();
            $table->decimal('utility_tariffs_1_2_state_subsidized')->nullable();
            $table->decimal('utility_tariffs_1_3_state_subsidized')->nullable();
            $table->decimal('utility_tariffs_2_state_subsidized')->nullable();
            $table->decimal('utility_tariffs_3_1_state_subsidized')->nullable();
            $table->decimal('utility_tariffs_3_2_state_subsidized')->nullable();
            $table->decimal('utility_tariffs_4_1_state_subsidized')->nullable();
            $table->decimal('utility_tariffs_4_2_state_subsidized')->nullable();
            $table->decimal('utility_tariffs_5_state_subsidized')->nullable();
            $table->decimal('utility_tariffs_6_1_state_subsidized')->nullable();
            $table->decimal('utility_tariffs_6_2_state_subsidized')->nullable();
            $table->decimal('utility_tariffs_6_3_state_subsidized')->nullable();
            $table->decimal('utility_tariffs_7_1_state_subsidized')->nullable();
            $table->decimal('utility_tariffs_7_2_state_subsidized')->nullable();
            $table->decimal('utility_tariffs_8_1_state_subsidized')->nullable();
            $table->decimal('utility_tariffs_8_2_state_subsidized')->nullable();
            $table->decimal('utility_tariffs_9_state_subsidized')->nullable();
            $table->decimal('utility_tariffs_10_state_subsidized')->nullable();
            $table->integer('year');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('utility_tariffs');
    }
};
