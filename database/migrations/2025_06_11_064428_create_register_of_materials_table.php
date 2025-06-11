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
        Schema::create('register_of_materials', function (Blueprint $table) {
            $table->id();

            $table->enum('authorized_body', [
                'РУП "СтройМедиаПроект"',
                'РУП "СТРОЙТЕХНОРМ"',
                'РУП "Институт БелНИИС"',
                'РУП "БИСП" Управление делами Президента Республики Беларусь',
                'УП "БелДорНИИ"',
                'УП "Институт НИИСМ"',
                'РУП "Сертис" РУП "Белстройцентр"'
            ])->nullable()->comment('Уполномоченный орган');

            $table->date('date_of_registration')->nullable()->comment('Дата регистрации');
            $table->date('valid_until')->nullable()->comment('Действителен до');
            $table->date('extended_until')->nullable()->comment('Продлён до');

            $table->string('name_of_material')->nullable()->comment('Наименование материала (изделия)');
            $table->string('appointment')->nullable()->comment('Назначение');
            $table->string('manufacturer')->nullable()->comment('Изготовитель');
            $table->string('applicant')->nullable()->comment('Заявитель');

            $table->enum('testing_laboratory', [
                'Лаборатория 1',
                'Лаборатория 2',
                'Лаборатория 3'
            ])->nullable()->comment('Наименование испытательной лаборатории (центра)');

            $table->string('protocol_number')->nullable()->comment('Номер протокола');
            $table->date('date_expert_opinions')->nullable()->comment('Дата выдачи экспертных заключений');
            $table->enum('certificate_is_valid_for', [
                'Опция 1',
                'Опция 2',
                'Опция 3'
            ])->nullable()->comment('Техническое свидетельство действует на');
            $table->string('special_marks')->nullable()->comment('Особые отметки');

            $table->boolean('is_draft')->nullable()->comment('Это черновик?');

            $table->unsignedBigInteger('user_id')->nullable()->comment('ID Пользователя, который создал проект');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('register_of_materials');
    }
};
