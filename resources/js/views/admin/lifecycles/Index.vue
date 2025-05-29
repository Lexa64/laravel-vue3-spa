<template>
    <div>
        <h1>Расчёт жизненного цикла</h1>
        <div class="container mt-4">
            <form @submit.prevent="saveLifecycle">
                <!-- 1. Общая информация -->
                <h3>1. Общая информация</h3>
                <div class="row g-3">
                    <div class="col-12">
                        <label class="form-label">1.1 Наименование объекта</label>
                        <input type="text" class="form-control" v-model="lifecycle.name">
                    </div>
                    <div class="col-12">
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
                    <div class="col-12">
                        <label class="form-label">1.3 Населенный пункт</label>
                        <input type="text" class="form-control" v-model="lifecycle.city">
                    </div>
                    <div class="col-12">
                        <label class="form-label">1.4 Материал стен</label>
                        <select class="form-select" v-model="lifecycle.wall_material">
                            <option value="крупнопанельные">Крупнопанельные</option>
                            <option value="мелкоштучные элементы">Мелкоштучные элементы (кирпич, блоки)</option>
                            <option value="каркасные системы">Каркасные системы</option>
                            <option value="деревянные">Деревянные</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">1.5 Этажность</label>
                        <input type="number" class="form-control" v-model="lifecycle.floors">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">1.6 Общая площадь жилых помещений (м²)</label>
                        <input type="number" step="0.01" class="form-control" v-model="lifecycle.living_area" @input="handleInput">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">1.7 Общая площадь вспомогательных помещений (м²)</label>
                        <input type="number" step="0.01" class="form-control" v-model="lifecycle.auxiliary_area">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">1.8 Общая площадь жилого дома (м²)</label>
                        <input type="number" step="0.01" class="form-control" v-model="lifecycle.total_area">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">1.9 Количество квартир</label>
                        <input type="number" class="form-control" v-model="lifecycle.apartments_count">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">1.10 Количество проживающих</label>
                        <input type="number" class="form-control" v-model="lifecycle.residents_count">
                    </div>
                    <div class="col-12">
                        <label class="form-label">1.11 Система отопления здания</label>
                        <select class="form-select" v-model="lifecycle.heating_system">
                            <option value="централизованный источник">От централизованного источника</option>
                            <option value="децентрализованная газовая">Децентрализованная газовая</option>
                            <option value="децентрализованная электрическая">Децентрализованная электрическая</option>
                            <option value="другое">Другое</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <label class="form-label">1.11 Плиты пищеприготовления</label>
                        <select class="form-select" v-model="lifecycle.cooking_plates">
                            <option value="электрические">Электрические</option>
                            <option value="газовые">Газовые</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">1.12 Мусоропровод</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" v-model="lifecycle.has_garbage_chute">
                            <label class="form-check-label">Есть</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">1.13 Лифт</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" v-model="lifecycle.has_elevator">
                            <label class="form-check-label">Есть</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">1.14 Запорно-переговорные устройства</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" v-model="lifecycle.has_intercom">
                            <label class="form-check-label">Есть</label>
                        </div>
                    </div>
                </div>
                <!-- 2. Контрольные события -->
                <h3 class="mt-4">2. Контрольные события</h3>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">2.1 Длительность жизненного цикла здания</label>
                        <input type="number" class="form-control" v-model="lifecycle.lifecycle_duration">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">2.2 Стоимостные показатели в ценах на (год)</label>
                        <input type="number" min="1991" max="2100" step="1" class="form-control" v-model="lifecycle.price_year">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">2.3 Дата выдачи задания на проектирование</label>
                        <input type="date" class="form-control" v-model="lifecycle.design_task_date">
                    </div>
<!--                    <div class="col-md-6">
                        <VueFlatpickr
                            v-model="lifecycle.design_task_date"
                            :config="flatpickrOptions"
                            placeholder="Выберите дату"
                        />
                    </div>-->
<!--                    <div class="col-md-6">
                        <label class="form-label">2.4 Дата начала строительства</label>
                        <input type="date" class="form-control" v-model="lifecycle.construction_start_date">
                    </div>-->
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
                        <label class="form-label">2.5 Дата приемки объекта в эксплуатацию</label>
                        <input type="number" min="1991" max="2100" step="1" class="form-control" v-model="lifecycle.commissioning_date">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">2.6 Дата планируемого проведения текущего ремонта 1</label>
                        <input type="date" class="form-control" v-model="lifecycle.maintenance_date_1">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">2.7 Дата планируемого проведения текущего ремонта 2</label>
                        <input type="date" class="form-control" v-model="lifecycle.maintenance_date_2">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">2.8 Дата планируемого проведения текущего ремонта 3</label>
                        <input type="date" class="form-control" v-model="lifecycle.maintenance_date_3">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">2.9 Дата планируемого проведения текущего ремонта 4</label>
                        <input type="date" class="form-control" v-model="lifecycle.maintenance_date_4">
                    </div>
