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
            $table->decimal('ut_1_1_1_economically_justified')->nullable();
            $table->decimal('ut_1_1_2_economically_justified')->nullable();
            $table->decimal('ut_1_2_economically_justified')->nullable();
            $table->decimal('ut_1_3_economically_justified')->nullable();
            $table->decimal('ut_2_economically_justified')->nullable();
            $table->decimal('ut_3_1_economically_justified')->nullable();
            $table->decimal('ut_3_2_economically_justified')->nullable();
            $table->decimal('ut_4_1_economically_justified')->nullable();
            $table->decimal('ut_4_2_economically_justified')->nullable();
            $table->decimal('ut_5_economically_justified')->nullable();
            $table->decimal('ut_6_1_economically_justified')->nullable();
            $table->decimal('ut_6_2_economically_justified')->nullable();
            $table->decimal('ut_6_3_economically_justified')->nullable();
            $table->decimal('ut_7_1_economically_justified')->nullable();
            $table->decimal('ut_7_2_economically_justified')->nullable();
            $table->decimal('ut_8_1_economically_justified')->nullable();
            $table->decimal('ut_8_2_economically_justified')->nullable();
            $table->decimal('ut_9_economically_justified')->nullable();
            $table->decimal('ut_10_economically_justified')->nullable();
            $table->decimal('ut_1_1_1_state_subsidized')->nullable();
            $table->decimal('ut_1_1_2_state_subsidized')->nullable();
            $table->decimal('ut_1_2_state_subsidized')->nullable();
            $table->decimal('ut_1_3_state_subsidized')->nullable();
            $table->decimal('ut_2_state_subsidized')->nullable();
            $table->decimal('ut_3_1_state_subsidized')->nullable();
            $table->decimal('ut_3_2_state_subsidized')->nullable();
            $table->decimal('ut_4_1_state_subsidized')->nullable();
            $table->decimal('ut_4_2_state_subsidized')->nullable();
            $table->decimal('ut_5_state_subsidized')->nullable();
            $table->decimal('ut_6_1_state_subsidized')->nullable();
            $table->decimal('ut_6_2_state_subsidized')->nullable();
            $table->decimal('ut_6_3_state_subsidized')->nullable();
            $table->decimal('ut_7_1_state_subsidized')->nullable();
            $table->decimal('ut_7_2_state_subsidized')->nullable();
            $table->decimal('ut_8_1_state_subsidized')->nullable();
            $table->decimal('ut_8_2_state_subsidized')->nullable();
            $table->decimal('ut_9_state_subsidized')->nullable();
            $table->decimal('ut_10_state_subsidized')->nullable();
            $table->integer('year');
            $table->string('decree_number');

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
