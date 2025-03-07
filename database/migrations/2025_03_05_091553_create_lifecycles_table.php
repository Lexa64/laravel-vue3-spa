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
        Schema::create('lifecycles', function (Blueprint $table) {
            $table->id();

            // 1. Общая информация
            $table->string('name');
            $table->string('city');
            $table->enum('wall_material', [
                'крупнопанельные',
                'мелкоштучные элементы',
                'каркасные системы',
                'деревянные'
            ]);
            $table->integer('floors');
            $table->decimal('living_area', 10, 2);
            $table->decimal('auxiliary_area', 10, 2);
            $table->decimal('total_area', 10, 2);
            $table->integer('apartments_count');
            $table->integer('residents_count');
            $table->enum('heating_system', [
                'централизованный источник',
                'децентрализованная газовая',
                'децентрализованная электрическая',
                'другое'
            ]);
            $table->enum('cooking_plates', ['электрические', 'газовые']);
            $table->boolean('has_garbage_chute');
            $table->boolean('has_elevator');
            $table->boolean('has_intercom');
            // 2. Контрольные события
            $table->integer('lifecycle_duration');
            $table->integer('price_year');
            $table->date('design_task_date');
            $table->date('construction_start_date');
            $table->date('commissioning_date');
            $table->date('maintenance_date_1')->nullable();
            $table->date('maintenance_date_2')->nullable();
            $table->date('maintenance_date_3')->nullable();
            $table->date('maintenance_date_4')->nullable();
            $table->date('maintenance_date_5')->nullable();
            $table->date('maintenance_date_6')->nullable();
            $table->date('overhaul_date_1')->nullable();
            $table->date('overhaul_date_2')->nullable();
            $table->date('lifecycle_end_date');
            // 3. Стоимостные показатели
            $table->decimal('construction_cost', 15, 2);
            $table->decimal('maintenance_cost_1', 15, 2)->nullable();
            $table->decimal('maintenance_cost_2', 15, 2)->nullable();
            $table->decimal('maintenance_cost_3', 15, 2)->nullable();
            $table->decimal('maintenance_cost_4', 15, 2)->nullable();
            $table->decimal('maintenance_cost_5', 15, 2)->nullable();
            $table->decimal('maintenance_cost_6', 15, 2)->nullable();
            $table->decimal('overhaul_cost_1', 15, 2)->nullable();
            $table->decimal('overhaul_cost_2', 15, 2)->nullable();
            $table->decimal('demolition_cost', 15, 2);
            // 4. Эксплуатационные ресурсы
            $table->decimal('total_electricity', 10, 2);
            $table->decimal('auxiliary_electricity', 10, 2);
            $table->decimal('elevator_electricity', 10, 2);
            $table->decimal('household_electricity', 10, 2);
            $table->decimal('heating_electricity', 10, 2);
            $table->decimal('natural_gas', 10, 2);
            $table->decimal('total_thermal_energy', 10, 2);
            $table->decimal('heating_thermal_energy', 10, 2);
            $table->decimal('hot_water_thermal_energy', 10, 2);
            $table->decimal('total_water', 10, 2);
            $table->decimal('cold_water', 10, 2);
            $table->decimal('hot_water', 10, 2);
            $table->decimal('sewage', 10, 2);
            $table->decimal('solid_waste', 10, 2);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lifecycles');
    }
};