<!--                    <div class="col-md-6">
                        <label class="form-label">2.10 Дата планируемого проведения текущего ремонта 5</label>
                        <input type="date" class="form-control" v-model="lifecycle.maintenance_date_5">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">2.11 Дата планируемого проведения текущего ремонта 6</label>
                        <input type="date" class="form-control" v-model="lifecycle.maintenance_date_6">
                    </div>-->
                    <div class="col-md-6">
                        <label class="form-label">2.12 Дата планируемого проведения капитального ремонта 1</label>
                        <input type="date" class="form-control" v-model="lifecycle.overhaul_date_1">
                    </div>
<!--                    <div class="col-md-6">
                        <label class="form-label">2.13 Дата планируемого проведения капитального ремонта 2</label>
                        <input type="date" class="form-control" v-model="lifecycle.overhaul_date_2">
                    </div>-->
                    <div class="col-md-6">
                        <label class="form-label">2.14 Дата окончания жизненного цикла</label>
                        <input type="number" min="1991" max="2100" step="1" class="form-control" v-model="lifecycle.lifecycle_end_date">
                    </div>
                </div>
                <hr class="my-4 border-4 border-dark">
                <!-- 3. Стоимостные показатели -->
                <h3 class="mt-4">3. Стоимостные показатели</h3>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Дата начала строительства</label>
                        <input type="date" class="form-control" v-model="lifecycle.cost_indicators_date">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">3.1 Стоимость строительства (тыс. руб.)</label>
                        <input type="number" step="0.01" class="form-control" v-model="lifecycle.construction_cost">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">3.2 Стоимость текущего ремонта 1 (тыс. руб.)</label>
                        <input type="number" step="0.01" class="form-control" v-model="lifecycle.maintenance_cost_1">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">3.3 Стоимость текущего ремонта 2 (тыс. руб.)</label>
                        <input type="number" step="0.01" class="form-control" v-model="lifecycle.maintenance_cost_2">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">3.4 Стоимость текущего ремонта 3 (тыс. руб.)</label>
                        <input type="number" step="0.01" class="form-control" v-model="lifecycle.maintenance_cost_3">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">3.5 Стоимость текущего ремонта 4 (тыс. руб.)</label>
                        <input type="number" step="0.01" class="form-control" v-model="lifecycle.maintenance_cost_4">
                    </div>
<!--                    <div class="col-md-6">
                        <label class="form-label">3.6 Стоимость текущего ремонта 5 (тыс. руб.)</label>
                        <input type="number" step="0.01" class="form-control" v-model="lifecycle.maintenance_cost_5">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">3.7 Стоимость текущего ремонта 6 (тыс. руб.)</label>
                        <input type="number" step="0.01" class="form-control" v-model="lifecycle.maintenance_cost_6">
                    </div>-->
                    <div class="col-md-6">
                        <label class="form-label">3.8 Стоимость капитального ремонта 1 (тыс. руб.)</label>
                        <input type="number" step="0.01" class="form-control" v-model="lifecycle.overhaul_cost_1">
                    </div>
<!--                    <div class="col-md-6">
                        <label class="form-label">3.9 Стоимость капитального ремонта 2 (тыс. руб.)</label>
                        <input type="number" step="0.01" class="form-control" v-model="lifecycle.overhaul_cost_2">
                    </div>-->
                    <div class="col-md-6">
                        <label class="form-label">3.10 Стоимость сноса (тыс. руб.)</label>
                        <input type="number" step="0.01" class="form-control" v-model="lifecycle.demolition_cost">
                    </div>
                </div>
                <!-- 4. Эксплуатационные ресурсы -->
                <h3 class="mt-4">4. Эксплуатационные ресурсы</h3>
                <div class="row g-3">
