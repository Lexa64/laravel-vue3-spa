<template>
    <div>
        <h1>Расчёт жизненного цикла</h1>
        <div class="container mt-4">
            <form @submit.prevent="saveLifecycle">
                <!-- 1. Общая информация -->
                <h3>1. Общая информация</h3>
                <div class="row g-3">
                    <!-- 1.1 Отдельно -->
                    <div class="col-12">
                        <label class="form-label">1.1 Наименование объекта</label>
                        <input type="text" class="form-control" v-model="lifecycle.name">
                    </div>

                    <!-- 1.2, 1.3, 1.4, 1.5 вместе -->
                    <div class="col-md-3">
                        <label class="form-label">1.2 Область</label>
                        <select class="form-select" v-model="lifecycle.region">
                            <option value="брестская">Брестская</option>
                            <option value="витебская">Витебская</option>
                            <option value="гомельская">Гомельская</option>
                            <option value="гродненская">Гродненская</option>
                            <option value="минская">Минская</option>
                            <option value="могилёвская">Могилёвская</option>
                            <option value="минск">г. Минск</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">1.3 Населённый пункт</label>
                        <input type="text" class="form-control" v-model="lifecycle.city">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">1.4 Материал стен</label>
                        <select class="form-select" v-model="lifecycle.wall_material">
                            <option value="крупнопанельные">Крупнопанельные</option>
                            <option value="мелкоштучные элементы">Мелкоштучные элементы (кирпич, блоки)</option>
                            <option value="каркасные системы">Каркасные системы</option>
                            <option value="деревянные">Деревянные</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">1.5 Этажность</label>
                        <input type="number" class="form-control" v-model="lifecycle.floors">
                    </div>

                    <!-- 1.6, 1.7, 1.8 вместе -->
                    <div class="col-md-4">
                        <label class="form-label">1.6 Общая площадь жил. помещений (м²)</label>
                        <input type="number" step="0.01" class="form-control" v-model="lifecycle.living_area" @input="handleInput">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">1.7 Общая площадь вспом. помещений (м²)</label>
                        <input type="number" step="0.01" class="form-control" v-model="lifecycle.auxiliary_area">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">1.8 Общая площадь жил. дома (м²)</label>
                        <input type="number" step="0.01" class="form-control" v-model="lifecycle.total_area">
                    </div>

                    <!-- 1.9, 1.10, 1.11, 1.12 вместе (оставляем как было) -->
                    <div class="col-md-3">
                        <label class="form-label">1.9 Кол-во квартир</label>
                        <input type="number" class="form-control" v-model="lifecycle.apartments_count">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">1.10 Кол-во проживающих</label>
                        <input type="number" class="form-control" v-model="lifecycle.residents_count">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">1.11 Система отопления здания</label>
                        <select class="form-select" v-model="lifecycle.heating_system">
                            <option value="централизованный источник">От централизованного источника</option>
                            <option value="децентрализованная газовая">Децентрализованная газовая</option>
                            <option value="децентрализованная электрическая">Децентрализованная электрическая</option>
                            <option value="другое">Другое</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">1.12 Плиты пищеприготовления</label>
                        <select class="form-select" v-model="lifecycle.cooking_plates">
                            <option value="электрические">Электрические</option>
                            <option value="газовые">Газовые</option>
                        </select>
                    </div>
                    <!-- Остальные пункты (1.13-1.19) - по 3 в строке (оставляем как было) -->
                    <div class="col-md-4">
                        <label class="form-label">1.13 Мусоропровод</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" v-model="lifecycle.has_garbage_chute">
                            <label class="form-check-label">Есть</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">1.14 Лифт</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" v-model="lifecycle.has_elevator">
                            <label class="form-check-label">Есть</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">1.15 Запорно-переговорные устр-ва</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" v-model="lifecycle.has_intercom">
                            <label class="form-check-label">Есть</label>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">1.16 Приборы учёта расхода газа</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" v-model="lifecycle.has_gas_flow_meters">
                            <label class="form-check-label">Есть</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">1.17 Приборы индивидуального учёта расхода газа</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" v-model="lifecycle.has_gas_heating_appliances">
                            <label class="form-check-label">Есть</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">1.18 Прибор для учёта расхода эл. энергии</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" v-model="lifecycle.has_electricity_consumption_meter">
                            <label class="form-check-label">Есть</label>
                        </div>
                    </div>
                </div>
                <hr class="my-4 border-4 border-dark">
                <!-- 2. Контрольные события -->
                <h3 class="mt-4">2. Контрольные события</h3>
                <div class="row g-3">
                    <!-- 2.1, 2.2, 2.3 в одной строке -->
                    <div class="col-md-4">
                        <label class="form-label">2.1 Срок эксплуатации здания (лет)</label>
                        <input type="number" class="form-control" v-model="lifecycle.lifecycle_duration">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">2.2 Стоимостные показатели в ценах на (год)</label>
                        <input type="number" min="1991" max="2100" step="1" class="form-control" v-model="lifecycle.price_year">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">2.3 Дата выдачи задания на проектирование</label>
                        <input type="date" class="form-control" v-model="lifecycle.design_task_date">
                    </div>
                    <!-- 2.4 и 2.5 во второй строке -->
                    <div class="col-md-6">
                        <label class="form-label">2.4 Дата начала строительства</label>
                        <VueFlatpickr
                            v-model="lifecycle.construction_start_date"
                            :config="flatpickrOptions"
                            placeholder="Выберите дату"
                            class="form-control"
                        />
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">2.5 Дата приёмки объекта в эксплуатацию</label>
                        <input type="number" min="1991" max="2100" step="1" class="form-control" v-model="lifecycle.commissioning_date">
                    </div>

                    <!-- Остальные пункты (2.6-2.14) - по 2 в строке -->
                    <div class="col-md-6">
                        <label class="form-label">2.6 Дата планинруемого проведения текущего ремонта 1</label>
                        <input type="date" class="form-control" v-model="lifecycle.maintenance_date_1">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">2.7 Дата планинруемого проведения текущего ремонта 2</label>
                        <input type="date" class="form-control" v-model="lifecycle.maintenance_date_2">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">2.8 Дата планинруемого проведения текущего ремонта 3</label>
                        <input type="date" class="form-control" v-model="lifecycle.maintenance_date_3">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">2.9 Дата планинруемого проведения текущего ремонта 4</label>
                        <input type="date" class="form-control" v-model="lifecycle.maintenance_date_4">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">2.10 Дата план. пров. кап. ремонта 1</label>
                        <input type="date" class="form-control" v-model="lifecycle.overhaul_date_1">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">2.11 Дата окончания ЖЦ</label>
                        <input type="number" min="1991" max="2100" step="1" class="form-control" v-model="lifecycle.lifecycle_end_date">
                    </div>
                </div>
                <hr class="my-4 border-4 border-dark">
                <!-- 3. Стоимостные показатели -->
                <h3 class="mt-4">3. Стоимостные показатели</h3>
                <div class="row g-3">
                    <!-- Первая строка: Дата начала строительства, 3.1, 3.2 -->
                    <div class="col-md-4">
                        <label class="form-label">Дата начала стр-ва</label>
                        <input type="date" class="form-control" v-model="lifecycle.cost_indicators_date">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">3.1 Стоимость стр-ва с учётом продолж-ти (тыс. руб.)</label>
                        <input type="number" step="0.001" class="form-control" v-model="lifecycle.construction_cost">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">3.2 Стоимость стр-ва на дату расчётов (тыс. руб.)</label>
                        <input type="number" step="0.001" class="form-control" v-model="lifecycle.construction_cost_date">
                    </div>

                    <!-- Левый столбец: 3.3-3.6 -->
                    <div class="col-md-6">
                        <div class="row g-3">
                            <div class="col-12">
                                <label class="form-label">3.3 Стоимость тек. ремонта 1 (тыс. руб.)</label>
                                <input type="number" step="0.001" class="form-control" v-model="lifecycle.maintenance_cost_1">
                            </div>
                            <div class="col-12">
                                <label class="form-label">3.4 Стоимость тек. ремонта 2 (тыс. руб.)</label>
                                <input type="number" step="0.001" class="form-control" v-model="lifecycle.maintenance_cost_2">
                            </div>
                            <div class="col-12">
                                <label class="form-label">3.5 Стоимость тек. ремонта 3 (тыс. руб.)</label>
                                <input type="number" step="0.001" class="form-control" v-model="lifecycle.maintenance_cost_3">
                            </div>
                            <div class="col-12">
                                <label class="form-label">3.6 Стоимость тек. ремонта 4 (тыс. руб.)</label>
                                <input type="number" step="0.001" class="form-control" v-model="lifecycle.maintenance_cost_4">
                            </div>
                        </div>
                    </div>

                    <!-- Правый столбец: Кап. ремонт -->
                    <div class="col-md-6">
                        <div class="row g-3">
                            <div class="col-12">
                                <label class="form-label">3.9 Стоимость кап. ремонта 1 (тыс. руб.)</label>
                                <input type="number" step="0.001" class="form-control" v-model="lifecycle.overhaul_cost_1">
                            </div>
                            <!-- Можно раскомментировать при необходимости -->
                            <!-- <div class="col-12">
                                <label class="form-label">3.10 Стоимость кап. ремонта 2 (тыс. руб.)</label>
                                <input type="number" step="0.001" class="form-control" v-model="lifecycle.overhaul_cost_2">
                            </div> -->
                        </div>
                    </div>

                    <!-- Отдельная строка: Снос -->
                    <div class="col-6">
                        <label class="form-label">3.10 Стоимость сноса (тыс. руб.)</label>
                        <input type="number" step="0.001" class="form-control" v-model="lifecycle.demolition_cost">
                    </div>
                </div>
                <hr class="my-4 border-4 border-dark">
                <!-- 4. Эксплуатационные ресурсы -->
                <h3 class="mt-4">4. Эксплуатационные ресурсы</h3>
                <div class="row g-3">
                    <!-- 4.1.1, 4.1.2, 4.1.3, 4.1.4 в одной строке -->
                    <div class="col-md-3">
                        <label class="form-label">4.1.1 Эл. энерг. (освещ. вспом. помещ.) кВт·ч</label>
                        <input type="number" min="0" step="0.01" class="form-control" v-model="lifecycle.auxiliary_electricity">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">4.1.2 Эл. энерг. на работу лифта (кВт·ч)</label>
                        <input type="number" min="0" step="0.01" class="form-control" v-model="lifecycle.elevator_electricity">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">4.1.3 Эл. энерг., потребляемая домохозяйствами (кВт·ч)</label>
                        <input type="number" min="0" step="0.01" class="form-control" v-model="lifecycle.household_electricity">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">4.1.4 Эл. энерг. на отопление (кВт·ч)</label>
                        <input type="number" min="0" step="0.01" class="form-control" v-model="lifecycle.heating_electricity">
                    </div>

                    <!-- 4.1.4, 4.2, 4.3 в одной строке -->
                    <div class="col-md-4">
                        <label class="form-label">4.1.4 Эл. энерг. на отопление (кВт·ч)</label>
                        <input type="number" min="0" step="0.01" class="form-control" v-model="lifecycle.heating_electricity">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">4.2 Потребление природного газа (м³)</label>
                        <input type="number" min="0" step="0.01" class="form-control" v-model="lifecycle.natural_gas">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">4.3 Тепл. энергия, всего (Гкал)</label>
                        <input type="number" min="0" step="0.01" class="form-control" v-model="lifecycle.total_thermal_energy">
                    </div>

                    <!-- 4.3, 4.3.1, 4.3.2 в одной строке -->
                    <div class="col-md-4">
                        <label class="form-label">4.3 Тепл. энергия, всего (Гкал)</label>
                        <input type="number" min="0" step="0.01" class="form-control" v-model="lifecycle.total_thermal_energy">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">4.3.1 Теплоснабжение (отопление) (Гкал)</label>
                        <input type="number" min="0" step="0.01" class="form-control" v-model="lifecycle.heating_thermal_energy">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">4.3.2 Гор. водоснабжение (Гкал)</label>
                        <input type="number" min="0" step="0.01" class="form-control" v-model="lifecycle.hot_water_thermal_energy">
                    </div>

                    <!-- Остальные поля как есть -->
                    <div class="col-12">
                        <label class="form-label">4.4 Вода, всего (м³)</label>
                        <input type="number" min="0" step="0.01" class="form-control" v-model="lifecycle.total_water">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">4.4.1 Хол. вода (м³)</label>
                        <input type="number" min="0" step="0.01" class="form-control" v-model="lifecycle.cold_water">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">4.4.2 Гор. вода (м³)</label>
                        <input type="number" min="0" step="0.01" class="form-control" v-model="lifecycle.hot_water">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">4.5 Водоотведение (канализация) (м³)</label>
                        <input type="number" step="0.01" class="form-control" v-model="lifecycle.sewage">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">4.6 Обращение с ТКО (м³)</label>
                        <input type="number" min="0" step="0.01" class="form-control" v-model="lifecycle.solid_waste" oninput="this.value = Math.abs(this.value)">
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-12">
<!--                        <button type="submit" class="btn btn-primary">Сохранить</button>-->
                    </div>
                </div>
                <div class="col-12">
                    <label class="form-label">Расчет годовых эксплуатационных затрат, тыс. руб. (полное возмещение затрат)</label>
                    <select class="form-select" v-model="lifecycle.full_tariffs">
                        <option value=true>Да</option>
                        <option value=false>Нет</option>
                    </select>
                </div>
            </form>
            <div class="col-lg-2 d-flex align-items-start">
                <button
                    class="btn btn-primary w-100 mt-4"
                    @click="calculate"
                >
                    Рассчитать
                </button>
            </div>
            <div class="container mt-4">
                <h3 class="mb-3">Результаты (на основе тарифов):</h3>
                <table class="table table-bordered">
                    <thead class="table-light">
                    <tr>
                        <th>Показатель</th>
                        <th>Значение</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Вода</td>
                        <td>{{ final['decree_1'] }}</td>
                    </tr>
                    <tr>
                        <td>Канализация</td>
                        <td>{{ final['decree_2'] }}</td>
                    </tr>
                    <tr>
                        <td>Тех. обслуживание</td>
                        <td>{{ final['decree_3'] }}2</td>
                    </tr>
                    <tr>
                        <td>Тепло</td>
                        <td>{{ final['decree_4'] }}</td>
                    </tr>
                    <tr>
                        <td>ТКО</td>
                        <td>{{ final['decree_5'] }}</td>
                    </tr>
                    <tr>
                        <td>Лифт</td>
                        <td>{{ final['decree_6'] }}</td>
                    </tr>
                    <tr>
                        <td>Имущество совместного домовладения</td>
                        <td>{{ final['decree_7'] }}</td>
                    </tr>
                    <tr>
                        <td>Газ</td>
                        <td>{{ final['decree_8'] }}</td>
                    </tr>
                    <tr>
                        <td>Электричество (полный тариф)</td>
                        <td>{{ final['decree_14'] }}</td>
                    </tr>
                    <tr>
                        <td>Сан. содержание вспом. помещений</td>
                        <td>{{ final['decree_15'] }}</td>
                    </tr>
                    <tr>
                        <td>Запорно-переговорные устр-ва</td>
                        <td>{{ final['decree_16'] }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <!-- TODO: почему в таблицах пишется 02 значение, когда с данными что-то не так? -->
            <div class="container mt-4">
                <h3 class="mb-3">Результаты (итог):</h3>
                <table class="table table-bordered">
                    <thead class="table-light">
                    <tr>
                        <th>Показатель</th>
                        <th>Значение</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Эксплуатация и тех. обслуживание на всём ЖЦ</td>
                        <td>{{ finalTableData['j109'] }}</td>
                    </tr>
                    <tr>
                        <td>Затраты ЖЦ на 50 лет</td>
                        <td>{{ finalTableData['j111'] }}</td>
                    </tr>
                    <tr>
                        <td>Возведение</td>
                        <td>{{ finalTableData['j113'] }}2</td>
                    </tr>
                    <tr>
                        <td>Текущий ремонт</td>
                        <td>{{ finalTableData['j114'] }}</td>
                    </tr>
                    <tr>
                        <td>Капитальный ремонт</td>
                        <td>{{ finalTableData['j115'] }}</td>
                    </tr>
                    <tr>
                        <td>Эксплуатация</td>
                        <td>{{ finalTableData['j116'] }}</td>
                    </tr>
                    <tr>
                        <td>Снос</td>
                        <td>{{ finalTableData['j117'] }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
<!--            <h2 v-if="lifecycle.construction_cost!==null">Расчётная стоимость: {{ (lifecycle.construction_cost * 108).toFixed(2) }}</h2>-->
        </div>
    </div>
</template>

<script>
import axios from "axios";
import moment from 'moment';
import 'moment/dist/locale/ru';
import VueFlatpickr from 'vue-flatpickr-component';
import 'flatpickr/dist/flatpickr.min.css';
import 'flatpickr/dist/plugins/monthSelect/style.css';
// TODO: может быть нужно установить monthSelect через npm?
import monthSelectPlugin from 'flatpickr/dist/plugins/monthSelect';
import { Russian } from 'flatpickr/dist/l10n/ru';

export default {
    components: { VueFlatpickr, monthSelectPlugin },
    name: 'LifecycleForm',
    data() {
        return {
            flatpickrOptions: {
                dateFormat: 'd.m.Y',
                plugins: [
                    new monthSelectPlugin({
                        shorthand: true,
                        dateFormat: 'Y-m',
                    }),
                ],
                locale: Russian,
            },
            forecastIndices: [],
            years: [2012, 2013, 2014, 2015, 2016, 2017, 2018, 2019, 2020, 2021, 2022, 2023, 2024, 2025, 2026],
            lifecycle: {
                // 1. Общая информация
                name: 'Возведение многоквартирного 9-этажного жилого дома в г. Гродно',
                region: 'гродненская',
                city: 'г. Гродно',
                wall_material: 'крупнопанельные',
                floors: 9,
                living_area: 6418.90,
                auxiliary_area: 1431.00,
                total_area: 7849.90,
                apartments_count: 108,
                residents_count: 237,
                heating_system: 'централизованный источник',
                cooking_plates: 'газовые',
                has_garbage_chute: true,
                has_elevator: true,
                has_intercom: true,
                has_gas_flow_meters: true,
                has_gas_heating_appliances: true,
                electricity_is_used_for_heating: true,
                has_electricity_consumption_meter: true,
                // 2. Контрольные события
                lifecycle_duration: 50,
                price_year: 2022,
                design_task_date: '2022-10-01',
                construction_start_date: '2022-11',
                commissioning_date: 2023,
                maintenance_date_1: '2031-01-01',
                maintenance_date_2: '2039-01-01',
                maintenance_date_3: '2056-01-01',
                maintenance_date_4: '2064-01-01',
                /*maintenance_date_5: '',
                maintenance_date_6: '',*/
                overhaul_date_1: '2048-01-01',
                /*overhaul_date_2: '',*/
                lifecycle_end_date: 2073,
                // 3. Стоимостные показатели
                cost_indicators_date: '2022-11-01',
                construction_cost: 0,
                construction_cost_date: 0,
                maintenance_cost_1: 0,
                maintenance_cost_2: 0,
                maintenance_cost_3: 0,
                maintenance_cost_4: 0,
                maintenance_cost_5: 0,
                maintenance_cost_6: 0,
                overhaul_cost_1: 0,
                overhaul_cost_2: 0,
                demolition_cost: 0,
                // 4. Эксплуатационные ресурсы
                total_electricity: 0,
                auxiliary_electricity: 2437,
                elevator_electricity: 3673,
                household_electricity: 259200,
                heating_electricity: 0,
                natural_gas: 2592,
                total_thermal_energy: 1181.87,
                heating_thermal_energy: 825.8,
                hot_water_thermal_energy: 356.07,
                total_water: 9453.01,
                cold_water: 5470.54,
                hot_water: 3982.47,
                sewage: 9453.01,
                solid_waste: 635.16,
                // Расчет годовых эксплуатационных затрат
                full_tariffs: true,
            },
            final: {
                decree_1: 0,
                decree_2: 0,
                decree_3: 0,
                decree_4: 0,
                decree_5: 0,
                decree_6: 0,
                decree_7: 0,
                decree_8: 0,
                decree_9: 0,
                decree_10: 0,
                decree_11: 0,
                decree_12: 0,
                decree_13: 0,
                decree_14: 0,
                decree_15: 0,
                decree_16: 0,
            },
            isLoading: false,
            error: null,
            data: null,
            finalTableData: {
                j109: 0,
                j111: 0,
                j113: 0,
                j114: 0,
                j115: 0,
                j116: 0,
                j117: 0,
            }
        };
    },
    async created() {
        this.lifecycle.lifecycle_end_date = this.lifecycle.commissioning_date
        await this.loadData();
    },
    methods: {
        handleInput(event) {
            /*let temp = this.data[0].find(item => item.year === 2022)

            this.lifecycle.construction_cost = (this.lifecycle.living_area * temp.months['Ноябрь'] / 1000).toFixed(2);
            this.lifecycle.maintenance_cost_1 = (JSON.parse(this.data[2][12].values)[2015] * JSON.parse(this.data[2][12].values)[2016] *
                JSON.parse(this.data[2][12].values)[2017] * JSON.parse(this.data[2][12].values)[2018] * JSON.parse(this.data[2][12].values)[2019] *
                JSON.parse(this.data[2][12].values)[2020] * JSON.parse(this.data[2][12].values)[2021] * this.data[1][8]['data'] * 0.1375 / 10000 * 7849.9).toFixed(2);
            this.lifecycle.maintenance_cost_2 = this.lifecycle.maintenance_cost_1;
            this.lifecycle.maintenance_cost_3 = this.lifecycle.maintenance_cost_1;
            this.lifecycle.maintenance_cost_4 = this.lifecycle.maintenance_cost_1;
            this.lifecycle.overhaul_cost_1 = (JSON.parse(this.data[2][12].values)[2015] * JSON.parse(this.data[2][12].values)[2016] *
                JSON.parse(this.data[2][12].values)[2017] * JSON.parse(this.data[2][12].values)[2018] * JSON.parse(this.data[2][12].values)[2019] *
                JSON.parse(this.data[2][12].values)[2020] * JSON.parse(this.data[2][12].values)[2021] * this.data[1][8]['data'] / 10000 * 7849.9).toFixed(2)
            this.lifecycle.demolition_cost = this.lifecycle.construction_cost.toFixed(2)*/

        },
        async saveLifecycle() {
            try {
                this.isLoading = true
                this.error = null
                const response = await this.lifecycle.id
                    ? axios.put(`/api/lifecycles/${this.lifecycle.id}`, this.lifecycle)
                    : axios.post('/api/lifecycles', this.lifecycle)
                this.$emit('saved', response.data)
                this.isLoading = false
            } catch (error) {
                this.error = error.response?.data?.message || 'Произошла ошибка при сохранении'
                this.isLoading = false
            }
        },
        async loadLifecycle(id) {
            try {
                this.isLoading = true
                this.error = null

                const response = await axios.get(`/api/lifecycles/${id}`)
                this.lifecycle = response.data

                this.isLoading = false
            } catch (error) {
                this.error = error.response?.data?.message || 'Произошла ошибка при загрузке'
                this.isLoading = false
            }
        },
        /*async loadData() {
            try {
                const response = await axios.get("/api/forecast-indices");
                this.forecastIndices = response.data.map((item) => ({
                    ...item,
                    values: typeof item.values === 'string' ? JSON.parse(item.values) : item.values,
                }));

                if (this.forecastIndices.length > 0) {
                    this.years = Object.keys(this.forecastIndices[0].values);
                }
            } catch (error) {
                console.error("Ошибка при загрузке данных:", error);
            }
        },*/
        async loadData() {
            try {
                const response = await axios.get("/api/forecast-indices");

                this.forecastIndices = response.data.map((item) => ({
                    ...item,
                    values: typeof item.values === 'string' ? JSON.parse(item.values) : item.values,
                }));

                const response1 = await axios.post("/api/lifecycle/calculate");

                this.data = []

                let test = JSON.parse(response1.data.two);
                this.data[0] = JSON.parse(test[0].values); // Предельная стоимость
                this.data[1] = JSON.parse(test[1].values); // Ремонт и модернизация
                this.data[2] = JSON.parse(response1.data.one); // Прогнозные индексы
                this.data[3] = JSON.parse(test[2].values); // Указы

                let temp = this.data[0].find(item => item.year === this.lifecycle.price_year);

                /*if (this.forecastIndices.length > 0) {
                    this.years = Object.keys(this.forecastIndices[0].values);
                }*/

                let month = moment(this.lifecycle.construction_start_date, 'YYYY-MM').locale('ru').format('MMMM');

                let result = [];
                result['j37'] = (this.lifecycle.living_area * temp.months[month[0].toUpperCase() + month.slice(1)] / 1000).toFixed(3);

                result['j38'] = result['j37'];

                for (let i = 0; i < moment(this.lifecycle.construction_start_date, 'YYYY-MM').month() + 1; i++) {
                    result['j38'] = result['j38'] / JSON.parse(this.data[2][i].values)[this.lifecycle.price_year];
                }

                result['j38'] = result['j38'].toFixed(3);

                /*result['j38'] = (result['j37'] / JSON.parse(this.data[2][0].values)[this.lifecycle.price_year] /
                    JSON.parse(this.data[2][1].values)[this.lifecycle.price_year] /
                    JSON.parse(this.data[2][2].values)[this.lifecycle.price_year] /
                    JSON.parse(this.data[2][3].values)[this.lifecycle.price_year] /
                    JSON.parse(this.data[2][4].values)[this.lifecycle.price_year] /
                    JSON.parse(this.data[2][5].values)[this.lifecycle.price_year] /
                    JSON.parse(this.data[2][6].values)[this.lifecycle.price_year] /
                    JSON.parse(this.data[2][7].values)[this.lifecycle.price_year] /
                    JSON.parse(this.data[2][8].values)[this.lifecycle.price_year] /
                    JSON.parse(this.data[2][9].values)[this.lifecycle.price_year] /
                    JSON.parse(this.data[2][10].values)[this.lifecycle.price_year]).toFixed(3);*/

                //console.log(this.data[1]);

                // TODO: разобраться с этажностью и материалами стен (какие как соотносить с таблицей)
                // TODO: Гродно почему из ячейки C15, а не C21?
                let repair = 0;
                switch (this.lifecycle.wall_material) {
                    case 'крупнопанельные':
                        switch (true) {
                            case this.lifecycle.floors >= 2 && this.lifecycle.floors <= 3:
                                repair = this.data[1][0]['data'];
                                break;
                            case this.lifecycle.floors >= 4 && this.lifecycle.floors <= 5:
                                repair = this.data[1][4]['data'];
                                break;
                            case this.lifecycle.floors >= 6 && this.lifecycle.floors <= 10:
                                repair = this.data[1][8]['data'];
                                break;
                            case this.lifecycle.floors === 12:
                                repair = this.data[1][12]['data'];
                                break;
                            default:
                                break;
                        }
                        break;
                    case 'мелкоштучные элементы':
                        switch (true) {
                            case this.lifecycle.floors >= 2 && this.lifecycle.floors <= 3:
                                repair = this.data[1][0]['data'];
                                break;
                            case this.lifecycle.floors >= 4 && this.lifecycle.floors <= 5:
                                repair = this.data[1][4]['data'];
                                break;
                            case this.lifecycle.floors >= 6 && this.lifecycle.floors <= 10:
                                repair = this.data[1][8]['data'];
                                break;
                            case this.lifecycle.floors === 12:
                                repair = this.data[1][12]['data'];
                                break;
                            default:
                                break;
                        }
                        break;
                    case 'каркасные системы':
                        switch (true) {
                            case this.lifecycle.floors >= 2 && this.lifecycle.floors <= 3:
                                repair = this.data[1][16]['data'];
                                break;
                            case this.lifecycle.floors >= 4 && this.lifecycle.floors <= 5:
                                repair = this.data[1][20]['data'];
                                break;
                            case this.lifecycle.floors >= 6 && this.lifecycle.floors <= 10:
                                repair = this.data[1][24]['data'];
                                break;
                            case this.lifecycle.floors === 12:
                                repair = this.data[1][28]['data'];
                                break;
                            default:
                                break;
                        }
                        break;
                    case 'деревянные':
                        // TODO: что делать с деревянными?
                        switch (true) {
                            case this.lifecycle.floors >= 2 && this.lifecycle.floors <= 3:
                                //repair = this.data[1][0]['data'];
                                break;
                            case this.lifecycle.floors >= 4 && this.lifecycle.floors <= 5:
                                //repair = this.data[1][0]['data'];
                                break;
                            case this.lifecycle.floors >= 6 && this.lifecycle.floors <= 10:
                                //repair = this.data[1][0]['data'];
                                break;
                            case this.lifecycle.floors === 12:
                                //repair = this.data[1][0]['data'];
                                break;
                            default:
                                break;
                        }
                        break;
                }

                result['j39'] = repair;
                //console.log(JSON.parse(this.data[2][12].values))

                // TODO: это всегда минус 7 лет, или от балды?
                for (let i = this.lifecycle.price_year - 7; i < this.lifecycle.price_year + 1; i++) {
                    // TODO: а что делать, если в базе нет?
                    if (JSON.parse(this.data[2][12].values)[i] !== undefined) {
                        result['j39'] = result['j39'] * JSON.parse(this.data[2][12].values)[i];
                    }
                }

                // TODO: 0.1375: меняется ли когда-нибудь, или постоянное число будет?
                result['j39'] = (result['j39'] * 0.1375 * this.lifecycle.total_area / 10000).toFixed(3);

                /*result['j39'] = (repair * JSON.parse(this.data[2][12].values)[2015] *
                    JSON.parse(this.data[2][12].values)[2016] *
                    JSON.parse(this.data[2][12].values)[2017] *
                    JSON.parse(this.data[2][12].values)[2018] *
                    JSON.parse(this.data[2][12].values)[2019] *
                    JSON.parse(this.data[2][12].values)[2020] *
                    JSON.parse(this.data[2][12].values)[2021] *
                    JSON.parse(this.data[2][12].values)[2022] *
                    0.1375 * this.lifecycle.total_area / 10000
                ).toFixed(3);*/

                let coefficient = (this.data[1][1]['data'] / this.data[1][0]['data'] + this.data[1][5]['data'] / this.data[1][4]['data'] +
                    this.data[1][9]['data'] / this.data[1][8]['data'] + this.data[1][13]['data'] / this.data[1][12]['data'] +
                    this.data[1][17]['data'] / this.data[1][16]['data'] + this.data[1][21]['data'] / this.data[1][20]['data'] +
                    this.data[1][25]['data'] / this.data[1][24]['data'] + this.data[1][29]['data'] / this.data[1][28]['data']) / 8;

                result['j40'] = (result['j39'] * coefficient).toFixed(3);

                result['j41'] = result['j39'];
                result['j42'] = result['j40'];

                result['j46'] = repair;

                // TODO: это всегда минус 7 лет, или от балды?
                for (let i = this.lifecycle.price_year - 7; i < this.lifecycle.price_year + 1; i++) {
                    // TODO: а что делать, если в базе нет?
                    if (JSON.parse(this.data[2][12].values)[i] !== undefined) {
                        result['j46'] = result['j46'] * JSON.parse(this.data[2][12].values)[i];
                    }
                }

                result['j46'] = (result['j46'] * this.lifecycle.total_area / 10000).toFixed(3);

                /*result['j46'] = (repair * JSON.parse(this.data[2][12].values)[2015] *
                    JSON.parse(this.data[2][12].values)[2016] *
                    JSON.parse(this.data[2][12].values)[2017] *
                    JSON.parse(this.data[2][12].values)[2018] *
                    JSON.parse(this.data[2][12].values)[2019] *
                    JSON.parse(this.data[2][12].values)[2020] *
                    JSON.parse(this.data[2][12].values)[2021] *
                    JSON.parse(this.data[2][12].values)[2022] *
                    this.lifecycle.total_area / 10000
                ).toFixed(3);*/

                result['j48'] = (result['j37'] / 2 * 0.3).toFixed(3);

                let decree = this.data[3].find(item => item.year === this.lifecycle.price_year);
                //this.lifecycle.full_tariffs = false;

                result['decree_1'] = (decree[this.lifecycle.full_tariffs ? 'val2' : 'val1'] * this.lifecycle.total_water / 1000).toFixed(2);
                result['decree_2'] = (decree[this.lifecycle.full_tariffs ? 'val4' : 'val3'] * this.lifecycle.sewage / 1000).toFixed(2);
                result['decree_3'] = (decree[this.lifecycle.full_tariffs ? 'val6' : 'val5'] * this.lifecycle.living_area / 1000 * 12).toFixed(2);
                result['decree_4'] = (decree[this.lifecycle.full_tariffs ? 'val8' : 'val7'] * this.lifecycle.total_thermal_energy / 1000).toFixed(2);

                result['decree_5'] = this.lifecycle.has_garbage_chute ?
                    decree[this.lifecycle.full_tariffs ? 'val11' : 'val9'] :
                    decree[this.lifecycle.full_tariffs ? 'val12' : 'val10'];
                result['decree_5'] = (result['decree_5'] * this.lifecycle.solid_waste / 1000).toFixed(2);

                // TODO: а что делать, если лифта нет?
                if (this.lifecycle.has_elevator) {
                    result['decree_6'] = (decree[this.lifecycle.full_tariffs ? 'val14' : 'val15'] * this.lifecycle.total_area * 12 / 1000).toFixed(2);
                } else {
                    result['decree_6'] = 0;
                }

                result['decree_7'] = (decree['val15'] * this.lifecycle.living_area / 1000 * 12).toFixed(2);

                // TODO: Странно, что при полном тарифе не важно, установлены ли отопительные приборы
                if (this.lifecycle.has_gas_flow_meters) {
                    if (this.lifecycle.full_tariffs) {
                        result['decree_8'] = decree['val18'];
                    } else {
                        this.lifecycle.has_gas_heating_appliances ? result['decree_8'] = decree['val16'] : result['decree_8'] = decree['val17'];
                    }

                    result['decree_8'] = (result['decree_8'] * this.lifecycle.natural_gas / 1000).toFixed(2);
                } else {
                    result['decree_8'] = 1;
                }

                // TODO: это если используются полные тарифы. а если нет?
                if (this.lifecycle.full_tariffs) {
                    result['decree_14'] = (decree['val26'] * (this.lifecycle.auxiliary_electricity + this.lifecycle.elevator_electricity +
                        this.lifecycle.household_electricity) / 1000).toFixed(2);

                    // TODO: это временная шняга
                    result['decree_9'] = 0;
                    result['decree_10'] = 0;
                    result['decree_11'] = 0;
                    result['decree_12'] = 0;
                    result['decree_13'] = 0;
                } else {
                    if (this.lifecycle.cooking_plates === 'электрические') {
                        result['decree_9'] = 0; // Это электруха для эл. плит: val19

                        // this.lifecycle.has_electricity_consumption_meter
                        result['decree_10'] = 0; // Это электруха для эл. плит, если нет приборов учёта: val20, если есть приборы учёта: val21
                    }

                    result['decree_11'] = 0; // Освещение помещений и оборудования, за исключением лифта: области - val22, Минск - val23

                    result['decree_12'] = 0; // Лифт: val24
                    result['decree_13'] = 0; // Все остальные случаи: val25
                }

                result['decree_15'] = (decree[this.lifecycle.region !== 'минск' ? 'val27' : 'val28'] * this.lifecycle.living_area * 12 / 1000).toFixed(2);
                result['decree_16'] = this.lifecycle.has_intercom ? (decree['val29'] * this.lifecycle.apartments_count * 12 / 1000).toFixed(2) : '';

                let check = 0;
                for (let i = 1; i <= 16; i++) {
                    const key = `decree_${i}`; // Формируем ключ: decree_1, decree_2, ..., decree_16
                    check += Number(result[key]) || 0; // Прибавляем значение (если не число → 0)
                }

                console.log(check); // 265.68
                console.log(this.lifecycle.lifecycle_duration);
                let operating_costs_throughout_lifecycle = (check * this.lifecycle.lifecycle_duration).toFixed(2);
                this.finalTableData['j109'] = operating_costs_throughout_lifecycle;

/*              console.log(result['decree_1'] + ' ' +  result['decree_2'] + ' ' +  result['decree_3'] + ' ' +  result['decree_4'] + ' ' +  result['decree_5'] + ' ' +
                    result['decree_6'] + ' ' +  result['decree_7'] + ' ' +  result['decree_8'] + ' ' +  result['decree_9'] + ' ' +  result['decree_10'] + ' ' +  result['decree_11'] + ' ' +
                    result['decree_12'] + ' ' +  result['decree_13'] + ' ' +  result['decree_14'] + ' ' +  result['decree_15'] + ' ' +  result['decree_16']);*/


                /*let check = result['decree_1'] + result['decree_2'] + result['decree_3'] + result['decree_4'] + result['decree_5'] +
                    result['decree_6'] + result['decree_7'] + result['decree_8'] + result['decree_9'] + result['decree_10'] + result['decree_11'] +
                    result['decree_12'] + result['decree_13'] + result['decree_14'] + result['decree_15'] + result['decree_16'];*/

                console.log(operating_costs_throughout_lifecycle);

                let costs_throughout_lifecycle = (Number(operating_costs_throughout_lifecycle) + Number(result['j37']) + Number(result['j39']) +
                    Number(result['j40']) + Number(result['j41']) + Number(result['j42']) + Number(result['j46']) + Number(result['j48'])).toFixed(2);
                this.finalTableData['j111'] = costs_throughout_lifecycle;

                console.log(costs_throughout_lifecycle);

                this.lifecycle.construction_cost = result['j37'];
                this.lifecycle.construction_cost_date  = result['j38'];
                this.lifecycle.maintenance_cost_1  = result['j39'];
                this.lifecycle.maintenance_cost_2  = result['j40'];
                this.lifecycle.maintenance_cost_3  = result['j41'];
                this.lifecycle.maintenance_cost_4  = result['j42'];
                this.lifecycle.overhaul_cost_1 = result['j46'];
                this.lifecycle.demolition_cost = result['j48'];

                this.lifecycle.lifecycle_end_date = this.lifecycle.commissioning_date + this.lifecycle.lifecycle_duration;
                this.final = result;

                this.finalTableData['j113'] = Number(this.final['j37']).toFixed(2);
                this.finalTableData['j114'] = (Number(this.final['j39']) + Number(this.final['j40']) + Number(this.final['j41']) +
                    Number(this.final['j42'])).toFixed(2);
                this.finalTableData['j115'] = this.final['j46'];
                this.finalTableData['j116'] = this.finalTableData['j109'];
                this.finalTableData['j117'] = this.final['j48'];

                console.log(result);
            } catch (error) {
                console.error("Ошибка при загрузке данных:", error);
            }
        },
        async updateItems() {
            try {
                const dataToSend = this.forecastIndices.map((item) => ({
                    ...item,
                    values: JSON.stringify(item.values), // Преобразуем объект в строку
                }));

                await axios.put("/api/forecast-indices/bulk-update", {data: dataToSend});
                alert("Данные успешно сохранены!");
            } catch (error) {
                console.error("Ошибка при сохранении данных:", error);
                alert("Произошла ошибка при сохранении данных.");
            }
        },
        async deleteItem(id) {
            try {
                await axios.delete(`/api/forecast-indices/${id}`);
                this.forecastIndices = this.forecastIndices.filter((item) => item.id !== id);
            } catch (error) {
                console.error("Ошибка при удалении данных:", error);
            }
        },
        async calculate() {
            const response1 = await axios.post("/api/lifecycle/calculate");

            this.data = []

            let test = JSON.parse(response1.data.two);
            this.data[0] = JSON.parse(test[0].values); // Предельная стоимость
            this.data[1] = JSON.parse(test[1].values); // Ремонт и модернизация
            this.data[2] = JSON.parse(response1.data.one); // Прогнозные индексы
            this.data[3] = JSON.parse(test[2].values); // Указы

            let temp = this.data[0].find(item => item.year === this.lifecycle.price_year);

            /*if (this.forecastIndices.length > 0) {
                this.years = Object.keys(this.forecastIndices[0].values);
            }*/

            let month = moment(this.lifecycle.construction_start_date, 'YYYY-MM').locale('ru').format('MMMM');

            this.final['j37'] = (this.lifecycle.living_area * temp.months[month[0].toUpperCase() + month.slice(1)] / 1000).toFixed(3);

            this.final['j38'] = this.final['j37'];

            for (let i = 0; i < moment(this.lifecycle.construction_start_date, 'YYYY-MM').month() + 1; i++) {
                this.final['j38'] = this.final['j38'] / JSON.parse(this.data[2][i].values)[this.lifecycle.price_year];
            }

            this.final['j38'] = this.final['j38'].toFixed(3);

            /*this.final['j38'] = (this.final['j37'] / JSON.parse(this.data[2][0].values)[this.lifecycle.price_year] /
                JSON.parse(this.data[2][1].values)[this.lifecycle.price_year] /
                JSON.parse(this.data[2][2].values)[this.lifecycle.price_year] /
                JSON.parse(this.data[2][3].values)[this.lifecycle.price_year] /
                JSON.parse(this.data[2][4].values)[this.lifecycle.price_year] /
                JSON.parse(this.data[2][5].values)[this.lifecycle.price_year] /
                JSON.parse(this.data[2][6].values)[this.lifecycle.price_year] /
                JSON.parse(this.data[2][7].values)[this.lifecycle.price_year] /
                JSON.parse(this.data[2][8].values)[this.lifecycle.price_year] /
                JSON.parse(this.data[2][9].values)[this.lifecycle.price_year] /
                JSON.parse(this.data[2][10].values)[this.lifecycle.price_year]).toFixed(3);*/

            //console.log(this.data[1]);

            // TODO: разобраться с этажностью и материалами стен (какие как соотносить с таблицей)
            // TODO: Гродно почему из ячейки C15, а не C21?
            let repair = 0;
            switch (this.lifecycle.wall_material) {
                case 'крупнопанельные':
                    switch (true) {
                        case this.lifecycle.floors >= 2 && this.lifecycle.floors <= 3:
                            repair = this.data[1][0]['data'];
                            break;
                        case this.lifecycle.floors >= 4 && this.lifecycle.floors <= 5:
                            repair = this.data[1][4]['data'];
                            break;
                        case this.lifecycle.floors >= 6 && this.lifecycle.floors <= 10:
                            repair = this.data[1][8]['data'];
                            break;
                        case this.lifecycle.floors === 12:
                            repair = this.data[1][12]['data'];
                            break;
                        default:
                            break;
                    }
                    break;
                case 'мелкоштучные элементы':
                    switch (true) {
                        case this.lifecycle.floors >= 2 && this.lifecycle.floors <= 3:
                            repair = this.data[1][0]['data'];
                            break;
                        case this.lifecycle.floors >= 4 && this.lifecycle.floors <= 5:
                            repair = this.data[1][4]['data'];
                            break;
                        case this.lifecycle.floors >= 6 && this.lifecycle.floors <= 10:
                            repair = this.data[1][8]['data'];
                            break;
                        case this.lifecycle.floors === 12:
                            repair = this.data[1][12]['data'];
                            break;
                        default:
                            break;
                    }
                    break;
                case 'каркасные системы':
                    switch (true) {
                        case this.lifecycle.floors >= 2 && this.lifecycle.floors <= 3:
                            repair = this.data[1][16]['data'];
                            break;
                        case this.lifecycle.floors >= 4 && this.lifecycle.floors <= 5:
                            repair = this.data[1][20]['data'];
                            break;
                        case this.lifecycle.floors >= 6 && this.lifecycle.floors <= 10:
                            repair = this.data[1][24]['data'];
                            break;
                        case this.lifecycle.floors === 12:
                            repair = this.data[1][28]['data'];
                            break;
                        default:
                            break;
                    }
                    break;
                case 'деревянные':
                    // TODO: что делать с деревянными?
                    switch (true) {
                        case this.lifecycle.floors >= 2 && this.lifecycle.floors <= 3:
                            //repair = this.data[1][0]['data'];
                            break;
                        case this.lifecycle.floors >= 4 && this.lifecycle.floors <= 5:
                            //repair = this.data[1][0]['data'];
                            break;
                        case this.lifecycle.floors >= 6 && this.lifecycle.floors <= 10:
                            //repair = this.data[1][0]['data'];
                            break;
                        case this.lifecycle.floors === 12:
                            //repair = this.data[1][0]['data'];
                            break;
                        default:
                            break;
                    }
                    break;
            }

            this.final['j39'] = repair;
            //console.log(JSON.parse(this.data[2][12].values))

            // TODO: это всегда минус 7 лет, или от балды?
            for (let i = this.lifecycle.price_year - 7; i < this.lifecycle.price_year + 1; i++) {
                // TODO: а что делать, если в базе нет?
                if (JSON.parse(this.data[2][12].values)[i] !== undefined) {
                    this.final['j39'] = this.final['j39'] * JSON.parse(this.data[2][12].values)[i];
                }
            }

            // TODO: 0.1375: меняется ли когда-нибудь, или постоянное число будет?
            this.final['j39'] = (this.final['j39'] * 0.1375 * this.lifecycle.total_area / 10000).toFixed(3);

            /*this.final['j39'] = (repair * JSON.parse(this.data[2][12].values)[2015] *
                JSON.parse(this.data[2][12].values)[2016] *
                JSON.parse(this.data[2][12].values)[2017] *
                JSON.parse(this.data[2][12].values)[2018] *
                JSON.parse(this.data[2][12].values)[2019] *
                JSON.parse(this.data[2][12].values)[2020] *
                JSON.parse(this.data[2][12].values)[2021] *
                JSON.parse(this.data[2][12].values)[2022] *
                0.1375 * this.lifecycle.total_area / 10000
            ).toFixed(3);*/

            let coefficient = (this.data[1][1]['data'] / this.data[1][0]['data'] + this.data[1][5]['data'] / this.data[1][4]['data'] +
                this.data[1][9]['data'] / this.data[1][8]['data'] + this.data[1][13]['data'] / this.data[1][12]['data'] +
                this.data[1][17]['data'] / this.data[1][16]['data'] + this.data[1][21]['data'] / this.data[1][20]['data'] +
                this.data[1][25]['data'] / this.data[1][24]['data'] + this.data[1][29]['data'] / this.data[1][28]['data']) / 8;

            this.final['j40'] = (this.final['j39'] * coefficient).toFixed(3);

            this.final['j41'] = this.final['j39'];
            this.final['j42'] = this.final['j40'];

            this.final['j46'] = repair;

            // TODO: это всегда минус 7 лет, или от балды?
            for (let i = this.lifecycle.price_year - 7; i < this.lifecycle.price_year + 1; i++) {
                // TODO: а что делать, если в базе нет?
                if (JSON.parse(this.data[2][12].values)[i] !== undefined) {
                    this.final['j46'] = this.final['j46'] * JSON.parse(this.data[2][12].values)[i];
                }
            }

            this.final['j46'] = (this.final['j46'] * this.lifecycle.total_area / 10000).toFixed(3);

            /*this.final['j46'] = (repair * JSON.parse(this.data[2][12].values)[2015] *
                JSON.parse(this.data[2][12].values)[2016] *
                JSON.parse(this.data[2][12].values)[2017] *
                JSON.parse(this.data[2][12].values)[2018] *
                JSON.parse(this.data[2][12].values)[2019] *
                JSON.parse(this.data[2][12].values)[2020] *
                JSON.parse(this.data[2][12].values)[2021] *
                JSON.parse(this.data[2][12].values)[2022] *
                this.lifecycle.total_area / 10000
            ).toFixed(3);*/

            this.final['j48'] = (this.final['j37'] / 2 * 0.3).toFixed(3);

            let decree = this.data[3].find(item => item.year === this.lifecycle.price_year);
            //this.lifecycle.full_tariffs = false;

            this.final['decree_1'] = (decree[this.lifecycle.full_tariffs ? 'val2' : 'val1'] * this.lifecycle.total_water / 1000).toFixed(2);
            this.final['decree_2'] = (decree[this.lifecycle.full_tariffs ? 'val4' : 'val3'] * this.lifecycle.sewage / 1000).toFixed(2);
            this.final['decree_3'] = (decree[this.lifecycle.full_tariffs ? 'val6' : 'val5'] * this.lifecycle.living_area / 1000 * 12).toFixed(2);
            this.final['decree_4'] = (decree[this.lifecycle.full_tariffs ? 'val8' : 'val7'] * this.lifecycle.total_thermal_energy / 1000).toFixed(2);

            this.final['decree_5'] = this.lifecycle.has_garbage_chute ?
                decree[this.lifecycle.full_tariffs ? 'val11' : 'val9'] :
                decree[this.lifecycle.full_tariffs ? 'val12' : 'val10'];
            this.final['decree_5'] = (this.final['decree_5'] * this.lifecycle.solid_waste / 1000).toFixed(2);

            // TODO: а что делать, если лифта нет?
            if (this.lifecycle.has_elevator) {
                this.final['decree_6'] = (decree[this.lifecycle.full_tariffs ? 'val14' : 'val15'] * this.lifecycle.total_area * 12 / 1000).toFixed(2);
            } else {
                this.final['decree_6'] = 0;
            }

            this.final['decree_7'] = (decree['val15'] * this.lifecycle.living_area / 1000 * 12).toFixed(2);

            // TODO: Странно, что при полном тарифе не важно, установлены ли отопительные приборы
            if (this.lifecycle.has_gas_flow_meters) {
                if (this.lifecycle.full_tariffs) {
                    this.final['decree_8'] = decree['val18'];
                } else {
                    this.lifecycle.has_gas_heating_appliances ? this.final['decree_8'] = decree['val16'] : this.final['decree_8'] = decree['val17'];
                }

                this.final['decree_8'] = (this.final['decree_8'] * this.lifecycle.natural_gas / 1000).toFixed(2);
            } else {
                this.final['decree_8'] = 1;
            }

            // TODO: это если используются полные тарифы. а если нет?
            if (this.lifecycle.full_tariffs) {
                this.final['decree_14'] = (decree['val26'] * (this.lifecycle.auxiliary_electricity + this.lifecycle.elevator_electricity +
                    this.lifecycle.household_electricity) / 1000).toFixed(2);

                // TODO: это временная шняга
                this.final['decree_9'] = 0;
                this.final['decree_10'] = 0;
                this.final['decree_11'] = 0;
                this.final['decree_12'] = 0;
                this.final['decree_13'] = 0;
            } else {
                if (this.lifecycle.cooking_plates === 'электрические') {
                    this.final['decree_9'] = 0; // Это электруха для эл. плит: val19

                    // this.lifecycle.has_electricity_consumption_meter
                    this.final['decree_10'] = 0; // Это электруха для эл. плит, если нет приборов учёта: val20, если есть приборы учёта: val21
                }

                this.final['decree_11'] = 0; // Освещение помещений и оборудования, за исключением лифта: области - val22, Минск - val23

                this.final['decree_12'] = 0; // Лифт: val24
                this.final['decree_13'] = 0; // Все остальные случаи: val25
            }

            this.final['decree_15'] = (decree[this.lifecycle.region !== 'минск' ? 'val27' : 'val28'] * this.lifecycle.living_area * 12 / 1000).toFixed(2);
            this.final['decree_16'] = this.lifecycle.has_intercom ? (decree['val29'] * this.lifecycle.apartments_count * 12 / 1000).toFixed(2) : '';

            let check = 0;
            for (let i = 1; i <= 16; i++) {
                const key = `decree_${i}`; // Формируем ключ: decree_1, decree_2, ..., decree_16
                check += Number(this.final[key]) || 0; // Прибавляем значение (если не число → 0)
            }

            console.log(check); // 265.68
            console.log(this.lifecycle.lifecycle_duration);
            let operating_costs_throughout_lifecycle = (check * this.lifecycle.lifecycle_duration).toFixed(2);
            this.finalTableData['j109'] = operating_costs_throughout_lifecycle;

            /*console.log(this.final['decree_1'] + ' ' +  this.final['decree_2'] + ' ' +  this.final['decree_3'] + ' ' +  this.final['decree_4'] + ' ' +  this.final['decree_5'] + ' ' +
                this.final['decree_6'] + ' ' +  this.final['decree_7'] + ' ' +  this.final['decree_8'] + ' ' +  this.final['decree_9'] + ' ' +  this.final['decree_10'] + ' ' +  this.final['decree_11'] + ' ' +
                this.final['decree_12'] + ' ' +  this.final['decree_13'] + ' ' +  this.final['decree_14'] + ' ' +  this.final['decree_15'] + ' ' +  this.final['decree_16']);*/


            /*let check = this.final['decree_1'] + this.final['decree_2'] + this.final['decree_3'] + this.final['decree_4'] + this.final['decree_5'] +
                this.final['decree_6'] + this.final['decree_7'] + this.final['decree_8'] + this.final['decree_9'] + this.final['decree_10'] + this.final['decree_11'] +
                this.final['decree_12'] + this.final['decree_13'] + this.final['decree_14'] + this.final['decree_15'] + this.final['decree_16'];*/

            console.log(operating_costs_throughout_lifecycle);

            let costs_throughout_lifecycle = (Number(operating_costs_throughout_lifecycle) + Number(this.final['j37']) + Number(this.final['j39']) +
                Number(this.final['j40']) + Number(this.final['j41']) + Number(this.final['j42']) + Number(this.final['j46']) + Number(this.final['j48'])).toFixed(2);
            this.finalTableData['j111'] = costs_throughout_lifecycle;

            console.log(costs_throughout_lifecycle);

            this.lifecycle.construction_cost = this.final['j37'];
            this.lifecycle.construction_cost = this.final['j37'];
            this.lifecycle.construction_cost = this.final['j37'];
            this.lifecycle.construction_cost = this.final['j37'];
            this.lifecycle.construction_cost = this.final['j37'];

            this.lifecycle.lifecycle_end_date = this.lifecycle.commissioning_date + this.lifecycle.lifecycle_duration;

            this.finalTableData['j113'] = Number(this.final['j37']).toFixed(2);
            this.finalTableData['j114'] = (Number(this.final['j39']) + Number(this.final['j40']) + Number(this.final['j41']) +
                Number(this.final['j42'])).toFixed(2);
            this.finalTableData['j115'] = this.final['j46'];
            this.finalTableData['j116'] = this.finalTableData['j109'];
            this.finalTableData['j117'] = this.final['j48'];

            console.log(this.final);
        },
    },
};
</script>

<style scoped>
.table {
    border-radius: 0.5rem;
    overflow: hidden;
}

.table th {
    background-color: #0d6efd;
    color: white;
}

.table td {
    vertical-align: middle;
}

.table-hover tbody tr:hover {
    background-color: #f8f9fa;
}

.ml-2 {
    margin-left: 0.5rem;
}
</style>
