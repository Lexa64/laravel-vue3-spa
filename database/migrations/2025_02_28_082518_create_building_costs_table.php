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
        Schema::create('building_costs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id')->nullable()->comment('ID проекта, к которому относится стоимость');
            $table->json('values')->comment('JSON с данными для всех ячеек таблицы');
            /*
                wall_material -> Материал стен (например, "Кирпичные и каменные")
                floors -> Этажность (например, "2 - 3-этажные")
                repair_cost_under_30 -> Стоимость капитального ремонта для домов до 30 лет (тыс. рублей)
                repair_cost_over_30 -> Стоимость капитального ремонта для домов более 30 лет (тыс. рублей)
                modernization_total -> Стоимость модернизации (всего, тыс. рублей)
                modernization_thermal -> Стоимость тепловой модернизации (тыс. рублей)
             */

            /*$table->string('wall_material')->comment('Материал стен (например, "Кирпичные и каменные")');
            $table->string('floors')->comment('Этажность (например, "2 - 3-этажные")');
            $table->integer('repair_cost_under_30')->comment('Стоимость капитального ремонта для домов до 30 лет (тыс. рублей)');
            $table->integer('repair_cost_over_30')->comment('Стоимость капитального ремонта для домов более 30 лет (тыс. рублей)');
            $table->integer('modernization_total')->comment('Стоимость модернизации (всего, тыс. рублей)');
            $table->integer('modernization_thermal')->comment('Стоимость тепловой модернизации (тыс. рублей)');*/
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('building_costs');
    }
};