<!--                    <div class="col-12">
                        <label class="form-label">4.1 Потребление электроэнергии, всего (кВт*ч)</label>
                        <input type="number" step="0.01" class="form-control" v-model="lifecycle.total_electricity">
                    </div>-->
                    <div class="col-md-6">
                        <label class="form-label">4.1.1 Электроэнергия на освещение вспомогательных помещений (кВт*ч)</label>
                        <input type="number" step="0.01" class="form-control" v-model="lifecycle.auxiliary_electricity">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">4.1.2 Электроэнергия на работу лифта (кВт*ч)</label>
                        <input type="number" step="0.01" class="form-control" v-model="lifecycle.elevator_electricity">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">4.1.3 Электроэнергия, потребляемая домохозяйствами (кВт*ч)</label>
                        <input type="number" step="0.01" class="form-control" v-model="lifecycle.household_electricity">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">4.1.4 Электроэнергия на отопление (кВт*ч)</label>
                        <input type="number" step="0.01" class="form-control" v-model="lifecycle.heating_electricity">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">4.2 Потребление природного газа (куб. метр)</label>
                        <input type="number" step="0.01" class="form-control" v-model="lifecycle.natural_gas">
                    </div>
                    <div class="col-12">
                        <label class="form-label">4.3 Тепловая энергия, всего (Гкал)</label>
                        <input type="number" step="0.01" class="form-control" v-model="lifecycle.total_thermal_energy">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">4.3.1 Теплоснабжение (отопление) (Гкал)</label>
                        <input type="number" step="0.01" class="form-control" v-model="lifecycle.heating_thermal_energy">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">4.3.2 Горячее водоснабжение (Гкал)</label>
                        <input type="number" step="0.01" class="form-control" v-model="lifecycle.hot_water_thermal_energy">
                    </div>
                    <div class="col-12">
                        <label class="form-label">4.4 Вода, всего (куб. метр)</label>
                        <input type="number" step="0.01" class="form-control" v-model="lifecycle.total_water">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">4.4.1 Холодная вода (куб. метр)</label>
                        <input type="number" step="0.01" class="form-control" v-model="lifecycle.cold_water">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">4.4.2 Горячая вода (куб. метр)</label>
                        <input type="number" step="0.01" class="form-control" v-model="lifecycle.hot_water">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">4.5 Водоотведение (канализация) (куб. метр)</label>
                        <input type="number" step="0.01" class="form-control" v-model="lifecycle.sewage">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">4.6 Обращение с твердыми коммунальными отходами (куб. метр)</label>
                        <input type="number" step="0.01" class="form-control" v-model="lifecycle.solid_waste">
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Сохранить</button>
<!--                        <button @click="calculate" class="btn btn-primary" style="margin-left: 20px;">Рассчитать</button>-->
                    </div>
                </div>
            </form>
            <h2 v-if="lifecycle.construction_cost!==null">Расчётная стоимость: {{ (lifecycle.construction_cost * 108).toFixed(2) }}</h2>
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
                solid_waste: 635.16
            },
            isLoading: false,
            error: null,
            data: null,
            final: null
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

                result['decree_1'] = (this.data[3][0]['val2'] * this.lifecycle.total_water / 1000).toFixed(2);
                result['decree_2'] = (this.data[3][0]['val4'] * this.lifecycle.sewage / 1000).toFixed(2);
                result['decree_3'] = (this.data[3][0]['val6'] * this.lifecycle.living_area / 1000 * 12).toFixed(2);
                result['decree_4'] = (this.data[3][0]['val8'] * this.lifecycle.total_thermal_energy / 1000).toFixed(2);
                result['decree_5'] = (this.data[3][0]['val11'] * this.lifecycle.solid_waste / 1000).toFixed(2);
                result['decree_6'] = (this.data[3][0]['val14'] * this.lifecycle.total_area * 12 / 1000).toFixed(2);
                result['decree_7'] = (this.data[3][0]['val15'] * this.lifecycle.living_area / 1000 * 12).toFixed(2);
                result['decree_8'] = (this.data[3][0]['val18'] * this.lifecycle.natural_gas / 1000).toFixed(2);
                result['decree_9'] = (this.data[3][0]['val26'] * (this.lifecycle.auxiliary_electricity + this.lifecycle.elevator_electricity +
                    this.lifecycle.household_electricity + this.lifecycle.heating_electricity) / 1000).toFixed(2);
                result['decree_10'] = (this.data[3][0]['val27'] * this.lifecycle.living_area * 12 / 1000).toFixed(2);
                result['decree_11'] = (this.data[3][0]['val29'] * this.lifecycle.apartments_count * 12 / 1000).toFixed(2);

                this.lifecycle.construction_cost = result['j37'];
                this.lifecycle.lifecycle_end_date = this.lifecycle.commissioning_date + this.lifecycle.lifecycle_duration;

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
        calculate() {
            console.log(this.lifecycle.living_area)
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
